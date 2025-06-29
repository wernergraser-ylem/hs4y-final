<?php

declare(strict_types=1);

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\CoreBundle\EventListener\DataContainer;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\DataContainer;
use Contao\DC_Folder;
use Contao\DC_Table;

/**
 * @internal
 */
#[AsHook('loadDataContainer', priority: 200)]
class DefaultGlobalOperationsListener
{
    public function __invoke(string $table): void
    {
        // Do not add default operations if a DCA was "loaded" that does not exist
        if (!isset($GLOBALS['TL_DCA'][$table])) {
            return;
        }

        $GLOBALS['TL_DCA'][$table]['list']['global_operations'] = $this->getForTable($table);
    }

    private function getForTable(string $table): array
    {
        $dca = $GLOBALS['TL_DCA'][$table]['list']['global_operations'] ?? null;

        if ([] === $dca) {
            return [];
        }

        $defaults = $this->getDefaults($table);

        if (!\is_array($dca)) {
            return $defaults;
        }

        $operations = [];

        foreach ($dca as $k => $v) {
            if (\is_string($v) && isset($defaults[$v])) {
                $operations[$v] = $defaults[$v];
                continue;
            }

            if (!\is_array($v)) {
                continue;
            }

            $operations[$k] = $v;
        }

        // If none of the defined operations are name-only, we append the defaults operations.
        if (!array_filter($dca, static fn ($v, $k) => isset($defaults[$k]) || (\is_string($v) && isset($defaults[$v])), ARRAY_FILTER_USE_BOTH)) {
            // Keeps $operations first in array but does not override it from $defaults
            $operations = array_replace($operations, $defaults, $operations);
        }

        return $operations;
    }

    private function getDefaults(string $table): array
    {
        // Supports DC_Table/DC_Folder and all subclasses (e.g. DC_Multilingual)
        $isDcTable = is_a(DataContainer::getDriverForTable($table), DC_Table::class, true);
        $isDcFolder = is_a(DataContainer::getDriverForTable($table), DC_Folder::class, true);

        if (!$isDcTable && !$isDcFolder) {
            return [];
        }

        $operations = [];

        $hasLimitHeight = ($GLOBALS['TL_DCA'][$table]['list']['sorting']['limitHeight'] ?? null) > 0;
        $isParentMode = DataContainer::MODE_PARENT === ($GLOBALS['TL_DCA'][$table]['list']['sorting']['mode'] ?? null);
        $isTreeMode = DataContainer::MODE_TREE === ($GLOBALS['TL_DCA'][$table]['list']['sorting']['mode'] ?? null);
        $isExtendedTreeMode = DataContainer::MODE_TREE_EXTENDED === ($GLOBALS['TL_DCA'][$table]['list']['sorting']['mode'] ?? null);

        $canEdit = !($GLOBALS['TL_DCA'][$table]['config']['notEditable'] ?? false);
        $canCopy = !($GLOBALS['TL_DCA'][$table]['config']['closed'] ?? false) && !($GLOBALS['TL_DCA'][$table]['config']['notCopyable'] ?? false);
        $canSort = !($GLOBALS['TL_DCA'][$table]['config']['notSortable'] ?? false);
        $canDelete = !($GLOBALS['TL_DCA'][$table]['config']['notDeletable'] ?? false);

        if ($isDcFolder || $isTreeMode || $isExtendedTreeMode) {
            $operations += [
                'toggleNodes' => [
                    'href' => $isDcFolder ? 'tg=all' : 'ptg=all',
                    'class' => 'header_toggle',
                    'attributes' => ' data-contao--toggle-nodes-target="operation" data-action="contao--toggle-nodes#toggleAll keydown@window->contao--toggle-nodes#keypress keyup@window->contao--toggle-nodes#keypress"',
                    'showOnSelect' => true,
                ],
            ];
        } elseif ($hasLimitHeight) {
            $operations += [
                'toggleNodes' => [
                    'button_callback' => static fn () => '<button class="header_toggle" data-contao--limit-height-target="operation" data-action="contao--limit-height#toggleAll keydown@window->contao--limit-height#keypress keyup@window->contao--limit-height#keypress" style="display:none">'.$GLOBALS['TL_LANG']['DCA']['toggleNodes'][0].'</button> ',
                    'showOnSelect' => true,
                ],
            ];
        }

        if ($canEdit || $canCopy || $canDelete || ($canSort && ($isParentMode || $isTreeMode || $isExtendedTreeMode))) {
            $operations += [
                'all' => [
                    'href' => 'act=select',
                    'class' => 'header_edit_all',
                    'attributes' => 'data-action="contao--scroll-offset#store" accesskey="e"',
                ],
            ];
        }

        return $operations;
    }
}
