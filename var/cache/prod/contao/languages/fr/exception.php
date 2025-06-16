<?php

// vendor/contao/core-bundle/contao/languages/fr/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'Une erreur s\'est produite';
$GLOBALS['TL_LANG']['XPT']['matter'] = 'Quel est le problème ?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'Comment puis-je résoudre ce problème ?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'Dites-m\'en plus, s\'il vous plaît.';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'Afin de personnaliser cet avis, créez un modèle personnalisé Twig remplaçant <em>%s</em>.';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'Une erreur s\'est produite lors de l\'exécution de ce script. Quelque chose ne fonctionne pas correctement.';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = 'Ouvrez le fichier journal actuel dans le répertoire <code>var/logs</code> et recherchez le message d\'erreur associé (généralement le dernier).';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = 'L\'exécution du script s\'est arrêtée parce que quelque chose ne fonctionne pas correctement. Le message d\'erreur réel est caché par cet avis pour des raisons de sécurité et peut être trouvé dans le fichier journal actuel (voir ci-dessus). Si vous ne comprenez pas le message d\'erreur ou ne savez pas comment résoudre le problème, visitez la page <a href="%s" target="_blank" rel="noreferrer noopener">Contao support page</a>.';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = 'Demande de jetons invalide';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'La demande de jetons n\'a pas pu être vérifiée.';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = 'Veuillez <a href="javascript:window.location.href=window.location.href">cliquez ici</a> et réessayez. N\'utilisez pas le bouton retour de votre navigateur.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'Cette erreur se produit s\'il y a une requête POST sans un jeton d\'authentification valide. Dans Contao 2.10, le contrôle du référant a été remplacé par un système de demande de jetons. Si le problème persiste, vous utilisez peut-être une extension incompatible ou votre installation de Contao n\'a pas été correctement mise à jour.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'Pour plus d\'informations, visitez le page <a href="%s" target="_blank" rel="noreferrer noopener">Contao support page</a>.';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'Service indisponible';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = 'Le site est actuellement indisponible. Veuillez, s\'il vous plaît, revenir plus tard.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'Impossible de générer une URL de front office';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'L\'URL n\'a pas pu être générée, car la route comporte des paramètres obligatoires qui ne sont pas fournis. Des informations supplémentaires (par exemple un alias d\'actualités) doivent être fournies.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Les routes Symfony peuvent avoir des paramètres variables, qui sont validés à l\'aide d\'expressions régulières. La configuration suivante n\'a pas pu être résolue:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'Chemin de la route';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = 'Nom';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = 'Requirement (Regex)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = 'Valeur par défaut';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = 'vide';
