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

/* @pct_theme_templates/customcatalog/customcatalog_directory_list.html5 */
class __TwigTemplate_b7ae0fa7850f0eb27831990e1893c8d6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_directory_list.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_directory_list.html5"));

        // line 1
        yield "<?php if(!\$this->empty): ?>
<div class=\"item-wrapper catalog_<?php echo \$this->id; ?>\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block <?= \$entry->class; ?> <?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"item-inside\">
\t\t\t<?php if(\$entry->field('highlight')->value()): ?><i class=\"bg-accent highlight fa fa-star\"></i><?php endif; ?>
\t\t\t<div class=\"image\"><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a></div>
\t\t\t
\t\t\t<div class=\"content\">
\t\t\t\t<div class=\"content-inside\">
\t\t\t\t\t<h6><a href=\"<?php echo \$entry->links('detail')->url; ?>\" class=\"color-accent\"><?php echo \$entry->field('name')->value(); ?></a></h6>
\t\t\t\t\t<?php if(\$entry->field('short_description')->value()): ?><div class=\"short_description\"><?php echo \$entry->field('short_description')->value(); ?></div><?php endif; ?>
\t\t\t\t\t<div class=\"brand\"><?php echo \$entry->field('brand')->html(); ?></div>
\t\t\t\t\t<div class=\"content_bottom\">
\t\t\t\t\t\t<div class=\"geolocation\"><i class=\"fa fa-bullseye\"></i><?php echo \$entry->field('geolocation')->option('zipcode'); ?> <?php echo \$entry->field('geolocation')->option('city'); ?></div>
\t\t\t\t\t\t<?php if(\$entry->field('price')->value()): ?><div class=\"price color-accent\">&euro; <?php echo \$entry->field('price')->html(); ?></div><?php endif; ?>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t\t
\t</div>

<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Keine Artikel gefunden</p>
<?php endif;?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_directory_list.html5";
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
        return new Source("<?php if(!\$this->empty): ?>
<div class=\"item-wrapper catalog_<?php echo \$this->id; ?>\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block <?= \$entry->class; ?> <?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"item-inside\">
\t\t\t<?php if(\$entry->field('highlight')->value()): ?><i class=\"bg-accent highlight fa fa-star\"></i><?php endif; ?>
\t\t\t<div class=\"image\"><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a></div>
\t\t\t
\t\t\t<div class=\"content\">
\t\t\t\t<div class=\"content-inside\">
\t\t\t\t\t<h6><a href=\"<?php echo \$entry->links('detail')->url; ?>\" class=\"color-accent\"><?php echo \$entry->field('name')->value(); ?></a></h6>
\t\t\t\t\t<?php if(\$entry->field('short_description')->value()): ?><div class=\"short_description\"><?php echo \$entry->field('short_description')->value(); ?></div><?php endif; ?>
\t\t\t\t\t<div class=\"brand\"><?php echo \$entry->field('brand')->html(); ?></div>
\t\t\t\t\t<div class=\"content_bottom\">
\t\t\t\t\t\t<div class=\"geolocation\"><i class=\"fa fa-bullseye\"></i><?php echo \$entry->field('geolocation')->option('zipcode'); ?> <?php echo \$entry->field('geolocation')->option('city'); ?></div>
\t\t\t\t\t\t<?php if(\$entry->field('price')->value()): ?><div class=\"price color-accent\">&euro; <?php echo \$entry->field('price')->html(); ?></div><?php endif; ?>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t\t
\t</div>

<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Keine Artikel gefunden</p>
<?php endif;?>", "@pct_theme_templates/customcatalog/customcatalog_directory_list.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_directory_list.html5");
    }
}
