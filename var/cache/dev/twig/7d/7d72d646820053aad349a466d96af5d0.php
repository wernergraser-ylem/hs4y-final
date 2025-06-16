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

/* @pct_theme_templates/customelements/customelement_fullscreen_gallery.html5 */
class __TwigTemplate_dbfff3fdb62d036480c4d3d7413493b6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_fullscreen_gallery.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_fullscreen_gallery.html5"));

        // line 1
        yield "<?php // load scripts and css
global \$objPage;
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/js/jquery.themepunch.tools.min.js';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/js/jquery.themepunch.revolution.min.js';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/css/settings.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/css/layers.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/css/navigation.css|static';
\$GLOBALS['TL_CSS'][] = REVOLUTIONSLIDER_PATH.'/assets/css/styles.css|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_fullscreen_gallery.css|static';
\$GLOBALS['TL_JQUERY'][] = \$this->javascript; // js_revoslider_xxx template
\$arrMediaQueries = array();

\$container = \\Contao\\System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();\t\t\t\t\t\t
?>

<div class=\"ce_revolutionslider <?php echo \$this->class; ?> <?php echo \$this->field('version')->value(); ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>\t\t
\t<div class=\"rs-container fullscreen block\">
\t\t<div  class=\"banner fullscreen tp-banner fullscreen-container my_revolutionslider_<?php echo \$this->id; ?> block\" data-version=\"5.4.8\">
\t\t\t<ul>
\t\t\t\t<?php foreach(\$this->group('images') as \$i => \$fields): ?>
\t\t\t\t\t<?php 
\t\t\t\t\t\$objFile = \\Contao\\FilesModel::findByPk( \$this->field('image#'.\$i)->value() );
\t\t\t\t\tif( \$objFile === null )
\t\t\t\t\t{
\t\t\t\t\t\tcontinue;
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\t\$size = \\Contao\\StringUtil::deserialize( \$this->field('image#'.\$i)->option('size') );
\t\t\t\t\t\t
\t\t\t\t\tif( is_array(\$size) )
\t\t\t\t\t{
\t\t\t\t\t\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\t\t\t\t\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\t\t\t\t\tif( \$objPicture !== null && !empty(\$sources) )
\t\t\t\t\t\t{
\t\t\t\t\t\t\tforeach(\$sources ?: array() as \$data)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tif( !isset(\$data['media']) || strlen(\$data['media']) < 1 )
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\tcontinue;
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\$arrMediaQueries[] = '@media '.\$data['media'].' { .ce_colorbox_'.\$this->id.' .ce_colorbox_inside { background-image:url('.\$data['src'].') !important; } }';
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t\t?>
\t\t\t\t\t<li class=\"slide <?= 'fullscreen_gallery_mq_image_'.\$this->id.'_'.\$i; ?>\" data-transition=\"<?php echo \$this->field('data_transition')->value(); ?>\" data-slotamount=\"4\" data-thumb=\"<?php echo \$objFile->path; ?>\" data-masterspeed=\"<?php echo \$this->field('data_speed')->value(); ?>\">
\t\t\t\t\t\t<img src=\"<?php echo \$this->field('image#'.\$i)->generate(); ?>\" data-bgfit=\"cover\" data-bgposition=\"center center\" data-bgrepeat=\"no-repeat\">
\t\t\t\t\t\t<div  class=\"ce_revolutionslider_text caption tp-caption block bold<?php if(\$this->field('invertcolor#'.\$i)->value()): ?> invertcolor<?php endif; ?>\" style=\"font-size:<?php echo \$this->field('fontsize_headline')->value(); ?>px\" data-easing=\"easeInBack\" data-x=\"40\" data-y=\"<?php echo \$this->field('headline_pos')->value(); ?>\" data-start=\"1\" data-speed=\"<?php echo \$this->field('data_speed')->value(); ?>\" data-endeasing=\"easeInSine\" data-frames='[{\"delay\":300,\"speed\":700,\"frame\":\"0\",\"to\":\"o:1;\",\"ease\":\"easeInBack\"}]'>
\t\t\t\t\t\t\t<?php echo \$this->field('headline#'.\$i)->value(); ?>
           \t\t\t\t</div>
           \t\t\t\t<div  class=\"ce_revolutionslider_text caption tp-caption block<?php if(\$this->field('invertcolor#'.\$i)->value()): ?> invertcolor<?php endif; ?>\" style=\"font-size:<?php echo \$this->field('fontsize_text')->value(); ?>px\" data-easing=\"easeInBack\" data-x=\"40\" data-y=\"<?php echo \$this->field('text_line_1_pos')->value(); ?>\" data-start=\"1\" data-speed=\"<?php echo \$this->field('data_speed')->value(); ?>\" data-endeasing=\"easeInSine\" data-frames='[{\"delay\":300,\"speed\":700,\"frame\":\"0\",\"to\":\"o:1;\",\"ease\":\"easeInBack\"}]'>
\t\t   \t\t\t\t\t<?php echo \$this->field('text_line_1#'.\$i)->value(); ?>
           \t\t\t\t</div>
           \t\t\t\t <div  class=\"ce_revolutionslider_text caption tp-caption block<?php if(\$this->field('invertcolor#'.\$i)->value()): ?> invertcolor<?php endif; ?>\" style=\"font-size:<?php echo \$this->field('fontsize_text')->value(); ?>px\" data-easing=\"easeInBack\" data-x=\"40\" data-y=\"<?php echo \$this->field('text_line_2_pos')->value(); ?>\" data-start=\"1\" data-speed=\"<?php echo \$this->field('data_speed')->value(); ?>\" data-endeasing=\"easeInSine\" data-frames='[{\"delay\":300,\"speed\":700,\"frame\":\"0\",\"to\":\"o:1;\",\"ease\":\"easeInBack\"}]'>
\t\t   \t\t\t\t \t<?php echo \$this->field('text_line_2#'.\$i)->value(); ?>
\t\t   \t\t\t\t </div>
\t\t\t\t<?php endforeach; ?>
     \t\t</ul>
\t \t</div>
\t</div>
</div>

<?php
if( count(\$arrMediaQueries) > 0 )
{
\t\$GLOBALS['TL_HEAD'][] = '<style> '.implode(\"\\n\",\$arrMediaQueries).'</style>';
}
?>

<!-- SEO-SCRIPT-START -->
<script>
/**
 * Revolution Slider Template file
 * For more settings see: http://www.orbis-ingenieria.com/code/documentation/documentation.html#!/documenter_cover
 */
jQuery(document).ready(function() 
{\t
\t// add class tp-resizeme to nested elements
\tjQuery('.my_revolutionslider_<?php echo \$this->id; ?>').find('.tp-caption,.caption').find('*').addClass('tp-resizeme');
\t
\t// init slider  
\tvar api = jQuery('.my_revolutionslider_<?php echo \$this->id; ?>').show().revolution({
\t\t// general settings
\t\tjsFileLocation:'<?= \$GLOBALS['REVOLUTIONSLIDER']['scriptPath']; ?>/js/',
\t\tdelay:\t<?php echo \$this->field('delay')->value(); ?>,
\t\tgridwidth: 1240,
\t\tgridheight:\t800,
\t\tstartWithSlide:\t0,
\t\tsliderType: 'standard',
\t\tsliderLayout: \"fullscreen\",
\t\tfullScreenOffset:0,
\t\tfullWidth: \"on\",
\t\tfullScreen: \"off\",
\t\tfullScreenOffsetContainer: '#<?php echo \$this->field('fullScreenOffsetContainer')->value(); ?>',
\t\t\t
\t\t// thumbnails
\t\tthumbWidth:\t\t\t<?php echo \$this->field('thumb_width')->value(); ?>,
\t\tthumbHeight:\t\t<?php echo \$this->field('thumb_height')->value(); ?>,
\t\tthumbAmount:\t\t<?php echo \$this->field('thumbs')->value(); ?>,
\t\thideThumbs:0,\t\t// hide thumbs when there is no mouse contact
\t\tnavOffsetHorizontal: -300,
\t\tnavigation: {
\t\t\tbullets: {
\t\t\t\tenable: true,
\t\t\t\tstyle: \"hebe\",
\t\t\t\th_align:\"center\",
\t\t\t\tv_align:\"bottom\",
\t\t\t\tv_offset: 20,
\t\t\t\th_offset: 0,
\t\t\t\twrapper_color: 'transparent',
\t\t\t\thide_onmobile: true,
\t\t\t\thide_under: 767,
\t\t\t\tspace: 5,
\t\t\t},
            keyboardNavigation: \"on\",
            keyboard_direction: \"horizontal\",
            mouseScrollNavigation: \"off\",
            onHoverStop: \"off\",
            touch: {
                touchenabled: \"on\",
                swipe_threshold: 75,
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
\t\t}
\t});
});
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
        return "@pct_theme_templates/customelements/customelement_fullscreen_gallery.html5";
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
        return new Source("<?php // load scripts and css
global \$objPage;
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/js/jquery.themepunch.tools.min.js';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/js/jquery.themepunch.revolution.min.js';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/css/settings.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/css/layers.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/css/navigation.css|static';
\$GLOBALS['TL_CSS'][] = REVOLUTIONSLIDER_PATH.'/assets/css/styles.css|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_fullscreen_gallery.css|static';
\$GLOBALS['TL_JQUERY'][] = \$this->javascript; // js_revoslider_xxx template
\$arrMediaQueries = array();

\$container = \\Contao\\System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();\t\t\t\t\t\t
?>

<div class=\"ce_revolutionslider <?php echo \$this->class; ?> <?php echo \$this->field('version')->value(); ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>\t\t
\t<div class=\"rs-container fullscreen block\">
\t\t<div  class=\"banner fullscreen tp-banner fullscreen-container my_revolutionslider_<?php echo \$this->id; ?> block\" data-version=\"5.4.8\">
\t\t\t<ul>
\t\t\t\t<?php foreach(\$this->group('images') as \$i => \$fields): ?>
\t\t\t\t\t<?php 
\t\t\t\t\t\$objFile = \\Contao\\FilesModel::findByPk( \$this->field('image#'.\$i)->value() );
\t\t\t\t\tif( \$objFile === null )
\t\t\t\t\t{
\t\t\t\t\t\tcontinue;
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\t\$size = \\Contao\\StringUtil::deserialize( \$this->field('image#'.\$i)->option('size') );
\t\t\t\t\t\t
\t\t\t\t\tif( is_array(\$size) )
\t\t\t\t\t{
\t\t\t\t\t\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\t\t\t\t\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\t\t\t\t\tif( \$objPicture !== null && !empty(\$sources) )
\t\t\t\t\t\t{
\t\t\t\t\t\t\tforeach(\$sources ?: array() as \$data)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tif( !isset(\$data['media']) || strlen(\$data['media']) < 1 )
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\tcontinue;
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\$arrMediaQueries[] = '@media '.\$data['media'].' { .ce_colorbox_'.\$this->id.' .ce_colorbox_inside { background-image:url('.\$data['src'].') !important; } }';
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t\t?>
\t\t\t\t\t<li class=\"slide <?= 'fullscreen_gallery_mq_image_'.\$this->id.'_'.\$i; ?>\" data-transition=\"<?php echo \$this->field('data_transition')->value(); ?>\" data-slotamount=\"4\" data-thumb=\"<?php echo \$objFile->path; ?>\" data-masterspeed=\"<?php echo \$this->field('data_speed')->value(); ?>\">
\t\t\t\t\t\t<img src=\"<?php echo \$this->field('image#'.\$i)->generate(); ?>\" data-bgfit=\"cover\" data-bgposition=\"center center\" data-bgrepeat=\"no-repeat\">
\t\t\t\t\t\t<div  class=\"ce_revolutionslider_text caption tp-caption block bold<?php if(\$this->field('invertcolor#'.\$i)->value()): ?> invertcolor<?php endif; ?>\" style=\"font-size:<?php echo \$this->field('fontsize_headline')->value(); ?>px\" data-easing=\"easeInBack\" data-x=\"40\" data-y=\"<?php echo \$this->field('headline_pos')->value(); ?>\" data-start=\"1\" data-speed=\"<?php echo \$this->field('data_speed')->value(); ?>\" data-endeasing=\"easeInSine\" data-frames='[{\"delay\":300,\"speed\":700,\"frame\":\"0\",\"to\":\"o:1;\",\"ease\":\"easeInBack\"}]'>
\t\t\t\t\t\t\t<?php echo \$this->field('headline#'.\$i)->value(); ?>
           \t\t\t\t</div>
           \t\t\t\t<div  class=\"ce_revolutionslider_text caption tp-caption block<?php if(\$this->field('invertcolor#'.\$i)->value()): ?> invertcolor<?php endif; ?>\" style=\"font-size:<?php echo \$this->field('fontsize_text')->value(); ?>px\" data-easing=\"easeInBack\" data-x=\"40\" data-y=\"<?php echo \$this->field('text_line_1_pos')->value(); ?>\" data-start=\"1\" data-speed=\"<?php echo \$this->field('data_speed')->value(); ?>\" data-endeasing=\"easeInSine\" data-frames='[{\"delay\":300,\"speed\":700,\"frame\":\"0\",\"to\":\"o:1;\",\"ease\":\"easeInBack\"}]'>
\t\t   \t\t\t\t\t<?php echo \$this->field('text_line_1#'.\$i)->value(); ?>
           \t\t\t\t</div>
           \t\t\t\t <div  class=\"ce_revolutionslider_text caption tp-caption block<?php if(\$this->field('invertcolor#'.\$i)->value()): ?> invertcolor<?php endif; ?>\" style=\"font-size:<?php echo \$this->field('fontsize_text')->value(); ?>px\" data-easing=\"easeInBack\" data-x=\"40\" data-y=\"<?php echo \$this->field('text_line_2_pos')->value(); ?>\" data-start=\"1\" data-speed=\"<?php echo \$this->field('data_speed')->value(); ?>\" data-endeasing=\"easeInSine\" data-frames='[{\"delay\":300,\"speed\":700,\"frame\":\"0\",\"to\":\"o:1;\",\"ease\":\"easeInBack\"}]'>
\t\t   \t\t\t\t \t<?php echo \$this->field('text_line_2#'.\$i)->value(); ?>
\t\t   \t\t\t\t </div>
\t\t\t\t<?php endforeach; ?>
     \t\t</ul>
\t \t</div>
\t</div>
</div>

<?php
if( count(\$arrMediaQueries) > 0 )
{
\t\$GLOBALS['TL_HEAD'][] = '<style> '.implode(\"\\n\",\$arrMediaQueries).'</style>';
}
?>

<!-- SEO-SCRIPT-START -->
<script>
/**
 * Revolution Slider Template file
 * For more settings see: http://www.orbis-ingenieria.com/code/documentation/documentation.html#!/documenter_cover
 */
jQuery(document).ready(function() 
{\t
\t// add class tp-resizeme to nested elements
\tjQuery('.my_revolutionslider_<?php echo \$this->id; ?>').find('.tp-caption,.caption').find('*').addClass('tp-resizeme');
\t
\t// init slider  
\tvar api = jQuery('.my_revolutionslider_<?php echo \$this->id; ?>').show().revolution({
\t\t// general settings
\t\tjsFileLocation:'<?= \$GLOBALS['REVOLUTIONSLIDER']['scriptPath']; ?>/js/',
\t\tdelay:\t<?php echo \$this->field('delay')->value(); ?>,
\t\tgridwidth: 1240,
\t\tgridheight:\t800,
\t\tstartWithSlide:\t0,
\t\tsliderType: 'standard',
\t\tsliderLayout: \"fullscreen\",
\t\tfullScreenOffset:0,
\t\tfullWidth: \"on\",
\t\tfullScreen: \"off\",
\t\tfullScreenOffsetContainer: '#<?php echo \$this->field('fullScreenOffsetContainer')->value(); ?>',
\t\t\t
\t\t// thumbnails
\t\tthumbWidth:\t\t\t<?php echo \$this->field('thumb_width')->value(); ?>,
\t\tthumbHeight:\t\t<?php echo \$this->field('thumb_height')->value(); ?>,
\t\tthumbAmount:\t\t<?php echo \$this->field('thumbs')->value(); ?>,
\t\thideThumbs:0,\t\t// hide thumbs when there is no mouse contact
\t\tnavOffsetHorizontal: -300,
\t\tnavigation: {
\t\t\tbullets: {
\t\t\t\tenable: true,
\t\t\t\tstyle: \"hebe\",
\t\t\t\th_align:\"center\",
\t\t\t\tv_align:\"bottom\",
\t\t\t\tv_offset: 20,
\t\t\t\th_offset: 0,
\t\t\t\twrapper_color: 'transparent',
\t\t\t\thide_onmobile: true,
\t\t\t\thide_under: 767,
\t\t\t\tspace: 5,
\t\t\t},
            keyboardNavigation: \"on\",
            keyboard_direction: \"horizontal\",
            mouseScrollNavigation: \"off\",
            onHoverStop: \"off\",
            touch: {
                touchenabled: \"on\",
                swipe_threshold: 75,
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
\t\t}
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/customelements/customelement_fullscreen_gallery.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_fullscreen_gallery.html5");
    }
}
