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

/* @pct_theme_templates/customelements/customelement_chartbar.html5 */
class __TwigTemplate_6698d2ccf0e9e605bcdda094e295105c extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_chartbar.css|static';
\$GLOBALS['TL_HEAD'][] = \"<style>.ce_chart_\" . \$this->id  . \".start .chart_data{width: \" . \$this->field('procent')->value() . \"%;}</style>\";

?>

<div class=\"<?= \$this->class; ?> block ce_chart_<?= \$this->id; ?> <?= \$this->field('schema')->value(); ?>\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_chart_inside\">
\t\t<div class=\"title\"><?= \$this->field('title')->value(); ?></div>
\t\t<div class=\"chart_bg\">
\t\t\t<div class=\"chart_data <?= \$this->field('color')->value(); ?>\"><span><?= \$this->field('procent')->value(); ?>%</span></div>
\t\t</div>
\t</div>
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
\t\t\t\t\tjQuery(entry.target).addClass('start');\t
\t\t\t\t\t
\t\t\t\t\t// stop observing
\t\t\t\t\tobjObserver.unobserve( entry.target );
\t\t\t\t}
\t\t\t});
\t\t}, {root: null,rootMargin: '0px',threshold: 0.25} );
\t\tobjObserver.observe( jQuery('.ce_chart_<?= \$this->id; ?>')[0] );
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
        return "@pct_theme_templates/customelements/customelement_chartbar.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_chartbar.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_chartbar.html5");
    }
}
