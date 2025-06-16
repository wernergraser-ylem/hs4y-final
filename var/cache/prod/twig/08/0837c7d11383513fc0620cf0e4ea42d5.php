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

/* @pct_theme_templates/customelements/customelement_video_w_teaser.html5 */
class __TwigTemplate_125f9d3c06c76e434edff9b0322911c2 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_video_w_teaser.css|static';

if (\$this->field('height')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_video_w_teaser_\" . \$this->id  . \"{height:\" . \$this->field('height')->value() . \"}</style>\";
}

if (\$this->field('height_mob')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_video_w_teaser_\" . \$this->id  . \"{height:\" . \$this->field('height_mob')->value() . \"}}</style>\";
}
?>

<div class=\"<?= \$this->class; ?> ce_video_w_teaser_<?= \$this->id; ?>\" data-style=\"<?= \$this->field('style')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-play-button=\"<?= \$this->field('play_button')->value(); ?>\" data-animation=\"<?= \$this->field('animation')->value(); ?>\"<?= \$this->cssID; ?>>
\t<div class=\"video_teaser\">
\t\t<?php if( \$this->field('teaser_video')->value() !== null ): ?>
\t\t<video class=\"teaser_video\" id=\"teaservideo_<?= \$this->id; ?>\" muted autoplay playsinline loop poster=\"<?= \$this->field('poster')->generate(); ?>\">
\t\t\t<source src=\"<?= \\Contao\\FilesModel::findByPk(\$this->field('teaser_video')->value())->path; ?>\" type=\"video/mp4\">
\t\t</video>
\t\t<?php endif; ?>
\t\t<div class=\"teaser_image\">
\t\t\t<?= \$this->field('bg_image')->html(); ?>
\t\t</div>
\t\t
\t\t<div class=\"video_content\">
\t\t\t<i class=\"fa fa-play play-button-static\"></i>
\t\t\t<?php if(\$this->field('title')->value()): ?><div class=\"title\"><?= \$this->field('title')->html(); ?></div><?php endif; ?>
\t\t\t<?php if(\$this->field('subtitle')->value()): ?><div class=\"subtitle\"><?= \$this->field('subtitle')->html(); ?></div><?php endif; ?>
\t\t\t<?php if(\$this->field('duration')->value()): ?><div class=\"duration\"><?= \$this->field('duration')->value(); ?></div><?php endif; ?>
\t\t</div>
\t</div>
\t
\t<div style='display:none'>
\t    <div id=\"inlinevideocontent_<?= \$this->id; ?>\" class=\"inlinevideocontent\">
\t\t\t<video id=\"video_<?= \$this->id; ?>\" class=\"video\" muted autoplay playsinline loop poster=\"<?= \$this->field('poster')->generate(); ?>\">
\t\t\t\t<source src=\"<?= \\Contao\\FilesModel::findByPk(\$this->field('video')->value())->path; ?>\" type=\"video/mp4\">
\t\t\t</video>
\t\t</div>
\t</div>
\t
\t<div class=\"circle\">
\t\t<div class=\"circle_inside\">
\t\t\t<i class=\"fa fa-play\"></i>
\t\t</div>
\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() {
    var videoContainer = jQuery(\".ce_video_w_teaser_<?= \$this->id; ?>\");

    // Überprüfen, ob das Attribut data-animation auf \"on\" gesetzt ist
    if (videoContainer.attr(\"data-animation\") === \"on\") {
        var videoTeaser = videoContainer.find(\".video_teaser\");
        var viewportHeight = jQuery(window).height();

        // Funktion, um die Breite basierend auf der Scrollposition anzupassen
        function adjustVideoWidth() {
            var teaserOffsetTop = videoTeaser.offset().top - jQuery(window).scrollTop();
            var teaserHeight = videoTeaser.outerHeight();
            var startWidth = 50; // Startbreite in Prozent
            var endWidth = 100; // Endbreite in Prozent
            var startExpandOffset = viewportHeight; // Beginnt sich zu vergrößern, wenn es in den Viewport kommt
            var topThirdViewport = viewportHeight / 5; // Oberes Drittel des Viewports

            if (teaserOffsetTop < startExpandOffset && teaserOffsetTop > topThirdViewport) {
                // Berechne, wie weit das Video in den Viewport eingedrungen ist
                var percentageInViewport = (startExpandOffset - teaserOffsetTop) / (startExpandOffset - topThirdViewport);

                // Interpolieren zwischen startWidth und endWidth
                var newWidth = startWidth + (percentageInViewport * (endWidth - startWidth));
                newWidth = Math.min(Math.max(newWidth, startWidth), endWidth); // Begrenzen zwischen 50% und 100%
                videoTeaser.css(\"width\", newWidth + \"%\");
            } else if (teaserOffsetTop <= topThirdViewport) {
                // Wenn der Teaser das obere Drittel des Viewports erreicht hat
                videoTeaser.css(\"width\", \"100%\");
            } else {
                // Wenn der Teaser außerhalb des Viewports ist, zurück zu startWidth
                videoTeaser.css(\"width\", startWidth + \"%\");
            }
        }

        // Beim Laden der Seite prüfen, ob das Video im Viewport ist
        adjustVideoWidth();

        // Beim Scrollen die Breite anpassen
        jQuery(window).on(\"scroll\", adjustVideoWidth);
    }
});

jQuery(document).ready(function() 
{
\t// flying play button
\tvar circle = jQuery('.ce_video_w_teaser_<?= \$this->id; ?>[data-play-button=\"play_button_flying\"] .circle');
\tvar eventStarted = true;
\t
\tjQuery('.ce_video_w_teaser_<?= \$this->id; ?>').on('mouseover mouseout',function(event)
\t{
\t\tvar _this = jQuery(this);
\t\t
\t\tif( event.type == 'mouseover' )
\t\t{
\t\t\tvar x = event.pageX - _this.offset().left;
\t\t\tvar y = event.pageY - _this.offset().top;
\t\t\tcircle.css({ transform: 'translate(' + x + 'px, ' + y + 'px)' });
\t\t}
\t\t
\t\tif( event.type == 'mouseover' && eventStarted === false )
\t\t{
\t\t\teventStarted = true;
\t\t\t
\t\t\tjQuery(document).on('mousemove',function(e)
\t\t\t{
\t\t\t\tvar x = e.pageX - _this.offset().left;
\t\t\t\tvar y = e.pageY - _this.offset().top;
\t\t\t\tcircle.css({ transform: 'translate(' + x + 'px, ' + y + 'px)' });
\t\t\t});\t
\t\t}
\t\telse
\t\t{
\t\t\tjQuery(document).unbind('mousemove');
\t\t\teventStarted = false;
\t\t}
\t});
});
\t
// set mouseover css class
jQuery(document).ready(function() 
{
    jQuery('.ce_video_w_teaser_<?= \$this->id; ?>[data-play-button=\"play_button_flying\"]').hover(
        function() {
            // Mouseover-Ereignis
            jQuery(this).addClass('mouseover');
        }, 
        function() {
            // Mouseout-Ereignis
            jQuery(this).removeClass('mouseover');
        }
    );
});

// lightbox and autoplay\t
jQuery(document).ready(function()
\t{
\t\tvar video =  document.getElementById(\"teaservideo_<?= \$this->id; ?>\");
\t\tif( jQuery(video).attr('autoplay') )
\t\t{
\t\t\tvideo.muted = true;
\t\t}
\t\tjQuery(\".ce_video_w_teaser_<?= \$this->id; ?>\").colorbox(
\t\t{
\t\t\tinline:true, width:\"80%\", height:\"auto\", maxWidth:\"900px\", href:\"#inlinevideocontent_<?= \$this->id; ?>\",
\t\t\tonOpen: function()
\t\t\t{
\t\t\t\tvideo.pause();
\t\t\t},
\t\t\tonClosed: function()
\t\t\t{
\t\t\t\t//video.pause();
\t\t\t\tvideo.play();
\t\t\t\t
\t\t\t}
\t\t});
\t});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_video_w_teaser.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_video_w_teaser.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_video_w_teaser.html5");
    }
}
