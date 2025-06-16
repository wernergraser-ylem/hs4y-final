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

/* @pct_privacy_manager/scripts/j_privacymanager.html5 */
class __TwigTemplate_39d5b857ec76488b341a447a3bab2686 extends Template
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
        // line 1
        yield "<!-- SEO-SCRIPT-START -->
<script>
/**
 * PrivacyManager
 */
var PrivacyManager =
{
\t/**
\t * The privacy localStorage key
\t * @var string
\t */
\tprivacy_session : 'user_privacy_settings',

\t/**
\t * Get the selected privacy checkbox values from a formular array
\t * @param array 
\t * @return array
\t */
\tgetUserSelectionFromFormData: function (arrSubmitted)
\t{
\t\tif (arrSubmitted == null || arrSubmitted == undefined)
\t\t{
\t\t\treturn [];
\t\t}

\t\tvar arrReturn = [];
\t\tfor (var k in arrSubmitted)
\t\t{
\t\t\tvar v = arrSubmitted[k];
\t\t\tif (v['name'] == 'privacy')
\t\t\t{ 
\t\t\t\tarrReturn.push(v['value']);
\t\t\t}
\t\t}
\t\treturn arrReturn;
\t},


\t/**
\t * Access control
\t * @param string
\t */
\thasAccess : function (varSelection)
\t{
\t\tvar token = localStorage.getItem( this.privacy_session );
\t\tif( token == undefined )
\t\t{
\t\t\treturn false;
\t\t}

\t\t// convert to string
\t\tif( typeof(varSelection) == 'number' )
\t\t{
\t\t\tvarSelection = varSelection.toString();
\t\t}
\t\t// convert to array
\t\tif( typeof(varSelection) == 'string' )
\t\t{
\t\t\tvarSelection = varSelection.split(',');
\t\t}

\t\tfor(i in varSelection)
\t\t{
\t\t\tvar value = varSelection[i].toString().replace(' ','');
\t\t\tif( token.indexOf( value ) >= 0 )
\t\t\t{
\t\t\t\treturn true;
\t\t\t}
\t\t}
\t\treturn false;
\t},


\t/**
\t * Clear privacy settings and redirect page
\t * @param boolean
\t */
\toptout: function (strRedirect)
\t{
\t\t// clear local storage
\t\tlocalStorage.removeItem(this.privacy_session);
\t\tlocalStorage.removeItem(this.privacy_session+'_expires');
\t\t// fire event
\t\tjQuery(document).trigger('Privacy.clear_privacy_settings',{});
\t\t// log
\t\tconsole.log('Privacy settings cleared');
\t\t// redirect
\t\tif (strRedirect != undefined)
\t\t{
\t\t\tlocation.href = strRedirect;
\t\t}
\t\telse
\t\t{
\t\t\tlocation.reload();
\t\t}
\t},


\t/**
\t * Clear all cookies and localstorage
\t */
\tclearAll: function()
\t{
\t\tvar host = window.location.hostname;
\t\tvar domain = host.substring( host.indexOf('.') , host.length);
\t\t// clear all cookies
\t\tdocument.cookie.split(\";\").forEach(function(c) 
\t\t{ 
\t\t\tdocument.cookie = c.replace(/^ +/, \"\").replace(/=.*/, \"=;expires=\" + new Date().toUTCString() + \";path=/\"+ \";domain=\"+host); 
\t\t\tdocument.cookie = c.replace(/^ +/, \"\").replace(/=.*/, \"=;expires=\" + new Date().toUTCString() + \";path=/\"+ \";domain=\"+domain); 
\t\t});
\t\t// clear whole localstorage
\t\twindow.localStorage.clear();
\t\tfor (var i = 0; i <= localStorage.length; i++) 
\t\t{
\t\t   localStorage.removeItem(localStorage.key(i));
\t\t}
\t\t// log
\t\tconsole.log('Cookies and localstorage cleared');
\t}
};
</script>

<script>
/**
 * Univerasl optin protection
 * @param string\tType of element to be protected e.g. img or iframe etc.
 */
PrivacyManager.optin = function(strElementType)
{
\tif(strElementType == undefined || strElementType == '')
\t{
\t\treturn;
\t}
\t// user settings not applied yet
\tif(localStorage.getItem(this.privacy_session) == undefined || localStorage.getItem(this.privacy_session) == '' || localStorage.getItem(this.privacy_session) <= 0)
\t{
\t\treturn
\t}

\t// find all scripts having a data-src attribute
\tvar targets = jQuery(strElementType+'[data-src]');\t
\t
\tif(targets.length > 0)
\t{
\t\tjQuery.each(targets,function(i,e)
\t\t{
\t\t\tvar privacy = jQuery(e).data('privacy');
\t\t\tif(privacy == undefined)
\t\t\t{
\t\t\t\tprivacy = 0;
\t\t\t}
\t\t\t
\t\t\tvar attr = 'src';
\t\t\tif(strElementType == 'link')
\t\t\t{
\t\t\t\tattr = 'href';
\t\t\t}
\t\t\telse if(strElementType == 'object')
\t\t\t{
\t\t\t\tattr = 'data';
\t\t\t}
\t\t\t
\t\t\tif(localStorage.getItem('user_privacy_settings').indexOf(privacy) >= 0)
\t\t\t{
\t\t\t\tjQuery(e).attr(attr,jQuery(e).data('src') );
\t\t\t}
\t\t});
\t}
}

jQuery(document).on('Privacy.changed', function() 
{
\tPrivacyManager.optin('script');
\tPrivacyManager.optin('link');
\tPrivacyManager.optin('iframe');
\tPrivacyManager.optin('object');
\tPrivacyManager.optin('img');
});

jQuery(document).ready(function()
{
\tPrivacyManager.optin('script');
\tPrivacyManager.optin('link');
\tPrivacyManager.optin('iframe');
\tPrivacyManager.optin('object');
\tPrivacyManager.optin('img');
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_privacy_manager/scripts/j_privacymanager.html5";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_privacy_manager/scripts/j_privacymanager.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_privacy_manager/templates/scripts/j_privacymanager.html5");
    }
}
