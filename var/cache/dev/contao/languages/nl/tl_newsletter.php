<?php

// vendor/contao/newsletter-bundle/contao/languages/nl/tl_newsletter.xlf
$GLOBALS['TL_LANG']['tl_newsletter']['subject']['0'] = 'Onderwerp';
$GLOBALS['TL_LANG']['tl_newsletter']['subject']['1'] = 'Geef onderwerp van de nieuwsbrief op.';
$GLOBALS['TL_LANG']['tl_newsletter']['alias']['0'] = 'Nieuwsbrief alias';
$GLOBALS['TL_LANG']['tl_newsletter']['alias']['1'] = 'Een nieuwsbrief alias is een unieke referentie naar een nieuwsbrief waarmee deze aangeroepen kan worden in plaats van met zijn numerieke ID.';
$GLOBALS['TL_LANG']['tl_newsletter']['preheader']['0'] = 'Tekst vooraf';
$GLOBALS['TL_LANG']['tl_newsletter']['preheader']['1'] = 'Hier kunt u een preheadertekst invoeren. Een preheadertekst moet tussen de 40-130 tekens lang zijn.';
$GLOBALS['TL_LANG']['tl_newsletter']['content']['0'] = 'HTML inhoud';
$GLOBALS['TL_LANG']['tl_newsletter']['content']['1'] = 'Voer de HTML-inhoud van de nieuwsbrief in. Gebruik de wildcard <em>##email##</em> om het e-mail adres van de abonnee in te voegen.';
$GLOBALS['TL_LANG']['tl_newsletter']['text']['0'] = 'Platte tekst inhoud';
$GLOBALS['TL_LANG']['tl_newsletter']['text']['1'] = 'Voer de platte tekst voor de nieuwsbrief in. Gebruik de wildcard <em>##email##</em> om het e-mailadres van de ontvanger in te voeren.';
$GLOBALS['TL_LANG']['tl_newsletter']['addFile']['0'] = 'Bijlage toevoegen';
$GLOBALS['TL_LANG']['tl_newsletter']['addFile']['1'] = 'Voeg een of meerdere bijlage(n) toe aan de nieuwsbrief.';
$GLOBALS['TL_LANG']['tl_newsletter']['files']['0'] = 'Bijlagen';
$GLOBALS['TL_LANG']['tl_newsletter']['files']['1'] = 'Selecteer de bestanden die u wilt toevoegen aan de nieuwsbrief.';
$GLOBALS['TL_LANG']['tl_newsletter']['template']['0'] = 'E-mail template';
$GLOBALS['TL_LANG']['tl_newsletter']['template']['1'] = 'Hier kunt u de e-mailsjabloon van het kanaal overschrijven.';
$GLOBALS['TL_LANG']['tl_newsletter']['sendText']['0'] = 'Als platte tekst versturen';
$GLOBALS['TL_LANG']['tl_newsletter']['sendText']['1'] = 'Als u deze optie kiest zal de nieuwsbrief als platte tekst e-mail worden verzonden. Alle HTML tags zullen worden verwijderd.';
$GLOBALS['TL_LANG']['tl_newsletter']['externalImages']['0'] = 'Externe afbeeldingen';
$GLOBALS['TL_LANG']['tl_newsletter']['externalImages']['1'] = 'Geen afbeeldingen insluiten in de HTML-nieuwsbrief zelf.';
$GLOBALS['TL_LANG']['tl_newsletter']['mailerTransport']['0'] = 'Mailer transport';
$GLOBALS['TL_LANG']['tl_newsletter']['mailerTransport']['1'] = 'Hier kunt u het standaardmailtransport van het kanaal overschrijven.';
$GLOBALS['TL_LANG']['tl_newsletter']['sender']['0'] = 'Individuele afzender e-mail adres';
$GLOBALS['TL_LANG']['tl_newsletter']['sender']['1'] = 'De standaard afzender e-mail adres van het kanaal kunt u hier overschrijven.';
$GLOBALS['TL_LANG']['tl_newsletter']['senderName']['0'] = 'Individuele naam afzender';
$GLOBALS['TL_LANG']['tl_newsletter']['senderName']['1'] = 'De standaard naam van de afzender van het kanaal kunt u hier overschrijven.';
$GLOBALS['TL_LANG']['tl_newsletter']['mailsPerCycle']['0'] = 'Berichten per cyclus';
$GLOBALS['TL_LANG']['tl_newsletter']['mailsPerCycle']['1'] = 'Om te voorkomen dat er een time-out optreedt in het script is verzending opgesplitst in verschillende cycli.';
$GLOBALS['TL_LANG']['tl_newsletter']['timeout']['0'] = 'Timeout in seconden';
$GLOBALS['TL_LANG']['tl_newsletter']['timeout']['1'] = 'Hier kunt u de wachttijd aanpassen tussen elke cyclus om controle te verkrijgen over het aantal e-mails per minuut.';
$GLOBALS['TL_LANG']['tl_newsletter']['start']['0'] = 'Offset';
$GLOBALS['TL_LANG']['tl_newsletter']['start']['1'] = 'In geval dat het verzenden wordt onderbroken, kunt u hier een numerieke offset invoeren om door te gaan met een bepaalde ontvanger. U kunt controleren hoeveel mails er zijn verzonden door de categorie <code>NEWSLETTER_%s</code> te selecteren in het systeem log. B.v. als er 120 mails zijn, voer dan "120" in om door te gaan met de 121e ontvanger (telling begint bij 0).';
$GLOBALS['TL_LANG']['tl_newsletter']['sendPreviewTo']['0'] = 'Stuur preview naar';
$GLOBALS['TL_LANG']['tl_newsletter']['sendPreviewTo']['1'] = 'Stuur de preview van een nieuwsbrief naar dit e-mailadres.';
$GLOBALS['TL_LANG']['tl_newsletter']['title_legend'] = 'Titel en onderwerp';
$GLOBALS['TL_LANG']['tl_newsletter']['html_legend'] = 'HTML inhoud';
$GLOBALS['TL_LANG']['tl_newsletter']['text_legend'] = 'Platte tekst inhoud';
$GLOBALS['TL_LANG']['tl_newsletter']['attachment_legend'] = 'Bijlagen';
$GLOBALS['TL_LANG']['tl_newsletter']['template_legend'] = 'Template-instellingen';
$GLOBALS['TL_LANG']['tl_newsletter']['sender_legend'] = 'Instellingen afzender';
$GLOBALS['TL_LANG']['tl_newsletter']['expert_legend'] = 'Expert-instellingen';
$GLOBALS['TL_LANG']['tl_newsletter']['sent'] = 'Verstuurd';
$GLOBALS['TL_LANG']['tl_newsletter']['sentOn'] = 'Verzonden op %s';
$GLOBALS['TL_LANG']['tl_newsletter']['notSent'] = 'Nog niet verstuurd';
$GLOBALS['TL_LANG']['tl_newsletter']['date'] = 'Postdatum';
$GLOBALS['TL_LANG']['tl_newsletter']['confirm'] = 'De nieuwsbrief is verstuurd naar %s abonnees.';
$GLOBALS['TL_LANG']['tl_newsletter']['rejected'] = '%s ongeldig(e) e-mail adres(sen) zijn geblokkeerd (zie systeemlog).';
$GLOBALS['TL_LANG']['tl_newsletter']['skipped'] = '%s e-mailadres(sen) is/zijn overgeslagen.';
$GLOBALS['TL_LANG']['tl_newsletter']['error'] = 'Er zijn geen abonnees op dit nieuwsbriefkanaal.';
$GLOBALS['TL_LANG']['tl_newsletter']['from'] = 'Van';
$GLOBALS['TL_LANG']['tl_newsletter']['attachments'] = 'Bijlagen';
$GLOBALS['TL_LANG']['tl_newsletter']['preview'] = 'Verstuur preview';
$GLOBALS['TL_LANG']['tl_newsletter']['sendConfirm'] = 'Wilt u de nieuwsbrief werkelijk versturen?';
$GLOBALS['TL_LANG']['tl_newsletter']['send']['0'] = 'Verstuur nieuwsbrief';
$GLOBALS['TL_LANG']['tl_newsletter']['send']['1'] = 'Verstuur nieuwsbrief ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['new']['0'] = 'Nieuw';
$GLOBALS['TL_LANG']['tl_newsletter']['new']['1'] = 'Maak een nieuwe nieuwsbrief';
$GLOBALS['TL_LANG']['tl_newsletter']['show'] = 'Toon details van nieuwsbrief ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['edit'] = 'Bewerk nieuwsbrief ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['copy'] = 'Kopieer nieuwsbrief ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['cut'] = 'Verplaats nieuwsbrief ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['delete'] = 'Verwijder nieuwsbrief ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['pasteafter']['0'] = 'Plak in dit kanaal';
