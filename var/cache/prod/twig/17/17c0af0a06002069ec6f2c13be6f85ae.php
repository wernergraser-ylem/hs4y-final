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

/* @pct_theme_templates/customelements/customelement_swiperslider_start.html5 */
class __TwigTemplate_b02712d4c4925e673202541fbcac259b extends Template
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
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/swiper/swiper.min.css|static';\t
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_swiper_slider_start.css|static';
?>
<?php 
\$GLOBALS['PCT_FRAMEWORK']['swiper_instance'] = \$this->id; 

if (\$this->field('pagination_padding')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>#swiper_\" . \$this->id  . \" .swiper-pagination{transform: translateY(\" . \$this->field('pagination_padding')->value() . \"px);}</style>\";
}

?>
<!-- SEO-SCRIPT-START -->
<script>
var swiper_<?php echo \$this->id; ?> = null;
jQuery(document).ready(function()
{
 \tswiper_<?php echo \$this->id; ?> = new Swiper('#swiper_<?php echo \$this->id; ?>', {
\t \teffect: '<?php echo \$this->field('effect')->value(); ?>',
\t \tfadeEffect: {crossFade: true},
\t \tspeed: <?php echo \$this->field('speed')->value() ?: 3000; ?>,
\t \tgrabCursor: true,
\t \tdirection: 'horizontal',
\t \t<?php if(\$this->field('centered_slides')->value()): ?>centeredSlides: true,<?php endif; ?>
\t \t<?php if(\$this->field('autoplay')->value()): ?>
\t \tautoplay: {
        \tdelay: <?php echo \$this->field('autoplay')->value(); ?>,
\t\t\tdisableOnInteraction: false,
      \t},
\t  \t<?php endif; ?>
\t \t<?php if(\$this->field('loop')->value()): ?>loop: true,<?php endif; ?>
\t \tnavigation: {
        \tnextEl: '#swiper-button-next_<?php echo \$this->id; ?>',
\t\t\tprevEl: '#swiper-button-prev_<?php echo \$this->id; ?>',
\t\t},
\t\t<?php if(\$this->field('pagination')->value()): ?>
\t \tpagination:\t{
        \tel: '#swiper-pagination_<?php echo \$this->id; ?>',
\t\t\tclickable: true,
      \t},
      \t<?php endif; ?>
        breakpoints: {
        10: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        768: {
          slidesPerView: <?php if(\$this->field('slides_per_view')->value()): ?><?php echo \$this->field('slides_per_view')->value(); ?><?php else: ?>1<?php endif; ?>,
          spaceBetween: <?php if(\$this->field('spaceBetween')->value()): ?><?php echo \$this->field('spaceBetween')->value(); ?><?php else: ?>0<?php endif; ?>,
        },
      },
\t});
\t
\t
\tswiper_<?php echo \$this->id; ?>.on('touchStart',function(elem,event)
\t{
\t\tjQuery('#swiper_<?php echo \$this->id; ?>').addClass('mousedown');
\t\tconsole.log(event);
\t});
\t
\tswiper_<?php echo \$this->id; ?>.on('touchEnd',function(elem,event)
\t{
\t\tjQuery('#swiper_<?php echo \$this->id; ?>').removeClass('mousedown');
\t});
\t
\tjQuery('#swiper_<?= \$this->id; ?> .swiper-wrapper').on('mouseover mouseout',function(event)
\t{
\t\tvar _this = jQuery('#swiper_<?= \$this->id; ?>');
\t\tif( event.type == 'mouseover' )
\t\t{
\t\t\t_this.addClass('mouseover');
\t\t}
\t\telse
\t\t{
\t\t\t_this.removeClass('mouseover');
\t\t}
\t});
\t
\t<?php if(!\$this->field('mouse_cursor_hide')->value()): ?>
\tvar circle = jQuery('#swiper_<?= \$this->id; ?> .circle');
\tvar eventStarted = false;
\tjQuery('#swiper_<?= \$this->id; ?>').on('mouseover mouseout',function(event)
\t{
\t\tvar _this = jQuery(this);
\t\tif( event.type == 'mouseover' && eventStarted === false )
\t\t{
\t\t\teventStarted = true;
\t\t\t
\t\t\tjQuery(document).on('mousemove',function(e)
\t\t\t{
\t\t\t\tvar x = e.pageX - _this.offset().left;
\t\t\t\tvar y = e.pageY - _this.offset().top;
\t\t\t\tcircle.css( { left: x, top: y } );
\t\t\t});\t
\t\t}
\t\telse
\t\t{
\t\t\tjQuery(document).unbind('mousemove');
\t\t\teventStarted = false;
\t\t}
\t});
\t<?php endif; ?>

});
</script>
<!-- SEO-SCRIPT-STOP -->

<div class=\"<?php echo \$this->class; ?> block<?php if(\$this->field('style')->value()): ?> <?php echo \$this->field('style')->value(); ?><?php endif; ?> <?php echo \$this->field('pagination_color')->value(); ?>\"<?php echo \$this->cssID; ?>>
<div class=\"swiper-container<?php if(\$this->field('navigationhide')->value()): ?> hide-arrows<?php endif; ?><?php if(\$this->field('mouse_cursor_hide')->value()): ?> hide-cursor<?php endif; ?><?php if(\$this->field('pagination')->value()): ?> swip-pagination<?php endif; ?><?php if(\$this->field('pagination_align')->value()): ?> <?php echo \$this->field('pagination_align')->value(); ?><?php endif; ?>\" id=\"swiper_<?php echo \$this->id; ?>\">
\t<div class=\"swiper-wrapper\">
\t\t<div class=\"swiper-slide\">
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_swiperslider_start.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_swiperslider_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_swiperslider_start.html5");
    }
}
