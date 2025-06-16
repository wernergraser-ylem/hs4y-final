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

/* @ContaoCore/Error/missing_route_parameters.html.twig */
class __TwigTemplate_7afb26aa200d3bdba282faa516975f42 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'matter' => [$this, 'block_matter'],
            'explain' => [$this, 'block_explain'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "@ContaoCore/Error/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Error/missing_route_parameters.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Error/missing_route_parameters.html.twig"));

        $this->parent = $this->load("@ContaoCore/Error/layout.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

        // line 5
        yield "    ";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.title", [], "contao_exception"), "contao_html", null, true);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_matter(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "matter"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "matter"));

        // line 8
        yield "    <p>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.matter", [], "contao_exception"), "contao_html", null, true);
        yield "</p>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_explain(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "explain"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "explain"));

        // line 11
        yield "    <p>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.explain", [], "contao_exception"), "contao_html", null, true);
        yield "</p>
    <p>";
        // line 12
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.path", [], "contao_exception"), "contao_html", null, true);
        yield ": <code>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["throwable"]) || array_key_exists("throwable", $context) ? $context["throwable"] : (function () { throw new RuntimeError('Variable "throwable" does not exist.', 12, $this->source); })()), "route", [], "any", false, false, false, 12), "path", [], "any", false, false, false, 12), "contao_html", null, true);
        yield "</code></p>
    <table>
        <thead>
        <tr>
            <th>";
        // line 16
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.parameterName", [], "contao_exception"), "contao_html", null, true);
        yield "</th>
            <th>";
        // line 17
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.parameterRequirement", [], "contao_exception"), "contao_html", null, true);
        yield "</th>
            <th>";
        // line 18
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.parameterDefault", [], "contao_exception"), "contao_html", null, true);
        yield "</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["throwable"]) || array_key_exists("throwable", $context) ? $context["throwable"] : (function () { throw new RuntimeError('Variable "throwable" does not exist.', 22, $this->source); })()), "route", [], "any", false, false, false, 22), "requirements", [], "any", false, false, false, 22));
        foreach ($context['_seq'] as $context["variable"] => $context["requirement"]) {
            // line 23
            yield "            <tr>
                <td>";
            // line 24
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["variable"], "contao_html", null, true);
            yield "</td>
                <td><code>";
            // line 25
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["requirement"], "contao_html", null, true);
            yield "</code></td>
                <td>";
            // line 26
            if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["throwable"]) || array_key_exists("throwable", $context) ? $context["throwable"] : (function () { throw new RuntimeError('Variable "throwable" does not exist.', 26, $this->source); })()), "route", [], "any", false, false, false, 26), "defaults", [], "any", false, false, false, 26), $context["variable"], [], "array", false, false, false, 26))) {
                yield "<i>";
                yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("XPT.missingRouteParameters.parameterEmpty", [], "contao_exception"), "contao_html", null, true);
                yield "</i>";
            } else {
                yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["throwable"]) || array_key_exists("throwable", $context) ? $context["throwable"] : (function () { throw new RuntimeError('Variable "throwable" does not exist.', 26, $this->source); })()), "route", [], "any", false, false, false, 26), "defaults", [], "any", false, false, false, 26), $context["variable"], [], "array", false, false, false, 26), "contao_html", null, true);
            }
            yield "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['variable'], $context['requirement'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        yield "        </tbody>
    </table>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Error/missing_route_parameters.html.twig";
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
        return array (  191 => 29,  176 => 26,  172 => 25,  168 => 24,  165 => 23,  161 => 22,  154 => 18,  150 => 17,  146 => 16,  137 => 12,  132 => 11,  119 => 10,  105 => 8,  92 => 7,  78 => 5,  65 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% trans_default_domain 'contao_exception' %}
{% extends \"@ContaoCore/Error/layout.html.twig\" %}

{% block title %}
    {{ 'XPT.missingRouteParameters.title'|trans }}
{% endblock %}
{% block matter %}
    <p>{{ 'XPT.missingRouteParameters.matter'|trans }}</p>
{% endblock %}
{% block explain %}
    <p>{{ 'XPT.missingRouteParameters.explain'|trans }}</p>
    <p>{{ 'XPT.missingRouteParameters.path'|trans }}: <code>{{ throwable.route.path }}</code></p>
    <table>
        <thead>
        <tr>
            <th>{{ 'XPT.missingRouteParameters.parameterName'|trans }}</th>
            <th>{{ 'XPT.missingRouteParameters.parameterRequirement'|trans }}</th>
            <th>{{ 'XPT.missingRouteParameters.parameterDefault'|trans }}</th>
        </tr>
        </thead>
        <tbody>
        {% for variable, requirement in throwable.route.requirements %}
            <tr>
                <td>{{ variable }}</td>
                <td><code>{{ requirement }}</code></td>
                <td>{% if throwable.route.defaults[variable] is empty %}<i>{{ 'XPT.missingRouteParameters.parameterEmpty'|trans }}</i>{% else %}{{ throwable.route.defaults[variable] }}{% endif %}</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
{% endblock %}
", "@ContaoCore/Error/missing_route_parameters.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Error/missing_route_parameters.html.twig");
    }
}
