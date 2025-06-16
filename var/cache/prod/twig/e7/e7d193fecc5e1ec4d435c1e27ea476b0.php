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

/* @pct_autogrid/ce_autogrid_grid.html5 */
class __TwigTemplate_da6ce2fd077567bbed95fced77b1a48c extends Template
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
        yield "<?php // load presets css
\$GLOBALS['TL_CSS'][] = \$GLOBALS['PCT_AUTOGRID']['presets_css'].'|static';
?>

<?php // custom grid definition
if( \$this->hasCustomGrid )
{
\t\$style = '<style id=\"custom_grid_'.\$this->id.'\">.custom_grid_'.\$this->id.'.grid_'.\$this->AutoGrid->preset.'.'.\$this->AutoGrid->Grid->desktop.' {grid-template-columns: '.\$this->autogrid_css.';}';
\t\$style .= '@media only screen and (min-width : 768px) and (max-width : 1024px) {.custom_grid_'.\$this->id.'.grid_'.\$this->AutoGrid->preset.'.'.\$this->AutoGrid->Grid->tablet.' {grid-template-columns: '.\$this->autogrid_tablet.';} }';
\t\$style .= '@media only screen and (max-width: 767px) {.custom_grid_'.\$this->id.'.grid_'.\$this->AutoGrid->preset.'.'.\$this->AutoGrid->Grid->mobile.' {grid-template-columns: '.\$this->autogrid_mobile.';} }</style>';
\t\$GLOBALS['TL_HEAD'][] = \$style;
}
?>

<?php if(isset(\$this->AutoGrid->start)): ?>
<div class=\"autogrid_grid <?= \$this->class; ?> grid_<?= \$this->AutoGrid->preset; ?> <?= \$this->AutoGrid->classes; ?><?php if(\$this->AutoGrid->same_height): ?> same_height<?php endif; ?><?php if(\$this->hasCustomGrid): ?> custom_grid_<?= \$this->id; ?><?php endif; ?>\" <?= \$this->cssID ?><?php if (\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?>>
<?php endif; ?>
<?php if(isset(\$this->AutoGrid->stop)): ?>
</div>
<?php endif;?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/ce_autogrid_grid.html5";
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
        return new Source("", "@pct_autogrid/ce_autogrid_grid.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/ce_autogrid_grid.html5");
    }
}
