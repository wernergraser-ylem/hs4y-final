<?php

declare(strict_types=1);

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\CoreBundle\Migration\Version500;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Contao\StringUtil;
use Doctrine\DBAL\Connection;

abstract class AbstractOrderFieldMigration extends AbstractMigration
{
    public function __construct(private readonly Connection $connection)
    {
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        foreach ($this->getTableFields() as $table => $fields) {
            if (!$schemaManager->tablesExist($table)) {
                continue;
            }

            $columns = $schemaManager->listTableColumns($table);

            foreach ($fields as $orderField => $field) {
                if (isset($columns[strtolower($orderField)], $columns[strtolower($field)])) {
                    return true;
                }
            }
        }

        return false;
    }

    public function run(): MigrationResult
    {
        $schemaManager = $this->connection->createSchemaManager();

        foreach ($this->getTableFields() as $table => $fields) {
            if (!$schemaManager->tablesExist($table)) {
                continue;
            }

            $columns = $schemaManager->listTableColumns($table);

            foreach ($fields as $orderField => $field) {
                if (isset($columns[strtolower($orderField)], $columns[strtolower($field)])) {
                    $this->migrateOrderField($table, $orderField, $field);
                }
            }
        }

        return $this->createResult(true);
    }

    /**
     * The array key should be a table name, containing an array with order field as
     * key, and value field as value.
     *
     * @return array<string, array<string, string>>
     */
    abstract protected function getTableFields(): array;

    private function migrateOrderField(string $table, string $orderField, string $field): void
    {
        $tableQuoted = $this->connection->quoteIdentifier($table);
        $orderFieldQuoted = $this->connection->quoteIdentifier($orderField);
        $fieldQuoted = $this->connection->quoteIdentifier($field);

        $rows = $this->connection->fetchAllAssociative("
            SELECT
                $orderFieldQuoted, $fieldQuoted
            FROM
                $tableQuoted
            WHERE
                $orderFieldQuoted IS NOT NULL
                AND $orderFieldQuoted != ''
                AND $fieldQuoted IS NOT NULL
                AND $fieldQuoted != ''
        ");

        foreach ($rows as $row) {
            $items = array_values(array_unique([
                ...StringUtil::deserialize($row[$orderField], true),
                ...StringUtil::deserialize($row[$field], true),
            ]));

            $this->connection->executeStatement(
                "
                    UPDATE $tableQuoted
                    SET $fieldQuoted = :items, $orderFieldQuoted = ''
                    WHERE $fieldQuoted = :field AND $orderFieldQuoted = :orderField
                ",
                [
                    'items' => serialize($items),
                    'field' => $row[$field],
                    'orderField' => $row[$orderField],
                ],
            );
        }

        $this->connection->executeStatement("ALTER TABLE $tableQuoted DROP $orderFieldQuoted");
    }
}
