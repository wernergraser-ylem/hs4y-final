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

/* @pct_customelements/backend/be_js_moo_fxslide.html5 */
class __TwigTemplate_c4032e893ccf95f6ca5652ad90d13f4d extends Template
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
        yield "<?php
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright\tTim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author\t\tTim Gatzky <info@tim-gatzky.de>
 * @package\t\tpct_customelements
 * @link\t\thttp://contao.org
 */
?>

<?php
\$objSession = \\Contao\\System::getContainer()->get('request_stack')->getSession();
\$arrSession = \$objSession->get('pct_customelements_togglers');
\$phpsession = '';
if(\$arrSession)
{
\t\$phpsession = json_encode(\$arrSession);
}
?>

<script>

/**
 * Init MooTxSlide
 */
var initCustomElementTogglers = function()
{
\tvar togglers = \$\$('div.slide_toggler');
\tif(togglers.length < 1)
\t{
\t\treturn false;
\t}
\t
\t// get php session
\tvar phpsession = '<?php echo \$phpsession ? \$phpsession : ''; ?>';
\tvar session = {};
\tif(phpsession.length > 0)
\t{
\t\tsession = JSON.parse(phpsession);
\t}
\ttogglers.each(function(elem,index)
\t{
\t\t// add click event
\t\telem.addEvent('click', function(event)
\t\t{
\t\t\tevent.preventDefault();
\t\t\tevent.stopPropagation();

\t\t\tvar toggler = elem;
\t\t\tvar p = toggler.getParent('div.group');
\t\t\tvar ident = p.getAttribute('data-id')+'_'+p.getAttribute('data-copy');
\t\t\tvar slide = document.getElementById('slide_'+ident);
\t\t\t
\t\t\tif(slide.hasClass('active'))
\t\t\t{
\t\t\t\ttoggler.removeClass('active');
\t\t\t\tslide.removeClass('active');
\t\t\t\t
\t\t\t\tstate = 'open';
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\ttoggler.addClass('active');
\t\t\t\tslide.addClass('active');
\t\t\t\t
\t\t\t\tstate = 'closed';
\t\t\t}

\t\t\tsession['group_toggler_'+ident] = state;
\t\t\t
\t\t\t// send ajax request with session data
\t\t\tnew Request.Contao().post({'action':'toggleCustomElementSlide','toggler':'group_toggler_'+ident,'state':state,'session':JSON.stringify(session),'pct_customelements':1,'REQUEST_TOKEN':Contao.request_token});
\t
\t\t});
\t});
}

window.addEvent('domready', function() 
{
\tinitCustomElementTogglers();
});

window.addEvent('CustomElements.duplicate_group', function(params) 
{
\tvar elem = \$\$('#group_toggler_'+params.newGroupId);
\tvar slide = document.getElementById('slide_'+params.newGroupId);
\t
\t// get php session
\tvar phpsession = '<?= \$phpsession ?? ''; ?>';
\tvar session = {};
\tif(phpsession.length > 0)
\t{
\t\tsession = JSON.parse(phpsession);
\t}

\telem.addEvent('click', function(event)
\t{
\t\tevent.preventDefault();
\t\tevent.stopPropagation();
\t\t
\t\tif(slide.hasClass('active'))
\t\t{
\t\t\telem.removeClass('active');
\t\t\tslide.removeClass('active');
\t\t\t
\t\t\tsession[params.newGroupId] = 'open';
\t\t}
\t\telse
\t\t{
\t\t\telem.addClass('active');
\t\t\tslide.addClass('active');
\t\t\t
\t\t\tsession[params.newGroupId] = 'closed';
\t\t}
\t\t
\t\t// send ajax request with session data
\t\tnew Request.Contao().post({'action':'toggleCustomElementSlide','toggler':params.newGroupId,'state':session[params.newGroupId],'session':JSON.stringify(session),'pct_customelements':1,'REQUEST_TOKEN':Contao.request_token});
\t});
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
        return "@pct_customelements/backend/be_js_moo_fxslide.html5";
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
        return new Source("", "@pct_customelements/backend/be_js_moo_fxslide.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_js_moo_fxslide.html5");
    }
}
