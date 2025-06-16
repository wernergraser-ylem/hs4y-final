<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default \'0\'',
  'tstamp' => 'int(10) unsigned NOT NULL default \'0\'',
  'sorting' => 'int(10) unsigned NOT NULL default \'0\'',
  'ptable' => 'varchar(64) NOT NULL default \'\'',
  'Titel_vorangestellt' => 'varchar(255) NOT NULL default \'\'',
  'Vorname' => 'varchar(255) NOT NULL default \'\'',
  'Familienname_Firma' => 'varchar(255) NOT NULL default \'\'',
  'Titel_nachgestellt' => 'varchar(255) NOT NULL default \'\'',
  'Strasse' => 'varchar(255) NOT NULL default \'\'',
  'Hausnummer' => 'varchar(255) NOT NULL default \'\'',
  'PLZ' => 'int(10) unsigned NOT NULL default \'0\'',
  'Wohnort' => 'varchar(255) NOT NULL default \'\'',
  'kundennummer' => 'varchar(255) NOT NULL default \'\'',
  'E_Mail' => 'varchar(255) NOT NULL default \'\'',
  'Handynummer' => 'varchar(255) NOT NULL default \'\'',
  'IMEI_Nummer' => 'varchar(255) NOT NULL default \'\'',
  'IBAN' => 'varchar(255) NOT NULL default \'\'',
  'BIC' => 'varchar(255) NOT NULL default \'\'',
  'Handy_Hersteller' => 'varchar(64) NOT NULL default \'\'',
  'Handytyp' => 'varchar(255) NOT NULL default \'\'',
  'Vertrag' => 'varchar(64) NOT NULL default \'\'',
  'Monatspraemie_Handy' => 'varchar(64) NOT NULL default \'\'',
  'Kaufdatum_Handy' => 'varchar(10) NOT NULL default \'\'',
  'Zusaetzliche_Vereinbarungen_Handy' => 'mediumtext NULL',
  'Vertrag_aktiv_Handy' => 'char(1) NOT NULL default \'\'',
  'Vertrag_DATA' => 'varchar(64) NOT NULL default \'\'',
  'Monatspraemie_DATA' => 'varchar(64) NOT NULL default \'\'',
  'Router_Hersteller' => 'varchar(64) NOT NULL default \'\'',
  'Kaufdatum_Router' => 'varchar(10) NOT NULL default \'\'',
  'Zusaetzliche_Vereinbarungen_DATA' => 'mediumtext NULL',
  'Vertrag_aktiv_DATA' => 'char(1) NOT NULL default \'\'',
  'Vertragstext' => 'mediumtext NULL',
  'Verkaeufer' => 'varchar(64) NOT NULL default \'\'',
  'Vertragstext_Unterschrift' => 'mediumtext NULL',
  'Aktiv_Oeffentlichen' => 'char(1) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
  0 => 'kundennummer',
  1 => 'E_Mail',
);

$this->arrKeys = array (
  'id' => 'primary',
  'pid' => 'index',
  'tstamp' => 'index',
  'sorting' => 'index',
);

$this->arrRelations = array (
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
