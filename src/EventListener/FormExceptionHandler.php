<?php

declare(strict_types=1);

namespace App\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

#[AsEventListener(KernelEvents::EXCEPTION)]
class FormExceptionHandler
{
    public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $request = $event->getRequest();

        // Nur für POST-Requests auf Formularen
        if ($request->getMethod() !== 'POST') {
            return;
        }

        // Nur für Validierungsfehler
        $validationErrors = [
            'ist bereits registriert',
            'existiert bereits',
            'ungültiges Format'
        ];

        $isValidationError = false;
        foreach ($validationErrors as $errorPattern) {
            if (strpos($exception->getMessage(), $errorPattern) !== false) {
                $isValidationError = true;
                break;
            }
        }

        if (!$isValidationError) {
            return;
        }

        // HTML-Response mit Fehlermeldung erstellen
        $html = $this->createErrorPage($exception->getMessage(), $request->getUri());

        $response = new Response($html, 400);
        $event->setResponse($response);
    }

    private function createErrorPage(string $errorMessage, string $currentUri): string
    {
        return '<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertrag anlegen - Fehler</title>
    <style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        margin: 0;
        padding: 0;
        background: #f8f9fa;
    }
    
    .header {
        background: #2d5a2d;
        color: white;
        padding: 1rem 0;
        text-align: center;
    }
    
    .nav {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 1rem;
    }
    
    .nav a {
        background: rgba(255,255,255,0.2);
        color: white;
        padding: 0.5rem 1rem;
        text-decoration: none;
        border-radius: 0.25rem;
    }
    
    .container {
        max-width: 600px;
        margin: 2rem auto;
        padding: 0 1rem;
    }
    
    .form-error-container {
        background: white;
        padding: 2rem;
        border-left: 4px solid #dc3545;
        border-radius: 0.375rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .error-message {
        background: #f5c6cb;
        color: #721c24;
        padding: 1rem;
        border-radius: 0.375rem;
        margin: 1rem 0;
        border: 1px solid #f1b0b7;
    }
    
    .error-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 0.375rem;
        text-decoration: none;
        cursor: pointer;
        font-weight: 500;
        display: inline-block;
        text-align: center;
        transition: all 0.2s ease;
    }
    
    .btn-secondary {
        background: #6c757d;
        color: white;
    }
    
    .btn-primary {
        background: #0d6efd;
        color: white;
    }
    
    .btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    
    .footer {
        text-align: center;
        margin-top: 3rem;
        padding: 2rem;
        color: #6c757d;
    }
    </style>
</head>
<body>
    <div class="header">
        <h1>🛡️ handyservice4you</h1>
        <div class="nav">
            <a href="/home-salzburg">Home Salzburg</a>
            <a href="/vertrag-anlegen-salzburg">Vertrag anlegen</a>
            <a href="/vertraege">Verträge</a>
            <a href="/logout">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="form-error-container">
            <h2>❌ Fehler beim Anlegen des Vertrags</h2>
            
            <div class="error-message">
                <strong>Es ist ein Problem aufgetreten:</strong><br>
                ' . htmlspecialchars($errorMessage) . '
            </div>
            
            <div class="error-actions">
                <button type="button" onclick="history.back()" class="btn btn-secondary">
                    ← Zurück zum Formular
                </button>
                <a href="' . htmlspecialchars($currentUri) . '" class="btn btn-primary">
                    🔄 Formular neu laden
                </a>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>Copyright 2025. All Rights Reserved.</p>
        <p><a href="/impressum">Impressum</a> | <a href="/datenschutz">Datenschutz</a></p>
    </div>
</body>
</html>';
    }
}