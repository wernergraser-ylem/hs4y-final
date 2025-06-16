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

/* @pct_theme_templates/customelements/customelement_piecharts.html5 */
class __TwigTemplate_c8fb8147993b5a7e414ac127a3e5a2a8 extends Template
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
        yield "<?php
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/easypiecharts/easypiechart.min.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_piechart.css|static';
?>
<div class=\"<?= \$this->class; ?> block\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"piechart\" id=\"piechart_<?= \$this->id; ?>\" data-percent=\"<?= \$this->field('percent')->value(); ?>\" style=\"height:<?= \$this->field('size')->value(); ?>px\"><span class=\"prozent\"><?= \$this->field('label')->value(); ?></span></div>
\t<?= \$this->field('headline')->html(); ?>
\t<div class=\"text\"><?= \$this->field('text')->value(); ?></div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\tfunction initObserver() 
\t{
\t\tvar objObserver = new IntersectionObserver( function(entries, observer)
\t\t{
\t\t\tentries.forEach(function(entry) 
\t\t\t{
\t\t\t\tif (entry.isIntersecting) 
\t\t\t\t{
\t\t\t\t\tjQuery(entry.target).easyPieChart(
\t\t\t\t\t{
\t\t\t\t\t\tanimate: <?= \$this->field('duration')->value() == '' ? '500' : \$this->field('duration')->value(); ?>,
\t\t\t\t\t\tlineWidth: <?= \$this->field('linewidth')->value() == '' ? '4' : \$this->field('linewidth')->value(); ?>,
\t\t\t\t\t\tsize: <?= \$this->field('size')->value() == '' ? '180' : \$this->field('size')->value(); ?>,
\t\t\t\t\t\tbarColor:'rgba(<?= \$this->field('barcolor')->value() == '' ? '0,0,0,0.5' : \$this->field('barcolor')->value(); ?>)',
\t\t\t\t\t\ttrackColor:'rgba(<?= \$this->field('trackcolor')->value() == '' ? '0,0,0,0.2' : \$this->field('trackcolor')->value(); ?>)',
\t\t\t\t\t\tlineCap:'butt',
\t\t\t\t\t\tscaleColor: 'rgba(<?= \$this->field('barcolor')->value() == '' ? '0,0,0,0.5' : \$this->field('barcolor')->value(); ?>)',
\t\t\t\t\t\tscaleLength: <?= \$this->field('scalelength')->value(); ?>
\t\t\t\t\t});
\t\t\t\t\t// stop observing
\t\t\t\t\tobjObserver.unobserve( entry.target );\t
\t\t\t\t}
\t\t\t});
\t\t}, {root: null,rootMargin: '0px',threshold: 0.25} );
\t\tobjObserver.observe( jQuery('#piechart_<?= \$this->id; ?>')[0] );
\t}

\t// check if a revolutionslider exists in page
\tif (jQuery(document).revolution != undefined)
\t{
\t\tjQuery(document).on('RevolutionSlider.loaded', function (e, params)
\t\t{ 
\t\t\tinitObserver();
\t\t});
\t}
\telse
\t{
\t\tinitObserver();
\t}
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_piecharts.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_piecharts.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_piecharts.html5");
    }
}
