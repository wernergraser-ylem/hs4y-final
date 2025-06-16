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

/* @pct_revolutionslider/js_revoslider_default.html5 */
class __TwigTemplate_035bc941bc5e1459f3e57c8b5ff5e79d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_revolutionslider/js_revoslider_default.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_revolutionslider/js_revoslider_default.html5"));

        // line 1
        yield "
<?php 
// layout shit
\$mobileHeight = \\floor(767 / ( \$this->startWidth/\$this->startHeight ));
\$styles = ['.ce_revolutionslider '.\$this->selector.' {height: '.\$this->startHeight.'px;}'];
\$styles[] = '@media only screen and (max-width: 767px) {.ce_revolutionslider .'.\$this->selector.' {height: '.\$mobileHeight.'px}}';
\$GLOBALS['TL_HEAD'][] = '<style name=\"rs_style_'.\$this->id.'\">'.implode(\"\\n\",\$styles).'</style>';
?>

<script id=\"revolutionslider_<?= \$this->id; ?>\">
jQuery(document).ready(function() 
{\t
\tvar options = 
\t{
\t\tjsFileLocation:'<?= \$GLOBALS['REVOLUTIONSLIDER']['scriptPath']; ?>/js/',
\t\tdelay:<?php echo \$this->delay; ?>,
\t\tresponsiveLevels:[<?= \$this->startWidth; ?>,<?= \$this->breakpoint_mobile ? (\$this->breakpoint_mobile) : 767; ?>],\t// Single or Array for Responsive Levels i.e.: 4064 or i.e. [2048, 1024, 768, 480]\t\t\t\t\t
\t\tvisibilityLevels:[<?= \$this->startWidth; ?>,<?= \$this->breakpoint_mobile ? (\$this->breakpoint_mobile) : 767; ?>],\t// Single or Array for Responsive Visibility Levels i.e.: 4064 or i.e. [2048, 1024, 768, 480]\t\t\t\t\t
\t\tgridwidth:[<?= \$this->startWidth; ?>],\t\t\t
\t\tgridheight:[<?= \$this->startHeight; ?>],
\t\tautoHeight:\"off\",\t\t\t\t\t
\t\tsliderType : \"standard\",\t\t\t\t\t\t\t// standard, carousel, hero\t\t\t\t\t
\t\tsliderLayout : \"<?= \$this->sliderLayout; ?>\",\t\t// auto, fullscreen\t\t\t\t
\t\tfullScreenAutoWidth:\"off\",\t\t\t\t\t\t\t// Turns the FullScreen Slider to be a FullHeight but auto Width Slider
\t\tfullScreenAlignForce:\"off\",
\t\tfullScreenOffset:\"0\",\t\t\t\t\t\t\t\t// Size for FullScreen Slider minimising\t\t\t\t\t
\t\thideCaptionAtLimit:0,\t\t\t\t\t\t\t\t// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
\t\thideAllCaptionAtLimit:0,\t\t\t\t\t\t\t// Hide all The Captions if Width of Browser is less then this value
\t\thideSliderAtLimit:0,\t\t\t\t\t\t\t\t// Hide the whole slider, and stop also functions if Width of Browser is less than this value\t\t\t\t\t\t\t\t\t\t
\t\tdisableProgressBar:\"on\",\t\t\t\t\t\t\t// Hides Progress Bar if is set to \"on\"
\t\tstartWithSlide:<?= \$this->startWithSlide ? (\$this->startWithSlide - 1) : 0; ?>,\t
\t\tstopAtSlide:<?= \$this->stopAtSlide ?: -1; ?>,\t\t\t\t// Stop Timer if Slide \"x\" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
\t\tstopAfterLoops:<?= \$this->stopAfterLoops ?: -1; ?>,\t\t// Stop Timer if All slides has been played \"x\" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
\t\tshadow:0,\t\t\t\t\t\t\t\t\t\t\t//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
\t\tstartDelay:0,\t\t\t\t\t\t\t\t\t\t// Delay before the first Animation starts.\t\t\t\t
\t\tlazyType : \"smart\",\t\t\t\t\t\t\t\t\t//full, smart, single
\t\tspinner:\"spinner0\",\t
\t\tshuffle:\"off\",
\t\tviewPort:{
\t\t\tenable:true,\t\t\t\t\t\t\t\t\t// if enabled, slider wait with start or wait at first slide.
\t\t\toutof:\"wait\",\t\t\t\t\t\t\t\t\t// wait,pause\t\t\t\t\t\t
\t\t\tvisible_area:\"80%\",\t\t\t\t\t\t\t\t// Start Animation when 60% of Slider is visible
\t\t\tpresize:false \t\t\t\t\t\t\t\t\t// Presize the Height of the Slider Container for Internal Link Positions
\t\t},
\t\tfallbacks:{
\t\t\tisJoomla:false,
\t\t\tpanZoomDisableOnMobile:\"off\",
\t\t\tsimplifyAll:\"on\",
\t\t\tnextSlideOnWindowFocus:\"off\",\t
\t\t\tdisableFocusListener:true,
\t\t\tignoreHeightChanges:\"off\",  // off, mobile, always
\t\t\tignoreHeightChangesSize:0,
\t\t\tallowHTML5AutoPlayOnAndroid:true
\t\t},
\t\tparallax : {
\t\t\ttype : \"scroll\",\t\t\t\t\t\t// off, mouse, scroll, mouse+scroll
\t\t\tlevels: [10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85],
\t\t\torigo:\"enterpoint\",\t\t\t\t// slidercenter or enterpoint
\t\t\tspeed:400,
\t\t\tbgparallax : \"on\",
\t\t\topacity:\"on\",
\t\t\tdisable_onmobile:\"off\",
\t\t\tddd_shadow:\"on\",
\t\t\tddd_bgfreeze:\"off\",
\t\t\tddd_overflow:\"visible\",
\t\t\tddd_layer_overflow:\"visible\",
\t\t\tddd_z_correction:65,
\t\t\tddd_path:\"mouse\"\t\t\t\t\t\t\t\t
\t\t},
\t\tscrolleffect: {
\t\t\tfade:\"off\",
\t\t\tblur:\"off\",
\t\t\tscale:\"off\",
\t\t\tgrayscale:\"off\",\t\t\t\t\t
\t\t\tmaxblur:10,\t\t\t\t\t\t\t\t\t
\t\t\ton_layers:\"off\",
\t\t\ton_slidebg:\"off\",
\t\t\ton_static_layers:\"off\",
\t\t\ton_parallax_layers:\"off\",
\t\t\ton_parallax_static_layers:\"off\",
\t\t\tdirection:\"both\",
\t\t\tmultiplicator:1.35,
\t\t\tmultiplicator_layers:0.5,
\t\t\ttilt:30,
\t\t\tdisable_on_mobile:\"on\"\t\t
\t\t},\t\t
\t\tnavigation : 
\t\t{
\t\t\tkeyboardNavigation:\"off\",\t
\t\t\tkeyboard_direction:\"horizontal\",\t\t\t\t\t\t\t\t\t//\thorizontal - left/right arrows,  vertical - top/bottom arrows
\t\t\tmouseScrollNavigation:\"off\",\t\t\t\t\t\t\t\t\t\t// on, off, carousel\t\t\t\t\t
\t\t\ttouch: {
\t\t\t\ttouchenabled:\"off\",\t\t\t\t\t\t\t\t\t\t\t\t// Enable Swipe Function : on/off
\t\t\t\ttouchOnDesktop:\"off\",\t\t\t\t\t\t\t\t\t\t\t// Enable Tuoch on Desktop Systems also
\t\t\t\tswipe_treshold : 75,\t\t\t\t\t\t\t\t\t\t\t// The number of pixels that the user must move their finger by before it is considered a swipe.
\t\t\t\tswipe_min_touches : 1,\t\t\t\t\t\t\t\t\t\t\t// Min Finger (touch) used for swipe\t\t\t\t\t\t\t
\t\t\t\tdrag_block_vertical:false,\t\t\t\t\t\t\t\t\t\t// Prevent Vertical Scroll during Swipe
\t\t\t\tswipe_direction:\"horizontal\"
\t\t\t}
\t\t}\t\t\t\t\t
\t};

\t<?php if(\$this->fullScreenOffsetContainer && \$this->sliderLayout == 'fullscreen'): ?>
\toptions.fullScreenOffsetContainer = \"#<?= \$this->fullScreenOffsetContainer; ?>\";
\t<?php endif;?>\t

\t<?php if(\$this->sliderType == 'carousel'): ?>
\t// carousel slider
\toptions.sliderType = 'carousel';
\toptions.carousel = 
\t{
\t\teasing:punchgs.Power3.easeInOut,
\t\tspeed:800,
\t\tshowLayersAllTime : \"off\",
\t\thorizontal_align : \"center\",
\t\tvertical_align : \"center\",
\t\tinfinity : \"on\",
\t\tspace : 0,
\t\tmaxVisibleItems : 3,\t\t\t\t\t\t
\t\tstretch:\"off\",\t\t\t\t\t\t
\t\tfadeout:\"on\",\t\t\t\t\t\t
\t\tmaxRotation:0,\t\t\t\t\t\t
\t\tminScale:0,
\t\tvary_fade:\"off\",
\t\tvary_rotation:\"on\",
\t\tvary_scale:\"off\",\t\t\t\t\t\t
\t\tborder_radius:\"0px\",
\t\tpadding_top:0,
\t\tpadding_bottom:0
\t};
\t<?php endif; ?>
\t
\t<?php if(\$this->overlay): ?>
\t//twoxtwo, threexthree, twoxtwowhite, threexthreewhite
\toptions.dottedOverlay = \"<?= \$this->overlay; ?>\";
\t<?php endif; ?>\t\t

\t<?php if(\$this->bullets): ?>
\t// Bullets
\toptions.navigation.bullets = 
\t{
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
\t\thide_onmobile:false,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\tspace: 5,
\t};

\t<?php if( \$this->navigationStyle == 'hades' ): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-image\"></span>';
\t<?php elseif(\$this->navigationStyle == 'ares'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-title\">";
        // line 155
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 155, $this->source); })()), "html", null, true);
        yield "</span>';
\t<?php elseif(\$this->navigationStyle == 'hebe'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-image\"></span>';
\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-image\"></span><span class=\"tp-bullet-imageoverlay\"></span><span class=\"tp-bullet-title\">";
        // line 159
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 159, $this->source); })()), "html", null, true);
        yield "</span>';
\t<?php elseif(\$this->navigationStyle == 'metis'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-img-wrap\"><span class=\"tp-bullet-image\"></span></span><span class=\"tp-bullet-title\">";
        // line 161
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 161, $this->source); })()), "html", null, true);
        yield "</span>';
\t<?php elseif(\$this->navigationStyle == 'dione'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-img-wrap\"><span class=\"tp-bullet-image\"></span></span><span class=\"tp-bullet-title\">";
        // line 163
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 163, $this->source); })()), "html", null, true);
        yield "</span>';
\t<?php elseif(\$this->navigationStyle == 'uranus'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-inner\"></span>';
\t<?php endif; ?>
\t
\t<?php endif; ?>

\t<?php if(\$this->tabs): ?>
\t// Tabs
\toptions.navigation.tabs = 
\t{
\t\t<?php if(\$this->navigationStyle == 'ares'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 200; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 80; ?>,
        min_width: 200,
        direction: 'vertical',
        space: 0,
        span: true,
        wrapper_padding: 0,
        wrapper_color: '#FFF',
        opacity: '0.85',
\t\thide_onmobile: true,
\t\thide_under: 767

\t\t<?php elseif(\$this->navigationStyle == 'erinyen'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 20; ?>,
        min_width: 180,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767

\t\t<?php elseif(\$this->navigationStyle == 'gyges'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 265; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 65; ?>,
        min_width: 265,
        wrapper_padding: 0,
        wrapper_color: '#000',
        wrapper_opacity: '0.2',
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'hades'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 150; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 105; ?>,
        min_width: 150,
        direction: 'vertical',
        space: 20,
        span: true,
        wrapper_padding: 10,
        wrapper_color: '#FFF',
        wrapper_opacity: '0.85',
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'hebe'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 150; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 50; ?>,
        min_width: 150,
        direction: 'vertical',
        space: 25,
        wrapper_padding: 20,
        wrapper_color: '#000',
        wrapper_opacity: '0.65',
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'hermes'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 200; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 150; ?>,
        min_width: 200,
        space: 0,
\t\twrapper_color: 'transparent',
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'hesperiden'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 65; ?>,
        min_width: 180,
        wrapper_padding: 0,
        wrapper_color: '#FFF',
        wrapper_opacity: '0.65',
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'metis'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 400; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 30; ?>,
        direction: 'vertical',
        span: true,
        space: 20,
\t\twrapper_color: '#000',
        wrapper_opacity: '0.65',
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 30; ?>,
        min_width: 180,
        space: 20,
\t\twrapper_color: '#000',
        wrapper_opacity: '0.65',
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t<?php endif; ?>
\t};

\t<?php if( \$this->navigationStyle == 'hesperiden' ): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-content\"><span class=\"tp-tab-date\">";
        // line 311
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["param1"]) || array_key_exists("param1", $context) ? $context["param1"] : (function () { throw new RuntimeError('Variable "param1" does not exist.', 311, $this->source); })()), "html", null, true);
        yield "</span><span class=\"tp-tab-title\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 311, $this->source); })()), "html", null, true);
        yield "</span></div><div class=\"tp-tab-image\"></div>';
\t<?php elseif(\$this->navigationStyle == 'gyges'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-content\"> <span class=\"tp-tab-date\">";
        // line 313
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["param1"]) || array_key_exists("param1", $context) ? $context["param1"] : (function () { throw new RuntimeError('Variable "param1" does not exist.', 313, $this->source); })()), "html", null, true);
        yield "</span> <span class=\"tp-tab-title\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 313, $this->source); })()), "html", null, true);
        yield "</span></div><div class=\"tp-tab-image\"></div>';
\t<?php elseif(\$this->navigationStyle == 'hades'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-inner\"> <span class=\"tp-tab-title\">";
        // line 315
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 315, $this->source); })()), "html", null, true);
        yield "</span> <span class=\"tp-tab-price\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["param1"]) || array_key_exists("param1", $context) ? $context["param1"] : (function () { throw new RuntimeError('Variable "param1" does not exist.', 315, $this->source); })()), "html", null, true);
        yield "</span></div>';
\t<?php elseif(\$this->navigationStyle == 'ares'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-content\"><span class=\"tp-tab-date\">";
        // line 317
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["param1"]) || array_key_exists("param1", $context) ? $context["param1"] : (function () { throw new RuntimeError('Variable "param1" does not exist.', 317, $this->source); })()), "html", null, true);
        yield "</span><span class=\"tp-tab-title\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 317, $this->source); })()), "html", null, true);
        yield "</span></div><div class=\"tp-tab-image\"></div>';
\t<?php elseif(\$this->navigationStyle == 'hebe'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-title\">";
        // line 319
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 319, $this->source); })()), "html", null, true);
        yield "</div><div class=\"tp-tab-desc\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["param1"]) || array_key_exists("param1", $context) ? $context["param1"] : (function () { throw new RuntimeError('Variable "param1" does not exist.', 319, $this->source); })()), "html", null, true);
        yield "</div>';
\t<?php elseif(\$this->navigationStyle == 'hermes'): ?>
\toptions.navigation.tabs.tmp = '<span class=\"tp-tab-image\"></span><span class=\"tp-tab-content-wrapper\"><span class=\"tp-tab-bg\"></span><span class=\"tp-tab-content\"> <span class=\"tp-tab-date\">";
        // line 321
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["param1"]) || array_key_exists("param1", $context) ? $context["param1"] : (function () { throw new RuntimeError('Variable "param1" does not exist.', 321, $this->source); })()), "html", null, true);
        yield "</span> <span class=\"tp-tab-title\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 321, $this->source); })()), "html", null, true);
        yield "</span></span></span>';
\t<?php elseif(\$this->navigationStyle == 'erinyen'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-title\">";
        // line 323
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 323, $this->source); })()), "html", null, true);
        yield "</div><div class=\"tp-tab-desc\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["param1"]) || array_key_exists("param1", $context) ? $context["param1"] : (function () { throw new RuntimeError('Variable "param1" does not exist.', 323, $this->source); })()), "html", null, true);
        yield "</div>';
\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\toptions.navigation.tabs.tmp = '<span class=\"tp-tab-title\">";
        // line 325
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 325, $this->source); })()), "html", null, true);
        yield "</span>';
\t<?php elseif(\$this->navigationStyle == 'metis'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-wrapper\"><div class=\"tp-tab-number\">";
        // line 327
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["param1"]) || array_key_exists("param1", $context) ? $context["param1"] : (function () { throw new RuntimeError('Variable "param1" does not exist.', 327, $this->source); })()), "html", null, true);
        yield "</div><div class=\"tp-tab-divider\"></div><div class=\"tp-tab-title-mask\"><div class=\"tp-tab-title\">";
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 327, $this->source); })()), "html", null, true);
        yield "</div></div></div>';
\t<?php endif; ?>

\t<?php endif; ?>

\t<?php if(\$this->arrows): ?>
\t// Arrows
\toptions.navigation.arrows = 
\t{
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->arrowStyle; ?>\",
\t};
\t
\t
\t<?php if( \$this->arrowStyle == 'hades' ): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-arr-allwrapper\"><div class=\"tp-arr-imgholder\"></div></div>';
\t<?php elseif(\$this->arrowStyle == 'ares'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-title-wrap\"><span class=\"tp-arr-titleholder\">";
        // line 344
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 344, $this->source); })()), "html", null, true);
        yield "</span></div>';
\t<?php elseif(\$this->arrowStyle == 'hebe'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-title-wrap\"> <span class=\"tp-arr-titleholder\">";
        // line 346
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 346, $this->source); })()), "html", null, true);
        yield "</span><span class=\"tp-arr-imgholder\"></span></div>';
\t<?php elseif(\$this->arrowStyle == 'hermes'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-arr-allwrapper\"><div class=\"tp-arr-imgholder\"></div><div class=\"tp-arr-titleholder\">";
        // line 348
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 348, $this->source); })()), "html", null, true);
        yield "</div></div>';
\t<?php elseif(\$this->arrowStyle == 'erinyen'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-title-wrap\"><div class=\"tp-arr-imgholder\"></div><div class=\"tp-arr-img-over\"></div><span class=\"tp-arr-titleholder\">";
        // line 350
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 350, $this->source); })()), "html", null, true);
        yield "</span></div>';
\t<?php elseif(\$this->arrowStyle == 'zeus'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-title-wrap\"><div class=\"tp-arr-imgholder\"></div></div>';
\t<?php elseif(\$this->arrowStyle == 'dione'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-arr-imgwrapper\"><div class=\"tp-arr-imgholder\"></div></div>';
\t<?php endif; ?>
\t
\t<?php endif; ?>
\t
\t<?php if(\$this->thumbs): ?>
\t// Thumbnails
\toptions.navigation.thumbnails = 
\t{
\t\t<?php if( \$this->navigationStyle == 'erinyen' ): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 100; ?>,
\t\tmin_width: 180,
\t\tspace: 15,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php elseif(\$this->navigationStyle == 'gyges'): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 100; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 50; ?>,
\t\tmin_width: 100,
\t\tspace: 5,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php elseif(\$this->navigationStyle == 'hades'): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 50; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 50; ?>,
\t\tmin_width: 50,
\t\tspace: 5,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php elseif(\$this->navigationStyle == 'hesperiden'): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 100; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 50; ?>,
\t\tmin_width: 100,
\t\tspace: 5,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 100; ?>,
\t\tmin_width: 180,
\t\tspace: 15,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php endif; ?>
\t};

\t<?php if( \$this->navigationStyle == 'hesperiden' ): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-image\"></span><span class=\"tp-thumb-title\">";
        // line 447
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 447, $this->source); })()), "html", null, true);
        yield "</span>';
\t<?php elseif(\$this->navigationStyle == 'gyges'): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-img-wrap\"><span class=\"tp-thumb-image\"></span></span>';
\t<?php elseif(\$this->navigationStyle == 'hades'): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-img-wrap\"><span class=\"tp-thumb-image\"></span></span>';
\t<?php elseif(\$this->navigationStyle == 'erinyen'): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-over\"></span><span class=\"tp-thumb-image\"></span><span class=\"tp-thumb-title\">";
        // line 453
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 453, $this->source); })()), "html", null, true);
        yield "</span><span class=\"tp-thumb-more\"></span>';
\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-over\"></span><span class=\"tp-thumb-image\"></span><span class=\"tp-thumb-title\">";
        // line 455
        yield $this->env->getFilter('escape')->getCallable()($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 455, $this->source); })()), "html", null, true);
        yield "</span><span class=\"tp-thumb-more\"></span>';
\t<?php endif; ?>
\t
\t<?php endif; ?>
\t
\t// stop slider on hover or not
\toptions.onHoverStop = 'off';
\toptions.navigation.onHoverStop = 'off';
\t<?php if(\$this->stopOnHover): ?>
\toptions.onHoverStop = 'on';
\toptions.navigation.onHoverStop = 'on';
\t<?php endif; ?>
\t
\t// init slider  
\tvar api = jQuery('<?= \$this->selector; ?>').show().revolution(options);

\t// trigger global resize event when slider is loaded
\tapi.on('revolution.slide.onloaded',function()
\t{
\t\tjQuery(document).trigger('RevolutionSlider.loaded',{'selector':'<?= \$this->selector; ?>','api':api});
\t\t
\t\tjQuery(window).trigger('resize');
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
        return "@pct_revolutionslider/js_revoslider_default.html5";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  577 => 455,  572 => 453,  563 => 447,  463 => 350,  458 => 348,  453 => 346,  448 => 344,  426 => 327,  421 => 325,  414 => 323,  407 => 321,  400 => 319,  393 => 317,  386 => 315,  379 => 313,  372 => 311,  221 => 163,  216 => 161,  211 => 159,  204 => 155,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
<?php 
// layout shit
\$mobileHeight = \\floor(767 / ( \$this->startWidth/\$this->startHeight ));
\$styles = ['.ce_revolutionslider '.\$this->selector.' {height: '.\$this->startHeight.'px;}'];
\$styles[] = '@media only screen and (max-width: 767px) {.ce_revolutionslider .'.\$this->selector.' {height: '.\$mobileHeight.'px}}';
\$GLOBALS['TL_HEAD'][] = '<style name=\"rs_style_'.\$this->id.'\">'.implode(\"\\n\",\$styles).'</style>';
?>

<script id=\"revolutionslider_<?= \$this->id; ?>\">
jQuery(document).ready(function() 
{\t
\tvar options = 
\t{
\t\tjsFileLocation:'<?= \$GLOBALS['REVOLUTIONSLIDER']['scriptPath']; ?>/js/',
\t\tdelay:<?php echo \$this->delay; ?>,
\t\tresponsiveLevels:[<?= \$this->startWidth; ?>,<?= \$this->breakpoint_mobile ? (\$this->breakpoint_mobile) : 767; ?>],\t// Single or Array for Responsive Levels i.e.: 4064 or i.e. [2048, 1024, 768, 480]\t\t\t\t\t
\t\tvisibilityLevels:[<?= \$this->startWidth; ?>,<?= \$this->breakpoint_mobile ? (\$this->breakpoint_mobile) : 767; ?>],\t// Single or Array for Responsive Visibility Levels i.e.: 4064 or i.e. [2048, 1024, 768, 480]\t\t\t\t\t
\t\tgridwidth:[<?= \$this->startWidth; ?>],\t\t\t
\t\tgridheight:[<?= \$this->startHeight; ?>],
\t\tautoHeight:\"off\",\t\t\t\t\t
\t\tsliderType : \"standard\",\t\t\t\t\t\t\t// standard, carousel, hero\t\t\t\t\t
\t\tsliderLayout : \"<?= \$this->sliderLayout; ?>\",\t\t// auto, fullscreen\t\t\t\t
\t\tfullScreenAutoWidth:\"off\",\t\t\t\t\t\t\t// Turns the FullScreen Slider to be a FullHeight but auto Width Slider
\t\tfullScreenAlignForce:\"off\",
\t\tfullScreenOffset:\"0\",\t\t\t\t\t\t\t\t// Size for FullScreen Slider minimising\t\t\t\t\t
\t\thideCaptionAtLimit:0,\t\t\t\t\t\t\t\t// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
\t\thideAllCaptionAtLimit:0,\t\t\t\t\t\t\t// Hide all The Captions if Width of Browser is less then this value
\t\thideSliderAtLimit:0,\t\t\t\t\t\t\t\t// Hide the whole slider, and stop also functions if Width of Browser is less than this value\t\t\t\t\t\t\t\t\t\t
\t\tdisableProgressBar:\"on\",\t\t\t\t\t\t\t// Hides Progress Bar if is set to \"on\"
\t\tstartWithSlide:<?= \$this->startWithSlide ? (\$this->startWithSlide - 1) : 0; ?>,\t
\t\tstopAtSlide:<?= \$this->stopAtSlide ?: -1; ?>,\t\t\t\t// Stop Timer if Slide \"x\" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
\t\tstopAfterLoops:<?= \$this->stopAfterLoops ?: -1; ?>,\t\t// Stop Timer if All slides has been played \"x\" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
\t\tshadow:0,\t\t\t\t\t\t\t\t\t\t\t//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
\t\tstartDelay:0,\t\t\t\t\t\t\t\t\t\t// Delay before the first Animation starts.\t\t\t\t
\t\tlazyType : \"smart\",\t\t\t\t\t\t\t\t\t//full, smart, single
\t\tspinner:\"spinner0\",\t
\t\tshuffle:\"off\",
\t\tviewPort:{
\t\t\tenable:true,\t\t\t\t\t\t\t\t\t// if enabled, slider wait with start or wait at first slide.
\t\t\toutof:\"wait\",\t\t\t\t\t\t\t\t\t// wait,pause\t\t\t\t\t\t
\t\t\tvisible_area:\"80%\",\t\t\t\t\t\t\t\t// Start Animation when 60% of Slider is visible
\t\t\tpresize:false \t\t\t\t\t\t\t\t\t// Presize the Height of the Slider Container for Internal Link Positions
\t\t},
\t\tfallbacks:{
\t\t\tisJoomla:false,
\t\t\tpanZoomDisableOnMobile:\"off\",
\t\t\tsimplifyAll:\"on\",
\t\t\tnextSlideOnWindowFocus:\"off\",\t
\t\t\tdisableFocusListener:true,
\t\t\tignoreHeightChanges:\"off\",  // off, mobile, always
\t\t\tignoreHeightChangesSize:0,
\t\t\tallowHTML5AutoPlayOnAndroid:true
\t\t},
\t\tparallax : {
\t\t\ttype : \"scroll\",\t\t\t\t\t\t// off, mouse, scroll, mouse+scroll
\t\t\tlevels: [10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85],
\t\t\torigo:\"enterpoint\",\t\t\t\t// slidercenter or enterpoint
\t\t\tspeed:400,
\t\t\tbgparallax : \"on\",
\t\t\topacity:\"on\",
\t\t\tdisable_onmobile:\"off\",
\t\t\tddd_shadow:\"on\",
\t\t\tddd_bgfreeze:\"off\",
\t\t\tddd_overflow:\"visible\",
\t\t\tddd_layer_overflow:\"visible\",
\t\t\tddd_z_correction:65,
\t\t\tddd_path:\"mouse\"\t\t\t\t\t\t\t\t
\t\t},
\t\tscrolleffect: {
\t\t\tfade:\"off\",
\t\t\tblur:\"off\",
\t\t\tscale:\"off\",
\t\t\tgrayscale:\"off\",\t\t\t\t\t
\t\t\tmaxblur:10,\t\t\t\t\t\t\t\t\t
\t\t\ton_layers:\"off\",
\t\t\ton_slidebg:\"off\",
\t\t\ton_static_layers:\"off\",
\t\t\ton_parallax_layers:\"off\",
\t\t\ton_parallax_static_layers:\"off\",
\t\t\tdirection:\"both\",
\t\t\tmultiplicator:1.35,
\t\t\tmultiplicator_layers:0.5,
\t\t\ttilt:30,
\t\t\tdisable_on_mobile:\"on\"\t\t
\t\t},\t\t
\t\tnavigation : 
\t\t{
\t\t\tkeyboardNavigation:\"off\",\t
\t\t\tkeyboard_direction:\"horizontal\",\t\t\t\t\t\t\t\t\t//\thorizontal - left/right arrows,  vertical - top/bottom arrows
\t\t\tmouseScrollNavigation:\"off\",\t\t\t\t\t\t\t\t\t\t// on, off, carousel\t\t\t\t\t
\t\t\ttouch: {
\t\t\t\ttouchenabled:\"off\",\t\t\t\t\t\t\t\t\t\t\t\t// Enable Swipe Function : on/off
\t\t\t\ttouchOnDesktop:\"off\",\t\t\t\t\t\t\t\t\t\t\t// Enable Tuoch on Desktop Systems also
\t\t\t\tswipe_treshold : 75,\t\t\t\t\t\t\t\t\t\t\t// The number of pixels that the user must move their finger by before it is considered a swipe.
\t\t\t\tswipe_min_touches : 1,\t\t\t\t\t\t\t\t\t\t\t// Min Finger (touch) used for swipe\t\t\t\t\t\t\t
\t\t\t\tdrag_block_vertical:false,\t\t\t\t\t\t\t\t\t\t// Prevent Vertical Scroll during Swipe
\t\t\t\tswipe_direction:\"horizontal\"
\t\t\t}
\t\t}\t\t\t\t\t
\t};

\t<?php if(\$this->fullScreenOffsetContainer && \$this->sliderLayout == 'fullscreen'): ?>
\toptions.fullScreenOffsetContainer = \"#<?= \$this->fullScreenOffsetContainer; ?>\";
\t<?php endif;?>\t

\t<?php if(\$this->sliderType == 'carousel'): ?>
\t// carousel slider
\toptions.sliderType = 'carousel';
\toptions.carousel = 
\t{
\t\teasing:punchgs.Power3.easeInOut,
\t\tspeed:800,
\t\tshowLayersAllTime : \"off\",
\t\thorizontal_align : \"center\",
\t\tvertical_align : \"center\",
\t\tinfinity : \"on\",
\t\tspace : 0,
\t\tmaxVisibleItems : 3,\t\t\t\t\t\t
\t\tstretch:\"off\",\t\t\t\t\t\t
\t\tfadeout:\"on\",\t\t\t\t\t\t
\t\tmaxRotation:0,\t\t\t\t\t\t
\t\tminScale:0,
\t\tvary_fade:\"off\",
\t\tvary_rotation:\"on\",
\t\tvary_scale:\"off\",\t\t\t\t\t\t
\t\tborder_radius:\"0px\",
\t\tpadding_top:0,
\t\tpadding_bottom:0
\t};
\t<?php endif; ?>
\t
\t<?php if(\$this->overlay): ?>
\t//twoxtwo, threexthree, twoxtwowhite, threexthreewhite
\toptions.dottedOverlay = \"<?= \$this->overlay; ?>\";
\t<?php endif; ?>\t\t

\t<?php if(\$this->bullets): ?>
\t// Bullets
\toptions.navigation.bullets = 
\t{
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
\t\thide_onmobile:false,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\tspace: 5,
\t};

\t<?php if( \$this->navigationStyle == 'hades' ): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-image\"></span>';
\t<?php elseif(\$this->navigationStyle == 'ares'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-title\">{{title}}</span>';
\t<?php elseif(\$this->navigationStyle == 'hebe'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-image\"></span>';
\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-image\"></span><span class=\"tp-bullet-imageoverlay\"></span><span class=\"tp-bullet-title\">{{title}}</span>';
\t<?php elseif(\$this->navigationStyle == 'metis'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-img-wrap\"><span class=\"tp-bullet-image\"></span></span><span class=\"tp-bullet-title\">{{title}}</span>';
\t<?php elseif(\$this->navigationStyle == 'dione'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-img-wrap\"><span class=\"tp-bullet-image\"></span></span><span class=\"tp-bullet-title\">{{title}}</span>';
\t<?php elseif(\$this->navigationStyle == 'uranus'): ?>
\toptions.navigation.bullets.tmp = '<span class=\"tp-bullet-inner\"></span>';
\t<?php endif; ?>
\t
\t<?php endif; ?>

\t<?php if(\$this->tabs): ?>
\t// Tabs
\toptions.navigation.tabs = 
\t{
\t\t<?php if(\$this->navigationStyle == 'ares'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 200; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 80; ?>,
        min_width: 200,
        direction: 'vertical',
        space: 0,
        span: true,
        wrapper_padding: 0,
        wrapper_color: '#FFF',
        opacity: '0.85',
\t\thide_onmobile: true,
\t\thide_under: 767

\t\t<?php elseif(\$this->navigationStyle == 'erinyen'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 20; ?>,
        min_width: 180,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767

\t\t<?php elseif(\$this->navigationStyle == 'gyges'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 265; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 65; ?>,
        min_width: 265,
        wrapper_padding: 0,
        wrapper_color: '#000',
        wrapper_opacity: '0.2',
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'hades'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 150; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 105; ?>,
        min_width: 150,
        direction: 'vertical',
        space: 20,
        span: true,
        wrapper_padding: 10,
        wrapper_color: '#FFF',
        wrapper_opacity: '0.85',
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'hebe'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 150; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 50; ?>,
        min_width: 150,
        direction: 'vertical',
        space: 25,
        wrapper_padding: 20,
        wrapper_color: '#000',
        wrapper_opacity: '0.65',
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'hermes'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 200; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 150; ?>,
        min_width: 200,
        space: 0,
\t\twrapper_color: 'transparent',
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'hesperiden'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 65; ?>,
        min_width: 180,
        wrapper_padding: 0,
        wrapper_color: '#FFF',
        wrapper_opacity: '0.65',
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'metis'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 400; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 30; ?>,
        direction: 'vertical',
        span: true,
        space: 20,
\t\twrapper_color: '#000',
        wrapper_opacity: '0.65',
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t
\t\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 30; ?>,
        min_width: 180,
        space: 20,
\t\twrapper_color: '#000',
        wrapper_opacity: '0.65',
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\thide_onmobile: true,
\t\thide_under: 767
\t\t<?php endif; ?>
\t};

\t<?php if( \$this->navigationStyle == 'hesperiden' ): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-content\"><span class=\"tp-tab-date\">{{param1}}</span><span class=\"tp-tab-title\">{{title}}</span></div><div class=\"tp-tab-image\"></div>';
\t<?php elseif(\$this->navigationStyle == 'gyges'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-content\"> <span class=\"tp-tab-date\">{{param1}}</span> <span class=\"tp-tab-title\">{{title}}</span></div><div class=\"tp-tab-image\"></div>';
\t<?php elseif(\$this->navigationStyle == 'hades'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-inner\"> <span class=\"tp-tab-title\">{{title}}</span> <span class=\"tp-tab-price\">{{param1}}</span></div>';
\t<?php elseif(\$this->navigationStyle == 'ares'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-content\"><span class=\"tp-tab-date\">{{param1}}</span><span class=\"tp-tab-title\">{{title}}</span></div><div class=\"tp-tab-image\"></div>';
\t<?php elseif(\$this->navigationStyle == 'hebe'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-title\">{{title}}</div><div class=\"tp-tab-desc\">{{param1}}</div>';
\t<?php elseif(\$this->navigationStyle == 'hermes'): ?>
\toptions.navigation.tabs.tmp = '<span class=\"tp-tab-image\"></span><span class=\"tp-tab-content-wrapper\"><span class=\"tp-tab-bg\"></span><span class=\"tp-tab-content\"> <span class=\"tp-tab-date\">{{param1}}</span> <span class=\"tp-tab-title\">{{title}}</span></span></span>';
\t<?php elseif(\$this->navigationStyle == 'erinyen'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-title\">{{title}}</div><div class=\"tp-tab-desc\">{{param1}}</div>';
\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\toptions.navigation.tabs.tmp = '<span class=\"tp-tab-title\">{{title}}</span>';
\t<?php elseif(\$this->navigationStyle == 'metis'): ?>
\toptions.navigation.tabs.tmp = '<div class=\"tp-tab-wrapper\"><div class=\"tp-tab-number\">{{param1}}</div><div class=\"tp-tab-divider\"></div><div class=\"tp-tab-title-mask\"><div class=\"tp-tab-title\">{{title}}</div></div></div>';
\t<?php endif; ?>

\t<?php endif; ?>

\t<?php if(\$this->arrows): ?>
\t// Arrows
\toptions.navigation.arrows = 
\t{
\t\tenable: <?php if(\$this->slideCount > 1): ?>true<?php else: ?>false<?php endif; ?>,
\t\tstyle:\"<?= \$this->arrowStyle; ?>\",
\t};
\t
\t
\t<?php if( \$this->arrowStyle == 'hades' ): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-arr-allwrapper\"><div class=\"tp-arr-imgholder\"></div></div>';
\t<?php elseif(\$this->arrowStyle == 'ares'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-title-wrap\"><span class=\"tp-arr-titleholder\">{{title}}</span></div>';
\t<?php elseif(\$this->arrowStyle == 'hebe'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-title-wrap\"> <span class=\"tp-arr-titleholder\">{{title}}</span><span class=\"tp-arr-imgholder\"></span></div>';
\t<?php elseif(\$this->arrowStyle == 'hermes'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-arr-allwrapper\"><div class=\"tp-arr-imgholder\"></div><div class=\"tp-arr-titleholder\">{{title}}</div></div>';
\t<?php elseif(\$this->arrowStyle == 'erinyen'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-title-wrap\"><div class=\"tp-arr-imgholder\"></div><div class=\"tp-arr-img-over\"></div><span class=\"tp-arr-titleholder\">{{title}}</span></div>';
\t<?php elseif(\$this->arrowStyle == 'zeus'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-title-wrap\"><div class=\"tp-arr-imgholder\"></div></div>';
\t<?php elseif(\$this->arrowStyle == 'dione'): ?>
\toptions.navigation.arrows.tmp = '<div class=\"tp-arr-imgwrapper\"><div class=\"tp-arr-imgholder\"></div></div>';
\t<?php endif; ?>
\t
\t<?php endif; ?>
\t
\t<?php if(\$this->thumbs): ?>
\t// Thumbnails
\toptions.navigation.thumbnails = 
\t{
\t\t<?php if( \$this->navigationStyle == 'erinyen' ): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 100; ?>,
\t\tmin_width: 180,
\t\tspace: 15,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php elseif(\$this->navigationStyle == 'gyges'): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 100; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 50; ?>,
\t\tmin_width: 100,
\t\tspace: 5,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php elseif(\$this->navigationStyle == 'hades'): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 50; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 50; ?>,
\t\tmin_width: 50,
\t\tspace: 5,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php elseif(\$this->navigationStyle == 'hesperiden'): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 100; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 50; ?>,
\t\tmin_width: 100,
\t\tspace: 5,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\t\tenable:true,
\t\tstyle:\"<?= \$this->navigationStyle; ?>\",
        width: <?= \$this->navigationWidth ? (\$this->navigationWidth) : 180; ?>,
        height: <?= \$this->navigationHeight ? (\$this->navigationHeight) : 100; ?>,
\t\tmin_width: 180,
\t\tspace: 15,
\t\tvisibleAmount:<?= \$this->thumbAmount ?: 0; ?>,
\t\th_align:\"center\",
\t\tv_align:\"bottom\",
\t\tv_offset: 20,
\t\th_offset: 0,
\t\twrapper_color: 'transparent',
\t\thide_onmobile: true,
\t\thide_under: 767,

\t\t<?php endif; ?>
\t};

\t<?php if( \$this->navigationStyle == 'hesperiden' ): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-image\"></span><span class=\"tp-thumb-title\">{{title}}</span>';
\t<?php elseif(\$this->navigationStyle == 'gyges'): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-img-wrap\"><span class=\"tp-thumb-image\"></span></span>';
\t<?php elseif(\$this->navigationStyle == 'hades'): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-img-wrap\"><span class=\"tp-thumb-image\"></span></span>';
\t<?php elseif(\$this->navigationStyle == 'erinyen'): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-over\"></span><span class=\"tp-thumb-image\"></span><span class=\"tp-thumb-title\">{{title}}</span><span class=\"tp-thumb-more\"></span>';
\t<?php elseif(\$this->navigationStyle == 'zeus'): ?>
\toptions.navigation.thumbnails.tmp = '<span class=\"tp-thumb-over\"></span><span class=\"tp-thumb-image\"></span><span class=\"tp-thumb-title\">{{title}}</span><span class=\"tp-thumb-more\"></span>';
\t<?php endif; ?>
\t
\t<?php endif; ?>
\t
\t// stop slider on hover or not
\toptions.onHoverStop = 'off';
\toptions.navigation.onHoverStop = 'off';
\t<?php if(\$this->stopOnHover): ?>
\toptions.onHoverStop = 'on';
\toptions.navigation.onHoverStop = 'on';
\t<?php endif; ?>
\t
\t// init slider  
\tvar api = jQuery('<?= \$this->selector; ?>').show().revolution(options);

\t// trigger global resize event when slider is loaded
\tapi.on('revolution.slide.onloaded',function()
\t{
\t\tjQuery(document).trigger('RevolutionSlider.loaded',{'selector':'<?= \$this->selector; ?>','api':api});
\t\t
\t\tjQuery(window).trigger('resize');
\t});
});
</script>", "@pct_revolutionslider/js_revoslider_default.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_revolutionslider/templates/js_revoslider_default.html5");
    }
}
