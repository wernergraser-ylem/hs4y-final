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

/* @pct_theme_templates/theme/revoslider_default.html5 */
class __TwigTemplate_50f3176db6dce92513fdb2e651687591 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/revoslider_default.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/revoslider_default.html5"));

        // line 1
        yield "<?php // load scripts and css
global \$objPage;
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/js/jquery.themepunch.tools.min.js';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/js/jquery.themepunch.revolution.min.js';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/css/settings.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/css/layers.css|static';
\$GLOBALS['TL_CSS'][] = \$GLOBALS['REVOLUTIONSLIDER']['scriptPath'].'/css/navigation.css|static';
\$GLOBALS['TL_CSS'][] = REVOLUTIONSLIDER_PATH.'/assets/css/styles.css|static';
\$GLOBALS['TL_JQUERY'][] = \$this->javascript; // js_revoslider_xxx template
if( isset(\$this->mediaqueries) && \\is_array(\$this->mediaqueries) )
{
\t\$GLOBALS['TL_HEAD'][] = '<style>'.implode(\"\\n\",\$this->mediaqueries).'</style>';; // responsive images media queries\t
}
// set a max-width style when running in boxed mode
if(\$this->sliderStyle == 'boxed')
{
\t\$GLOBALS['TL_HEAD'][] = '<style>'.\$this->selector.'{max-width:'.\$this->startWidth.'px;position:relative;}</style>'; 
}
\$slides = \$this->slides;
if( \$this->shuffle )
{
\tshuffle(\$slides);
}

\$height = \$this->startHeight.'px';
if( \$this->sliderStyle == 'fullscreen' )
{
\t\$height = '100vh';
}
?>

<?php if(!empty(\$slides)): ?>
<div <?= \$this->sliderID; ?> class=\"banner <?= \$this->class; ?> block\" data-version=\"5.0.7\" style=\"height:<?= \$height; ?>;\">
<ul>
<?php foreach(\$slides as \$i => \$slide): ?>
<li data-index=\"rs-<?= \$i; ?>\" <?= \$slide['cssID']; ?> class=\"<?= \$slide['class']; ?>\" <?= \$slide['attributes']; ?>>
<?php if(\$slide['source'] == 'videomp4'): ?>
<img src=\"<?= \$slide['poster']; ?>\" alt=\"\" class=\"rev-slidebg\" data-bgposition=\"center center\" data-bgfit=\"cover\" data-bgrepeat=\"no-repeat\">
<div class=\"rs-background-video-layer\"
\tdata-videomp4=\"<?= \$slide['videomp4']; ?>\"
\tdata-videopreload=\"auto\"
\tdata-aspectratio=\"16:9\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"on\"
\tdata-autoplay=\"on\"
\tdata-videocontrols=\"none\"
\t<?php if(\$slide['nextslideatend']): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$slide['loop']): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
></div>
<?php elseif(\$slide['source'] == 'youtube'): ?>
<img src=\"<?= \$slide['poster']; ?>\" alt=\"\" class=\"rev-slidebg\" data-bgposition=\"center center\" data-bgfit=\"cover\" data-bgrepeat=\"no-repeat\">
<div class=\"rs-background-video-layer\"
\tdata-ytid=\"<?= \$slide['videoId']; ?>\"
\tdata-videoattributes=\"version=3&enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0&\"
\tdata-type='video'
\tdata-aspectratio=\"16:9\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"on\"
\tdata-autoplay=\"on\"
\tdata-videocontrols=\"none\"
\t<?php if(\$slide['nextslideatend']): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$slide['loop']): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
></div>
<?php elseif(\$slide['source'] == 'vimeo'): ?>
<img src=\"<?= \$slide['poster']; ?>\" alt=\"\" class=\"rev-slidebg\" data-bgposition=\"center center\" data-bgfit=\"cover\" data-bgrepeat=\"no-repeat\">
<div class=\"rs-background-video-layer\"
\tdata-vimeoid=\"<?= \$slide['videoId']; ?>\" 
\tdata-videoattributes=\"background=1&title=0&byline=0&portrait=0&api=1\"
\tdata-type='video'
\tdata-aspectratio=\"16:9\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"on\"
\tdata-autoplay=\"on\"
\tdata-videocontrols=\"none\"
\t<?php if(\$slide['nextslideatend']): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$slide['loop']): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
></div>
<?php // custom video source
elseif( \$slide['source'] == 'custom' ): ?>
<img src=\"<?= \$slide['poster']; ?>\" alt=\"\" class=\"rev-slidebg\" data-bgposition=\"center center\" data-bgfit=\"cover\" data-bgrepeat=\"no-repeat\">
<div class=\"rs-background-video-layer custom responsive ratio-169\"
\tdata-type='video'
\tdata-aspectratio=\"16:9\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"on\"
\tdata-autoplay=\"on\"
\tdata-videocontrols=\"none\"
\t<?php if(\$slide['nextslideatend']): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$slide['loop']): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
>
<iframe src=\"<?= \$slide['row']['videoURL']; ?>\" width=\"100%\" height=\"600\" seamless allowfullscreen></iframe>
</div>
<?php endif; ?>
<?= implode('',\$slide['content']); ?>
</li>
<?php endforeach; ?>
</ul>
<div class=\"tp-bannertimer\"></div>
</div>
<?php else: ?>
<p class=\"info empty\"><?php echo \$this->emptyMsg; ?></p>
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
        return "@pct_theme_templates/theme/revoslider_default.html5";
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
\$GLOBALS['TL_JQUERY'][] = \$this->javascript; // js_revoslider_xxx template
if( isset(\$this->mediaqueries) && \\is_array(\$this->mediaqueries) )
{
\t\$GLOBALS['TL_HEAD'][] = '<style>'.implode(\"\\n\",\$this->mediaqueries).'</style>';; // responsive images media queries\t
}
// set a max-width style when running in boxed mode
if(\$this->sliderStyle == 'boxed')
{
\t\$GLOBALS['TL_HEAD'][] = '<style>'.\$this->selector.'{max-width:'.\$this->startWidth.'px;position:relative;}</style>'; 
}
\$slides = \$this->slides;
if( \$this->shuffle )
{
\tshuffle(\$slides);
}

\$height = \$this->startHeight.'px';
if( \$this->sliderStyle == 'fullscreen' )
{
\t\$height = '100vh';
}
?>

<?php if(!empty(\$slides)): ?>
<div <?= \$this->sliderID; ?> class=\"banner <?= \$this->class; ?> block\" data-version=\"5.0.7\" style=\"height:<?= \$height; ?>;\">
<ul>
<?php foreach(\$slides as \$i => \$slide): ?>
<li data-index=\"rs-<?= \$i; ?>\" <?= \$slide['cssID']; ?> class=\"<?= \$slide['class']; ?>\" <?= \$slide['attributes']; ?>>
<?php if(\$slide['source'] == 'videomp4'): ?>
<img src=\"<?= \$slide['poster']; ?>\" alt=\"\" class=\"rev-slidebg\" data-bgposition=\"center center\" data-bgfit=\"cover\" data-bgrepeat=\"no-repeat\">
<div class=\"rs-background-video-layer\"
\tdata-videomp4=\"<?= \$slide['videomp4']; ?>\"
\tdata-videopreload=\"auto\"
\tdata-aspectratio=\"16:9\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"on\"
\tdata-autoplay=\"on\"
\tdata-videocontrols=\"none\"
\t<?php if(\$slide['nextslideatend']): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$slide['loop']): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
></div>
<?php elseif(\$slide['source'] == 'youtube'): ?>
<img src=\"<?= \$slide['poster']; ?>\" alt=\"\" class=\"rev-slidebg\" data-bgposition=\"center center\" data-bgfit=\"cover\" data-bgrepeat=\"no-repeat\">
<div class=\"rs-background-video-layer\"
\tdata-ytid=\"<?= \$slide['videoId']; ?>\"
\tdata-videoattributes=\"version=3&enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0&\"
\tdata-type='video'
\tdata-aspectratio=\"16:9\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"on\"
\tdata-autoplay=\"on\"
\tdata-videocontrols=\"none\"
\t<?php if(\$slide['nextslideatend']): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$slide['loop']): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
></div>
<?php elseif(\$slide['source'] == 'vimeo'): ?>
<img src=\"<?= \$slide['poster']; ?>\" alt=\"\" class=\"rev-slidebg\" data-bgposition=\"center center\" data-bgfit=\"cover\" data-bgrepeat=\"no-repeat\">
<div class=\"rs-background-video-layer\"
\tdata-vimeoid=\"<?= \$slide['videoId']; ?>\" 
\tdata-videoattributes=\"background=1&title=0&byline=0&portrait=0&api=1\"
\tdata-type='video'
\tdata-aspectratio=\"16:9\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"on\"
\tdata-autoplay=\"on\"
\tdata-videocontrols=\"none\"
\t<?php if(\$slide['nextslideatend']): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$slide['loop']): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
></div>
<?php // custom video source
elseif( \$slide['source'] == 'custom' ): ?>
<img src=\"<?= \$slide['poster']; ?>\" alt=\"\" class=\"rev-slidebg\" data-bgposition=\"center center\" data-bgfit=\"cover\" data-bgrepeat=\"no-repeat\">
<div class=\"rs-background-video-layer custom responsive ratio-169\"
\tdata-type='video'
\tdata-aspectratio=\"16:9\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"on\"
\tdata-autoplay=\"on\"
\tdata-videocontrols=\"none\"
\t<?php if(\$slide['nextslideatend']): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$slide['loop']): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
>
<iframe src=\"<?= \$slide['row']['videoURL']; ?>\" width=\"100%\" height=\"600\" seamless allowfullscreen></iframe>
</div>
<?php endif; ?>
<?= implode('',\$slide['content']); ?>
</li>
<?php endforeach; ?>
</ul>
<div class=\"tp-bannertimer\"></div>
</div>
<?php else: ?>
<p class=\"info empty\"><?php echo \$this->emptyMsg; ?></p>
<?php endif; ?>", "@pct_theme_templates/theme/revoslider_default.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/revoslider_default.html5");
    }
}
