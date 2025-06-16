<?php

namespace {
$GLOBALS['TL_DCA']['tl_comments'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'enableVersioning' => \true, 'closed' => \true, 'notCopyable' => \true, 'onload_callback' => array(array('tl_comments', 'checkPermission')), 'onsubmit_callback' => array(array('tl_comments', 'notifyOfReply')), 'oninvalidate_cache_tags_callback' => array(array('tl_comments', 'invalidateSourceCacheTags')), 'sql' => array('keys' => array('id' => 'primary', 'published' => 'index', 'source,parent,published' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_SORTABLE, 'fields' => array('date'), 'panelLayout' => 'filter;sort,search,limit', 'defaultSearchField' => 'comment', 'limitHeight' => 104), 'label' => array('fields' => array('name'), 'format' => '%s', 'label_callback' => array('tl_comments', 'listComments')), 'operations' => array('edit' => array('href' => 'act=edit', 'icon' => 'edit.svg', 'button_callback' => array('tl_comments', 'editComment')), 'delete' => array('href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'data-action="contao--scroll-offset#store" onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? \null) . '\'))return false"', 'button_callback' => array('tl_comments', 'deleteComment')), 'toggle' => array('href' => 'act=toggle&amp;field=published', 'icon' => 'visible.svg', 'button_callback' => array('tl_comments', 'toggleIcon')), 'show')),
    // Palettes
    'palettes' => array('__selector__' => array('addReply'), 'default' => '{author_legend},name,member,email,website;{comment_legend},comment;{reply_legend},addReply;{publish_legend},published'),
    // Sub-palettes
    'subpalettes' => array('addReply' => 'author,reply'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'source' => array('filter' => \true, 'reference' => &$GLOBALS['TL_LANG']['tl_comments'], 'sql' => "varchar(32) NOT NULL default ''"), 'parent' => array('filter' => \true, 'sql' => "int(10) unsigned NOT NULL default 0"), 'date' => array('sorting' => \true, 'filter' => \true, 'flag' => \Contao\DataContainer::SORT_MONTH_DESC, 'eval' => array('rgxp' => 'datim'), 'sql' => "varchar(64) NOT NULL default ''"), 'name' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 64, 'tl_class' => 'w50'), 'sql' => "varchar(64) NOT NULL default ''"), 'email' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'rgxp' => 'email', 'decodeEntities' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'website' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 128, 'rgxp' => \Contao\CoreBundle\EventListener\Widget\HttpUrlListener::RGXP_NAME, 'decodeEntities' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(128) NOT NULL default ''"), 'member' => array('inputType' => 'select', 'foreignKey' => 'tl_member.CONCAT(firstname," ",lastname)', 'eval' => array('chosen' => \true, 'doNotCopy' => \true, 'includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')), 'comment' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('mandatory' => \true, 'rte' => 'tinyMCE'), 'sql' => "text NULL"), 'addReply' => array('filter' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'author' => array('default' => static fn() => \Contao\BackendUser::getInstance()->id, 'inputType' => 'select', 'foreignKey' => 'tl_user.name', 'eval' => array('mandatory' => \true, 'chosen' => \true, 'doNotCopy' => \true, 'includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')), 'reply' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr'), 'sql' => "text NULL"), 'published' => array('toggle' => \true, 'filter' => \true, 'sorting' => \true, 'inputType' => 'checkbox', 'eval' => array('doNotCopy' => \true), 'save_callback' => array(array('tl_comments', 'sendNotifications')), 'sql' => array('type' => 'boolean', 'default' => \false)), 'ip' => array('sql' => "varchar(64) NOT NULL default ''"), 'notified' => array('sql' => array('type' => 'boolean', 'default' => \false)), 'notifiedReply' => array('sql' => array('type' => 'boolean', 'default' => \false))),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_comments extends \Contao\Backend
{
    /**
     * Check permissions to edit table tl_comments
     *
     * @throws AccessDeniedException
     */
    public function checkPermission()
    {
        switch (\Contao\Input::get('act')) {
            case 'select':
            case 'show':
                // Allow
                break;
            case 'edit':
            case 'delete':
            case 'toggle':
                $objComment = \Contao\Database::getInstance()->prepare("SELECT id, parent, source FROM tl_comments WHERE id=?")->limit(1)->execute(\Contao\Input::get('id'));
                if ($objComment->numRows < 1) {
                    throw new \Contao\CoreBundle\Exception\AccessDeniedException('Invalid comment ID ' . \Contao\Input::get('id') . '.');
                }
                if (!$this->isAllowedToEditComment($objComment->parent, $objComment->source)) {
                    throw new \Contao\CoreBundle\Exception\AccessDeniedException('Not enough permissions to ' . \Contao\Input::get('act') . ' comment ID ' . \Contao\Input::get('id') . ' (parent element: ' . $objComment->source . ' ID ' . $objComment->parent . ').');
                }
                break;
            case 'editAll':
            case 'deleteAll':
            case 'overrideAll':
                $objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
                $session = $objSession->all();
                if (empty($session['CURRENT']['IDS']) || !\is_array($session['CURRENT']['IDS'])) {
                    break;
                }
                $objComment = \Contao\Database::getInstance()->execute("SELECT id, parent, source FROM tl_comments WHERE id IN(" . \implode(',', \array_map('\\intval', $session['CURRENT']['IDS'])) . ")");
                while ($objComment->next()) {
                    if (!$this->isAllowedToEditComment($objComment->parent, $objComment->source) && ($key = \array_search($objComment->id, $session['CURRENT']['IDS'])) !== \false) {
                        unset($session['CURRENT']['IDS'][$key]);
                    }
                }
                $session['CURRENT']['IDS'] = \array_values($session['CURRENT']['IDS']);
                $objSession->replace($session);
                break;
            default:
                if (\Contao\Input::get('act')) {
                    throw new \Contao\CoreBundle\Exception\AccessDeniedException('Invalid command "' . \Contao\Input::get('act') . '.');
                }
                break;
        }
    }
    /**
     * Notify subscribers of a reply
     *
     * @param DataContainer $dc
     */
    public function notifyOfReply(\Contao\DataContainer $dc)
    {
        // Return if there is no active record (override all) or no reply or the notification has been sent already
        if (!$dc->activeRecord?->addReply || $dc->activeRecord->notifiedReply) {
            return;
        }
        $objNotify = \Contao\CommentsNotifyModel::findActiveBySourceAndParent($dc->activeRecord->source, $dc->activeRecord->parent);
        if ($objNotify !== \null) {
            $baseUrl = \Contao\Idna::decode(\Contao\Environment::get('base'));
            while ($objNotify->next()) {
                // Prepare the URL
                $strUrl = \Contao\CoreBundle\Util\UrlUtil::makeAbsolute($objNotify->url, $baseUrl);
                $objEmail = new \Contao\Email();
                $objEmail->from = $GLOBALS['TL_ADMIN_EMAIL'] ?? \null;
                $objEmail->fromName = $GLOBALS['TL_ADMIN_NAME'] ?? \null;
                $objEmail->subject = \sprintf($GLOBALS['TL_LANG']['MSC']['com_notifyReplySubject'], \Contao\Idna::decode(\Contao\Environment::get('host')));
                $objEmail->text = \sprintf($GLOBALS['TL_LANG']['MSC']['com_notifyReplyMessage'], $objNotify->name, $strUrl . '#c' . $dc->id, $strUrl . '?token=' . $objNotify->tokenRemove);
                $objEmail->sendTo($objNotify->email);
            }
        }
        \Contao\Database::getInstance()->prepare("UPDATE tl_comments SET notifiedReply=1 WHERE id=?")->execute($dc->id);
    }
    /**
     * Check whether the user is allowed to edit a comment
     *
     * @param integer $intParent
     * @param string  $strSource
     *
     * @return boolean
     */
    protected function isAllowedToEditComment($intParent, $strSource)
    {
        if (\Contao\BackendUser::getInstance()->isAdmin) {
            return \true;
        }
        static $cache = array();
        $strKey = __METHOD__ . '-' . $strSource . '-' . $intParent;
        // Load cached result
        if (isset($cache[$strKey])) {
            return $cache[$strKey];
        }
        // Order deny,allow
        $cache[$strKey] = \false;
        $security = \Contao\System::getContainer()->get('security.helper');
        switch ($strSource) {
            case 'tl_content':
                $objPage = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_page WHERE id=(SELECT pid FROM tl_article WHERE id=(SELECT pid FROM tl_content WHERE id=?))")->limit(1)->execute($intParent);
                // Do not check whether the page is mounted (see #5174)
                if ($objPage->numRows > 0 && $security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_EDIT_ARTICLES, $objPage->row())) {
                    $cache[$strKey] = \true;
                }
                break;
            case 'tl_page':
                $objPage = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_page WHERE id=?")->limit(1)->execute($intParent);
                // Do not check whether the page is mounted (see #5174)
                if ($objPage->numRows > 0 && $security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_EDIT_PAGE, $objPage->row())) {
                    $cache[$strKey] = \true;
                }
                break;
            case 'tl_news':
                $objArchive = \Contao\Database::getInstance()->prepare("SELECT pid FROM tl_news WHERE id=?")->limit(1)->execute($intParent);
                // Do not check the access to the news module (see #5174)
                if ($objArchive->numRows > 0 && $security->isGranted(\Contao\NewsBundle\Security\ContaoNewsPermissions::USER_CAN_EDIT_ARCHIVE, $objArchive->pid)) {
                    $cache[$strKey] = \true;
                }
                break;
            case 'tl_calendar_events':
                $objCalendar = \Contao\Database::getInstance()->prepare("SELECT pid FROM tl_calendar_events WHERE id=?")->limit(1)->execute($intParent);
                // Do not check the access to the calendar module (see #5174)
                if ($objCalendar->numRows > 0 && $security->isGranted(\Contao\CalendarBundle\Security\ContaoCalendarPermissions::USER_CAN_EDIT_CALENDAR, $objCalendar->pid)) {
                    $cache[$strKey] = \true;
                }
                break;
            case 'tl_faq':
                // Do not check access to the FAQ module (see #5174)
                $cache[$strKey] = \true;
                break;
            default:
                // HOOK: support custom modules
                if (isset($GLOBALS['TL_HOOKS']['isAllowedToEditComment']) && \is_array($GLOBALS['TL_HOOKS']['isAllowedToEditComment'])) {
                    foreach ($GLOBALS['TL_HOOKS']['isAllowedToEditComment'] as $callback) {
                        if (\Contao\System::importStatic($callback[0])->{$callback[1]}($intParent, $strSource) === \true) {
                            $cache[$strKey] = \true;
                            break;
                        }
                    }
                }
                break;
        }
        return $cache[$strKey];
    }
    /**
     * Send out the new comment notifications
     *
     * @param mixed $varValue
     *
     * @return mixed
     */
    public function sendNotifications($varValue)
    {
        if ($varValue && ($id = \Contao\Input::get('id'))) {
            \Contao\Comments::notifyCommentsSubscribers(\Contao\CommentsModel::findById($id));
        }
        return $varValue;
    }
    /**
     * List a particular record
     *
     * @param array $arrRow
     *
     * @return string
     */
    public function listComments($arrRow)
    {
        $router = \Contao\System::getContainer()->get('router');
        $title = $GLOBALS['TL_LANG']['tl_comments'][$arrRow['source']] . ' ' . $arrRow['parent'];
        switch ($arrRow['source']) {
            case 'tl_content':
                $objParent = \Contao\Database::getInstance()->prepare("SELECT id, title FROM tl_article WHERE id=(SELECT pid FROM tl_content WHERE id=?)")->execute($arrRow['parent']);
                if ($objParent->numRows) {
                    $title .= ' – <a href="' . \Contao\StringUtil::specialcharsUrl($router->generate('contao_backend', array('do' => 'article', 'table' => 'tl_content', 'id' => $objParent->id))) . '">' . $objParent->title . '</a>';
                }
                break;
            case 'tl_page':
                $objParent = \Contao\Database::getInstance()->prepare("SELECT id, title FROM tl_page WHERE id=?")->execute($arrRow['parent']);
                if ($objParent->numRows) {
                    $title .= ' – <a href="' . \Contao\StringUtil::specialcharsUrl($router->generate('contao_backend', array('do' => 'page', 'act' => 'edit', 'id' => $objParent->id))) . '">' . $objParent->title . '</a>';
                }
                break;
            case 'tl_news':
                $objParent = \Contao\Database::getInstance()->prepare("SELECT id, headline FROM tl_news WHERE id=?")->execute($arrRow['parent']);
                if ($objParent->numRows) {
                    $title .= ' – <a href="' . \Contao\StringUtil::specialcharsUrl($router->generate('contao_backend', array('do' => 'news', 'table' => 'tl_news', 'act' => 'edit', 'id' => $objParent->id))) . '">' . $objParent->headline . '</a>';
                }
                break;
            case 'tl_faq':
                $objParent = \Contao\Database::getInstance()->prepare("SELECT id, question FROM tl_faq WHERE id=?")->execute($arrRow['parent']);
                if ($objParent->numRows) {
                    $title .= ' – <a href="' . \Contao\StringUtil::specialcharsUrl($router->generate('contao_backend', array('do' => 'faq', 'table' => 'tl_faq', 'act' => 'edit', 'id' => $objParent->id))) . '">' . $objParent->question . '</a>';
                }
                break;
            case 'tl_calendar_events':
                $objParent = \Contao\Database::getInstance()->prepare("SELECT id, title FROM tl_calendar_events WHERE id=?")->execute($arrRow['parent']);
                if ($objParent->numRows) {
                    $title .= ' – <a href="' . \Contao\StringUtil::specialcharsUrl($router->generate('contao_backend', array('do' => 'calendar', 'table' => 'tl_calendar_events', 'act' => 'edit', 'id' => $objParent->id))) . '">' . $objParent->title . '</a>';
                }
                break;
            default:
                // HOOK: support custom modules
                if (isset($GLOBALS['TL_HOOKS']['listComments']) && \is_array($GLOBALS['TL_HOOKS']['listComments'])) {
                    foreach ($GLOBALS['TL_HOOKS']['listComments'] as $callback) {
                        if ($tmp = \Contao\System::importStatic($callback[0])->{$callback[1]}($arrRow)) {
                            $title .= $tmp;
                            break;
                        }
                    }
                }
                break;
        }
        $key = ($arrRow['published'] ? 'published' : 'unpublished') . ($arrRow['addReply'] ? ' replied' : '');
        return '
<div class="cte_type ' . $key . '"><a href="mailto:' . \Contao\Idna::decodeEmail($arrRow['email']) . '" title="' . \Contao\StringUtil::specialchars(\Contao\Idna::decodeEmail($arrRow['email'])) . '">' . $arrRow['name'] . '</a>' . ($arrRow['website'] ? ' (<a href="' . $arrRow['website'] . '" title="' . \Contao\StringUtil::specialchars($arrRow['website']) . '" target="_blank" rel="noreferrer noopener">' . $GLOBALS['TL_LANG']['MSC']['com_website'] . '</a>)' : '') . ' – ' . \Contao\Date::parse(\Contao\Config::get('datimFormat'), $arrRow['date']) . ' – IP ' . \Contao\StringUtil::specialchars($arrRow['ip']) . '<br>' . $title . '</div>
<div class="cte_preview">
' . $arrRow['comment'] . '
</div>' . "\n    ";
    }
    /**
     * Return the edit comment button
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
    public function editComment($row, $href, $label, $title, $icon, $attributes)
    {
        return $this->isAllowedToEditComment($row['parent'], $row['source']) ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . \Contao\StringUtil::specialchars($title) . '"' . $attributes . '>' . \Contao\Image::getHtml($icon, $label) . '</a> ' : \Contao\Image::getHtml(\str_replace('.svg', '--disabled.svg', $icon)) . ' ';
    }
    /**
     * Return the delete comment button
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
    public function deleteComment($row, $href, $label, $title, $icon, $attributes)
    {
        return $this->isAllowedToEditComment($row['parent'], $row['source']) ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . \Contao\StringUtil::specialchars($title) . '"' . $attributes . '>' . \Contao\Image::getHtml($icon, $label) . '</a> ' : \Contao\Image::getHtml(\str_replace('.svg', '--disabled.svg', $icon)) . ' ';
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
        // Check permissions AFTER checking the tid, so hacking attempts are logged
        if (!\Contao\System::getContainer()->get('security.helper')->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_EDIT_FIELD_OF_TABLE, 'tl_comments::published')) {
            return '';
        }
        $href .= '&amp;id=' . $row['id'];
        if (!$row['published']) {
            $icon = 'invisible.svg';
        }
        if (!$this->isAllowedToEditComment($row['parent'], $row['source'])) {
            return \Contao\Image::getHtml($icon) . ' ';
        }
        $titleDisabled = \is_array($GLOBALS['TL_DCA']['tl_comments']['list']['operations']['toggle']['label']) && isset($GLOBALS['TL_DCA']['tl_comments']['list']['operations']['toggle']['label'][2]) ? \sprintf($GLOBALS['TL_DCA']['tl_comments']['list']['operations']['toggle']['label'][2], $row['id']) : $title;
        return '<a href="' . $this->addToUrl($href) . '" title="' . \Contao\StringUtil::specialchars($row['published'] ? $title : $titleDisabled) . '" data-title="' . \Contao\StringUtil::specialchars($title) . '" data-title-disabled="' . \Contao\StringUtil::specialchars($titleDisabled) . '" data-action="contao--scroll-offset#store" onclick="return AjaxRequest.toggleField(this,true)">' . \Contao\Image::getHtml($icon, $label, 'data-icon="visible.svg" data-icon-disabled="invisible.svg" data-state="' . ($row['published'] ? 1 : 0) . '"') . '</a> ';
    }
    /**
     * Adds the cache invalidation tags for the source.
     *
     * @param DataContainer $dc
     * @param array         $tags
     *
     * @return array
     */
    public function invalidateSourceCacheTags(\Contao\DataContainer $dc, array $tags)
    {
        $commentModel = \Contao\CommentsModel::findById($dc->id);
        if (\null !== $commentModel) {
            \Contao\Controller::loadDataContainer($commentModel->source);
            $tags[] = \sprintf('contao.db.%s.%s', $commentModel->source, $commentModel->parent);
            $dc->addPtableTags($commentModel->source, $commentModel->parent, $tags);
        }
        return $tags;
    }
}
}
