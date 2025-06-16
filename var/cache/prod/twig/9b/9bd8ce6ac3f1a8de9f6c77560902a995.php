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
class __TwigTemplate_b66f76ff83f07f92f0d14bf72af4c74d extends Template
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
        // line 1
        yield "<div id=\"autogrid_viewport_panel\">
\t<ul class=\"buttons\">
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['desktop']; ?>\" class=\"desktop button clickable\"data-viewport=\"desktop\"><i></i><span><?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['desktop']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['tablet']; ?>\" class=\"tablet button clickable\" data-viewport=\"tablet\"><i></i><span><?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['tablet']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['mobile']; ?>\" class=\"mobile button clickable\" data-viewport=\"mobile\"><i></i><span><?= \$GLOBALS['TL_LANG']['autogrid_viewport_panel']['mobile']; ?></span></li>
\t</ul>
</div>";
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_autogrid/backend/be_autogrid_viewport_panel.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/backend/be_autogrid_viewport_panel.html5");
    }
}
