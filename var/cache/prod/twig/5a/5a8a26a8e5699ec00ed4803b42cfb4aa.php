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

/* @pct_autogrid/backend/be_autogrid_col.html5 */
class __TwigTemplate_0e4e82386cce2702dfee7492299608b5 extends Template
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
<?php if(isset(\$this->AutoGrid->start)): ?>

<?php // flex_col
\$arrClass = explode(' ', \$this->autogrid_css ?? '');
\$arrClass[] = 'column'; 
if( isset(\$GLOBALS['PCT_AUTOGRID']['autogridRowStarted']) && \$GLOBALS['PCT_AUTOGRID']['autogridRowStarted'] )
{
\t#\$arrClass['_column_'] = 'flex_col';
}
// grid_col
if( isset(\$GLOBALS['PCT_AUTOGRID']['autogridGridStarted']) && \$GLOBALS['PCT_AUTOGRID']['autogridGridStarted'] )
{
\t#\$arrClass['_column_'] = 'grid_col';
}
if( isset(\$this->autogrid_sticky) && \$this->autogrid_sticky )
{
\t\$arrClass[] = 'sticky';
}
\$strClass = implode(' ',\$arrClass);

// viewport classes
\$autogrid_tablet = str_replace('_t','',\$this->autogrid_tablet ?: \$this->autogrid_css);
\$autogrid_mobile = str_replace('_m','',\$this->autogrid_mobile ?: 'col_12');
?>
<div class=\"<?= \$strClass; ?> hasViewport <?php if(empty(\$objModel->autogrid_tablet)):?>no_tablet_grid<?php endif; ?>\" data-id=\"<?= \$this->id; ?>\" data-desktop=\"<?= \$this->autogrid_css; ?>\" data-tablet=\"<?= \$autogrid_tablet; ?>\" data-mobile=\"<?= \$autogrid_mobile; ?>\">
<div class=\"placeholder\" data-id=\"<?= \$this->id; ?>\"></div>
<?php endif; ?>
<?php if(isset(\$this->AutoGrid->stop)): ?>
<div class=\"placeholder\" data-id=\"<?= \$this->id; ?>\"></div>
</div>
<?php endif;?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/backend/be_autogrid_col.html5";
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
        return new Source("", "@pct_autogrid/backend/be_autogrid_col.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/backend/be_autogrid_col.html5");
    }
}
