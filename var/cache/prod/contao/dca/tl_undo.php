<?php

namespace {
$GLOBALS['TL_DCA']['tl_undo'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'closed' => \true, 'notEditable' => \true, 'notCopyable' => \true, 'notDeletable' => \true, 'sql' => array('keys' => array('id' => 'primary', 'pid' => 'index', 'tstamp' => 'index')), 'onload_callback' => array(array('tl_undo', 'adjustDca')), 'onshow_callback' => array(array('tl_undo', 'showDeletedRecords'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_SORTABLE, 'fields' => array('tstamp DESC'), 'panelLayout' => 'filter;sort,search,limit', 'defaultSearchField' => 'data'), 'label' => array('fields' => array('tstamp', 'pid', 'fromTable', 'query')), 'operations' => array('undo' => array('href' => '&amp;act=undo', 'icon' => 'undo.svg'), 'jumpToParent' => array('icon' => 'parent.svg'), 'show')),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('sorting' => \true, 'filter' => \true, 'foreignKey' => 'tl_user.username', 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')), 'tstamp' => array('sorting' => \true, 'flag' => \Contao\DataContainer::SORT_DAY_DESC, 'sql' => "int(10) unsigned NOT NULL default 0"), 'fromTable' => array('sorting' => \true, 'filter' => \true, 'sql' => "varchar(255) NOT NULL default ''"), 'query' => array('sql' => "text NULL"), 'affectedRows' => array('sql' => "smallint(5) unsigned NOT NULL default 0"), 'data' => array('search' => \true, 'eval' => array('doNotShow' => \true), 'sql' => "mediumblob NULL"), 'preview' => array('eval' => array('doNotShow' => \true), 'sql' => "mediumblob NULL")),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_undo extends \Contao\Backend
{
    /**
     * Set the user filter.
     */
    public function adjustDca()
    {
        $user = \Contao\BackendUser::getInstance();
        if ($user->isAdmin) {
            return;
        }
        $GLOBALS['TL_DCA']['tl_undo']['list']['sorting']['filter'][] = array('pid=?', $user->id);
    }
    /**
     * Show the deleted records
     *
     * @param array $data
     * @param array $row
     */
    public function showDeletedRecords($data, $row)
    {
        $arrData = \Contao\StringUtil::deserialize($row['data']);
        foreach ($arrData as $strTable => $arrTableData) {
            \Contao\System::loadLanguageFile($strTable);
            \Contao\Controller::loadDataContainer($strTable);
            foreach ($arrTableData as $arrRow) {
                // Unset fields that are not to be displayed
                foreach ($GLOBALS['TL_DCA'][$strTable]['fields'] ?? array() as $key => $config) {
                    if ($config['eval']['doNotShow'] ?? \false) {
                        unset($arrRow[$key]);
                    }
                }
                $arrBuffer = array();
                foreach ($arrRow as $i => $v) {
                    if (\is_array($array = \Contao\StringUtil::deserialize($v))) {
                        if (isset($array['value'], $array['unit'])) {
                            $v = \trim($array['value'] . ', ' . $array['unit']);
                        } else {
                            if (\array_filter($array, static fn($val) => \is_array($val))) {
                                $v = \Symfony\Component\Yaml\Yaml::dump($array, 1);
                            } else {
                                $v = \substr(\Symfony\Component\Yaml\Yaml::dump($array, 0), 1, -1);
                            }
                        }
                    }
                    $label = \null;
                    // Get the field label
                    if (isset($GLOBALS['TL_DCA'][$strTable]['fields'][$i]['label'])) {
                        $label = \is_array($GLOBALS['TL_DCA'][$strTable]['fields'][$i]['label']) ? $GLOBALS['TL_DCA'][$strTable]['fields'][$i]['label'][0] : $GLOBALS['TL_DCA'][$strTable]['fields'][$i]['label'];
                    } elseif (isset($GLOBALS['TL_LANG']['MSC'][$i])) {
                        $label = \is_array($GLOBALS['TL_LANG']['MSC'][$i]) ? $GLOBALS['TL_LANG']['MSC'][$i][0] : $GLOBALS['TL_LANG']['MSC'][$i];
                    }
                    if (!$label) {
                        $label = '-';
                    }
                    $label .= ' <small>' . $i . '</small>';
                    $arrBuffer[$label] = $v;
                }
                $data[$strTable][] = $arrBuffer;
            }
        }
        return $data;
    }
}
}

namespace {
// Replace the "undo" button href
$GLOBALS['TL_DCA']['tl_undo']['list']['operations']['undo']['button_callback'] = [\Codefog\HasteBundle\UndoManager::class, 'button'];
// Add fields to tl_undo
$GLOBALS['TL_DCA']['tl_undo']['fields']['haste_data'] = ['eval' => ['doNotShow' => \true], 'sql' => ['type' => 'blob', 'notnull' => \false]];
}
