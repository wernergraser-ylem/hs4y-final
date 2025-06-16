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

/* @pct_theme_templates/customcatalog/customcatalog_directory_ajaxsearch_results.html5 */
class __TwigTemplate_a834deeaf2fad0f70970196969208b8b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_directory_ajaxsearch_results.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_directory_ajaxsearch_results.html5"));

        // line 1
        yield "<?php \$sum = 0; ?>
<?php if(!\$this->empty): ?>
<div class=\"item-wrapper\">
\t<ul>
\t<?php foreach(\$this->entries as \$entry): ?>
\t\t<li class=\"item-inside\">
\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?><?php if(!\\Contao\\Config::get('pct_themedesigner_hidden')): ?>?themedesigner_iframe=1<?php endif; ?>\">
\t\t\t\t<div class=\"item-left\">
\t\t\t\t\t<?php if(\$entry->field('image')->value()): ?><div class=\"image\"><?php echo \$entry->field('image')->html(); ?></div><?php endif; ?>
\t\t\t\t</div>
\t\t\t\t<div class=\"item-right\">
\t\t\t\t\t<?php if(\$entry->field('name')->value()): ?><div class=\"name\"><strong><?php echo \$entry->field('name')->value(); ?></strong></div><?php endif; ?>
\t\t\t\t</div>
\t\t\t</a>
\t\t</li>
\t<?php endforeach; ?>
\t</ul>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Keine Artikel gefunden</p>
<?php endif;?>

<?php 
/**
 * Don't worry: The Javascript stuff will only be rendered when the ThemeDesigner is in edit mode
 */\t
if(!\\Contao\\Config::get('pct_themedesigner_hidden')): ?>
<?php \$objThemeDesigner = new \\PCT\\ThemeDesigner; ?>

<script>


jQuery(document).ready(function() 
{
\tjQuery('.item-wrapper a').click(function(event)
\t{
\t\tevent.preventDefault();
\t\t
\t\tvar strUrl = '<?= \$GLOBALS['PCT_THEMEDESIGNER']['ajaxUrl']; ?>';
\t\tif(!strUrl)
\t\t{
\t\t\tstrUrl = location.href;
\t\t}
\t\t
\t\tvar url = jQuery(this).attr('href');
\t\tif(url === undefined || url == '')
\t\t{
\t\t\treturn false;
\t\t}
\t\t\t\t
\t\tjQuery.ajax(
\t\t{
\t\t\tmethod\t: \"GET\",
\t\t\turl\t\t: strUrl,
\t\t\tdata\t: {'themedesigner':1,'action':'updateIframeUrl','url':url,'theme':'<?= \$objThemeDesigner->getTheme(); ?>'},
\t\t\tsuccess\t: function(response)
\t\t\t{
\t\t   \t\tif(url.indexOf('?') >= 0)
\t\t   \t\t{
\t\t\t   \t\tvar tmp = url.split('?');
\t\t\t   \t\turl = tmp[0];
\t\t   \t\t}
\t\t   \t\t
\t\t   \t\tif(url.indexOf('?') >= 0)
\t\t\t\t{
\t\t\t\t\turl += '&themedesigner_iframe=1';
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\turl +='?themedesigner_iframe=1';
\t\t\t\t}
\t\t   \t\t
\t\t   \t\tconsole.log('Redirect iframe to: '+url);
\t\t
\t\t   \t\tjQuery('#themedesigner_iframe',parent.document).attr('src',url);
\t\t   }
\t\t});
\t});
});


</script>

<?php endif; ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_directory_ajaxsearch_results.html5";
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
        return new Source("<?php \$sum = 0; ?>
<?php if(!\$this->empty): ?>
<div class=\"item-wrapper\">
\t<ul>
\t<?php foreach(\$this->entries as \$entry): ?>
\t\t<li class=\"item-inside\">
\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?><?php if(!\\Contao\\Config::get('pct_themedesigner_hidden')): ?>?themedesigner_iframe=1<?php endif; ?>\">
\t\t\t\t<div class=\"item-left\">
\t\t\t\t\t<?php if(\$entry->field('image')->value()): ?><div class=\"image\"><?php echo \$entry->field('image')->html(); ?></div><?php endif; ?>
\t\t\t\t</div>
\t\t\t\t<div class=\"item-right\">
\t\t\t\t\t<?php if(\$entry->field('name')->value()): ?><div class=\"name\"><strong><?php echo \$entry->field('name')->value(); ?></strong></div><?php endif; ?>
\t\t\t\t</div>
\t\t\t</a>
\t\t</li>
\t<?php endforeach; ?>
\t</ul>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Keine Artikel gefunden</p>
<?php endif;?>

<?php 
/**
 * Don't worry: The Javascript stuff will only be rendered when the ThemeDesigner is in edit mode
 */\t
if(!\\Contao\\Config::get('pct_themedesigner_hidden')): ?>
<?php \$objThemeDesigner = new \\PCT\\ThemeDesigner; ?>

<script>


jQuery(document).ready(function() 
{
\tjQuery('.item-wrapper a').click(function(event)
\t{
\t\tevent.preventDefault();
\t\t
\t\tvar strUrl = '<?= \$GLOBALS['PCT_THEMEDESIGNER']['ajaxUrl']; ?>';
\t\tif(!strUrl)
\t\t{
\t\t\tstrUrl = location.href;
\t\t}
\t\t
\t\tvar url = jQuery(this).attr('href');
\t\tif(url === undefined || url == '')
\t\t{
\t\t\treturn false;
\t\t}
\t\t\t\t
\t\tjQuery.ajax(
\t\t{
\t\t\tmethod\t: \"GET\",
\t\t\turl\t\t: strUrl,
\t\t\tdata\t: {'themedesigner':1,'action':'updateIframeUrl','url':url,'theme':'<?= \$objThemeDesigner->getTheme(); ?>'},
\t\t\tsuccess\t: function(response)
\t\t\t{
\t\t   \t\tif(url.indexOf('?') >= 0)
\t\t   \t\t{
\t\t\t   \t\tvar tmp = url.split('?');
\t\t\t   \t\turl = tmp[0];
\t\t   \t\t}
\t\t   \t\t
\t\t   \t\tif(url.indexOf('?') >= 0)
\t\t\t\t{
\t\t\t\t\turl += '&themedesigner_iframe=1';
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\turl +='?themedesigner_iframe=1';
\t\t\t\t}
\t\t   \t\t
\t\t   \t\tconsole.log('Redirect iframe to: '+url);
\t\t
\t\t   \t\tjQuery('#themedesigner_iframe',parent.document).attr('src',url);
\t\t   }
\t\t});
\t});
});


</script>

<?php endif; ?>", "@pct_theme_templates/customcatalog/customcatalog_directory_ajaxsearch_results.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_directory_ajaxsearch_results.html5");
    }
}
