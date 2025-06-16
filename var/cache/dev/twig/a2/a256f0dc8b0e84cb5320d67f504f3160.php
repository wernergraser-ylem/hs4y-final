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

/* @pct_theme_templates/customelements/customelement_background_video_start.html5 */
class __TwigTemplate_28584b55f9a25636bc41d02eca667778 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_background_video_start.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_background_video_start.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_video_background.css|static';
?>
<div class=\"<?php echo \$this->class; ?> ce_video_background_<?php echo \$this->id; ?> block<?php if(\$this->field('invert')->value()): ?> color-white<?php endif; ?><?php if(\$this->field('fullscreen')->value()): ?> fullscreen-video<?php endif; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
<?php if(\$this->field('overlay')->value()): ?><div class=\"video-overlay\"></div><?php endif; ?>

<video id=\"video_<?php echo \$this->id; ?>\" class=\"video\" muted autoplay playsinline loop poster=\"<?php echo \$this->field('poster')->generate(); ?>\">
  <source src=\"<?php echo \\Contao\\FilesModel::findByPk(\$this->field('video_mp4')->value())->path; ?>\" type=\"video/mp4\">
</video>

<!-- SEO-SCRIPT-START -->
<script>
(function() {
\tvar video = document.getElementById(\"video_<?php echo \$this->id; ?>\");
\tvideo.addEventListener( \"canplay\", function() {
\t\tvideo.play();
  \t});
})();

jQuery(document).ready(function() {
    function adjustFullscreenHeight() {
        var videoBackgroundClass = '.ce_video_background_<?php echo \$this->id; ?>';
        
        if (jQuery(videoBackgroundClass).hasClass('fullscreen-video')) {
            var headerHeight = 0;

            // Prüfen, ob #fix-wrapper nicht 'absolute' ist
            if (jQuery('#fix-wrapper').css('position') !== 'absolute') {
                headerHeight = jQuery('#header').outerHeight();
            }

            jQuery(videoBackgroundClass).css('height', 'calc(100vh - ' + headerHeight + 'px)');
        }
    }
    
    // Funktion beim Laden und Resizing aufrufen
    adjustFullscreenHeight();
    jQuery(window).resize(adjustFullscreenHeight);
    
    setTimeout(function() 
\t{
\t\tjQuery(window).resize();
\t}, 400);
});

</script>
<!-- SEO-SCRIPT-STOP -->

<div class=\"ce_video_background_inside contentwrap<?php if(\$this->field('padding_top_class')->value()): ?> <?php echo \$this->field('padding_top_class')->value(); ?><?php endif; ?><?php if(\$this->field('padding_bottom_class')->value()): ?> <?php echo \$this->field('padding_bottom_class')->value(); ?><?php endif; ?>\">";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_background_video_start.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_video_background.css|static';
?>
<div class=\"<?php echo \$this->class; ?> ce_video_background_<?php echo \$this->id; ?> block<?php if(\$this->field('invert')->value()): ?> color-white<?php endif; ?><?php if(\$this->field('fullscreen')->value()): ?> fullscreen-video<?php endif; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
<?php if(\$this->field('overlay')->value()): ?><div class=\"video-overlay\"></div><?php endif; ?>

<video id=\"video_<?php echo \$this->id; ?>\" class=\"video\" muted autoplay playsinline loop poster=\"<?php echo \$this->field('poster')->generate(); ?>\">
  <source src=\"<?php echo \\Contao\\FilesModel::findByPk(\$this->field('video_mp4')->value())->path; ?>\" type=\"video/mp4\">
</video>

<!-- SEO-SCRIPT-START -->
<script>
(function() {
\tvar video = document.getElementById(\"video_<?php echo \$this->id; ?>\");
\tvideo.addEventListener( \"canplay\", function() {
\t\tvideo.play();
  \t});
})();

jQuery(document).ready(function() {
    function adjustFullscreenHeight() {
        var videoBackgroundClass = '.ce_video_background_<?php echo \$this->id; ?>';
        
        if (jQuery(videoBackgroundClass).hasClass('fullscreen-video')) {
            var headerHeight = 0;

            // Prüfen, ob #fix-wrapper nicht 'absolute' ist
            if (jQuery('#fix-wrapper').css('position') !== 'absolute') {
                headerHeight = jQuery('#header').outerHeight();
            }

            jQuery(videoBackgroundClass).css('height', 'calc(100vh - ' + headerHeight + 'px)');
        }
    }
    
    // Funktion beim Laden und Resizing aufrufen
    adjustFullscreenHeight();
    jQuery(window).resize(adjustFullscreenHeight);
    
    setTimeout(function() 
\t{
\t\tjQuery(window).resize();
\t}, 400);
});

</script>
<!-- SEO-SCRIPT-STOP -->

<div class=\"ce_video_background_inside contentwrap<?php if(\$this->field('padding_top_class')->value()): ?> <?php echo \$this->field('padding_top_class')->value(); ?><?php endif; ?><?php if(\$this->field('padding_bottom_class')->value()): ?> <?php echo \$this->field('padding_bottom_class')->value(); ?><?php endif; ?>\">", "@pct_theme_templates/customelements/customelement_background_video_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_background_video_start.html5");
    }
}
