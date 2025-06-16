<?php 
 // CustomCatalog (id=2) DCA for table [cc_hs4y_salzburg]
$GLOBALS['TL_DCA']['cc_hs4y_salzburg'] = array (
  'config' => 
  array (
    'dataContainer' => 'Contao\\DC_Table',
    'enableVersioning' => true,
    'sql' => 
    array (
      'keys' => 
      array (
        'id' => 'primary',
        'pid' => 'index',
        'tstamp' => 'index',
        'sorting' => 'index',
      ),
    ),
    'onload_callback' => 
    array (
      'generalLoadCallback' => 
      array (
        0 => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper',
        1 => 'generalLoadCallback',
      ),
    ),
    'onsubmit_callback' => 
    array (
      'generalSubmitCallback' => 
      array (
        0 => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper',
        1 => 'generalSubmitCallback',
      ),
    ),
    'ondelete_callback' => 
    array (
      'generalDeleteCallback' => 
      array (
        0 => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper',
        1 => 'generalDeleteCallback',
      ),
    ),
    'oncut_callback' => 
    array (
      'generalCutCallback' => 
      array (
        0 => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper',
        1 => 'generalCutCallback',
      ),
    ),
    'oncopy_callback' => 
    array (
      'generalCopyCallback' => 
      array (
        0 => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper',
        1 => 'generalCopyCallback',
      ),
    ),
    'oncreate_callback' => 
    array (
      'generalCreateCallback' => 
      array (
        0 => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper',
        1 => 'generalCreateCallback',
      ),
    ),
  ),
  'list' => 
  array (
    'sorting' => 
    array (
      'mode' => '1',
      'fields' => 
      array (
        0 => 'Kaufdatum_Handy',
      ),
      'headerFields' => 
      array (
        0 => 'id',
      ),
      'panelLayout' => 'filter;sort;search,limit',
      'flag' => '6',
    ),
    'label' => 
    array (
      'fields' => 
      array (
        0 => 'Familienname_Firma',
        1 => 'Verkaeufer',
      ),
      'format' => '%s',
      'label_callback' => 
      array (
        0 => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper',
        1 => 'generateListLabels',
      ),
    ),
    'global_operations' => 
    array (
      'all' => 
      array (
        'label' => 
        array (
          0 => 'Mehrere bearbeiten',
          1 => 'Mehrere Elemente auf einmal bearbeiten',
        ),
        'href' => 'act=select',
        'class' => 'header_edit_all',
        'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"',
      ),
    ),
    'operations' => 
    array (
      'edit' => 
      array (
        'label' => 
        array (
          0 => 'Element %s bearbeiten',
          1 => 'Das Element %s bearbeiten',
        ),
        'href' => 'act=edit',
        'icon' => 'edit.svg',
        'button_callback' => 
        array (
          0 => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper',
          1 => 'getEditButton',
        ),
      ),
      'copy' => 
      array (
        'label' => 
        array (
          0 => 'Element kopieren',
          1 => 'Element ID %s kopieren',
        ),
        'href' => 'act=copy',
        'icon' => 'copy.svg',
      ),
      'delete' => 
      array (
        'label' => 
        array (
          0 => 'Element entfernen',
          1 => 'Element ID %s entfernen',
        ),
        'href' => 'act=delete',
        'icon' => 'delete.svg',
        'attributes' => 'onclick="if(!confirm(\'Soll das Element ID %s wirklich gelöscht werden?\'))return false;Backend.getScrollOffset()"',
        'button_callback' => 
        array (
          0 => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper',
          1 => 'getDeleteButton',
        ),
      ),
      'show' => 
      array (
        'label' => 
        array (
          0 => 'Details',
          1 => 'Details des Elements ID %s anzeigen',
        ),
        'href' => 'act=show',
        'icon' => 'show.svg',
      ),
    ),
  ),
  'palettes' => 
  array (
    '__selector__' => 
    array (
    ),
    'default' => '{name_firma_legend},Titel_vorangestellt,Vorname,Familienname_Firma,Titel_nachgestellt;{adresse_legend},Strasse,Hausnummer,PLZ,Wohnort;{kundendaten_legend},kundennummer,E_Mail,Handynummer,IMEI_Nummer,IBAN,BIC;{vertragsdaten_handyservice4you_legend},Handy_Hersteller,Handytyp,Vertrag,Monatspraemie_Handy,Kaufdatum_Handy,Zusaetzliche_Vereinbarungen_Handy,Vertrag_aktiv_Handy;{vertragsdaten_data_legend},Vertrag_DATA,Monatspraemie_DATA,Router_Hersteller,Kaufdatum_Router,Zusaetzliche_Vereinbarungen_DATA,Vertrag_aktiv_DATA;{verkäufer_legend},Vertragstext,Verkaeufer,Vertragstext_Unterschrift;{kunde_veröffentlichen_legend},Aktiv_Oeffentlichen;',
  ),
  'subpalettes' => 
  array (
  ),
  'fields' => 
  array (
    'id' => 
    array (
      'eval' => 
      array (
        'doNotCopy' => true,
      ),
      'sql' => 'int(10) unsigned NOT NULL auto_increment',
    ),
    'pid' => 
    array (
      'sql' => 'int(10) unsigned NOT NULL default \'0\'',
    ),
    'tstamp' => 
    array (
      'eval' => 
      array (
        'doNotCopy' => true,
      ),
      'sql' => 'int(10) unsigned NOT NULL default \'0\'',
    ),
    'sorting' => 
    array (
      'sql' => 'int(10) unsigned NOT NULL default \'0\'',
    ),
    'ptable' => 
    array (
      'sql' => 'varchar(64) NOT NULL default \'\'',
    ),
    'Titel_vorangestellt' => 
    array (
      'label' => 
      array (
        0 => 'Vorangestellter Titel',
        1 => 'Bitte gib den akademischen Titel ein: Dr. Alex Muster',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'Vorname' => 
    array (
      'label' => 
      array (
        0 => 'Vorname',
        1 => 'Bitte gib den Vornamen deines Kunden an.',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
      'sorting' => true,
    ),
    'Familienname_Firma' => 
    array (
      'label' => 
      array (
        0 => 'Familienname/Firma',
        1 => 'Bitte gib den Familiennamen oder den Firmennamen ein.',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
      'search' => true,
      'sorting' => true,
    ),
    'Titel_nachgestellt' => 
    array (
      'label' => 
      array (
        0 => 'Nachgestellter Titel',
        1 => 'Bitte gib den nachgestellten Titel, hinter dem Namen ein. z.B. Alex Muster, MBA',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'Strasse' => 
    array (
      'label' => 
      array (
        0 => 'Straße',
        1 => 'Bitte gib die Straße ein',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50 clr',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'Hausnummer' => 
    array (
      'label' => 
      array (
        0 => 'Hausnummer',
        1 => 'Bitte gib die Hausnummer ein.',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'PLZ' => 
    array (
      'label' => 
      array (
        0 => 'PLZ',
        1 => 'Bitte gib die Postleitzahl an',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'minlength' => 4,
        'maxlength' => 4,
        'tl_class' => 'w50',
      ),
      'sql' => 'int(10) unsigned NOT NULL default \'0\'',
      'save_callback' => 
      array (
        0 => 
        array (
          0 => 'PCT\\CustomElements\\Attributes\\Number',
          1 => 'checkMinAndMaxValue',
        ),
      ),
    ),
    'Wohnort' => 
    array (
      'label' => 
      array (
        0 => 'Wohnort',
        1 => 'Bitte gib den Wohnort des Kunden an',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'kundennummer' => 
    array (
      'label' => 
      array (
        0 => 'kundennummer',
        1 => 'Kundennummer',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'unique' => '1',
        'tl_class' => 'long',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'E_Mail' => 
    array (
      'label' => 
      array (
        0 => 'E-Mail',
        1 => 'Bitte gib die E-Mail-Adresse des Kunden ein',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'unique' => '1',
        'tl_class' => 'w50 clr',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'Handynummer' => 
    array (
      'label' => 
      array (
        0 => 'Handynummer',
        1 => 'Bitte gib die Handynummer deines Kunden ein',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50 clr',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'IMEI_Nummer' => 
    array (
      'label' => 
      array (
        0 => 'IMEI-Nummer',
        1 => 'Bitte gib die IMEI-Nummer deines Mobilgeräts oder Routers ein.',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50 clr',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'IBAN' => 
    array (
      'label' => 
      array (
        0 => 'IBAN',
        1 => 'Bitte gib den IBAN des Kunden ein.',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50 clr',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'BIC' => 
    array (
      'label' => 
      array (
        0 => 'BIC',
        1 => 'Hier kannst du optional den BIC des Kunden angeben',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'Handy_Hersteller' => 
    array (
      'label' => 
      array (
        0 => 'Telefon Marke',
        1 => 'Bitte wähle den Telefonhersteller aus',
      ),
      'exclude' => true,
      'inputType' => 'select',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'chosen' => true,
      ),
      'options' => 
      array (
        0 => '–– bitte auswählen ––',
        1 => 'Apple',
        2 => 'Google',
        3 => 'Huawei',
        4 => 'LG',
        5 => 'Motorola',
        6 => 'Samsung',
        7 => 'VIVO',
        8 => 'Xiaomi',
        9 => 'Anderer Hersteller',
      ),
      'sql' => 'varchar(64) NOT NULL default \'\'',
      'reference' => 
      array (
        '–– bitte auswählen ––' => '–– bitte auswählen ––',
        'Apple' => 'Apple',
        'Google' => 'Google',
        'Huawei' => 'Huawei',
        'LG' => 'LG',
        'Motorola' => 'Motorola',
        'Samsung' => 'Samsung',
        'VIVO' => 'VIVO',
        'Xiaomi' => 'Xiaomi',
        'Anderer Hersteller' => 'Anderer Hersteller',
      ),
    ),
    'Handytyp' => 
    array (
      'label' => 
      array (
        0 => 'Handytyp',
        1 => 'Bitte gib den Handytyp an (z. B. Samsung Galaxy S23)',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50 clr',
        'decodeEntities' => true,
      ),
      'sql' => 'varchar(255) NOT NULL default \'\'',
    ),
    'Vertrag' => 
    array (
      'label' => 
      array (
        0 => 'Vertrag',
        1 => 'Bitte gib an, welchen Vertrag der Kunde hat',
      ),
      'exclude' => true,
      'inputType' => 'select',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'chosen' => true,
      ),
      'options' => 
      array (
        0 => '–',
        1 => 'Silver-Handy',
        2 => 'Gold-Handy',
        3 => 'Gold-Handy',
      ),
      'sql' => 'varchar(64) NOT NULL default \'\'',
      'reference' => 
      array (
        '–' => '–',
        'Silver-Handy' => 'Silver-Handy',
        'Gold-Handy' => 'Platin-Handy',
      ),
      'search' => true,
    ),
    'Monatspraemie_Handy' => 
    array (
      'label' => 
      array (
        0 => 'Monatsprämie',
        1 => 'Bitte wähle die Monatsprämie des Vertrags aus.',
      ),
      'exclude' => true,
      'inputType' => 'select',
      'eval' => 
      array (
        'tl_class' => 'w50 clr',
        'chosen' => true,
      ),
      'options' => 
      array (
        0 => '–',
        1 => '€ 5,90',
        2 => '€ 8,90',
        3 => '€ 12,90',
      ),
      'sql' => 'varchar(64) NOT NULL default \'\'',
      'reference' => 
      array (
        '–' => '–',
        '€ 5,90' => '€ 5,90',
        '€ 8,90' => '€ 8,90',
        '€ 12,90' => '€ 12,90',
      ),
    ),
    'Kaufdatum_Handy' => 
    array (
      'label' => 
      array (
        0 => 'Kaufdatum Handy',
        1 => 'Bitte gib das nachgewiesene Kaufdatum im Format TT.MM.JJ ein',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50 wizard',
        'datepicker' => true,
        'rgxp' => 'date',
      ),
      'sql' => 'varchar(10) NOT NULL default \'\'',
      'filter' => true,
      'search' => true,
      'sorting' => true,
      'flag' => 7,
    ),
    'Zusaetzliche_Vereinbarungen_Handy' => 
    array (
      'label' => 
      array (
        0 => 'Zusätzliche Vereinbarungen',
        1 => 'Bitte gib optional zusätzliche Vereinbarungen zum Vertrag ein',
      ),
      'exclude' => true,
      'inputType' => 'textarea',
      'eval' => 
      array (
        'basicEntities' => true,
      ),
      'sql' => 'mediumtext NULL',
    ),
    'Vertrag_aktiv_Handy' => 
    array (
      'label' => 
      array (
        0 => 'Vertrag ist aktiv',
        1 => 'Ist der Vertrag aktiv',
      ),
      'exclude' => true,
      'inputType' => 'checkbox',
      'eval' => 
      array (
        'tl_class' => 'clr',
      ),
      'sql' => 'char(1) NOT NULL default \'\'',
    ),
    'Vertrag_DATA' => 
    array (
      'label' => 
      array (
        0 => 'Vertrag DATA',
        1 => '',
      ),
      'exclude' => true,
      'inputType' => 'select',
      'eval' => 
      array (
        'tl_class' => 'w50',
        'chosen' => true,
      ),
      'options' => 
      array (
        0 => '–',
        1 => 'DATA',
      ),
      'sql' => 'varchar(64) NOT NULL default \'\'',
      'reference' => 
      array (
        '–' => '–',
        'DATA' => 'DATA',
      ),
      'filter' => true,
    ),
    'Monatspraemie_DATA' => 
    array (
      'label' => 
      array (
        0 => 'Monatsprämie',
        1 => 'Bitte wähle die Monatsprämie für DATA aus.',
      ),
      'exclude' => true,
      'inputType' => 'select',
      'eval' => 
      array (
        'chosen' => true,
      ),
      'options' => 
      array (
        0 => '–',
        1 => '€ 2,90',
      ),
      'sql' => 'varchar(64) NOT NULL default \'\'',
      'reference' => 
      array (
        '–' => '–',
        '€ 2,90' => '€ 2,90',
      ),
    ),
    'Router_Hersteller' => 
    array (
      'label' => 
      array (
        0 => 'Router Hersteller',
        1 => 'Bitte wähle den Modem/Router Hersteller aus',
      ),
      'exclude' => true,
      'inputType' => 'select',
      'eval' => 
      array (
        'chosen' => true,
      ),
      'options' => 
      array (
        0 => '–',
        1 => 'Router – Fritz',
        2 => 'Router – Huawai',
        3 => 'Router – TP-Link',
        4 => 'Router – ZTE',
        5 => 'ZTE MC888 5G',
        6 => 'ZTE MC888',
      ),
      'sql' => 'varchar(64) NOT NULL default \'\'',
      'reference' => 
      array (
        '–' => '–',
        'Router – Fritz' => 'Router – Fritz',
        'Router – Huawai' => 'Router – Huawai',
        'Router – TP-Link' => 'Router – TP-Link',
        'Router – ZTE' => 'Router – ZTE',
        'ZTE MC888 5G' => 'ZTE MC888 5G',
        'ZTE MC888' => 'ZTE MC888',
      ),
    ),
    'Kaufdatum_Router' => 
    array (
      'label' => 
      array (
        0 => 'Kaufdatum Router',
        1 => 'Bitte gib das nachgewiesene Kaufdatum im Format TT.MM.JJ ein',
      ),
      'exclude' => true,
      'inputType' => 'text',
      'eval' => 
      array (
        'tl_class' => 'w50 wizard',
        'datepicker' => true,
        'rgxp' => 'date',
      ),
      'sql' => 'varchar(10) NOT NULL default \'\'',
      'sorting' => true,
      'flag' => 7,
    ),
    'Zusaetzliche_Vereinbarungen_DATA' => 
    array (
      'label' => 
      array (
        0 => 'Zusätzliche Vereinbarungen DATA',
        1 => 'Bitte gib optional zusätzliche Vereinbarungen zum Vertrag-DATA ein',
      ),
      'exclude' => true,
      'inputType' => 'textarea',
      'eval' => 
      array (
        'tl_class' => 'w50 clr',
        'basicEntities' => true,
      ),
      'sql' => 'mediumtext NULL',
    ),
    'Vertrag_aktiv_DATA' => 
    array (
      'label' => 
      array (
        0 => 'Vertrag ist aktiv',
        1 => 'Ist der Vertrag aktiv',
      ),
      'exclude' => true,
      'inputType' => 'checkbox',
      'eval' => 
      array (
        'tl_class' => 'clr',
      ),
      'sql' => 'char(1) NOT NULL default \'\'',
    ),
    'Vertragstext' => 
    array (
      'label' => 
      array (
        0 => 'Vertragstext',
        1 => '',
      ),
      'exclude' => true,
      'inputType' => 'textarea',
      'eval' => 
      array (
        'tl_class' => 'clr',
        'basicEntities' => true,
      ),
      'sql' => 'mediumtext NULL',
      'default' => '{{insert_content::124430}}',
    ),
    'Verkaeufer' => 
    array (
      'label' => 
      array (
        0 => 'Verkäufer',
        1 => '',
      ),
      'exclude' => true,
      'inputType' => 'select',
      'eval' => 
      array (
        'includeBlankOption' => '1',
        'tl_class' => 'w50',
        'chosen' => true,
      ),
      'options' => 
      array (
        0 => 'Manuel Tschurl',
        1 => 'Verena Wurm',
        2 => 'Diart Kuqi',
        3 => 'Christoph Mühllechner ',
        4 => 'Marina Pavlovic ',
        5 => 'Enis Rekic',
        6 => 'Daniel Stojanovic',
        7 => 'Daniel Stojanovic',
        8 => 'Arian Thaqi',
        9 => 'Ramon Vorwerk ',
        10 => 'Ömür Yesilkaya',
        11 => 'Yasin Yoen',
        12 => 'Dennis Lagger ',
        13 => 'Dominik Pfeifenberger',
      ),
      'sql' => 'varchar(64) NOT NULL default \'\'',
      'reference' => 
      array (
        'Manuel Tschurl' => 'Manuel Tschurl',
        'Verena Wurm' => 'Verena Wurm',
        'Diart Kuqi' => 'Diart Kuqi',
        'Christoph Mühllechner ' => 'Christoph Mühllechner',
        'Marina Pavlovic ' => 'Marina Pavlovic ',
        'Enis Rekic' => 'Enis Rekic',
        'Daniel Stojanovic' => 'Daniel Stojanovic',
        'Arian Thaqi' => 'Arian Thaqi',
        'Ramon Vorwerk ' => 'Ramon Vorwerk ',
        'Ömür Yesilkaya' => 'Ömür Yesilkaya',
        'Yasin Yoen' => 'Yasin Yoen',
        'Dennis Lagger ' => 'Dennis Lagger ',
        'Dominik Pfeifenberger' => 'Dominik Pfeifenberger',
      ),
    ),
    'Vertragstext_Unterschrift' => 
    array (
      'label' => 
      array (
        0 => 'Vertragstext-Unterschrift',
        1 => '',
      ),
      'exclude' => true,
      'inputType' => 'textarea',
      'eval' => 
      array (
        'tl_class' => 'w50 clr',
        'basicEntities' => true,
      ),
      'sql' => 'mediumtext NULL',
      'default' => '{{insert_content::124634}}',
    ),
    'Aktiv_Oeffentlichen' => 
    array (
      'label' => 
      array (
        0 => 'Veröffentlichen',
        1 => 'Wenn aktiviert, ist der Kunde im System öffentlich sichtbar.',
      ),
      'exclude' => true,
      'inputType' => 'checkbox',
      'default' => true,
      'eval' => 
      array (
      ),
      'sql' => 'char(1) NOT NULL default \'\'',
    ),
  ),
  'isDefaultCustomCatalogDCA' => true,
  'BE_SUBPALETTES' => 
  array (
    'fields' => 
    array (
    ),
    'selector' => 
    array (
    ),
  ),
  'TL_LANG' => 
  array (
    'name_firma_legend' => 'Name/Firma',
    'adresse_legend' => 'Adresse',
    'kundendaten_legend' => 'Kundendaten',
    'vertragsdaten_handyservice4you_legend' => 'Vertragsdaten: handyservice4you',
    'vertragsdaten_data_legend' => 'Vertragsdaten: DATA',
    'verkäufer_legend' => 'Verkäufer',
    'kunde_veröffentlichen_legend' => 'Kunde veröffentlichen',
  ),
  'BE_ATTRIBUTES' => 
  array (
    0 => 2390,
    1 => 2392,
    2 => 2393,
    3 => 2395,
    4 => 2396,
    5 => 2397,
    6 => 2398,
    7 => 2399,
    8 => 2423,
    9 => 2401,
    10 => 2402,
    11 => 2403,
    12 => 2404,
    13 => 2405,
    14 => 2406,
    15 => 2407,
    16 => 2408,
    17 => 2409,
    18 => 2410,
    19 => 2411,
    20 => 2414,
    21 => 2415,
    22 => 2416,
    23 => 2417,
    24 => 2418,
    25 => 2419,
    26 => 2420,
    27 => 2412,
    28 => 2421,
    29 => 2413,
    30 => 2422,
  ),
  'BE_FILTERS' => 
  array (
    0 => 2410,
    1 => 2415,
  ),
  'createdByCustomCatalog' => true,
  'cacheFile' => 'var/cache/prod/cc_dca/id_2.json',
  'isPrivateCustomCatalogDCA' => true,
);