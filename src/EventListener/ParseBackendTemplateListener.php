<?php
declare(strict_types=1);

namespace App\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;

#[AsHook('parseBackendTemplate')]
class ParseBackendTemplateListener
{
    public function __invoke(string $buffer, string $template): string
    {
        // Nur im Haupttemplate einbinden
        if ($template !== 'be_main') {
            return $buffer;
        }

        // Script direkt ohne defer, aber mit type="module"
        $script = '<script src="/bundles/app/js/backend-session-manager.js"></script>';

        return str_replace('</body>', $script . "\n</body>", $buffer);
    }
}