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

/* @pct_autogrid/backend/be_autogrid_viewport_panel.html5 */
class __TwigTemplate_7208372181c02c9f8dabdf73a5a23a93 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_autogrid/backend/be_autogrid_viewport_panel.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_autogrid/backend/be_autogrid_viewport_panel.html5"));

        // line 1
        yield "<div id=\"autogrid_viewport_panel\">
\t<ul class=\"buttons\">
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['desktop']; ?>\" class=\"desktop button clickable\"data-viewport=\"desktop\"><i></i><span><?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['desktop']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['tablet']; ?>\" class=\"tablet button clickable\" data-viewport=\"tablet\"><i></i><span><?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['tablet']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['mobile']; ?>\" class=\"mobile button clickable\" data-viewport=\"mobile\"><i></i><span><?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['mobile']; ?></span></li>
\t</ul>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/backend/be_autogrid_viewport_panel.html5";
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
        return new Source("<div id=\"autogrid_viewport_panel\">
\t<ul class=\"buttons\">
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['desktop']; ?>\" class=\"desktop button clickable\"data-viewport=\"desktop\"><i></i><span><?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['desktop']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['tablet']; ?>\" class=\"tablet button clickable\" data-viewport=\"tablet\"><i></i><span><?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['tablet']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['mobile']; ?>\" class=\"mobile button clickable\" data-viewport=\"mobile\"><i></i><span><?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['mobile']; ?></span></li>
\t</ul>
</div>", "@pct_autogrid/backend/be_autogrid_viewport_panel.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/backend/be_autogrid_viewport_panel.html5");
    }
}
