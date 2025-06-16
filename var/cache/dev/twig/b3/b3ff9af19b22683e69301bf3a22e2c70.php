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

/* @pct_theme_templates/gallery/gallery_revoslider.html5 */
class __TwigTemplate_f323f98229f2986135c6846a0669e605 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/gallery/gallery_revoslider.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/gallery/gallery_revoslider.html5"));

        // line 1
        yield "<?php 
//'fadefromright','fadefromleft','fadefromtop','fadefrombottom',
//'fadetoleftfadefromright','fadetorightfadefromleft','fadetotopfadefrombottom','fadetobottomfadefromtop',
//'parallaxtoright','parallaxtoleft','parallaxtotop','parallaxtobottom',
//'scaledownfromright','scaledownfromleft','scaledownfromtop','scaledownfrombottom',
//'zoomout','zoomin',
//'slotzoom-horizontal','slotzoom-vertical',
//'random-static'
//'boxslide','boxfade', 'slotzoom-horizontal', 'slotzoom-vertical',
//'slotslide-horizontal', 'slotslide-vertical', 
//'slotfade-horizontal','slotfade-vertical', 
//'slideleft', 'slideright', 'slideup' ,'slidedown',
//'slidehorizontal', 'slidevertical',\t
//'fade',\t'random',
//'curtain-1', 'curtain-2', 'curtain-3',
//'3dcurtain-vertical','3dcurtain-horizonal',
//'cube','cube-horizontal',
//'papercut',
//'flyin',
//'turnoff','turnoff-vertical',
//'random-premium'
\$effect = 'fade';
?>

<?php // load scripts and css
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/js/jquery.themepunch.tools.min.js';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/js/jquery.themepunch.revolution.min.js';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/css/settings.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/css/layers.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/css/navigation.css|static';
\$GLOBALS['TL_CSS'][] = REVOLUTIONSLIDER_PATH . '/assets/css/styles.css|static';
?>

<div class=\"ce_revolutionslider rs-container resonsive banner block <?= \$this->class; ?>\">
\t<div class=\"rs-container block\">
\t\t<div class=\"banner fullscreen tp-banner block\" id=\"gallery_revoslider_<?= \$this->id; ?>\" data-version=\"5.4.8\">
\t\t\t<ul>
\t\t\t\t<?php foreach (\$this->body as \$class => \$row) : ?>
\t\t\t\t\t<?php foreach (\$row as \$col) : ?>
\t\t\t\t\t\t<?php 
\t\t\t\t\t\tforeach(array('href','caption','class','margin','linkTitle','attributes','alt','addImage') as \$f)
\t\t\t\t\t\t{
\t\t\t\t\t\t\tif( !isset(\$col->{\$f}) )
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$col->{\$f} = '';
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t\t?>
\t\t\t\t\t\t<li class=\"slide row<?= \$this->perRow; ?>\" data-transition=\"<?= \$effect; ?>\" data-slotamount=\"4\" data-thumb=\"<?= \$col->src; ?>\" <?php if (\$col->href) : ?> data-link=\"<?= \$col->href; ?>\" data-target=\"_blank\" <?php endif; ?>>
\t\t\t\t\t\t\t<img src=\"<?= \$col->src; ?>\" data-bgfit=\"cover\" data-bgposition=\"center center\" data-bgrepeat=\"no-repeat\" class=\"rev-slidebg\">
\t\t\t\t\t\t</li>
\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t<?php endforeach; ?>
\t\t\t</ul>
\t\t</div>
\t</div>
</div>
<!-- SEO-SCRIPT-START -->
<script>
\tjQuery(document).ready(function() {
\t\tvar options = {
\t\t\t// general settings
\t\t\tjsFileLocation:'<?= \$GLOBALS['REVOLUTIONSLIDER']['scriptPath']; ?>/js/',
\t\t\tdelay: 5000,
\t\t\tgridwidth: 1240,
\t\t\tgridheight: 800,
\t\t\tstartWithSlide: 0,
\t\t\tsliderType: 'standard',
\t\t\tsliderLayout: \"auto\",
\t\t\tfullScreenOffset:0,
\t\t\t//fullScreenOffsetContainer: \"#header\",
\t\t\tfullWidth: \"on\",
\t\t\tfullScreen: \"off\",

\t\t\ttouchenabled: \"on\",
\t\t\tonHoverStop: 'off',

\t\t\tswipe_velocity: 0.7,
\t\t\tswipe_min_touches: 1,
\t\t\tswipe_max_touches: 1,
\t\t\tdrag_block_vertical: false,

\t\t\t// lopp settings
\t\t\tstopAtSlide: -1,
\t\t\tstopAfterLoops: -1,

\t\t\tshadow: 0,

\t\t\tnavigation: {
\t\t\t\tbullets: {
\t\t\t\t\tenable: true,
\t\t\t\t\tstyle: \"hebe\",
\t\t\t\t\th_align:\"center\",
\t\t\t\t\tv_align:\"bottom\",
\t\t\t\t\tv_offset: 20,
\t\t\t\t\th_offset: 0,
\t\t\t\t\twrapper_color: 'transparent',
\t\t\t\t\thide_onmobile: true,
\t\t\t\t\thide_under: 767,
\t\t\t\t\tspace: 5,
\t\t\t\t},
                keyboardNavigation: \"on\",
                keyboard_direction: \"horizontal\",
                mouseScrollNavigation: \"off\",
                onHoverStop: \"off\",
                touch: {
                    touchenabled: \"on\",
                \tswipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: \"horizontal\",
                    drag_block_vertical: false
                },
                arrows: {
                    style: \"hesperiden\",
                    enable: true,
                    hide_onmobile: false,
                    hide_onleave: false,
                    tmp: '',
                    left: {
                        h_align: \"left\",
                        v_align: \"center\",
                        h_offset: 10,
                        v_offset: 0
                    },
                    right: {
                        h_align: \"right\",
                        v_align: \"center\",
                        h_offset: 10,
                        v_offset: 0
                    }
                }
\t\t\t}
\t\t}

\t\t// init slider  
\t\tvar api = jQuery('#gallery_revoslider_<?= \$this->id; ?>').show().revolution(options);

\t\tapi.bind(\"revolution.slide.onloaded\", function(e) {
\t\t\t// attach lightbox
\t\t\tjQuery('#gallery_revoslider_<?= \$this->id; ?> li.slide a').attr('data-lightbox', 'gallery_revoslider_<?= \$this->id; ?>').map(function() {
\t\t\t\tjQuery(this).colorbox({
\t\t\t\t\t// Put custom options here
\t\t\t\t\tloop: false,
\t\t\t\t\trel: jQuery(this).attr('data-lightbox'),
\t\t\t\t\tmaxWidth: '95%',
\t\t\t\t\tmaxHeight: '95%'
\t\t\t\t});
\t\t\t});
\t\t});
\t});
</script>
<!-- SEO-SCRIPT-STOP -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/gallery/gallery_revoslider.html5";
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
//'fadefromright','fadefromleft','fadefromtop','fadefrombottom',
//'fadetoleftfadefromright','fadetorightfadefromleft','fadetotopfadefrombottom','fadetobottomfadefromtop',
//'parallaxtoright','parallaxtoleft','parallaxtotop','parallaxtobottom',
//'scaledownfromright','scaledownfromleft','scaledownfromtop','scaledownfrombottom',
//'zoomout','zoomin',
//'slotzoom-horizontal','slotzoom-vertical',
//'random-static'
//'boxslide','boxfade', 'slotzoom-horizontal', 'slotzoom-vertical',
//'slotslide-horizontal', 'slotslide-vertical', 
//'slotfade-horizontal','slotfade-vertical', 
//'slideleft', 'slideright', 'slideup' ,'slidedown',
//'slidehorizontal', 'slidevertical',\t
//'fade',\t'random',
//'curtain-1', 'curtain-2', 'curtain-3',
//'3dcurtain-vertical','3dcurtain-horizonal',
//'cube','cube-horizontal',
//'papercut',
//'flyin',
//'turnoff','turnoff-vertical',
//'random-premium'
\$effect = 'fade';
?>

<?php // load scripts and css
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/js/jquery.themepunch.tools.min.js';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/js/jquery.themepunch.revolution.min.js';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/css/settings.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/css/layers.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] . '/css/navigation.css|static';
\$GLOBALS['TL_CSS'][] = REVOLUTIONSLIDER_PATH . '/assets/css/styles.css|static';
?>

<div class=\"ce_revolutionslider rs-container resonsive banner block <?= \$this->class; ?>\">
\t<div class=\"rs-container block\">
\t\t<div class=\"banner fullscreen tp-banner block\" id=\"gallery_revoslider_<?= \$this->id; ?>\" data-version=\"5.4.8\">
\t\t\t<ul>
\t\t\t\t<?php foreach (\$this->body as \$class => \$row) : ?>
\t\t\t\t\t<?php foreach (\$row as \$col) : ?>
\t\t\t\t\t\t<?php 
\t\t\t\t\t\tforeach(array('href','caption','class','margin','linkTitle','attributes','alt','addImage') as \$f)
\t\t\t\t\t\t{
\t\t\t\t\t\t\tif( !isset(\$col->{\$f}) )
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$col->{\$f} = '';
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t\t?>
\t\t\t\t\t\t<li class=\"slide row<?= \$this->perRow; ?>\" data-transition=\"<?= \$effect; ?>\" data-slotamount=\"4\" data-thumb=\"<?= \$col->src; ?>\" <?php if (\$col->href) : ?> data-link=\"<?= \$col->href; ?>\" data-target=\"_blank\" <?php endif; ?>>
\t\t\t\t\t\t\t<img src=\"<?= \$col->src; ?>\" data-bgfit=\"cover\" data-bgposition=\"center center\" data-bgrepeat=\"no-repeat\" class=\"rev-slidebg\">
\t\t\t\t\t\t</li>
\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t<?php endforeach; ?>
\t\t\t</ul>
\t\t</div>
\t</div>
</div>
<!-- SEO-SCRIPT-START -->
<script>
\tjQuery(document).ready(function() {
\t\tvar options = {
\t\t\t// general settings
\t\t\tjsFileLocation:'<?= \$GLOBALS['REVOLUTIONSLIDER']['scriptPath']; ?>/js/',
\t\t\tdelay: 5000,
\t\t\tgridwidth: 1240,
\t\t\tgridheight: 800,
\t\t\tstartWithSlide: 0,
\t\t\tsliderType: 'standard',
\t\t\tsliderLayout: \"auto\",
\t\t\tfullScreenOffset:0,
\t\t\t//fullScreenOffsetContainer: \"#header\",
\t\t\tfullWidth: \"on\",
\t\t\tfullScreen: \"off\",

\t\t\ttouchenabled: \"on\",
\t\t\tonHoverStop: 'off',

\t\t\tswipe_velocity: 0.7,
\t\t\tswipe_min_touches: 1,
\t\t\tswipe_max_touches: 1,
\t\t\tdrag_block_vertical: false,

\t\t\t// lopp settings
\t\t\tstopAtSlide: -1,
\t\t\tstopAfterLoops: -1,

\t\t\tshadow: 0,

\t\t\tnavigation: {
\t\t\t\tbullets: {
\t\t\t\t\tenable: true,
\t\t\t\t\tstyle: \"hebe\",
\t\t\t\t\th_align:\"center\",
\t\t\t\t\tv_align:\"bottom\",
\t\t\t\t\tv_offset: 20,
\t\t\t\t\th_offset: 0,
\t\t\t\t\twrapper_color: 'transparent',
\t\t\t\t\thide_onmobile: true,
\t\t\t\t\thide_under: 767,
\t\t\t\t\tspace: 5,
\t\t\t\t},
                keyboardNavigation: \"on\",
                keyboard_direction: \"horizontal\",
                mouseScrollNavigation: \"off\",
                onHoverStop: \"off\",
                touch: {
                    touchenabled: \"on\",
                \tswipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: \"horizontal\",
                    drag_block_vertical: false
                },
                arrows: {
                    style: \"hesperiden\",
                    enable: true,
                    hide_onmobile: false,
                    hide_onleave: false,
                    tmp: '',
                    left: {
                        h_align: \"left\",
                        v_align: \"center\",
                        h_offset: 10,
                        v_offset: 0
                    },
                    right: {
                        h_align: \"right\",
                        v_align: \"center\",
                        h_offset: 10,
                        v_offset: 0
                    }
                }
\t\t\t}
\t\t}

\t\t// init slider  
\t\tvar api = jQuery('#gallery_revoslider_<?= \$this->id; ?>').show().revolution(options);

\t\tapi.bind(\"revolution.slide.onloaded\", function(e) {
\t\t\t// attach lightbox
\t\t\tjQuery('#gallery_revoslider_<?= \$this->id; ?> li.slide a').attr('data-lightbox', 'gallery_revoslider_<?= \$this->id; ?>').map(function() {
\t\t\t\tjQuery(this).colorbox({
\t\t\t\t\t// Put custom options here
\t\t\t\t\tloop: false,
\t\t\t\t\trel: jQuery(this).attr('data-lightbox'),
\t\t\t\t\tmaxWidth: '95%',
\t\t\t\t\tmaxHeight: '95%'
\t\t\t\t});
\t\t\t});
\t\t});
\t});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/gallery/gallery_revoslider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/gallery/gallery_revoslider.html5");
    }
}
