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

/* @pct_autogrid/backend/be_autogrid_wildcard.html5 */
class __TwigTemplate_d8241d0db14278aaefd96143a8c61266 extends Template
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
<?php // skip wildcard for certain elements
if( in_array(\$this->type, array('autogridRowStop','autogridColStart','autogridColStop','autogridGridStop')) )
{
\treturn '';
}
?>

<?php 
\$arrFields = \$GLOBALS['PCT_AUTOGRID']['BE_WILDCARD'] ?: array();
?>


<?php if( in_array(\$this->type, array('autogridRowStart','autogridGridStart')) ): ?>
<ul class=\"autogrid_info autogrid_wildcard\">
<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_wildcard']['sameheight']['label']; ?>\" class=\"field clickable autogrid_sameheight<?php if(\$this->autogrid_sameheight): ?> active<?php endif; ?>\" data-field=\"autogrid_sameheight\" data-value=\"<?= \$this->autogrid_sameheight; ?>\"><?= \$GLOBALS['TL_LANG']['autogrid_wildcard']['sameheight']['label']; ?></li>
<li class=\"field clickable autogrid_gutter\">
\t<ul>
   \t\t<li class=\"label\"><?= \$GLOBALS['TL_LANG']['autogrid_wildcard']['gutter']['label']; ?></li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_wildcard']['gutter']['gutter_l']; ?>\" class=\"clickable<?php if(\$this->autogrid_gutter == 'gutter_l'): ?> active<?php endif; ?>\" data-field=\"autogrid_gutter\" data-value=\"gutter_l\">L</li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_wildcard']['gutter']['gutter_m']; ?>\" class=\"clickable<?php if(\$this->autogrid_gutter == 'gutter_m'): ?> active<?php endif; ?>\" data-field=\"autogrid_gutter\" data-value=\"gutter_m\">M</li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_wildcard']['gutter']['gutter_s']; ?>\"class=\"clickable<?php if(\$this->autogrid_gutter == 'gutter_s'): ?> active<?php endif; ?>\" data-field=\"autogrid_gutter\" data-value=\"gutter_s\">S</li>
\t\t<li title=\"<?= \$GLOBALS['TL_LANG']['autogrid_wildcard']['gutter']['gutter_none']; ?>\" class=\"clickable<?php if(\$this->autogrid_gutter == 'gutter_none'): ?> active<?php endif; ?>\" data-field=\"autogrid_gutter\" data-value=\"gutter_none\">-</li>
\t</ul>
</li>
</ul>
<?php else: ?>

<ul class=\"autogrid_info\">

<?php foreach(\$arrFields as \$field): ?>
<?php 

// skip certain fields
if( \$this->type == 'autogridRowStart' && in_array(\$field, array('autogrid_css','autogrid_grid') ) )
{
\tcontinue;
}

// field definition
\$arrFieldDef = \$GLOBALS['PCT_AUTOGRID']['autogrid_fields'][\$field];

// load grid preset defaults
if( empty(\$this->{\$field}) && \$this->type == 'autogridGridStart' && isset(\$GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][\$this->autogrid_grid]) )
{
\t\$key = '';
\tif( isset(\$GLOBALS['TL_DCA'][\\Contao\\Input::get('table')]['fields'][\$field]['grid']) )
\t{
\t\t\$key = \$GLOBALS['TL_DCA'][\\Contao\\Input::get('table')]['fields'][\$field]['grid'] ;
\t}
\t
\tif( !empty(\$key) && \$GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][\$this->autogrid_grid]['grid'][\$key] )
\t{
\t\t\$this->{\$field} = \$GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][\$this->autogrid_grid]['grid'][\$key];
\t}
}

if( empty(\$this->{\$field}) ) 
{ 
\tcontinue; 
}

\$value = \$this->{\$field};
// reference
if( isset(\$arrFieldDef['reference'][\$value]) )
{
\t\$value = \$arrFieldDef['reference'][\$value];
}
?>
<li class=\"info\"><span class=\"field <?= \$field; ?>\"><?= \$GLOBALS['TL_LANG']['dca_autogrid'][\$field][0]; ?>: <span class=\"value\"><?= \$value; ?></span>
<?php endforeach; ?>\t
</ul>
<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/backend/be_autogrid_wildcard.html5";
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
        return new Source("", "@pct_autogrid/backend/be_autogrid_wildcard.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/backend/be_autogrid_wildcard.html5");
    }
}
