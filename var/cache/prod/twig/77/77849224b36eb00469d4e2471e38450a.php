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

/* @pct_themer/themedesigner/forms/td_form_textfield_colorpicker.html5 */
class __TwigTemplate_4ea078ce4acca5a8971ffc7bf942e5b4 extends Template
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
        yield "<div class=\"field_wrapper\">
<?php // include spectrum colorpicker: https://bgrins.github.io/spectrum/
\\Contao\\ArrayUtil::arrayInsert(\$GLOBALS['TL_CSS'],0, array(PCT_THEMER_PATH.'/assets/js/spectrum/spectrum.css')); 
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_THEMER_PATH.'/assets/js/spectrum/spectrum.js';

\$strPreviewCssId = \$this->unique_selector.'_colorpreview';
\$strInputCssId = \$this->unique_selector.'_color';

\$objTD = new \\PCT\\ThemeDesigner;

// get the field definition
\$arrField = \$objTD->findByName(\$this->selector);
\$strDefault = \$arrField['default'];

if(!\$this->value)
{
\t\$this->value = \$strDefault;
}

?>

<?php if (\$this->label): ?>
<label for=\"ctrl_<?= \$this->id ?>\"<?php if (\$this->class): ?> class=\"<?= \$this->class ?>\"<?php endif; ?>></label>
<?php endif; ?>

<?php if(\$this->description):?>
<div class=\"description\">
\t<i class=\"fa fa-info\"></i>
\t<div class=\"description-content\">
\t\t<?= \$this->description; ?>
\t</div>
</div>
<?php endif; ?>

<!-- color preview -->
<div id=\"<?= \$strPreviewCssId; ?>\" class=\"colorpicker_preview\"></div>
<!-- color text input -->
<input type='text' value='<?= \$this->value; ?>' id=\"<?= \$strInputCssId; ?>\" class=\"colorpicker_color_input\">

<input data-td_selector=\"<?= \$this->selector; ?>\" type=\"<?= \$this->type ?>\" data-td_counter=\"<?= \$this->counter; ?>\" name=\"<?= \$this->name ?>\" id=\"ctrl_<?= \$this->id ?>\" class=\"text colorpicker <?php if (\$this->hideInput) echo ' password'; ?><?php if (\$this->class) echo ' ' . \$this->class; ?>\" value=\"<?= \\Contao\\StringUtil::specialchars(\$this->value) ?>\"<?= \$this->getAttributes() ?>>

<script>
/* <![CDATA[ */

jQuery(document).ready(function() 
{
\t/**
\t * Colorpicker
\t */
\tvar elem = jQuery('input[data-td_selector=\"<?= \$this->selector; ?>\"].colorpicker');
\telem.spectrum(
\t{
\t\tcolor: '<?= \$this->value; ?>',
\t\tshowInput: true,
\t\tshowAlpha: true,
\t\tallowEmpty:true,
\t\tshowPalette: true,
\t\tchooseText: \"Set\",
\t\tshowInitial:true,
\t\tshowSelectionPalette:false,
\t\tpreferredFormat: \"hex\",
\t\tpalette: [
        \t['#ffffff', '#1cbb9b', '#55add3', '#2b82c9', '#9164b7', '#475677'],
\t\t\t['#000000', '#01a280', '#3e8fba', '#2a69b0', '#553984', '#28314e'],
\t\t\t['#f8db65', '#faa026', '#ec6b56', '#e24939', '#a38f84', '#efefef'],
\t\t\t['#fac51f', '#f67936', '#d14840', '#b8312e', '#75706d', '#d1d4d9'],
\t\t\t['#e6e6e6', '#dadada', '#cdcdcd', '#b4b4b4', '#9a9a9a', '#747474'],
\t\t\t['#595959', '#3e3e3e', '#303030', '#212121', '#131313','#050505']

\t\t],
\t\t
\t\t// palettes
\t\t
\t\tshowPaletteOnly: false,
\t\ttogglePaletteOnly: false,
\t\ttogglePaletteMoreText: 'more',
\t\ttogglePaletteLessText: 'less',

\t\tselectionPalette: [
\t        ['black', 'white', 'blanchedalmond'],
\t        ['rgba(0,0,0,0);']
\t\t],
\t\t//palette: [
\t    //    ['black', 'white', 'blanchedalmond'],
\t    //    ['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
\t\t//]
\t});
\t
\t// trigger change event
\telem.change(function(event,params)
\t{
\t\tvar objValue = jQuery(event.target).spectrum('get');
\t\t
\t\t<?php if(\$this->counter > 0): ?>
\t\t//jQuery('input[data-td_selector=\"<?= \$this->selector; ?>\"]').spectrum('set',objValue);
\t\t<?php endif; ?>
\t\t
\t\tvar value = '';
\t\t
\t\t// no alpha
\t\tif(objValue._a >= 1)
\t\t{
\t\t\tvalue = objValue.toHexString();
\t\t}
\t\telse
\t\t{
\t\t\tvalue = objValue.toRgbString();
\t\t}
\t\t
\t\tif(params.selected)
\t\t{
\t\t\tvalue = params.selected;
\t\t}
\t\t
\t\t// update preview
\t\tjQuery('#<?= \$strPreviewCssId; ?>').css('background-color',value);
\t\t
\t\t// update input
\t\tjQuery('#<?= \$strInputCssId; ?>').val(value);
\t\t
\t\t// update input
\t\tjQuery('input[data-td_selector=\"<?= \$this->selector; ?>\"]').attr('value',value);
\t\t
\t\t// value convertion here
\t\tThemeDesigner.sendValue(event.target.name,value);
\t});
\t
\t/**
\t * Color input
\t */
\t// default color
\tjQuery('#<?= \$strPreviewCssId; ?>').css('background-color','<?= \$this->value; ?>');
\t
\t// key listener\t
\tjQuery('input#<?= \$strInputCssId; ?>').on('keyup',function(event)
\t{
\t\tif(event.target.value.length > 3)
\t\t{
\t\t\telem.spectrum('set',event.target.value);
\t\t\telem.trigger('change',{'selected':event.target.value});
\t\t}\t
\t});
\t\t
\t// catch onToggleSwitch event of the parent switch
\tjQuery('[data-name=\"<?= \$this->switch; ?>\"]').on('ThemeDesigner.onToggleSwitch',function(event,params)
\t{
\t\tvar value = '';
\t\t
\t\tif(params.status < 1)
\t\t{
\t\t\tvalue = '';
\t\t}
\t\telse
\t\t{
\t\t\tvalue = jQuery('input[data-td_selector=\"<?= \$this->selector; ?>\"][data-td_counter=\"<?= \$this->counter; ?>\"]').attr('value');
\t\t
\t\t\t// update the other colorpickers
\t\t\tjQuery('input[data-td_selector=\"<?= \$this->selector; ?>\"]').attr('value',value);
\t\t}
\t\t
\t\t// send new value
\t\tThemeDesigner.sendValue('<?= \$this->selector; ?>',value);
\t\t
\t});
\t
\t/**
\t * Eventlistener: ThemeDesigner.onSelector
\t * triggered when the ThemeDesigner triggers a selector
\t * @param object\tThe jquery event object
\t * @param object\tThe parameter object
\t * 
\t * objParams:
\t * {name,value}
\t */
\telem.on('ThemeDesigner.onSelector',function(event,objParams)
\t{
\t\tvar value = objParams.value;
\t\t
\t\t// set new value
\t\tjQuery(event.target).spectrum('set',value);
\t\t
\t\t// trigger the change event
\t\telem.trigger('change',{});
\t});
\t
});

/* ]]> */
</script>
<br class=\"clear\"></div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/forms/td_form_textfield_colorpicker.html5";
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
        return new Source("", "@pct_themer/themedesigner/forms/td_form_textfield_colorpicker.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/forms/td_form_textfield_colorpicker.html5");
    }
}
