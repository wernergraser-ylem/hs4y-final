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

/* @pct_theme_templates/customcatalog/customcatalog_cardealer_reader.html5 */
class __TwigTemplate_6b6f458d693941740a0fbebbea6c0001 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_cardealer_reader.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_cardealer_reader.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_tabs.css|static';
?>
<div class=\"single-top\">
\t<h1><?php echo \$this->field('name')->value(); ?></h1>
\t<div class=\"single-top-content\">
\t\t<div class=\"single-leftside\">
\t\t\t<?php echo \$this->field('gallery')->html(); ?>
\t\t</div>
\t\t<div class=\"single-rightside\">
\t\t\t<div class=\"single-price\"><strong>&euro; <?php echo \$this->field('price')->html(); ?></strong> <span><?php echo \$this->field('price_add')->value(); ?></span></div>
\t\t\t<div class=\"single-metadata\">
\t\t\t\t<div class=\"single-metadata-col1\"><strong>JAHR</strong><?php echo \$this->field('year')->value(); ?></div>
\t\t\t\t<div class=\"single-metadata-col2\"><strong>HUBRAUM</strong><?php echo \$this->field('cubic')->value(); ?></div>
\t\t\t\t<div class=\"single-metadata-col3\"><strong>KM-STAND</strong><?php echo \$this->field('mileage')->value(); ?></div>
\t\t\t</div>
\t\t\t<table class=\"table-striped\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Zustand</td>
\t\t\t\t\t<td><?php echo \$this->field('state')->html(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>Treibstoff</td>
\t\t\t\t\t<td><?php echo \$this->field('transmission')->html(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>Getriebe</td>
\t\t\t\t\t<td><?php echo \$this->field('transmissiondata')->value(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>Zul. Gesamtgewicht</td>
\t\t\t\t\t<td><?php echo \$this->field('weight')->value(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>Innenausstattung</td>
\t\t\t\t\t<td><?php echo \$this->field('interieur')->value(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>T&uuml;ren</td>
\t\t\t\t\t<td><?php echo \$this->field('doors')->value(); ?></td>
\t\t\t\t</tr>
\t\t\t</table>\t
\t\t\t<div class=\"short-description\"><?php echo \$this->field('short_description')->html(); ?></div>
\t\t\t<?php echo \$this->field('notelist')->html(); ?>
\t\t\t<div class=\"single-print\"><a href=\"javascript:window.print();\"><i class=\"fa fa-print\"></i> Drucken</a></div>
\t\t\t<div class=\"single-mail\"><a href=\"mailto:info@yourdomain.com?subject=<?php echo \$this->field('name')->value(); ?>, Modellnummer: <?php echo \$this->field('propety_number')->value(); ?>\"><i class=\"fa fa-envelope\"></i> Per E-Mail anfragen</a></div>
\t\t</div>
\t</div>
</div>

<div class=\"single-bottom\">
\t<div class=\"ce_tabs\">
\t\t<div class=\"tabs classic tabs_<?php echo \$this->id; ?>\">
\t\t\t<ul>
\t\t\t\t<li><span>Austattung</span></li>
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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_cardealer_reader.html5";
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
        return new Source("<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_tabs.css|static';
?>
<div class=\"single-top\">
\t<h1><?php echo \$this->field('name')->value(); ?></h1>
\t<div class=\"single-top-content\">
\t\t<div class=\"single-leftside\">
\t\t\t<?php echo \$this->field('gallery')->html(); ?>
\t\t</div>
\t\t<div class=\"single-rightside\">
\t\t\t<div class=\"single-price\"><strong>&euro; <?php echo \$this->field('price')->html(); ?></strong> <span><?php echo \$this->field('price_add')->value(); ?></span></div>
\t\t\t<div class=\"single-metadata\">
\t\t\t\t<div class=\"single-metadata-col1\"><strong>JAHR</strong><?php echo \$this->field('year')->value(); ?></div>
\t\t\t\t<div class=\"single-metadata-col2\"><strong>HUBRAUM</strong><?php echo \$this->field('cubic')->value(); ?></div>
\t\t\t\t<div class=\"single-metadata-col3\"><strong>KM-STAND</strong><?php echo \$this->field('mileage')->value(); ?></div>
\t\t\t</div>
\t\t\t<table class=\"table-striped\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Zustand</td>
\t\t\t\t\t<td><?php echo \$this->field('state')->html(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>Treibstoff</td>
\t\t\t\t\t<td><?php echo \$this->field('transmission')->html(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>Getriebe</td>
\t\t\t\t\t<td><?php echo \$this->field('transmissiondata')->value(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>Zul. Gesamtgewicht</td>
\t\t\t\t\t<td><?php echo \$this->field('weight')->value(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>Innenausstattung</td>
\t\t\t\t\t<td><?php echo \$this->field('interieur')->value(); ?></td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>T&uuml;ren</td>
\t\t\t\t\t<td><?php echo \$this->field('doors')->value(); ?></td>
\t\t\t\t</tr>
\t\t\t</table>\t
\t\t\t<div class=\"short-description\"><?php echo \$this->field('short_description')->html(); ?></div>
\t\t\t<?php echo \$this->field('notelist')->html(); ?>
\t\t\t<div class=\"single-print\"><a href=\"javascript:window.print();\"><i class=\"fa fa-print\"></i> Drucken</a></div>
\t\t\t<div class=\"single-mail\"><a href=\"mailto:info@yourdomain.com?subject=<?php echo \$this->field('name')->value(); ?>, Modellnummer: <?php echo \$this->field('propety_number')->value(); ?>\"><i class=\"fa fa-envelope\"></i> Per E-Mail anfragen</a></div>
\t\t</div>
\t</div>
</div>

<div class=\"single-bottom\">
\t<div class=\"ce_tabs\">
\t\t<div class=\"tabs classic tabs_<?php echo \$this->id; ?>\">
\t\t\t<ul>
\t\t\t\t<li><span>Austattung</span></li>
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
", "@pct_theme_templates/customcatalog/customcatalog_cardealer_reader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_cardealer_reader.html5");
    }
}
