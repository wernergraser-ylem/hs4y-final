<?php
declare(strict_types=1);

namespace App\EventListener;

use Contao\CoreBundle\Exception\AccessDeniedException;
use Contao\CoreBundle\Exception\InsufficientAuthenticationException;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Contao\CoreBundle\DependencyInjection\Attribute\AsEventListener;
use Psr\Log\LoggerInterface;

#[AsEventListener(event: 'kernel.exception', priority: 100)]
class BackendSessionTimeoutListener
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {}

    public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $request = $event->getRequest();

        // Nur im Backend aktiv
        if (!str_starts_with($request->getPathInfo(), '/contao')) {
            return;
        }

        // Prüfe verschiedene Session-Timeout Szenarien
        $isSessionTimeout = false;
        $message = '';

        if ($exception instanceof AccessDeniedException) {
            $isSessionTimeout = true;
            $message = 'AccessDeniedException';
        } elseif ($exception instanceof InsufficientAuthenticationException) {
            $isSessionTimeout = true;
            $message = 'InsufficientAuthenticationException';
        } elseif ($exception instanceof AccessDeniedHttpException) {
            $isSessionTimeout = true;
            $message = 'AccessDeniedHttpException';
        } elseif (method_exists($exception, 'getCode') && $exception->getCode() === 401) {
            $isSessionTimeout = true;
            $message = '401 Unauthorized';
        }

        if ($isSessionTimeout) {
            $this->logger->info('Backend session timeout detected: ' . $message);

            // Session-Message für Login-Seite
            $session = $request->getSession();
            $session->getFlashBag()->add('contao.BE.info', 'Ihre Sitzung ist abgelaufen. Bitte melden Sie sich erneut an.');

            // Redirect zur Backend-Login-Seite
            $response = new RedirectResponse('/contao/login');
            $event->setResponse($response);
        }
    }
}