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

/* @WebProfiler/Icon/workflow.svg */
class __TwigTemplate_01c466b44a1b1892991445eecc9b99e8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Icon/workflow.svg"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Icon/workflow.svg"));

        // line 1
        yield "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">
   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>
   <path d=\"M12 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0\"></path>
   <path d=\"M7 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0\"></path>
   <path d=\"M17 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0\"></path>
   <path d=\"M7 8v2a2 2 0 0 0 2 2h6a2 2 0 0 0 2 -2v-2\"></path>
   <path d=\"M12 12l0 4\"></path>
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
        return "@WebProfiler/Icon/workflow.svg";
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
        return new Source("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">
   <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>
   <path d=\"M12 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0\"></path>
   <path d=\"M7 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0\"></path>
   <path d=\"M17 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0\"></path>
   <path d=\"M7 8v2a2 2 0 0 0 2 2h6a2 2 0 0 0 2 -2v-2\"></path>
   <path d=\"M12 12l0 4\"></path>
</svg>
", "@WebProfiler/Icon/workflow.svg", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/symfony/web-profiler-bundle/Resources/views/Icon/workflow.svg");
    }
}
