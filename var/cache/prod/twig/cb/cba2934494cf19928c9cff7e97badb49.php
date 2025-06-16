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

/* @pct_theme_templates/form/form_radio_selector.html5 */
class __TwigTemplate_127aa3fbc41949206785aed5cb6bfa6d extends Template
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
        yield "<?php \$this->extend('form_row'); ?>

<?php \$this->block('field'); ?>
  <fieldset id=\"ctrl_<?= \$this->id ?>\" class=\"checkbox_container<?php if (\$this->class) echo ' ' . \$this->class; ?>\">

    <?php if (\$this->label): ?>
      <legend>
        <?php if (\$this->mandatory): ?>
          <span class=\"invisible\"><?= \$this->mandatoryField ?></span> <?= \$this->label ?><span class=\"mandatory\">*</span>
        <?php else: ?>
          <?= \$this->label ?>
        <?php endif; ?>
      </legend>
    <?php endif; ?>

    <?php if (\$this->hasErrors()): ?>
      <p class=\"error\"><?= \$this->getErrorAsString() ?></p>
    <?php endif; ?>

    <input type=\"hidden\" name=\"<?= \$this->name ?>\" value=\"\">

    <?php foreach (\$this->getOptions() as \$option): ?>
      <?php if (\$option['type'] == 'group_start'): ?>
        <fieldset>
        <legend><?= \$option['label'] ?></legend>
      <?php endif; ?>

      <?php if (\$option['type'] == 'option'): ?>
        <span><input type=\"radio\" name=\"<?= \$option['name'] ?>\" id=\"opt_<?= \$option['id'] ?>\" class=\"radio\" value=\"<?= \$option['value'] ?>\"<?= \$option['checked'] ?><?= \$option['attributes'] ?>> <label id=\"lbl_<?= \$option['id'] ?>\" for=\"opt_<?= \$option['id'] ?>\"><?= \$option['label'] ?></label></span>
      <?php endif; ?>

      <?php if (\$option['type'] == 'group_end'): ?>
        </fieldset>
      <?php endif; ?>
    <?php endforeach; ?>

  </fieldset>

  <?php if (\$this->addSubmit): ?>
    <input type=\"submit\" id=\"ctrl_<?= \$this->id ?>_submit\" class=\"submit\" value=\"<?= \$this->slabel ?>\">
  <?php endif; ?>

<script>

/**
 * Handle checkbox like a selector to toggle fieldsets
 */
jQuery(document).ready(function() 
{
\t\t<?php
\t\$objForm = \\Contao\\FormModel::findByPk(\$this->pid);
\t\$strFormSubmit = 'auto_form_'.\$objForm->id;
\tif(\$objForm->formID)
\t{
\t\t\$strFormSubmit = 'auto_'.\$objForm->formID;
\t}
\t?>
\t
\tvar objForm = jQuery('form input[name=\"FORM_SUBMIT\"][value=\"<?= \$strFormSubmit; ?>\"]').parents('form');
\tvar arrPalettes = new Array();
\tvar singleAction = true; // only one radio button active allowed
\t
\t// find effected palletes / fieldsets
\t<?php foreach (\$this->getOptions() as \$option): ?>
\t\tvar fieldset = objForm.find('fieldset.<?php echo \$option['value']; ?>');
\t\t// effect fieldsets should contain the value as classname
\t\tarrPalettes['<?php echo \$option['value']; ?>'] = fieldset.html();
\t\t<?php if(!\$option['checked']): ?>
\t\tfieldset.addClass('hidden').html('');
\t\t<?php endif; ?>
\t\t
\t\t<?php // store selector in global scope
\t\t\$GLOBALS['radio_selector_helper'][\$objForm->id]['__selector__'][\$option['name']][] = \$option['value'];
\t\t?>
\t<?php endforeach; ?>
\t
\tjQuery('#ctrl_<?= \$this->id ?>').click(function(e)
\t{
\t\tif(e.target.value == undefined)
\t\t{
\t\t\treturn;
\t\t}
\t\t
\t\t// hide all fieldsets
\t\tif(singleAction === true && Object.keys(arrPalettes).length > 1)
\t\t{
\t\t\tjQuery.each(Object.keys(arrPalettes), function(k,v)
\t\t\t{
\t\t\t\tobjForm.find('fieldset.'+v).addClass('hidden').html('');
\t\t\t});
\t\t}
\t\t
\t\t// hide a fieldset by this logic: CSS_CLASS[off]
\t\tif(e.target.value.indexOf('[off]') > -1)
\t\t{
\t\t\tobjForm.find('fieldset.'+e.target.value.replace('[off]','')).addClass('hidden').html('');
\t\t}
\t\telse if(arrPalettes[e.target.value] && e.target.checked == true)
\t\t{
\t\t\tobjForm.find('fieldset.'+e.target.value).removeClass('hidden').html(arrPalettes[e.target.value]);
\t\t}
\t\telse if(arrPalettes[e.target.value] && e.target.checked == false)
\t\t{
\t\t\tobjForm.find('fieldset.'+e.target.value).addClass('hidden').html('');
\t\t}
\t});

});


</script>

<?php
\t
// register hook
\$GLOBALS['TL_HOOKS']['loadFormField']['radio_select_helper_bypassValidation'] = array('radio_select_helper','bypassValidation');\t

if(!class_exists('radio_select_helper',false))
{
\t/**
\t * Class radio_select_helper
\t * @author Tim Gatzky
\t */
\tclass radio_select_helper extends \\Contao\\Frontend
\t{
\t\t/**
\t\t * Bypass the validation of form fields that should be effected by a selector
\t\t * @param object
\t\t * @param string
\t\t * @param array
\t\t * called from loadFormField Hook
\t\t */
\t\tpublic function bypassValidation(\$objWidget,\$strFormId,\$arrForm)
\t\t{
\t\t\tif(\\Contao\\Input::post('FORM_SUBMIT') != \$strFormId)
\t\t\t{
\t\t\t\treturn \$objWidget;
\t\t\t}
\t\t\t
\t\t\t\$intForm = \$arrForm['id'];
\t\t\t
\t\t\tif( !is_array(\$GLOBALS['radio_selector_helper'][\$intForm]['__selector__']) )
\t\t\t{
\t\t\t\treturn \$objWidget;
\t\t\t}
\t\t\t
\t\t\t\$arrSelectors = \$GLOBALS['radio_selector_helper'][\$intForm]['__selector__'];
\t\t\t\$arrClass = array_filter( explode(' ', \$objWidget->class) ?: array() );
\t\t\t
\t\t\tif( (\$objWidget->type == 'fieldset' && \$objWidget->fsType == 'fsStart') || \$objWidget->type == 'fieldsetStart' )
\t\t\t{
\t\t\t\tforeach(\$arrSelectors as \$selector => \$values)
\t\t\t\t{
\t\t\t\t\tif(array_intersect(\$values, \$arrClass))
\t\t\t\t\t{
\t\t\t\t\t\t\$GLOBALS['RADIO_FIELDSET_START'] = true;
\t\t\t\t\t}
\t\t\t\t}
\t\t\t\treturn \$objWidget;
\t\t\t}
\t\t\telse if( (\$objWidget->type == 'fieldset' && \$objWidget->fsType == 'fsStop') || \$objWidget->type == 'fieldsetStop' )
\t\t\t{
\t\t\t\tunset(\$GLOBALS['RADIO_FIELDSET_START']);
\t\t\t\treturn \$objWidget;
\t\t\t}

\t\t\tforeach(\$arrSelectors as \$selector => \$values)
\t\t\t{
\t\t\t\t// selector not active, bypass validation for fields with class of the selector value
\t\t\t\tif(strlen(\\Contao\\Input::post(\$selector)) < 1)
\t\t\t\t{
\t\t\t\t\tif( empty( array_intersect(\$values, \$arrClass) ) === false || (boolean)\$GLOBALS['RADIO_FIELDSET_START'] === true)
\t\t\t\t\t{
\t\t\t\t\t\t\$objWidget->mandatory = false;
\t\t\t\t\t}
\t\t\t\t}
\t\t\t}
\t\t\treturn \$objWidget;
\t\t}
\t}
}\t
?>

<?php \$this->endblock(); ?>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/form/form_radio_selector.html5";
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
        return new Source("", "@pct_theme_templates/form/form_radio_selector.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/form/form_radio_selector.html5");
    }
}
