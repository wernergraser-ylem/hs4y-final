<?php

declare(strict_types=1);

namespace App\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Monolog\ContaoContext;
use Psr\Log\LoggerInterface;
use Doctrine\DBAL\Connection;

#[AsHook('processFormData')]
class ClientHubListener
{
    private ?LoggerInterface $logger = null;
    private ?Connection $connection = null;

    public function __construct()
    {
        // Services werden lazy geladen
    }

    private function getLogger(): LoggerInterface
    {
        if ($this->logger === null) {
            $this->logger = \Contao\System::getContainer()->get('monolog.logger.contao');
        }
        return $this->logger;
    }

    private function getConnection(): Connection
    {
        if ($this->connection === null) {
            $this->connection = \Contao\System::getContainer()->get('database_connection');
        }
        return $this->connection;
    }

    // CustomerChecker-Funktionalität direkt hier implementieren
    private function customerExistsByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM cc_hs4y_salzburg WHERE E_Mail = ? LIMIT 1";
        $result = $this->getConnection()->fetchAssociative($sql, [$email]);
        return $result ?: null;
    }

    private function imeiExists(string $imei): bool
    {
        $sql = "SELECT COUNT(*) FROM cc_hs4y_salzburg WHERE IMEI_Nummer = ?";
        $count = $this->getConnection()->fetchOne($sql, [$imei]);
        return (int) $count > 0;
    }

    public function __invoke(array $formData, array $files, array $labels, array $form): void
    {
        // Form-Objekt aus Array extrahieren
        $formId = $form['id'] ?? null;
        $formObject = $form['form'] ?? null;

        $this->log('processFormData aufgerufen für Formular-ID: ' . $formId);
        $this->log('FormData formID: ' . $formId);
        $this->log('Bereite Daten vor...');

        // Debug: Alle übermittelten Felder anzeigen
        $fieldNames = array_keys($formData);
        $this->log('Eingereichte Formularfelder: ' . implode(', ', $fieldNames));

        try {
            // Validierung durchführen
            if (!$this->handleCustomerNumberAndDuplicates($formData, $formObject ?: $form)) {
                // Validierung fehlgeschlagen - Stoppe hier ohne weitere Verarbeitung
                return;
            }

            // Wenn Validierung erfolgreich, führe normale Verarbeitung durch
            $this->processValidatedData($formData, $files, $labels, $formObject ?: $form);

        } catch (\Exception $e) {
            $this->log('Fehler beim Speichern: ' . $e->getMessage(), 'ERROR');

            // Bei Validierungsfehlern setzen wir Template-Variablen für Fehlermeldung
            $validationErrors = [
                'ist bereits registriert',
                'existiert bereits',
                'ungültiges Format'
            ];

            $isValidationError = false;
            foreach ($validationErrors as $errorPattern) {
                if (strpos($e->getMessage(), $errorPattern) !== false) {
                    $isValidationError = true;
                    break;
                }
            }

            if ($isValidationError) {
                // Formulardaten in Session speichern für Wiederherstellung
                $_SESSION['FORM_ERROR'] = [
                    'hasError' => true,
                    'message' => $e->getMessage(),
                    'formData' => $formData,  // Wichtig: Daten speichern!
                    'timestamp' => time()
                ];

                // Redirect zur gleichen Seite ohne POST-Daten
                $currentUrl = \Contao\Environment::get('requestUri');
                header('Location: ' . $currentUrl);
                exit;
            }

            // Andere Fehler weiterwerfen
            throw $e;
        }
    }

    private function processValidatedData(array $formData, array $files, array $labels, $form): void
    {
        // Hier kommt die normale Datenverarbeitung nach erfolgreicher Validierung

        // Kundennummer generieren
        $customerNumber = $this->generateCustomerNumber();
        $this->log('Generierte Kundennummer: ' . $customerNumber);

        // Daten für Kundeninsert vorbereiten
        $customerData = $this->prepareCustomerData($formData, $customerNumber);

        // Kunde in Datenbank speichern
        $customerId = $this->saveCustomer($customerData);
        $this->log('Kunde gespeichert mit ID: ' . $customerId);

        // Vertragsdaten vorbereiten und speichern
        if ($this->hasContractData($formData)) {
            $contractData = $this->prepareContractData($formData, $customerId, $customerNumber);
            $contractId = $this->saveContract($contractData);
            $this->log('Vertrag gespeichert mit ID: ' . $contractId);
        }

        $this->log('Kunde und Vertrag erfolgreich gespeichert', 'INFO');
    }

    private function handleCustomerNumberAndDuplicates(array $formData, $form): bool
    {
        $email = $formData['email'] ?? null;
        $imei = $formData['imei'] ?? null;

        if (empty($email)) {
            return true; // Keine E-Mail-Validierung nötig
        }

        // IMEI-Format validieren (14-15 Ziffern)
        if (!empty($imei) && !preg_match('/^\d{14,15}$/', $imei)) {
            $this->log('Ungültiges IMEI-Format: ' . $imei, 'WARNING');
            throw new \Exception('Die IMEI-Nummer "' . $imei . '" hat ein ungültiges Format. Eine IMEI muss 14-15 Ziffern enthalten.');
        }

        // Temporär: Datenbankprüfungen ausgeschaltet bis Tabellen existieren
        try {
            // IMEI-Duplikatsprüfung
            if (!empty($imei) && $this->imeiExists($imei)) {
                $this->log('IMEI bereits vorhanden: ' . $imei, 'WARNING');

                // Exception werfen - das muss so sein da $form ein Array ist
                throw new \Exception('Die IMEI-Nummer "' . $imei . '" ist bereits registriert. Bitte prüfen Sie Ihre Eingabe oder verwenden Sie eine andere IMEI-Nummer.');
            }

            // Prüfen, ob Kunde anhand E-Mail bereits existiert
            $existingCustomer = $this->customerExistsByEmail($email);

            if ($existingCustomer) {
                $this->log('Kunde mit E-Mail bereits vorhanden: ' .
                    ($existingCustomer['kundennummer'] ?? 'N/A') . ' - ' .
                    ($existingCustomer['Vorname'] ?? '') . ' ' . ($existingCustomer['Familienname_Firma'] ?? ''), 'WARNING');

                // Exception werfen - das muss so sein da $form ein Array ist
                $customerName = trim(($existingCustomer['Vorname'] ?? '') . ' ' . ($existingCustomer['Familienname_Firma'] ?? ''));
                throw new \Exception(
                    sprintf(
                        'Ein Kunde mit der E-Mail-Adresse "%s" existiert bereits (Kundennummer: %s, Name: %s). Bitte prüfen Sie Ihre Eingabe oder verwenden Sie eine andere E-Mail-Adresse.',
                        $email,
                        $existingCustomer['kundennummer'] ?? 'N/A',
                        $customerName ?: 'Unbekannt'
                    )
                );
            }
        } catch (\Doctrine\DBAL\Exception\TableNotFoundException $e) {
            // Tabelle existiert noch nicht - erstmal ohne Duplikatsprüfung
            $this->log('Tabelle cc_hs4y_salzburg existiert noch nicht - überspringe Duplikatsprüfung', 'WARNING');
        }

        return true; // Alle Validierungen bestanden
    }

    private function generateCustomerNumber(): string
    {
        // Höchste vorhandene Kundennummer finden
        $sql = "SELECT MAX(CAST(SUBSTRING(kundennummer, 3) AS UNSIGNED)) as max_number FROM cc_hs4y_salzburg WHERE kundennummer LIKE 'KD%'";
        $result = $this->getConnection()->fetchOne($sql);

        $nextNumber = ($result !== false && $result !== null) ? $result + 1 : 1;

        return 'KD' . str_pad((string)$nextNumber, 6, '0', STR_PAD_LEFT);
    }

    private function prepareCustomerData(array $formData, string $customerNumber): array
    {
        return [
            'tstamp' => time(),
            'kundennummer' => $customerNumber,
            'Titel_vorangestellt' => $formData['titel_vorangestellt'] ?? '',
            'Vorname' => $formData['vorname'] ?? '',
            'Familienname_Firma' => $formData['familienname_firma'] ?? '',
            'Titel_nachgestellt' => $formData['titel_nachgestellt'] ?? '',
            'Strasse' => $formData['strasse'] ?? '',
            'Hausnummer' => $formData['hausnummer'] ?? '',
            'PLZ' => $formData['plz'] ?? '',
            'Wohnort' => $formData['ort'] ?? '',
            'E_Mail' => $formData['email'] ?? '',
            'Handynummer' => $formData['handynummer'] ?? '',
            'IMEI_Nummer' => $formData['imei'] ?? '',
            'IBAN' => $formData['iban'] ?? '',
            'BIC' => $formData['BIC'] ?? '',
            'Aktiv_Oeffentlichen' => isset($formData['aktiv_oeffentlichen']) ? '1' : '',
        ];
    }

    private function saveCustomer(array $customerData): int
    {
        $this->getConnection()->insert('cc_hs4y_salzburg', $customerData);
        return (int) $this->getConnection()->lastInsertId();
    }

    private function hasContractData(array $formData): bool
    {
        return !empty($formData['vertrag_aktiv_handy']) || !empty($formData['vertrag_aktiv_data']);
    }

    private function prepareContractData(array $formData, int $customerId, string $customerNumber): array
    {
        return [
            'tstamp' => time(),
            'pid' => $customerId,
            'kundennummer' => $customerNumber,
            'Vertrag_aktiv_Handy' => isset($formData['vertrag_aktiv_handy']) ? '1' : '',
            'Handy_Hersteller' => $formData['handy_hersteller'] ?? '',
            'Handytyp' => $formData['handytyp'] ?? '',
            'Kaufdatum_Handy' => !empty($formData['Kaufdatum_Handy']) ? $formData['Kaufdatum_Handy'] : '',
            'Vertrag' => $formData['vertrag'] ?? '',
            'Monatspraemie_Handy' => $formData['monatspraemie_handy'] ?? '',
            'Zusaetzliche_Vereinbarungen_Handy' => $formData['zusaetzliche_vereinbarungen_handy'] ?? '',
            'Vertrag_aktiv_DATA' => isset($formData['vertrag_aktiv_data']) ? '1' : '',
            'Vertragstext' => $formData['vertragstext'] ?? '',
            'Vertragstext_Unterschrift' => $formData['vertragstext_unterschrift'] ?? '',
            'Verkaeufer' => $formData['verkaeufer'] ?? '',
        ];
    }

    private function saveContract(array $contractData): int
    {
        $this->getConnection()->insert('cc_hs4y_salzburg', $contractData);
        return (int) $this->getConnection()->lastInsertId();
    }

    private function log(string $message, string $level = 'INFO'): void
    {
        $context = [
            'contao' => new ContaoContext(__METHOD__, $level)
        ];

        $logMessage = '[ClientHubListener] ' . $message;

        match(strtoupper($level)) {
            'ERROR' => $this->getLogger()->error($logMessage, $context),
            'WARNING' => $this->getLogger()->warning($logMessage, $context),
            'DEBUG' => $this->getLogger()->debug($logMessage, $context),
            default => $this->getLogger()->info($logMessage, $context),
        };
    }
}