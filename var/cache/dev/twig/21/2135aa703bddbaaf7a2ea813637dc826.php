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

/* @WebProfiler/Icon/twig.svg */
class __TwigTemplate_35e149c6a67a733beb91bada98251a01 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Icon/twig.svg"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Icon/twig.svg"));

        // line 1
        yield "<svg xmlns=\"http://www.w3.org/2000/svg\" data-icon-name=\"icon-tabler-seeding\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\" role=\"img\">
    <title>Twig</title>
    <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>
    <path d=\"M12 10a6 6 0 0 0 -6 -6h-3v2a6 6 0 0 0 6 6h3\"></path>
    <path d=\"M12 14a6 6 0 0 1 6 -6h3v1a6 6 0 0 1 -6 6h-3\"></path>
    <line x1=\"12\" y1=\"20\" x2=\"12\" y2=\"10\"></line>
</svg>
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
        return "@WebProfiler/Icon/twig.svg";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<svg xmlns=\"http://www.w3.org/2000/svg\" data-icon-name=\"icon-tabler-seeding\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\" role=\"img\">
    <title>Twig</title>
    <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>
    <path d=\"M12 10a6 6 0 0 0 -6 -6h-3v2a6 6 0 0 0 6 6h3\"></path>
    <path d=\"M12 14a6 6 0 0 1 6 -6h3v1a6 6 0 0 1 -6 6h-3\"></path>
    <line x1=\"12\" y1=\"20\" x2=\"12\" y2=\"10\"></line>
</svg>
", "@WebProfiler/Icon/twig.svg", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/symfony/web-profiler-bundle/Resources/views/Icon/twig.svg");
    }
}
