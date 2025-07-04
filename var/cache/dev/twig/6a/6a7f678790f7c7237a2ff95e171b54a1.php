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

/* @ContaoCore/Error/layout.html.twig */
class __TwigTemplate_4829813a353c86eda1cc91a1dfefddd5 extends Template
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
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'style' => [$this, 'block_style'],
            'message' => [$this, 'block_message'],
            'main' => [$this, 'block_main'],
            'hint' => [$this, 'block_hint'],
            'body_end' => [$this, 'block_body_end'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Error/layout.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Error/layout.html.twig"));

        // line 2
        yield "<!DOCTYPE html>
<html lang=\"";
        // line 3
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["language"]) || array_key_exists("language", $context) ? $context["language"] : (function () { throw new RuntimeError('Variable "language" does not exist.', 3, $this->source); })()), "contao_html", null, true);
        yield "\">
<head>
    ";
        // line 5
        yield from $this->unwrap()->yieldBlock('head', $context, $blocks);
        // line 110
        yield "</head>
<body>
    <div id=\"header\">
        <div class=\"wrap\">
            <div class=\"header-logo\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"200\" height=\"54.32\" viewBox=\"0 0 574.02 155.91\">
                    <path d=\"M271.01 121.44a31.45 31.45 0 0 1-23.07-9.38c-8.64-8.65-8.42-19.34-8.42-34.1s-.23-25.46 8.42-34.12a31.5 31.5 0 0 1 23.07-9.38c16 0 28.47 9.13 31.48 27h-17c-1.68-6.85-6-12.12-14.41-12.12a13.84 13.84 0 0 0-10.68 4.41c-3.25 3.64-4.22 7.7-4.22 24.17s1 20.51 4.22 24.14a13.83 13.83 0 0 0 10.68 4.43c8.41 0 12.73-5.28 14.41-12.12h17c-3.01 17.93-15.62 27.07-31.48 27.07zm82.28-7.69c-3.84 4.09-10.21 7.69-19.46 7.69s-15.5-3.61-19.35-7.69c-5.64-5.88-7.08-13-7.08-24.38s1.44-18.38 7.08-24.28c3.85-4.08 10.1-7.66 19.35-7.66s15.61 3.58 19.46 7.66c5.65 5.89 7.09 13 7.09 24.28s-1.43 18.49-7.08 24.37zm-12.14-39.52a9.86 9.86 0 0 0-7.32-2.76 9.63 9.63 0 0 0-7.22 2.76c-3.23 3.25-3.6 8.64-3.6 15.14s.37 12 3.6 15.23a9.6 9.6 0 0 0 7.22 2.79 9.83 9.83 0 0 0 7.32-2.79c3.25-3.24 3.61-8.76 3.61-15.23s-.35-11.89-3.6-15.14zm63.41 46.49V82.87c0-8.53-5.4-11.4-10.33-11.4s-10.44 2.87-10.44 11.4v37.84h-15.63V58.12h15.28v5.78a21.33 21.33 0 0 1 15.6-6.48c6.26 0 11.3 2 14.78 5.53 5.06 5 6.37 10.9 6.37 17.76v40zm45.16 0c-12.73 0-18.15-9-18.15-17.91v-31h-6.56V59.95h6.6v-18.5c6.53 0 15.63-3.43 15.63-3.43v21.93h11v11.89h-11v30c0 3.6 1.69 5.65 5.42 5.65h5.63v13.21zm49 0v-5.4c-4.2 4.22-8.16 6-15.37 6s-12.25-1.79-16-5.54a20.08 20.08 0 0 1-5.16-14.06c0-10 6.84-18.12 21.38-18.12h14.76v-3.13c0-6.83-3.34-9.86-11.63-9.86-6 0-8.77 1.45-12 5.18l-10-9.73c6.13-6.73 12.14-8.63 22.59-8.63 17.54 0 26.66 7.43 26.66 22.09v41.2zm-.37-26.41h-12.34c-5.65 0-8.77 2.63-8.77 7.06s2.88 7.21 9 7.21c4.31 0 7.09-.34 9.84-3 1.67-1.57 2.27-4.07 2.27-7.93zm68.63 19.45c-3.84 4.09-10.21 7.69-19.47 7.69s-15.5-3.61-19.34-7.69c-5.65-5.88-7.08-13-7.08-24.38s1.43-18.38 7.08-24.28c3.84-4.08 10.09-7.66 19.34-7.66s15.63 3.58 19.47 7.66c5.64 5.89 7.07 13 7.07 24.28s-1.46 18.48-7.1 24.36zm-12.13-39.52a9.91 9.91 0 0 0-7.34-2.76 9.56 9.56 0 0 0-7.2 2.76c-3.25 3.25-3.62 8.64-3.62 15.14s.37 12 3.62 15.23a9.53 9.53 0 0 0 7.2 2.79 9.88 9.88 0 0 0 7.34-2.79c3.23-3.24 3.59-8.76 3.59-15.23s-.43-11.9-3.62-15.15z\" fill=\"#f47c00\"/>
                    <path d=\"M11.82-.05A11.81 11.81 0 0 0 .01 11.74v132.42a11.81 11.81 0 0 0 11.81 11.79h154.95a11.81 11.81 0 0 0 11.82-11.74V11.74A11.81 11.81 0 0 0 166.77-.05z\" fill=\"#fff\"/>
                    <path d=\"M15.88 94.55c5 23.26 9.16 45.41 23.73 61.35H11.82A11.81 11.81 0 0 1 .01 144.16V11.74A11.81 11.81 0 0 1 11.82-.05H31.9a76.8 76.8 0 0 0-12.78 15.1c-15.89 24.35-9.36 50.9-3.24 79.5zM166.77-.05h-31.51c7.46 7.46 13.75 17.12 18.5 29.13l-47.9 10.11c-5.25-10.06-13.23-18.43-28.84-15.14-8.61 1.82-14.32 6.65-16.85 11.94-3.11 6.52-4.64 13.83 2.8 48.57s11.82 40.8 17.32 45.5c4.47 3.8 11.68 5.91 20.29 4.09 15.62-3.29 19.47-14.16 20.15-25.47l47.9-10.12c1.13 24.78-6.54 44-20.08 57.29h18.22a11.81 11.81 0 0 0 11.82-11.74V11.74A11.81 11.81 0 0 0 166.77-.05z\" fill=\"#f47c00\"/>
                </svg>
            </div>
        </div>
    </div>
    <div id=\"content\">
        <div class=\"wrap\">
            <div class=\"error\">
                ";
        // line 126
        yield from $this->unwrap()->yieldBlock('message', $context, $blocks);
        // line 127
        yield "                <div class=\"block-error\">
                    <div class=\"inner\">
                        <div class=\"text-error\">
                            ";
        // line 130
        yield from $this->unwrap()->yieldBlock('main', $context, $blocks);
        // line 153
        yield "                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id=\"footer\">
        <div class=\"wrap\">
            ";
        // line 161
        yield from $this->unwrap()->yieldBlock('hint', $context, $blocks);
        // line 162
        yield "        </div>
    </div>

    ";
        // line 165
        yield from $this->unwrap()->yieldBlock('body_end', $context, $blocks);
        // line 166
        yield "</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head"));

        // line 6
        yield "        <meta charset=\"utf-8\">
        <title>";
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <meta name=\"generator\" content=\"Contao Open Source CMS\">
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0,shrink-to-fit=no\">
        ";
        // line 10
        yield from $this->unwrap()->yieldBlock('style', $context, $blocks);
        // line 109
        yield "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["statusCode"]) || array_key_exists("statusCode", $context) ? $context["statusCode"] : (function () { throw new RuntimeError('Variable "statusCode" does not exist.', 7, $this->source); })()), "contao_html", null, true);
        yield " Error";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_style(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "style"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "style"));

        // line 11
        yield "            <style>
                html {
                    background: #fff;
                }
                body {
                    margin: 0;
                    padding: 0;
                    font-family: -apple-system,system-ui,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-weight: 400;
                    font-size: .875rem;
                    color: #444;
                }
                h1, h2, h3 {
                    font-weight: 600;
                }
                @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
                    body {
                        color: #222;
                        font-weight: 300;
                    }
                    h1, h2, h3, strong, b, th {
                        font-weight: 500;
                    }
                }
                a, a:visited {
                    text-decoration: none;
                    color: #e4790f;
                }
                a:hover {
                    text-decoration: underline;
                }
                h1 {
                    margin: 0;
                    padding-bottom: 2%;
                    font-size: 3em;
                }
                h2, h3 {
                    font-size: 1.5em;
                }
                pre, code {
                    font: 300 .75rem/1.25 \"Roboto Mono\", monospace;
                }
                table {
                    margin: 1.25em 0 1em;
                    border-collapse: collapse;
                    border-spacing: 0;
                }
                th, td {
                    text-align: left;
                    padding: 2px 10px 4px;
                    border: solid #ccc;
                    border-width: 1px 0;
                }
                th {
                    background: #f3f3f3;
                }
                #header {
                    padding: 12px 0 10px;
                }
                #content {
                    padding: 3% 0;
                    background-color: #eee;
                }
                #footer {
                    font-size: 0.75em;
                    text-align: center;
                    padding: .5em 0;
                    color: #808080;
                }
                .wrap {
                    width: 60%;
                    margin: 0 auto;
                    padding: 1em;
                    overflow: hidden;
                }
                .header-logo {
                    display: inline-block;
                }
                .block-error {
                    margin-bottom: 20px;
                    background-color: #fff;
                    border: 1px solid #dfdfdf;
                    border-radius: 16px;
                    padding: 15px 30px 24px;
                    word-wrap: break-word;
                    overflow: hidden;
                }
                .block-error:before {
                    float: left;
                    content: \"</\";
                    font-size: 5em;
                    color: #ccc;
                }
                .block-error .inner {
                    padding-left: 7em;
                }
            </style>
       ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 126
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_message(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "message"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "message"));

        yield "<h1 data-trans=\"title\">";
        yield from         $this->unwrap()->yieldBlock("title", $context, $blocks);
        yield "</h1>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 130
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        // line 131
        yield "                                ";
        if (        $this->unwrap()->hasBlock("matter", $context, $blocks)) {
            // line 132
            yield "                                    ";
            $context["_block"] =             $this->unwrap()->renderBlock("matter", $context, $blocks);
            // line 133
            yield "                                    ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(Twig\Extension\CoreExtension::trim((isset($context["_block"]) || array_key_exists("_block", $context) ? $context["_block"] : (function () { throw new RuntimeError('Variable "_block" does not exist.', 133, $this->source); })())))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 134
                yield "                                        <h2 data-trans=\"XPT.matter\">";
                yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.matter", [], "contao_exception"), "contao_html", null, true);
                yield "</h2>
                                        ";
                // line 135
                yield (isset($context["_block"]) || array_key_exists("_block", $context) ? $context["_block"] : (function () { throw new RuntimeError('Variable "_block" does not exist.', 135, $this->source); })());
                yield "
                                    ";
            }
            // line 137
            yield "                                ";
        }
        // line 138
        yield "                                ";
        if (        $this->unwrap()->hasBlock("howToFix", $context, $blocks)) {
            // line 139
            yield "                                    ";
            $context["_block"] =             $this->unwrap()->renderBlock("howToFix", $context, $blocks);
            // line 140
            yield "                                    ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(Twig\Extension\CoreExtension::trim((isset($context["_block"]) || array_key_exists("_block", $context) ? $context["_block"] : (function () { throw new RuntimeError('Variable "_block" does not exist.', 140, $this->source); })())))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 141
                yield "                                        <h2 data-trans=\"XPT.howToFix\">";
                yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.howToFix", [], "contao_exception"), "contao_html", null, true);
                yield "</h2>
                                        ";
                // line 142
                yield (isset($context["_block"]) || array_key_exists("_block", $context) ? $context["_block"] : (function () { throw new RuntimeError('Variable "_block" does not exist.', 142, $this->source); })());
                yield "
                                    ";
            }
            // line 144
            yield "                                ";
        }
        // line 145
        yield "                                ";
        if (        $this->unwrap()->hasBlock("explain", $context, $blocks)) {
            // line 146
            yield "                                    ";
            $context["_block"] =             $this->unwrap()->renderBlock("explain", $context, $blocks);
            // line 147
            yield "                                    ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(Twig\Extension\CoreExtension::trim((isset($context["_block"]) || array_key_exists("_block", $context) ? $context["_block"] : (function () { throw new RuntimeError('Variable "_block" does not exist.', 147, $this->source); })())))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 148
                yield "                                        <h3 data-trans=\"XPT.more\">";
                yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.more", [], "contao_exception"), "contao_html", null, true);
                yield "</h3>
                                        ";
                // line 149
                yield (isset($context["_block"]) || array_key_exists("_block", $context) ? $context["_block"] : (function () { throw new RuntimeError('Variable "_block" does not exist.', 149, $this->source); })());
                yield "
                                    ";
            }
            // line 151
            yield "                                ";
        }
        // line 152
        yield "                            ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 161
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_hint(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hint"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hint"));

        yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.hint", [(isset($context["template"]) || array_key_exists("template", $context) ? $context["template"] : (function () { throw new RuntimeError('Variable "template" does not exist.', 161, $this->source); })())], "contao_exception");
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 165
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body_end(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_end"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_end"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Error/layout.html.twig";
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
        return array (  442 => 165,  419 => 161,  408 => 152,  405 => 151,  400 => 149,  395 => 148,  392 => 147,  389 => 146,  386 => 145,  383 => 144,  378 => 142,  373 => 141,  370 => 140,  367 => 139,  364 => 138,  361 => 137,  356 => 135,  351 => 134,  348 => 133,  345 => 132,  342 => 131,  329 => 130,  304 => 126,  196 => 11,  183 => 10,  159 => 7,  148 => 109,  146 => 10,  140 => 7,  137 => 6,  124 => 5,  111 => 166,  109 => 165,  104 => 162,  102 => 161,  92 => 153,  90 => 130,  85 => 127,  83 => 126,  65 => 110,  63 => 5,  58 => 3,  55 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% trans_default_domain 'contao_exception' %}
<!DOCTYPE html>
<html lang=\"{{ language }}\">
<head>
    {% block head %}
        <meta charset=\"utf-8\">
        <title>{% block title %}{{ statusCode }} Error{% endblock %}</title>
        <meta name=\"generator\" content=\"Contao Open Source CMS\">
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0,shrink-to-fit=no\">
        {% block style %}
            <style>
                html {
                    background: #fff;
                }
                body {
                    margin: 0;
                    padding: 0;
                    font-family: -apple-system,system-ui,\"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,\"Helvetica Neue\",sans-serif;
                    font-weight: 400;
                    font-size: .875rem;
                    color: #444;
                }
                h1, h2, h3 {
                    font-weight: 600;
                }
                @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
                    body {
                        color: #222;
                        font-weight: 300;
                    }
                    h1, h2, h3, strong, b, th {
                        font-weight: 500;
                    }
                }
                a, a:visited {
                    text-decoration: none;
                    color: #e4790f;
                }
                a:hover {
                    text-decoration: underline;
                }
                h1 {
                    margin: 0;
                    padding-bottom: 2%;
                    font-size: 3em;
                }
                h2, h3 {
                    font-size: 1.5em;
                }
                pre, code {
                    font: 300 .75rem/1.25 \"Roboto Mono\", monospace;
                }
                table {
                    margin: 1.25em 0 1em;
                    border-collapse: collapse;
                    border-spacing: 0;
                }
                th, td {
                    text-align: left;
                    padding: 2px 10px 4px;
                    border: solid #ccc;
                    border-width: 1px 0;
                }
                th {
                    background: #f3f3f3;
                }
                #header {
                    padding: 12px 0 10px;
                }
                #content {
                    padding: 3% 0;
                    background-color: #eee;
                }
                #footer {
                    font-size: 0.75em;
                    text-align: center;
                    padding: .5em 0;
                    color: #808080;
                }
                .wrap {
                    width: 60%;
                    margin: 0 auto;
                    padding: 1em;
                    overflow: hidden;
                }
                .header-logo {
                    display: inline-block;
                }
                .block-error {
                    margin-bottom: 20px;
                    background-color: #fff;
                    border: 1px solid #dfdfdf;
                    border-radius: 16px;
                    padding: 15px 30px 24px;
                    word-wrap: break-word;
                    overflow: hidden;
                }
                .block-error:before {
                    float: left;
                    content: \"</\";
                    font-size: 5em;
                    color: #ccc;
                }
                .block-error .inner {
                    padding-left: 7em;
                }
            </style>
       {% endblock %}
    {% endblock %}
</head>
<body>
    <div id=\"header\">
        <div class=\"wrap\">
            <div class=\"header-logo\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"200\" height=\"54.32\" viewBox=\"0 0 574.02 155.91\">
                    <path d=\"M271.01 121.44a31.45 31.45 0 0 1-23.07-9.38c-8.64-8.65-8.42-19.34-8.42-34.1s-.23-25.46 8.42-34.12a31.5 31.5 0 0 1 23.07-9.38c16 0 28.47 9.13 31.48 27h-17c-1.68-6.85-6-12.12-14.41-12.12a13.84 13.84 0 0 0-10.68 4.41c-3.25 3.64-4.22 7.7-4.22 24.17s1 20.51 4.22 24.14a13.83 13.83 0 0 0 10.68 4.43c8.41 0 12.73-5.28 14.41-12.12h17c-3.01 17.93-15.62 27.07-31.48 27.07zm82.28-7.69c-3.84 4.09-10.21 7.69-19.46 7.69s-15.5-3.61-19.35-7.69c-5.64-5.88-7.08-13-7.08-24.38s1.44-18.38 7.08-24.28c3.85-4.08 10.1-7.66 19.35-7.66s15.61 3.58 19.46 7.66c5.65 5.89 7.09 13 7.09 24.28s-1.43 18.49-7.08 24.37zm-12.14-39.52a9.86 9.86 0 0 0-7.32-2.76 9.63 9.63 0 0 0-7.22 2.76c-3.23 3.25-3.6 8.64-3.6 15.14s.37 12 3.6 15.23a9.6 9.6 0 0 0 7.22 2.79 9.83 9.83 0 0 0 7.32-2.79c3.25-3.24 3.61-8.76 3.61-15.23s-.35-11.89-3.6-15.14zm63.41 46.49V82.87c0-8.53-5.4-11.4-10.33-11.4s-10.44 2.87-10.44 11.4v37.84h-15.63V58.12h15.28v5.78a21.33 21.33 0 0 1 15.6-6.48c6.26 0 11.3 2 14.78 5.53 5.06 5 6.37 10.9 6.37 17.76v40zm45.16 0c-12.73 0-18.15-9-18.15-17.91v-31h-6.56V59.95h6.6v-18.5c6.53 0 15.63-3.43 15.63-3.43v21.93h11v11.89h-11v30c0 3.6 1.69 5.65 5.42 5.65h5.63v13.21zm49 0v-5.4c-4.2 4.22-8.16 6-15.37 6s-12.25-1.79-16-5.54a20.08 20.08 0 0 1-5.16-14.06c0-10 6.84-18.12 21.38-18.12h14.76v-3.13c0-6.83-3.34-9.86-11.63-9.86-6 0-8.77 1.45-12 5.18l-10-9.73c6.13-6.73 12.14-8.63 22.59-8.63 17.54 0 26.66 7.43 26.66 22.09v41.2zm-.37-26.41h-12.34c-5.65 0-8.77 2.63-8.77 7.06s2.88 7.21 9 7.21c4.31 0 7.09-.34 9.84-3 1.67-1.57 2.27-4.07 2.27-7.93zm68.63 19.45c-3.84 4.09-10.21 7.69-19.47 7.69s-15.5-3.61-19.34-7.69c-5.65-5.88-7.08-13-7.08-24.38s1.43-18.38 7.08-24.28c3.84-4.08 10.09-7.66 19.34-7.66s15.63 3.58 19.47 7.66c5.64 5.89 7.07 13 7.07 24.28s-1.46 18.48-7.1 24.36zm-12.13-39.52a9.91 9.91 0 0 0-7.34-2.76 9.56 9.56 0 0 0-7.2 2.76c-3.25 3.25-3.62 8.64-3.62 15.14s.37 12 3.62 15.23a9.53 9.53 0 0 0 7.2 2.79 9.88 9.88 0 0 0 7.34-2.79c3.23-3.24 3.59-8.76 3.59-15.23s-.43-11.9-3.62-15.15z\" fill=\"#f47c00\"/>
                    <path d=\"M11.82-.05A11.81 11.81 0 0 0 .01 11.74v132.42a11.81 11.81 0 0 0 11.81 11.79h154.95a11.81 11.81 0 0 0 11.82-11.74V11.74A11.81 11.81 0 0 0 166.77-.05z\" fill=\"#fff\"/>
                    <path d=\"M15.88 94.55c5 23.26 9.16 45.41 23.73 61.35H11.82A11.81 11.81 0 0 1 .01 144.16V11.74A11.81 11.81 0 0 1 11.82-.05H31.9a76.8 76.8 0 0 0-12.78 15.1c-15.89 24.35-9.36 50.9-3.24 79.5zM166.77-.05h-31.51c7.46 7.46 13.75 17.12 18.5 29.13l-47.9 10.11c-5.25-10.06-13.23-18.43-28.84-15.14-8.61 1.82-14.32 6.65-16.85 11.94-3.11 6.52-4.64 13.83 2.8 48.57s11.82 40.8 17.32 45.5c4.47 3.8 11.68 5.91 20.29 4.09 15.62-3.29 19.47-14.16 20.15-25.47l47.9-10.12c1.13 24.78-6.54 44-20.08 57.29h18.22a11.81 11.81 0 0 0 11.82-11.74V11.74A11.81 11.81 0 0 0 166.77-.05z\" fill=\"#f47c00\"/>
                </svg>
            </div>
        </div>
    </div>
    <div id=\"content\">
        <div class=\"wrap\">
            <div class=\"error\">
                {% block message %}<h1 data-trans=\"title\">{{ block('title') }}</h1>{% endblock %}
                <div class=\"block-error\">
                    <div class=\"inner\">
                        <div class=\"text-error\">
                            {% block main %}
                                {% if block('matter') is defined %}
                                    {% set _block = block('matter') %}
                                    {% if _block|trim is not empty %}
                                        <h2 data-trans=\"XPT.matter\">{{ 'XPT.matter'|trans }}</h2>
                                        {{ _block|raw }}
                                    {% endif %}
                                {% endif %}
                                {% if block('howToFix') is defined %}
                                    {% set _block = block('howToFix') %}
                                    {% if _block|trim is not empty %}
                                        <h2 data-trans=\"XPT.howToFix\">{{ 'XPT.howToFix'|trans }}</h2>
                                        {{ _block|raw }}
                                    {% endif %}
                                {% endif %}
                                {% if block('explain') is defined %}
                                    {% set _block = block('explain') %}
                                    {% if _block|trim is not empty %}
                                        <h3 data-trans=\"XPT.more\">{{ 'XPT.more'|trans }}</h3>
                                        {{ _block|raw }}
                                    {% endif %}
                                {% endif %}
                            {% endblock %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id=\"footer\">
        <div class=\"wrap\">
            {% block hint %}{{ 'XPT.hint'|trans([template])|raw }}{% endblock %}
        </div>
    </div>

    {% block body_end %}{% endblock %}
</body>
</html>
", "@ContaoCore/Error/layout.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Error/layout.html.twig");
    }
}
