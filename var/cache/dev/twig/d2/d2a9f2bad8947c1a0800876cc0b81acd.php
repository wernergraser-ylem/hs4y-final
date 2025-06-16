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

/* @pct_theme_templates/customcatalog/customcatalog_directory_reader.html5 */
class __TwigTemplate_14eba97b69280e18e736faf756ca3130 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_directory_reader.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_directory_reader.html5"));

        // line 1
        yield "<div class=\"autogrid_wrapper block\">
\t<div class=\"single-leftside autogrid two_third block\">
\t\t<h1 class=\"color-accent\"><?php echo \$this->field('name')->value(); ?></h1>
\t\t<?php if(\$this->field('short_description')->value()): ?>
\t\t\t<div class=\"single-short-description font-size-xxs\"><?php echo \$this->field('short_description')->value(); ?></div>
\t\t<?php endif; ?>
\t\t<?php if(\$this->field('item_number')->value()): ?>
\t\t\t<div class=\"single-item-number bg-accent\"><i class=\"fa fa-tag\"></i><?php echo \$this->field('item_number')->value(); ?></div>
\t\t<?php endif; ?>
\t\t<div class=\"single-box-one\">
\t\t\t<div class=\"single-top-content\">
\t\t\t\t<?php if(\$this->field('gallery')->value()): ?>\t
\t\t\t\t\t<?php echo \$this->field('gallery')->html(); ?>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('description')->value()): ?>
\t\t\t\t\t<div class=\"single-description\"><?php echo \$this->field('description')->html(); ?></div>
\t\t\t\t<?php endif; ?>
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t<div class=\"single-rightside autogrid one_third block\">\t
\t\t<div class=\"single-box-two\">
\t\t\t<?php echo \$this->field('geolocation')->html(); ?>
\t\t\t<div class=\"single-place\"><?php echo \$this->field('geolocation')->option('street'); ?><br><?php echo \$this->field('geolocation')->option('zipcode'); ?> <?php echo \$this->field('geolocation')->option('city'); ?><br><?php echo \$this->field('geolocation')->option('country'); ?></div>
\t\t\t<div class=\"single-maps-directions\"><i class=\"fa fa-long-arrow-right color-accent\"></i><a href=\"https://maps.google.com/maps?daddr=<?php echo \$this->field('geolocation')->value(); ?>\" target=\"_blank\" class=\"color-accent\">Get directions</a></div>
\t\t\t<div class=\"ce_hyperlink\"><a href=\"mailto:info@yourdomain.com?subject=<?php echo \$this->field('name')->value(); ?>, Artikelnummer: <?php echo \$this->field('item_number')->value(); ?>\">Anfrage senden</a></div>
\t\t</div>
\t\t
\t\t<div class=\"single-box-three\">
\t\t\t<?php if(\$this->field('price')->value()): ?>\t
\t\t\t\t<div class=\"price font-size-s color-accent\"><i class=\"fa fa-ticket\"></i><?php echo \$this->field('price')->html(); ?> &euro;</div>
\t\t\t<?php endif; ?>
\t\t\t<?php if(\$this->field('description_more')->value()): ?>
\t\t\t\t<div class=\"single-description-more\"><?php echo \$this->field('description_more')->html(); ?></div>
\t\t\t<?php endif; ?>
\t\t\t<div class=\"single-print\"><a href=\"javascript:window.print();\"><i class=\"fa fa-print\"></i> Drucken</a></div>
\t\t\t<div class=\"single-mail\"><a href=\"mailto:info@yourdomain.com?subject=<?php echo \$this->field('name')->value(); ?>, Artikelnummer: <?php echo \$this->field('item_number')->value(); ?>\"><i class=\"fa fa-envelope\"></i> Per E-Mail anfragen</a></div>
\t\t</div>
\t</div>
</div>
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
        return "@pct_theme_templates/customcatalog/customcatalog_directory_reader.html5";
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
        return new Source("<div class=\"autogrid_wrapper block\">
\t<div class=\"single-leftside autogrid two_third block\">
\t\t<h1 class=\"color-accent\"><?php echo \$this->field('name')->value(); ?></h1>
\t\t<?php if(\$this->field('short_description')->value()): ?>
\t\t\t<div class=\"single-short-description font-size-xxs\"><?php echo \$this->field('short_description')->value(); ?></div>
\t\t<?php endif; ?>
\t\t<?php if(\$this->field('item_number')->value()): ?>
\t\t\t<div class=\"single-item-number bg-accent\"><i class=\"fa fa-tag\"></i><?php echo \$this->field('item_number')->value(); ?></div>
\t\t<?php endif; ?>
\t\t<div class=\"single-box-one\">
\t\t\t<div class=\"single-top-content\">
\t\t\t\t<?php if(\$this->field('gallery')->value()): ?>\t
\t\t\t\t\t<?php echo \$this->field('gallery')->html(); ?>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('description')->value()): ?>
\t\t\t\t\t<div class=\"single-description\"><?php echo \$this->field('description')->html(); ?></div>
\t\t\t\t<?php endif; ?>
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t<div class=\"single-rightside autogrid one_third block\">\t
\t\t<div class=\"single-box-two\">
\t\t\t<?php echo \$this->field('geolocation')->html(); ?>
\t\t\t<div class=\"single-place\"><?php echo \$this->field('geolocation')->option('street'); ?><br><?php echo \$this->field('geolocation')->option('zipcode'); ?> <?php echo \$this->field('geolocation')->option('city'); ?><br><?php echo \$this->field('geolocation')->option('country'); ?></div>
\t\t\t<div class=\"single-maps-directions\"><i class=\"fa fa-long-arrow-right color-accent\"></i><a href=\"https://maps.google.com/maps?daddr=<?php echo \$this->field('geolocation')->value(); ?>\" target=\"_blank\" class=\"color-accent\">Get directions</a></div>
\t\t\t<div class=\"ce_hyperlink\"><a href=\"mailto:info@yourdomain.com?subject=<?php echo \$this->field('name')->value(); ?>, Artikelnummer: <?php echo \$this->field('item_number')->value(); ?>\">Anfrage senden</a></div>
\t\t</div>
\t\t
\t\t<div class=\"single-box-three\">
\t\t\t<?php if(\$this->field('price')->value()): ?>\t
\t\t\t\t<div class=\"price font-size-s color-accent\"><i class=\"fa fa-ticket\"></i><?php echo \$this->field('price')->html(); ?> &euro;</div>
\t\t\t<?php endif; ?>
\t\t\t<?php if(\$this->field('description_more')->value()): ?>
\t\t\t\t<div class=\"single-description-more\"><?php echo \$this->field('description_more')->html(); ?></div>
\t\t\t<?php endif; ?>
\t\t\t<div class=\"single-print\"><a href=\"javascript:window.print();\"><i class=\"fa fa-print\"></i> Drucken</a></div>
\t\t\t<div class=\"single-mail\"><a href=\"mailto:info@yourdomain.com?subject=<?php echo \$this->field('name')->value(); ?>, Artikelnummer: <?php echo \$this->field('item_number')->value(); ?>\"><i class=\"fa fa-envelope\"></i> Per E-Mail anfragen</a></div>
\t\t</div>
\t</div>
</div>
", "@pct_theme_templates/customcatalog/customcatalog_directory_reader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_directory_reader.html5");
    }
}
