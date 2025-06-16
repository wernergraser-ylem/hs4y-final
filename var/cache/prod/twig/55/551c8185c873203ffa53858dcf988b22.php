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

/* @pct_customelements_plugin_customcatalog/filters/customcatalog_filter_range.html5 */
class __TwigTemplate_267cff606d6bc077229d35cf69d571c1 extends Template
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
        yield "<?php
/**
 * Range filter template
 */
?>
<?php 
if(\$this->mode == 'between')
{
\t\$GLOBALS['TL_CSS'][] = PCT_CUSTOMCATALOG_PATH.'/assets/js/jquery/ui/themes/smoothness/jquery-ui.css|static';
\t\$GLOBALS['TL_JAVASCRIPT'][] = PCT_CUSTOMCATALOG_PATH.'/assets/js/jquery/ui/jquery-ui.min.js';\t
}
?>
<div <?= \$this->cssID; ?> class=\"widget <?= \$this->class; ?> block\">
<fieldset class=\"range_container\">
<?php if(\$this->label): ?><legend><?= \$this->label; ?></legend><?php endif; ?>
<?php if(\$this->label): ?><label for=\"<?= \$this->name; ?>\"><?= \$this->label; ?></label><?php endif; ?>\t
<?php if(\$this->mode == 'between'): ?>
\t<input name=\"<?= \$this->name; ?>\" type=\"hidden\" id=\"slider-input_<?= \$this->name; ?>\" value=\"<?= \$this->value; ?>\">
\t<input readonly type=\"text\" id=\"slider-text_<?= \$this->name; ?>\">
\t<div id=\"slider-range_<?= \$this->name; ?>\"></div>
\t<script>
\tjQuery(document).ready(function()
\t{
\t\tvar elem = jQuery('#slider-range_<?= \$this->name; ?>');
\t\tvar text = jQuery('#slider-text_<?= \$this->name; ?>');
\t\tvar input = jQuery('#slider-input_<?= \$this->name; ?>');
\t\telem.slider(
\t\t{
\t\t  range: true,
\t\t  min: <?= \$this->minValue; ?>,
\t\t  max: <?= \$this->maxValue; ?>,
\t\t  step: <?= \$this->stepValue; ?>,
\t\t  values: [<?= \$this->actMinValue; ?>, <?= \$this->actMaxValue; ?>],
\t\t  slide: function(event,ui) 
\t\t  {
\t\t  \t\ttext.val(ui.values[0] + \" - \" + ui.values[1] );
\t\t  \t\tinput.val(ui.values[0] + \",\" + ui.values[1]);
\t\t  },
\t\t  change:function(event,ui)
\t\t  {
\t\t\t  // submit form on change
\t\t\t  <?php if(\$this->getFilter()->getModule()->customcatalog_filter_submit): ?>
\t\t\t  jQuery(event.target).parents('form').submit();
\t\t\t  <?php endif; ?>
\t\t  }
\t\t});
\t\ttext.val(elem.slider(\"values\",0) + \" - \" + elem.slider(\"values\",1));
\t\tinput.val(elem.slider(\"values\",0) + \",\" + elem.slider(\"values\",1));
\t});
\t</script>
<?php else: ?>
\t<div id=\"<?= \$this->name.'_value'; ?>\"><span class=\"value\"><?= \$this->value ?: \$this->minValue; ?></span></div>
\t<input type=\"range\" class=\"range-slider\" name=\"<?= \$this->name; ?>\" steps=\"<?= \$this->stepsValue; ?>\" min=\"<?= \$this->minValue; ?>\" max=\"<?= \$this->maxValue; ?>\" value=\"<?= \$this->value; ?>\">
\t<script>
\tjQuery(document).ready(function() 
\t{
\t\tjQuery('input[name=\"<?= \$this->name; ?>\"]').on('input change',function()
\t\t{
\t\t\tjQuery('#<?= \$this->name.'_value'; ?> .value').html(this.value);
\t\t});
\t});
\t</script>
<?php endif; ?>
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?= \$this->description; ?></div><?php endif; ?>\t
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_range.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_range.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/filters/customcatalog_filter_range.html5");
    }
}
