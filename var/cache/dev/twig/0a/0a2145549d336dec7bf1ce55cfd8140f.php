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

/* @pct_theme_templates/customcatalog/customcatalog_catalog_list.html5 */
class __TwigTemplate_eb84a3e3fd5a31ee605e69481f5b8cfb extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_catalog_list.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_catalog_list.html5"));

        // line 1
        yield "<?php \$sum = 0; ?>
<?php if(!\$this->empty): ?>
<div class=\"item-wrapper\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block <?= \$entry->class; ?> <?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"item-inside\">
\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star\"></i><?php endif; ?>
\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t<h6><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h6>
\t\t\t<div class=\"brand\"><?php echo \$entry->field('brand')->html(); ?></div>
\t\t\t<div class=\"price color-accent\">&euro;<?php echo \$entry->field('price')->value(); ?><?php if(\$entry->field('price_old')->value()): ?><span> &euro;<?php echo \$entry->field('price_old')->value(); ?></span><?php endif; ?></div>
\t\t\t<div class=\"more-buttom\"><a href=\"<?php echo \$entry->links('detail')->url; ?>\">DETAILS</a></div>
\t\t</div>
\t\t\t
\t</div>
\t
<?php \$sum += \$entry->field('price')->value(); ?>

<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Keine Artikel gefunden</p>
<?php endif;?>

<div class=\"notelist-sum bg-accent\">
\t<div class=\"headline\">Gesamtsumme: </div>
\t<span>&euro; <?php echo \$sum; ?></span>
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
        return "@pct_theme_templates/customcatalog/customcatalog_catalog_list.html5";
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
        return new Source("<?php \$sum = 0; ?>
<?php if(!\$this->empty): ?>
<div class=\"item-wrapper\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block <?= \$entry->class; ?> <?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"item-inside\">
\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star\"></i><?php endif; ?>
\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t<h6><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h6>
\t\t\t<div class=\"brand\"><?php echo \$entry->field('brand')->html(); ?></div>
\t\t\t<div class=\"price color-accent\">&euro;<?php echo \$entry->field('price')->value(); ?><?php if(\$entry->field('price_old')->value()): ?><span> &euro;<?php echo \$entry->field('price_old')->value(); ?></span><?php endif; ?></div>
\t\t\t<div class=\"more-buttom\"><a href=\"<?php echo \$entry->links('detail')->url; ?>\">DETAILS</a></div>
\t\t</div>
\t\t\t
\t</div>
\t
<?php \$sum += \$entry->field('price')->value(); ?>

<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Keine Artikel gefunden</p>
<?php endif;?>

<div class=\"notelist-sum bg-accent\">
\t<div class=\"headline\">Gesamtsumme: </div>
\t<span>&euro; <?php echo \$sum; ?></span>
</div>", "@pct_theme_templates/customcatalog/customcatalog_catalog_list.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_catalog_list.html5");
    }
}
