<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @pct_themer/themedesigner/fe_page_themedesigner.html5 */
class __TwigTemplate_180fc5da1bb9c412abf708a027a69a5c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/fe_page_themedesigner.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/fe_page_themedesigner.html5"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"<?php echo \$this->language; ?>\"<?php if (\$this->isRTL): ?> dir=\"rtl\"<?php endif; ?>>
<head>

\t<?php \$this->block('head'); ?>

\t\t<meta charset=\"<?php echo \$this->charset; ?>\">
\t    <title>ThemeDesigner</title>
\t    <base href=\"<?php echo \$this->base; ?>\">

\t\t<?php \$this->block('meta'); ?>
\t\t<meta name=\"generator\" content=\"Contao Open Source CMS\">
\t\t<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"files/cto_layout/img/favicon/apple-touch-icon.png\">
\t\t<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"files/cto_layout/img/favicon/favicon-32x32.png\">
\t\t<?php \$this->endblock(); ?>

\t\t<?php echo \$this->framework; ?>
\t\t<?php echo \$this->mooScripts; ?>
\t\t<?php echo \$this->stylesheets; ?>
\t\t<?php echo \$this->head; ?>

\t\t<script src=\"<?= PCT_THEMER_PATH.'/assets/js/jquery.slimscroll.min.js'; ?>\"></script>

\t<?php \$this->endblock(); ?>

</head>

<body class=\"<?php if(\$GLOBALS['PCT_THEMEDESIGNER']['demoMode']): ?>demo_mode<?php endif; ?> contao-ht35 <?php if (\$this->class) echo ' ' . trim(preg_replace('/fa(?:-[-\\w]+|\\b)/','', \$this->class)); ?>\"<?php if (\$this->onload): ?> onload=\"<?php echo \$this->onload; ?>\"<?php endif; ?>>

<?php if(\$this->pct_themedesigner): ?>

<div class=\"themedesigner_bar\">
\t<div class=\"td_logo\"><span>Theme-Designer</span></div>
\t<?= \$this->pct_themedesigner_navigation; ?>
\t<?php if(\$GLOBALS['PCT_THEMEDESIGNER']['demoMode']): ?>
\t<div class=\"demo_mode_info\"><strong>DEMO-MODE</strong><span>Save not possible</span></div>
\t<?php else: ?>
\t<?= \$this->pct_themedesigner_versions; ?>
\t<?php endif; ?>

\t<?= \$this->pct_themedesigner_toggler; ?>
\t<?= \$this->pct_themedesigner_reset; ?>
\t<?= \$this->pct_themedesigner_quickinfo; ?>
</div>

<div id=\"themedesigner\" class=\"themedesigner_wrapper\">
<div class=\"scrollbar\"
<?= \$this->pct_themedesigner; ?>
</div>
<div id=\"themedesigner_loader\"><div class=\"loader\"></div></div>
</div>

<?php endif; ?>

<?php
\$objTD = new \\PCT\\ThemeDesigner;
\$src = \\Contao\\Environment::get('request');
\$arrSession = \$objTD->getSession();

\$strIframeUrl = \$arrSession['IFRAME_URL'] ?? '';
\$tmp = explode('?', \$strIframeUrl);
\$strIframeUrl = \$tmp[0];

if(\$strIframeUrl != '' &&  \$strIframeUrl!= \$src)
{
\t\$src = \$strIframeUrl;
}

\$strQueryString = '?themedesigner_iframe=1';
if(\\Contao\\Config::get('disableAlias') || strlen( \\Contao\\Environment::get('queryString') ) > 0)
{
\t\$strQueryString = \\Contao\\Environment::get('queryString').'&themedesigner_iframe=1';
}
?>

<?php if(\$GLOBALS['PCT_THEMEDESIGNER']['useIframe']): ?>
<div id=\"themedesigner_iframe_wrapper\" class=\"<?php if(\$this->isMobileView): ?>mobile<?php endif; ?><?php if(\$this->device): ?> themedesigner_<?= \$this->device; ?><?php endif; ?><?php if(\$this->zoom): ?> zoom_<?= \$this->zoom; ?><?php endif; ?>\">
<div class=\"inner\">
<iframe seamless id=\"themedesigner_iframe\" src=\"<?= str_replace('preview.php/','',\\Contao\\Environment::get('request')) . \$strQueryString.'&'.time(); ?>\"  width=\"100%\" height=\"100%\"></iframe>
<div class=\"loader\"></div>
</div>
</div>
<?php endif; ?>

<!--[if lt IE 9]><p id=\"chromeframe\">You are using an outdated browser. <a href=\"http://browsehappy.com/\">Upgrade your browser today</a> or <a href=\"http://www.google.com/chromeframe/?redirect=true\">install Google Chrome Frame</a> to better experience this site.</p><![endif]-->

<script>jQuery.noConflict();</script>
<?php echo \$this->mootools; ?>

<script>
/* <![CDATA[ */

jQuery(document).ajaxStart(function()
{
\tjQuery('body').addClass('wait_for_ajax');
});

jQuery(document).ajaxStop(function()
{
\tjQuery('body').removeClass('wait_for_ajax');
});

jQuery(document).ready(function()
{
\tvar src = '<?= \$arrSession['IFRAME_URL']; ?>';
\tif(src)
\t{
\t\tif(src.indexOf('?') >= 0)
\t\t{
\t\t\tsrc += '&themedesigner_iframe=1';
\t\t}
\t\telse
\t\t{
\t\t\tsrc +='?themedesigner_iframe=1';
\t\t}
\t\tjQuery('#themedesigner_iframe').attr('src',src+'<?php if(\\Contao\\Input::get('themedesigner_reset') != ''): ?>&themedesigner_reset=1<?php endif; ?>');
\t}
});

jQuery(document).ready(function()
{
\t// resize iframe
\tThemeDesignerIframe.resize();

\t// init js scrollbars
\tif(!jQuery(\"body\").hasClass(\"mobile\"))
\t{
\t\tjQuery(\"#themedesigner .scrollbar\").slimScroll({height: 'auto'});
\t}
});

jQuery(window).resize(function()
{
\t// resize iframe
\tThemeDesignerIframe.resize();

\t// init js scrollbars
\tif(!jQuery(\"body\").hasClass(\"mobile\"))
\t{
\t\tjQuery(\"#themedesigner .scrollbar\").slimScroll({height: 'auto'});
\t}
});

// add page-loaded class
jQuery('#themedesigner_iframe',document).ready(function()
{
\tsetTimeout(function(){ jQuery('body').addClass('page-loaded'); }, 1000);
});


jQuery('#themedesigner_iframe').on('load',function()
{
\tjQuery('body').removeClass('waiting_for_iframe');

\t// hide iframe loader
\tjQuery('#themedesigner_iframe_wrapper .loader').removeClass('show');

});


/**
 * Detect browser tab changes and remove last iframe url when tab focus has changed
 */
jQuery(document).ready(function()
{
\tvar strHidden;
\tvar strVisibiltyChange;
\t// Opera 12.10 and Firefox 18 and later support
\tif(typeof document.hidden !== \"undefined\")
\t{
\t  strHidden = \"hidden\";
\t  strVisibilityChange = \"visibilitychange\";
\t}
\t// IE, Edge
\telse if(typeof document.msHidden !== \"undefined\")
\t{
\t\tstrHidden = \"msHidden\";
\t\tstrVisibilityChange = \"msvisibilitychange\";
\t}
\t// webkit
\telse if(typeof document.webkitHidden !== \"undefined\")
\t{
\t  strHidden = \"webkitHidden\";
\t  strVisibilityChange = \"webkitvisibilitychange\";
\t}

\tif(typeof document.addEventListener === \"undefined\" || typeof document[strHidden] === \"undefined\")
\t{
\t\tconsole.log(\"This demo requires a browser, such as Google Chrome or Firefox, that supports the Page Visibility API.\");
\t}
\telse
\t{
\t\tdocument.addEventListener(strVisibilityChange,function()
\t\t{
\t\t\tif(document.hidden)
\t\t\t{
\t\t\t\tThemeDesigner.request('updateIframeUrl',{url:'',doNotApply:true,noLoader:true});
\t\t\t}
\t\t});
\t}
});

jQuery(document).ready(function()
{
\tif( jQuery('body').hasClass('mobile') )
\t{
\t\tjQuery('head').append('<meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0\">');
\t}
});

/* ]]> */
</script>

</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/fe_page_themedesigner.html5";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"<?php echo \$this->language; ?>\"<?php if (\$this->isRTL): ?> dir=\"rtl\"<?php endif; ?>>
<head>

\t<?php \$this->block('head'); ?>

\t\t<meta charset=\"<?php echo \$this->charset; ?>\">
\t    <title>ThemeDesigner</title>
\t    <base href=\"<?php echo \$this->base; ?>\">

\t\t<?php \$this->block('meta'); ?>
\t\t<meta name=\"generator\" content=\"Contao Open Source CMS\">
\t\t<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"files/cto_layout/img/favicon/apple-touch-icon.png\">
\t\t<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"files/cto_layout/img/favicon/favicon-32x32.png\">
\t\t<?php \$this->endblock(); ?>

\t\t<?php echo \$this->framework; ?>
\t\t<?php echo \$this->mooScripts; ?>
\t\t<?php echo \$this->stylesheets; ?>
\t\t<?php echo \$this->head; ?>

\t\t<script src=\"<?= PCT_THEMER_PATH.'/assets/js/jquery.slimscroll.min.js'; ?>\"></script>

\t<?php \$this->endblock(); ?>

</head>

<body class=\"<?php if(\$GLOBALS['PCT_THEMEDESIGNER']['demoMode']): ?>demo_mode<?php endif; ?> contao-ht35 <?php if (\$this->class) echo ' ' . trim(preg_replace('/fa(?:-[-\\w]+|\\b)/','', \$this->class)); ?>\"<?php if (\$this->onload): ?> onload=\"<?php echo \$this->onload; ?>\"<?php endif; ?>>

<?php if(\$this->pct_themedesigner): ?>

<div class=\"themedesigner_bar\">
\t<div class=\"td_logo\"><span>Theme-Designer</span></div>
\t<?= \$this->pct_themedesigner_navigation; ?>
\t<?php if(\$GLOBALS['PCT_THEMEDESIGNER']['demoMode']): ?>
\t<div class=\"demo_mode_info\"><strong>DEMO-MODE</strong><span>Save not possible</span></div>
\t<?php else: ?>
\t<?= \$this->pct_themedesigner_versions; ?>
\t<?php endif; ?>

\t<?= \$this->pct_themedesigner_toggler; ?>
\t<?= \$this->pct_themedesigner_reset; ?>
\t<?= \$this->pct_themedesigner_quickinfo; ?>
</div>

<div id=\"themedesigner\" class=\"themedesigner_wrapper\">
<div class=\"scrollbar\"
<?= \$this->pct_themedesigner; ?>
</div>
<div id=\"themedesigner_loader\"><div class=\"loader\"></div></div>
</div>

<?php endif; ?>

<?php
\$objTD = new \\PCT\\ThemeDesigner;
\$src = \\Contao\\Environment::get('request');
\$arrSession = \$objTD->getSession();

\$strIframeUrl = \$arrSession['IFRAME_URL'] ?? '';
\$tmp = explode('?', \$strIframeUrl);
\$strIframeUrl = \$tmp[0];

if(\$strIframeUrl != '' &&  \$strIframeUrl!= \$src)
{
\t\$src = \$strIframeUrl;
}

\$strQueryString = '?themedesigner_iframe=1';
if(\\Contao\\Config::get('disableAlias') || strlen( \\Contao\\Environment::get('queryString') ) > 0)
{
\t\$strQueryString = \\Contao\\Environment::get('queryString').'&themedesigner_iframe=1';
}
?>

<?php if(\$GLOBALS['PCT_THEMEDESIGNER']['useIframe']): ?>
<div id=\"themedesigner_iframe_wrapper\" class=\"<?php if(\$this->isMobileView): ?>mobile<?php endif; ?><?php if(\$this->device): ?> themedesigner_<?= \$this->device; ?><?php endif; ?><?php if(\$this->zoom): ?> zoom_<?= \$this->zoom; ?><?php endif; ?>\">
<div class=\"inner\">
<iframe seamless id=\"themedesigner_iframe\" src=\"<?= str_replace('preview.php/','',\\Contao\\Environment::get('request')) . \$strQueryString.'&'.time(); ?>\"  width=\"100%\" height=\"100%\"></iframe>
<div class=\"loader\"></div>
</div>
</div>
<?php endif; ?>

<!--[if lt IE 9]><p id=\"chromeframe\">You are using an outdated browser. <a href=\"http://browsehappy.com/\">Upgrade your browser today</a> or <a href=\"http://www.google.com/chromeframe/?redirect=true\">install Google Chrome Frame</a> to better experience this site.</p><![endif]-->

<script>jQuery.noConflict();</script>
<?php echo \$this->mootools; ?>

<script>
/* <![CDATA[ */

jQuery(document).ajaxStart(function()
{
\tjQuery('body').addClass('wait_for_ajax');
});

jQuery(document).ajaxStop(function()
{
\tjQuery('body').removeClass('wait_for_ajax');
});

jQuery(document).ready(function()
{
\tvar src = '<?= \$arrSession['IFRAME_URL']; ?>';
\tif(src)
\t{
\t\tif(src.indexOf('?') >= 0)
\t\t{
\t\t\tsrc += '&themedesigner_iframe=1';
\t\t}
\t\telse
\t\t{
\t\t\tsrc +='?themedesigner_iframe=1';
\t\t}
\t\tjQuery('#themedesigner_iframe').attr('src',src+'<?php if(\\Contao\\Input::get('themedesigner_reset') != ''): ?>&themedesigner_reset=1<?php endif; ?>');
\t}
});

jQuery(document).ready(function()
{
\t// resize iframe
\tThemeDesignerIframe.resize();

\t// init js scrollbars
\tif(!jQuery(\"body\").hasClass(\"mobile\"))
\t{
\t\tjQuery(\"#themedesigner .scrollbar\").slimScroll({height: 'auto'});
\t}
});

jQuery(window).resize(function()
{
\t// resize iframe
\tThemeDesignerIframe.resize();

\t// init js scrollbars
\tif(!jQuery(\"body\").hasClass(\"mobile\"))
\t{
\t\tjQuery(\"#themedesigner .scrollbar\").slimScroll({height: 'auto'});
\t}
});

// add page-loaded class
jQuery('#themedesigner_iframe',document).ready(function()
{
\tsetTimeout(function(){ jQuery('body').addClass('page-loaded'); }, 1000);
});


jQuery('#themedesigner_iframe').on('load',function()
{
\tjQuery('body').removeClass('waiting_for_iframe');

\t// hide iframe loader
\tjQuery('#themedesigner_iframe_wrapper .loader').removeClass('show');

});


/**
 * Detect browser tab changes and remove last iframe url when tab focus has changed
 */
jQuery(document).ready(function()
{
\tvar strHidden;
\tvar strVisibiltyChange;
\t// Opera 12.10 and Firefox 18 and later support
\tif(typeof document.hidden !== \"undefined\")
\t{
\t  strHidden = \"hidden\";
\t  strVisibilityChange = \"visibilitychange\";
\t}
\t// IE, Edge
\telse if(typeof document.msHidden !== \"undefined\")
\t{
\t\tstrHidden = \"msHidden\";
\t\tstrVisibilityChange = \"msvisibilitychange\";
\t}
\t// webkit
\telse if(typeof document.webkitHidden !== \"undefined\")
\t{
\t  strHidden = \"webkitHidden\";
\t  strVisibilityChange = \"webkitvisibilitychange\";
\t}

\tif(typeof document.addEventListener === \"undefined\" || typeof document[strHidden] === \"undefined\")
\t{
\t\tconsole.log(\"This demo requires a browser, such as Google Chrome or Firefox, that supports the Page Visibility API.\");
\t}
\telse
\t{
\t\tdocument.addEventListener(strVisibilityChange,function()
\t\t{
\t\t\tif(document.hidden)
\t\t\t{
\t\t\t\tThemeDesigner.request('updateIframeUrl',{url:'',doNotApply:true,noLoader:true});
\t\t\t}
\t\t});
\t}
});

jQuery(document).ready(function()
{
\tif( jQuery('body').hasClass('mobile') )
\t{
\t\tjQuery('head').append('<meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0\">');
\t}
});

/* ]]> */
</script>

</body>
</html>
", "@pct_themer/themedesigner/fe_page_themedesigner.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/fe_page_themedesigner.html5");
    }
}
