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

/* @pct_theme_templates/customcatalog/customcatalog_hotelapart_packages_teaser.html5 */
class __TwigTemplate_6f89328a1cc9688ede1d89ada7ce69bb extends Template
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
<div class=\"item-wrapper autogrid_wrapper block\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block autogrid one_third entry\" <?php echo \$this->cssID; ?>>
\t\t<div class=\"item-inside block\">
\t\t\t<div class=\"item-price-wrap\">
\t\t\t\t<div class=\"item-price-label\">AB</div>
\t\t\t\t<div class=\"item-price color-accent\"><?php echo \$entry->field('price')->value(); ?> &euro;</div>
\t\t\t\t<div class=\"item-price-add\"><?php echo \$entry->field('stay')->value(); ?> TAGE</div>
\t\t\t</div>
\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star bg-accent\"></i><?php endif; ?>
\t\t\t<div class=\"item-content\">
\t\t\t\t<div class=\"item-top-wrap\">
\t\t\t\t\t<div class=\"item-headline\">
\t\t\t\t\t\t<h5><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h5>
\t\t\t\t\t\t<div class=\"date\"><i class=\"fa fa-calendar-o\"></i><?php echo \$entry->field('arrival')->html(); ?> - <?php echo \$entry->field('departure')->html(); ?></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"item-features\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_wifi')->value()): ?><li><i class=\"fa fa-wifi bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_accessibility')->value()): ?><li><i class=\"fa fa-wheelchair bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_restaurant')->value()): ?><li><i class=\"fa fa-cutlery bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_cabel_tv')->value()): ?><li><i class=\"fa fa-desktop bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"item-description\">
\t\t\t\t\t<?php echo \$entry->field('short_description')->value(); ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Kein Package gefunden</p>
<?php endif;?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_hotelapart_packages_teaser.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_hotelapart_packages_teaser.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_hotelapart_packages_teaser.html5");
    }
}
