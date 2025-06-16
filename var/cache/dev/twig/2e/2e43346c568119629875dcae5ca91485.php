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

/* @pct_theme_templates/modules/mod_newslist_portfolio_demos.html5 */
class __TwigTemplate_1a85d731e6a074b0fd51f238730b7e13 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_newslist_portfolio_demos.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_newslist_portfolio_demos.html5"));

        // line 1
        yield "<?php
namespace Contao;\t

\$arrModel = ModuleModel::findByPk(\$this->id)->originalRow();
\$arrCssID =  StringUtil::deserialize(\$arrModel['cssID']);

\$GLOBALS['SEO_SCRIPTS_FILE'][]  = 'files/cto_layout/scripts/isotope/jquery.isotope.min.js|static';
\$GLOBALS['SEO_SCRIPTS_FILE'][]  = 'files/cto_layout/scripts/isotope/isotope_plugin_masonry.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/isotope/isotope_styles.css|static';
?>
<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

<div id=\"portfolio_<?php echo \$this->id; ?>\" class=\"mod_portfoliolist_demos isotope <?= \$arrCssID[1]; ?>\">
 <?php if (empty(\$this->articles)): ?>
    <p class=\"empty\"><?php echo \$this->empty; ?></p>
  <?php else: ?>
    <?php echo implode('', \$this->articles); ?>
  <?php endif; ?>
</div>
<?php echo \$this->pagination; ?>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(window).on('load', function()
{
\tvar allowEmpty = false; // if set to true, the list will be empty on no results
  \tvar container = jQuery('#portfolio_<?php echo \$this->id; ?>');
\tcontainer.isotope({
\t\titemSelector: '.item',
\t\tresizable: true,
\t\tmasonry: {}
\t});

\tvar buttons = jQuery('.ce_portfoliofilter').find('a');
\tvar buttonAll = jQuery('.ce_portfoliofilter a.all');
\tvar filters = [];
\tvar urlParam = 'filter'; // the GET parameter containing the filter values
\tvar classPrefix = '.filter_';
\tvar filter_all = '*'; // is not a filter
\tvar isStrict = false; // strict filtering
\tvar singleAction = true; // only one category active at a time
\tvar overwriteLinks = true; // append the filter params to the details links
\tvar addToUrl = true; // append selected filters to the url
\tvar links = container.find('.item a');
\t
\t// get filters from localStorage
\tif( localStorage.getItem('portfolio_<?= \$this->id; ?>') != undefined )
\t{
\t\tfilters = localStorage.getItem('portfolio_<?= \$this->id; ?>').split(',');
\t}
\t
\t// check url for predefined filters via GET parameters 
\t<?php if(\\Contao\\Input::get('filter') != ''): ?>
\t<?php foreach(explode(',',\\Contao\\Input::get('filter')) as \$filter): ?>
\tfilters.push(classPrefix+'<?= \$filter; ?>');
\t<?php endforeach; ?>
\t
\t// append the current filter values to the details links in the newslist
\tif(filters.length > 0 && overwriteLinks)
\t{
\t\t// push the new GET parameters to the url
\t\tvar arrGet = new Array();
\t\tjQuery.each(filters, function(i,f)
\t\t{
\t\t\tif(f != filter_all)
\t\t\t{
\t\t\t\tarrGet.push( f.replace(classPrefix, '') );
\t\t\t}
\t\t});
\t\t
\t\tjQuery.each(links, function(index, elem)
\t\t{
\t\t\tvar href = jQuery(elem).attr('href').split('?');
\t\t\tjQuery(elem).attr('href',href[0]+'?'+urlParam+'='+arrGet.join(','));
\t\t});
\t}\t
\t
\t<?php endif; ?>\t

\t// apply filters
\tif(filters.length > 0)
\t{
\t\tif(isStrict)
\t\t{
\t\t\tcontainer.isotope({ filter: filters.join(' ') });
\t\t}
\t\telse
\t\t{
\t\t\tcontainer.isotope({ filter: filters.join(',') });
\t\t}
\t\t
\t\t// illiterate through the buttons and filters
\t\tjQuery.each(buttons, function(index,elem)
\t\t{
\t\t\tjQuery.each(filters, function(i,f)
\t\t\t{
\t\t\t\tif(jQuery(elem).attr('data-filter') == f)
\t\t\t\t{
\t\t\t\t\tbuttons.removeClass('selected');
\t\t\t\t\tjQuery(elem).addClass('selected');
\t\t\t\t}
\t\t\t});
\t\t});
\t}
\t
\tbuttons.click(function(e)
\t{
\t\te.preventDefault
\t\tvar _this = jQuery(this);
\t\tvar value = _this.attr('data-filter');
\t\t
\t\t// reset
\t\tif(value == filter_all)
\t\t{
\t\t\tbuttons.removeClass('selected');
\t\t\tbuttonAll.addClass('selected');
\t\t\tfilters = [];
\t\t\tif(allowEmpty)
\t\t\t{
\t\t\t\tcontainer.isotope({ filter: '.thereShallBeNoEntry' });
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\tcontainer.isotope({filter:'*'});
\t\t\t}
\t\t\t
\t\t\t// remove from localStorage
\t\t\tlocalStorage.removeItem('portfolio_<?= \$this->id; ?>');

\t\t\treturn false;
\t\t}
\t\t
\t\tif(singleAction)
\t\t{
\t\t\tbuttons.removeClass('selected');
\t\t\tfilters = [];
\t\t}
\t\t\t
\t\tif(_this.hasClass('selected'))
\t\t{
\t\t\t_this.removeClass('selected');
\t\t\tfilters.splice(filters.indexOf(value),1);
\t\t}
\t\telse
\t\t{
\t\t\t_this.addClass('selected');
\t\t\tfilters.push(value);
\t\t}
\t\t
\t\t// set an \"impossible\" filter value if empty results are allowed
\t\tif(allowEmpty && filters.length < 1)
\t\t{
\t\t\tcontainer.isotope({ filter: '.thereShallBeNoEntry' });
\t\t\treturn false;
\t\t}
\t\t
\t\tif(isStrict)
\t\t{
\t\t\tcontainer.isotope({ filter: filters.join(' ') });
\t\t}
\t\telse
\t\t{
\t\t\tcontainer.isotope({ filter: filters.join(',') });
\t\t}

\t\t// store filters in localStorage
\t\tlocalStorage.setItem('portfolio_<?= \$this->id; ?>',filters.join(','));
\t\t
\t\treturn false;
\t});
\t
\t
\t// check if scrollbar is active
\tif(jQuery(document).height() > jQuery(window).height())
\t{
\t\tcontainer.isotope({});
\t}
});


</script>
<!-- SEO-SCRIPT-STOP -->
<?php \$this->endblock(); ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_newslist_portfolio_demos.html5";
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
namespace Contao;\t

\$arrModel = ModuleModel::findByPk(\$this->id)->originalRow();
\$arrCssID =  StringUtil::deserialize(\$arrModel['cssID']);

\$GLOBALS['SEO_SCRIPTS_FILE'][]  = 'files/cto_layout/scripts/isotope/jquery.isotope.min.js|static';
\$GLOBALS['SEO_SCRIPTS_FILE'][]  = 'files/cto_layout/scripts/isotope/isotope_plugin_masonry.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/isotope/isotope_styles.css|static';
?>
<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

<div id=\"portfolio_<?php echo \$this->id; ?>\" class=\"mod_portfoliolist_demos isotope <?= \$arrCssID[1]; ?>\">
 <?php if (empty(\$this->articles)): ?>
    <p class=\"empty\"><?php echo \$this->empty; ?></p>
  <?php else: ?>
    <?php echo implode('', \$this->articles); ?>
  <?php endif; ?>
</div>
<?php echo \$this->pagination; ?>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(window).on('load', function()
{
\tvar allowEmpty = false; // if set to true, the list will be empty on no results
  \tvar container = jQuery('#portfolio_<?php echo \$this->id; ?>');
\tcontainer.isotope({
\t\titemSelector: '.item',
\t\tresizable: true,
\t\tmasonry: {}
\t});

\tvar buttons = jQuery('.ce_portfoliofilter').find('a');
\tvar buttonAll = jQuery('.ce_portfoliofilter a.all');
\tvar filters = [];
\tvar urlParam = 'filter'; // the GET parameter containing the filter values
\tvar classPrefix = '.filter_';
\tvar filter_all = '*'; // is not a filter
\tvar isStrict = false; // strict filtering
\tvar singleAction = true; // only one category active at a time
\tvar overwriteLinks = true; // append the filter params to the details links
\tvar addToUrl = true; // append selected filters to the url
\tvar links = container.find('.item a');
\t
\t// get filters from localStorage
\tif( localStorage.getItem('portfolio_<?= \$this->id; ?>') != undefined )
\t{
\t\tfilters = localStorage.getItem('portfolio_<?= \$this->id; ?>').split(',');
\t}
\t
\t// check url for predefined filters via GET parameters 
\t<?php if(\\Contao\\Input::get('filter') != ''): ?>
\t<?php foreach(explode(',',\\Contao\\Input::get('filter')) as \$filter): ?>
\tfilters.push(classPrefix+'<?= \$filter; ?>');
\t<?php endforeach; ?>
\t
\t// append the current filter values to the details links in the newslist
\tif(filters.length > 0 && overwriteLinks)
\t{
\t\t// push the new GET parameters to the url
\t\tvar arrGet = new Array();
\t\tjQuery.each(filters, function(i,f)
\t\t{
\t\t\tif(f != filter_all)
\t\t\t{
\t\t\t\tarrGet.push( f.replace(classPrefix, '') );
\t\t\t}
\t\t});
\t\t
\t\tjQuery.each(links, function(index, elem)
\t\t{
\t\t\tvar href = jQuery(elem).attr('href').split('?');
\t\t\tjQuery(elem).attr('href',href[0]+'?'+urlParam+'='+arrGet.join(','));
\t\t});
\t}\t
\t
\t<?php endif; ?>\t

\t// apply filters
\tif(filters.length > 0)
\t{
\t\tif(isStrict)
\t\t{
\t\t\tcontainer.isotope({ filter: filters.join(' ') });
\t\t}
\t\telse
\t\t{
\t\t\tcontainer.isotope({ filter: filters.join(',') });
\t\t}
\t\t
\t\t// illiterate through the buttons and filters
\t\tjQuery.each(buttons, function(index,elem)
\t\t{
\t\t\tjQuery.each(filters, function(i,f)
\t\t\t{
\t\t\t\tif(jQuery(elem).attr('data-filter') == f)
\t\t\t\t{
\t\t\t\t\tbuttons.removeClass('selected');
\t\t\t\t\tjQuery(elem).addClass('selected');
\t\t\t\t}
\t\t\t});
\t\t});
\t}
\t
\tbuttons.click(function(e)
\t{
\t\te.preventDefault
\t\tvar _this = jQuery(this);
\t\tvar value = _this.attr('data-filter');
\t\t
\t\t// reset
\t\tif(value == filter_all)
\t\t{
\t\t\tbuttons.removeClass('selected');
\t\t\tbuttonAll.addClass('selected');
\t\t\tfilters = [];
\t\t\tif(allowEmpty)
\t\t\t{
\t\t\t\tcontainer.isotope({ filter: '.thereShallBeNoEntry' });
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\tcontainer.isotope({filter:'*'});
\t\t\t}
\t\t\t
\t\t\t// remove from localStorage
\t\t\tlocalStorage.removeItem('portfolio_<?= \$this->id; ?>');

\t\t\treturn false;
\t\t}
\t\t
\t\tif(singleAction)
\t\t{
\t\t\tbuttons.removeClass('selected');
\t\t\tfilters = [];
\t\t}
\t\t\t
\t\tif(_this.hasClass('selected'))
\t\t{
\t\t\t_this.removeClass('selected');
\t\t\tfilters.splice(filters.indexOf(value),1);
\t\t}
\t\telse
\t\t{
\t\t\t_this.addClass('selected');
\t\t\tfilters.push(value);
\t\t}
\t\t
\t\t// set an \"impossible\" filter value if empty results are allowed
\t\tif(allowEmpty && filters.length < 1)
\t\t{
\t\t\tcontainer.isotope({ filter: '.thereShallBeNoEntry' });
\t\t\treturn false;
\t\t}
\t\t
\t\tif(isStrict)
\t\t{
\t\t\tcontainer.isotope({ filter: filters.join(' ') });
\t\t}
\t\telse
\t\t{
\t\t\tcontainer.isotope({ filter: filters.join(',') });
\t\t}

\t\t// store filters in localStorage
\t\tlocalStorage.setItem('portfolio_<?= \$this->id; ?>',filters.join(','));
\t\t
\t\treturn false;
\t});
\t
\t
\t// check if scrollbar is active
\tif(jQuery(document).height() > jQuery(window).height())
\t{
\t\tcontainer.isotope({});
\t}
});


</script>
<!-- SEO-SCRIPT-STOP -->
<?php \$this->endblock(); ?>", "@pct_theme_templates/modules/mod_newslist_portfolio_demos.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_newslist_portfolio_demos.html5");
    }
}
