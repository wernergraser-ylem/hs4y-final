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

/* @ContaoCore/Collector/contao.html.twig */
class __TwigTemplate_448c8f0ce959b89d46f556526191e5a9 extends Template
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
            'toolbar' => [$this, 'block_toolbar'],
            'menu' => [$this, 'block_menu'],
            'panel' => [$this, 'block_panel'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Collector/contao.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Collector/contao.html.twig"));

        $this->parent = $this->load("@WebProfiler/Profiler/layout.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        yield "    ";
        $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 5
            yield "        ";
            yield $this->env->getFunction('include')->getCallable()($this->env, $context, "@ContaoCore/Collector/contao.svg");
            yield "
        <span class=\"sf-toolbar-value\">";
            // line 6
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 6, $this->source); })()), "summary", [], "any", false, false, false, 6), "version", [], "any", false, false, false, 6), "contao_html", null, true);
            yield "</span>
    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 8
        yield "    ";
        $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 9
            yield "        ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 9, $this->source); })()), "summary", [], "any", false, false, false, 9), "frontend", [], "any", false, false, false, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 10
                yield "            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>Page layout</b>
                    <span>";
                // line 13
                yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 13, $this->source); })()), "summary", [], "any", false, false, false, 13), "layout", [], "any", false, false, false, 13), "contao_html", null, true);
                yield "</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>Template</b>
                    <span>";
                // line 17
                yield $this->env->getFilter('escape')->getCallable()($this->env, ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "summary", [], "any", false, true, false, 17), "template", [], "any", true, true, false, 17)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 17, $this->source); })()), "summary", [], "any", false, false, false, 17), "template", [], "any", false, false, false, 17), "n/a")) : ("n/a")), "contao_html", null, true);
                yield "</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>FE preview</b>
                    ";
                // line 21
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 21, $this->source); })()), "summary", [], "any", false, false, false, 21), "preview", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 22
                    yield "                        <span class=\"sf-toolbar-status sf-toolbar-status-yellow\">enabled</span>
                    ";
                } else {
                    // line 24
                    yield "                        <span>disabled</span>
                    ";
                }
                // line 26
                yield "                </div>
            </div>
        ";
            }
            // line 29
            yield "        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Resources</b>
                <span><a href=\"https://docs.contao.org/\" target=\"_blank\" rel=\"help noreferrer noopener\">Read the Contao docs</a></span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Help</b>
                <span><a href=\"https://to.contao.org/support\" target=\"_blank\" rel=\"help\">Contao support channels</a></span>
            </div>
        </div>
    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 40
        yield "    ";
        yield $this->env->getFunction('include')->getCallable()($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => true, "name" => "contao", "additional_classes" => ((((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 40, $this->source); })()), "summary", [], "any", false, false, false, 40), "preview", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("sf-toolbar-status-yellow ") : ("")) . "sf-toolbar-block-right")]);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 44
        yield "    <span class=\"label\">
        <span class=\"icon\">";
        // line 45
        yield $this->env->getFunction('include')->getCallable()($this->env, $context, "@ContaoCore/Collector/contao.svg");
        yield "</span>
        <strong>Contao</strong>
    </span>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 50
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 51
        yield "    <h2>Summary</h2>
    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 54
        yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 54, $this->source); })()), "summary", [], "any", false, false, false, 54), "version", [], "any", false, false, false, 54), "contao_html", null, true);
        yield "</span>
            <span class=\"label\">Contao version</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">";
        // line 59
        yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 59, $this->source); })()), "summary", [], "any", false, false, false, 59), "models", [], "any", false, false, false, 59), "contao_html", null, true);
        yield "</span>
            <span class=\"label\">Registered models</span>
        </div>

        ";
        // line 63
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 63, $this->source); })()), "summary", [], "any", false, false, false, 63), "layout", [], "any", false, false, false, 63)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 64
            yield "            <div class=\"metric\">
                <span class=\"value\">";
            // line 65
            yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 65, $this->source); })()), "summary", [], "any", false, false, false, 65), "layout", [], "any", false, false, false, 65), "contao_html", null, true);
            yield "</span>
                <span class=\"label\">Page layout</span>
            </div>
        ";
        }
        // line 69
        yield "    </div>

    <h2>Classes set</h2>
    <table>
        <thead>
            <tr>
                <th>Class name</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 79, $this->source); })()), "classesset", [], "any", false, false, false, 79));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 80
            yield "                <tr>
                    <td><code>";
            // line 81
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["class"], "contao_html", null, true);
            yield "</code></td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['class'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 84
        yield "        </tbody>
    </table>

    <h2>Classes aliased</h2>
    <table>
        <thead>
            <tr>
                <th>Alias name</th>
                <th>Original name</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 96, $this->source); })()), "classesaliased", [], "any", false, false, false, 96));
        foreach ($context['_seq'] as $context["alias"] => $context["original"]) {
            // line 97
            yield "                <tr>
                    <td><code>";
            // line 98
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["alias"], "contao_html", null, true);
            yield "</code></td>
                    <td><code>";
            // line 99
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["original"], "contao_html", null, true);
            yield "</code></td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['alias'], $context['original'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        yield "        </tbody>
    </table>

    <h2>Classes composerized</h2>
    <table>
        <thead>
            <tr>
                <th>Alias name</th>
                <th>Original name</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 114
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 114, $this->source); })()), "classescomposerized", [], "any", false, false, false, 114));
        foreach ($context['_seq'] as $context["alias"] => $context["original"]) {
            // line 115
            yield "                <tr>
                    <td><code>";
            // line 116
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["alias"], "contao_html", null, true);
            yield "</code></td>
                    <td><code>";
            // line 117
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["original"], "contao_html", null, true);
            yield "</code></td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['alias'], $context['original'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        yield "        </tbody>
    </table>

    ";
        // line 123
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 123, $this->source); })()), "additionaldata", [], "any", false, false, false, 123)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 124
            yield "        <h2>Other</h2>
        <pre>
            ";
            // line 126
            yield $this->extensions['Symfony\Bridge\Twig\Extension\DumpExtension']->dump($this->env, $context, CoreExtension::getAttribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 126, $this->source); })()), "additionaldata", [], "any", false, false, false, 126));
            yield "
        </pre>
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Collector/contao.html.twig";
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
        return array (  343 => 126,  339 => 124,  337 => 123,  332 => 120,  323 => 117,  319 => 116,  316 => 115,  312 => 114,  298 => 102,  289 => 99,  285 => 98,  282 => 97,  278 => 96,  264 => 84,  255 => 81,  252 => 80,  248 => 79,  236 => 69,  229 => 65,  226 => 64,  224 => 63,  217 => 59,  209 => 54,  204 => 51,  191 => 50,  176 => 45,  173 => 44,  160 => 43,  146 => 40,  132 => 29,  127 => 26,  123 => 24,  119 => 22,  117 => 21,  110 => 17,  103 => 13,  98 => 10,  95 => 9,  92 => 8,  86 => 6,  81 => 5,  78 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% set icon %}
        {{ include('@ContaoCore/Collector/contao.svg') }}
        <span class=\"sf-toolbar-value\">{{ collector.summary.version }}</span>
    {% endset %}
    {% set text %}
        {% if collector.summary.frontend %}
            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>Page layout</b>
                    <span>{{ collector.summary.layout }}</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>Template</b>
                    <span>{{ collector.summary.template|default('n/a') }}</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>FE preview</b>
                    {% if collector.summary.preview %}
                        <span class=\"sf-toolbar-status sf-toolbar-status-yellow\">enabled</span>
                    {% else %}
                        <span>disabled</span>
                    {% endif %}
                </div>
            </div>
        {% endif %}
        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Resources</b>
                <span><a href=\"https://docs.contao.org/\" target=\"_blank\" rel=\"help noreferrer noopener\">Read the Contao docs</a></span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Help</b>
                <span><a href=\"https://to.contao.org/support\" target=\"_blank\" rel=\"help\">Contao support channels</a></span>
            </div>
        </div>
    {% endset %}
    {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', {link: true, name: 'contao', additional_classes: (((collector.summary.preview) ? 'sf-toolbar-status-yellow ' : '') ~ 'sf-toolbar-block-right')}) }}
{% endblock %}

{% block menu %}
    <span class=\"label\">
        <span class=\"icon\">{{ include('@ContaoCore/Collector/contao.svg') }}</span>
        <strong>Contao</strong>
    </span>
{% endblock %}

{% block panel %}
    <h2>Summary</h2>
    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">{{ collector.summary.version }}</span>
            <span class=\"label\">Contao version</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">{{ collector.summary.models }}</span>
            <span class=\"label\">Registered models</span>
        </div>

        {% if collector.summary.layout %}
            <div class=\"metric\">
                <span class=\"value\">{{ collector.summary.layout }}</span>
                <span class=\"label\">Page layout</span>
            </div>
        {% endif %}
    </div>

    <h2>Classes set</h2>
    <table>
        <thead>
            <tr>
                <th>Class name</th>
            </tr>
        </thead>
        <tbody>
            {% for class in collector.classesset %}
                <tr>
                    <td><code>{{ class }}</code></td>
                </tr>
            {% endfor %}
        </tbody>
    </table>

    <h2>Classes aliased</h2>
    <table>
        <thead>
            <tr>
                <th>Alias name</th>
                <th>Original name</th>
            </tr>
        </thead>
        <tbody>
            {% for alias, original in collector.classesaliased %}
                <tr>
                    <td><code>{{ alias }}</code></td>
                    <td><code>{{ original }}</code></td>
                </tr>
            {% endfor %}
        </tbody>
    </table>

    <h2>Classes composerized</h2>
    <table>
        <thead>
            <tr>
                <th>Alias name</th>
                <th>Original name</th>
            </tr>
        </thead>
        <tbody>
            {% for alias, original in collector.classescomposerized %}
                <tr>
                    <td><code>{{ alias }}</code></td>
                    <td><code>{{ original }}</code></td>
                </tr>
            {% endfor %}
        </tbody>
    </table>

    {% if collector.additionaldata %}
        <h2>Other</h2>
        <pre>
            {{ dump(collector.additionaldata) }}
        </pre>
    {% endif %}
{% endblock %}
", "@ContaoCore/Collector/contao.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Collector/contao.html.twig");
    }
}
