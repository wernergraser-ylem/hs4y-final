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

/* @ContaoCore/Backend/be_filesync_report.html.twig */
class __TwigTemplate_dc1b8802aecb4a6221bc53018fe7ce56 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Backend/be_filesync_report.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Backend/be_filesync_report.html.twig"));

        // line 2
        yield "
";
        // line 4
        yield "<div class=\"tl_message\">
    <p class=\"tl_confirm\">";
        // line 5
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_files.syncComplete", [], "contao_tl_files"), "contao_html", null, true);
        yield "</p>
</div>
<div id=\"tl_buttons\">
    <a href=\"";
        // line 8
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["referer"]) || array_key_exists("referer", $context) ? $context["referer"] : (function () { throw new RuntimeError('Variable "referer" does not exist.', 8, $this->source); })()), "contao_html", null, true);
        yield "\" class=\"header_back\" title=\"";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.backBTTitle", [], "contao_default"), "contao_html", null, true);
        yield "\" accesskey=\"b\" data-action=\"contao--scroll-offset#discard\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.backBT", [], "contao_default"), "contao_html", null, true);
        yield "</a>
</div>

";
        // line 12
        yield "<div id=\"result-list\">
    ";
        // line 13
        $context["modified"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["change_set"]) || array_key_exists("change_set", $context) ? $context["change_set"] : (function () { throw new RuntimeError('Variable "change_set" does not exist.', 13, $this->source); })()), "itemsToUpdate", [], "any", false, false, false, 13), function ($__item__) use ($context, $macros) { $context["item"] = $__item__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 13, $this->source); })()), "updatesHash", [], "any", false, false, false, 13); });
        // line 14
        yield "    ";
        $context["moved"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["change_set"]) || array_key_exists("change_set", $context) ? $context["change_set"] : (function () { throw new RuntimeError('Variable "change_set" does not exist.', 14, $this->source); })()), "itemsToUpdate", [], "any", false, false, false, 14), function ($__item__) use ($context, $macros) { $context["item"] = $__item__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 14, $this->source); })()), "updatesPath", [], "any", false, false, false, 14); });
        // line 15
        yield "
    <p>";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_files.syncResult", [Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["change_set"]) || array_key_exists("change_set", $context) ? $context["change_set"] : (function () { throw new RuntimeError('Variable "change_set" does not exist.', 16, $this->source); })()), "itemsToCreate", [], "any", false, false, false, 16)), Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["modified"]) || array_key_exists("modified", $context) ? $context["modified"] : (function () { throw new RuntimeError('Variable "modified" does not exist.', 16, $this->source); })())), "-", Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["moved"]) || array_key_exists("moved", $context) ? $context["moved"] : (function () { throw new RuntimeError('Variable "moved" does not exist.', 16, $this->source); })())), Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["change_set"]) || array_key_exists("change_set", $context) ? $context["change_set"] : (function () { throw new RuntimeError('Variable "change_set" does not exist.', 16, $this->source); })()), "itemsToDelete", [], "any", false, false, false, 16))], "contao_tl_files");
        yield "</p>

    ";
        // line 19
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["change_set"]) || array_key_exists("change_set", $context) ? $context["change_set"] : (function () { throw new RuntimeError('Variable "change_set" does not exist.', 19, $this->source); })()), "itemsToCreate", [], "any", false, false, false, 19));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 20
            yield "        <p class=\"tl_new\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_files.syncAdded", [CoreExtension::getAttribute($this->env, $this->source, $context["item"], "path", [], "any", false, false, false, 20)], "contao_tl_files"), "contao_html", null, true);
            yield "</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        yield "
    ";
        // line 24
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["modified"]) || array_key_exists("modified", $context) ? $context["modified"] : (function () { throw new RuntimeError('Variable "modified" does not exist.', 24, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 25
            yield "        <p class=\"tl_info\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_files.syncChanged", [CoreExtension::getAttribute($this->env, $this->source, $context["item"], "existingPath", [], "any", false, false, false, 25)], "contao_tl_files"), "contao_html", null, true);
            yield "</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        yield "
    ";
        // line 29
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["moved"]) || array_key_exists("moved", $context) ? $context["moved"] : (function () { throw new RuntimeError('Variable "moved" does not exist.', 29, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 30
            yield "        <p class=\"tl_info\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_files.syncMoved", [CoreExtension::getAttribute($this->env, $this->source, $context["item"], "existingPath", [], "any", false, false, false, 30), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "newPath", [], "any", false, false, false, 30)], "contao_tl_files"), "contao_html", null, true);
            yield "</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        yield "
    ";
        // line 34
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["change_set"]) || array_key_exists("change_set", $context) ? $context["change_set"] : (function () { throw new RuntimeError('Variable "change_set" does not exist.', 34, $this->source); })()), "itemsToDelete", [], "any", false, false, false, 34));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 35
            yield "        <p class=\"tl_error\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_files.syncDeleted", [CoreExtension::getAttribute($this->env, $this->source, $context["item"], "path", [], "any", false, false, false, 35)], "contao_tl_files"), "contao_html", null, true);
            yield "</p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        yield "</div>

";
        // line 40
        yield "<div class=\"tl_formbody_submit\">
    <div class=\"tl_submit_container\">
        <a href=\"";
        // line 42
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["referer"]) || array_key_exists("referer", $context) ? $context["referer"] : (function () { throw new RuntimeError('Variable "referer" does not exist.', 42, $this->source); })()), "contao_html", null, true);
        yield "\" class=\"tl_submit\" style=\"display:inline-block\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.continue", [], "contao_default"), "contao_html", null, true);
        yield "</a>
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
        return "@ContaoCore/Backend/be_filesync_report.html.twig";
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
        return array (  159 => 42,  155 => 40,  151 => 37,  142 => 35,  137 => 34,  134 => 32,  125 => 30,  120 => 29,  117 => 27,  108 => 25,  103 => 24,  100 => 22,  91 => 20,  86 => 19,  81 => 16,  78 => 15,  75 => 14,  73 => 13,  70 => 12,  60 => 8,  54 => 5,  51 => 4,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% trans_default_domain 'contao_tl_files' %}

{#  Header #}
<div class=\"tl_message\">
    <p class=\"tl_confirm\">{{ 'tl_files.syncComplete'|trans }}</p>
</div>
<div id=\"tl_buttons\">
    <a href=\"{{ referer }}\" class=\"header_back\" title=\"{{ 'MSC.backBTTitle'|trans({}, 'contao_default') }}\" accesskey=\"b\" data-action=\"contao--scroll-offset#discard\">{{ 'MSC.backBT'|trans({}, 'contao_default') }}</a>
</div>

{# Report #}
<div id=\"result-list\">
    {% set modified = change_set.itemsToUpdate|filter(item => item.updatesHash) %}
    {% set moved = change_set.itemsToUpdate|filter(item => item.updatesPath) %}

    <p>{{ 'tl_files.syncResult'|trans([change_set.itemsToCreate|length, modified|length, '-', moved|length, change_set.itemsToDelete|length], 'contao_tl_files')|raw }}</p>

    {# Added resources #}
    {% for item in change_set.itemsToCreate %}
        <p class=\"tl_new\">{{ 'tl_files.syncAdded'|trans([item.path]) }}</p>
    {% endfor %}

    {# Modified resources #}
    {% for item in modified %}
        <p class=\"tl_info\">{{ 'tl_files.syncChanged'|trans([item.existingPath]) }}</p>
    {% endfor %}

    {# Moved resources #}
    {% for item in moved %}
        <p class=\"tl_info\">{{ 'tl_files.syncMoved'|trans([item.existingPath, item.newPath]) }}</p>
    {% endfor %}

    {# Deleted resources #}
    {% for item in change_set.itemsToDelete %}
        <p class=\"tl_error\">{{ 'tl_files.syncDeleted'|trans([item.path]) }}</p>
    {% endfor %}
</div>

{# Footer #}
<div class=\"tl_formbody_submit\">
    <div class=\"tl_submit_container\">
        <a href=\"{{ referer }}\" class=\"tl_submit\" style=\"display:inline-block\">{{ 'MSC.continue'|trans({}, 'contao_default') }}</a>
    </div>
</div>
", "@ContaoCore/Backend/be_filesync_report.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Backend/be_filesync_report.html.twig");
    }
}
