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

/* @ContaoCore/Backend/be_menu.html.twig */
class __TwigTemplate_1d6329a6d823094f9eba8f6edcdaa1af extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Backend/be_menu.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Backend/be_menu.html.twig"));

        // line 2
        yield "<nav
    id=\"tl_navigation\"
    data-controller=\"contao--toggle-navigation\"
    data-contao--toggle-navigation-collapsed-class=\"collapsed\"
    data-contao--toggle-navigation-url-value=\"";
        // line 6
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contao_backend");
        yield "\"
    data-contao--toggle-navigation-request-token-value=\"";
        // line 7
        yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["contao"]) || array_key_exists("contao", $context) ? $context["contao"] : (function () { throw new RuntimeError('Variable "contao" does not exist.', 7, $this->source); })()), "request_token", [], "any", false, false, false, 7), "contao_html", null, true);
        yield "\"
    data-contao--toggle-navigation-expand-title-value=\"";
        // line 8
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.expandNode", [], "contao_default"), "contao_html", null, true);
        yield "\"
    data-contao--toggle-navigation-collapse-title-value=\"";
        // line 9
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.collapseNode", [], "contao_default"), "contao_html", null, true);
        yield "\"
    aria-label=\"";
        // line 10
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.mainNavigation", [], "contao_default"), "contao_html", null, true);
        yield "\"
>
    <a href=\"";
        // line 12
        yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "request", [], "any", false, false, false, 12), "requestUri", [], "any", false, false, false, 12), "contao_html", null, true);
        yield "#skipMainNav\" class=\"invisible\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.skipNavigation", [], "contao_default"), "contao_html", null, true);
        yield "</a>
    ";
        // line 13
        yield $this->env->getRuntime('Knp\Menu\Twig\MenuRuntimeExtension')->render("be_menu");
        yield "
    <span id=\"skipMainNav\" class=\"invisible\"></span>
</nav>
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
        return "@ContaoCore/Backend/be_menu.html.twig";
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
        return array (  81 => 13,  75 => 12,  70 => 10,  66 => 9,  62 => 8,  58 => 7,  54 => 6,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% trans_default_domain 'contao_default' %}
<nav
    id=\"tl_navigation\"
    data-controller=\"contao--toggle-navigation\"
    data-contao--toggle-navigation-collapsed-class=\"collapsed\"
    data-contao--toggle-navigation-url-value=\"{{ path('contao_backend') }}\"
    data-contao--toggle-navigation-request-token-value=\"{{ contao.request_token }}\"
    data-contao--toggle-navigation-expand-title-value=\"{{ 'MSC.expandNode'|trans }}\"
    data-contao--toggle-navigation-collapse-title-value=\"{{ 'MSC.collapseNode'|trans }}\"
    aria-label=\"{{ 'MSC.mainNavigation'|trans }}\"
>
    <a href=\"{{ app.request.requestUri }}#skipMainNav\" class=\"invisible\">{{ 'MSC.skipNavigation'|trans }}</a>
    {{ knp_menu_render('be_menu') }}
    <span id=\"skipMainNav\" class=\"invisible\"></span>
</nav>
", "@ContaoCore/Backend/be_menu.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Backend/be_menu.html.twig");
    }
}
