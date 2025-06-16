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

/* @pct_theme_settings/backend/be_page_contentelementset.html5 */
class __TwigTemplate_b141d23e76de128e2f13669ab0eaa047 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/backend/be_page_contentelementset.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/backend/be_page_contentelementset.html5"));

        // line 1
        yield "<?php

use Contao\\File;
use Contao\\FilesModel;
use Contao\\System;

\$strThumbnailPath = 'system/modules/pct_theme_settings/assets/img/element_library';
\$strToken = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();

?>

<div id=\"page_contentelementsets\">
\t<div id=\"tl_buttons\"><?= \$this->back ?></div>
\t<?php if(\$this->messages) :?>
\t<?= \$this->messages; ?>
\t<?php endif; ?>
   <div class=\"wrapper_sticky\">
   \t<div id=\"categories\" class=\"tl_panel block categories\">
   \t\t<ul class=\"categories_wrapper\">
   \t\t<?php foreach(\$this->categories as \$k => \$data): ?>
   \t\t<li class=\"<?= \$k; ?>\" data-value=\"<?= \$k; ?>\">
   \t\t\t<div class=\"icon\"><i class=\"<?= \$data['icon']; ?>\"></i></div>
   \t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
   \t\t</li>
   \t\t<?php endforeach; ?>
   \t\t</ul>
   \t</div>
   \t
   \t<div id=\"controlbar\" class=\"tl_panel block\">
   \t\t<ul id=\"library_switch\">
   \t\t\t<li class=\"single\" title=\"<?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['buttonSingles']; ?>\" data-value=\"singles\"><?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['buttonSingles']; ?></li>
   \t\t\t<li class=\"sets\" title=\"<?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['buttonSets']; ?>\" data-value=\"elementsets\"><?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['buttonSets']; ?></li>
   \t\t</ul>
   \t\t<ul id=\"zoom\">
   \t\t\t<li class=\"minus\" data-value=\"minus\"></li>
   \t\t\t<li class=\"plus\" data-value=\"plus\"></li>
   \t\t</ul>
   \t\t<div id=\"search\" class=\"search\">
   \t\t\t<input type=\"search\" name=\"search\" placeholder=\"<?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['inputSearchPlaceholder']; ?>\">
   \t\t</div>
   \t</div>
   </div>
\t
\t<!-- singles -->
\t<div id=\"singles_container\" class=\"element_container inside\" data-library=\"singles\">
\t\t<?php foreach(\$this->singles as \$category => \$arrData): ?>
\t\t\t<div class=\"category <?= \$category; ?> block\" data-category=\"<?= \$category; ?>\">
\t\t\t\t<h2><?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][\$category] ?: \$category; ?></h2>
\t\t\t\t<div class=\"inside\">
\t\t\t\t<?php foreach(\$arrData['elements'] as \$element): ?>
\t\t\t\t\t<?php 
\t\t\t\t\t\$name = \$element['name'];
\t\t\t\t\t?>
\t\t\t\t\t<div id=\"<?= \$name; ?>_wrapper\" class=\"item_container element_wrapper column<?= count(\$this->styles[\$name]) > 1 ? ' has-styles': '' ?>\" data-name=\"<?= \$name; ?>\">
\t\t\t\t\t\t<!-- styles pagination -->
\t\t\t\t\t\t<div class=\"pagination\">
\t\t\t\t\t\t   <ul class=\"arrows\">
\t\t\t\t\t\t\t\t<li class=\"arrow-left\" data-value=\"left\"><i class=\"ti-angle-left\"></i></li>
\t\t\t\t\t\t\t\t<li class=\"arrow-right\" data-value=\"right\"><i class=\"ti-angle-right\"></i></li>
\t\t\t\t\t\t   </ul>
\t\t\t\t\t\t   <?php 
\t\t\t\t\t\t   // order styles
\t\t\t\t\t\t\t\$styles = array_keys( \$this->styles[\$name] );
\t\t\t\t\t\t\t\\natcasesort(\$styles);
\t\t\t\t\t\t\t?>
\t\t\t\t\t\t\t<ul class=\"bullets\" data-active=\"<?= \$styles[0]; ?>\" data-count=\"<?= count(\$styles); ?>\" data-value=\"<?= implode(',', \$styles); ?>\">
\t\t\t\t\t\t\t   <?php foreach(\$styles as \$i => \$style): ?>
\t\t\t\t\t\t\t\t<li title=\"<?= \$style; ?>\" class=\"bullet\" data-value=\"<?= \$style; ?>\"><i></i></li>
\t\t\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t   </ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"preview_container\">
\t\t\t\t\t\t<?php foreach(\$this->styles[\$name] as \$data): ?>
\t\t\t\t\t\t<?php 
\t\t\t\t\t\t// keywords for javascript search
\t\t\t\t\t\t\$keywords = array( \\strtolower(\$data['name']??''), \$category );
\t\t\t\t\t\tif( !empty(\$data['keywords']) )
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$keywords = array_merge( \$keywords, array_map('trim',explode(',',\$data['keywords'])) );
\t\t\t\t\t\t}
\t\t\t\t\t\t\$image = new File( \$strThumbnailPath.'/'.\$data['name'].'.webp' );
\t\t\t\t\t\t?>
\t\t\t\t\t\t<div id=\"<?= \$data['name']; ?>\" class=\"<?= \$data['class']; ?> block\" data-element=\"<?= \$data['name']; ?>\" data-keywords=\"<?= \\strtolower( implode(',',\$keywords) ); ?>\">
\t\t\t\t\t\t\t<div class=\"info\">
\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"info_extended\">
\t\t\t\t\t\t\t\t<div class=\"style\"><i class=\"ti ti-flag-alt\"></i><span><?= \$data['style']; ?></span></div>
\t\t\t\t\t\t\t\t<div class=\"lightbox\"><a href=\"<?= \$image->path; ?>\" title=\"<?= \$data['label']; ?>\" data-title=\"<?= \$data['label']; ?>: <?= \$data['style']; ?>\" data-lightbox=\"lb_<?= \$name; ?>\"></a></div>
\t\t\t\t\t\t\t\t<div class=\"favorite\" data-value=\"<?= \$data['name']; ?>\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t\t\t<?= \\Contao\\Image::getHtml(\$image->path,\$data['name'],'loading=\"lazy\" title=\"'.\$data['label'].'\"'); ?>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<form id=\"form_<?= \$data['name']; ?>\" action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"pct_contentelement_set\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"ELEMENTSET\" value=\"<?= \$data['name']; ?>\">
\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t\t\t\t<?= \$data['img']; ?>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"submit_container\">
\t\t\t\t\t\t\t\t\t\t<div class=\"submit install\"><input type=\"submit\" class=\"tl_submit text\" name=\"install\" value=\"<?= \$GLOBALS['TL_LANG']['pct_contentelementset']['submit_install'] ?: 'Insert'; ?>\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</form>
                     <div class=\"form_submit\" data-value=\"form_<?= \$data['name']; ?>\"><i></i><span>EINFÜGEN</span></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t<?php endforeach; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t<?php endforeach; ?>
\t</div>

\t<!-- sets -->
\t<div id=\"elementsets_container\" class=\"element_container inside\" data-library=\"elementsets\">
\t\t<?php foreach(\$this->elements as \$category => \$arrData): ?>
\t\t\t<div class=\"category <?= \$category; ?> block\" data-category=\"<?= \$category; ?>\">
\t\t\t\t<h2><?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][\$category] ?: \$category; ?></h2>
\t\t\t\t<div class=\"inside\">
\t\t\t\t<?php foreach(\$arrData['elements'] as \$element): ?>
\t\t\t\t\t<?php 
\t\t\t\t\t\$name = \$element['name'];
\t\t\t\t\t?>
\t\t\t\t\t<div id=\"<?= \$name; ?>_wrapper\" class=\"item_container element_wrapper column<?= count(\$this->styles[\$name]) > 1 ? ' has-styles': '' ?>\" data-name=\"<?= \$name; ?>\">
\t\t\t\t\t\t<!-- styles pagination -->
\t\t\t\t\t\t<ul class=\"pagination\" data-active=\"0\" data-count=\"<?= count(\$this->styles[\$name]); ?>\" data-value=\"<?= implode(',', array_keys(\$this->styles[\$name])); ?>\">
\t\t\t\t\t\t\t<li class=\"arrow-left\" data-value=\"left\"><i class=\"ti-angle-left\"></i></li>
\t\t\t\t\t\t\t<li class=\"arrow-right\" data-value=\"right\"><i class=\"ti-angle-right\"></i></li>
\t\t\t\t\t\t\t<?php foreach( array_keys(\$this->styles[\$name]) as \$i => \$k_style): ?>
\t\t\t\t\t\t\t<li class=\"bullet\" data-value=\"<?= \$k_style; ?>\" data-index=\"<?= \$i; ?>\"><i></i></li>
\t\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<div class=\"preview_container\">
\t\t\t\t\t\t<?php foreach(\$this->styles[\$name] as \$data): ?>
\t\t\t\t\t\t<?php 
\t\t\t\t\t\t// keywords for javascript search
\t\t\t\t\t\t\$keywords = array( \\strtolower(\$data['name'] ?? ''), \$category );
\t\t\t\t\t\tif( !empty(\$data['keywords']) )
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$keywords = array_merge( \$keywords, array_map('trim',explode(',',\$data['keywords'])) );
\t\t\t\t\t\t}
\t\t\t\t\t\t\$image = new File( \$strThumbnailPath.'/'.\$data['name'].'.webp' );
\t\t\t\t\t\t?>
\t\t\t\t\t\t<div id=\"<?= \$data['name']; ?>\" class=\"<?= \$data['class']; ?> block\" data-element=\"<?= \$data['name']; ?>\" data-keywords=\"<?= \\strtolower( implode(',',\$keywords) ); ?>\">
\t\t\t\t\t\t\t<div class=\"info\">
\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"info_extended\">
\t\t\t\t\t\t\t\t<div class=\"style\"><i class=\"ti ti-flag-alt\"></i><span><?= \$data['style']; ?></span></div>
\t\t\t\t\t\t\t\t<div class=\"lightbox\"><a href=\"<?= \$image->path; ?>\" title=\"<?= \$data['label']; ?>\" data-title=\"<?= \$data['label']; ?>: <?= \$data['style']; ?>\" data-lightbox=\"lb_<?= \$name; ?>\"></a></div>
\t\t\t\t\t\t\t\t<div class=\"favorite\" data-value=\"<?= \$data['name']; ?>\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t\t\t<?= \\Contao\\Image::getHtml(\$image->path,\$data['name'],'loading=\"lazy\" title=\"'.\$data['label'].'\"'); ?>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<form id=\"form_<?= \$data['name']; ?>\" action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"pct_contentelement_set\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"ELEMENTSET\" value=\"<?= \$data['name']; ?>\">
\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t\t\t\t<?= \$data['img']; ?>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"submit_container\">
\t\t\t\t\t\t\t\t\t\t<div class=\"submit install\"><input type=\"submit\" class=\"tl_submit text\" name=\"install\" value=\"<?= \$GLOBALS['TL_LANG']['pct_contentelementset']['submit_install'] ?: 'Insert'; ?>\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</form>
                     <div class=\"form_submit\" data-value=\"form_<?= \$data['name']; ?>\"><i></i><span>EINFÜGEN</span></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t<?php endforeach; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t<?php endforeach; ?>
\t</div>

</div>


<script>
// array_unique
const array_unique = (value,index,self) => 
{
\treturn self.indexOf(value) === index;
}

//!-- body class
jQuery(document).ready(function() 
{
\tjQuery('body').addClass('page_contentelementsets');
});
\t
//!-- category
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.categories';
\t// get active categories from localstorage
\tvar categories = [];
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tcategories = localStorage.getItem(localStorageKey).split(',');
\t\tcategories = categories.filter( array_unique );
\t}

\t//categories = ['favorites','favorites'];
\t//console.log( categories.filter( array_unique ) );
\t
\tjQuery('#categories li').click(function(e,params)
\t{
\t\tcategories = categories.filter( array_unique );
\t\t
\t\tvar elem = jQuery(this);
\t\tvar val = jQuery(this).attr('data-value');
\t\telem.toggleClass('active');
\t\t
\t\tif( elem.hasClass('active') )
\t\t{
\t\t\tcategories.push( val );
\t\t\tjQuery('[data-category=\"'+val+'\"]').addClass('active');
\t\t}
\t\telse
\t\t{
\t\t\tcategories.splice( categories.indexOf(val) ,1);
\t\t\tjQuery('[data-category=\"'+val+'\"]').removeClass('active');
\t\t}
\t\t
\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, categories.filter( array_unique ).join(','));

\t\tjQuery('.element_container').addClass('has_category_filter');
\t\t
\t\t// add category as class name
\t\tjQuery('#page_contentelementsets').removeAttr('class');
\t\tjQuery('#page_contentelementsets').addClass( categories.filter( array_unique ).join(' ') );

\t\tif( categories.length <= 0 )
\t\t{
\t\t\tjQuery('.element_container').removeClass('has_category_filter');
\t\t\tjQuery('#page_contentelementsets').removeAttr('class');
\t\t\tlocalStorage.removeItem(localStorageKey);
\t\t}
\t\t
\t\t// send event
\t\tjQuery(document).trigger('ContentElementSet.onCategoryChange',{'target':val,'categories':categories});
\t});
\t
\tif( categories.length > 0 )
\t{
\t\tjQuery('.element_container').addClass('has_category_filter');
\t\tjQuery.each(categories, function(i,k)
\t\t{
\t\t\tjQuery('#categories li[data-value=\"'+k+'\"]').trigger('click',{});
\t\t});
\t}\t
\t
\tjQuery('#categories .opener').click(function(e)
\t{
\t\tjQuery(this).toggleClass('active');
\t\tjQuery('#categories').toggleClass('open');
\t});
});

//!-- library switch
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.library';
\t
\tvar val = 'singles'; // default value
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tval = localStorage.getItem(localStorageKey);
\t\tjQuery('.element_container[data-library='+val+']').addClass('active');
\t}
\t
\tjQuery('.element_container[data-library='+val+']').addClass('active');
\tjQuery('#library_switch li[data-value='+val+']').addClass('active');

\tjQuery('#library_switch li').click(function(e)
\t{
\t\tvar elem = jQuery(this);
\t\tvar val = elem.attr('data-value');
\t\tjQuery('#library_switch li').removeClass('active');
\t\telem.toggleClass('active');\t
\t\t
\t\t// toggle library container
\t\tjQuery('.element_container').removeClass('active');
\t\tjQuery('.element_container[data-library='+val+']').addClass('active');

\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, val);
\t});
});

//!-- search
jQuery(document).ready(function() 
{
\t// run through all data-keywords elements and look for the searchValue
\tconst filterBySearch = function(searchValue)
\t{
\t\tif( searchValue === undefined || searchValue === null || typeof(searchValue) != 'string')
\t\t{
\t\t\treturn;
\t\t}

\t\tsearchValue = searchValue.toLowerCase();
\t\tvar search = ['Ä','ä','Ö','ö','Ü','ü','ß'];
\t\tvar replace = ['Ae','ae','Oe','oe','Ue','ue','ss'];
\t\t
\t\tif( search.indexOf(searchValue) )
\t\t{
\t\t\tjQuery.each(search, function(i,v)
\t\t\t{
\t\t\t\tsearchValue = searchValue.replace(v, replace[i]);
\t\t\t});
\t\t}
\t\t
\t\tvar elements = jQuery('[data-keywords]');
\t\telements.removeClass('found');
\t\telements.parents('.item_container').removeClass('has_search_results');
\t\telements.parents('.category').removeClass('has_search_results');
\t\telements.each(function(i,elem)
\t\t{
\t\t\tvar keywords = jQuery(elem).attr('data-keywords');
\t\t\tif( keywords.indexOf(searchValue) >= 0 )
\t\t\t{
\t\t\t\tjQuery(elem).addClass('found');
\t\t\t\tjQuery(elem).parents('.item_container').addClass('has_search_results');
\t\t\t\tjQuery(elem).parents('.category').addClass('has_search_results');
\t\t\t}
\t\t});
\t}
\t
\tjQuery('input[name=\"search\"]').on('keyup search', function(e)
\t{
\t\tvar val = jQuery(this).val();
\t\tif( val.length <= 3 )
\t\t{
\t\t\tjQuery('.has_search_filter').removeClass('has_search_filter');
\t\t\tjQuery('.has_search_results').removeClass('has_search_results');
\t\t\tlocalStorage.removeItem(localStorageKey);
\t\t\treturn;
\t\t}
\t\t
\t\tfilterBySearch(val);
\t\t
\t\tjQuery('.element_container').addClass('has_search_filter');
\t\t
\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, val);
\t});

\tconst localStorageKey = 'ContentElementSet.search';
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined && localStorage.getItem(localStorageKey).length > 3 )
\t{
\t\tvar val = localStorage.getItem(localStorageKey);
\t\t
\t\tjQuery('input[name=\"search\"]').val( val );
\t\tjQuery('.element_container').addClass('has_search_filter');
\t\t
\t\tfilterBySearch(val);
\t}
});

//!-- zoom
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.zoom';
\t
\tvar maxZoom = 3;
\tvar numZoom = 1;

\tjQuery('#zoom').attr('data-zoom',numZoom);
\tjQuery('.element_container').attr('data-zoom',numZoom);
\t
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tnumZoom = Number( localStorage.getItem(localStorageKey) );
\t\tjQuery('#zoom').attr('data-zoom',numZoom);
\t\tjQuery('.element_container').attr('data-zoom',numZoom);
\t}
\t
\tjQuery('#zoom li').click(function(e)
\t{
\t\tvar elem = jQuery(this);
\t\tvar val = elem.attr('data-value');
\t\t
\t\tif( val == 'minus' && numZoom > 0 )
\t\t{
\t\t\tnumZoom -= 1;
\t\t}
\t\t
\t\tif( val == 'plus' && numZoom < maxZoom )
\t\t{
\t\t\tnumZoom += 1;
\t\t}

\t\tjQuery('#zoom').attr('data-zoom',numZoom);
\t\tjQuery('.element_container').attr('data-zoom',numZoom);

\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, numZoom);
\t});
});

//!-- favorites
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.favorites';
\t
\tvar favorites = [];
\t<?php if( \$this->User->pct_element_library_favorites ): ?>
\tvar tmp = JSON.parse('<?= \\json_encode(\$this->User->pct_element_library_favorites,JSON_FORCE_OBJECT); ?>');
\tjQuery.each(tmp, function(i,k)
\t{
\t\tfavorites.push(k);
\t});
\t// update localstorage
\tlocalStorage.setItem(localStorageKey, favorites.filter( array_unique ).join(','));
\t<?php endif; ?>
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tfavorites = localStorage.getItem(localStorageKey).split(',');
\t}
\t
\tif( favorites.length > 0 )
\t{
\t\tjQuery.each(favorites, function(i,k)
\t\t{
\t\t\tjQuery('.favorite[data-value=\"'+k+'\"]').addClass('active');
\t\t});
\t}
\t
\tjQuery('.favorite').click(function(e)
\t{
\t\tvar elem = jQuery(this);
\t\tvar val = elem.attr('data-value');
\t\telem.toggleClass('active');
\t\t
\t\tif( elem.hasClass('active') )
\t\t{
\t\t\tfavorites.push( val );
\t\t}
\t\telse
\t\t{
\t\t\tfavorites.splice( favorites.indexOf(val) ,1);
\t\t}\t
\t\t\t
\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, favorites.filter( array_unique ).join(','));

\t\t// send event
\t\tjQuery(document).trigger('ContentElementSet.onFavoriteChange',{'target':val,'active':elem.hasClass('active'),'favorites':favorites});
\t});
});

//!-- Events: Apply favorites onCategoryChange Event
jQuery(document).on('ContentElementSet.onCategoryChange', function(e,params) 
{
\tconst localStorageKey = 'ContentElementSet.favorites';
\tvar favorites = [];
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tfavorites = localStorage.getItem(localStorageKey).split(',');
\t}

\t// no favorites at all
\tif( params.categories.indexOf('favorites') == -1 )
\t{
\t\tjQuery('.is_favorite').removeClass('is_favorite');
\t\treturn;
\t}

\tjQuery.each(favorites, function(i,k)
\t{
\t\tvar _elem = jQuery('.item[data-element=\"'+k+'\"]');
\t\t_elem.addClass('is_favorite');
\t\t_elem.parents('.category').addClass('is_favorite');
\t\t_elem.parents('.item_container').addClass('is_favorite');
\t\t//jQuery('.item_container[data-name=\"'+k+'\"]').addClass('is_favorite');
\t\tjQuery('.bullet[data-value=\"'+k+'\"]').addClass('is_favorite');
\t\t//jQuery('#categories li[data-value=\"favorites\"]').addClass('active');

\t});

\t// favorites clicked: clear all other categories
\t//if( params.target == 'favorites' )
\t//{
\t//\tjQuery('#page_contentelementsets').removeAttr('class');
\t//\tjQuery('#categories li').removeClass('active');
\t//\tjQuery('[data-category]').removeClass('found');
//
\t//\tjQuery('#page_contentelementsets').addClass('favorites');
\t//\tjQuery('#categories li[data-value=\"favorites\"]').addClass('active');
\t//\t
\t//\tlocalStorage.setItem('ContentElementSet.categories','favorites');
//
\t//\tjQuery.each(favorites, function(i,k)
\t//\t{
\t//\t\tvar _elem = jQuery('.item[data-element=\"'+k+'\"]');
\t//\t\t_elem.addClass('is_favorite');
\t//\t\t_elem.parents('.category').addClass('is_favorite');
\t//\t});
\t//}
\t//else
\t//{
\t//\tjQuery('.is_favorite').removeClass('is_favorite');
\t//\tjQuery('#page_contentelementsets').removeClass('favorites');
\t//\tjQuery('#categories li[data-value=\"favorites\"]').removeClass('active');
\t//}
});

//!-- Events: onFavoriteChange
jQuery(document).on('ContentElementSet.onFavoriteChange', function(e,params) 
{
\t// update favorites view if active
\tif( jQuery('#page_contentelementsets').hasClass('favorites') )
\t{
\t\tvar _elem = jQuery('.item[data-element=\"'+params.target+'\"]');
\t\tvar name = _elem.attr('data-element');

\t\t_elem.removeClass('is_favorite');
\t\t
\t\t// bullets
\t\tjQuery('.bullet[data-value=\"'+name+'\"]').removeClass('active is_favorite');
\t\tif( _elem.siblings('.is_favorite').length > 0 )
\t\t{
\t\t\tvar k = jQuery( _elem.siblings('.is_favorite')[0] ).attr('data-element');
\t\t\t_elem.siblings('.is_favorite').first().addClass('active');
\t\t\tjQuery('.bullet[data-value=\"'+k+'\"]').addClass('active');
\t\t}

\t\tif( _elem.parents('.category').find('.is_favorite').length < 1 )
\t\t{
\t\t\t_elem.parents('.category').removeClass('is_favorite');
\t\t}

\t\tif( _elem.parents('.item_container').find('.is_favorite').length < 1 )
\t\t{
\t\t\t_elem.parents('.item_container').removeClass('is_favorite');
\t\t}
\t}

\t// send ajax to update user field
\tjQuery.ajax(
\t{
\t\tmethod\t: \"GET\",
\t\turl\t\t: location.url,
\t\tdata\t: {'action':'updateFavorites','favorites':params.favorites}
\t});

});

//!-- lightbox per element
jQuery(document).ready(function() 
{
\tjQuery('#page_contentelementsets a[data-lightbox]').map(function() 
    {
\t\tjQuery(this).colorbox(
\t\t{
\t\t\t// Put custom options here
\t\t\tloop: false,
\t\t\trel: jQuery(this).attr('data-lightbox'),
\t\t\tmaxWidth: '95%',
\t\t\tmaxHeight: '95%',
\t\t\ttitle:function()
\t\t\t{
\t\t\t\treturn jQuery(this).attr('data-title');
\t\t\t}
\t\t});
   });
});

//!-- form submit button
jQuery(document).ready(function() 
{
\tjQuery('.form_submit[data-value]').click(function() 
    {
\t\tvar elem = jQuery(this);
\t\tvar val = elem.attr('data-value');
\t\tjQuery('form#'+val+' input[type=\"submit\"]').click();
\t});
});

//!-- pagination: styles, variations
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.activeElements';
\t// get active elements from localstorage
\tvar activeElements = [];
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tactiveElements = localStorage.getItem(localStorageKey).split(',');
\t\tactiveElements = activeElements.filter( array_unique );
\t}

\tjQuery('.item_container[data-name] .pagination .bullets li:first-child:not(.active)').addClass('active');

\t// bullets
\tjQuery('.item_container[data-name] .pagination .bullets li').click(function(e,params)
\t{
\t\tvar elem = jQuery(this);
\t\tvar parent = elem.parent('.pagination .bullets');
\t\tvar list = parent.attr('data-value');
\t\tvar val = elem.attr('data-value');
\t\t
\t\t// remove active class
\t\telem.siblings().removeClass('active');
\t\telem.parents('.item_container').find('[data-element]').removeClass('active');
\t\t// set active class
\t\telem.addClass('active');
\t\tjQuery('[data-element=\"'+val+'\"]').addClass('active');
\t\t// update index in pagination
\t\t//parent.attr('data-active',elem.attr('data-index'));
\t\tparent.attr('data-active',elem.attr('data-value'));

\t\t// clicked in load sequence, return here to avoid updating the localstorage
\t\tif( params !== undefined && params.onload !== undefined && params.onload == 1 )
\t\t{
\t\t\treturn;
\t\t}
\t\t
\t\t// clear localstorage
\t\tvar items = parent.attr('data-value').split(',');
\t\tjQuery.each(items, function(k,v)
\t\t{
\t\t\tif( activeElements.indexOf(v) >= 0 )
\t\t\t{
\t\t\t\tactiveElements.splice( activeElements.indexOf(v) ,1);
\t\t\t}
\t\t});

\t\t// update localstorage
\t\tactiveElements.push(val);
\t\tlocalStorage.setItem(localStorageKey, activeElements.filter( array_unique ).join(','));
\t});
\t
\t// left, right
\tjQuery('.item_container[data-name] .pagination .arrows li').click(function(e)
\t{
\t\tvar elem = jQuery(this);
\t\tvar parent = elem.parents('.item_container').find('.pagination .bullets');
\t\tvar max = Number( parent.attr('data-count') );
\t\t//var curr = Number( parent.attr('data-active') );
\t\tvar curr = parent.attr('data-active');
\t\tvar val = elem.attr('data-value');
\t\tvar list = parent.attr('data-value').split(',');
\t\tvar i = list.indexOf( curr );
\t\t
\t\tif( val == 'left' && i > 0 )
\t\t{
\t\t\ti -= 1;
\t\t}
\t\telse if( val == 'right' && i < (max) )
\t\t{
\t\t\ti += 1;
\t\t}

\t\tif( i < 0 )
\t\t{
\t\t\ti = 0;
\t\t}
\t\tif( i > max )
\t\t{
\t\t\ti = max;
\t\t}

\t\tcurr = list[i];

\t\tparent.attr('data-active',curr);

\t\t// trigger click on bullet button 
\t\tparent.find('.bullet[data-value=\"'+curr+'\"]').trigger('click');
\t});

\t// all paginations with current index 0
\tjQuery('.item_container[data-name] .pagination .bullets[data-active=\"0\"]').each(function(k,elem)
\t{
\t\tvar elem = jQuery(elem);
\t\telem.find('li[data-index=\"'+elem.attr('data-active')+'\"]').trigger('click',{'onload':1});
\t});

\tjQuery.each(activeElements,function(k,val)
\t{
\t\tjQuery('.item_container[data-name] .pagination .bullets li[data-value=\"'+val+'\"]').trigger('click',{'onload':1});
\t});
});

//!-- sticky header 
jQuery(window).scroll(function(e)
{
\tif( jQuery('#page_contentelementsets .wrapper_sticky').position().top > 35 )
\t{
\t\tjQuery('body').addClass('sticky');
\t}
\telse
\t{
\t\tjQuery('body').removeClass('sticky');
\t}
});

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
        return "@pct_theme_settings/backend/be_page_contentelementset.html5";
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

use Contao\\File;
use Contao\\FilesModel;
use Contao\\System;

\$strThumbnailPath = 'system/modules/pct_theme_settings/assets/img/element_library';
\$strToken = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();

?>

<div id=\"page_contentelementsets\">
\t<div id=\"tl_buttons\"><?= \$this->back ?></div>
\t<?php if(\$this->messages) :?>
\t<?= \$this->messages; ?>
\t<?php endif; ?>
   <div class=\"wrapper_sticky\">
   \t<div id=\"categories\" class=\"tl_panel block categories\">
   \t\t<ul class=\"categories_wrapper\">
   \t\t<?php foreach(\$this->categories as \$k => \$data): ?>
   \t\t<li class=\"<?= \$k; ?>\" data-value=\"<?= \$k; ?>\">
   \t\t\t<div class=\"icon\"><i class=\"<?= \$data['icon']; ?>\"></i></div>
   \t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
   \t\t</li>
   \t\t<?php endforeach; ?>
   \t\t</ul>
   \t</div>
   \t
   \t<div id=\"controlbar\" class=\"tl_panel block\">
   \t\t<ul id=\"library_switch\">
   \t\t\t<li class=\"single\" title=\"<?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['buttonSingles']; ?>\" data-value=\"singles\"><?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['buttonSingles']; ?></li>
   \t\t\t<li class=\"sets\" title=\"<?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['buttonSets']; ?>\" data-value=\"elementsets\"><?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['buttonSets']; ?></li>
   \t\t</ul>
   \t\t<ul id=\"zoom\">
   \t\t\t<li class=\"minus\" data-value=\"minus\"></li>
   \t\t\t<li class=\"plus\" data-value=\"plus\"></li>
   \t\t</ul>
   \t\t<div id=\"search\" class=\"search\">
   \t\t\t<input type=\"search\" name=\"search\" placeholder=\"<?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['inputSearchPlaceholder']; ?>\">
   \t\t</div>
   \t</div>
   </div>
\t
\t<!-- singles -->
\t<div id=\"singles_container\" class=\"element_container inside\" data-library=\"singles\">
\t\t<?php foreach(\$this->singles as \$category => \$arrData): ?>
\t\t\t<div class=\"category <?= \$category; ?> block\" data-category=\"<?= \$category; ?>\">
\t\t\t\t<h2><?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][\$category] ?: \$category; ?></h2>
\t\t\t\t<div class=\"inside\">
\t\t\t\t<?php foreach(\$arrData['elements'] as \$element): ?>
\t\t\t\t\t<?php 
\t\t\t\t\t\$name = \$element['name'];
\t\t\t\t\t?>
\t\t\t\t\t<div id=\"<?= \$name; ?>_wrapper\" class=\"item_container element_wrapper column<?= count(\$this->styles[\$name]) > 1 ? ' has-styles': '' ?>\" data-name=\"<?= \$name; ?>\">
\t\t\t\t\t\t<!-- styles pagination -->
\t\t\t\t\t\t<div class=\"pagination\">
\t\t\t\t\t\t   <ul class=\"arrows\">
\t\t\t\t\t\t\t\t<li class=\"arrow-left\" data-value=\"left\"><i class=\"ti-angle-left\"></i></li>
\t\t\t\t\t\t\t\t<li class=\"arrow-right\" data-value=\"right\"><i class=\"ti-angle-right\"></i></li>
\t\t\t\t\t\t   </ul>
\t\t\t\t\t\t   <?php 
\t\t\t\t\t\t   // order styles
\t\t\t\t\t\t\t\$styles = array_keys( \$this->styles[\$name] );
\t\t\t\t\t\t\t\\natcasesort(\$styles);
\t\t\t\t\t\t\t?>
\t\t\t\t\t\t\t<ul class=\"bullets\" data-active=\"<?= \$styles[0]; ?>\" data-count=\"<?= count(\$styles); ?>\" data-value=\"<?= implode(',', \$styles); ?>\">
\t\t\t\t\t\t\t   <?php foreach(\$styles as \$i => \$style): ?>
\t\t\t\t\t\t\t\t<li title=\"<?= \$style; ?>\" class=\"bullet\" data-value=\"<?= \$style; ?>\"><i></i></li>
\t\t\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t   </ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"preview_container\">
\t\t\t\t\t\t<?php foreach(\$this->styles[\$name] as \$data): ?>
\t\t\t\t\t\t<?php 
\t\t\t\t\t\t// keywords for javascript search
\t\t\t\t\t\t\$keywords = array( \\strtolower(\$data['name']??''), \$category );
\t\t\t\t\t\tif( !empty(\$data['keywords']) )
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$keywords = array_merge( \$keywords, array_map('trim',explode(',',\$data['keywords'])) );
\t\t\t\t\t\t}
\t\t\t\t\t\t\$image = new File( \$strThumbnailPath.'/'.\$data['name'].'.webp' );
\t\t\t\t\t\t?>
\t\t\t\t\t\t<div id=\"<?= \$data['name']; ?>\" class=\"<?= \$data['class']; ?> block\" data-element=\"<?= \$data['name']; ?>\" data-keywords=\"<?= \\strtolower( implode(',',\$keywords) ); ?>\">
\t\t\t\t\t\t\t<div class=\"info\">
\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"info_extended\">
\t\t\t\t\t\t\t\t<div class=\"style\"><i class=\"ti ti-flag-alt\"></i><span><?= \$data['style']; ?></span></div>
\t\t\t\t\t\t\t\t<div class=\"lightbox\"><a href=\"<?= \$image->path; ?>\" title=\"<?= \$data['label']; ?>\" data-title=\"<?= \$data['label']; ?>: <?= \$data['style']; ?>\" data-lightbox=\"lb_<?= \$name; ?>\"></a></div>
\t\t\t\t\t\t\t\t<div class=\"favorite\" data-value=\"<?= \$data['name']; ?>\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t\t\t<?= \\Contao\\Image::getHtml(\$image->path,\$data['name'],'loading=\"lazy\" title=\"'.\$data['label'].'\"'); ?>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<form id=\"form_<?= \$data['name']; ?>\" action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"pct_contentelement_set\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"ELEMENTSET\" value=\"<?= \$data['name']; ?>\">
\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t\t\t\t<?= \$data['img']; ?>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"submit_container\">
\t\t\t\t\t\t\t\t\t\t<div class=\"submit install\"><input type=\"submit\" class=\"tl_submit text\" name=\"install\" value=\"<?= \$GLOBALS['TL_LANG']['pct_contentelementset']['submit_install'] ?: 'Insert'; ?>\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</form>
                     <div class=\"form_submit\" data-value=\"form_<?= \$data['name']; ?>\"><i></i><span>EINFÜGEN</span></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t<?php endforeach; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t<?php endforeach; ?>
\t</div>

\t<!-- sets -->
\t<div id=\"elementsets_container\" class=\"element_container inside\" data-library=\"elementsets\">
\t\t<?php foreach(\$this->elements as \$category => \$arrData): ?>
\t\t\t<div class=\"category <?= \$category; ?> block\" data-category=\"<?= \$category; ?>\">
\t\t\t\t<h2><?= \$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][\$category] ?: \$category; ?></h2>
\t\t\t\t<div class=\"inside\">
\t\t\t\t<?php foreach(\$arrData['elements'] as \$element): ?>
\t\t\t\t\t<?php 
\t\t\t\t\t\$name = \$element['name'];
\t\t\t\t\t?>
\t\t\t\t\t<div id=\"<?= \$name; ?>_wrapper\" class=\"item_container element_wrapper column<?= count(\$this->styles[\$name]) > 1 ? ' has-styles': '' ?>\" data-name=\"<?= \$name; ?>\">
\t\t\t\t\t\t<!-- styles pagination -->
\t\t\t\t\t\t<ul class=\"pagination\" data-active=\"0\" data-count=\"<?= count(\$this->styles[\$name]); ?>\" data-value=\"<?= implode(',', array_keys(\$this->styles[\$name])); ?>\">
\t\t\t\t\t\t\t<li class=\"arrow-left\" data-value=\"left\"><i class=\"ti-angle-left\"></i></li>
\t\t\t\t\t\t\t<li class=\"arrow-right\" data-value=\"right\"><i class=\"ti-angle-right\"></i></li>
\t\t\t\t\t\t\t<?php foreach( array_keys(\$this->styles[\$name]) as \$i => \$k_style): ?>
\t\t\t\t\t\t\t<li class=\"bullet\" data-value=\"<?= \$k_style; ?>\" data-index=\"<?= \$i; ?>\"><i></i></li>
\t\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<div class=\"preview_container\">
\t\t\t\t\t\t<?php foreach(\$this->styles[\$name] as \$data): ?>
\t\t\t\t\t\t<?php 
\t\t\t\t\t\t// keywords for javascript search
\t\t\t\t\t\t\$keywords = array( \\strtolower(\$data['name'] ?? ''), \$category );
\t\t\t\t\t\tif( !empty(\$data['keywords']) )
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$keywords = array_merge( \$keywords, array_map('trim',explode(',',\$data['keywords'])) );
\t\t\t\t\t\t}
\t\t\t\t\t\t\$image = new File( \$strThumbnailPath.'/'.\$data['name'].'.webp' );
\t\t\t\t\t\t?>
\t\t\t\t\t\t<div id=\"<?= \$data['name']; ?>\" class=\"<?= \$data['class']; ?> block\" data-element=\"<?= \$data['name']; ?>\" data-keywords=\"<?= \\strtolower( implode(',',\$keywords) ); ?>\">
\t\t\t\t\t\t\t<div class=\"info\">
\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"info_extended\">
\t\t\t\t\t\t\t\t<div class=\"style\"><i class=\"ti ti-flag-alt\"></i><span><?= \$data['style']; ?></span></div>
\t\t\t\t\t\t\t\t<div class=\"lightbox\"><a href=\"<?= \$image->path; ?>\" title=\"<?= \$data['label']; ?>\" data-title=\"<?= \$data['label']; ?>: <?= \$data['style']; ?>\" data-lightbox=\"lb_<?= \$name; ?>\"></a></div>
\t\t\t\t\t\t\t\t<div class=\"favorite\" data-value=\"<?= \$data['name']; ?>\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t\t\t<?= \\Contao\\Image::getHtml(\$image->path,\$data['name'],'loading=\"lazy\" title=\"'.\$data['label'].'\"'); ?>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<form id=\"form_<?= \$data['name']; ?>\" action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"pct_contentelement_set\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"ELEMENTSET\" value=\"<?= \$data['name']; ?>\">
\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t\t\t\t<?= \$data['img']; ?>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"submit_container\">
\t\t\t\t\t\t\t\t\t\t<div class=\"submit install\"><input type=\"submit\" class=\"tl_submit text\" name=\"install\" value=\"<?= \$GLOBALS['TL_LANG']['pct_contentelementset']['submit_install'] ?: 'Insert'; ?>\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</form>
                     <div class=\"form_submit\" data-value=\"form_<?= \$data['name']; ?>\"><i></i><span>EINFÜGEN</span></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t<?php endforeach; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t<?php endforeach; ?>
\t</div>

</div>


<script>
// array_unique
const array_unique = (value,index,self) => 
{
\treturn self.indexOf(value) === index;
}

//!-- body class
jQuery(document).ready(function() 
{
\tjQuery('body').addClass('page_contentelementsets');
});
\t
//!-- category
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.categories';
\t// get active categories from localstorage
\tvar categories = [];
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tcategories = localStorage.getItem(localStorageKey).split(',');
\t\tcategories = categories.filter( array_unique );
\t}

\t//categories = ['favorites','favorites'];
\t//console.log( categories.filter( array_unique ) );
\t
\tjQuery('#categories li').click(function(e,params)
\t{
\t\tcategories = categories.filter( array_unique );
\t\t
\t\tvar elem = jQuery(this);
\t\tvar val = jQuery(this).attr('data-value');
\t\telem.toggleClass('active');
\t\t
\t\tif( elem.hasClass('active') )
\t\t{
\t\t\tcategories.push( val );
\t\t\tjQuery('[data-category=\"'+val+'\"]').addClass('active');
\t\t}
\t\telse
\t\t{
\t\t\tcategories.splice( categories.indexOf(val) ,1);
\t\t\tjQuery('[data-category=\"'+val+'\"]').removeClass('active');
\t\t}
\t\t
\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, categories.filter( array_unique ).join(','));

\t\tjQuery('.element_container').addClass('has_category_filter');
\t\t
\t\t// add category as class name
\t\tjQuery('#page_contentelementsets').removeAttr('class');
\t\tjQuery('#page_contentelementsets').addClass( categories.filter( array_unique ).join(' ') );

\t\tif( categories.length <= 0 )
\t\t{
\t\t\tjQuery('.element_container').removeClass('has_category_filter');
\t\t\tjQuery('#page_contentelementsets').removeAttr('class');
\t\t\tlocalStorage.removeItem(localStorageKey);
\t\t}
\t\t
\t\t// send event
\t\tjQuery(document).trigger('ContentElementSet.onCategoryChange',{'target':val,'categories':categories});
\t});
\t
\tif( categories.length > 0 )
\t{
\t\tjQuery('.element_container').addClass('has_category_filter');
\t\tjQuery.each(categories, function(i,k)
\t\t{
\t\t\tjQuery('#categories li[data-value=\"'+k+'\"]').trigger('click',{});
\t\t});
\t}\t
\t
\tjQuery('#categories .opener').click(function(e)
\t{
\t\tjQuery(this).toggleClass('active');
\t\tjQuery('#categories').toggleClass('open');
\t});
});

//!-- library switch
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.library';
\t
\tvar val = 'singles'; // default value
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tval = localStorage.getItem(localStorageKey);
\t\tjQuery('.element_container[data-library='+val+']').addClass('active');
\t}
\t
\tjQuery('.element_container[data-library='+val+']').addClass('active');
\tjQuery('#library_switch li[data-value='+val+']').addClass('active');

\tjQuery('#library_switch li').click(function(e)
\t{
\t\tvar elem = jQuery(this);
\t\tvar val = elem.attr('data-value');
\t\tjQuery('#library_switch li').removeClass('active');
\t\telem.toggleClass('active');\t
\t\t
\t\t// toggle library container
\t\tjQuery('.element_container').removeClass('active');
\t\tjQuery('.element_container[data-library='+val+']').addClass('active');

\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, val);
\t});
});

//!-- search
jQuery(document).ready(function() 
{
\t// run through all data-keywords elements and look for the searchValue
\tconst filterBySearch = function(searchValue)
\t{
\t\tif( searchValue === undefined || searchValue === null || typeof(searchValue) != 'string')
\t\t{
\t\t\treturn;
\t\t}

\t\tsearchValue = searchValue.toLowerCase();
\t\tvar search = ['Ä','ä','Ö','ö','Ü','ü','ß'];
\t\tvar replace = ['Ae','ae','Oe','oe','Ue','ue','ss'];
\t\t
\t\tif( search.indexOf(searchValue) )
\t\t{
\t\t\tjQuery.each(search, function(i,v)
\t\t\t{
\t\t\t\tsearchValue = searchValue.replace(v, replace[i]);
\t\t\t});
\t\t}
\t\t
\t\tvar elements = jQuery('[data-keywords]');
\t\telements.removeClass('found');
\t\telements.parents('.item_container').removeClass('has_search_results');
\t\telements.parents('.category').removeClass('has_search_results');
\t\telements.each(function(i,elem)
\t\t{
\t\t\tvar keywords = jQuery(elem).attr('data-keywords');
\t\t\tif( keywords.indexOf(searchValue) >= 0 )
\t\t\t{
\t\t\t\tjQuery(elem).addClass('found');
\t\t\t\tjQuery(elem).parents('.item_container').addClass('has_search_results');
\t\t\t\tjQuery(elem).parents('.category').addClass('has_search_results');
\t\t\t}
\t\t});
\t}
\t
\tjQuery('input[name=\"search\"]').on('keyup search', function(e)
\t{
\t\tvar val = jQuery(this).val();
\t\tif( val.length <= 3 )
\t\t{
\t\t\tjQuery('.has_search_filter').removeClass('has_search_filter');
\t\t\tjQuery('.has_search_results').removeClass('has_search_results');
\t\t\tlocalStorage.removeItem(localStorageKey);
\t\t\treturn;
\t\t}
\t\t
\t\tfilterBySearch(val);
\t\t
\t\tjQuery('.element_container').addClass('has_search_filter');
\t\t
\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, val);
\t});

\tconst localStorageKey = 'ContentElementSet.search';
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined && localStorage.getItem(localStorageKey).length > 3 )
\t{
\t\tvar val = localStorage.getItem(localStorageKey);
\t\t
\t\tjQuery('input[name=\"search\"]').val( val );
\t\tjQuery('.element_container').addClass('has_search_filter');
\t\t
\t\tfilterBySearch(val);
\t}
});

//!-- zoom
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.zoom';
\t
\tvar maxZoom = 3;
\tvar numZoom = 1;

\tjQuery('#zoom').attr('data-zoom',numZoom);
\tjQuery('.element_container').attr('data-zoom',numZoom);
\t
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tnumZoom = Number( localStorage.getItem(localStorageKey) );
\t\tjQuery('#zoom').attr('data-zoom',numZoom);
\t\tjQuery('.element_container').attr('data-zoom',numZoom);
\t}
\t
\tjQuery('#zoom li').click(function(e)
\t{
\t\tvar elem = jQuery(this);
\t\tvar val = elem.attr('data-value');
\t\t
\t\tif( val == 'minus' && numZoom > 0 )
\t\t{
\t\t\tnumZoom -= 1;
\t\t}
\t\t
\t\tif( val == 'plus' && numZoom < maxZoom )
\t\t{
\t\t\tnumZoom += 1;
\t\t}

\t\tjQuery('#zoom').attr('data-zoom',numZoom);
\t\tjQuery('.element_container').attr('data-zoom',numZoom);

\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, numZoom);
\t});
});

//!-- favorites
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.favorites';
\t
\tvar favorites = [];
\t<?php if( \$this->User->pct_element_library_favorites ): ?>
\tvar tmp = JSON.parse('<?= \\json_encode(\$this->User->pct_element_library_favorites,JSON_FORCE_OBJECT); ?>');
\tjQuery.each(tmp, function(i,k)
\t{
\t\tfavorites.push(k);
\t});
\t// update localstorage
\tlocalStorage.setItem(localStorageKey, favorites.filter( array_unique ).join(','));
\t<?php endif; ?>
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tfavorites = localStorage.getItem(localStorageKey).split(',');
\t}
\t
\tif( favorites.length > 0 )
\t{
\t\tjQuery.each(favorites, function(i,k)
\t\t{
\t\t\tjQuery('.favorite[data-value=\"'+k+'\"]').addClass('active');
\t\t});
\t}
\t
\tjQuery('.favorite').click(function(e)
\t{
\t\tvar elem = jQuery(this);
\t\tvar val = elem.attr('data-value');
\t\telem.toggleClass('active');
\t\t
\t\tif( elem.hasClass('active') )
\t\t{
\t\t\tfavorites.push( val );
\t\t}
\t\telse
\t\t{
\t\t\tfavorites.splice( favorites.indexOf(val) ,1);
\t\t}\t
\t\t\t
\t\t// update localstorage
\t\tlocalStorage.setItem(localStorageKey, favorites.filter( array_unique ).join(','));

\t\t// send event
\t\tjQuery(document).trigger('ContentElementSet.onFavoriteChange',{'target':val,'active':elem.hasClass('active'),'favorites':favorites});
\t});
});

//!-- Events: Apply favorites onCategoryChange Event
jQuery(document).on('ContentElementSet.onCategoryChange', function(e,params) 
{
\tconst localStorageKey = 'ContentElementSet.favorites';
\tvar favorites = [];
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tfavorites = localStorage.getItem(localStorageKey).split(',');
\t}

\t// no favorites at all
\tif( params.categories.indexOf('favorites') == -1 )
\t{
\t\tjQuery('.is_favorite').removeClass('is_favorite');
\t\treturn;
\t}

\tjQuery.each(favorites, function(i,k)
\t{
\t\tvar _elem = jQuery('.item[data-element=\"'+k+'\"]');
\t\t_elem.addClass('is_favorite');
\t\t_elem.parents('.category').addClass('is_favorite');
\t\t_elem.parents('.item_container').addClass('is_favorite');
\t\t//jQuery('.item_container[data-name=\"'+k+'\"]').addClass('is_favorite');
\t\tjQuery('.bullet[data-value=\"'+k+'\"]').addClass('is_favorite');
\t\t//jQuery('#categories li[data-value=\"favorites\"]').addClass('active');

\t});

\t// favorites clicked: clear all other categories
\t//if( params.target == 'favorites' )
\t//{
\t//\tjQuery('#page_contentelementsets').removeAttr('class');
\t//\tjQuery('#categories li').removeClass('active');
\t//\tjQuery('[data-category]').removeClass('found');
//
\t//\tjQuery('#page_contentelementsets').addClass('favorites');
\t//\tjQuery('#categories li[data-value=\"favorites\"]').addClass('active');
\t//\t
\t//\tlocalStorage.setItem('ContentElementSet.categories','favorites');
//
\t//\tjQuery.each(favorites, function(i,k)
\t//\t{
\t//\t\tvar _elem = jQuery('.item[data-element=\"'+k+'\"]');
\t//\t\t_elem.addClass('is_favorite');
\t//\t\t_elem.parents('.category').addClass('is_favorite');
\t//\t});
\t//}
\t//else
\t//{
\t//\tjQuery('.is_favorite').removeClass('is_favorite');
\t//\tjQuery('#page_contentelementsets').removeClass('favorites');
\t//\tjQuery('#categories li[data-value=\"favorites\"]').removeClass('active');
\t//}
});

//!-- Events: onFavoriteChange
jQuery(document).on('ContentElementSet.onFavoriteChange', function(e,params) 
{
\t// update favorites view if active
\tif( jQuery('#page_contentelementsets').hasClass('favorites') )
\t{
\t\tvar _elem = jQuery('.item[data-element=\"'+params.target+'\"]');
\t\tvar name = _elem.attr('data-element');

\t\t_elem.removeClass('is_favorite');
\t\t
\t\t// bullets
\t\tjQuery('.bullet[data-value=\"'+name+'\"]').removeClass('active is_favorite');
\t\tif( _elem.siblings('.is_favorite').length > 0 )
\t\t{
\t\t\tvar k = jQuery( _elem.siblings('.is_favorite')[0] ).attr('data-element');
\t\t\t_elem.siblings('.is_favorite').first().addClass('active');
\t\t\tjQuery('.bullet[data-value=\"'+k+'\"]').addClass('active');
\t\t}

\t\tif( _elem.parents('.category').find('.is_favorite').length < 1 )
\t\t{
\t\t\t_elem.parents('.category').removeClass('is_favorite');
\t\t}

\t\tif( _elem.parents('.item_container').find('.is_favorite').length < 1 )
\t\t{
\t\t\t_elem.parents('.item_container').removeClass('is_favorite');
\t\t}
\t}

\t// send ajax to update user field
\tjQuery.ajax(
\t{
\t\tmethod\t: \"GET\",
\t\turl\t\t: location.url,
\t\tdata\t: {'action':'updateFavorites','favorites':params.favorites}
\t});

});

//!-- lightbox per element
jQuery(document).ready(function() 
{
\tjQuery('#page_contentelementsets a[data-lightbox]').map(function() 
    {
\t\tjQuery(this).colorbox(
\t\t{
\t\t\t// Put custom options here
\t\t\tloop: false,
\t\t\trel: jQuery(this).attr('data-lightbox'),
\t\t\tmaxWidth: '95%',
\t\t\tmaxHeight: '95%',
\t\t\ttitle:function()
\t\t\t{
\t\t\t\treturn jQuery(this).attr('data-title');
\t\t\t}
\t\t});
   });
});

//!-- form submit button
jQuery(document).ready(function() 
{
\tjQuery('.form_submit[data-value]').click(function() 
    {
\t\tvar elem = jQuery(this);
\t\tvar val = elem.attr('data-value');
\t\tjQuery('form#'+val+' input[type=\"submit\"]').click();
\t});
});

//!-- pagination: styles, variations
jQuery(document).ready(function() 
{
\tconst localStorageKey = 'ContentElementSet.activeElements';
\t// get active elements from localstorage
\tvar activeElements = [];
\tif( localStorage.getItem(localStorageKey) !== null && localStorage.getItem(localStorageKey) !== undefined )
\t{
\t\tactiveElements = localStorage.getItem(localStorageKey).split(',');
\t\tactiveElements = activeElements.filter( array_unique );
\t}

\tjQuery('.item_container[data-name] .pagination .bullets li:first-child:not(.active)').addClass('active');

\t// bullets
\tjQuery('.item_container[data-name] .pagination .bullets li').click(function(e,params)
\t{
\t\tvar elem = jQuery(this);
\t\tvar parent = elem.parent('.pagination .bullets');
\t\tvar list = parent.attr('data-value');
\t\tvar val = elem.attr('data-value');
\t\t
\t\t// remove active class
\t\telem.siblings().removeClass('active');
\t\telem.parents('.item_container').find('[data-element]').removeClass('active');
\t\t// set active class
\t\telem.addClass('active');
\t\tjQuery('[data-element=\"'+val+'\"]').addClass('active');
\t\t// update index in pagination
\t\t//parent.attr('data-active',elem.attr('data-index'));
\t\tparent.attr('data-active',elem.attr('data-value'));

\t\t// clicked in load sequence, return here to avoid updating the localstorage
\t\tif( params !== undefined && params.onload !== undefined && params.onload == 1 )
\t\t{
\t\t\treturn;
\t\t}
\t\t
\t\t// clear localstorage
\t\tvar items = parent.attr('data-value').split(',');
\t\tjQuery.each(items, function(k,v)
\t\t{
\t\t\tif( activeElements.indexOf(v) >= 0 )
\t\t\t{
\t\t\t\tactiveElements.splice( activeElements.indexOf(v) ,1);
\t\t\t}
\t\t});

\t\t// update localstorage
\t\tactiveElements.push(val);
\t\tlocalStorage.setItem(localStorageKey, activeElements.filter( array_unique ).join(','));
\t});
\t
\t// left, right
\tjQuery('.item_container[data-name] .pagination .arrows li').click(function(e)
\t{
\t\tvar elem = jQuery(this);
\t\tvar parent = elem.parents('.item_container').find('.pagination .bullets');
\t\tvar max = Number( parent.attr('data-count') );
\t\t//var curr = Number( parent.attr('data-active') );
\t\tvar curr = parent.attr('data-active');
\t\tvar val = elem.attr('data-value');
\t\tvar list = parent.attr('data-value').split(',');
\t\tvar i = list.indexOf( curr );
\t\t
\t\tif( val == 'left' && i > 0 )
\t\t{
\t\t\ti -= 1;
\t\t}
\t\telse if( val == 'right' && i < (max) )
\t\t{
\t\t\ti += 1;
\t\t}

\t\tif( i < 0 )
\t\t{
\t\t\ti = 0;
\t\t}
\t\tif( i > max )
\t\t{
\t\t\ti = max;
\t\t}

\t\tcurr = list[i];

\t\tparent.attr('data-active',curr);

\t\t// trigger click on bullet button 
\t\tparent.find('.bullet[data-value=\"'+curr+'\"]').trigger('click');
\t});

\t// all paginations with current index 0
\tjQuery('.item_container[data-name] .pagination .bullets[data-active=\"0\"]').each(function(k,elem)
\t{
\t\tvar elem = jQuery(elem);
\t\telem.find('li[data-index=\"'+elem.attr('data-active')+'\"]').trigger('click',{'onload':1});
\t});

\tjQuery.each(activeElements,function(k,val)
\t{
\t\tjQuery('.item_container[data-name] .pagination .bullets li[data-value=\"'+val+'\"]').trigger('click',{'onload':1});
\t});
});

//!-- sticky header 
jQuery(window).scroll(function(e)
{
\tif( jQuery('#page_contentelementsets .wrapper_sticky').position().top > 35 )
\t{
\t\tjQuery('body').addClass('sticky');
\t}
\telse
\t{
\t\tjQuery('body').removeClass('sticky');
\t}
});

</script>", "@pct_theme_settings/backend/be_page_contentelementset.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/backend/be_page_contentelementset.html5");
    }
}
