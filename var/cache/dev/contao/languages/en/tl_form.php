<?php

// vendor/contao/core-bundle/contao/languages/en/tl_form.xlf
$GLOBALS['TL_LANG']['tl_form']['title']['0'] = 'Title';
$GLOBALS['TL_LANG']['tl_form']['title']['1'] = 'Please enter the form title.';
$GLOBALS['TL_LANG']['tl_form']['alias']['0'] = 'Form alias';
$GLOBALS['TL_LANG']['tl_form']['alias']['1'] = 'The form alias is a unique reference to the form which can be called instead of its numeric ID.';
$GLOBALS['TL_LANG']['tl_form']['jumpTo']['0'] = 'Redirect page';
$GLOBALS['TL_LANG']['tl_form']['jumpTo']['1'] = 'Please choose the page to which visitors will be redirected after submitting the form.';
$GLOBALS['TL_LANG']['tl_form']['confirmation']['0'] = 'Confirmation message';
$GLOBALS['TL_LANG']['tl_form']['confirmation']['1'] = 'Here you can enter the confirmation message that will be displayed after submitting the form. You can use the submitted form data as simple tokens, e.g. <code>##field_name##</code>. The confirmation message is also available as <code>{{form_confirmation}}</code> insert tag.';
$GLOBALS['TL_LANG']['tl_form']['sendViaEmail']['0'] = 'Send form data via e-mail';
$GLOBALS['TL_LANG']['tl_form']['sendViaEmail']['1'] = 'Send the submitted data to an e-mail address.';
$GLOBALS['TL_LANG']['tl_form']['mailerTransport']['0'] = 'Mailer transport';
$GLOBALS['TL_LANG']['tl_form']['mailerTransport']['1'] = 'Here you can override the mailer transport used to send the form via e-mail.';
$GLOBALS['TL_LANG']['tl_form']['recipient']['0'] = 'Recipient address';
$GLOBALS['TL_LANG']['tl_form']['recipient']['1'] = 'Separate multiple e-mail addresses with comma.';
$GLOBALS['TL_LANG']['tl_form']['subject']['0'] = 'Subject';
$GLOBALS['TL_LANG']['tl_form']['subject']['1'] = 'Please enter the e-mail subject.';
$GLOBALS['TL_LANG']['tl_form']['format']['0'] = 'Data format';
$GLOBALS['TL_LANG']['tl_form']['format']['1'] = 'Defines how the form data will be forwarded.';
$GLOBALS['TL_LANG']['tl_form']['raw']['0'] = 'Raw data';
$GLOBALS['TL_LANG']['tl_form']['raw']['1'] = 'The form data will be sent as plain text message with each field in a new line.';
$GLOBALS['TL_LANG']['tl_form']['xml']['0'] = 'XML file';
$GLOBALS['TL_LANG']['tl_form']['xml']['1'] = 'The form data will be attached to the e-mail as an XML file.';
$GLOBALS['TL_LANG']['tl_form']['csv']['0'] = 'CSV file';
$GLOBALS['TL_LANG']['tl_form']['csv']['1'] = 'The form data will be attached to the e-mail as a CSV file.';
$GLOBALS['TL_LANG']['tl_form']['csv_excel']['0'] = 'CSV file (Microsoft Excel)';
$GLOBALS['TL_LANG']['tl_form']['csv_excel']['1'] = 'The form data will be attached to the e-mail as a CSV file readable by Microsoft Excel.';
$GLOBALS['TL_LANG']['tl_form']['skipEmpty']['0'] = 'Skip empty fields';
$GLOBALS['TL_LANG']['tl_form']['skipEmpty']['1'] = 'Do not include empty fields in the form data.';
$GLOBALS['TL_LANG']['tl_form']['email']['0'] = 'E-mail';
$GLOBALS['TL_LANG']['tl_form']['email']['1'] = 'Ignores all fields except <em>name</em>, <em>email</em>, <em>subject</em>, <em>message</em> and <em>cc</em> (carbon copy) and sends the form data like it had been sent from a mail client. File uploads are allowed.';
$GLOBALS['TL_LANG']['tl_form']['skipEmtpy']['0'] = 'Skip empty fields';
$GLOBALS['TL_LANG']['tl_form']['skipEmtpy']['1'] = 'Hide empty fields in the e-mail.';
$GLOBALS['TL_LANG']['tl_form']['storeValues']['0'] = 'Store data';
$GLOBALS['TL_LANG']['tl_form']['storeValues']['1'] = 'Store the submitted data in the database.';
$GLOBALS['TL_LANG']['tl_form']['customTpl']['0'] = 'Form template';
$GLOBALS['TL_LANG']['tl_form']['customTpl']['1'] = 'Here you can select the form template.';
$GLOBALS['TL_LANG']['tl_form']['targetTable']['0'] = 'Target table';
$GLOBALS['TL_LANG']['tl_form']['targetTable']['1'] = 'The target table must contain a column for every form field.';
$GLOBALS['TL_LANG']['tl_form']['method']['0'] = 'Submission method';
$GLOBALS['TL_LANG']['tl_form']['method']['1'] = 'The default form submission method is POST.';
$GLOBALS['TL_LANG']['tl_form']['novalidate']['0'] = 'Disable HTML5 validation';
$GLOBALS['TL_LANG']['tl_form']['novalidate']['1'] = 'Add the <em>novalidate</em> attribute to the form tag.';
$GLOBALS['TL_LANG']['tl_form']['attributes']['0'] = 'CSS ID/class';
$GLOBALS['TL_LANG']['tl_form']['attributes']['1'] = 'Here you can set an ID and one or more classes.';
$GLOBALS['TL_LANG']['tl_form']['formID']['0'] = 'Form ID';
$GLOBALS['TL_LANG']['tl_form']['formID']['1'] = 'The form ID is required to trigger a Contao module.';
$GLOBALS['TL_LANG']['tl_form']['allowTags']['0'] = 'Allow HTML tags';
$GLOBALS['TL_LANG']['tl_form']['allowTags']['1'] = 'Allow HTML tags in form fields.';
$GLOBALS['TL_LANG']['tl_form']['ajax']['0'] = 'Submit via Ajax';
$GLOBALS['TL_LANG']['tl_form']['ajax']['1'] = 'Submit the form via Ajax instead of reloading the page.';
$GLOBALS['TL_LANG']['tl_form']['tstamp']['0'] = 'Revision date';
$GLOBALS['TL_LANG']['tl_form']['tstamp']['1'] = 'Date and time of the latest revision';
$GLOBALS['TL_LANG']['tl_form']['title_legend'] = 'Title and redirect page';
$GLOBALS['TL_LANG']['tl_form']['email_legend'] = 'Send form data';
$GLOBALS['TL_LANG']['tl_form']['store_legend'] = 'Store form data';
$GLOBALS['TL_LANG']['tl_form']['expert_legend'] = 'Expert settings';
$GLOBALS['TL_LANG']['tl_form']['config_legend'] = 'Form configuration';
$GLOBALS['TL_LANG']['tl_form']['confirm_legend'] = 'Confirmation';
$GLOBALS['TL_LANG']['tl_form']['template_legend'] = 'Template settings';
$GLOBALS['TL_LANG']['tl_form']['new']['0'] = 'New';
$GLOBALS['TL_LANG']['tl_form']['new']['1'] = 'Create a new form';
$GLOBALS['TL_LANG']['tl_form']['show'] = 'Show the details of form ID %s';
$GLOBALS['TL_LANG']['tl_form']['edit'] = 'Edit form ID %s';
$GLOBALS['TL_LANG']['tl_form']['children'] = 'Edit the form fields of form ID %s';
$GLOBALS['TL_LANG']['tl_form']['copy'] = 'Duplicate form ID %s';
$GLOBALS['TL_LANG']['tl_form']['delete'] = 'Delete form ID %s';
$GLOBALS['TL_LANG']['tl_form']['targetTableMissingAllowlist'] = 'Define the available tables in the following DCA configuration: <code>%s</code>.';

/*
 * Legends
 */
$GLOBALS['TL_LANG']['tl_form']['mp_forms_legend'] = 'Multiple page forms';
/*
 * Fields
 */
$GLOBALS['TL_LANG']['tl_form']['mp_forms_getParam'] = ['Step query parameter', 'You can optionally modify the used query parameter for the steps here.'];
$GLOBALS['TL_LANG']['tl_form']['mp_forms_sessionRefParam'] = ['Session reference query parameter', 'To enable simultaneous form editing in multiple tabs a reference is required. Use this configuration to adjust the query parameter name.'];
$GLOBALS['TL_LANG']['tl_form']['mp_forms_backFragment'] = ['Back button URL fragment', 'You may enter an optional URL fragment here which will be added to the URL when hitting the back button (e.g. for anchor links). Omit the "#" here.'];
$GLOBALS['TL_LANG']['tl_form']['mp_forms_nextFragment'] = ['Continue button URL fragment', 'You may enter an optional URL fragment here which will be added to the URL when hitting the continue button (e.g. for anchor links). Omit the "#" here.'];
