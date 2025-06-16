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

/* @ContaoCore/Backend/be_route_conflicts.html.twig */
class __TwigTemplate_86b0d3a02eef235fb3f13ec3366e2f56 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Backend/be_route_conflicts.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Backend/be_route_conflicts.html.twig"));

        // line 2
        yield "<div class=\"clr widget\">
    <h3>";
        // line 3
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.routeConflicts.0", [], "contao_tl_page"), "contao_html", null, true);
        yield "</h3>
    <div class=\"tl_info\">
        <p>";
        // line 5
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.routeConflicts.1", [], "contao_tl_page"), "contao_html", null, true);
        yield "</p>
        <table class=\"tl_listing showColumns\">
            <tbody>
            <tr>
                <th class=\"tl_folder_tlist\">";
        // line 9
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.id.0", [], "contao_default"), "contao_html", null, true);
        yield "</th>
                <th class=\"tl_folder_tlist\">";
        // line 10
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.title.0", [], "contao_tl_page"), "contao_html", null, true);
        yield "</th>
                <th class=\"tl_folder_tlist\">";
        // line 11
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.type.0", [], "contao_tl_page"), "contao_html", null, true);
        yield "</th>
                <th class=\"tl_folder_tlist\">";
        // line 12
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.alias.0", [], "contao_tl_page"), "contao_html", null, true);
        yield "</th>
                <th class=\"tl_folder_tlist\">";
        // line 13
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.routePath.0", [], "contao_tl_page"), "contao_html", null, true);
        yield "</th>
                <th class=\"tl_folder_tlist\">";
        // line 14
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.routePriority.0", [], "contao_tl_page"), "contao_html", null, true);
        yield "</th>
                <th class=\"tl_folder_tlist tl_right_nowrap\"></th>
            </tr>
            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["conflicts"]) || array_key_exists("conflicts", $context) ? $context["conflicts"] : (function () { throw new RuntimeError('Variable "conflicts" does not exist.', 17, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["conflict"]) {
            // line 18
            yield "                <tr class=\"";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 18) % 2)) ? ("even") : ("odd"));
            yield " hover-row\">
                    <td colspan=\"1\" class=\"tl_file_list\">";
            // line 19
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["conflict"], "page", [], "any", false, false, false, 19), "id", [], "any", false, false, false, 19), "contao_html", null, true);
            yield "</td>
                    <td colspan=\"1\" class=\"tl_file_list\">";
            // line 20
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["conflict"], "page", [], "any", false, false, false, 20), "title", [], "any", false, false, false, 20), "contao_html", null, true);
            yield "</td>
                    <td colspan=\"1\" class=\"tl_file_list\">";
            // line 21
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((("PTY." . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["conflict"], "page", [], "any", false, false, false, 21), "type", [], "any", false, false, false, 21)) . ".0"), [], "contao_default"), "contao_html", null, true);
            yield "</td>
                    <td colspan=\"1\" class=\"tl_file_list\">";
            // line 22
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["conflict"], "page", [], "any", false, false, false, 22), "alias", [], "any", false, false, false, 22), "contao_html", null, true);
            yield "</td>
                    <td colspan=\"1\" class=\"tl_file_list\">";
            // line 23
            yield CoreExtension::getAttribute($this->env, $this->source, $context["conflict"], "path", [], "any", false, false, false, 23);
            yield "</td>
                    <td colspan=\"1\" class=\"tl_file_list\">";
            // line 24
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["conflict"], "page", [], "any", false, false, false, 24), "routePriority", [], "any", false, false, false, 24), "contao_html", null, true);
            yield "</td>
                    <td class=\"tl_file_list tl_right_nowrap\">
                        <a
                            href=\"";
            // line 27
            yield CoreExtension::getAttribute($this->env, $this->source, $context["conflict"], "editUrl", [], "any", false, false, false, 27);
            yield "\"
                            onclick=\"Backend.openModalIframe({title:'";
            // line 28
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.edit", [CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["conflict"], "page", [], "any", false, false, false, 28), "id", [], "any", false, false, false, 28)], "contao_tl_page"), "contao_html", null, true);
            yield "', url:this.href});return false\"
                            title=\"";
            // line 29
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_page.edit", [CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["conflict"], "page", [], "any", false, false, false, 29), "id", [], "any", false, false, false, 29)], "contao_tl_page"), "contao_html", null, true);
            yield "\"
                            class=\"edit\"
                        ><img src=\"";
            // line 31
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("system/themes/flexible/icons/edit.svg"), "contao_html", null, true);
            yield "\" width=\"16\" height=\"16\" alt=\"\"></a>
                    </td>
                </tr>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['conflict'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        yield "            </tbody>
        </table>
    </div>
</div>
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
        return "@ContaoCore/Backend/be_route_conflicts.html.twig";
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
        return array (  168 => 35,  150 => 31,  145 => 29,  141 => 28,  137 => 27,  131 => 24,  127 => 23,  123 => 22,  119 => 21,  115 => 20,  111 => 19,  106 => 18,  89 => 17,  83 => 14,  79 => 13,  75 => 12,  71 => 11,  67 => 10,  63 => 9,  56 => 5,  51 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% trans_default_domain 'contao_tl_page' %}
<div class=\"clr widget\">
    <h3>{{ 'tl_page.routeConflicts.0'|trans }}</h3>
    <div class=\"tl_info\">
        <p>{{ 'tl_page.routeConflicts.1'|trans }}</p>
        <table class=\"tl_listing showColumns\">
            <tbody>
            <tr>
                <th class=\"tl_folder_tlist\">{{ 'MSC.id.0'|trans([], 'contao_default') }}</th>
                <th class=\"tl_folder_tlist\">{{ 'tl_page.title.0'|trans }}</th>
                <th class=\"tl_folder_tlist\">{{ 'tl_page.type.0'|trans }}</th>
                <th class=\"tl_folder_tlist\">{{ 'tl_page.alias.0'|trans }}</th>
                <th class=\"tl_folder_tlist\">{{ 'tl_page.routePath.0'|trans }}</th>
                <th class=\"tl_folder_tlist\">{{ 'tl_page.routePriority.0'|trans }}</th>
                <th class=\"tl_folder_tlist tl_right_nowrap\"></th>
            </tr>
            {% for conflict in conflicts %}
                <tr class=\"{{ loop.index % 2 ? 'even' : 'odd' }} hover-row\">
                    <td colspan=\"1\" class=\"tl_file_list\">{{ conflict.page.id }}</td>
                    <td colspan=\"1\" class=\"tl_file_list\">{{ conflict.page.title }}</td>
                    <td colspan=\"1\" class=\"tl_file_list\">{{ ('PTY.'~conflict.page.type~'.0')|trans([], 'contao_default') }}</td>
                    <td colspan=\"1\" class=\"tl_file_list\">{{ conflict.page.alias }}</td>
                    <td colspan=\"1\" class=\"tl_file_list\">{{ conflict.path|raw }}</td>
                    <td colspan=\"1\" class=\"tl_file_list\">{{ conflict.page.routePriority }}</td>
                    <td class=\"tl_file_list tl_right_nowrap\">
                        <a
                            href=\"{{ conflict.editUrl|raw }}\"
                            onclick=\"Backend.openModalIframe({title:'{{ 'tl_page.edit'|trans([conflict.page.id]) }}', url:this.href});return false\"
                            title=\"{{ 'tl_page.edit'|trans([conflict.page.id]) }}\"
                            class=\"edit\"
                        ><img src=\"{{ asset('system/themes/flexible/icons/edit.svg') }}\" width=\"16\" height=\"16\" alt=\"\"></a>
                    </td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
", "@ContaoCore/Backend/be_route_conflicts.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Backend/be_route_conflicts.html.twig");
    }
}
