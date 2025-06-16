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

/* @pct_themer/themedesigner/forms/td_form_select_fontpicker.html5 */
class __TwigTemplate_4bf8361c8c28bc6b00a32680e196a8b0 extends Template
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
        yield "<div class=\"field_wrapper <?= \$this->selector; ?>\">
<?php 
// include chosen script: https://harvesthq.github.io/chosen/
\\Contao\\ArrayUtil::arrayInsert(\$GLOBALS['TL_CSS'],0,array(PCT_THEMER_PATH.'/assets/js/chosen/chosen.min.css'));
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_THEMER_PATH.'/assets/js/chosen/chosen.jquery.min.js'; \t
?>

<?php 
\$objTD = new \\PCT\\ThemeDesigner;

// get the field definition
\$arrField = \$objTD->findByName(\$this->selector);
\$arrData = \$objTD->getData();
\$strCurrFont = \$arrField['default'];
\$strDefaultStyle = \$arrField['default_style'] ?? '';
\$strCurrStyle = '';
\$strCurrWeight = '';
if(strlen(\$strDefaultStyle) > 0)
{
\t\$tmp = explode(':',\$arrField['default_style']);
\t\$strCurrStyle = \$tmp[0];
\t\$strCurrWeight = \$tmp[1];
\tunset(\$tmp);
}

\$strStyleIdent = \$GLOBALS['PCT_THEMEDESIGNER']['fontPickerStyleIdent'];
\$strWeightIdent = \$GLOBALS['PCT_THEMEDESIGNER']['fontPickerWeightIdent'];
\$arrBlankOption = array('label'=>'-','value'=>'');


// font is selected
if(isset(\$arrData[\$this->selector]))
{
\t\$strCurrFont = \$arrData[\$this->selector];
}

\$arrFont = \$objTD->getFonts( \$strCurrFont );
\$strFontFamily = \$strCurrFont;
if( isset(\$arrFont['family']) && !empty(\$arrFont['family']) )
{
\t\$strFontFamily = \$arrFont['family'];
}

?>


<?php if (\$this->label): ?>
<label for=\"ctrl_<?= \$this->id ?>\"<?php if (\$this->class): ?> class=\"<?= \$this->class ?> fontpicker\"<?php endif; ?>></label>
<?php endif; ?>

<?php if(\$this->description):?>
<div class=\"description\">
\t<i class=\"fa fa-info\"></i>
\t<div class=\"description-content\">
\t\t<?= \$this->description; ?>
\t</div>
</div>
<?php endif; ?>

<div id=\"font_preview_<?= \$this->selector; ?>\" class=\"font_preview\">
\t<span>Beautify the Web</span>
</div>

<div class=\"font_select\">
<?php // select menu ?>
<select data-td_selector=\"<?= \$this->selector; ?>\" data-placeholder=\"Choose a font...\" name=\"<?= \$this->name ?>\" id=\"ctrl_<?= \$this->id ?>\" class=\"<?= \$this->class ?> chosen-select\"<?= \$this->getAttributes() ?>>
<?php foreach (\$this->getOptions() as \$option): ?>
  <?php if (\$option['type'] == 'group_start'): ?>
    <optgroup label=\"<?= \$option['label'] ?>\">
  <?php endif; ?>

  <?php if (\$option['type'] == 'option'): ?>
    <?php // use chosen placeholder
    if(\$option['label'] == '-')
    {
  \t      \$option['label'] = '';
    }
    ?>
    <option value=\"<?= \$option['value'] ?>\"<?= \$option['selected'] ?>><?= \$option['label'] ?></option>
  <?php endif; ?>

  <?php if (\$option['type'] == 'group_end'): ?>
    </optgroup>
  <?php endif; ?>
<?php endforeach; ?>
</select>
</div>

<?php // style select ?>

<?php // find options
\$arrStyles = array();
if(strlen(\$strCurrFont) > 0)
{
\t\$arrFont = \$objTD->getFonts( \$strCurrFont );
\tif(is_array(\$arrFont['styles']))
\t{
\t\tforeach(\$arrFont['styles'] as \$v)
\t\t{
\t\t\t\$s = explode(':', \$v);
\t\t\t
\t\t\t\$tmp = array('label' => \$s[0].' ('.\$s[1].')', 'value' => \$v);
\t\t\t
\t\t\tif(\$v == \$arrData[\$this->selector.\$strStyleIdent].':'.\$arrData[\$this->selector.\$strWeightIdent])
\t\t\t{
\t\t\t\t\$tmp['selected'] = true;
\t\t\t\t\$strCurrStyle = \$arrData[\$this->selector.\$strStyleIdent];
\t\t\t\t\$strCurrWeight = \$arrData[\$this->selector.\$strWeightIdent];
\t\t\t}
\t\t\telse if(\$v == \$strDefaultStyle)
\t\t\t{
\t\t\t\t\$tmp['selected'] = true;
\t\t\t}
\t\t\t\$arrStyles[\$v] = \$tmp;
\t\t}\t
\t}
\t
\t\\Contao\\ArrayUtil::arrayInsert(\$arrStyles,0,array( \$arrBlankOption ));
}\t
?>

<div class=\"font_style_select\">
<select data-td_selector=\"<?= \$this->selector.\$strStyleIdent; ?>\" data-placeholder=\"Choose a style...\" name=\"<?= \$this->name.\$strStyleIdent; ?>\" id=\"ctrl_<?= \$this->id.\$strStyleIdent; ?>\" class=\"<?= \$this->class ?> font_style_select chosen-select chosen-font-weight\">
<?php if(count(\$arrStyles) > 0): ?>
<?php foreach(\$arrStyles as \$option): ?>
<option value=\"<?= \$option['value']; ?>\"<?php if(isset(\$option['selected']) && \$option['selected']): ?> selected<?php endif;?>><?= \$option['label']; ?></option>
<?php endforeach; ?>
<?php endif; ?>
</select>
</div>

<?php // apply button ?>
<div id=\"fontpicker_apply_<?= \$this->selector; ?>\" class=\"fontpicker_apply\"><?= \$GLOBALS['TL_LANG']['pct_themedesigner']['apply_label']; ?></div>

<script>
/* <![CDATA[ */

jQuery(document).ready(function() 
{
\t// get all fonts
\tvar objFonts = <?= json_encode(\$GLOBALS['PCT_THEMEDESIGNER']['fonts'],JSON_FORCE_OBJECT); ?>;
\t\t
\tvar objFontSelect = jQuery('select[data-td_selector=\"<?= \$this->selector; ?>\"].chosen-select');
\tobjFontSelect.chosen(
\t{
\t\tno_results_text: \"Nothing found!\"
\t});
\t
\tvar objFontStyleSelect = jQuery('select[data-td_selector=\"<?= \$this->selector.\$strStyleIdent; ?>\"].chosen-select');
\tobjFontStyleSelect.chosen(
\t{
\t\tno_results_text: \"No styles found!\"
\t});
\t
\t//
\tjQuery('#font_preview_<?= \$this->selector; ?>').css(
\t{
\t\t'font-family': '<?= \$strFontFamily; ?>',
\t\t'font-weight': '<?= \$strCurrWeight; ?>'
\t});
\t
\t// apply
\tjQuery('#fontpicker_apply_<?= \$this->selector; ?>').click(function()
\t{
\t\tvar value = jQuery(objFontSelect).val();
\t\t
\t\tif(value == undefined || value == null || !value)
\t\t{
\t\t\treturn;
\t\t}
\t\t
\t\tvalue += ':400';
\t\t
\t\t// send value
\t\tThemeDesigner.sendValue('<?= \$this->selector; ?>',jQuery(objFontSelect).val() );
\t\t
\t\tif(jQuery(objFontStyleSelect).val())
\t\t{
\t\t\tvar style = jQuery(objFontStyleSelect).val().split(':');
\t\t\t
\t\t\t// send style 
\t\t\tThemeDesigner.sendValue('<?= \$this->selector.\$strStyleIdent; ?>',style[0] );
\t\t\t
\t\t\t// send weight
\t\t\tThemeDesigner.sendValue('<?= \$this->selector.\$strWeightIdent; ?>',style[1] );
\t\t\t
\t\t\t// append style
\t\t\tif(style[1] != '400')
\t\t\t{
\t\t\t\tvalue += ','+style[1];
\t\t\t}
\t\t}
\t\t
\t\t// remove last font
\t\tjQuery('link#fontpicker_<?= \$this->selector; ?>').remove();
\t\t// load the font from google
\t\tjQuery('head').append('<link id=\"fontpicker_<?= \$this->selector; ?>\" rel=\"stylesheet\" type=\"text/css\" href=\"https://fonts.googleapis.com/css?family='+value+'\">');
\t\t
\t\t// remove the last style in iframe
\t\tjQuery('#themedesigner_iframe').contents().find('link#fontpicker_<?= \$this->selector; ?>').remove();
\t\t// include new style in iframe
\t\tjQuery('#themedesigner_iframe').contents().find('head').append('<link id=\"fontpicker_<?= \$this->selector; ?>\" rel=\"stylesheet\" type=\"text/css\" href=\"https://fonts.googleapis.com/css?family='+value+'\">');
\t});
\t
\tvar objFontSelectOptions = {};
\t<?php foreach(\$this->getOptions() as \$i => \$option): ?>
\tobjFontSelectOptions[<?= \$i; ?>] = '<?= \$option['value']; ?>';
\t<?php endforeach; ?>
\t
\tvar objStyleOptions = {};
\t
\t<?php \$i = 0; foreach(\$arrStyles as \$option): ?>
\tobjStyleOptions[<?= \$i; ?>] = '<?= \$option['value']; ?>';
\t<?php \$i++; endforeach; ?>
\t
\t// trigger change event
\tobjFontSelect.change(function(event,params)
\t{
\t\tvar value = event.target.value;
\t\tif(params.selected)
\t\t{
\t\t\tvalue = params.selected;
\t\t}
\t\t
\t\tif(value == undefined || value == null || !value)
\t\t{
\t\t\treturn;
\t\t}


\t\tvar s = value.split(':');
\t\tvalue = s[0];
\t\t
\t\tvar strFamily = value;
\t\tvar objFont = objFonts[value];
\t\t
\t\tif(objFont.family)
\t\t{
\t\t\tstrFamily = objFont.family;
\t\t}

\t\tjQuery('link#fontpicker_<?= \$this->selector; ?>').remove();
\t\tjQuery('style#fontpicker_<?= \$this->selector; ?>').remove();
\t\t
\t\t// load the font from google
\t\tjQuery('head').append
\t\t(
\t\t\t'<link id=\"fontpicker_<?= \$this->selector; ?>\" rel=\"stylesheet\" type=\"text/css\" href=\"https://fonts.googleapis.com/css?family='+value+'\">'
\t\t);
\t\t
\t\t// update preview
\t\tjQuery('#font_preview_<?= \$this->selector; ?>').css('font-family',strFamily);
\t\t
\t\t// load style options
\t\tif(objFont.styles)
\t\t{
\t\t\t// show style select menu
\t\t\tjQuery(objFontStyleSelect).removeClass('hidden');
\t\t\tjQuery(objFontStyleSelect).next('.chosen-container').removeClass('hidden');
\t\t\t
\t\t\tvar options = {};
\t\t\t
\t\t\t// remove the current options
\t\t\tobjFontStyleSelect.find('option').remove();
\t\t\t
\t\t\t// append new options
\t\t\tjQuery.each(objFont.styles, function(i,v)
\t\t\t{
\t\t\t\tvar s = v.split(':');
\t\t\t\tobjFontStyleSelect.append('<option value=\"'+v+'\">'+s[0]+' ('+s[1]+')</option>');
\t\t\t\t
\t\t\t\t// update the style options array
\t\t\t\tobjStyleOptions[i] = v;
\t\t\t});
\t\t
\t\t\t// update the chosen select
\t\t\tobjFontStyleSelect.trigger('chosen:updated');
\t\t}
\t\telse
\t\t{
\t\t\t// hide style select menu
\t\t\tjQuery(objFontStyleSelect).addClass('hidden');
\t\t\tjQuery(objFontStyleSelect).next('.chosen-container').addClass('hidden');
\t\t}
\t\t
\t});
\t
\t// trigger change event on hover
\tobjFontSelect.next('.chosen-container').on('mouseenter', 'li.active-result', function(event) 
\t{
\t\tvar index = jQuery(event.target).data('option-array-index');
\t\tvar value = objFontSelectOptions[index];
\t\t
\t\t// trigger change event
\t\tobjFontSelect.trigger('change',{'selected':value});
\t});
\t
\t// trigger change event on key up/down
\tobjFontSelect.next('.chosen-container').on('keyup',function(event)
\t{
\t\tif(event.which == 38 || event.which == 40)
\t\t{
\t\t\tvar index = objFontSelect.next('.chosen-container').find('li.highlighted').data('option-array-index');
\t\t\tvar value = objFontSelectOptions[index];
\t\t
\t\t\t// trigger change event
\t\t\tobjFontSelect.trigger('change',{'selected':value});
\t\t}
\t});
\t
\t// Style select
\t// trigger change event
\tobjFontStyleSelect.change(function(event,params)
\t{
\t\tvar value = event.target.value;
\t\tif(params.selected)
\t\t{
\t\t\tvalue = params.selected;
\t\t}

\t\tvar s = value.split(':');
\t\t
\t\t// update preview
\t\tjQuery('#font_preview_<?= \$this->selector; ?>').css('font-weight',s[1]);
\t});
\t
\t// trigger change event on hover
\tobjFontStyleSelect.next('.chosen-container').on('mouseenter', 'li.active-result', function(event) 
\t{
\t\tvar index = jQuery(event.target).data('option-array-index');
\t\tvar value = objStyleOptions[index];
\t\t
\t\t// trigger change event
\t\tobjFontStyleSelect.trigger('change',{'selected':value});
\t});
\t
\t
\t/**
\t * Catch Switch event
\t */
\tjQuery('[data-name=\"<?= \$this->switch; ?>\"]').on('ThemeDesigner.onToggleSwitch',function(event,params)
\t{
\t\tif(params.status < 1)
\t\t{
\t\t\t // remove last font
\t\t\tjQuery('link#fontpicker_<?= \$this->selector; ?>').remove();
\t\t\t
\t\t\t// remove the last style in iframe
\t\t\tjQuery('#themedesigner_iframe').contents().find('link#fontpicker_<?= \$this->selector; ?>').remove();
\t\t\t 
\t\t\t ThemeDesigner.sendValue('<?= \$this->selector; ?>',null);
\t\t}
\t\telse
\t\t{
\t\t\tjQuery('#fontpicker_apply_<?= \$this->selector; ?>').trigger('click');
\t\t}
\t});


\t/**
\t * Eventlistener: ThemeDesigner.onSelector
\t * triggered when the ThemeDesigner triggers a selector
\t * @param object\tThe jquery event object
\t * @param object\tThe parameter object
\t * 
\t * objParams:
\t * {name,value}
\t */
\tobjFontSelect.on('ThemeDesigner.onSelector',function(event,objParams)
\t{
\t\tvar value = objParams.value;
\t\tvar s = value.split(':');
\t\tobjFontSelect.val(s[0]);
\t\t// update chosen
\t\tobjFontSelect.trigger('chosen:updated');
\t\tobjFontSelect.trigger('change',{'selected':value});
\t\tobjFontStyleSelect.trigger('change',{'selected':value});
\t});
\t
});

/* ]]> */
</script>
<br class=\"clear\"></div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/forms/td_form_select_fontpicker.html5";
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
        return new Source("", "@pct_themer/themedesigner/forms/td_form_select_fontpicker.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/forms/td_form_select_fontpicker.html5");
    }
}
