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

/* @pct_theme_settings/backend/be_content_themesettingsbutton.html5 */
class __TwigTemplate_24ed3c237770121173ccda10149775c9 extends Template
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
\$objLang = (object)\$GLOBALS['TL_LANG']['quicksettings'];
?>
<div id=\"theme_settings_<?= \$this->id; ?>\" class=\"content_quicksettings theme_settings\">
\t<div class=\"section_one\">
\t\t<div class=\"content_quicksettings_inside\">
\t\t\t<div class=\"field_container margin_top_classes margin_t\">
\t\t\t\t<label><?= \$objLang->margin_top ?? 'Margin top'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"mt-xxl clickable<?php if(\$this->margin_t == 'mt-xxl'): ?> active<?php endif; ?>\" data-field=\"margin_t\" data-value=\"mt-xxl\">XXL</li>
\t\t\t\t\t<li class=\"mt-xl clickable<?php if(\$this->margin_t == 'mt-xl'): ?> active<?php endif; ?>\" data-field=\"margin_t\" data-value=\"mt-xl\">XL</li>
\t\t\t\t\t<li class=\"mt-l clickable<?php if(\$this->margin_t == 'mt-l'): ?> active<?php endif; ?>\" data-field=\"margin_t\" data-value=\"mt-l\">L</li>
\t\t\t\t\t<li class=\"mt-m clickable<?php if(\$this->margin_t == 'mt-m'): ?> active<?php endif; ?>\" data-field=\"margin_t\" data-value=\"mt-m\">M</li>
\t\t\t\t\t<li class=\"mt-s clickable<?php if(\$this->margin_t == 'mt-s'): ?> active<?php endif; ?>\" data-field=\"margin_t\" data-value=\"mt-s\">S</li>
\t\t\t\t\t<li class=\"mt-xs clickable<?php if(\$this->margin_t == 'mt-xs'): ?> active<?php endif; ?>\" data-field=\"margin_t\" data-value=\"mt-xs\">XS</li>
\t\t\t\t\t<li class=\"mt-xxs clickable<?php if(\$this->margin_t == 'mt-xxs'): ?> active<?php endif; ?>\" data-field=\"margin_t\" data-value=\"mt-xxs\">XXS</li>
\t\t\t\t\t<li class=\"mt-0 clickable<?php if(\$this->margin_t == 'mt-0'): ?> active<?php endif; ?>\" data-field=\"margin_t\" data-value=\"mt-0\">0</li>
\t\t\t\t</ul>
\t\t\t</div>

\t\t\t<div class=\"field_container margin_bottom_classes margin_b\">
\t\t\t\t<label><?= \$objLang->margin_bottom ?? 'Margin bottom'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"mb-xxl clickable<?php if(\$this->margin_b == 'mb-xxl'): ?> active<?php endif; ?>\" data-field=\"margin_b\" data-value=\"mb-xxl\">XXL</li>
\t\t\t\t\t<li class=\"mb-xl clickable<?php if(\$this->margin_b == 'mb-xl'): ?> active<?php endif; ?>\" data-field=\"margin_b\" data-value=\"mb-xl\">XL</li>
\t\t\t\t\t<li class=\"mb-l clickable<?php if(\$this->margin_b == 'mb-l'): ?> active<?php endif; ?>\" data-field=\"margin_b\" data-value=\"mb-l\">L</li>
\t\t\t\t\t<li class=\"mb-m clickable<?php if(\$this->margin_b == 'mb-m'): ?> active<?php endif; ?>\" data-field=\"margin_b\" data-value=\"mb-m\">M</li>
\t\t\t\t\t<li class=\"mb-s clickable<?php if(\$this->margin_b == 'mb-s'): ?> active<?php endif; ?>\" data-field=\"margin_b\" data-value=\"mb-s\">S</li>
\t\t\t\t\t<li class=\"mb-xs clickable<?php if(\$this->margin_b == 'mb-xs'): ?> active<?php endif; ?>\" data-field=\"margin_b\" data-value=\"mb-xs\">XS</li>
\t\t\t\t\t<li class=\"mb-xxs clickable<?php if(\$this->margin_b == 'mb-xxs'): ?> active<?php endif; ?>\" data-field=\"margin_b\" data-value=\"mb-xxs\">XXS</li>
\t\t\t\t\t<li class=\"mb-0 clickable<?php if(\$this->margin_b == 'mb-0'): ?> active<?php endif; ?>\" data-field=\"margin_b\" data-value=\"mb-0\">0</li>
\t\t\t\t</ul>
\t\t\t</div>\t\t
\t\t</div>
\t</div>
\t
\t<div class=\"section_two\">
\t\t<div class=\"content_quicksettings_inside\">
\t\t\t<div class=\"field_container margin_top_m_classes margin_t_m\">
\t\t\t\t<label><?= \$objLang->margin_top_mobile ?? 'Mobile: Margin top'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"mt-xxl clickable<?php if(\$this->margin_t_m == 'mt-xxl-m'): ?> active<?php endif; ?>\" data-field=\"margin_t_m\" data-value=\"mt-xxl-m\">XXL</li>
\t\t\t\t\t<li class=\"mt-xl clickable<?php if(\$this->margin_t_m == 'mt-xl-m'): ?> active<?php endif; ?>\" data-field=\"margin_t_m\" data-value=\"mt-xl-m\">XL</li>
\t\t\t\t\t<li class=\"mt-l clickable<?php if(\$this->margin_t_m == 'mt-l-m'): ?> active<?php endif; ?>\" data-field=\"margin_t_m\" data-value=\"mt-l-m\">L</li>
\t\t\t\t\t<li class=\"mt-m clickable<?php if(\$this->margin_t_m == 'mt-m-m'): ?> active<?php endif; ?>\" data-field=\"margin_t_m\" data-value=\"mt-m-m\">M</li>
\t\t\t\t\t<li class=\"mt-s clickable<?php if(\$this->margin_t_m == 'mt-s-m'): ?> active<?php endif; ?>\" data-field=\"margin_t_m\" data-value=\"mt-s-m\">S</li>
\t\t\t\t\t<li class=\"mt-xs clickable<?php if(\$this->margin_t_m == 'mt-xs-m'): ?> active<?php endif; ?>\" data-field=\"margin_t_m\" data-value=\"mt-xs-m\">XS</li>
\t\t\t\t\t<li class=\"mt-xxs clickable<?php if(\$this->margin_t_m == 'mt-xxs-m'): ?> active<?php endif; ?>\" data-field=\"margin_t_m\" data-value=\"mt-xxs-m\">XXS</li>
\t\t\t\t\t<li class=\"mt-0 clickable<?php if(\$this->margin_t_m == 'mt-0-m'): ?> active<?php endif; ?>\" data-field=\"margin_t_m\" data-value=\"mt-0-m\">0</li>
\t\t\t\t</ul>
\t\t\t</div>

\t\t\t<div class=\"field_container margin_bottom_m_classes margin_b_m\">
\t\t\t\t<label><?= \$objLang->margin_bottom_mobile ?? 'Mobile: Margin top'; ?></label>
\t\t\t\t<ul>
\t\t\t\t\t<li class=\"mb-xxl clickable<?php if(\$this->margin_b_m == 'mb-xxl-m'): ?> active<?php endif; ?>\" data-field=\"margin_b_m\" data-value=\"mb-xxl-m\">XXL</li>
\t\t\t\t\t<li class=\"mb-xl clickable<?php if(\$this->margin_b_m == 'mb-xl-m'): ?> active<?php endif; ?>\" data-field=\"margin_b_m\" data-value=\"mb-xl-m\">XL</li>
\t\t\t\t\t<li class=\"mb-l clickable<?php if(\$this->margin_b_m == 'mb-l-m'): ?> active<?php endif; ?>\" data-field=\"margin_b_m\" data-value=\"mb-l-m\">L</li>
\t\t\t\t\t<li class=\"mb-m clickable<?php if(\$this->margin_b_m == 'mb-m-m'): ?> active<?php endif; ?>\" data-field=\"margin_b_m\" data-value=\"mb-m-m\">M</li>
\t\t\t\t\t<li class=\"mb-s clickable<?php if(\$this->margin_b_m == 'mb-s-m'): ?> active<?php endif; ?>\" data-field=\"margin_b_m\" data-value=\"mb-s-m\">S</li>
\t\t\t\t\t<li class=\"mb-xs clickable<?php if(\$this->margin_b_m == 'mb-xs-m'): ?> active<?php endif; ?>\" data-field=\"margin_b_m\" data-value=\"mb-xs-m\">XS</li>
\t\t\t\t\t<li class=\"mb-xxs clickable<?php if(\$this->margin_b_m == 'mb-xxs-m'): ?> active<?php endif; ?>\" data-field=\"margin_b_m\" data-value=\"mb-xxs-m\">XXS</li>
\t\t\t\t\t<li class=\"mb-0 clickable<?php if(\$this->margin_b_m == 'mb-0-m'): ?> active<?php endif; ?>\" data-field=\"margin_b_m\" data-value=\"mb-0-m\">0</li>
\t\t\t\t</ul>
\t\t\t</div>\t\t
\t\t</div>
\t</div>

\t
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
\t\tjQuery('#li_<?= \$this->id; ?>').toggleClass('active');\t
\t});

\tjQuery('#main').click(function(e)
\t{
\t\tobjElements.removeClass('active');
\t\tjQuery('#li_<?= \$this->id; ?>').removeClass('active');\t
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
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_settings/backend/be_content_themesettingsbutton.html5";
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
        return new Source("", "@pct_theme_settings/backend/be_content_themesettingsbutton.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/backend/be_content_themesettingsbutton.html5");
    }
}
