<?php

namespace {
$GLOBALS['TL_DCA']['tl_newsletter_recipients'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ptable' => 'tl_newsletter_channel', 'enableVersioning' => \true, 'oncut_callback' => array(array('tl_newsletter_recipients', 'clearOptInData')), 'sql' => array('keys' => array('id' => 'primary', 'pid,email' => 'unique', 'tstamp' => 'index', 'email' => 'index', 'active' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_PARENT, 'fields' => array('email'), 'panelLayout' => 'filter;sort,search,limit', 'defaultSearchField' => 'email', 'headerFields' => array('title', 'jumpTo', 'tstamp', 'sender'), 'child_record_callback' => array('tl_newsletter_recipients', 'listRecipient')), 'global_operations' => array('import' => array('href' => 'key=import', 'class' => 'header_css_import'))),
    // Palettes
    'palettes' => array('default' => '{email_legend},email,active'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('foreignKey' => 'tl_newsletter_channel.title', 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'email' => array('search' => \true, 'sorting' => \true, 'flag' => \Contao\DataContainer::SORT_INITIAL_LETTER_ASC, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'email', 'maxlength' => 255, 'decodeEntities' => \true, 'tl_class' => 'w50'), 'save_callback' => array(array('tl_newsletter_recipients', 'checkUniqueRecipient'), array('tl_newsletter_recipients', 'checkDenyList')), 'sql' => array('type' => 'string', 'length' => 255, 'notnull' => \false)), 'active' => array('toggle' => \true, 'filter' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'addedOn' => array('filter' => \true, 'sorting' => \true, 'flag' => \Contao\DataContainer::SORT_MONTH_DESC, 'eval' => array('rgxp' => 'datim', 'doNotCopy' => \true), 'sql' => "varchar(10) NOT NULL default ''")),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_newsletter_recipients extends \Contao\Backend
{
    /**
     * Set the recipient status to "added manually" if they are moved to another channel
     *
     * @param DataContainer $dc
     */
    public function clearOptInData(\Contao\DataContainer $dc)
    {
        \Contao\Database::getInstance()->prepare("UPDATE tl_newsletter_recipients SET addedOn='' WHERE id=?")->execute($dc->id);
    }
    /**
     * Check if recipients are unique per channel
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function checkUniqueRecipient($varValue, \Contao\DataContainer $dc)
    {
        $objRecipient = \Contao\Database::getInstance()->prepare("SELECT COUNT(*) AS count FROM tl_newsletter_recipients WHERE email=? AND pid=(SELECT pid FROM tl_newsletter_recipients WHERE id=?) AND id!=?")->execute($varValue, $dc->id, $dc->id);
        if ($objRecipient->count > 0) {
            throw new \Exception(\sprintf($GLOBALS['TL_LANG']['ERR']['unique'], $GLOBALS['TL_LANG'][$dc->table][$dc->field][0]));
        }
        return $varValue;
    }
    /**
     * Check if a recipient was added to the deny list for a channel
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function checkDenyList($varValue, \Contao\DataContainer $dc)
    {
        $objDenyList = \Contao\Database::getInstance()->prepare("SELECT COUNT(*) AS count FROM tl_newsletter_deny_list WHERE hash=? AND pid=(SELECT pid FROM tl_newsletter_recipients WHERE id=?) AND id!=?")->execute(\md5($varValue), $dc->id, $dc->id);
        if ($objDenyList->count > 0) {
            throw new \Exception($GLOBALS['TL_LANG']['ERR']['onDenyList']);
        }
        return $varValue;
    }
    /**
     * List a recipient
     *
     * @param array $row
     *
     * @return string
     */
    public function listRecipient($row)
    {
        $label = \Contao\Idna::decodeEmail($row['email']);
        if ($row['addedOn']) {
            $label .= ' <span class="label-info">(' . \sprintf($GLOBALS['TL_LANG']['tl_newsletter_recipients']['subscribed'], \Contao\Date::parse(\Contao\Config::get('datimFormat'), $row['addedOn'])) . ')</span>';
        } else {
            $label .= ' <span class="label-info">(' . $GLOBALS['TL_LANG']['tl_newsletter_recipients']['manually'] . ')</span>';
        }
        $icon = \Contao\Image::getPath('member');
        $icond = \Contao\Image::getPath('member_');
        return \sprintf('<div class="tl_content_left"><div class="list_icon" style="background-image:url(\'%s\')" data-icon="%s" data-icon-disabled="%s">%s</div></div>' . "\n", $row['active'] ? $icon : $icond, $icon, $icond, $label);
    }
}
}
