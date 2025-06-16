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

/* @pct_theme_templates/customcatalog/customcatalog_catalog_reader.html5 */
class __TwigTemplate_cb878c6cf36b44b098f20034ceccaae0 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_tabs.css|static';
?>
<div class=\"single-top\">
\t<div class=\"single-top-content\">
\t\t<div class=\"single-leftside\">
\t\t\t<?php echo \$this->field('gallery')->html(); ?>
\t\t</div>
\t\t<div class=\"single-rightside\">
\t\t\t<h1><?php echo \$this->field('name')->value(); ?></h1>
\t\t\t<div class=\"single-subheadline\"><?php echo \$this->field('subheadline')->html(); ?></div>
\t\t\t<div class=\"single-rating\"><?php echo \$this->field('rating')->html(); ?><span class=\"single-rating-count\"><?php echo \$this->field('rating')->value(); ?></span></div>
\t\t\t<div class=\"single-price\"><div class=\"single-price-new\">&euro; <?php echo \$this->field('price')->html(); ?></div> <div class=\"single-price-old\">&euro; <?php echo \$this->field('price_old')->value(); ?></div></div>
\t\t\t<div class=\"single-metadata\">
\t\t\t\t<div class=\"single-metadata-col1\"><strong>ARTIKEL NR.</strong><div><?php echo \$this->field('item_number')->html(); ?></div></div>
\t\t\t\t<div class=\"single-metadata-col2 \"><strong>GR&Ouml;SSE</strong><div><?php echo \$this->field('size')->html(); ?></div></div>
\t\t\t\t<div class=\"single-metadata-col3\"><strong>STIL</strong><div><?php echo \$this->field('style')->html(); ?></div></div>
\t\t\t</div>
\t\t\t<div class=\"single-short-description\"><?php echo \$this->field('short_description')->html(); ?></div>
\t\t\t<div class=\"single-stock <?php echo \$this->field('stock')->value(); ?>\"><?php echo \$this->field('stock')->html(); ?></div>
\t\t\t<h5>Farbe</h5>
\t\t\t<div class=\"single-color\"><?php echo \$this->field('color')->html(); ?></div>
\t\t\t<?php echo \$this->field('notelist')->html(); ?>
\t\t\t<div class=\"single-print\"><a href=\"javascript:window.print();\"><i class=\"fa fa-print\"></i> Drucken</a></div>
\t\t\t<div class=\"single-mail\"><a href=\"mailto:info@yourdomain.com?subject=<?php echo \$this->field('name')->value(); ?>, Artikelnummer: <?php echo \$this->field('item_number')->value(); ?>\"><i class=\"fa fa-envelope\"></i> Per E-Mail anfragen</a></div>
\t\t</div>
\t</div>
</div>

<div class=\"single-bottom\">
\t<div class=\"ce_tabs\">
\t\t<div class=\"tabs classic tabs_<?php echo \$this->id; ?>\">
\t\t\t<ul>
\t\t\t\t<li><span>Besonderheiten</span></li>
\t\t\t\t<li><span>Beschreibung</span></li>
\t\t\t\t<li><span>Sonstiges</span></li>
\t\t\t</ul>
\t\t</div>
\t\t<div class=\"panes panes_<?php echo \$this->id; ?>\">
\t\t\t<div class=\"section active\">
\t\t\t\t<h3>Austattung</h3>
\t\t\t\t<div class=\"single-features\"><?php echo \$this->field('features')->html(); ?></div>
\t\t\t</div>
\t\t\t<div class=\"section\">
\t\t\t\t<h3>Beschreibung</h3>
\t\t\t\t<div class=\"single-desc\"><?php echo \$this->field('description')->html(); ?></div>
\t\t\t</div>
\t\t\t<div class=\"section\">
\t\t\t\t<h3>Sonstiges</h3>
\t\t\t\t<div class=\"single-desc-add\"><?php echo \$this->field('additional_desc')->html(); ?></div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
\tjQuery(\".tabs_<?php echo \$this->id; ?> li:first\").addClass('active');
    jQuery(\".tabs_<?php echo \$this->id; ?> li\").click(function(e){
        if (!jQuery(this).hasClass(\"active\")) {
            var tabNum = jQuery(this).index();
            var nthChild = tabNum+1;
            jQuery(\".tabs_<?php echo \$this->id; ?> li.active\").removeClass(\"active\");
            jQuery(this).addClass(\"active\");
            jQuery(\".panes_<?php echo \$this->id; ?> div.active\").removeClass(\"active\");
            jQuery(\".panes_<?php echo \$this->id; ?> div:nth-child(\"+nthChild+\")\").addClass(\"active\");
        }
    });
});
</script>
<!-- SEO-SCRIPT-STOP -->
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_catalog_reader.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_catalog_reader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_catalog_reader.html5");
    }
}
