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

/* @pct_theme_updater/be_js_pct_theme_updater.html5 */
class __TwigTemplate_e96e243baf9b424b2e85be871523c9a9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_updater/be_js_pct_theme_updater.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_updater/be_js_pct_theme_updater.html5"));

        // line 1
        yield "<?php 
\$strToken = \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
?>
<script>
/**
 * Class
 * PCT_ThemeUpdater
 */
var PCT_ThemeUpdater = 
{
\t/**
\t * Contaos request token
\t * @var string
\t */
\trequest_token : '<?= \$strToken; ?>',
\t
\t/**
\t * Misc texts
\t * @var object json
\t */
\ttexts : '<?= \$this->texts ?: ''; ?>',
\t
\t/**
\t * Default delay before redirects
\t * @var integer
\t */
\tdelay : <?= \$this->delay ?: 1000; ?>,
\t
\t/**
\t * Contao ajax info text
\t * @var string
\t */
\tajax_infotext : '',
\t
\t
\t/**
\t * Perform ajax requests
\t * @var object
\t */
\trequest : function(objData)
\t{
\t\tif(objData == undefined)
\t\t{
\t\t\tobjData = {}
\t\t}
\t\t
\t\tvar strMethod = 'get';
\t\t
\t\tif(objData.REQUEST_TOKEN == undefined && strMethod == 'post')
\t\t{
\t\t\tobjData.REQUEST_TOKEN = this.request_token;
\t\t}
\t\t
\t\tif(objData.rt == undefined && strMethod == 'get')
\t\t{
\t\t\tobjData.rt = this.request_token;
\t\t}
\t\t
\t\tvar blnReload = false;
\t\tif(objData.reload === true)
\t\t{
\t\t\tblnReload = true;
\t\t}
\t\t
\t\t//var headers = {'Access-Control-Allow-Origin':'*','Access-Control-Allow-Methods':'GET, POST, PATCH, PUT, DELETE, OPTIONS','Access-Control-Allow-Headers':'Origin, Content-Type, X-Auth-Token'};
\t\tvar objRequest = new Request.Contao(
\t\t{
\t\t\turl:window.location.href,
\t\t\tfollowRedirects:false,
\t\t\tmethod: strMethod,
\t\t\t// start
\t\t\tonRequest: function()
\t\t\t{
\t\t    \tconsole.log(PCT_ThemeUpdater.ajax_infotext);
\t\t    },
\t\t\t// process
\t\t\tonProgress: function(event, xhr)
\t\t\t{
\t\t        var loaded = event.loaded, total = event.total;
\t\t\t},
\t\t\t// request failed
\t\t\tonFailure: function(xhr)
\t\t\t{
\t\t\t\tconsole.log('Request failed!');
\t\t\t\tconsole.log(objData);
\t\t\t\tconsole.log(xhr);
\t\t\t},
\t\t     // loading successful
\t\t\tonSuccess: function(response)
\t\t\t{
\t\t\t\t// redirct on success
\t\t\t\tif(objData.redirectTo != undefined && objData.redirectTo != '')
\t\t\t\t{
\t\t\t\t\tPCT_ThemeUpdater.redirectTo(objData.redirectTo,PCT_ThemeUpdater.delay)
\t\t\t\t\treturn;
\t\t\t\t}
\t\t\t\t
\t\t\t\t// reload on success
\t\t\t\tif(blnReload)
\t\t\t\t{
\t\t\t\t\t// reload page
\t\t\t\t\tlocation.reload();
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\tconsole.log(response);
\t\t\t\t}
\t\t\t},
\t\t});
\t\tobjRequest.get(objData);
\t},
\t
\t
\t/**
\t * Perform timed redirects
\t * @var string\t\tThe request url
\t * @var integer\t\tThe offset time in ms
\t */
\tredirectTo : function(strUrl,intDelay)
\t{
\t\tif(strUrl == undefined || strUrl == '')
\t\t{
\t\t\treturn;
\t\t}
\t\t
\t\tif(intDelay == undefined)
\t\t{
\t\t\tintDelay = 0;
\t\t}
\t\t
\t\tif(intDelay >= 50)
\t\t{
\t\t\tconsole.log(PCT_ThemeUpdater.ajax_infotext);
\t\t}
\t\t
\t\tsetTimeout(function()
\t\t{
\t\t\t// log
\t\t\tconsole.log('ThemeUpdater redirect: '+strUrl);
\t\t\t// redirect
\t\t\twindow.location = strUrl;\t\t
\t\t}, intDelay);
\t}
}
</script>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_updater/be_js_pct_theme_updater.html5";
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
        return new Source("<?php 
\$strToken = \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
?>
<script>
/**
 * Class
 * PCT_ThemeUpdater
 */
var PCT_ThemeUpdater = 
{
\t/**
\t * Contaos request token
\t * @var string
\t */
\trequest_token : '<?= \$strToken; ?>',
\t
\t/**
\t * Misc texts
\t * @var object json
\t */
\ttexts : '<?= \$this->texts ?: ''; ?>',
\t
\t/**
\t * Default delay before redirects
\t * @var integer
\t */
\tdelay : <?= \$this->delay ?: 1000; ?>,
\t
\t/**
\t * Contao ajax info text
\t * @var string
\t */
\tajax_infotext : '',
\t
\t
\t/**
\t * Perform ajax requests
\t * @var object
\t */
\trequest : function(objData)
\t{
\t\tif(objData == undefined)
\t\t{
\t\t\tobjData = {}
\t\t}
\t\t
\t\tvar strMethod = 'get';
\t\t
\t\tif(objData.REQUEST_TOKEN == undefined && strMethod == 'post')
\t\t{
\t\t\tobjData.REQUEST_TOKEN = this.request_token;
\t\t}
\t\t
\t\tif(objData.rt == undefined && strMethod == 'get')
\t\t{
\t\t\tobjData.rt = this.request_token;
\t\t}
\t\t
\t\tvar blnReload = false;
\t\tif(objData.reload === true)
\t\t{
\t\t\tblnReload = true;
\t\t}
\t\t
\t\t//var headers = {'Access-Control-Allow-Origin':'*','Access-Control-Allow-Methods':'GET, POST, PATCH, PUT, DELETE, OPTIONS','Access-Control-Allow-Headers':'Origin, Content-Type, X-Auth-Token'};
\t\tvar objRequest = new Request.Contao(
\t\t{
\t\t\turl:window.location.href,
\t\t\tfollowRedirects:false,
\t\t\tmethod: strMethod,
\t\t\t// start
\t\t\tonRequest: function()
\t\t\t{
\t\t    \tconsole.log(PCT_ThemeUpdater.ajax_infotext);
\t\t    },
\t\t\t// process
\t\t\tonProgress: function(event, xhr)
\t\t\t{
\t\t        var loaded = event.loaded, total = event.total;
\t\t\t},
\t\t\t// request failed
\t\t\tonFailure: function(xhr)
\t\t\t{
\t\t\t\tconsole.log('Request failed!');
\t\t\t\tconsole.log(objData);
\t\t\t\tconsole.log(xhr);
\t\t\t},
\t\t     // loading successful
\t\t\tonSuccess: function(response)
\t\t\t{
\t\t\t\t// redirct on success
\t\t\t\tif(objData.redirectTo != undefined && objData.redirectTo != '')
\t\t\t\t{
\t\t\t\t\tPCT_ThemeUpdater.redirectTo(objData.redirectTo,PCT_ThemeUpdater.delay)
\t\t\t\t\treturn;
\t\t\t\t}
\t\t\t\t
\t\t\t\t// reload on success
\t\t\t\tif(blnReload)
\t\t\t\t{
\t\t\t\t\t// reload page
\t\t\t\t\tlocation.reload();
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\tconsole.log(response);
\t\t\t\t}
\t\t\t},
\t\t});
\t\tobjRequest.get(objData);
\t},
\t
\t
\t/**
\t * Perform timed redirects
\t * @var string\t\tThe request url
\t * @var integer\t\tThe offset time in ms
\t */
\tredirectTo : function(strUrl,intDelay)
\t{
\t\tif(strUrl == undefined || strUrl == '')
\t\t{
\t\t\treturn;
\t\t}
\t\t
\t\tif(intDelay == undefined)
\t\t{
\t\t\tintDelay = 0;
\t\t}
\t\t
\t\tif(intDelay >= 50)
\t\t{
\t\t\tconsole.log(PCT_ThemeUpdater.ajax_infotext);
\t\t}
\t\t
\t\tsetTimeout(function()
\t\t{
\t\t\t// log
\t\t\tconsole.log('ThemeUpdater redirect: '+strUrl);
\t\t\t// redirect
\t\t\twindow.location = strUrl;\t\t
\t\t}, intDelay);
\t}
}
</script>", "@pct_theme_updater/be_js_pct_theme_updater.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_updater/templates/be_js_pct_theme_updater.html5");
    }
}
