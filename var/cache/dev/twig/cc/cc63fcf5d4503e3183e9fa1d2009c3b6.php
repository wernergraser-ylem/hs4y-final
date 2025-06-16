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

/* @ContaoCore/Backend/be_undo_label.html.twig */
class __TwigTemplate_48a6b16fa8546018a680a4f797d9cef3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Backend/be_undo_label.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Backend/be_undo_label.html.twig"));

        // line 2
        yield "<div class=\"tl_undo_header\">
    <div class=\"tstamp\">
        <span class=\"date\">";
        // line 4
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new RuntimeError('Variable "row" does not exist.', 4, $this->source); })()), "tstamp", [], "any", false, false, false, 4), (isset($context["dateFormat"]) || array_key_exists("dateFormat", $context) ? $context["dateFormat"] : (function () { throw new RuntimeError('Variable "dateFormat" does not exist.', 4, $this->source); })())), "contao_html", null, true);
        yield "</span>
        <span class=\"time\">";
        // line 5
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new RuntimeError('Variable "row" does not exist.', 5, $this->source); })()), "tstamp", [], "any", false, false, false, 5), (isset($context["timeFormat"]) || array_key_exists("timeFormat", $context) ? $context["timeFormat"] : (function () { throw new RuntimeError('Variable "timeFormat" does not exist.', 5, $this->source); })())), "contao_html", null, true);
        yield "</span>
    </div>
    <div>
        ";
        // line 8
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_undo.pid.0", [], "contao_tl_undo"), "contao_html", null, true);
        yield ": <strong>";
        if ((($tmp = (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 8, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 8, $this->source); })()), "username", [], "any", false, false, false, 8), "contao_html", null, true);
        } else {
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new RuntimeError('Variable "row" does not exist.', 8, $this->source); })()), "pid", [], "any", false, false, false, 8), "contao_html", null, true);
        }
        yield "</strong>
    </div>
    <div class=\"source\">
        ";
        // line 11
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tl_undo.fromTable.0", [], "contao_tl_undo"), "contao_html", null, true);
        yield ": <strong>";
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["fromTable"]) || array_key_exists("fromTable", $context) ? $context["fromTable"] : (function () { throw new RuntimeError('Variable "fromTable" does not exist.', 11, $this->source); })()), "contao_html", null, true);
        yield ".";
        yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["originalRow"]) || array_key_exists("originalRow", $context) ? $context["originalRow"] : (function () { throw new RuntimeError('Variable "originalRow" does not exist.', 11, $this->source); })()), "id", [], "any", false, false, false, 11), "contao_html", null, true);
        yield "</strong>
    </div>
    ";
        // line 13
        if ((($tmp = (isset($context["parent"]) || array_key_exists("parent", $context) ? $context["parent"] : (function () { throw new RuntimeError('Variable "parent" does not exist.', 13, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "        <div>
            ";
            // line 15
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.parent", [], "contao_default"), "contao_html", null, true);
            yield ": <strong>";
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["parent"]) || array_key_exists("parent", $context) ? $context["parent"] : (function () { throw new RuntimeError('Variable "parent" does not exist.', 15, $this->source); })()), "table", [], "any", false, false, false, 15), "contao_html", null, true);
            yield ".";
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["parent"]) || array_key_exists("parent", $context) ? $context["parent"] : (function () { throw new RuntimeError('Variable "parent" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15), "contao_html", null, true);
            yield "</strong>
        </div>
    ";
        }
        // line 18
        yield "</div>

";
        // line 20
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["preview"]) || array_key_exists("preview", $context) ? $context["preview"] : (function () { throw new RuntimeError('Variable "preview" does not exist.', 20, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 21
            yield "    <div class=\"tl_undo_preview\">
        ";
            // line 22
            if ((($tmp =  !is_iterable((isset($context["preview"]) || array_key_exists("preview", $context) ? $context["preview"] : (function () { throw new RuntimeError('Variable "preview" does not exist.', 22, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 23
                yield "            ";
                yield (isset($context["preview"]) || array_key_exists("preview", $context) ? $context["preview"] : (function () { throw new RuntimeError('Variable "preview" does not exist.', 23, $this->source); })());
                yield "
        ";
            } else {
                // line 25
                yield "            <table>
                <tr>
                    ";
                // line 27
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["preview"]) || array_key_exists("preview", $context) ? $context["preview"] : (function () { throw new RuntimeError('Variable "preview" does not exist.', 27, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                    // line 28
                    yield "                        <td>";
                    yield $context["value"];
                    yield "</td>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['value'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 30
                yield "                </tr>
            </table>
        ";
            }
            // line 33
            yield "    </div>
";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Backend/be_undo_label.html.twig";
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
        return array (  137 => 33,  132 => 30,  123 => 28,  119 => 27,  115 => 25,  109 => 23,  107 => 22,  104 => 21,  102 => 20,  98 => 18,  88 => 15,  85 => 14,  83 => 13,  74 => 11,  62 => 8,  56 => 5,  52 => 4,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% trans_default_domain 'contao_tl_undo' %}
<div class=\"tl_undo_header\">
    <div class=\"tstamp\">
        <span class=\"date\">{{ row.tstamp|date(dateFormat) }}</span>
        <span class=\"time\">{{ row.tstamp|date(timeFormat) }}</span>
    </div>
    <div>
        {{ 'tl_undo.pid.0'|trans }}: <strong>{% if user %}{{ user.username }}{% else %}{{ row.pid }}{% endif %}</strong>
    </div>
    <div class=\"source\">
        {{ 'tl_undo.fromTable.0'|trans }}: <strong>{{ fromTable }}.{{ originalRow.id }}</strong>
    </div>
    {% if parent %}
        <div>
            {{ 'MSC.parent'|trans({}, 'contao_default') }}: <strong>{{ parent.table }}.{{ parent.id }}</strong>
        </div>
    {% endif %}
</div>

{% if preview is not empty %}
    <div class=\"tl_undo_preview\">
        {% if preview is not iterable %}
            {{ preview|raw }}
        {% else %}
            <table>
                <tr>
                    {% for value in preview %}
                        <td>{{ value|raw }}</td>
                    {% endfor %}
                </tr>
            </table>
        {% endif %}
    </div>
{% endif %}
", "@ContaoCore/Backend/be_undo_label.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Backend/be_undo_label.html.twig");
    }
}
