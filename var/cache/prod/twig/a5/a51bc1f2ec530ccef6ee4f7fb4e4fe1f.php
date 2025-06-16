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

/* @pct_theme_templates/customcatalog/customcatalog_accommodations_teaser.html5 */
class __TwigTemplate_463bd3720b6177cb5d9db0e931d39dbd extends Template
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
<div class=\"autogrid_wrapper block\">
<?php foreach(\$this->entries as \$entry): ?>
<div class=\"item-wrapper autogrid one_third block\">
\t<div class=\"block entry<?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t<div class=\"item-inside block\">
\t\t\t
\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star bg-accent\"></i><?php endif; ?>
\t\t\t<div class=\"item-content\">
\t\t\t\t<div class=\"item-leftside\">
\t\t\t\t\t<div class=\"destination\"><i class=\"fa fa-neuter\"></i><?php echo \$entry->field('destination')->html(); ?></div>
\t\t\t\t\t<h5><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h5>\t
\t\t\t\t</div>
\t\t\t\t<div class=\"item-rightside\">
\t\t\t\t\t<div class=\"item-stay\"><?php echo \$entry->field('stay')->value(); ?> TAGE</div>\t
\t\t\t\t\t<div class=\"item-price\"><?php echo \$entry->field('price')->value(); ?> &euro;</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>\t\t
\t</div>\t
</div>\t
<?php endforeach; ?>
</div>
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
        return "@pct_theme_templates/customcatalog/customcatalog_accommodations_teaser.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_accommodations_teaser.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_accommodations_teaser.html5");
    }
}
