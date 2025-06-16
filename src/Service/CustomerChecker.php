<?php

namespace App\Service;

use Doctrine\DBAL\Connection;

class CustomerChecker
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Prüft, ob Kunde anhand E-Mail bereits existiert
     */
    public function customerExistsByEmail(string $email): ?array
    {
        $sql = "SELECT id, kundennummer, vorname, familienname_firma, e_mail 
                FROM cc_hs4y_salzburg 
                WHERE e_mail = ? 
                LIMIT 1";

        $result = $this->connection->fetchAssociative($sql, [$email]);

        return $result ?: null;
    }

    /**
     * Sucht Kunden nach verschiedenen Kriterien
     */
    public function searchCustomers(string $searchTerm): array
    {
        $searchPattern = '%' . $searchTerm . '%';

        $sql = "SELECT id, kundennummer, vorname, familienname_firma, e_mail, telefonnummer
                FROM cc_hs4y_salzburg 
                WHERE kundennummer LIKE ? 
                   OR vorname LIKE ? 
                   OR familienname_firma LIKE ? 
                   OR e_mail LIKE ?
                ORDER BY kundennummer 
                LIMIT 10";

        return $this->connection->fetchAllAssociative($sql, [
            $searchPattern,
            $searchPattern,
            $searchPattern,
            $searchPattern
        ]);
    }
}