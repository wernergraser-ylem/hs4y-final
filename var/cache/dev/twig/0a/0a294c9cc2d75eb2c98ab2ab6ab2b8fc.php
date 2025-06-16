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

/* @ContaoCore/Frontend/preview_toolbar_base.html.twig */
class __TwigTemplate_a75b957bdcc4858d6a1408114a95557f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Frontend/preview_toolbar_base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Frontend/preview_toolbar_base.html.twig"));

        // line 2
        yield "<div class=\"cto-toolbar__open\">
    <a href=\"#\" title=\"";
        // line 3
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.openToolbar", [], "contao_default"), "contao_html", null, true);
        yield "\">";
        yield $this->env->getFunction('include')->getCallable()($this->env, $context, "@ContaoCore/Collector/contao.svg");
        yield "</a>
</div>
<div
    class=\"cto-toolbar__inside\"
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 7, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 8
            yield "        data-";
            yield $this->env->getFilter('e')->getCallable()($this->env, $context["key"], "contao_html_attr", null, true);
            yield "=\"";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $context["value"], "contao_html", null, true);
            yield "\"
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['key'], $context['value'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        yield ">
    <form action=\"";
        // line 11
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 11, $this->source); })()), "contao_html", null, true);
        yield "\" method=\"post\" autocomplete=\"off\">
        <div class=\"formbody\">
            ";
        // line 13
        if ((($tmp = (isset($context["badgeTitle"]) || array_key_exists("badgeTitle", $context) ? $context["badgeTitle"] : (function () { throw new RuntimeError('Variable "badgeTitle" does not exist.', 13, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "                <span class=\"badge-title\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["badgeTitle"]) || array_key_exists("badgeTitle", $context) ? $context["badgeTitle"] : (function () { throw new RuntimeError('Variable "badgeTitle" does not exist.', 14, $this->source); })()), "contao_html", null, true);
            yield "</span>
            ";
        }
        // line 16
        yield "            <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_switch\">
            <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"";
        // line 17
        yield $this->env->getFilter('escape')->getCallable()($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["contao"]) || array_key_exists("contao", $context) ? $context["contao"] : (function () { throw new RuntimeError('Variable "contao" does not exist.', 17, $this->source); })()), "request_token", [], "any", false, false, false, 17), "contao_html", null, true);
        yield "\">
            <div>
                <button type=\"button\" id=\"copyPublishedPath\" class=\"tl_submit\">";
        // line 19
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.copyURL", [], "contao_default"), "contao_html", null, true);
        yield "</button>
                ";
        // line 20
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["share"]) || array_key_exists("share", $context) ? $context["share"] : (function () { throw new RuntimeError('Variable "share" does not exist.', 20, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 21
            yield "                    <a href=\"";
            yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["share"]) || array_key_exists("share", $context) ? $context["share"] : (function () { throw new RuntimeError('Variable "share" does not exist.', 21, $this->source); })()), "contao_html", null, true);
            yield "\" target=\"_blank\" class=\"tl_submit cto-toolbar__share-url\">";
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.shareURL", [], "contao_default"), "contao_html", null, true);
            yield "</a>
                ";
        }
        // line 23
        yield "            </div>
            ";
        // line 24
        if ((($tmp = (isset($context["canSwitchUser"]) || array_key_exists("canSwitchUser", $context) ? $context["canSwitchUser"] : (function () { throw new RuntimeError('Variable "canSwitchUser" does not exist.', 24, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 25
            yield "                <div>
                    <label for=\"ctrl_user\">";
            // line 26
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.feUser", [], "contao_default"), "contao_html", null, true);
            yield ":</label>
                    <input type=\"text\" name=\"user\" id=\"ctrl_user\" list=\"userlist\" class=\"tl_text user\" placeholder=\"";
            // line 27
            yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.username", [], "contao_default"), "contao_html", null, true);
            yield "\" value=\"";
            yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 27, $this->source); })()), "contao_html", null, true);
            yield "\">
                    <datalist id=\"userlist\"></datalist>
                </div>
            ";
        }
        // line 31
        yield "            <div>
                <label for=\"ctrl_unpublished\">";
        // line 32
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.hiddenElements", [], "contao_default"), "contao_html", null, true);
        yield ":</label>
                <select name=\"unpublished\" id=\"ctrl_unpublished\" class=\"tl_select\">
                    <option value=\"hide\">";
        // line 34
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.hiddenHide", [], "contao_default"), "contao_html", null, true);
        yield "</option>
                    <option value=\"show\"";
        // line 35
        if ((($tmp = (isset($context["show"]) || array_key_exists("show", $context) ? $context["show"] : (function () { throw new RuntimeError('Variable "show" does not exist.', 35, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " selected";
        }
        yield ">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.hiddenShow", [], "contao_default"), "contao_html", null, true);
        yield "</option>
                </select>
                <button type=\"submit\" class=\"tl_submit\">";
        // line 37
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.apply", [], "contao_default"), "contao_html", null, true);
        yield "</button>
            </div>
        </div>
    </form>
    <div class=\"cto-toolbar__close\"><a href=\"#\" title=\"";
        // line 41
        yield $this->env->getFilter('escape')->getCallable()($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MSC.closeToolbar", [], "contao_default"), "contao_html", null, true);
        yield "\">&times;</a></div>
</div>
<div class=\"cto-toolbar__clear\"></div>
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
        return "@ContaoCore/Frontend/preview_toolbar_base.html.twig";
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
        return array (  162 => 41,  155 => 37,  146 => 35,  142 => 34,  137 => 32,  134 => 31,  125 => 27,  121 => 26,  118 => 25,  116 => 24,  113 => 23,  105 => 21,  103 => 20,  99 => 19,  94 => 17,  91 => 16,  85 => 14,  83 => 13,  78 => 11,  75 => 10,  64 => 8,  60 => 7,  51 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% trans_default_domain 'contao_default' %}
<div class=\"cto-toolbar__open\">
    <a href=\"#\" title=\"{{ 'MSC.openToolbar'|trans }}\">{{ include('@ContaoCore/Collector/contao.svg') }}</a>
</div>
<div
    class=\"cto-toolbar__inside\"
    {% for key, value in attributes %}
        data-{{ key|e('html_attr') }}=\"{{ value }}\"
    {% endfor %}
>
    <form action=\"{{ action }}\" method=\"post\" autocomplete=\"off\">
        <div class=\"formbody\">
            {% if badgeTitle %}
                <span class=\"badge-title\">{{ badgeTitle }}</span>
            {% endif %}
            <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_switch\">
            <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"{{ contao.request_token }}\">
            <div>
                <button type=\"button\" id=\"copyPublishedPath\" class=\"tl_submit\">{{ 'MSC.copyURL'|trans([], 'contao_default') }}</button>
                {% if share is not empty %}
                    <a href=\"{{ share }}\" target=\"_blank\" class=\"tl_submit cto-toolbar__share-url\">{{ 'MSC.shareURL'|trans([], 'contao_default') }}</a>
                {% endif %}
            </div>
            {% if canSwitchUser %}
                <div>
                    <label for=\"ctrl_user\">{{ 'MSC.feUser'|trans }}:</label>
                    <input type=\"text\" name=\"user\" id=\"ctrl_user\" list=\"userlist\" class=\"tl_text user\" placeholder=\"{{ 'MSC.username'|trans }}\" value=\"{{ user }}\">
                    <datalist id=\"userlist\"></datalist>
                </div>
            {% endif %}
            <div>
                <label for=\"ctrl_unpublished\">{{ 'MSC.hiddenElements'|trans }}:</label>
                <select name=\"unpublished\" id=\"ctrl_unpublished\" class=\"tl_select\">
                    <option value=\"hide\">{{ 'MSC.hiddenHide'|trans }}</option>
                    <option value=\"show\"{% if show %} selected{% endif %}>{{ 'MSC.hiddenShow'|trans }}</option>
                </select>
                <button type=\"submit\" class=\"tl_submit\">{{ 'MSC.apply'|trans }}</button>
            </div>
        </div>
    </form>
    <div class=\"cto-toolbar__close\"><a href=\"#\" title=\"{{ 'MSC.closeToolbar'|trans }}\">&times;</a></div>
</div>
<div class=\"cto-toolbar__clear\"></div>
", "@ContaoCore/Frontend/preview_toolbar_base.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Frontend/preview_toolbar_base.html.twig");
    }
}
