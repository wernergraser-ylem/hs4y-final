<?php

namespace {
$GLOBALS['TL_DCA']['tl_form_field'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'enableVersioning' => \true, 'ptable' => 'tl_form', 'markAsCopy' => 'label', 'onload_callback' => array(array('tl_form_field', 'filterFormFields')), 'sql' => array('keys' => array('id' => 'primary', 'pid,invisible' => 'index', 'tstamp' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_PARENT, 'fields' => array('sorting'), 'panelLayout' => 'filter;search,limit', 'defaultSearchField' => 'label', 'headerFields' => array('title', 'tstamp', 'formID', 'storeValues', 'sendViaEmail', 'recipient', 'subject'), 'child_record_callback' => array('tl_form_field', 'listFormFields'), 'renderAsGrid' => \true, 'limitHeight' => 104), 'operations' => array('edit' => array('href' => 'act=edit', 'icon' => 'edit.svg', 'button_callback' => array('tl_form_field', 'disableButton')), 'copy' => array('href' => 'act=paste&amp;mode=copy', 'icon' => 'copy.svg', 'attributes' => 'data-action="contao--scroll-offset#store"', 'button_callback' => array('tl_form_field', 'disableButton')), 'cut', 'delete' => array('href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'data-action="contao--scroll-offset#store" onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? \null) . '\'))return false"', 'button_callback' => array('tl_form_field', 'disableButton')), 'toggle' => array('href' => 'act=toggle&amp;field=invisible', 'icon' => 'visible.svg', 'reverse' => \true, 'button_callback' => array('tl_form_field', 'toggleIcon')), 'show')),
    // Palettes
    'palettes' => array('__selector__' => array('type', 'multiple', 'storeFile', 'imageSubmit', 'rgxp'), 'default' => '{type_legend},type', 'explanation' => '{type_legend},type;{text_legend},text;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'fieldsetStart' => '{type_legend},type;{fconfig_legend},label;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'fieldsetStop' => '{type_legend},type;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'html' => '{type_legend},type;{text_legend},html;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'text' => '{type_legend},type,name,label;{fconfig_legend},mandatory,rgxp,placeholder;{expert_legend:hide},class,value,minlength,maxlength,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'textdigit' => '{type_legend},type,name,label;{fconfig_legend},mandatory,rgxp,placeholder;{expert_legend:hide},class,value,minval,maxval,step,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'textcustom' => '{type_legend},type,name,label;{fconfig_legend},mandatory,rgxp,placeholder,customRgxp,errorMsg;{expert_legend:hide},class,value,minlength,maxlength,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'password' => '{type_legend},type,name,label;{fconfig_legend},mandatory,rgxp,placeholder;{expert_legend:hide},class,value,minlength,maxlength,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'passwordcustom' => '{type_legend},type,name,label;{fconfig_legend},mandatory,rgxp,placeholder,customRgxp,errorMsg;{expert_legend:hide},class,value,minlength,maxlength,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'textarea' => '{type_legend},type,name,label;{fconfig_legend},mandatory,rgxp,placeholder;{size_legend},size;{expert_legend:hide},class,value,minlength,maxlength,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'textareacustom' => '{type_legend},type,name,label;{fconfig_legend},mandatory,rgxp,placeholder,customRgxp,errorMsg;{size_legend},size;{expert_legend:hide},class,value,minlength,maxlength,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'select' => '{type_legend},type,name,label;{fconfig_legend},mandatory,multiple;{options_legend},options;{expert_legend:hide},class,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'radio' => '{type_legend},type,name,label;{fconfig_legend},mandatory;{options_legend},options;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'checkbox' => '{type_legend},type,name,label;{fconfig_legend},mandatory;{options_legend},options;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'upload' => '{type_legend},type,name,label;{fconfig_legend},mandatory,extensions,maxlength,maxImageWidth,maxImageHeight;{store_legend:hide},storeFile;{expert_legend:hide},class,accesskey,fSize;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'range' => '{type_legend},type,name,label;{fconfig_legend},mandatory;{expert_legend:hide},class,value,minval,maxval,step,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'hidden' => '{type_legend},type,name,value;{fconfig_legend},mandatory,rgxp;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'hiddencustom' => '{type_legend},type,name,value;{fconfig_legend},mandatory,rgxp,customRgxp;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'captcha' => '{type_legend},type,label;{fconfig_legend},placeholder;{expert_legend:hide},class,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible', 'submit' => '{type_legend},type,slabel;{image_legend:hide},imageSubmit;{expert_legend:hide},class,accesskey;{template_legend:hide},customTpl;{invisible_legend:hide},invisible'),
    // Sub-palettes
    'subpalettes' => array('multiple' => 'mSize', 'storeFile' => 'uploadFolder,useHomeDir,doNotOverwrite', 'imageSubmit' => 'singleSRC'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('foreignKey' => 'tl_form.title', 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')), 'sorting' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'type' => array('filter' => \true, 'inputType' => 'select', 'options_callback' => array('tl_form_field', 'getFields'), 'eval' => array('helpwizard' => \true, 'chosen' => \true, 'submitOnChange' => \true, 'tl_class' => 'w50'), 'reference' => &$GLOBALS['TL_LANG']['FFL'], 'sql' => array('name' => 'type', 'type' => 'string', 'length' => 64, 'default' => 'text')), 'label' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'name' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'fieldname', 'spaceToUnderscore' => \true, 'maxlength' => 64, 'tl_class' => 'w50 clr'), 'sql' => "varchar(64) NOT NULL default ''"), 'text' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('rte' => 'tinyMCE', 'basicEntities' => \true, 'helpwizard' => \true), 'explanation' => 'insertTags', 'sql' => "text NULL"), 'html' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('mandatory' => \true, 'allowHtml' => \true, 'class' => 'monospace', 'rte' => 'ace|html'), 'sql' => "text NULL"), 'options' => array('inputType' => 'optionWizard', 'eval' => array('mandatory' => \true, 'allowHtml' => \true), 'xlabel' => array(array('tl_form_field', 'optionImportWizard')), 'sql' => "blob NULL"), 'mandatory' => array('filter' => \true, 'inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'rgxp' => array('inputType' => 'select', 'options' => array('digit', 'alpha', 'alnum', 'extnd', 'date', 'time', 'datim', 'phone', 'email', 'url', \Contao\CoreBundle\EventListener\Widget\HttpUrlListener::RGXP_NAME, \Contao\CoreBundle\EventListener\Widget\CustomRgxpListener::RGXP_NAME), 'reference' => &$GLOBALS['TL_LANG']['tl_form_field'], 'eval' => array('helpwizard' => \true, 'includeBlankOption' => \true, 'submitOnChange' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'placeholder' => array('search' => \true, 'inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'customRgxp' => array('inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50', 'mandatory' => \true), 'sql' => "varchar(255) NOT NULL default ''"), 'errorMsg' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'minlength' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w25'), 'sql' => "int(10) unsigned NOT NULL default 0"), 'maxlength' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w25'), 'sql' => "int(10) unsigned NOT NULL default 0"), 'maxImageWidth' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0"), 'maxImageHeight' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0"), 'minval' => array('inputType' => 'text', 'eval' => array('rgxp' => 'digit', 'tl_class' => 'w25'), 'sql' => "varchar(10) NOT NULL default ''"), 'maxval' => array('inputType' => 'text', 'eval' => array('rgxp' => 'digit', 'tl_class' => 'w25'), 'sql' => "varchar(10) NOT NULL default ''"), 'step' => array('inputType' => 'text', 'eval' => array('rgxp' => 'digit', 'tl_class' => 'w25'), 'sql' => "varchar(10) NOT NULL default ''"), 'size' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'multiple' => \true, 'size' => 2, 'rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default 'a:2:{i:0;i:4;i:1;i:40;}'"), 'multiple' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true, 'tl_class' => 'clr'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'mSize' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'extensions' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'extnd', 'maxlength' => 255, 'tl_class' => 'w50'), 'save_callback' => array(array('tl_form_field', 'checkExtensions')), 'sql' => "varchar(255) NOT NULL default 'jpg,jpeg,gif,png,pdf,doc,docx,xls,xlsx,ppt,pptx'"), 'storeFile' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'uploadFolder' => array('inputType' => 'fileTree', 'eval' => array('fieldType' => 'radio', 'tl_class' => 'clr'), 'sql' => "binary(16) NULL"), 'useHomeDir' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'doNotOverwrite' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'class' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'value' => array('search' => \true, 'inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'accesskey' => array('search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'alnum', 'maxlength' => 1, 'tl_class' => 'w25'), 'sql' => "char(1) NOT NULL default ''"), 'fSize' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w25'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'customTpl' => array('inputType' => 'select', 'eval' => array('chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) NOT NULL default ''"), 'slabel' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50 clr'), 'sql' => "varchar(255) NOT NULL default ''"), 'imageSubmit' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'singleSRC' => array('inputType' => 'fileTree', 'eval' => array('fieldType' => 'radio', 'filesOnly' => \true, 'mandatory' => \true, 'tl_class' => 'clr'), 'sql' => "binary(16) NULL"), 'invisible' => array('reverseToggle' => \true, 'filter' => \true, 'inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false))),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_form_field extends \Contao\Backend
{
    /**
     * Filter the form fields
     */
    public function filterFormFields()
    {
        $user = \Contao\BackendUser::getInstance();
        if ($user->isAdmin) {
            return;
        }
        if (empty($user->fields)) {
            $GLOBALS['TL_DCA']['tl_form_field']['config']['closed'] = \true;
            $GLOBALS['TL_DCA']['tl_form_field']['config']['notEditable'] = \true;
        } elseif (!\in_array($GLOBALS['TL_DCA']['tl_form_field']['fields']['type']['sql']['default'] ?? \null, $user->fields)) {
            $GLOBALS['TL_DCA']['tl_form_field']['fields']['type']['default'] = $user->fields[0];
        }
        $db = \Contao\Database::getInstance();
        $objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
        // Prevent editing form fields with not allowed types
        if (\Contao\Input::get('act') == 'edit' || \Contao\Input::get('act') == 'toggle' || \Contao\Input::get('act') == 'delete' || \Contao\Input::get('act') == 'paste' && \Contao\Input::get('mode') == 'copy') {
            $objField = $db->prepare("SELECT type FROM tl_form_field WHERE id=?")->execute(\Contao\Input::get('id'));
            if ($objField->numRows && !\in_array($objField->type, $user->fields)) {
                throw new \Contao\CoreBundle\Exception\AccessDeniedException('Not enough permissions to modify form fields of type "' . $objField->type . '".');
            }
        }
        // Prevent editing content elements with not allowed types
        if (\Contao\Input::get('act') == 'editAll' || \Contao\Input::get('act') == 'overrideAll' || \Contao\Input::get('act') == 'deleteAll') {
            $session = $objSession->all();
            if (!empty($session['CURRENT']['IDS']) && \is_array($session['CURRENT']['IDS'])) {
                if (empty($user->fields)) {
                    $session['CURRENT']['IDS'] = array();
                } else {
                    $objFields = $db->prepare("SELECT id FROM tl_form_field WHERE id IN(" . \implode(',', \array_map('\\intval', $session['CURRENT']['IDS'])) . ") AND type IN(" . \implode(',', \array_fill(0, \count($user->fields), '?')) . ")")->execute(...$user->fields);
                    $session['CURRENT']['IDS'] = $objFields->fetchEach('id');
                }
                $objSession->replace($session);
            }
        }
        // Prevent copying content elements with not allowed types
        if (\Contao\Input::get('act') == 'copyAll') {
            $session = $objSession->all();
            if (!empty($session['CLIPBOARD']['tl_form_field']['id']) && \is_array($session['CLIPBOARD']['tl_form_field']['id'])) {
                if (empty($user->fields)) {
                    $session['CLIPBOARD']['tl_form_field']['id'] = array();
                } else {
                    $objFields = $db->prepare("SELECT id, type FROM tl_form_field WHERE id IN(" . \implode(',', \array_map('\\intval', $session['CLIPBOARD']['tl_form_field']['id'])) . ") AND type IN(" . \implode(',', \array_fill(0, \count($user->fields), '?')) . ") ORDER BY sorting")->execute(...$user->fields);
                    $session['CLIPBOARD']['tl_form_field']['id'] = $objFields->fetchEach('id');
                }
                $objSession->replace($session);
            }
        }
    }
    /**
     * Add the type of input field
     *
     * @param array $arrRow
     *
     * @return string
     */
    public function listFormFields($arrRow)
    {
        $arrRow['required'] = $arrRow['mandatory'];
        /** @var class-string<Widget> $strClass */
        $strClass = $GLOBALS['TL_FFL'][$arrRow['type']] ?? \null;
        if (!\class_exists($strClass)) {
            return '';
        }
        $objWidget = new $strClass($arrRow);
        $key = $arrRow['invisible'] ? 'unpublished' : 'published';
        $strType = '
<div class="cte_type ' . $key . '">' . $GLOBALS['TL_LANG']['FFL'][$arrRow['type']][0] . ($objWidget->submitInput() && $arrRow['name'] ? ' (' . $arrRow['name'] . ')' : '') . '</div>
<div class="cte_preview">';
        $strWidget = $objWidget->parse();
        $strWidget = \preg_replace('/ name="[^"]+"/i', '', $strWidget);
        $strWidget = \str_replace(array(' type="submit"', ' autofocus', ' required'), array(' type="button"', '', ''), $strWidget);
        if ($objWidget instanceof \Contao\FormHidden) {
            return $strType . "\n" . $objWidget->value . "\n</div>\n";
        }
        return $strType . \Contao\StringUtil::insertTagToSrc($strWidget) . '
</div>' . "\n";
    }
    /**
     * Add a link to the option items import wizard
     *
     * @return string
     */
    public function optionImportWizard()
    {
        return ' <a href="' . $this->addToUrl('key=option') . '" title="' . \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['ow_import'][1]) . '" data-action="contao--scroll-offset#store">' . \Contao\Image::getHtml('tablewizard.svg', $GLOBALS['TL_LANG']['MSC']['ow_import'][0]) . '</a>';
    }
    /**
     * Check the configured extensions against the upload types
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return string
     */
    public function checkExtensions($varValue, \Contao\DataContainer $dc)
    {
        // Convert the extensions to lowercase
        $varValue = \strtolower($varValue);
        $arrExtensions = \Contao\StringUtil::trimsplit(',', $varValue);
        $arrUploadTypes = \Contao\StringUtil::trimsplit(',', \strtolower(\Contao\Config::get('uploadTypes')));
        $arrNotAllowed = \array_diff($arrExtensions, $arrUploadTypes);
        if (0 !== \count($arrNotAllowed)) {
            throw new \Exception(\sprintf($GLOBALS['TL_LANG']['ERR']['forbiddenExtensions'], \implode(', ', $arrNotAllowed)));
        }
        return $varValue;
    }
    /**
     * Return a list of form fields
     *
     * @return array
     */
    public function getFields()
    {
        $fields = array();
        $security = \Contao\System::getContainer()->get('security.helper');
        foreach ($GLOBALS['TL_FFL'] as $k => $v) {
            if ($security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_ACCESS_FIELD_TYPE, $k)) {
                $fields[] = $k;
            }
        }
        return $fields;
    }
    /**
     * Disable the button if the element type is not allowed
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     * @param string $attributes
     *
     * @return string
     */
    public function disableButton($row, $href, $label, $title, $icon, $attributes)
    {
        return \Contao\System::getContainer()->get('security.helper')->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_ACCESS_FIELD_TYPE, $row['type']) ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . \Contao\StringUtil::specialchars($title) . '"' . $attributes . '>' . \Contao\Image::getHtml($icon, $label) . '</a> ' : \Contao\Image::getHtml(\str_replace('.svg', '--disabled.svg', $icon)) . ' ';
    }
    /**
     * Return the "toggle visibility" button
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     * @param string $attributes
     *
     * @return string
     */
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        $security = \Contao\System::getContainer()->get('security.helper');
        // Check permissions AFTER checking the tid, so hacking attempts are logged
        if (!$security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_EDIT_FIELD_OF_TABLE, 'tl_form_field::invisible')) {
            return '';
        }
        // Disable the button if the element type is not allowed
        if (!$security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_ACCESS_FIELD_TYPE, $row['type'])) {
            return \Contao\Image::getHtml(\str_replace('.svg', '--disabled.svg', $icon)) . ' ';
        }
        $href .= '&amp;id=' . $row['id'];
        if ($row['invisible']) {
            $icon = 'invisible.svg';
        }
        $titleDisabled = \is_array($GLOBALS['TL_DCA']['tl_form_field']['list']['operations']['toggle']['label']) && isset($GLOBALS['TL_DCA']['tl_form_field']['list']['operations']['toggle']['label'][2]) ? \sprintf($GLOBALS['TL_DCA']['tl_form_field']['list']['operations']['toggle']['label'][2], $row['id']) : $title;
        return '<a href="' . $this->addToUrl($href) . '" title="' . \Contao\StringUtil::specialchars(!$row['invisible'] ? $title : $titleDisabled) . '" data-title="' . \Contao\StringUtil::specialchars($title) . '" data-title-disabled="' . \Contao\StringUtil::specialchars($titleDisabled) . '" data-action="contao--scroll-offset#store" onclick="return AjaxRequest.toggleField(this,true)">' . \Contao\Image::getHtml($icon, $label, 'data-icon="visible.svg" data-icon-disabled="invisible.svg" data-state="' . ($row['invisible'] ? 0 : 1) . '"') . '</a> ';
    }
}
}

namespace {
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()->addField('isConditionalFormField', 'expert_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)->applyToPalette('fieldsetStart', 'tl_form_field');
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'isConditionalFormField';
$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['isConditionalFormField'] = 'conditionalFormFieldCondition';
$GLOBALS['TL_DCA']['tl_form_field']['fields']['isConditionalFormField'] = ['exclude' => \true, 'inputType' => 'checkbox', 'eval' => ['submitOnChange' => \true, 'tl_class' => 'clr'], 'sql' => "char(1) NOT NULL default ''"];
$GLOBALS['TL_DCA']['tl_form_field']['fields']['conditionalFormFieldCondition'] = ['exclude' => \true, 'inputType' => 'textarea', 'eval' => ['mandatory' => \true, 'useRawRequestData' => \true, 'style' => 'height:40px', 'tl_class' => 'clr'], 'sql' => 'text NULL'];
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */
/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_autogrid');
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('PCT\\AutoGrid\\DcaHelper', 'modifyDCA');
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableFormField', 'modifyDCA');
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('PCT\\AutoGrid\\DcaHelper', 'buttonAjaxListener');
$GLOBALS['TL_DCA']['tl_form_field']['config']['onsubmit_callback'][] = array('PCT\\AutoGrid\\Backend\\TableFormField', 'createSiblingStopElement');
#$GLOBALS['TL_DCA']['tl_form_field']['config']['ondelete_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'deleteSiblings');
#$GLOBALS['TL_DCA']['tl_form_field']['config']['oncut_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'oncut_toggleAutoGrid');
#$GLOBALS['TL_DCA']['tl_form_field']['config']['oncopy_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'oncopy_toggleAutoGrid');
#$GLOBALS['TL_DCA']['tl_form_field']['config']['onsubmit_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'activateAutoGridInFlexRows');
/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'autogrid';
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['autogrid'] = 'autogrid_css,autogrid_tablet,autogrid_mobile,autogrid_offset,autogrid_align,autogrid_class';
/**
 * Palettes
 */
// Autogrid Row
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['autogridRowStart'] = '{type_legend},type;autogrid_gutter,autogrid_sameheight;{template_legend},customTpl;{expert_legend:hide},class';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['autogridRowStop'] = '{type_legend},type;{template_legend:hide},customTpl;';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['autogridColStart'] = '{type_legend},type,autogrid_css,autogrid_tablet,autogrid_mobile,autogrid_align,autogrid_align_mobile;{template_legend},customTpl;{expert_legend:hide},class';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['autogridColStop'] = '{template_legend:hide},customTpl';
/**
 * Fields
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_form_field']['fields'], 0, $GLOBALS['PCT_AUTOGRID']['autogrid_fields']);
// set the contao type selection to be a chosen field
$GLOBALS['TL_DCA']['tl_form_field']['fields']['type']['eval']['chosen'] = \true;
}

namespace {
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['mp_form_pageswitch'] = '{type_legend},type,label,mp_forms_backButton,slabel;{image_legend:hide},imageSubmit;{expert_legend:hide},mp_forms_backFragment,mp_forms_nextFragment,class,accesskey,tabindex;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['mp_form_placeholder'] = '{type_legend},type;{text_legend},html;{mp_forms_download_legend},mp_forms_downloadTemplate,mp_forms_downloadInline;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';
$GLOBALS['TL_DCA']['tl_form_field']['fields']['mp_forms_backButton'] = ['exclude' => \true, 'inputType' => 'text', 'eval' => ['tl_class' => 'w50 clr', 'maxlength' => 255], 'sql' => ['type' => 'string', 'length' => 255, 'default' => '', 'notnull' => \true]];
$GLOBALS['TL_DCA']['tl_form_field']['fields']['mp_forms_backFragment'] = ['exclude' => \true, 'inputType' => 'text', 'eval' => ['tl_class' => 'w50', 'maxlength' => 255], 'sql' => ['type' => 'string', 'length' => 255, 'default' => '', 'notnull' => \true]];
$GLOBALS['TL_DCA']['tl_form_field']['fields']['mp_forms_nextFragment'] = ['exclude' => \true, 'inputType' => 'text', 'eval' => ['tl_class' => 'w50', 'maxlength' => 255], 'sql' => ['type' => 'string', 'length' => 255, 'default' => '', 'notnull' => \true]];
$GLOBALS['TL_DCA']['tl_form_field']['fields']['mp_forms_downloadTemplate'] = ['exclude' => \true, 'inputType' => 'select', 'options_callback' => static fn() => \Contao\Controller::getTemplateGroup('ce_download_', [], 'ce_download'), 'eval' => ['chosen' => \true, 'tl_class' => 'clr w50'], 'sql' => "varchar(64) NOT NULL default ''"];
$GLOBALS['TL_DCA']['tl_form_field']['fields']['mp_forms_downloadInline'] = ['exclude' => \true, 'inputType' => 'checkbox', 'eval' => ['tl_class' => 'm12 w50'], 'sql' => "char(1) COLLATE ascii_bin NOT NULL default ''"];
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2019 Leo Feyer
 *
 * @copyright   Tim Gatzky 2019
 * @author      Tim Gatzky <info@tim-gatzky.de>
 * @package     pct_theme_settings
 * @link        http://contao.org
 */
/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_theme_settings');
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableFormField', 'modifyDca');
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['visibility_css'] = array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['visibility_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''");
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_form_field']['fields'], 0, array('margin_t' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_t'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_top_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"), 'margin_b' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_b'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"), 'margin_t_m' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_t_m'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_top_m_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"), 'margin_b_m' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_b_m'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_m_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''")));
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */
#$GLOBALS['TL_DCA']['tl_form_field']['list']['sorting']['child_record_callback'] = array('PCT\IconPicker\Backend\TableFormField', 'listFormFields');
/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'addFontIcon';
/**
 * Palettes
 */
$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
if ($request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
    if (!\is_array($GLOBALS['PCT_ICONPICKER']['fflIgnoreList'])) {
        $GLOBALS['PCT_ICONPICKER']['fflIgnoreList'] = array();
    }
    foreach ($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $type => $palette) {
        if (!\in_array($type, $GLOBALS['PCT_ICONPICKER']['fflIgnoreList']) && $type != '__selector__') {
            $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$type] .= ';{fontIcon_legend:hide},addFontIcon;';
        }
    }
}
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['addFontIcon'] = 'fontIcon';
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['addFontIcon'] = array('label' => &$GLOBALS['TL_LANG']['tl_form_field']['addFontIcon'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_form_field']['fields']['fontIcon'] = array('label' => &$GLOBALS['TL_LANG']['tl_form_field']['fontIcon'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'clr w50'), 'explanation' => 'fontIcons', 'wizard' => array(array('PCT\\IconPicker\\IconPicker', 'fontIconPicker')), 'sql' => "varchar(32) NOT NULL default ''");
}
