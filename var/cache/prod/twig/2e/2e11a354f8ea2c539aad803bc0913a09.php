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

/* @pct_theme_templates/customcatalog/customcatalog_booklibrary_ajaxsearch_results.html5 */
class __TwigTemplate_6742a63c011f6c14b40caa63e9ff13cf extends Template
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
\t\t\t\t\t<?php if(\$entry->field('author')->value()): ?><div class=\"author\"><?php echo \$entry->field('author')->html(); ?></div><?php endif; ?>
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
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_booklibrary_ajaxsearch_results.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_booklibrary_ajaxsearch_results.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_booklibrary_ajaxsearch_results.html5");
    }
}
