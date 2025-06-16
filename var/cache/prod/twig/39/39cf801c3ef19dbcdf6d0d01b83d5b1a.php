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

/* @ContaoCore/Backend/be_route_path.html.twig */
class __TwigTemplate_7861ce4b0a157dd072110a9180cb390d extends Template
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
        // line 2
        yield "<div class=\"w50 widget clr\">
    <h3>";
        // line 3
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.routePath.0", [], "contao_tl_page"), "contao_html", null, true);
        yield "</h3>
    <p class=\"info\">";
        // line 4
        yield ($context["path"] ?? null);
        yield "</p>
    <p class=\"tl_help tl_tip\" title=\"\">";
        // line 5
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.routePath.1", [], "contao_tl_page"), "contao_html", null, true);
        yield "</p>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Backend/be_route_path.html.twig";
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
        return array (  53 => 5,  49 => 4,  45 => 3,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoCore/Backend/be_route_path.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Backend/be_route_path.html.twig");
    }
}
