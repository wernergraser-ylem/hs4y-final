<?php

declare(strict_types=1);

namespace App\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;

#[AsHook('parseTemplate')]
class FormTemplateErrorListener
{
    /**
     * Hook für Template-Parsing - injiziert Fehlermeldungen
     */
    public function __invoke(\Contao\Template $template): void
    {
        // Nur für Form-Templates
        if (strpos($template->getName(), 'form_') !== 0) {
            return;
        }

        // Prüfe auf gespeicherte Fehlermeldungen
        if (isset($_SESSION['FORM_ERROR']) && $_SESSION['FORM_ERROR']['hasError']) {
            $template->hasError = true;
            $template->errorMessage = $_SESSION['FORM_ERROR']['message'];

            // Formulardaten wiederherstellen
            if (isset($_SESSION['FORM_ERROR']['formData'])) {
                $formData = $_SESSION['FORM_ERROR']['formData'];

                // Template-Variablen für jedes Feld setzen
                foreach ($formData as $fieldName => $value) {
                    if (!empty($value)) {
                        $template->$fieldName = $value;
                    }
                }
            }

            // Fehlermeldung nach Anzeige löschen
            unset($_SESSION['FORM_ERROR']);
        } else {
            $template->hasError = false;
        }

        // Prüfe auch Global-Variablen
        if (isset($GLOBALS['TL_FORM_ERROR']) && $GLOBALS['TL_FORM_ERROR']) {
            $template->hasError = true;
            $template->errorMessage = $GLOBALS['TL_FORM_ERROR_MESSAGE'] ?? 'Unbekannter Fehler';
        }
    }
}