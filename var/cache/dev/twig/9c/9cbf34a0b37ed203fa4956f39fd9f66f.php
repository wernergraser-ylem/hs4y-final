<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @ContaoCore/Frontend/preview_toolbar_base_js.html.twig */
class __TwigTemplate_31fd9b1629ee4025da73fd460a4f7949 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Frontend/preview_toolbar_base_js.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Frontend/preview_toolbar_base_js.html.twig"));

        // line 1
        CoreExtension::getAttribute($this->env, $this->source, (isset($context["csp_handler"]) || array_key_exists("csp_handler", $context) ? $context["csp_handler"] : (function () { throw new RuntimeError('Variable "csp_handler" does not exist.', 1, $this->source); })()), "addSource", ["img-src", "data:"], "method", false, false, false, 1);
        // line 2
        $context["style_nonce"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["csp_handler"]) || array_key_exists("csp_handler", $context) ? $context["csp_handler"] : (function () { throw new RuntimeError('Variable "csp_handler" does not exist.', 2, $this->source); })()), "getNonce", ["style-src"], "method", false, false, false, 2);
        // line 3
        yield "<style";
        if ((($tmp = (isset($context["style_nonce"]) || array_key_exists("style_nonce", $context) ? $context["style_nonce"] : (function () { throw new RuntimeError('Variable "style_nonce" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " nonce=\"";
            yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["style_nonce"]) || array_key_exists("style_nonce", $context) ? $context["style_nonce"] : (function () { throw new RuntimeError('Variable "style_nonce" does not exist.', 3, $this->source); })()), "contao_html", null, true);
            yield "\"";
        }
        yield ">
    .cto-toolbar {
        font-family: -apple-system,system-ui,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 1;
        color: #444;
    }

    @media (-webkit-min-device-pixel-ratio:2),(min-resolution:192dpi) {
        .cto-toolbar {
            font-weight: 300;
            color: #222;
        }
    }

    .cto-toolbar__open {
        width: 36px;
        height: 36px;
        position: fixed;
        right: 0;
        top: 0;
        background: #222;
        border-radius: 0 0 0 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99999;
    }

    .cto-toolbar--visible .cto-toolbar__open {
        display: none;
    }

    .cto-toolbar__open a {
        opacity: .7;
    }

    .cto-toolbar__inside {
        display: grid;
        grid-template: auto / 1fr auto;
        width: 100%;
        background: #f2f2f2;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 99999;
        border-bottom: 1px solid #ccc;
    }

    .cto-toolbar--hidden .cto-toolbar__inside {
        display: none;
    }

    .cto-toolbar__close {
        border-left: 1px solid #ccc;
    }

    .cto-toolbar__close a {
        font-weight: 600;
        font-size: 29px;
        color: #444;
        text-decoration: none;
        display: block;
        padding: 3px 8px 7px 9px;
    }

    .cto-toolbar__close a:hover {
        color: #666;
        background: rgba(0, 0, 0, 0.03);
    }

    .cto-toolbar__clear {
        height: 40px;
        display: none;
    }

    .cto-toolbar--visible .cto-toolbar__clear {
        display: block;
    }

    .cto-toolbar input, .cto-toolbar select, .cto-toolbar button {
        font: inherit;
        color: inherit;
        line-height: 18px;
    }

    .cto-toolbar.ajax-loading .formbody {
        pointer-events: none;
        opacity: .5;
    }

    .cto-toolbar .formbody {
        display: flex;
        align-items: baseline;
        justify-content: flex-end;
        padding: 5px 0;
        margin: 0 .5em 0 0;
        background: none;
    }

    .cto-toolbar .formbody > div {
        display: flex;
        align-items: baseline;
        margin-left: 1em;
    }

    @media only screen and (max-width: 676px) {
        .cto-toolbar .formbody {
            display: block;
            text-align: right;
        }

        .cto-toolbar .formbody > div {
            justify-content: flex-end;
            padding: 3px 0;
        }
    }

    .cto-toolbar label {
        width: auto;
        margin: 0 3px 0 0;
    }

    .cto-toolbar input[type=\"text\"] {
        margin: 0;
        width: auto;
        box-sizing: border-box;
        padding: 4px 6px 5px;
        border: 1px solid #aaa;
        border-radius: 2px;
        background-color: #fff;
        -moz-appearance: none;
        -webkit-appearance: none;
    }

    .cto-toolbar .tl_select {
        margin: 0;
        width: auto;
        box-sizing: border-box;
        border: 1px solid #aaa;
        padding: 4px 22px 5px 6px;
        border-radius: 2px;
        background: #fff url(";
        // line 146
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("system/themes/flexible/icons/down.svg"), "contao_html", null, true);
        yield ") right -16px center no-repeat;
        background-origin: content-box;
        cursor: pointer;
        text-transform: none;
        -moz-appearance: none;
        -webkit-appearance: none;
    }

    .cto-toolbar .tl_submit {
        margin: 0 0 0 6px;
        padding: 4px 10px 5px;
        border: 1px solid #aaa;
        border-radius: 2px;
        box-sizing: border-box;
        cursor: pointer;
        background: #eee;
        transition: background .2s ease;
        font-family: inherit;
        font-size: inherit;
        color: inherit;
        line-height: 18px;
        text-decoration: none;
    }

    @media only screen and (max-width: 676px) {
        .cto-toolbar .tl_submit {
            margin-top: 3px;
            margin-bottom: 1px;
        }
    }

    .cto-toolbar .tl_submit:hover {
        color: inherit;
        background-color: #f6f6f6;
    }

    .cto-toolbar .tl_submit:active {
        color: #aaa;
    }

    .cto-toolbar .badge-title {
        align-self: center;
        margin: 0 auto 0 9px;
        border-radius: 8px;
        padding: 2px 5px;
        background: #0f1c26;
        color: #fff;
        font-size: .75rem;
        font-weight: 600;
    }

    @media (-webkit-min-device-pixel-ratio:2),(min-resolution:192dpi) {
        .cto-toolbar .badge-title {
            font-weight: 500;
        }
    }

    @media only screen and (max-width: 676px) {
        .cto-toolbar .badge-title {
            float: left;
            margin: 3px auto 0 8px;
        }
    }
</style>

";
        // line 211
        $context["script_nonce"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["csp_handler"]) || array_key_exists("csp_handler", $context) ? $context["csp_handler"] : (function () { throw new RuntimeError('Variable "csp_handler" does not exist.', 211, $this->source); })()), "getNonce", ["script-src"], "method", false, false, false, 211);
        // line 212
        yield "<script";
        if ((($tmp = (isset($context["script_nonce"]) || array_key_exists("script_nonce", $context) ? $context["script_nonce"] : (function () { throw new RuntimeError('Variable "script_nonce" does not exist.', 212, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " nonce=\"";
            yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["script_nonce"]) || array_key_exists("script_nonce", $context) ? $context["script_nonce"] : (function () { throw new RuntimeError('Variable "script_nonce" does not exist.', 212, $this->source); })()), "contao_html", null, true);
            yield "\"";
        }
        yield ">
    (function () {
        const toolbar = document.createElement('div');
        toolbar.classList.add('cto-toolbar');
        document.querySelector('body').prepend(toolbar);

        function request(method, uri, body, callback, addClass = true) {
            body = body || null;
            const request = new XMLHttpRequest();
            request.open(method, uri, true);
            request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            if (body instanceof URLSearchParams) {
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=UTF-8');
            }

            if (addClass) {
                toolbar.classList.add('ajax-loading');
            }

            request.onload = function () {
                toolbar.classList.remove('ajax-loading');
                callback.apply(this);
            };

            request.send(body)
        }

        // Initialize toolbar
        if ('hidden' === localStorage.getItem('contao/previewBar/displayState')) {
            toolbar.classList.add('cto-toolbar--hidden');
        } else {
            toolbar.classList.add('cto-toolbar--visible');
        }

        // Fetch toolbar
        request('GET', '";
        // line 248
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 248, $this->source); })()), "contao_html", null, true);
        yield "', null, function () {
            if (200 === this.status) {
                toolbar.innerHTML = this.responseText;

                document.querySelectorAll('.cto-toolbar__share-url').forEach((link) => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        window.open(link.href+'&url='+location.href);
                        return false;
                    });
                })

                const event = new Event('cto-toolbar-loaded');
                window.dispatchEvent(event);
            } else {
                toolbar.innerHTML = '<p>Error while loading the preview bar.</p>';
            }
        });

        // Js for the authenticator
        window.addEventListener(\"cto-toolbar-loaded\", function () {
            const form = toolbar.querySelector('input[name=\"FORM_SUBMIT\"][value=\"tl_switch\"]').form;

            if (!form) {
                return;
            }

            const userField = form.querySelector('input[name=\"user\"]');

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(form);

                request('POST', form.action, formData, function () {
                    if (422 !== this.status) {
                        location.reload();
                    } else if (userField) {
                        userField.setCustomValidity(this.responseText || 'An unknown error occurred.');
                        userField.reportValidity();
                    }
                });
            });

            if (userField) {
                // Reset custom validity message
                form.querySelector('[type=\"submit\"]').addEventListener('click', function () {
                    userField.setCustomValidity('');
                });

                if (document.createElement('datalist') && window.HTMLDataListElement) {
                    let timer;

                    userField.addEventListener('input', function () {
                        userField.setCustomValidity('');

                        if (userField.value.length < 2) {
                            return;
                        }

                        if (timer) {
                            clearTimeout(timer);
                        }

                        timer = setTimeout(function () {
                            const body = {
                                FORM_SUBMIT: 'datalist_members',
                                REQUEST_TOKEN: form.querySelector('input[name=\"REQUEST_TOKEN\"]').value,
                                value: userField.value
                            };

                            const userList = form.querySelector('datalist[id=\"userlist\"]');

                            request('POST', form.action, new URLSearchParams(body), function () {
                                userList.innerHTML = '';
                                JSON.parse(this.response).forEach(item => {
                                    const option = document.createElement('option');
                                    option.value = item;
                                    userList.appendChild(option);
                                });
                            }, false);
                        }, 300);
                    });
                }
            }

            // Collapse toolbar
            Array.from([toolbar.querySelector('.cto-toolbar__close'), toolbar.querySelector('.cto-toolbar__open')]).forEach(toggle => {
                toggle.addEventListener('click', function (event) {
                    event.preventDefault();

                    const toolbar = event.currentTarget.closest('.cto-toolbar');
                    if (toolbar.classList.contains('cto-toolbar--hidden')) {
                        localStorage.setItem('contao/previewBar/displayState', 'visible');
                        toolbar.classList.replace('cto-toolbar--hidden', 'cto-toolbar--visible');
                    } else {
                        localStorage.setItem('contao/previewBar/displayState', 'hidden');
                        toolbar.classList.replace('cto-toolbar--visible', 'cto-toolbar--hidden');
                    }

                });
            });
        });

        // Copy published link to clipboard
        window.addEventListener('cto-toolbar-loaded', function() {
            const copyButton = document.getElementById('copyPublishedPath');

            copyButton.addEventListener('click', function(event) {
                const href = window.location.href.replace('";
        // line 356
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["preview_script"]) || array_key_exists("preview_script", $context) ? $context["preview_script"] : (function () { throw new RuntimeError('Variable "preview_script" does not exist.', 356, $this->source); })()), "js"), "contao_html", null, true);
        yield "', '');

                function clipboardFallback() {
                    const input = document.createElement('input');
                    input.value = href;
                    document.body.appendChild(input);
                    input.select();
                    input.setSelectionRange(0, 99999);
                    document.execCommand('copy');
                    document.body.removeChild(input);
                }

                event.preventDefault();

                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(href).catch(clipboardFallback);
                } else {
                    clipboardFallback();
                }
            });
        });
    })();
</script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Frontend/preview_toolbar_base_js.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  428 => 356,  317 => 248,  273 => 212,  271 => 211,  203 => 146,  52 => 3,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% do csp_handler.addSource('img-src', 'data:') %}
{% set style_nonce = csp_handler.getNonce('style-src') %}
<style{% if style_nonce %} nonce=\"{{ style_nonce }}\"{% endif %}>
    .cto-toolbar {
        font-family: -apple-system,system-ui,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 1;
        color: #444;
    }

    @media (-webkit-min-device-pixel-ratio:2),(min-resolution:192dpi) {
        .cto-toolbar {
            font-weight: 300;
            color: #222;
        }
    }

    .cto-toolbar__open {
        width: 36px;
        height: 36px;
        position: fixed;
        right: 0;
        top: 0;
        background: #222;
        border-radius: 0 0 0 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99999;
    }

    .cto-toolbar--visible .cto-toolbar__open {
        display: none;
    }

    .cto-toolbar__open a {
        opacity: .7;
    }

    .cto-toolbar__inside {
        display: grid;
        grid-template: auto / 1fr auto;
        width: 100%;
        background: #f2f2f2;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 99999;
        border-bottom: 1px solid #ccc;
    }

    .cto-toolbar--hidden .cto-toolbar__inside {
        display: none;
    }

    .cto-toolbar__close {
        border-left: 1px solid #ccc;
    }

    .cto-toolbar__close a {
        font-weight: 600;
        font-size: 29px;
        color: #444;
        text-decoration: none;
        display: block;
        padding: 3px 8px 7px 9px;
    }

    .cto-toolbar__close a:hover {
        color: #666;
        background: rgba(0, 0, 0, 0.03);
    }

    .cto-toolbar__clear {
        height: 40px;
        display: none;
    }

    .cto-toolbar--visible .cto-toolbar__clear {
        display: block;
    }

    .cto-toolbar input, .cto-toolbar select, .cto-toolbar button {
        font: inherit;
        color: inherit;
        line-height: 18px;
    }

    .cto-toolbar.ajax-loading .formbody {
        pointer-events: none;
        opacity: .5;
    }

    .cto-toolbar .formbody {
        display: flex;
        align-items: baseline;
        justify-content: flex-end;
        padding: 5px 0;
        margin: 0 .5em 0 0;
        background: none;
    }

    .cto-toolbar .formbody > div {
        display: flex;
        align-items: baseline;
        margin-left: 1em;
    }

    @media only screen and (max-width: 676px) {
        .cto-toolbar .formbody {
            display: block;
            text-align: right;
        }

        .cto-toolbar .formbody > div {
            justify-content: flex-end;
            padding: 3px 0;
        }
    }

    .cto-toolbar label {
        width: auto;
        margin: 0 3px 0 0;
    }

    .cto-toolbar input[type=\"text\"] {
        margin: 0;
        width: auto;
        box-sizing: border-box;
        padding: 4px 6px 5px;
        border: 1px solid #aaa;
        border-radius: 2px;
        background-color: #fff;
        -moz-appearance: none;
        -webkit-appearance: none;
    }

    .cto-toolbar .tl_select {
        margin: 0;
        width: auto;
        box-sizing: border-box;
        border: 1px solid #aaa;
        padding: 4px 22px 5px 6px;
        border-radius: 2px;
        background: #fff url({{ asset('system/themes/flexible/icons/down.svg') }}) right -16px center no-repeat;
        background-origin: content-box;
        cursor: pointer;
        text-transform: none;
        -moz-appearance: none;
        -webkit-appearance: none;
    }

    .cto-toolbar .tl_submit {
        margin: 0 0 0 6px;
        padding: 4px 10px 5px;
        border: 1px solid #aaa;
        border-radius: 2px;
        box-sizing: border-box;
        cursor: pointer;
        background: #eee;
        transition: background .2s ease;
        font-family: inherit;
        font-size: inherit;
        color: inherit;
        line-height: 18px;
        text-decoration: none;
    }

    @media only screen and (max-width: 676px) {
        .cto-toolbar .tl_submit {
            margin-top: 3px;
            margin-bottom: 1px;
        }
    }

    .cto-toolbar .tl_submit:hover {
        color: inherit;
        background-color: #f6f6f6;
    }

    .cto-toolbar .tl_submit:active {
        color: #aaa;
    }

    .cto-toolbar .badge-title {
        align-self: center;
        margin: 0 auto 0 9px;
        border-radius: 8px;
        padding: 2px 5px;
        background: #0f1c26;
        color: #fff;
        font-size: .75rem;
        font-weight: 600;
    }

    @media (-webkit-min-device-pixel-ratio:2),(min-resolution:192dpi) {
        .cto-toolbar .badge-title {
            font-weight: 500;
        }
    }

    @media only screen and (max-width: 676px) {
        .cto-toolbar .badge-title {
            float: left;
            margin: 3px auto 0 8px;
        }
    }
</style>

{% set script_nonce = csp_handler.getNonce('script-src') %}
<script{% if script_nonce %} nonce=\"{{ script_nonce }}\"{% endif %}>
    (function () {
        const toolbar = document.createElement('div');
        toolbar.classList.add('cto-toolbar');
        document.querySelector('body').prepend(toolbar);

        function request(method, uri, body, callback, addClass = true) {
            body = body || null;
            const request = new XMLHttpRequest();
            request.open(method, uri, true);
            request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            if (body instanceof URLSearchParams) {
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=UTF-8');
            }

            if (addClass) {
                toolbar.classList.add('ajax-loading');
            }

            request.onload = function () {
                toolbar.classList.remove('ajax-loading');
                callback.apply(this);
            };

            request.send(body)
        }

        // Initialize toolbar
        if ('hidden' === localStorage.getItem('contao/previewBar/displayState')) {
            toolbar.classList.add('cto-toolbar--hidden');
        } else {
            toolbar.classList.add('cto-toolbar--visible');
        }

        // Fetch toolbar
        request('GET', '{{ action }}', null, function () {
            if (200 === this.status) {
                toolbar.innerHTML = this.responseText;

                document.querySelectorAll('.cto-toolbar__share-url').forEach((link) => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        window.open(link.href+'&url='+location.href);
                        return false;
                    });
                })

                const event = new Event('cto-toolbar-loaded');
                window.dispatchEvent(event);
            } else {
                toolbar.innerHTML = '<p>Error while loading the preview bar.</p>';
            }
        });

        // Js for the authenticator
        window.addEventListener(\"cto-toolbar-loaded\", function () {
            const form = toolbar.querySelector('input[name=\"FORM_SUBMIT\"][value=\"tl_switch\"]').form;

            if (!form) {
                return;
            }

            const userField = form.querySelector('input[name=\"user\"]');

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(form);

                request('POST', form.action, formData, function () {
                    if (422 !== this.status) {
                        location.reload();
                    } else if (userField) {
                        userField.setCustomValidity(this.responseText || 'An unknown error occurred.');
                        userField.reportValidity();
                    }
                });
            });

            if (userField) {
                // Reset custom validity message
                form.querySelector('[type=\"submit\"]').addEventListener('click', function () {
                    userField.setCustomValidity('');
                });

                if (document.createElement('datalist') && window.HTMLDataListElement) {
                    let timer;

                    userField.addEventListener('input', function () {
                        userField.setCustomValidity('');

                        if (userField.value.length < 2) {
                            return;
                        }

                        if (timer) {
                            clearTimeout(timer);
                        }

                        timer = setTimeout(function () {
                            const body = {
                                FORM_SUBMIT: 'datalist_members',
                                REQUEST_TOKEN: form.querySelector('input[name=\"REQUEST_TOKEN\"]').value,
                                value: userField.value
                            };

                            const userList = form.querySelector('datalist[id=\"userlist\"]');

                            request('POST', form.action, new URLSearchParams(body), function () {
                                userList.innerHTML = '';
                                JSON.parse(this.response).forEach(item => {
                                    const option = document.createElement('option');
                                    option.value = item;
                                    userList.appendChild(option);
                                });
                            }, false);
                        }, 300);
                    });
                }
            }

            // Collapse toolbar
            Array.from([toolbar.querySelector('.cto-toolbar__close'), toolbar.querySelector('.cto-toolbar__open')]).forEach(toggle => {
                toggle.addEventListener('click', function (event) {
                    event.preventDefault();

                    const toolbar = event.currentTarget.closest('.cto-toolbar');
                    if (toolbar.classList.contains('cto-toolbar--hidden')) {
                        localStorage.setItem('contao/previewBar/displayState', 'visible');
                        toolbar.classList.replace('cto-toolbar--hidden', 'cto-toolbar--visible');
                    } else {
                        localStorage.setItem('contao/previewBar/displayState', 'hidden');
                        toolbar.classList.replace('cto-toolbar--visible', 'cto-toolbar--hidden');
                    }

                });
            });
        });

        // Copy published link to clipboard
        window.addEventListener('cto-toolbar-loaded', function() {
            const copyButton = document.getElementById('copyPublishedPath');

            copyButton.addEventListener('click', function(event) {
                const href = window.location.href.replace('{{ preview_script|escape('js') }}', '');

                function clipboardFallback() {
                    const input = document.createElement('input');
                    input.value = href;
                    document.body.appendChild(input);
                    input.select();
                    input.setSelectionRange(0, 99999);
                    document.execCommand('copy');
                    document.body.removeChild(input);
                }

                event.preventDefault();

                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(href).catch(clipboardFallback);
                } else {
                    clipboardFallback();
                }
            });
        });
    })();
</script>
", "@ContaoCore/Frontend/preview_toolbar_base_js.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Frontend/preview_toolbar_base_js.html.twig");
    }
}
