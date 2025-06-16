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

/* @pct_theme_templates/customelements/customelement_page_navi.html5 */
class __TwigTemplate_48359fc431abd6bbbf31a8bc79013cf7 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_page_navi.css|static';
?>
<nav class=\"mod_navigation page_navigation onepagenav block\">
\t<ul class=\"vlist level_1\">
\t<?php foreach(\$this->group('menu_item') as \$i => \$fields): ?>
\t\t\t<li class=\"mlist\">
\t\t\t\t<a href=\"<?php if(\\strpos(\$this->field('anchor#'.\$i)->value(),'#') === false): ?>#<?php endif; ?><?= \$this->field('anchor#'.\$i)->value(); ?>\" class=\"a-level_1 <?php if(\$this->field('cssclass#'.\$i)->value()): ?> <?php echo \$this->field('cssclass#'.\$i)->value(); ?><?php endif; ?>\">
\t\t\t\t\t<div class=\"title\"><?php echo \$this->field('title#'.\$i)->value(); ?></div>
\t\t\t\t\t<div class=\"glow\"></div>
\t\t\t\t\t<div class=\"circle\"></div>
\t\t\t\t</a>
\t\t\t</li>
\t<?php endforeach; ?>
\t</ul>
</nav>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\tjQuery('.page_navigation a:not(.external-anchor, .not-anchor, .backlink)').click(function(e)
\t{
\t\tjQuery('.page_navigation a').removeClass('active');
\t\tjQuery(this).addClass('active');
\t\t
    \tvar target = jQuery('#'+jQuery(this).attr(\"href\").split('#')[1]);
\t\tif(target == undefined || target == null)
        {
            return true;    
        }
        else if(target.length < 1)
        {
\t        return true;
        }
        
        var anchor = jQuery(this).attr(\"href\").split('#')[1];
\t\t
\t\te.preventDefault();
\t\t
\t\tvar posY = target.offset().top;
        if( jQuery('#stickyheader').height() )
        {
\t        posY -= jQuery('#stickyheader').height();
        }
        
        var duration = 500;
\t\tjQuery(\"html,body\").stop().animate({scrollTop: posY}, 
\t\t{
\t\t\tduration\t: duration,
\t\t\tstart\t\t: function()
\t\t\t{
\t\t\t\tlocalStorage.setItem('onepage_animate',1);
\t\t\t},
\t\t\tcomplete\t: function()
\t\t\t{
\t\t\t\t// on complete: remove the flag
\t\t\t\tsetTimeout(function()
\t\t\t\t{
\t\t\t\t\tlocalStorage.removeItem('onepage_animate');
\t\t\t\t}, duration);
\t\t\t\t
\t\t\t\t// store last position
\t\t\t\tlocalStorage.setItem('onepage_position', JSON.stringify({ 'y': posY, 'anchor': anchor }) );
\t\t\t}
\t\t});
    });
    
   if( localStorage.getItem('onepage_position') != null && localStorage.getItem('onepage_position') != undefined && window.location.hash.toString().length < 1 )
\t{
\t\tvar obj = JSON.parse(localStorage.getItem('onepage_position'));
\t\tjQuery('.page_navigation a[href=\"#'+obj.anchor+'\"]').trigger('click');
\t}
\t
\t
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_page_navi.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_page_navi.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_page_navi.html5");
    }
}
