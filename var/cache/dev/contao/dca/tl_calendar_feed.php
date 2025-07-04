<?php

namespace {
$GLOBALS['TL_DCA']['tl_calendar_feed'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'enableVersioning' => \true, 'markAsCopy' => 'title', 'onload_callback' => array(array('tl_calendar_feed', 'checkPermission'), array('tl_calendar_feed', 'generateFeed')), 'oncreate_callback' => array(array('tl_calendar_feed', 'adjustPermissions')), 'oncopy_callback' => array(array('tl_calendar_feed', 'adjustPermissions')), 'onsubmit_callback' => array(array('tl_calendar_feed', 'scheduleUpdate')), 'sql' => array('keys' => array('id' => 'primary', 'tstamp' => 'index', 'alias' => 'index')), 'backlink' => 'do=calendar'),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_SORTED, 'fields' => array('title'), 'flag' => \Contao\DataContainer::SORT_INITIAL_LETTER_ASC, 'panelLayout' => 'filter;search,limit', 'defaultSearchField' => 'title'), 'label' => array('fields' => array('title'), 'format' => '%s'), 'operations' => array('edit', 'copy' => array('href' => 'act=copy', 'icon' => 'copy.svg', 'button_callback' => array('tl_calendar_feed', 'copyFeed')), 'delete' => array('href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'data-action="contao--scroll-offset#store" onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? \null) . '\'))return false"', 'button_callback' => array('tl_calendar_feed', 'deleteFeed')), 'show')),
    // Palettes
    'palettes' => array('default' => '{title_legend},title,alias,language;{calendars_legend},calendars;{config_legend},format,source,maxItems,feedBase,description;{image_legend:hide},imgSize'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'title' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'alias' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'alias', 'unique' => \true, 'maxlength' => 255, 'tl_class' => 'w50 clr'), 'save_callback' => array(array('tl_calendar_feed', 'checkFeedAlias')), 'sql' => "varchar(255) BINARY NOT NULL default ''"), 'language' => array('search' => \true, 'filter' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 32, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'calendars' => array('search' => \true, 'inputType' => 'checkbox', 'options_callback' => array('tl_calendar_feed', 'getAllowedCalendars'), 'eval' => array('multiple' => \true, 'mandatory' => \true), 'sql' => "blob NULL", 'relation' => array('table' => 'tl_calendar_feed', 'type' => 'hasMany', 'load' => 'lazy')), 'format' => array('filter' => \true, 'inputType' => 'select', 'options' => array('rss' => 'RSS 2.0', 'atom' => 'Atom'), 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default 'rss'"), 'source' => array('inputType' => 'select', 'options' => array('source_teaser', 'source_text'), 'reference' => &$GLOBALS['TL_LANG']['tl_calendar_feed'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default 'source_teaser'"), 'maxItems' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 25"), 'feedBase' => array('search' => \true, 'inputType' => 'text', 'eval' => array('trailingSlash' => \true, 'rgxp' => \Contao\CoreBundle\EventListener\Widget\HttpUrlListener::RGXP_NAME, 'decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50', 'alwaysSave' => \true), 'load_callback' => array(array('tl_calendar_feed', 'addFeedBase')), 'sql' => "varchar(255) NOT NULL default ''"), 'description' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('style' => 'height:60px', 'tl_class' => 'clr'), 'sql' => "text NULL"), 'imgSize' => array('label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'], 'inputType' => 'imageSize', 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('rgxp' => 'natural', 'includeBlankOption' => \true, 'nospace' => \true, 'helpwizard' => \true, 'tl_class' => 'w50'), 'options_callback' => array('contao.listener.image_size_options', '__invoke'), 'sql' => "varchar(255) NOT NULL default ''")),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @property Calendar $Calendar
 *
 * @internal
 */
class tl_calendar_feed extends \Contao\Backend
{
    /**
     * Check permissions to edit table tl_news_archive
     *
     * @throws AccessDeniedException
     */
    public function checkPermission()
    {
        $user = \Contao\BackendUser::getInstance();
        if ($user->isAdmin) {
            return;
        }
        // Set the root IDs
        if (empty($user->calendarfeeds) || !\is_array($user->calendarfeeds)) {
            $root = array(0);
        } else {
            $root = $user->calendarfeeds;
        }
        $GLOBALS['TL_DCA']['tl_calendar_feed']['list']['sorting']['root'] = $root;
        $security = \Contao\System::getContainer()->get('security.helper');
        // Check permissions to add feeds
        if (!$security->isGranted(\Contao\CalendarBundle\Security\ContaoCalendarPermissions::USER_CAN_CREATE_FEEDS)) {
            $GLOBALS['TL_DCA']['tl_calendar_feed']['config']['closed'] = \true;
            $GLOBALS['TL_DCA']['tl_calendar_feed']['config']['notCreatable'] = \true;
            $GLOBALS['TL_DCA']['tl_calendar_feed']['config']['notCopyable'] = \true;
        }
        // Check permissions to delete feeds
        if (!$security->isGranted(\Contao\CalendarBundle\Security\ContaoCalendarPermissions::USER_CAN_DELETE_FEEDS)) {
            $GLOBALS['TL_DCA']['tl_calendar_feed']['config']['notDeletable'] = \true;
        }
        // Check current action
        switch (\Contao\Input::get('act')) {
            case 'select':
                // Allow
                break;
            case 'create':
                if (!$security->isGranted(\Contao\CalendarBundle\Security\ContaoCalendarPermissions::USER_CAN_CREATE_FEEDS)) {
                    throw new \Contao\CoreBundle\Exception\AccessDeniedException('Not enough permissions to create calendar feeds.');
                }
                break;
            case 'edit':
            case 'copy':
            case 'delete':
            case 'show':
                if (!\in_array(\Contao\Input::get('id'), $root) || \Contao\Input::get('act') == 'delete' && !$security->isGranted(\Contao\CalendarBundle\Security\ContaoCalendarPermissions::USER_CAN_DELETE_FEEDS)) {
                    throw new \Contao\CoreBundle\Exception\AccessDeniedException('Not enough permissions to ' . \Contao\Input::get('act') . ' calendar feed ID ' . \Contao\Input::get('id') . '.');
                }
                break;
            case 'editAll':
            case 'deleteAll':
            case 'overrideAll':
            case 'copyAll':
                $objSession = \Contao\System::getContainer()->get('request_stack')->getSession()->getBag('contao_backend');
                $session = $objSession->all();
                if (\Contao\Input::get('act') == 'deleteAll' && !$security->isGranted(\Contao\CalendarBundle\Security\ContaoCalendarPermissions::USER_CAN_DELETE_FEEDS)) {
                    $session['CURRENT']['IDS'] = array();
                } else {
                    $session['CURRENT']['IDS'] = \array_intersect((array) $session['CURRENT']['IDS'], $root);
                }
                $objSession->replace($session);
                break;
            default:
                if (\Contao\Input::get('act')) {
                    throw new \Contao\CoreBundle\Exception\AccessDeniedException('Not enough permissions to ' . \Contao\Input::get('act') . ' calendar feeds.');
                }
                break;
        }
    }
    /**
     * Add the new calendar feed to the permissions
     *
     * @param string|int $insertId
     */
    public function adjustPermissions($insertId)
    {
        // The oncreate_callback passes $insertId as second argument
        if (\func_num_args() == 4) {
            $insertId = \func_get_arg(1);
        }
        $user = \Contao\BackendUser::getInstance();
        if ($user->isAdmin) {
            return;
        }
        // Set root IDs
        if (empty($user->calendarfeeds) || !\is_array($user->calendarfeeds)) {
            $root = array(0);
        } else {
            $root = $user->calendarfeeds;
        }
        // The calendar feed is enabled already
        if (\in_array($insertId, $root)) {
            return;
        }
        $db = \Contao\Database::getInstance();
        $objSessionBag = \Contao\System::getContainer()->get('request_stack')->getSession()->getBag('contao_backend');
        $arrNew = $objSessionBag->get('new_records');
        if (\is_array($arrNew['tl_calendar_feed']) && \in_array($insertId, $arrNew['tl_calendar_feed'])) {
            // Add the permissions on group level
            if ($user->inherit != 'custom') {
                $objGroup = $db->execute("SELECT id, calendarfeeds, calendarfeedp FROM tl_user_group WHERE id IN(" . \implode(',', \array_map('\\intval', $user->groups)) . ")");
                while ($objGroup->next()) {
                    $arrCalendarfeedp = \Contao\StringUtil::deserialize($objGroup->calendarfeedp);
                    if (\is_array($arrCalendarfeedp) && \in_array('create', $arrCalendarfeedp)) {
                        $arrCalendarfeeds = \Contao\StringUtil::deserialize($objGroup->calendarfeeds, \true);
                        $arrCalendarfeeds[] = $insertId;
                        $db->prepare("UPDATE tl_user_group SET calendarfeeds=? WHERE id=?")->execute(\serialize($arrCalendarfeeds), $objGroup->id);
                    }
                }
            }
            // Add the permissions on user level
            if ($user->inherit != 'group') {
                $objUser = $db->prepare("SELECT calendarfeeds, calendarfeedp FROM tl_user WHERE id=?")->limit(1)->execute($user->id);
                $arrCalendarfeedp = \Contao\StringUtil::deserialize($objUser->calendarfeedp);
                if (\is_array($arrCalendarfeedp) && \in_array('create', $arrCalendarfeedp)) {
                    $arrCalendarfeeds = \Contao\StringUtil::deserialize($objUser->calendarfeeds, \true);
                    $arrCalendarfeeds[] = $insertId;
                    $db->prepare("UPDATE tl_user SET calendarfeeds=? WHERE id=?")->execute(\serialize($arrCalendarfeeds), $user->id);
                }
            }
            // Add the new element to the user object
            $root[] = $insertId;
            $user->calendarfeeds = $root;
        }
    }
    /**
     * Return the copy calendar feed button
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
    public function copyFeed($row, $href, $label, $title, $icon, $attributes)
    {
        return \Contao\System::getContainer()->get('security.helper')->isGranted(\Contao\CalendarBundle\Security\ContaoCalendarPermissions::USER_CAN_CREATE_FEEDS) ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . \Contao\StringUtil::specialchars($title) . '"' . $attributes . '>' . \Contao\Image::getHtml($icon, $label) . '</a> ' : \Contao\Image::getHtml(\str_replace('.svg', '--disabled.svg', $icon)) . ' ';
    }
    /**
     * Return the delete calendar feed button
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
    public function deleteFeed($row, $href, $label, $title, $icon, $attributes)
    {
        return \Contao\System::getContainer()->get('security.helper')->isGranted(\Contao\CalendarBundle\Security\ContaoCalendarPermissions::USER_CAN_DELETE_FEEDS) ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . \Contao\StringUtil::specialchars($title) . '"' . $attributes . '>' . \Contao\Image::getHtml($icon, $label) . '</a> ' : \Contao\Image::getHtml(\str_replace('.svg', '--disabled.svg', $icon)) . ' ';
    }
    /**
     * Check for modified calendar feeds and update the XML files if necessary
     */
    public function generateFeed()
    {
        $objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
        $session = $objSession->get('calendar_feed_updater');
        if (empty($session) || !\is_array($session)) {
            return;
        }
        $request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
        if ($request) {
            $origScope = $request->attributes->get('_scope');
            $request->attributes->set('_scope', 'frontend');
        }
        $calendar = new \Contao\Calendar();
        foreach ($session as $id) {
            $calendar->generateFeedsByCalendar($id);
        }
        if ($request) {
            $request->attributes->set('_scope', $origScope);
        }
        $objSession->set('calendar_feed_updater', \null);
    }
    /**
     * Schedule a calendar feed update
     *
     * This method is triggered when a single calendar or multiple calendars
     * are modified (edit/editAll).
     *
     * @param DataContainer $dc
     */
    public function scheduleUpdate(\Contao\DataContainer $dc)
    {
        // Return if there is no ID
        if (!$dc->id) {
            return;
        }
        $objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
        // Store the ID in the session
        $session = $objSession->get('calendar_feed_updater');
        $session[] = $dc->id;
        $objSession->set('calendar_feed_updater', \array_unique($session));
    }
    /**
     * Return the IDs of the allowed calendars as array
     *
     * @return array
     */
    public function getAllowedCalendars()
    {
        $user = \Contao\BackendUser::getInstance();
        if ($user->isAdmin) {
            $objCalendar = \Contao\CalendarModel::findAll();
        } else {
            $objCalendar = \Contao\CalendarModel::findMultipleByIds($user->calendars);
        }
        $return = array();
        if ($objCalendar !== \null) {
            while ($objCalendar->next()) {
                $return[$objCalendar->id] = $objCalendar->title;
            }
        }
        return $return;
    }
    /**
     * Check the RSS-feed alias
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function checkFeedAlias($varValue, \Contao\DataContainer $dc)
    {
        // No change or empty value
        if (!$varValue || $varValue == $dc->value) {
            return $varValue;
        }
        $varValue = \Contao\StringUtil::standardize($varValue);
        // see #5096
        $arrFeeds = (new \Contao\Automator())->purgeXmlFiles(\true);
        // Alias exists
        if (\in_array($varValue, $arrFeeds)) {
            throw new \Exception(\sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
        }
        return $varValue;
    }
    /**
     * Add the RSS-feed base URL
     *
     * @param mixed $varValue
     *
     * @return string
     */
    public function addFeedBase($varValue)
    {
        if (!$varValue) {
            $varValue = \Contao\Environment::get('base');
        }
        return $varValue;
    }
}
}
