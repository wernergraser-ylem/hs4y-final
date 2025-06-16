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

/* @pct_theme_templates/customelements/customelement_testimonial_slider.html5 */
class __TwigTemplate_7eecfd8be3ded8f7e4cd20fc55e51f99 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_testimonial_slider.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_testimonial_slider.html5"));

        // line 1
        yield "<?php
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_testimonial_slider.css|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/swiper/swiper.min.css|static';\t
?>
<!-- SEO-SCRIPT-START -->
<script>
var swiper_<?php echo \$this->id; ?> = null;
jQuery(document).ready(function(){
 \tswiper_<?php echo \$this->id; ?> = new Swiper('#swiper_<?php echo \$this->id; ?>', {
\t \teffect: 'slide',
\t \tfadeEffect: {crossFade: true},
\t \tgrabCursor: true,
\t \tdirection: 'horizontal',
\t \tcenteredSlides: true,
\t \tloop: true,
\t \t<?php if(\$this->field('navigation')->value()): ?>
\t \tnavigation: {
        \tnextEl: '#swiper-button-next_<?php echo \$this->id; ?>',
\t\t\tprevEl: '#swiper-button-prev_<?php echo \$this->id; ?>',
\t\t},
\t\t<?php endif; ?>
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
          slidesPerView: 2,
          spaceBetween: 60,
        },
        1000: {
          slidesPerView: 3,
          spaceBetween: 60,
        },

      },
\t});
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
\t
});
</script>
<!-- SEO-SCRIPT-STOP -->

<div class=\"<?=  \$this->class; ?>\" data-style=\"<?php echo \$this->field('style')->value(); ?>\" data-size=\"<?php echo \$this->field('size')->value(); ?>\" <?php echo \$this->cssID; ?>>
\t<div class=\"swiper-container\" id=\"swiper_<?php echo \$this->id; ?>\">
\t\t<div class=\"swiper-wrapper\">
\t\t<?php if( !empty(\$this->group('content')) ): ?>
\t\t\t<?php foreach(\$this->group('content') as \$i => \$fields): ?>
\t\t\t<div class=\"swiper-slide\">
\t\t\t\t<div class=\"swiper-content\">
\t\t\t\t\t<?php if(\$this->field('text#'.\$i)->value()): ?>
\t\t\t\t\t<div class=\"text\"><?php echo \$this->field('text#'.\$i)->value(); ?><div class=\"bottom-arrow\"></div></div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('image#'.\$i)->value()): ?>
\t\t\t\t\t<div class=\"image\"><?php echo \$this->field('image#'.\$i)->html(); ?></div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('name#'.\$i)->value()): ?>
\t\t\t\t\t<div class=\"name\"><?php echo \$this->field('name#'.\$i)->value(); ?></div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('info#'.\$i)->value()): ?>
\t\t\t\t\t<div class=\"info\"><?php echo \$this->field('info#'.\$i)->value(); ?></div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<?php endforeach; ?>
\t\t<?php endif; ?>
\t\t</div>
\t\t<?php if(\$this->field('navigation')->value()): ?>
\t\t<div class=\"swiper-buttons\">
\t\t\t<div id=\"swiper-button-prev_<?php echo \$this->id; ?>\" class=\"swiper-button-prev\"></div>
\t\t\t<div id=\"swiper-button-next_<?php echo \$this->id; ?>\" class=\"swiper-button-next\"></div>
\t\t</div>
\t\t<?php endif; ?>
\t\t<div id=\"swiper-pagination_<?php echo \$this->id; ?>\" class=\"swiper-pagination\"></div>
\t\t<div class=\"circle\">
\t\t\t<div class=\"circle-bg\"></div>
\t\t\t<span>
\t\t\t\t<i class=\"fa fa-angle-left\"></i>
\t\t\t\t<i class=\"fa fa-angle-right last\"></i>
\t\t\t</span>
\t\t</div>
\t</div>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_testimonial_slider.html5";
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
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_testimonial_slider.css|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/swiper/swiper.min.css|static';\t
?>
<!-- SEO-SCRIPT-START -->
<script>
var swiper_<?php echo \$this->id; ?> = null;
jQuery(document).ready(function(){
 \tswiper_<?php echo \$this->id; ?> = new Swiper('#swiper_<?php echo \$this->id; ?>', {
\t \teffect: 'slide',
\t \tfadeEffect: {crossFade: true},
\t \tgrabCursor: true,
\t \tdirection: 'horizontal',
\t \tcenteredSlides: true,
\t \tloop: true,
\t \t<?php if(\$this->field('navigation')->value()): ?>
\t \tnavigation: {
        \tnextEl: '#swiper-button-next_<?php echo \$this->id; ?>',
\t\t\tprevEl: '#swiper-button-prev_<?php echo \$this->id; ?>',
\t\t},
\t\t<?php endif; ?>
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
          slidesPerView: 2,
          spaceBetween: 60,
        },
        1000: {
          slidesPerView: 3,
          spaceBetween: 60,
        },

      },
\t});
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
\t
});
</script>
<!-- SEO-SCRIPT-STOP -->

<div class=\"<?=  \$this->class; ?>\" data-style=\"<?php echo \$this->field('style')->value(); ?>\" data-size=\"<?php echo \$this->field('size')->value(); ?>\" <?php echo \$this->cssID; ?>>
\t<div class=\"swiper-container\" id=\"swiper_<?php echo \$this->id; ?>\">
\t\t<div class=\"swiper-wrapper\">
\t\t<?php if( !empty(\$this->group('content')) ): ?>
\t\t\t<?php foreach(\$this->group('content') as \$i => \$fields): ?>
\t\t\t<div class=\"swiper-slide\">
\t\t\t\t<div class=\"swiper-content\">
\t\t\t\t\t<?php if(\$this->field('text#'.\$i)->value()): ?>
\t\t\t\t\t<div class=\"text\"><?php echo \$this->field('text#'.\$i)->value(); ?><div class=\"bottom-arrow\"></div></div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('image#'.\$i)->value()): ?>
\t\t\t\t\t<div class=\"image\"><?php echo \$this->field('image#'.\$i)->html(); ?></div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('name#'.\$i)->value()): ?>
\t\t\t\t\t<div class=\"name\"><?php echo \$this->field('name#'.\$i)->value(); ?></div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('info#'.\$i)->value()): ?>
\t\t\t\t\t<div class=\"info\"><?php echo \$this->field('info#'.\$i)->value(); ?></div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<?php endforeach; ?>
\t\t<?php endif; ?>
\t\t</div>
\t\t<?php if(\$this->field('navigation')->value()): ?>
\t\t<div class=\"swiper-buttons\">
\t\t\t<div id=\"swiper-button-prev_<?php echo \$this->id; ?>\" class=\"swiper-button-prev\"></div>
\t\t\t<div id=\"swiper-button-next_<?php echo \$this->id; ?>\" class=\"swiper-button-next\"></div>
\t\t</div>
\t\t<?php endif; ?>
\t\t<div id=\"swiper-pagination_<?php echo \$this->id; ?>\" class=\"swiper-pagination\"></div>
\t\t<div class=\"circle\">
\t\t\t<div class=\"circle-bg\"></div>
\t\t\t<span>
\t\t\t\t<i class=\"fa fa-angle-left\"></i>
\t\t\t\t<i class=\"fa fa-angle-right last\"></i>
\t\t\t</span>
\t\t</div>
\t</div>
</div>", "@pct_theme_templates/customelements/customelement_testimonial_slider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_testimonial_slider.html5");
    }
}
