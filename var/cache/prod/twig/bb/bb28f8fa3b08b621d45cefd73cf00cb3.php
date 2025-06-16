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

/* @pct_theme_templates/customcatalog/customcatalog_immorealty_list.html5 */
class __TwigTemplate_f00ae22d07a6260f5247e79d62f93c28 extends Template
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
<div class=\"entries\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block <?= \$entry->class; ?> <?php if(\$entry->field('top_object')->value()): ?> top_object<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"cc_immorealty_inside\">
\t\t\t
\t\t\t<div class=\"cc_immorealty_top\">
\t\t\t\t<?php if(\$entry->field('top_object')->value()): ?> <i class=\"top_object_icon fa fa-star\"></i><?php endif; ?>
\t\t\t\t<h4><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h4>
\t\t\t\t<div class=\"place\"><?php echo \$entry->field('map')->option('city'); ?>, <?php echo \$entry->field('map')->option('street'); ?></div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"cc_immorealty_middle\">
\t\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t\t<ul class=\"property-meta\">
\t\t\t\t\t<li><i class=\"fa fa-expand\"></i><?php echo \$entry->field('size')->value(); ?>m&sup2;</li>
\t\t\t\t\t<li><i class=\"fa fa-car\"></i><?php echo \$entry->field('parking')->value(); ?> Parkpl&auml;tze</li>
\t\t\t\t\t<li><i class=\"fa fa-tint\"></i><?php echo \$entry->field('bathroom')->value(); ?> Badezimmer</li>
\t\t\t\t\t<li><i class=\"fa fa-bed\"></i><?php echo \$entry->field('rooms')->html(); ?></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"cc_immorealty_bottom\">
\t\t\t\t<?php if(\$entry->field('purchase_price')->value() > 0): ?>
\t\t\t\t<div class=\"price\">&euro; <?php echo \$entry->field('purchase_price')->value(); ?></div>
\t\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t\t<?php if(\$entry->field('rent_price')->value() > 0): ?>
\t\t\t\t<div class=\"price\">&euro; <?php echo \$entry->field('rent_price')->value(); ?> <span>/ Monat</span></div>
\t\t\t\t<?php endif; ?>
\t\t\t
\t\t\t\t<?php echo \$entry->field('notelist')->html(); ?>
\t\t\t</div>

\t\t</div>
\t\t\t
\t</div>
<?php endforeach; ?>
</div>

<?php else: ?>
<p class=\"info empty\">Keine Objekte gefunden</p>
<?php endif;?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_immorealty_list.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_immorealty_list.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_immorealty_list.html5");
    }
}
