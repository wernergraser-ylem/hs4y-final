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

/* @pct_theme_templates/customcatalog/customcatalog_accommodations_list.html5 */
class __TwigTemplate_e535bbdb6cc66f17a2b47698594b1eea extends Template
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
        yield "<?php if(!\$this->empty): ?>
<div class=\"item-wrapper\">
<?php 
\$sum = 0;
?>
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block <?= \$entry->class; ?> <?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"item-inside autogrid_wrapper block\">
\t\t\t
\t\t\t<div class=\"item-col1 autogrid two_sixth block\">
\t\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star bg-accent\"></i><?php endif; ?>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"item-col2 autogrid three_sixth block\">
\t\t\t\t
\t\t\t\t<div class=\"item-top-wrap\">
\t\t\t\t\t<div class=\"item-headline\">
\t\t\t\t\t\t<h5><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h5>
\t\t\t\t\t\t<div class=\"date\"><i class=\"fa fa-calendar-o\"></i><?php echo \$entry->field('arrival')->html(); ?> - <?php echo \$entry->field('departure')->html(); ?></div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"item-features\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_wifi')->value()): ?><li><i class=\"fa fa-wifi bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_accessibility')->value()): ?><li><i class=\"fa fa-wheelchair bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_restaurant')->value()): ?><li><i class=\"fa fa-cutlery bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_cabel_tv')->value()): ?><li><i class=\"fa fa-desktop bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"item-description\">
\t\t\t\t\t<?php echo \$entry->field('short_description')->value(); ?>
\t\t\t\t\t<?php echo \$entry->field('rating')->html(); ?>
\t\t\t\t</div>
\t\t\t\t
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"item-col3 autogrid one_sixth block\">
\t\t\t\t<div class=\"item-price-wrap\">
\t\t\t\t\t<div class=\"item-price-label\">AB</div>
\t\t\t\t\t<div class=\"item-price color-accent\"><?php echo \$entry->field('price')->value(); ?> &euro;</div>
\t\t\t\t\t<div class=\"item-price-add\"><?php echo \$entry->field('stay')->value(); ?> TAGE</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t
\t\t</div>
\t\t\t
\t</div>
\t
<?php 
\$sum += \$entry->field('price')->value(); ?>
<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Keine Package gefunden</p>
<?php endif;?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_accommodations_list.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_accommodations_list.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_accommodations_list.html5");
    }
}
