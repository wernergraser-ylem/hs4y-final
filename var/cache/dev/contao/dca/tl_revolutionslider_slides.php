<?php

namespace {
/**
 * Load language file
 */
\Contao\System::loadLanguageFile('tl_module');
\Contao\System::loadLanguageFile('tl_content');
\Contao\System::loadLanguageFile('tl_revolutionslider');
/**
 * Table tl_revolutionslider_slides
 */
$GLOBALS['TL_DCA']['tl_revolutionslider_slides'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ptable' => 'tl_revolutionslider', 'ctable' => array('tl_content'), 'switchToEdit' => \true, 'enableVersioning' => \true, 'onload_callback' => array(array('RevolutionSlider\\Backend\\TableRevolutionSliderSlides', 'modifyDCA'), array('RevolutionSlider\\Backend\\TableRevolutionSliderSlides', 'loadStyles')), 'sql' => array('keys' => array('id' => 'primary', 'pid' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => 4, 'fields' => array('sorting'), 'headerFields' => array('title'), 'panelLayout' => 'search,limit', 'child_record_callback' => array('RevolutionSlider\\Backend\\TableRevolutionSliderSlides', 'listSlides')), 'label' => array('fields' => array('title'), 'format' => '%s'), 'global_operations' => array('all' => array('label' => &$GLOBALS['TL_LANG']['MSC']['all'], 'href' => 'act=select', 'class' => 'header_edit_all', 'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"')), 'operations' => array('editheader' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['editheader'], 'href' => 'act=edit', 'icon' => 'edit.svg'), 'edit' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['edit'], 'href' => 'table=tl_content&mode=2', 'icon' => 'children.svg'), 'copy' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['copy'], 'href' => 'act=paste&amp;mode=copy', 'icon' => 'copy.svg'), 'cut' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['cut'], 'href' => 'act=paste&amp;mode=cut', 'icon' => 'cut.svg'), 'delete' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['delete'], 'href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'), 'toggle' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['toggle'], 'href' => 'act=toggle&amp;field=published', 'icon' => 'visible.svg', 'button_callback' => array('RevolutionSlider\\Backend\\TableRevolutionSliderSlides', 'toggleIcon')), 'show' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['show'], 'href' => 'act=show', 'icon' => 'show.svg'))),
    // Palettes
    'palettes' => array('__selector__' => array('background', 'kenburns'), 'default' => '{title_legend},title,subtitle;{settings_legend},transition,slideUrl,newWindow;{background_legend:hide},background;{expert_settings_legend:hide},masterspeed,delay,singleSRC_thumb,lazyload;{expert_legend},cssID,published;', 'image' => '{title_legend},title,subtitle;{settings_legend},transition,slideUrl,newWindow;{background_legend:hide},background,singleSRC,size,data_bgfit,data_bgposition,data_bgrepeat,lazyload,kenburns;{expert_settings_legend:hide},masterspeed,delay,singleSRC_thumb;{expert_legend},cssID,published;', 'colored' => '{title_legend},title,subtitle;{settings_legend},transition,slideUrl,newWindow;{background_legend:hide},background,data_bgcolor;{expert_settings_legend:hide},masterspeed,delay,singleSRC_thumb;{expert_legend},cssID,published;', 'videomp4' => '{title_legend},title,subtitle;{settings_legend},transition,slideUrl,newWindow;{background_legend:hide},background;{video_source_legend:hide},videoSRC,singleSRC;{video_settings_legend:hide},loop,nextslideatend;{expert_settings_legend:hide},masterspeed,delay,singleSRC_thumb;{expert_legend},cssID,published;', 'external' => '{title_legend},title,subtitle;{settings_legend},transition,slideUrl,newWindow;{background_legend:hide},background;{video_source_legend:hide},videoURL,singleSRC;{video_settings_legend:hide},loop,nextslideatend;{expert_settings_legend:hide},masterspeed,delay,singleSRC_thumb;{expert_legend},cssID,published;'),
    // Subpalettes
    'subpalettes' => array('kenburns' => 'data_duration,data_ease,data_bgposition_OUT,data_bgscale'),
    // Fields
    'fields' => array(
        'id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"),
        'pid' => array('sql' => "int(10) unsigned NOT NULL default '0'"),
        'sorting' => array('sql' => "int(10) unsigned NOT NULL default '0'"),
        'tstamp' => array('sql' => "int(10) unsigned NOT NULL default '0'"),
        'title' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['title'], 'exclude' => \true, 'search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'subtitle' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['subtitle'], 'exclude' => \true, 'search' => \true, 'inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'tl_class' => 'w50'), 'sql' => "tinytext NULL"),
        'transition' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['transition'], 'exclude' => \true, 'inputType' => 'select', 'default' => 'fade', 'options_callback' => array('RevolutionSlider\\Core\\RevolutionSlider', 'getTransitions'), 'reference' => &$GLOBALS['TL_LANG']['revolutionSliderTransitionsClasses'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''"),
        'slideUrl' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['slideUrl'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'url', 'dcaPicker' => \true, 'decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'clr w50 wizard'), 'sql' => "varchar(255) NOT NULL default ''"),
        'newWindow' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['newWindow'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => "char(1) NOT NULL default ''"),
        'masterspeed' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['masterspeed'], 'exclude' => \true, 'inputType' => 'text', 'default' => '0.03', 'eval' => array('tl_class' => 'clr w50'), 'sql' => "varchar(16) NOT NULL default ''"),
        'delay' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['delay'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(10) NOT NULL default ''"),
        'lazyload' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['lazyload'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'm12 w50'), 'sql' => "char(1) NOT NULL default ''"),
        'singleSRC_thumb' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['singleSRC_thumb'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('fieldType' => 'radio', 'files' => \true, 'tl_class' => 'clr w50'), 'sql' => "binary(16) NULL"),
        'singleSRC' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['singleSRC'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('mandatory' => \true, 'fieldType' => 'radio', 'files' => \true, 'filesOnly' => \true, 'tl_class' => 'clr'), 'sql' => "binary(16) NULL"),
        'size' => array('label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'], 'exclude' => \true, 'inputType' => 'imageSize', 'options_callback' => static function () {
            $service = 'contao.image.sizes';
            return \Contao\System::getContainer()->get($service)->getAllOptions();
        }, 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('tl_class' => 'clr w50', 'rgxp' => 'natural', 'includeBlankOption' => \true, 'nospace' => \true, 'helpwizard' => \true), 'sql' => "varchar(128) COLLATE ascii_bin NOT NULL default ''"),
        'background' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['background'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('image', 'colored', 'transparent', 'videomp4', 'external'), 'default' => 'image', 'reference' => $GLOBALS['TL_LANG']['tl_revolutionslider_slides']['background'], 'eval' => array('tl_class' => 'clr w50', 'chosen' => \true, 'submitOnChange' => \true, 'mandatory' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
        'data_bgfit' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_bgfit'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('cover', 'contain', 'normal'), 'eval' => array('tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
        'data_bgposition' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_bgposition'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('left top', 'center top', 'right top', 'left center', 'center center', 'right center', 'left bottom', 'center bottom', 'right bottom'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'reference' => $GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_bgposition'], 'sql' => "varchar(16) NOT NULL default ''"),
        'data_bgrepeat' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_bgrepeat'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'm12 w50'), 'sql' => "char(1) NOT NULL default ''"),
        'data_bgcolor' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_bgcolor'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 6, 'colorpicker' => \true, 'isHexColor' => \true, 'decodeEntities' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(64) NOT NULL default ''"),
        'kenburns' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['kenburns'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr w50', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
        'data_duration' => array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_speed'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50 clr', 'rgxp' => 'digit'), 'sql' => "int(10) NOT NULL default '0'"),
        'data_bgposition_OUT' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_bgposition_OUT'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('left top', 'center top', 'right top', 'left center', 'center center', 'right center', 'left bottom', 'center bottom', 'right bottom'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'reference' => $GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_bgposition'], 'sql' => "varchar(16) NOT NULL default ''"),
        'data_bgscale' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_scale'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50', 'rgxp' => 'digit'), 'sql' => "varchar(255) NOT NULL default ''"),
        'data_ease' => array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_easing'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('RevolutionSlider\\Core\\RevolutionSlider', 'getTransitionEasings'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''"),
        'cssID' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['cssID'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'published' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['published'], 'exclude' => \true, 'filter' => \true, 'toggle' => \true, 'flag' => 1, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'doNotCopy' => \true), 'sql' => "char(1) NOT NULL default ''"),
        // video
        'videoSRC' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['videoSRC'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('mandatory' => \true, 'extensions' => 'mp4', 'fieldType' => 'radio', 'files' => \true, 'filesOnly' => \true, 'tl_class' => 'clr'), 'sql' => "binary(16) NULL"),
        'videoURL' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['videoURL'], 'exclude' => \true, 'search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'url', 'decodeEntities' => \true, 'maxlength' => 255, 'addWizardClass' => \false, 'tl_class' => 'long'), 'sql' => "varchar(255) NOT NULL default ''"),
        'loop' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['loop'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'nextslideatend' => array('label' => &$GLOBALS['TL_LANG']['tl_revolutionslider_slides']['nextslideatend'], 'exclude' => \true, 'inputType' => 'checkbox', 'default' => 1, 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
    ),
);
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '<')) {
    $edit = $GLOBALS['TL_DCA']['tl_revolutionslider_slides']['list']['operations']['edit'];
    $edit['icon'] = 'edit.svg';
    $editheader = $GLOBALS['TL_DCA']['tl_revolutionslider_slides']['list']['operations']['editheader'];
    $editheader['icon'] = 'header.svg';
    unset($GLOBALS['TL_DCA']['tl_revolutionslider_slides']['list']['operations']['edit']);
    unset($GLOBALS['TL_DCA']['tl_revolutionslider_slides']['list']['operations']['editheader']);
    \Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_revolutionslider_slides']['list']['operations'], 0, array('editheader' => $editheader));
    \Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_revolutionslider_slides']['list']['operations'], 0, array('edit' => $edit));
}
}
