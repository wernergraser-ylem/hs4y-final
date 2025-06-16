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

/* @pct_theme_settings/backend/be_article_themesettingsbutton.html5 */
class __TwigTemplate_807eceee7ae39d15b22e571df66bcb10 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/backend/be_article_themesettingsbutton.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/backend/be_article_themesettingsbutton.html5"));

        // line 1
        yield "<?php 
\$objLang = (object)\$GLOBALS['TL_LANG']['quicksettings'];
?>
<div id=\"theme_settings_<?= \$this->id; ?>\" class=\"article_quicksettings theme_settings\">
\t<div class=\"section_one\">
\t\t<div class=\"article_quicksettings_inside\">
\t\t\t<div class=\"layout_css inside\">
\t\t\t\t<label><?= \$objLang->layout_css ?? 'Article width'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"fullwidth-boxed clickable<?php if(\$this->layout_css == 'fullwidth-boxed'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-boxed\">Large</li>
\t\t\t\t\t<li class=\"fullwidth-boxed-medium clickable<?php if(\$this->layout_css == 'fullwidth-boxed-medium'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-boxed-medium\">Medium</li>
\t\t\t\t\t<li class=\"fullwidth-boxed-small clickable<?php if(\$this->layout_css == 'fullwidth-boxed-small'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-boxed-small\">Small</li>
\t\t\t\t\t<li class=\"boxed clickable<?php if(\$this->layout_css == 'boxed'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"boxed\">Boxed</li>
\t\t\t\t\t<li class=\"fullwidth clickable<?php if(\$this->layout_css == 'fullwidth'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth\">Fullwidth</li>
\t\t\t\t\t<li class=\"fullwidth-padding-left clickable<?php if(\$this->layout_css == 'fullwidth-padding-left'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-padding-left\">Fullwidth Padding Left</li>
\t\t\t\t\t<li class=\"fullwidth-padding-right clickable<?php if(\$this->layout_css == 'fullwidth-padding-right'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-padding-right\">Fullwidth Padding Right</li>
\t\t\t\t\t<li class=\"fullwidth-padding-both clickable<?php if(\$this->layout_css == 'fullwidth-padding-both'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-padding-both\">Fullwidth Padding Both</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t<div class=\"section_two\">
\t\t<div class=\"article_quicksettings_inside\">
\t\t\t<div class=\"field_container padding_top_classes padding_t\">
\t\t\t\t<label><?= \$objLang->padding_top ?? 'Padding top'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"article-pt-xxl clickable<?php if(\$this->padding_t == 'article-pt-xxl'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-xxl\">XXL</li>
\t\t\t\t\t<li class=\"article-pt-xl clickable<?php if(\$this->padding_t == 'article-pt-xl'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-xl\">XL</li>
\t\t\t\t\t<li class=\"article-pt-l clickable<?php if(\$this->padding_t == 'article-pt-l'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-l\">L</li>
\t\t\t\t\t<li class=\"article-pt-m clickable<?php if(\$this->padding_t == 'article-pt-m'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-m\">M</li>
\t\t\t\t\t<li class=\"article-pt-s clickable<?php if(\$this->padding_t == 'article-pt-s'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-s\">S</li>
\t\t\t\t\t<li class=\"article-pt-xs clickable<?php if(\$this->padding_t == 'article-pt-xs'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-xs\">XS</li>
\t\t\t\t\t<li class=\"article-pt-xxs clickable<?php if(\$this->padding_t == 'article-pt-xxs'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-xxs\">XXS</li>
\t\t\t\t\t<li class=\"article-pt-0 clickable<?php if(\$this->padding_t == 'article-pt-0'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-0\">0</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"field_container padding_bottom_classes padding_b\">
\t\t\t\t<label><?= \$objLang->padding_bottom ?? 'Padding bottom'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"article-pb-xxl clickable<?php if(\$this->padding_b == 'article-pb-xxl'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-xxl\">XXL</li>
\t\t\t\t\t<li class=\"article-pb-xl clickable<?php if(\$this->padding_b == 'article-pb-xl'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-xl\">XL</li>
\t\t\t\t\t<li class=\"article-pb-l clickable<?php if(\$this->padding_b == 'article-pb-l'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-l\">L</li>
\t\t\t\t\t<li class=\"article-pb-m clickable<?php if(\$this->padding_b == 'article-pb-m'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-m\">M</li>
\t\t\t\t\t<li class=\"article-pb-s clickable<?php if(\$this->padding_b == 'article-pb-s'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-s\">S</li>
\t\t\t\t\t<li class=\"article-pb-xs clickable<?php if(\$this->padding_b == 'article-pb-xs'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-xs\">XS</li>
\t\t\t\t\t<li class=\"article-pb-xxs clickable<?php if(\$this->padding_b == 'article-pb-xxs'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-xxs\">XXS</li>
\t\t\t\t\t<li class=\"article-pb-0 clickable<?php if(\$this->padding_b == 'article-pb-0'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-0\">0</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t
\t</div>
\t
\t
\t<div class=\"section_three\">
\t\t<div class=\"article_quicksettings_inside\">
\t\t\t<div class=\"field_container bgcolor_classes\">
\t\t\t\t<label>Hintergrundfarbe</label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"bg-accent bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-accent'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-accent,1\">Accent</li>
\t\t\t\t\t<li class=\"bg-second bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-second'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-second,1\">Second</li>
\t\t\t\t\t<li class=\"bg-black bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-black'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-black,1\"></li>
\t\t\t\t\t<li class=\"bg-gray bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-gray'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-gray,1\"></li>
\t\t\t\t\t<li class=\"bg-white bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-white'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-white,1\"></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"field_container background-image\">
\t\t\t\t<label>Hintergrundbild</label>
\t\t\t\t<?php 
\t\t\t\t\$path = '-';
\t\t\t\tif( isset(\$this->bgimage) && !empty(\$this->bgimage) ) 
\t\t\t\t{
\t\t\t\t\t\$objFile = \\Contao\\FilesModel::findByUuid( \$this->bgimage );
\t\t\t\t\tif( \$objFile !== null )
\t\t\t\t\t{
\t\t\t\t\t\t\$path = \$objFile->path;
\t\t\t\t\t}
\t\t\t\t}
\t\t\t\t?>
\t\t\t\t<span><?= \$path; ?></span>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"section_four\">
\t\t<?php 
\t\t\$url = \\Contao\\Environment::get('base').'contao?do=article&act=edit&id='.\$this->id.'&rt='.\\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue().'#pal_theme_settings';
\t\t?>
\t\t<button class=\"settings\" data-value=\"<?= \$url; ?>\">Artikeleinstellungen</button>
\t\t<script>
\t\t\tjQuery(document).ready(function() 
\t\t\t{
\t\t\t\tjQuery('#theme_settings_<?= \$this->id; ?> button.settings').click(function(e)
\t\t\t\t{
\t\t\t\t\te.preventDefault();
\t\t\t\t\tlocation.href = jQuery(this).attr('data-value');
\t\t\t\t});
\t\t\t});
\t\t</script>
\t</div>
</div>

<script>
/**
 * Toggle theme settings container open/close
 */
// !-- toggle: open close
jQuery(document).ready(function() 
{
\tvar objElement = jQuery('#theme_settings_<?= \$this->id; ?>').parent('a.theme_settings');
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}

\tvar objElements = jQuery('a.theme_settings');

\tobjElement.click(function(e)
\t{
\t\te.preventDefault();
\t\t// close any open other container
\t\tobjElements.not(this).removeClass('active');
\t\tobjElements.parents('li').removeClass('active');
\t\t// toggle active the current one
\t\tjQuery(this).toggleClass('active');
\t\tjQuery('#li_<?= \$this->id; ?>').toggleClass('active');
\t});

\tjQuery('#main').click(function(e)
\t{
\t\tobjElements.removeClass('active');
\t\tjQuery('#li_<?= \$this->id; ?>').removeClass('active');
\t});
});


/**
 * Button interaction
 */
// !-- field toggler
jQuery(document).ready(function() 
{
\tvar objElements = jQuery('#theme_settings_<?= \$this->id; ?> .clickable');
\tif(objElements.length < 1)
\t{
\t\treturn;
\t}
\t
\tobjElements.click(function(e)
\t{
\t\te.stopPropagation();
\t\te.preventDefault();
\t\t
\t\tvar _this = jQuery(this);
\t\tvar strField = _this.attr('data-field');
\t\tvar varValue = _this.attr('data-value');
\t\t
\t\t// set active
\t\t_this.toggleClass('active');
\t\t
\t\t// remove sibling active 
\t\t_this.siblings('li').removeClass('active');

\t\tif( _this.hasClass('active') === false )
\t\t{
\t\t\tvarValue = '';
\t\t}

\t\t// send event
\t\tjQuery(document).trigger('THEME_SETTINGS.'+strField,{'elem':<?= \$this->id; ?>,'value':varValue});

\t\t// send ajax
\t\tjQuery.ajax(
\t\t{
\t\t\turl: location.href,
\t\t\tmethod:'POST',
\t\t\tdata: {'action':'toggleThemeSettingsFieldValue','elem':<?= \$this->id; ?>,'state':varValue,'field':strField}
\t\t});\t\t
\t});
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
        return "@pct_theme_settings/backend/be_article_themesettingsbutton.html5";
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
\$objLang = (object)\$GLOBALS['TL_LANG']['quicksettings'];
?>
<div id=\"theme_settings_<?= \$this->id; ?>\" class=\"article_quicksettings theme_settings\">
\t<div class=\"section_one\">
\t\t<div class=\"article_quicksettings_inside\">
\t\t\t<div class=\"layout_css inside\">
\t\t\t\t<label><?= \$objLang->layout_css ?? 'Article width'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"fullwidth-boxed clickable<?php if(\$this->layout_css == 'fullwidth-boxed'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-boxed\">Large</li>
\t\t\t\t\t<li class=\"fullwidth-boxed-medium clickable<?php if(\$this->layout_css == 'fullwidth-boxed-medium'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-boxed-medium\">Medium</li>
\t\t\t\t\t<li class=\"fullwidth-boxed-small clickable<?php if(\$this->layout_css == 'fullwidth-boxed-small'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-boxed-small\">Small</li>
\t\t\t\t\t<li class=\"boxed clickable<?php if(\$this->layout_css == 'boxed'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"boxed\">Boxed</li>
\t\t\t\t\t<li class=\"fullwidth clickable<?php if(\$this->layout_css == 'fullwidth'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth\">Fullwidth</li>
\t\t\t\t\t<li class=\"fullwidth-padding-left clickable<?php if(\$this->layout_css == 'fullwidth-padding-left'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-padding-left\">Fullwidth Padding Left</li>
\t\t\t\t\t<li class=\"fullwidth-padding-right clickable<?php if(\$this->layout_css == 'fullwidth-padding-right'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-padding-right\">Fullwidth Padding Right</li>
\t\t\t\t\t<li class=\"fullwidth-padding-both clickable<?php if(\$this->layout_css == 'fullwidth-padding-both'): ?> active<?php endif; ?>\" data-field=\"layout_css\" data-value=\"fullwidth-padding-both\">Fullwidth Padding Both</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t<div class=\"section_two\">
\t\t<div class=\"article_quicksettings_inside\">
\t\t\t<div class=\"field_container padding_top_classes padding_t\">
\t\t\t\t<label><?= \$objLang->padding_top ?? 'Padding top'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"article-pt-xxl clickable<?php if(\$this->padding_t == 'article-pt-xxl'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-xxl\">XXL</li>
\t\t\t\t\t<li class=\"article-pt-xl clickable<?php if(\$this->padding_t == 'article-pt-xl'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-xl\">XL</li>
\t\t\t\t\t<li class=\"article-pt-l clickable<?php if(\$this->padding_t == 'article-pt-l'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-l\">L</li>
\t\t\t\t\t<li class=\"article-pt-m clickable<?php if(\$this->padding_t == 'article-pt-m'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-m\">M</li>
\t\t\t\t\t<li class=\"article-pt-s clickable<?php if(\$this->padding_t == 'article-pt-s'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-s\">S</li>
\t\t\t\t\t<li class=\"article-pt-xs clickable<?php if(\$this->padding_t == 'article-pt-xs'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-xs\">XS</li>
\t\t\t\t\t<li class=\"article-pt-xxs clickable<?php if(\$this->padding_t == 'article-pt-xxs'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-xxs\">XXS</li>
\t\t\t\t\t<li class=\"article-pt-0 clickable<?php if(\$this->padding_t == 'article-pt-0'): ?> active<?php endif; ?>\" data-field=\"padding_t\" data-value=\"article-pt-0\">0</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"field_container padding_bottom_classes padding_b\">
\t\t\t\t<label><?= \$objLang->padding_bottom ?? 'Padding bottom'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"article-pb-xxl clickable<?php if(\$this->padding_b == 'article-pb-xxl'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-xxl\">XXL</li>
\t\t\t\t\t<li class=\"article-pb-xl clickable<?php if(\$this->padding_b == 'article-pb-xl'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-xl\">XL</li>
\t\t\t\t\t<li class=\"article-pb-l clickable<?php if(\$this->padding_b == 'article-pb-l'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-l\">L</li>
\t\t\t\t\t<li class=\"article-pb-m clickable<?php if(\$this->padding_b == 'article-pb-m'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-m\">M</li>
\t\t\t\t\t<li class=\"article-pb-s clickable<?php if(\$this->padding_b == 'article-pb-s'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-s\">S</li>
\t\t\t\t\t<li class=\"article-pb-xs clickable<?php if(\$this->padding_b == 'article-pb-xs'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-xs\">XS</li>
\t\t\t\t\t<li class=\"article-pb-xxs clickable<?php if(\$this->padding_b == 'article-pb-xxs'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-xxs\">XXS</li>
\t\t\t\t\t<li class=\"article-pb-0 clickable<?php if(\$this->padding_b == 'article-pb-0'): ?> active<?php endif; ?>\" data-field=\"padding_b\" data-value=\"article-pb-0\">0</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t
\t</div>
\t
\t
\t<div class=\"section_three\">
\t\t<div class=\"article_quicksettings_inside\">
\t\t\t<div class=\"field_container bgcolor_classes\">
\t\t\t\t<label>Hintergrundfarbe</label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"bg-accent bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-accent'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-accent,1\">Accent</li>
\t\t\t\t\t<li class=\"bg-second bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-second'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-second,1\">Second</li>
\t\t\t\t\t<li class=\"bg-black bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-black'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-black,1\"></li>
\t\t\t\t\t<li class=\"bg-gray bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-gray'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-gray,1\"></li>
\t\t\t\t\t<li class=\"bg-white bgcolor_css clickable<?php if(\$this->bgcolor_css == 'bg-white'): ?> active<?php endif; ?>\" data-field=\"bgcolor_css,background\" data-value=\"bg-white,1\"></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"field_container background-image\">
\t\t\t\t<label>Hintergrundbild</label>
\t\t\t\t<?php 
\t\t\t\t\$path = '-';
\t\t\t\tif( isset(\$this->bgimage) && !empty(\$this->bgimage) ) 
\t\t\t\t{
\t\t\t\t\t\$objFile = \\Contao\\FilesModel::findByUuid( \$this->bgimage );
\t\t\t\t\tif( \$objFile !== null )
\t\t\t\t\t{
\t\t\t\t\t\t\$path = \$objFile->path;
\t\t\t\t\t}
\t\t\t\t}
\t\t\t\t?>
\t\t\t\t<span><?= \$path; ?></span>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"section_four\">
\t\t<?php 
\t\t\$url = \\Contao\\Environment::get('base').'contao?do=article&act=edit&id='.\$this->id.'&rt='.\\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue().'#pal_theme_settings';
\t\t?>
\t\t<button class=\"settings\" data-value=\"<?= \$url; ?>\">Artikeleinstellungen</button>
\t\t<script>
\t\t\tjQuery(document).ready(function() 
\t\t\t{
\t\t\t\tjQuery('#theme_settings_<?= \$this->id; ?> button.settings').click(function(e)
\t\t\t\t{
\t\t\t\t\te.preventDefault();
\t\t\t\t\tlocation.href = jQuery(this).attr('data-value');
\t\t\t\t});
\t\t\t});
\t\t</script>
\t</div>
</div>

<script>
/**
 * Toggle theme settings container open/close
 */
// !-- toggle: open close
jQuery(document).ready(function() 
{
\tvar objElement = jQuery('#theme_settings_<?= \$this->id; ?>').parent('a.theme_settings');
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}

\tvar objElements = jQuery('a.theme_settings');

\tobjElement.click(function(e)
\t{
\t\te.preventDefault();
\t\t// close any open other container
\t\tobjElements.not(this).removeClass('active');
\t\tobjElements.parents('li').removeClass('active');
\t\t// toggle active the current one
\t\tjQuery(this).toggleClass('active');
\t\tjQuery('#li_<?= \$this->id; ?>').toggleClass('active');
\t});

\tjQuery('#main').click(function(e)
\t{
\t\tobjElements.removeClass('active');
\t\tjQuery('#li_<?= \$this->id; ?>').removeClass('active');
\t});
});


/**
 * Button interaction
 */
// !-- field toggler
jQuery(document).ready(function() 
{
\tvar objElements = jQuery('#theme_settings_<?= \$this->id; ?> .clickable');
\tif(objElements.length < 1)
\t{
\t\treturn;
\t}
\t
\tobjElements.click(function(e)
\t{
\t\te.stopPropagation();
\t\te.preventDefault();
\t\t
\t\tvar _this = jQuery(this);
\t\tvar strField = _this.attr('data-field');
\t\tvar varValue = _this.attr('data-value');
\t\t
\t\t// set active
\t\t_this.toggleClass('active');
\t\t
\t\t// remove sibling active 
\t\t_this.siblings('li').removeClass('active');

\t\tif( _this.hasClass('active') === false )
\t\t{
\t\t\tvarValue = '';
\t\t}

\t\t// send event
\t\tjQuery(document).trigger('THEME_SETTINGS.'+strField,{'elem':<?= \$this->id; ?>,'value':varValue});

\t\t// send ajax
\t\tjQuery.ajax(
\t\t{
\t\t\turl: location.href,
\t\t\tmethod:'POST',
\t\t\tdata: {'action':'toggleThemeSettingsFieldValue','elem':<?= \$this->id; ?>,'state':varValue,'field':strField}
\t\t});\t\t
\t});
});
</script>", "@pct_theme_settings/backend/be_article_themesettingsbutton.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/backend/be_article_themesettingsbutton.html5");
    }
}
