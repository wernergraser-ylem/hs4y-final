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

/* @pct_autogrid/backend/be_js_autogrid.html5 */
class __TwigTemplate_66266f05902ef30843800d77ba95e0f1 extends Template
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
<?php if(\$this->context == 'listElement'): ?>
<script>

/**
 * Pass grid related information to list elements rows and build grid class toggler
 */
jQuery(document).ready(function() 
{
\tvar objElement = jQuery('#li_<?= \$this->id; ?>');
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}

\t<?php // return when AG is disabled
\tif(!\$this->autogrid): ?>
\treturn;
\t<?php endif; ?>
\t
\tvar strType = '<?= \$this->type; ?>';
\tobjElement.addClass(strType);
\t// viewport
\tvar strViewport = 'desktop';
\tif( localStorage.getItem('autogrid_viewport') );
\t{
\t\tstrViewport = localStorage.getItem('autogrid_viewport');
\t}
\t
\tvar blnShowButtons = Boolean(<?= \$this->blnShowButtons; ?>);
\tobjElement.attr('data-type',strType);
\tobjElement.addClass('<?= \$this->input_classes; ?>');

\t// build PLUS/MINUS toggler
\tif(blnShowButtons === true)
\t{
\t\tobjElement.attr('data-grid','<?= \$this->AutoGrid->desktop; ?>');
\t\tobjElement.attr('data-tablet','<?= \\str_replace(array('_m','_t'),'',\$this->AutoGrid->tablet ?: \$this->AutoGrid->desktop); ?>');
\t\tobjElement.attr('data-mobile','<?= \\str_replace(array('_m','_t'),'',\$this->AutoGrid->mobile ?: 'col_12'); ?>');
\t\t// set value by viewport
\t\tif( strViewport != 'desktop' && strViewport.length > 0 )
\t\t{
\t\t\tobjElement.attr('data-grid', objElement.attr('data-'+strViewport) );
\t\t}

\t\tobjElement.addClass('hasButtons');
\t\tvar arrClasses = JSON.parse('<?= json_encode( array_reverse(\$GLOBALS['PCT_AUTOGRID']['classes']) ); ?>');
\t\t
\t\t<?php 
\t\t\$objButtons = new \\Contao\\BackendTemplate('be_autogrid_buttons');
\t\t\$objButtons->setData(\$this->getData());
\t\t\$strButtons = \$objButtons->parse();
\t\t?>
\t\tvar strButtons = '<?= \\Contao\\StringUtil::substrHtml(\$strButtons,strlen(\$strButtons)); ?>';
\t\tobjElement.find('> div').prepend(strButtons);
\t\t
\t\tvar objButtons = objElement.find('.autogrid_buttons .button');
\t\tvar objRequest = null;
\t\tvar intDelay = <?= \$GLOBALS['PCT_AUTOGRID']['BACKEND']['ajaxInteractionDelay'] ?: 500; ?>;
\t\tvar varTimeout = 0;

\t\tobjButtons.click(function(e) 
\t\t{
\t\t\tvar currClass = objElement.attr('data-grid');
\t\t\tvar index = arrClasses.indexOf(currClass);
\t\t\tvar action = jQuery(this).data('action');
\t\t\t// viewport
\t\t\tstrViewport = 'desktop';
\t\t\tif( localStorage.getItem('autogrid_viewport') );
\t\t\t{
\t\t\t\tstrViewport = localStorage.getItem('autogrid_viewport');
\t\t\t}
\t\t\t
\t\t\t// up
\t\t\tif(action == 'up' && index < arrClasses.length )
\t\t\t{
\t\t\t\tindex++;
\t\t\t}
\t\t\t// down
\t\t\telse if(action == 'down' && index >= 0)
\t\t\t{
\t\t\t\tindex--;
\t\t\t}
\t\t\t// index out of range
\t\t\tif(index >= arrClasses.length || index < 0)
\t\t\t{
\t\t\t\treturn;
\t\t\t}
\t\t\t
\t\t\t// remove the old class
\t\t\tobjElement.removeClass(arrClasses);
\t\t\t// new class
\t\t\tvar newClass = arrClasses[index];
\t\t\t// apply new class
\t\t\tobjElement.attr('data-grid',newClass);
\t\t\tobjElement.parent('.column').attr('data-grid',newClass);
\t\t\t
\t\t\t// apply to parent div.columns
\t\t\tobjElement.closest('.column').removeClass(currClass);
\t\t\tobjElement.closest('.column').addClass(newClass);
\t\t\t
\t\t\t// update infobox
\t\t\tobjElement.find('.autogrid .infobox').html(newClass);
\t\t\t
\t\t\t// cancel running timeouts
\t\t\tif( varTimeout > 0 )
\t\t\t{
\t\t\t\tclearTimeout(varTimeout);
\t\t\t}

\t\t\t// trigger immediate event
\t\t\tjQuery(document).trigger('AUTOGRID.grid_resize',{'id':<?= \$this->id; ?>,'grid':newClass,'viewport':strViewport});
\t\t\t
\t\t\tvarTimeout = setTimeout(function() 
\t\t\t{
\t\t\t\t// stop running request
\t\t\t\tif( objRequest !== null && objRequest != undefined )
\t\t\t\t{
\t\t\t\t\tobjRequest.abort();
\t\t\t\t}

\t\t\t\tobjRequest = jQuery.ajax(
\t\t\t\t{
\t\t\t\t\turl: location.href,
\t\t\t\t\tmethod:'GET',
\t\t\t\t\tdata: {'autogrid':1,'elem':<?= \$this->id; ?>,'class':newClass,'viewport':strViewport},
\t\t\t\t\tcomplete: function()
\t\t\t\t\t{
\t\t\t\t\t\t// trigger event after ajax
\t\t\t\t\t\tjQuery(document).trigger('AUTOGRID.grid_resize_complete',{'id':<?= \$this->id; ?>,'grid':newClass,'viewport':strViewport});
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}, intDelay);\t\t
\t\t});
\t}
});

</script>
<?php endif; ?>


<?php if( in_array(\$this->type, \$GLOBALS['PCT_AUTOGRID']['startElements']) ): ?>
<script>
\t
/**
 * Toggle visibility for a whole AG block
 */
// !-- toogle: visibility
jQuery(document).ready(function() 
{
\tvar objElement = jQuery('#li_<?= \$this->id; ?>');
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}

\tobjElement.find('[data-class=\"toggle\"]').addClass('toggle');
\tobjElement.find('img[data-icon-disabled=\"invisible.svg\"]').parent('a').addClass('toggle')
\t
\tobjButton = objElement.find('.toggle');
\t
\t// remove contaos onclick Ajax
\tobjButton.removeAttr('onclick');
\t//objButton.attr('onclick=\"Backend.getScrollOffset()\"');

\tvar arrElements = [objElement];
\t
\t<?php // find elements in block 
\t\$objElements = \\PCT\\AutoGrid\\Models\\ContentModel::findAllByStartId( \$this->id );
\tif( \$objElements !== null ): ?>
\t<?php foreach( \$objElements as \$model ): ?>
\tarrElements.push( jQuery('#li_<?= \$model->id; ?>') );
\t<?php endforeach; ?>
\t<?php endif; ?>
\t
\tjQuery.each(arrElements, function(i,elem)
\t{
\t\telem.find('[data-class=\"toggle\"]').addClass('toggle');
\t\telem.find('img[data-icon-disabled=\"invisible.svg\"]').parent('a').addClass('toggle');
\t});

\tvar src_visible = window.Backend.themePath + 'icons/visible.svg';
\tvar src_invisible = window.Backend.themePath+ 'icons/invisible.svg';

\tobjButton.click(function(e)
\t{
\t\te.preventDefault();
\t\t
\t\tvar _this = jQuery(this);

\t\t// invoke the Backend methods
\t\tBackend.getScrollOffset();

\t\tvar state = parseInt( _this.find('img').attr('data-state') );
\t\t
\t\t// toggle the img src and element state
\t\tif( state < 1 )
\t\t{
\t\t\tjQuery.each(arrElements, function(i,elem)
\t\t\t{
\t\t\t\ticon = elem.find('.toggle img');
\t\t\t\ticon.attr('src', src_visible);
\t\t\t\ticon.attr('data-state',1);
\t\t\t\telem.find('.cte_type').removeClass('unpublished');
\t\t\t\telem.find('.cte_type').addClass('published');
\t\t\t});
\t\t}
\t\telse
\t\t{
\t\t\tjQuery.each(arrElements, function(i,elem)
\t\t\t{
\t\t\t\ticon = elem.find('.toggle img');
\t\t\t\ticon.attr('src', src_invisible);
\t\t\t\ticon.attr('data-state',0);
\t\t\t\telem.find('.cte_type').removeClass('published');
\t\t\t\telem.find('.cte_type').addClass('unpublished');
\t\t\t});
\t\t}

\t\t
\t\t// send ajax
\t\tjQuery.ajax(
\t\t{
\t\t\turl: location.href,
\t\t\tmethod:'GET',
\t\t\tdata: {'action':'toggleAutoGridBlockVisibility','elem':<?= \$this->id; ?>,'state':state}
\t\t});
\t});
});

</script>

<script>\t
/**
 * Same height toggler
 */
// !-- toggle: same height
jQuery(document).ready(function() 
{
\tvar objElement = jQuery('#li_<?= \$this->id; ?>');
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}
\t
\tvar strField = 'autogrid_sameheight';
\tvar objButton = objElement.find('[data-field=\"'+strField+'\"]');
\t
\tobjButton.click(function(e)
\t{
\t\te.stopPropagation();
\t\te.preventDefault();

\t\tvar varValue = jQuery(this).attr('data-value');

\t\tif( varValue == 1 )
\t\t{
\t\t\tjQuery(this).removeClass('active');
\t\t\tvarValue = 0;
\t\t}
\t\telse if( varValue == 0 || varValue == undefined )
\t\t{
\t\t\tjQuery(this).addClass('active');
\t\t\tvarValue = 1;
\t\t}

\t\tjQuery(this).attr('data-value',varValue);

\t\t// send event
\t\tjQuery(document).trigger('AUTOGRID.sameheight',{'elem':<?= \$this->id; ?>,'value':varValue});

\t\t// send ajax
\t\tjQuery.ajax(
\t\t{
\t\t\turl: location.href,
\t\t\tmethod:'GET',
\t\t\tdata: {'action':'toggleAutoGridFieldValue','elem':<?= \$this->id; ?>,'state':varValue,'field':strField}
\t\t});
\t\t\t
\t});
});

/**
 * Gutter toggler
 */
// !-- toggler: gutter
jQuery(document).ready(function() 
{
\tvar objElement = jQuery('#li_<?= \$this->id; ?>');
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}
\t
\tvar strField = 'autogrid_gutter';
\tvar objButton = objElement.find('[data-field=\"'+strField+'\"]');
\t
\tobjButton.click(function(e)
\t{
\t\te.stopPropagation();
\t\te.preventDefault();

\t\tobjButton.not(this).removeClass('active');
\t\tvar varValue = jQuery(this).attr('data-value');
\t\t
\t\tif( jQuery(this).hasClass('active') )
\t\t{
\t\t\tvarValue = '';
\t\t}
\t\t
\t\tjQuery(this).toggleClass('active');
\t\t
\t\t// send event
\t\tjQuery(document).trigger('AUTOGRID.gutter',{'elem':<?= \$this->id; ?>,'value':varValue});

\t\t// send ajax
\t\tjQuery.ajax(
\t\t{
\t\t\turl: location.href,
\t\t\tmethod:'GET',
\t\t\tdata: {'action':'toggleAutoGridFieldValue','elem':<?= \$this->id; ?>,'state':varValue,'field':strField}
\t\t});
\t});
});
</script>
<?php endif; ?>
\t
<?php if(\$this->context == 'body'): ?>
<script>

<?php if(isset(\$GLOBALS['PCT_AUTOGRID']['autogridGridPreviews']) && !empty(\$GLOBALS['PCT_AUTOGRID']['autogridGridPreviews']) ): ?>
/**
 * Build Grid [flex, grid] preview
 */
jQuery(document).ready(function() 
{
\t<?php 
\t\$arrProcessed = array();
\t?>
\t
\t<?php foreach(\$GLOBALS['PCT_AUTOGRID']['autogridGridPreviews'] as \$data): ?>
\tvar objStart = jQuery('#li_<?= \$data['start']; ?>');
\tvar objStop = jQuery('#li_<?= \$data['stop']; ?>');
\t
\tvar container = jQuery('<li class=\"grid_preview_li\" data-start=\"<?= \$data['start']; ?>\" data-stop=\"<?= \$data['stop']; ?>\"><?= \$data['html']; ?></li>').insertBefore(objStart);
\tvar left = objStart.find('.tl_content .cte_type').wrap('<div class=\"left\"></div>');
\tobjStart.find('.tl_content .tl_content_right').wrap('<div class=\"right\"></div>');
\tobjStart.find('.autogrid_info').detach().insertAfter( left );
\t
\t<?php foreach(\$data['ids'] as \$id): ?>
\tvar placeholder = jQuery('.placeholder[data-id=\"<?= \$id; ?>\"]');
\t<?php 
\t// skip elements already processed before
\tif( in_array(\$id, \$arrProcessed) )
\t{
\t\tcontinue;
\t}
\t?>
\t
\tvar tl_content = jQuery('#li_<?= \$id; ?>');
\tplaceholder.replaceWith(tl_content);
\t<?php \$arrProcessed[] = \$id; endforeach; ?>
\t
\t<?php endforeach; ?>

\t<?php if( \\version_compare(\$this->contao_version,'5.0','<=') ): ?>
\t// Create .inside wrapper in tl_content listings
\tjQuery('.grid_preview_li .tl_content').wrapInner('<div class=\"inside\"></div>');
\t<?php endif; ?>
\t
\t// add body class
\tjQuery('body').addClass('grid_preview_active');
});

<?php if( isset(\$this->viewport_panel) && !empty(\$this->viewport_panel) ): ?>
/**
 * Create viewport button panel and apply viewport based classes
 */
jQuery(document).ready(function() 
{
\t// localstorage
\tvar strViewport = localStorage.getItem('autogrid_viewport');
\tif ( strViewport == null || strViewport == undefined )
\t{
\t\tstrViewport = 'desktop';
\t\tlocalStorage.setItem('autogrid_viewport',strViewport);
\t}
\t// set body class
\tjQuery('body').addClass('viewport_'+strViewport);
\t// inject panel in contao listing
\tjQuery('#tl_listing .tl_header').after('<?= \$this->viewport_panel; ?>');
\t// set button active
\tjQuery('#autogrid_viewport_panel .clickable.'+strViewport).addClass('active');
\t
\tjQuery('#autogrid_viewport_panel .clickable').click(function(e)
\t{
\t\tvar strViewport = jQuery(this).data('viewport');
\t\t// toggle active
\t\tjQuery(this).siblings('.clickable').removeClass('active');
\t\tjQuery(this).addClass('active');
\t\t
\t\t// send ajax
\t\tjQuery.ajax(
\t\t{
\t\t\turl: location.href,
\t\t\tmethod:'POST',
\t\t\tdata: {'action':'toggleAutoGridViewport','viewport':strViewport}
\t\t});
\t\t// remove body classes
\t\tjQuery('body').removeClass(['viewport_desktop','viewport_mobile','viewport_tablet']);
\t\t// set body class
\t\tjQuery('body').addClass('viewport_'+strViewport);
\t\t// store in localstorage
\t\tlocalStorage.setItem('autogrid_viewport',strViewport);
\t\t// trigger event
\t\tjQuery(document).trigger('AUTOGRID.viewport',{'viewport':strViewport});
\t});

\t//!-- apply viewport classes to hasViewport elements
\tvar objElements = jQuery('.hasViewport');
\t// remove current grid classes
\tvar arrClasses = JSON.parse('<?= json_encode( array_reverse(\$GLOBALS['PCT_AUTOGRID']['classes']) ); ?>');
\tobjElements.removeClass(arrClasses);
\t// apply classes by viewport on page load
\tjQuery.each(objElements,function(i,elem)
\t{
\t\telem = jQuery(elem);
\t\tvar viewport_class = elem.attr('data-'+strViewport);
\t\telem.addClass( viewport_class );

\t\t// flex row on content elements
\t\tif( elem.hasClass('cte') )
\t\t{
\t\t\tvar objCte = elem.children('.hasButtons');
\t\t\tviewport_class = objCte.attr('data-'+strViewport);
\t\t\telem.addClass( viewport_class );
\t\t}

\t\tvar li = elem.children('.autogridColStart');
\t\tli.attr('data-grid',viewport_class);
\t});
});

//!-- Event listener: AUTOGRID.viewport
jQuery(document).on('AUTOGRID.viewport',function(e,params)
{
\tvar objElements = jQuery('.hasViewport');
\t// remove current grid classes
\tvar arrClasses = JSON.parse('<?= json_encode( array_reverse(\$GLOBALS['PCT_AUTOGRID']['classes']) ); ?>');
\tobjElements.removeClass(arrClasses);
\t// apply classes by viewport
\tjQuery.each(objElements,function(i,elem)
\t{
\t\telem = jQuery(elem);
\t\tvar viewport_class = elem.attr('data-'+params.viewport);
\t\telem.addClass( viewport_class );
\t\telem.attr('data-grid',viewport_class);
\t\telem.attr('data-'+params.viewport,viewport_class);
\t\t// flex row on content elements
\t\tif( elem.hasClass('cte') )
\t\t{
\t\t\tvar objCte = elem.children('.hasButtons');
\t\t\tviewport_class = objCte.attr('data-'+params.viewport);
\t\t\telem.addClass( viewport_class );
\t\t}
\t\tvar li = elem.children('.autogridColStart, .hasButtons');
\t\tli.attr('data-grid',viewport_class);
\t\tli.attr('data-'+params.viewport,viewport_class);
\t});
});
//--

//!-- Event listener: AUTOGRID.grid_resize
jQuery(document).on('AUTOGRID.grid_resize',function(e,params)
{
\tvar arrClasses = JSON.parse('<?= json_encode( array_reverse(\$GLOBALS['PCT_AUTOGRID']['classes']) ); ?>');
\t
\t// AG columns
\tvar objElement = jQuery('.hasViewport[data-id=\"'+params.id+'\"]');
\tobjElement.attr('data-grid',params.grid);
\tobjElement.attr('data-'+params.viewport,params.grid);
\t
\t// user resized in tablet view
\tif(params.viewport == 'tablet')
\t{
\t\tobjElement.removeClass('no_tablet_grid');
\t}

\tvar inheritDesktop = false;
\tif( objElement.hasClass('no_tablet_grid') )
\t{
\t\tinheritDesktop = true;
\t}
\t
\tif( inheritDesktop )
\t{
\t\tobjElement.attr('data-tablet', objElement.attr('data-desktop') );
\t}

\t// flex row on content elements
\tif( objElement.hasClass('cte') )
\t{
\t\tvar objCte = objElement.children('.hasButtons');
\t\tviewport_class = objCte.attr('data-'+params.viewport);
\t\tif( inheritDesktop )
\t\t{
\t\t\tobjCte.attr('data-tablet', objCte.attr('data-desktop') );
\t\t}
\t\t//objElement.addClass( viewport_class );
\t}
\tvar li = jQuery('#li_'+params.id);
\tli.attr('data-grid',params.grid);
\tli.attr('data-'+params.viewport,params.grid);
\tif( inheritDesktop )
\t{
\t\tli.attr('data-tablet', objElement.attr('data-desktop') );
\t}

});
<?php endif; ?>


/**
 * Same height event listener
 */
// ! Event listener: same height toggler
 jQuery(document).on('AUTOGRID.sameheight',function(e,params)
{
\tvar objElement = jQuery('#li_'+params.elem);
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}

\tif( params.value == 1)
\t{
\t\tobjElement.next('.autogrid_row, .autogrid_grid').addClass('same_height');
\t}
\telse if( params.value == 0)
\t{
\t\tobjElement.next('.autogrid_row, .autogrid_grid').removeClass('same_height');
\t}
});


/**
 * Gutter event listener
 */
// ! Event listener: gutter toggler
jQuery(document).on('AUTOGRID.gutter',function(e,params)
{
\tvar objElement = jQuery('#li_'+params.elem);
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}

\tvar arrClasses = ['gutter_l','gutter_m','gutter_s','gutter_none'];
\tobjElement.next('.autogrid_row, .autogrid_grid').removeClass(arrClasses).addClass(params.value);
});

<?php endif; ?>

/**
 * Add a body class with the current user action as class name
 */
jQuery(document).ready(function() 
{
\t<?php 
\t\$objSession = \\Contao\\System::getContainer()->get('request_stack')->getSession();
\t\$arrClipboard = \$objSession->get('CLIPBOARD');
\t\$arrClass = array();
\tif( isset(\$arrClipboard[ \\Contao\\Input::get('table') ]['mode']) )
\t{
\t\t\$mode = \$arrClipboard[ \\Contao\\Input::get('table') ]['mode'];
\t\t\$arrClass = array( \$mode,'paste' );
\t}

\t\$strAct = \\Contao\\Input::get('act') ?? '';
\tif( \$strAct != '' )
\t{
\t\t\$arrClass[] = \$strAct;
\t\tif( in_array(\$strAct,array('copyAll','copy','cutAll','cut')) )
\t\t{
\t\t\t\$arrClass[] = 'paste';
\t\t}
\t}
\t
\tif( \\Contao\\Input::get('mode') != '' )
\t{
\t\t\$arrClass[] = \\Contao\\Input::get('mode');
\t}
\t
\t\$arrClass = array_unique(array_filter(\$arrClass));
\t?>
\t
\t<?php if( empty(\$arrClass) === false ): ?>
\tjQuery('body').addClass('<?= \\implode(' ', \$arrClass); ?> ');
\t<?php endif; ?>
});

</script>
<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/backend/be_js_autogrid.html5";
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
        return new Source("", "@pct_autogrid/backend/be_js_autogrid.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/backend/be_js_autogrid.html5");
    }
}
