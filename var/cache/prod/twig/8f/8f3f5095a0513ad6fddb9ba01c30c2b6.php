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

/* @pct_theme_templates/modules/mod_newslist_portfolio_no_isotope.html5 */
class __TwigTemplate_511136c0e8a3eff227c17970c258057d extends Template
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
        yield "<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

<div id=\"portfolio_<?php echo \$this->id; ?>\" class=\"mod_portfoliolist\">
 <?php if (empty(\$this->articles)): ?>
    <p class=\"empty\"><?php echo \$this->empty; ?></p>
  <?php else: ?>
\t<div class=\"autogrid_wrapper block\">
    <?php echo implode('', \$this->articles); ?>
  \t</div>
  <?php endif; ?>
</div>
<?php if (\$this->pagination): ?>
\t<div class=\"mod_portfoliolist_v1_pagination \">
    \t<?= \$this->pagination ?>
\t</div>
<?php endif; ?>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\tvar allowEmpty = false; // if set to true, the list will be empty on no results
  \tvar container = jQuery('#portfolio_<?php echo \$this->id; ?>');
\tvar items = container.find('.item');
\t
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
\t<?php if(\\Contao\\Input::get('filter') == ''): ?> 
\tif( localStorage.getItem('portfolio_<?= \$this->id; ?>') != undefined )
\t{
\t\tfilters = localStorage.getItem('portfolio_<?= \$this->id; ?>').split(',');
\t}
\t<?php endif; ?>
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
\t\t// hide all items except the ones we want to filter
\t\titems.addClass('hidden');

\t\tif(isStrict)
\t\t{
\t\t\titems.filter(filters.join(' ')).removeClass('hidden');
\t\t}
\t\telse
\t\t{
\t\t\titems.filter(filters.join(',')).removeClass('hidden');
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
\t\t\t\titems.addClass('hidden');
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\titems.removeClass('hidden');
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
\t\t\titems.addClass('hidden');
\t\t\treturn false;
\t\t}
\t\t
\t\t// hide all items except the ones we want to filter
\t\titems.addClass('hidden');

\t\tif(isStrict)
\t\t{
\t\t\titems.filter(filters.join(' ')).removeClass('hidden');
\t\t}
\t\telse
\t\t{
\t\t\titems.filter(filters.join(',')).removeClass('hidden');
\t\t}

\t\t// store filters in localStorage
\t\tlocalStorage.setItem('portfolio_<?= \$this->id; ?>',filters.join(','));
\t\t
\t\treturn false;
\t});
});


</script>
<!-- SEO-SCRIPT-STOP -->
<?php \$this->endblock(); ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_newslist_portfolio_no_isotope.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_newslist_portfolio_no_isotope.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_newslist_portfolio_no_isotope.html5");
    }
}
