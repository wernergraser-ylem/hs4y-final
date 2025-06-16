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

/* @pct_autogrid/backend/be_mod_grid_preview.html5 */
class __TwigTemplate_2f390821c30b364d2daa73ad74d19da3 extends Template
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
        yield "

<?php foreach(\$this->models as \$objModel): ?>

<?php
\$strClass = \\Contao\\ContentElement::findClass(\$objModel->type);
if( class_exists(\$strClass) === false)
{
\tcontinue;
}

\$strBuffer = '';
if( in_array(\$objModel->type, \$GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
{
\t\$objModel->autogrid_tablet = null;
\t\$objModel->autogrid_mobile = null;

\t\$objElement = new \$strClass(\$objModel);
\t\$objElement->isGridPreview = true;
\t\$strBuffer = \$objElement->generate();
}

if( \$objModel->type == 'autogridGridStart' && \$objModel->autogrid_css != \$GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][\$objModel->autogrid_grid]['grid']['desktop'] && isset(\$GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][\$objModel->autogrid_grid]) )
{
\t\\PCT\\AutoGrid\\Core::addToTemplate(\$this,\$objModel);
\t\$GLOBALS['TL_HEAD::PCT_AUTOGRID'][] = '<style id=\"custom\">.grid_'.\$this->AutoGrid->preset.'.'.\$this->AutoGrid->Grid->desktop.' {grid-template-columns: '.\$this->autogrid_css.';}</style>';
}

if( \$this->flex && \$objModel->type == 'autogridColStart' )
{
\t\$GLOBALS['PCT_AUTOGRID']['autogridColStarted'] = true;
}
else if( \$this->flex && \$objModel->type == 'autogridColStop' )
{
\tunset(\$GLOBALS['PCT_AUTOGRID']['autogridColStarted']);
}

if( \$this->flex && !in_array(\$objModel->type, \$GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
{
\tif( (isset(\$GLOBALS['PCT_AUTOGRID']['autogridRowStarted']) && \$GLOBALS['PCT_AUTOGRID']['autogridRowStarted']) && (isset(\$GLOBALS['PCT_AUTOGRID']['autogridColStarted']) && \$GLOBALS['PCT_AUTOGRID']['autogridColStarted']) )
\t{
\t\t\$this->flex = false;
\t}
}

if( !\$this->flex && \$objModel->autogrid && !in_array(\$objModel->type, \$GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
{
\t\$this->flex = true;
}
?>

<?php if(\$strBuffer): ?>
<?= \$strBuffer; ?>
<?php else: ?>

<?php if(\$this->flex): ?>
<?php
// viewport classes
\$autogrid_tablet = str_replace('_t','',\$objModel->autogrid_tablet ?: \$objModel->autogrid_css);
\$autogrid_mobile = str_replace('_m','',\$objModel->autogrid_mobile ?: 'col_12');
?>
<div class=\"column hasViewport cte <?= \$objModel->autogrid_css; ?> <?php if(empty(\$objModel->autogrid_tablet)):?>no_tablet_grid<?php endif; ?> <?= \$objModel->autogrid_offset; ?>\" data-id=\"<?= \$objModel->id; ?>\"data-desktop=\"<?= \$objModel->autogrid_css; ?>\" data-tablet=\"<?= \$autogrid_tablet; ?>\" data-mobile=\"<?= \$autogrid_mobile; ?>\">
<?php endif; ?>
<div class=\"placeholder\" data-id=\"<?= \$objModel->id; ?>\"></div>
<?php if(\$this->flex): ?>
</div>
<?php endif; ?>

<?php endif; ?>

<?php endforeach; ?>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/backend/be_mod_grid_preview.html5";
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
        return new Source("", "@pct_autogrid/backend/be_mod_grid_preview.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/backend/be_mod_grid_preview.html5");
    }
}
