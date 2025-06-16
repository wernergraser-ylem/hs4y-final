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

/* @pct_theme_templates/customelements/customelement_featured_tab.html5 */
class __TwigTemplate_a3f7daf8a9104a5f1f1fa74f52a0834c extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_featured_tab.css|static';
?>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
\tjQuery(\".tabs_<?= \$this->id; ?> li:first\").addClass('active');
\tjQuery(\".tabs_<?= \$this->id; ?> li:first span\").attr('aria-selected',true);
\t
\tjQuery(\".panes_<?= \$this->id; ?> .section:first\").addClass('active');
    jQuery(\".tabs_<?= \$this->id; ?> li\").click(function(e){
        if (!jQuery(this).hasClass(\"active\")) {
            var tabNum = jQuery(this).index();
            var nthChild = tabNum+1;
            jQuery(\".tabs_<?= \$this->id; ?> li.active\").removeClass(\"active\").attr('aria-selected',false);
            jQuery(this).addClass(\"active\").attr('aria-selected',true);
            jQuery(\".panes_<?= \$this->id; ?> div.active\").removeClass(\"active\");
            jQuery(\".panes_<?= \$this->id; ?> div:nth-child(\"+nthChild+\")\").addClass(\"active\");
        }
    });
});

var el = jQuery(\"body\");
var animationClassesTabs = [\"fadeIn\", \"zoomIn\", \"fadeInDown\",\"fadeInDownBig\",\"fadeInLeft\",\"fadeInLeftBig\",\"fadeInRight\",\"fadeInRightBig\",\"fadeInUp\",\"fadeInUpBig\",\"rotateIn\",\"zoomIn\",\"slideInDown\",\"slideInLeft\",\"slideInRight\",\"slideInUp\",\"bounceIn\",\"bounceInDown\",\"bounceInLeft\",\"bounceInRight\",\"bounceInUp\"];
jQuery.each(animationClassesTabs, function(key, value){
\tel.find(\".\" + value).each(function(){
\t\tjQuery(this).removeClass(value).attr(\"data-animate\", value);
\t\t
\t});
});
\t
jQuery(document).ready(function() {
\tvar animate_start_tab = function(element) {
\t\telement.find('.animate').each(function() {
\t\t\tvar item = jQuery(this);
\t\t    var animation = item.data(\"animate\");
\t\t    if(jQuery('body').hasClass('ios') || jQuery('body').hasClass('android')) {
\t\t    \titem.removeClass('animate');
\t\t    \treturn true;
\t\t    } else {
\t\t\t    
\t            jQuery('.ce_featured_tab ul li a').click(function(){
\t    \t\t\titem.removeClass('animate').addClass('animated '+animation).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
\t    \t\t\t\titem.removeClass(animation+' animated');
\t    \t\t\t});
\t           });
\t        }
\t\t});
\t};
\t
\tjQuery('.ce_featured_tab').each(function() {
\t\tanimate_start_tab( jQuery(this) );
\t});

});
\t

</script>
<!-- SEO-SCRIPT-STOP -->\t
<div class=\"<?= \$this->class; ?> block <?= \$this->field('counts')->value(); ?> <?= \$this->field('style')->value(); ?>\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"tabs tabs_<?= \$this->id; ?>\" aria-label=\"Featured tabs\">
\t\t<ul role=\"tablist\">
\t\t<?php foreach(\$this->group('tab') as \$i => \$fields): ?>
\t\t\t<li id=\"tab_<?= \$this->id .'_'.\$i; ?>\" role=\"presentation\">
\t\t\t\t<span role=\"tab\" aria-selected=\"<?= \$i == 0 ? 'true' : 'false'; ?>\" aria-controls=\"panes_<?= \$this->id .'_'.\$i; ?>\" tabindex=\"<?= \$i; ?>\">
\t\t\t\t\t<div class=\"tab_info\">
\t\t\t\t\t\t<?php if(\$this->field('headline#'.\$i)->value()): ?><?= \$this->field('headline#'.\$i)->html(); ?><?php endif; ?>
\t\t\t\t\t\t<?php if(\$this->field('text#'.\$i)->value()): ?><?= \$this->field('text#'.\$i)->value(); ?><?php endif; ?>
\t\t\t\t\t</div>
\t\t\t\t</span>
\t\t\t</li>
\t\t<?php endforeach; ?>
\t\t</ul>
\t</div>
\t<div id=\"panes_<?= \$this->id; ?>\" class=\"panes panes_<?= \$this->id; ?> <?= \$this->field('schema')->value(); ?>\">
\t\t<?php foreach(\$this->group('tab') as \$i => \$fields): ?>
\t\t<div id=\"panes_<?= \$this->id .'_'.\$i; ?>\" class=\"section\" role=\"tabpanel\" tabindex=\"<?= \$i; ?>\" aria-labelledby=\"tab_<?= \$this->id .'_'.\$i; ?>\">
\t\t\t<div class=\"panes_image nowaypoint <?= \$this->field('animation#'.\$i)->value(); ?>\">
\t\t\t\t<?= \$this->field('image#'.\$i)->html(); ?>
\t\t\t</div>
\t\t</div>
\t\t<?php endforeach; ?>
\t</div>
</div>
<div class=\"clear\"></div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_featured_tab.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_featured_tab.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_featured_tab.html5");
    }
}
