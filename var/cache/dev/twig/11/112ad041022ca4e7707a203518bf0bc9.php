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

/* @pct_theme_templates/customcatalog/customcatalog_immorealty_reader.html5 */
class __TwigTemplate_cdb0288d062ee48b42244685a43555b5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_immorealty_reader.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_immorealty_reader.html5"));

        // line 1
        yield "
\t<div class=\"propety-headline\">
\t\t<h2 class=\"name\"><?php echo \$this->field('name')->value(); ?></h2>
\t\t<div class=\"place\"><i class=\"fa fa-dot-circle-o\"></i><?php echo \$this->field('place')->html(); ?></div>
\t</div>
\t<div class=\"propety-header\">
\t\t<div class=\"image\">
\t\t\t<?php echo \$this->field('image')->html(); ?>
\t\t\t<?php if(\$this->field('purchase_price')->value() > 0): ?>
\t\t\t<div class=\"price\">&euro; <?php echo \$this->field('purchase_price')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if(\$this->field('rent_price')->value() > 0): ?>
\t\t\t<div class=\"price\">&euro; <?php echo \$this->field('rent_price')->value(); ?> / Monat</div>
\t\t\t<?php endif; ?>

\t\t</div>
\t</div>
\t<ul class=\"property-meta\">
\t\t<li><i class=\"fa fa-bookmark\"></i>Objektnummer: <?php echo \$this->field('propety_number')->value(); ?></li>
\t\t<li><i class=\"fa fa-expand\"></i>Gesamfl&auml;che: <?php echo \$this->field('size')->value(); ?>m&sup2;</li>
\t\t<li><i class=\"fa fa-car\"></i><?php echo \$this->field('parking')->value(); ?> Parkpl&auml;tze</li>
\t\t<li><i class=\"fa fa-tint\"></i><?php echo \$this->field('bathroom')->value(); ?> Badezimmer</li>
\t\t<li><i class=\"fa fa-bed\"></i><?php echo \$this->field('rooms')->html(); ?></li>
\t\t<?php if(\$this->field('purchase_price')->value() > 0): ?><li><i class=\"fa fa-calculator\"></i>&euro; <?php echo \$this->field('purchase_price')->value(); ?></li><?php endif; ?>
\t\t<?php if(\$this->field('rent_price')->value() > 0): ?><li><i class=\"fa fa-calculator\"></i>&euro; <?php echo \$this->field('rent_price')->value(); ?></li><?php endif; ?>
\t</ul>
\t
\t<div class=\"property-description\">
\t\t<h3>Beschreibung</h3>
\t\t<?php echo \$this->field('description')->html(); ?>
\t</div>
\t<div class=\"property-gallery\">
\t\t<?php echo \$this->field('gallery')->html(); ?>
\t</div>
\t<div class=\"property-furnishing\">
\t\t<h3>Ausstattung</h3>
\t\t<?php echo \$this->field('furnishing')->html(); ?>
\t</div>
\t<div class=\"objekt-map\">
\t\t<h3>Maps</h3>
\t\t<?php echo \$this->field('map')->html(); ?>
\t</div>
\t
\t<h3>Adresse</h3>
\t<ul class=\"objekt-adresse\">
\t\t<li><?php echo \$this->field('map')->option('street'); ?></li>
\t\t<li><?php echo \$this->field('map')->option('zipcode'); ?> <?php echo \$this->field('map')->option('city'); ?></li>
\t\t<li><?php echo \$this->field('map')->option('country'); ?></li>
\t</ul>
\t
\t<h3>Merkliste</h3>
\t<div><?php echo \$this->field('notelist')->html(); ?></div>


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
        return "@pct_theme_templates/customcatalog/customcatalog_immorealty_reader.html5";
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
        return new Source("
\t<div class=\"propety-headline\">
\t\t<h2 class=\"name\"><?php echo \$this->field('name')->value(); ?></h2>
\t\t<div class=\"place\"><i class=\"fa fa-dot-circle-o\"></i><?php echo \$this->field('place')->html(); ?></div>
\t</div>
\t<div class=\"propety-header\">
\t\t<div class=\"image\">
\t\t\t<?php echo \$this->field('image')->html(); ?>
\t\t\t<?php if(\$this->field('purchase_price')->value() > 0): ?>
\t\t\t<div class=\"price\">&euro; <?php echo \$this->field('purchase_price')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if(\$this->field('rent_price')->value() > 0): ?>
\t\t\t<div class=\"price\">&euro; <?php echo \$this->field('rent_price')->value(); ?> / Monat</div>
\t\t\t<?php endif; ?>

\t\t</div>
\t</div>
\t<ul class=\"property-meta\">
\t\t<li><i class=\"fa fa-bookmark\"></i>Objektnummer: <?php echo \$this->field('propety_number')->value(); ?></li>
\t\t<li><i class=\"fa fa-expand\"></i>Gesamfl&auml;che: <?php echo \$this->field('size')->value(); ?>m&sup2;</li>
\t\t<li><i class=\"fa fa-car\"></i><?php echo \$this->field('parking')->value(); ?> Parkpl&auml;tze</li>
\t\t<li><i class=\"fa fa-tint\"></i><?php echo \$this->field('bathroom')->value(); ?> Badezimmer</li>
\t\t<li><i class=\"fa fa-bed\"></i><?php echo \$this->field('rooms')->html(); ?></li>
\t\t<?php if(\$this->field('purchase_price')->value() > 0): ?><li><i class=\"fa fa-calculator\"></i>&euro; <?php echo \$this->field('purchase_price')->value(); ?></li><?php endif; ?>
\t\t<?php if(\$this->field('rent_price')->value() > 0): ?><li><i class=\"fa fa-calculator\"></i>&euro; <?php echo \$this->field('rent_price')->value(); ?></li><?php endif; ?>
\t</ul>
\t
\t<div class=\"property-description\">
\t\t<h3>Beschreibung</h3>
\t\t<?php echo \$this->field('description')->html(); ?>
\t</div>
\t<div class=\"property-gallery\">
\t\t<?php echo \$this->field('gallery')->html(); ?>
\t</div>
\t<div class=\"property-furnishing\">
\t\t<h3>Ausstattung</h3>
\t\t<?php echo \$this->field('furnishing')->html(); ?>
\t</div>
\t<div class=\"objekt-map\">
\t\t<h3>Maps</h3>
\t\t<?php echo \$this->field('map')->html(); ?>
\t</div>
\t
\t<h3>Adresse</h3>
\t<ul class=\"objekt-adresse\">
\t\t<li><?php echo \$this->field('map')->option('street'); ?></li>
\t\t<li><?php echo \$this->field('map')->option('zipcode'); ?> <?php echo \$this->field('map')->option('city'); ?></li>
\t\t<li><?php echo \$this->field('map')->option('country'); ?></li>
\t</ul>
\t
\t<h3>Merkliste</h3>
\t<div><?php echo \$this->field('notelist')->html(); ?></div>


", "@pct_theme_templates/customcatalog/customcatalog_immorealty_reader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_immorealty_reader.html5");
    }
}
