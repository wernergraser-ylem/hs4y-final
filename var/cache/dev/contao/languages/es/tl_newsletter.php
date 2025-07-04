<?php

// vendor/contao/newsletter-bundle/contao/languages/es/tl_newsletter.xlf
$GLOBALS['TL_LANG']['tl_newsletter']['subject']['0'] = 'Asunto';
$GLOBALS['TL_LANG']['tl_newsletter']['subject']['1'] = 'Por favor introduzca en asunto del newsletter';
$GLOBALS['TL_LANG']['tl_newsletter']['alias']['0'] = 'Alias del newsletter';
$GLOBALS['TL_LANG']['tl_newsletter']['alias']['1'] = 'Un alias de boletín es una referencia única al boletín que puede utilizarse para llamarlo en vez de su ID.';
$GLOBALS['TL_LANG']['tl_newsletter']['preheader']['0'] = 'Texto previo al encabezado';
$GLOBALS['TL_LANG']['tl_newsletter']['preheader']['1'] = 'Aquí puede ingresar un texto previo al encabezado. El texto previo al encabezado debe tener entre 40 a 130 caracteres.';
$GLOBALS['TL_LANG']['tl_newsletter']['content']['0'] = 'Contenido';
$GLOBALS['TL_LANG']['tl_newsletter']['content']['1'] = 'Por favor introduzca el contenido del boletín. Utillize los comodines <em>##email##</em> para insertar el e-mail del recipiente. Generar los enlaces de baja de suscripción como <em>http://www.domain.com/unsubscribe-page.html?email=##email##</em>.';
$GLOBALS['TL_LANG']['tl_newsletter']['text']['0'] = 'Contenido de texto';
$GLOBALS['TL_LANG']['tl_newsletter']['text']['1'] = 'Aqui puede introducir el texto del boletín. Utilize el formato <em>##email##</em> para insertar el e-mail del recipiente.';
$GLOBALS['TL_LANG']['tl_newsletter']['addFile']['0'] = 'Agregar adjunto';
$GLOBALS['TL_LANG']['tl_newsletter']['addFile']['1'] = 'Adjunte uno o mas archivos al boletín.';
$GLOBALS['TL_LANG']['tl_newsletter']['files']['0'] = 'Documentso adjuntos';
$GLOBALS['TL_LANG']['tl_newsletter']['files']['1'] = 'Por favor seleccione los archivos que quiere adjuntar al boletín.';
$GLOBALS['TL_LANG']['tl_newsletter']['template']['0'] = 'Plantilla e-mail';
$GLOBALS['TL_LANG']['tl_newsletter']['template']['1'] = 'Aquí puede anular la plantilla de correo electrónico del canal.';
$GLOBALS['TL_LANG']['tl_newsletter']['sendText']['0'] = 'Enviar como texto';
$GLOBALS['TL_LANG']['tl_newsletter']['sendText']['1'] = 'Si selecciona esta opción, el e-mail será enviado como texto. Todas las etiquetas HTML serán eliminadas.';
$GLOBALS['TL_LANG']['tl_newsletter']['externalImages']['0'] = 'Imágenes externas';
$GLOBALS['TL_LANG']['tl_newsletter']['externalImages']['1'] = 'Si selecciona esta opción, no se incrustarán las imágenes en los boletines HTML.';
$GLOBALS['TL_LANG']['tl_newsletter']['mailerTransport']['0'] = 'Transporte por correo';
$GLOBALS['TL_LANG']['tl_newsletter']['mailerTransport']['1'] = 'Aquí puede anular el transporte de correo predeterminado del canal.';
$GLOBALS['TL_LANG']['tl_newsletter']['sender']['0'] = 'Dirección E-mail personalizada';
$GLOBALS['TL_LANG']['tl_newsletter']['sender']['1'] = 'Aquí puede sobreescribir la dirección E-mail predeterminada  del canal.';
$GLOBALS['TL_LANG']['tl_newsletter']['senderName']['0'] = 'Nombre del remitente personalizado';
$GLOBALS['TL_LANG']['tl_newsletter']['senderName']['1'] = 'Aquí puede sobreescribir el nombre del remitente predeterminado del canal.';
$GLOBALS['TL_LANG']['tl_newsletter']['mailsPerCycle']['0'] = 'Mails por ciclo';
$GLOBALS['TL_LANG']['tl_newsletter']['mailsPerCycle']['1'] = 'Para prevenir un timout del script, el proceso de envio se dividen en varios ciclos. Aqui puede definir los e-mails por ciclo dependiendo del tiempo máximo de ejecución definido en tu php.ini';
$GLOBALS['TL_LANG']['tl_newsletter']['timeout']['0'] = 'Tiempo de espera en segundos';
$GLOBALS['TL_LANG']['tl_newsletter']['timeout']['1'] = 'Aqui puede modificar el tiempo de espera entre cada ciclo para controlar el número de e-mails por minuto.';
$GLOBALS['TL_LANG']['tl_newsletter']['start']['0'] = 'Iniciar ciclo';
$GLOBALS['TL_LANG']['tl_newsletter']['start']['1'] = 'En caso de que se interrumpa el proceso de envío, puede ingresar un desplazamiento numérico aquí para continuar con un destinatario en particular. Puede verificar cuántos correos se han enviado seleccionando la categoría <code>NEWSLETTER_ %s</code> en el registro del sistema. Si hay 120 entradas, ingrese "120" para continuar con el 121º destinatario (el conteo comienza en 0).';
$GLOBALS['TL_LANG']['tl_newsletter']['sendPreviewTo']['0'] = 'Enviar muestra a';
$GLOBALS['TL_LANG']['tl_newsletter']['sendPreviewTo']['1'] = 'Enviar la una muestra del boletín a esta dirección e-mail';
$GLOBALS['TL_LANG']['tl_newsletter']['title_legend'] = 'Título y asunto';
$GLOBALS['TL_LANG']['tl_newsletter']['html_legend'] = 'Contenido';
$GLOBALS['TL_LANG']['tl_newsletter']['text_legend'] = 'Contenido de texto';
$GLOBALS['TL_LANG']['tl_newsletter']['attachment_legend'] = 'Documentso adjuntos';
$GLOBALS['TL_LANG']['tl_newsletter']['template_legend'] = 'Ajustes de plantilla';
$GLOBALS['TL_LANG']['tl_newsletter']['sender_legend'] = 'Ajustes del remitente';
$GLOBALS['TL_LANG']['tl_newsletter']['expert_legend'] = 'Configuración avanzada';
$GLOBALS['TL_LANG']['tl_newsletter']['sent'] = 'Enviado';
$GLOBALS['TL_LANG']['tl_newsletter']['sentOn'] = 'Enviado a %s';
$GLOBALS['TL_LANG']['tl_newsletter']['notSent'] = 'No enviando';
$GLOBALS['TL_LANG']['tl_newsletter']['date'] = 'Fecha mailing';
$GLOBALS['TL_LANG']['tl_newsletter']['confirm'] = 'El newsletter ha sido enviado a %s e-mails';
$GLOBALS['TL_LANG']['tl_newsletter']['rejected'] = 'Se ha/han desactivado la(s) direcciones de correo electrónico %s no válidas.';
$GLOBALS['TL_LANG']['tl_newsletter']['skipped'] = '%s dirección(es) de correo electrónico se han omitido.';
$GLOBALS['TL_LANG']['tl_newsletter']['error'] = 'No hay suscripciones activas a este canal';
$GLOBALS['TL_LANG']['tl_newsletter']['from'] = 'De';
$GLOBALS['TL_LANG']['tl_newsletter']['attachments'] = 'Documentso adjuntos';
$GLOBALS['TL_LANG']['tl_newsletter']['preview'] = 'Enviar muestra';
$GLOBALS['TL_LANG']['tl_newsletter']['sendConfirm'] = '¿Realmente quiere enviar el newsletter?';
$GLOBALS['TL_LANG']['tl_newsletter']['send']['0'] = 'Enviar newsletter';
$GLOBALS['TL_LANG']['tl_newsletter']['send']['1'] = 'Enviar newsletter con ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['new']['0'] = 'Nuevo';
$GLOBALS['TL_LANG']['tl_newsletter']['new']['1'] = 'Crear un newsletter nuevo';
$GLOBALS['TL_LANG']['tl_newsletter']['show'] = 'Mostrar los detalles del newsletter con ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['edit'] = 'Editar newsletter con ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['copy'] = 'Duplicar newsletter con ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['cut'] = 'Mover newsletter con ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['delete'] = 'Eliminar newsletter con ID %s';
$GLOBALS['TL_LANG']['tl_newsletter']['pasteafter']['0'] = 'Pegar en este canal';
