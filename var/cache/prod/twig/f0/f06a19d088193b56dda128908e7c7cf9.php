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

/* @pct_themer/themedesigner/js/js_themedesigner_iframe_helper.html5 */
class __TwigTemplate_8c2e721386b17fddb6b1acb33e93d6a3 extends Template
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
        yield "
<?php // find valid urls
\$arrUrls = array();

global \$objPage;

// find all accessible pages in the current page strucutre
\$arrPages = \\Contao\\Database::getInstance()->getChildRecords(\$objPage->rootId,'tl_page');

\$objPages = \\Contao\\PageModel::findMultipleByIds(\$arrPages);
\$objRouter = \\Contao\\System::getContainer()->get('contao.routing.content_url_generator');

if(\$objPages !== null)
{
\tforeach(\$objPages as \$page)
\t{
\t\tif( in_array(\$page->type, array('forward','redirect','error_401','error_403','error_404','error_503')) && empty(\$page->jumpTo) )
\t\t{
\t\t\tcontinue;
\t\t}
\t\t
\t\tif( isset(\$page->jumpTo) && !empty(\$page->jumpTo) )
\t\t{
\t\t\t\$page = \\Contao\\PageModel::findById( \$page->jumpTo );
\t\t}

\t\tif( \$page === null || !isset(\$page->id) || empty(\$page->id) || !isset(\$page->published) || !\$page->published )
\t\t{
\t\t\tcontinue;
\t\t}

\t\t\$url = \$objRouter->generate(\$page);
\t\t\$arrUrls[] = \$url;
\t\t\$arrUrls[] = \$url . '?themedesigner_iframe=1';
\t}
}

// allow current page
\$arrUrls[] = \$objRouter->generate(\$objPage);

// root page and first page
\$objRoot = \\Contao\\PageModel::findByPk(\$objPage->rootId);
\$objFirst = \\Contao\\PageModel::findFirstPublishedRegularByPid(\$objPage->rootId);
if(\$objFirst === null)
{
\t\$objFirst = \\Contao\\PageModel::findFirstPublishedByPid(\$objPage->rootId);
}

\$strRootUrl = \$objRouter->generate(\$objRoot);
\$strFirstUrl = \$objRouter->generate(\$objFirst);

// add to page stack
\$arrUrls[] = \$strFirstUrl;
?>



<script>

/**
 * Prevent certain link from clicking
 */
jQuery(document).ready(function() 
{
\tjQuery('a.pct_megamenu, a.click_open').attr('href','#');
});

/**
 * Observe any clicks on anchors and change the parent iframe src
 */
jQuery(document).ready(function() 
{
\t// rewrite all root page links to first page published links
\tjQuery('a[href=\"<?= \$strRootUrl; ?>\"]').attr('href','<?= \$strFirstUrl; ?>');
\t
\t// remove themedesigner_iframe=1 from certain links
\tjQuery( jQuery('a[target=\"_blank\"]') ).each(function(index, element)
\t{
\t\tvar url = jQuery(element).attr('href');
\t\tif(url === undefined)
\t\t{
\t\t\turl = '';
\t\t}
\t\t
\t\tif(url.length < 1 || url.indexOf('themedesigner_iframe') < 0)
\t\t{
\t\t\treturn true;
\t\t}
\t\t
\t\turl = url.replace('?themedesigner_iframe=1','');
\t\turl = url.replace('&themedesigner_iframe=1','');
\t\t
\t\tjQuery(element).attr('href',url);
\t}); 
\t
\t// append themedesigner_iframe=1 to all links
\t//jQuery( jQuery('a:not([href=\"\"]):not([href*=javascript]):not([href^=#]):not([href^=mailto]):not([target=\"_blank\"])') ).each(function(index, element) 
\t//{
\t//\tvar url = jQuery(element).attr('href');
\t//\tif(url === undefined)
\t//\t{
\t//\t\turl = '';
\t//\t}
\t//\t
\t//\tif(url.length < 1)
\t//\t{
\t//\t\treturn true;
\t//\t}
\t//\t
\t//\tif(url.indexOf('?') >= 0)
\t//\t{
\t//\t\turl += '&themedesigner_iframe=1';
\t//\t}
\t//\telse
\t//\t{
\t//\t\turl += '?themedesigner_iframe=1';
\t//\t}
\t//\t
\t//\tjQuery(element).attr('href',url);
\t//});
\t
\tvar intDelay = 1000;
\tsetTimeout(function() 
\t{
\t\tvar strUrl = '<?= \$GLOBALS['PCT_THEMEDESIGNER']['ajaxUrl']; ?>';
\t\tif(!strUrl)
\t\t{
\t\t\tstrUrl = location.href;
\t\t}
\t\t
\t\tvar objValidUrls = <?= json_encode(\$arrUrls); ?>;
\t\t
\t\t//-- links
\t\tjQuery('a:not([href=\"\"]):not([href*=javascript]):not([href=\\\\#]):not([href^=mailto]):not([target=\"_blank\"])').click(function(event)
\t\t{
\t\t\tvar elem = jQuery(this);
\t\t\tvar url = elem.attr('href');
\t\t\tvar target = elem.attr('target');
\t\t\tvar hasAccess = true;
\t\t\t\t
\t\t\tif(url === undefined)
\t\t\t{
\t\t\t\turl = '';
\t\t\t}

\t\t\t// new windows/tabs
\t\t\tif(target == '_blank')
\t\t\t{
\t\t\t\treturn true;
\t\t\t}
\t\t\t// anchors without href or empty href are ok
\t\t\telse if(url == '' || url.length < 1)
\t\t\t{
\t\t\t\treturn true;
\t\t\t}
\t\t\t// timeline elements are ok
\t\t\telse if(jQuery(this).parents('.cd-horizontal-timeline').length > 0 && url.indexOf('.html') < 0)\t\t\t
\t\t\t{
\t\t\t\treturn true;
\t\t\t}
\t\t\t// logos
\t\t\telse if(url == './')
\t\t\t{
\t\t\t\thasAccess = false;
\t\t\t}
\t\t\t// url has an anchor but is not a backlink class of a onepage website
\t\t\telse if(url.indexOf('#') >= 0 && !elem.hasClass('backlink'))
\t\t\t{
\t\t\t\thasAccess = false;
\t\t\t}
\t\t\t
\t\t\t// prevent links that are not part of the current site structure
\t\t\t//if(objValidUrls.indexOf(url) < 0)
\t\t\t//{
\t\t\t//\thasAccess = false;
\t\t\t//}
\t\t\t//
\t\t\t//// news reader
\t\t\t//if(jQuery(this).parent('.more').length > 0)
\t\t\t//{
\t\t\t//\thasAccess = true;
\t\t\t//}
\t\t\t
\t\t\t// prevent lightbox links
\t\t\tif(elem.attr('data-lightbox') !== undefined || elem.attr('rel') == 'lightbox')
\t\t\t{
\t\t\t\t// prevent default clicking behaviour
\t\t\t\tevent.preventDefault();
\t\t\t
\t\t\t\t// show warning
\t\t\t\talert('Please run the ThemeDesigner in Live mode to enable lightbox elements.');
\t\t\t\treturn false;
\t\t\t}

\t\t\tif(hasAccess === true)
\t\t\t{
\t\t\t\t// prevent default clicking behaviour
\t\t\t\tevent.preventDefault();
\t\t\t
\t\t\t\t// show iframe loader
\t\t\t\tjQuery('#themedesigner_iframe_wrapper .loader',parent.document).addClass('show');
\t\t\t\t
\t\t\t\t// add class
\t\t\t\tjQuery('body',parent.document).addClass('waiting_for_iframe');
\t\t\t\t
\t\t\t\t// fire event
\t\t\t\t//jQuery('body',parent.document).trigger('ThemeDesigner.iframeChange',{'url':url});
\t\t\t\t
\t\t\t\t// set cookie
\t\t\t\t//document.cookie = '<?= \$this->cookie; ?>='+url;
\t\t\t\t
\t\t\t\t// change src of parent iframe
\t\t\t\t//jQuery('#themedesigner_iframe',parent.document).attr('src',url+'?themedesigner_iframe=1');
\t\t\t\t
\t\t\t\t// send ajax and remember new page url
\t\t\t\tjQuery.ajax(
\t\t\t\t{
\t\t\t\t\tmethod\t: \"GET\",
\t\t\t\t\turl\t\t: strUrl,
\t\t\t\t\tdata\t: {'themedesigner':1,'action':'updateIframeUrl','url':url,'theme':'<?= \$this->theme; ?>'},
\t\t\t\t\tsuccess\t: function(response)
\t\t\t\t\t{
\t\t\t\t   \t\tif(url.indexOf('?') >= 0)
\t\t\t\t   \t\t{
\t\t\t\t\t   \t\tvar tmp = url.split('?');
\t\t\t\t\t   \t\turl = tmp[0];
\t\t\t\t   \t\t}
\t\t\t\t   \t\t
\t\t\t\t   \t\tconsole.log('Redirect iframe to: '+url);
\t\t\t\t
\t\t\t\t   \t\t// change 
\t\t\t\t   \t\t//window.location.href = url;
\t\t\t\t   \t\t//jQuery('#themedesigner_iframe',parent.document).attr('src',url+'?themedesigner_iframe=1');
\t\t\t\t   \t\tif(url.indexOf('?') >= 0)
\t\t\t\t\t\t{
\t\t\t\t\t\t\turl += '&themedesigner_iframe=1';
\t\t\t\t\t\t}
\t\t\t\t\t\telse
\t\t\t\t\t\t{
\t\t\t\t\t\t\turl +='?themedesigner_iframe=1';
\t\t\t\t\t\t}
\t\t\t\t   \t\t
\t\t\t\t   \t\tjQuery('#themedesigner_iframe',parent.document).attr('src',url);
\t\t\t\t   }
\t\t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t//-- forms
\t\t
\t\t// remove auto submits
\t\tjQuery('form[method=\"get\"][onchange=\"this.submit();\"]:not([action=\"\"])').attr('onchange','');
\t\t
\t\tvar objForms = jQuery('form[method=\"get\"]:not([action=\"\"])');
\t\tvar objSubmit = undefined;
\t\t
\t\t// prevent submits from submitting
\t\tobjForms.find('input[type=\"submit\"]').click(function(event)
\t\t{
\t\t\t//event.preventDefault();
\t\t\tobjSubmit = jQuery(event.target);
\t\t});
\t\t
\t\t// bind change listener to form and submit it to trigger submit event listener
\t\tobjForms.change(function(event)
\t\t{
\t\t\tevent.preventDefault();
\t\t\tjQuery(this).submit();
\t\t});
\t\t
\t\t// simulate form submit and redirect iframe to url with GET parameters
\t\tobjForms.submit(function(event,params)
\t\t{
\t\t\tevent.preventDefault();
\t\t\t
\t\t\tvar url = jQuery(this).attr('action');
\t\t\tvar strParams = jQuery(this).serialize();
\t\t\t
\t\t\t// form submitted by a submit input
\t\t\tif(objSubmit !== undefined)
\t\t\t{
\t\t\t\tif(objSubmit.hasClass('clearall'))
\t\t\t\t{
\t\t\t\t\tstrParams = '';
\t\t\t\t}
\t\t\t}
\t\t\t
\t\t\tif(strParams.length > 0)
\t\t\t{
\t\t\t\tif(url.indexOf('?') >= 0)
\t\t\t\t{
\t\t\t\t\turl += '&'+strParams;
\t\t\t\t}
\t\t\t\telse 
\t\t\t\t{
\t\t\t\t\turl += '?'+strParams;
\t\t\t\t}
\t\t\t}
\t\t\t
\t\t\t// send ajax and remember new page url
\t\t\tjQuery.ajax(
\t\t\t{
\t\t\t\tmethod\t: \"GET\",
\t\t\t\turl\t\t: strUrl,
\t\t\t\tdata\t: {'themedesigner':1,'action':'updateIframeUrl','url':url,'theme':'<?= \$this->theme; ?>'},
\t\t\t\tsuccess\t: function(response)
\t\t\t\t{
\t\t\t\t\tconsole.log('Redirect iframe to: '+url);
\t\t\t\t\t
\t\t\t\t\t// change iframe src
\t\t\t\t\tjQuery('#themedesigner_iframe',parent.document).attr('src',url);
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t});
\t\t
\t}, intDelay);
}); 

</script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/js/js_themedesigner_iframe_helper.html5";
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
        return new Source("", "@pct_themer/themedesigner/js/js_themedesigner_iframe_helper.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/js/js_themedesigner_iframe_helper.html5");
    }
}
