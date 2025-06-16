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

/* @pct_theme_settings/backend/be_viewport_panel.html5 */
class __TwigTemplate_c52cae89cf75a38beca68d9de118d021 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/backend/be_viewport_panel.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/backend/be_viewport_panel.html5"));

        // line 1
        yield "<div id=\"viewport_panel\">
\t<ul class=\"buttons\">
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['viewport_panel']['desktop']; ?>\" class=\"desktop button clickable\"data-viewport=\"desktop\"><i></i><span><?= \$GLOBALS['TL_LANG']['viewport_panel']['desktop']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['viewport_panel']['tablet']; ?>\" class=\"tablet button clickable\" data-viewport=\"tablet\"><i></i><span><?= \$GLOBALS['TL_LANG']['viewport_panel']['tablet']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['viewport_panel']['mobile']; ?>\" class=\"mobile button clickable\" data-viewport=\"mobile\"><i></i><span><?= \$GLOBALS['TL_LANG']['viewport_panel']['mobile']; ?></span></li>
\t</ul>
</div>
<script>
/**
 * Create viewport button panel and apply viewport based classes
 */
jQuery(document).ready(function() 
{
\t// localstorage
\tvar strViewport = localStorage.getItem('viewport');
\tif ( strViewport == null || strViewport == undefined )
\t{
\t\tstrViewport = 'desktop';
\t\tlocalStorage.setItem('viewport',strViewport);
\t}
\t// set body class
\tjQuery('body').addClass('viewport_'+strViewport);
\t// inject panel in contao listing
\tjQuery('#tl_listing .tl_header').after( jQuery('#viewport_panel') );
\t// set button active
\tjQuery('#viewport_panel .clickable.'+strViewport).addClass('active');
\t
\tjQuery('#viewport_panel .clickable').click(function(e)
\t{
\t\tvar strViewport = jQuery(this).data('viewport');
\t\t// toggle active
\t\tjQuery(this).siblings('.clickable').removeClass('active');
\t\tjQuery(this).addClass('active');
\t\t
\t\t// send ajax
\t\tjQuery.ajax(
\t\t{
\t\t\turl: location.href,
\t\t\tmethod:'POST',
\t\t\tdata: {'action':'toggleViewport','viewport':strViewport}
\t\t});
\t\t// remove body classes
\t\tjQuery('body').removeClass(['viewport_desktop','viewport_mobile','viewport_tablet']);
\t\t// set body class
\t\tjQuery('body').addClass('viewport_'+strViewport);
\t\t// store in localstorage
\t\tlocalStorage.setItem('viewport',strViewport);
\t\t// trigger event
\t\tjQuery(document).trigger('THEME_SETTINGS.viewport',{'viewport':strViewport});
\t});
});

//!-- Event listener: THEME_SETTINGS.viewport
jQuery(document).on('THEME_SETTINGS.viewport',function(e,params)
{
\t// trigger autogrid viewport panel button
\tjQuery('#autogrid_viewport_panel .clickable.'+params.viewport).click();
});
//--
</script>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_settings/backend/be_viewport_panel.html5";
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
        return new Source("<div id=\"viewport_panel\">
\t<ul class=\"buttons\">
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['viewport_panel']['desktop']; ?>\" class=\"desktop button clickable\"data-viewport=\"desktop\"><i></i><span><?= \$GLOBALS['TL_LANG']['viewport_panel']['desktop']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['viewport_panel']['tablet']; ?>\" class=\"tablet button clickable\" data-viewport=\"tablet\"><i></i><span><?= \$GLOBALS['TL_LANG']['viewport_panel']['tablet']; ?></span></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['viewport_panel']['mobile']; ?>\" class=\"mobile button clickable\" data-viewport=\"mobile\"><i></i><span><?= \$GLOBALS['TL_LANG']['viewport_panel']['mobile']; ?></span></li>
\t</ul>
</div>
<script>
/**
 * Create viewport button panel and apply viewport based classes
 */
jQuery(document).ready(function() 
{
\t// localstorage
\tvar strViewport = localStorage.getItem('viewport');
\tif ( strViewport == null || strViewport == undefined )
\t{
\t\tstrViewport = 'desktop';
\t\tlocalStorage.setItem('viewport',strViewport);
\t}
\t// set body class
\tjQuery('body').addClass('viewport_'+strViewport);
\t// inject panel in contao listing
\tjQuery('#tl_listing .tl_header').after( jQuery('#viewport_panel') );
\t// set button active
\tjQuery('#viewport_panel .clickable.'+strViewport).addClass('active');
\t
\tjQuery('#viewport_panel .clickable').click(function(e)
\t{
\t\tvar strViewport = jQuery(this).data('viewport');
\t\t// toggle active
\t\tjQuery(this).siblings('.clickable').removeClass('active');
\t\tjQuery(this).addClass('active');
\t\t
\t\t// send ajax
\t\tjQuery.ajax(
\t\t{
\t\t\turl: location.href,
\t\t\tmethod:'POST',
\t\t\tdata: {'action':'toggleViewport','viewport':strViewport}
\t\t});
\t\t// remove body classes
\t\tjQuery('body').removeClass(['viewport_desktop','viewport_mobile','viewport_tablet']);
\t\t// set body class
\t\tjQuery('body').addClass('viewport_'+strViewport);
\t\t// store in localstorage
\t\tlocalStorage.setItem('viewport',strViewport);
\t\t// trigger event
\t\tjQuery(document).trigger('THEME_SETTINGS.viewport',{'viewport':strViewport});
\t});
});

//!-- Event listener: THEME_SETTINGS.viewport
jQuery(document).on('THEME_SETTINGS.viewport',function(e,params)
{
\t// trigger autogrid viewport panel button
\tjQuery('#autogrid_viewport_panel .clickable.'+params.viewport).click();
});
//--
</script>", "@pct_theme_settings/backend/be_viewport_panel.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/backend/be_viewport_panel.html5");
    }
}
