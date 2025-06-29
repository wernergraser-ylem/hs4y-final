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

/* @WebProfiler/Icon/http-client.svg */
class __TwigTemplate_1eb6c119d515d883bbb8f4d3c90a4c02 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Icon/http-client.svg"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Icon/http-client.svg"));

        // line 1
        yield "<svg xmlns=\"http://www.w3.org/2000/svg\" data-icon-name=\"icon-tabler-affiliate\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">
    <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>
    <path d=\"M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275\"></path>
    <path d=\"M11.683 12.317l5.759 -5.759\"></path>
    <circle cx=\"5.5\" cy=\"5.5\" r=\"1.5\"></circle>
    <circle cx=\"18.5\" cy=\"5.5\" r=\"1.5\"></circle>
    <circle cx=\"18.5\" cy=\"18.5\" r=\"1.5\"></circle>
    <circle cx=\"8.5\" cy=\"15.5\" r=\"4.5\"></circle>
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
        return "@WebProfiler/Icon/http-client.svg";
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
        return new Source("<svg xmlns=\"http://www.w3.org/2000/svg\" data-icon-name=\"icon-tabler-affiliate\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">
    <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>
    <path d=\"M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275\"></path>
    <path d=\"M11.683 12.317l5.759 -5.759\"></path>
    <circle cx=\"5.5\" cy=\"5.5\" r=\"1.5\"></circle>
    <circle cx=\"18.5\" cy=\"5.5\" r=\"1.5\"></circle>
    <circle cx=\"18.5\" cy=\"18.5\" r=\"1.5\"></circle>
    <circle cx=\"8.5\" cy=\"15.5\" r=\"4.5\"></circle>
</svg>
", "@WebProfiler/Icon/http-client.svg", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/symfony/web-profiler-bundle/Resources/views/Icon/http-client.svg");
    }
}
