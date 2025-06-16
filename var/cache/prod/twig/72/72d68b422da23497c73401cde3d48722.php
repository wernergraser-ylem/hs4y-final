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

/* @pct_customelements_plugin_customcatalog/backend/be_cc_api_report.html5 */
class __TwigTemplate_ee6e23fadac590d090550d44a3ecb5a1 extends Template
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
<?php 
\$arrLang = \$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['api_report'];
\$arrReport = \$this->report;
?>

<?php if(!empty(\$this->report)): ?>
<strong><?php echo \$arrLang['headline']; ?></strong>

<div class=\"cc_api_report block\">

<?php foreach(\$arrReport as \$index => \$report): ?>
<div class=\"report_block block_<?php echo \$index; ?>\">
\t<div data-index=\"<?php echo \$index; ?>\" class=\"row_title toggler\"><strong><?php echo sprintf(\$arrLang['data_index'], \$index); ?></strong></div>
\t<div data-index=\"<?php echo \$index; ?>\" class=\"report accordion\">
\t<ul>
\t\t<?php foreach(\$report as \$key => \$value): ?>
\t\t<?php \$isNested = (is_array(\$value)); ?>
\t\t
\t\t<?php 
\t\t// label
\t\t\$label = (isset(\$arrLang[\$key]['label']) && strlen(\$arrLang[\$key]['label']) > 0 ) ? \$arrLang[\$key]['label'] : \$key;
\t\t?>
\t\t
\t\t<?php if(!\$isNested): ?>
\t\t<?php
\t\t// value
\t\tif( isset(\$arrLang[\$key]['type']) && \$arrLang[\$key]['type'] == 'date' && \$arrLang[\$key]['format'])
\t\t{
\t\t\t\$value = \\Contao\\Date::parse(\$arrLang[\$key]['format'],\$value);
\t\t}
\t\t
\t\tif( isset(\$arrLang[\$key]['type']) && \$arrLang[\$key]['type'] == 'boolean')
\t\t{
\t\t\t\$value = ((boolean)\$value == true ? 'true' : 'false');
\t\t}
\t\t?>
\t\t<li class=\"tl_file row <?php echo \$key; ?>\"><span class=\"label\"><?php echo \$label; ?></span>: <span class=\"value\"><?php echo \$value; ?></span></li>
\t\t<?php else: ?>
\t\t
\t\t<?php if(\$key == 'result'): ?>
\t\t<!-- result block -->
\t\t<li class=\"tl_file row result\">
\t\t\t<ul class=\"result_block\">
\t\t\t<?php foreach(\$value as \$k => \$result): ?>
\t\t\t<?php if(!is_array(\$result)) {continue;} ?>
\t\t\t<div class=\"title\"><strong><?php echo ucfirst(strtolower(\$k)); ?></strong></div>
\t\t\t\t<?php foreach(\$result as \$k => \$records): ?>
\t\t\t\t<?php
\t\t\t\tif( isset(\$records[\$this->table]) )
\t\t\t\t{
\t\t\t\t\t\$records = \$records[\$this->table];
\t\t\t\t}
\t\t\t\t?>
\t\t\t\t<li class=\"tl_file row\"><span class=\"label\"><?php echo \$k.':'.\$this->table; ?></span>: <span class=\"value\"><?php echo implode(', ', \$records); ?></span>
\t\t\t\t<?php endforeach; ?>
\t\t\t<?php endforeach; ?>
\t\t\t</ul>
\t\t<?php endif; ?>
\t\t</li>
\t\t
\t\t<?php endif; ?>
\t\t
\t\t<?php endforeach; ?>
\t</ul>
\t</div>
</div>
<?php endforeach; ?>

</div>
<?php endif; ?>


<script>
window.addEvent('domready', function() 
{
\tvar togglers = \$\$('.report_block .toggler');
\tvar sliders = \$\$('.report_block .accordion');
\t
\tif(togglers.length < 1 || sliders.length < 1)
\t{
\t\treturn false;
\t}
\t
\ttogglers.addEvent('click', function(event)
\t{
\t\tthis.toggleClass('active');
\t\tthis.getNext('.accordion').toggleClass('active');
\t});
});
</script>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/backend/be_cc_api_report.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/backend/be_cc_api_report.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/backend/be_cc_api_report.html5");
    }
}
