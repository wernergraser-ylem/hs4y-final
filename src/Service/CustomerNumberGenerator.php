<?php

namespace App\Service;

use Doctrine\DBAL\Connection;

class CustomerNumberGenerator
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Generiert eine neue, eindeutige Kundennummer
     * Format: KD000001, KD000002, etc.
     */
    public function generateCustomerNumber(): string
    {
        // Höchste bestehende Kundennummer ermitteln (angepasst für deine Tabelle)
        $sql = "SELECT MAX(CAST(SUBSTRING(kundennummer, 3) AS UNSIGNED)) as max_number 
                FROM cc_hs4y_salzburg 
                WHERE kundennummer LIKE 'KD%' 
                AND kundennummer != ''";

        $result = $this->connection->fetchOne($sql);
        $lastNumber = $result ? (int)$result : 0;

        // Nächste Nummer generieren
        $nextNumber = $lastNumber + 1;

        // Format: KD + 6-stellige Zahl mit führenden Nullen
        return 'KD' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Prüft, ob eine Kundennummer bereits existiert
     */
    public function customerNumberExists(string $customerNumber): bool
    {
        $sql = "SELECT COUNT(*) FROM cc_hs4y_salzburg WHERE kundennummer = ?";
        $count = $this->connection->fetchOne($sql, [$customerNumber]);

        return $count > 0;
    }
}