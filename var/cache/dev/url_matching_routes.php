<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/contao' => [
            [['_route' => 'contao_backend', '_scope' => 'backend', '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::mainAction'], null, null, null, false, false, null],
            [['_route' => 'contao_backend_redirect', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction', 'route' => 'contao_backend', 'permanent' => true], null, null, null, true, false, null],
        ],
        '/contao/login' => [[['_route' => 'contao_backend_login', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::loginAction'], null, null, null, false, false, null]],
        '/contao/login-link' => [[['_route' => 'contao_backend_login_link', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::loginAction'], null, null, null, false, false, null]],
        '/contao/logout' => [[['_route' => 'contao_backend_logout', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::logoutAction'], null, null, null, false, false, null]],
        '/contao/password' => [[['_route' => 'contao_backend_password', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::passwordAction'], null, null, null, false, false, null]],
        '/contao/confirm' => [[['_route' => 'contao_backend_confirm', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::confirmAction'], null, null, null, false, false, null]],
        '/contao/help' => [[['_route' => 'contao_backend_help', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::helpAction'], null, null, null, false, false, null]],
        '/contao/popup' => [[['_route' => 'contao_backend_popup', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::popupAction'], null, null, null, false, false, null]],
        '/contao/alerts' => [[['_route' => 'contao_backend_alerts', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::alertsAction'], null, null, null, false, false, null]],
        '/contao/picker' => [[['_route' => 'contao_backend_picker', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::pickerAction'], null, null, null, false, false, null]],
        '/contao/preview' => [[['_route' => 'contao_backend_preview', '_scope' => 'backend', '_allow_preview' => true, '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendPreviewController'], null, null, null, false, false, null]],
        '/contao/preview_switch' => [[['_route' => 'contao_backend_switch', '_scope' => 'backend', '_allow_preview' => true, '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendPreviewSwitchController'], null, null, null, false, false, null]],
        '/favicon.ico' => [[['_route' => 'contao_core_favicon__invoke', '_scope' => 'frontend', '_controller' => 'Contao\\CoreBundle\\Controller\\FaviconController'], null, null, null, false, false, null]],
        '/_contao/cron' => [[['_route' => 'contao_frontend_cron', '_scope' => 'frontend', '_controller' => 'Contao\\CoreBundle\\Controller\\FrontendController::cronAction'], null, null, null, false, false, null]],
        '/_contao/share' => [[['_route' => 'contao_frontend_share', '_scope' => 'frontend', '_controller' => 'Contao\\CoreBundle\\Controller\\FrontendController::shareAction'], null, null, null, false, false, null]],
        '/_contao/logout' => [[['_route' => 'contao_frontend_logout', '_scope' => 'frontend', '_controller' => 'Contao\\CoreBundle\\Controller\\FrontendController::logoutAction'], null, null, null, false, false, null]],
        '/_contao/check_cookies' => [[['_route' => 'contao_frontend_check_cookies', '_scope' => 'frontend', '_token_check' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\FrontendController::checkCookiesAction'], null, null, null, false, false, null]],
        '/_contao/request_token_script' => [[['_route' => 'contao_frontend_request_token_script', '_scope' => 'frontend', '_controller' => 'Contao\\CoreBundle\\Controller\\FrontendController::requestTokenScriptAction'], null, null, null, false, false, null]],
        '/robots.txt' => [[['_route' => 'contao_core_robotstxt__invoke', '_scope' => 'frontend', '_controller' => 'Contao\\CoreBundle\\Controller\\RobotsTxtController'], null, null, null, false, false, null]],
        '/sitemap.xml' => [[['_route' => 'contao_core_sitemap__invoke', '_scope' => 'frontend', '_controller' => 'Contao\\CoreBundle\\Controller\\SitemapController'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|wdt/([^/]++)(*:24)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:65)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:101)'
                                .'|router(*:115)'
                                .'|exception(?'
                                    .'|(*:135)'
                                    .'|\\.css(*:148)'
                                .')'
                            .')'
                            .'|(*:158)'
                        .')'
                    .')'
                    .'|contao/(?'
                        .'|c(?'
                            .'|aptcha/([^/]++)(*:197)'
                            .'|sp/report/([^/]++)(*:223)'
                        .')'
                        .'|preview/(\\d+)(*:245)'
                    .')'
                .')'
                .'|/assets/images/(.+)(*:274)'
                .'|/contao/(.*)(*:294)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        65 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        101 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        115 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        135 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        158 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        197 => [[['_route' => 'contao_frontend_captcha', '_scope' => 'frontend', '_controller' => 'Contao\\CoreBundle\\Controller\\CaptchaController'], ['_locale'], null, null, false, true, null]],
        223 => [[['_route' => 'contao_core_cspreporter__invoke', '_controller' => 'Contao\\CoreBundle\\Controller\\CspReporterController'], ['page'], ['POST' => 0], null, false, true, null]],
        245 => [[['_route' => 'contao_preview_link', '_scope' => 'frontend', '_allow_preview' => true, '_controller' => 'Contao\\CoreBundle\\Controller\\PreviewLinkController'], ['id'], null, null, false, true, null]],
        274 => [[['_route' => 'contao_images', '_controller' => 'Contao\\CoreBundle\\Controller\\ImagesController', '_bypass_maintenance' => true], ['path'], null, null, false, true, null]],
        294 => [
            [['_route' => 'contao_backend_fallback', '_scope' => 'backend', '_store_referrer' => false, '_controller' => 'Contao\\CoreBundle\\Controller\\BackendController::backendFallback'], ['parameters'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
