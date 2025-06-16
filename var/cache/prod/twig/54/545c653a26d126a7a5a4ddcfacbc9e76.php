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

/* @pct_theme_templates/gallery/gallery_elevatezoom.html5 */
class __TwigTemplate_c322fd91bf2d5a4423129b461c9a9da1 extends Template
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
        yield "
<?php
global \$objPage;
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/elevatezoom/jquery.elevatezoom.js'.(\\PCT\\SEO::getProtocol() == 'http2' ? '' : '|static');
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/gallery/ce_elevatezoom.css|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/gallery/ce_gallery.css|static';
?>


<div class=\"ce_elevatezoom elevatezoom_gallery_wrapper\">

<div class=\"elevatezoom_gallery_window\">
<?php 
\$i = 0;
?>
<?php foreach (\$this->body as \$class=>\$row): ?>
<?php foreach (\$row as \$col): ?>
<?php 
foreach(array('href','caption','class','margin','linkTitle','attributes','alt','addImage') as \$f)
{
\tif( !isset(\$col->{\$f}) )
\t{
\t\t\$col->{\$f} = '';
\t}
}
?>
<?php if (\$col->addImage && \$col->src): ?>
\t<?php if(\$i == 0): ?>
\t\t<?php if(\$col->href) :?>
\t\t<a id=\"elevatezoom_image_gallery_<?php echo \$this->id; ?>_window\" class=\"elevatezoom_gallery\" href=\"<?= \$col->href ?>\"<?= \$col->attributes ?> title=\"<?= \$col->alt ?>\">
\t\t<?php endif; ?>
\t\t<img id=\"elevatezoom_image_gallery_<?php echo \$this->id; ?>\" data-zoom-image=\"<?php echo \$col->singleSRC; ?>\" src=\"<?php echo \$col->singleSRC; ?>\"<?php echo \$col->imgSize; ?> alt=\"<?php echo \$col->alt; ?>\" title=\"<?php echo \$col->caption; ?>\">
\t\t<?php if(\$col->href) :?>
\t\t</a>
\t\t<?php endif; ?>
\t<?php endif; ?>
<?php endif; ?>
<?php \$i++; ?>
<?php endforeach; ?>
<?php endforeach; ?>
</div>

<div id=\"elevatezoom_gallery_<?php echo \$this->id; ?>\" class=\"elevatezoom_gallery gallery\">
\t<ul class=\"cols_<?php echo \$this->perRow; ?>\" id=\"gallery_<?php echo \$this->id; ?>\" itemscope itemtype=\"http://schema.org/ImageGallery\">
<?php foreach (\$this->body as \$class=>\$row): ?>
<?php foreach (\$row as \$i => \$col): ?>
<?php 
if( !isset(\$col->href) )
{
\t\$col->href = '';
}
if( !isset(\$col->caption) )
{
\t\$col->caption = '';
}
?>
<?php if (\$col->addImage && \$col->src): ?>
\t<li class=\"entry row<?php echo \$this->perRow; ?>\" itemscope itemtype=\"http://schema.org/ImageObject\">
\t<a class=\"elevatezoom_gallery button\" href=\"<?= \$col->href ?: '#' ?>\" title=\"<?= \$col->alt ?>\" data-image=\"<?php echo \$col->singleSRC; ?>\" data-zoom-image=\"<?php echo \$col->singleSRC; ?>\" itemprop=\"contentUrl\">
\t\t<img src=\"<?php echo \$col->src; ?>\"<?php echo \$col->imgSize; ?> alt=\"<?php echo \$col->alt; ?>\" title=\"<?php echo \$col->caption; ?>\">
\t</a>
\t</li>
<?php endif; ?>
<?php endforeach; ?>
<?php endforeach; ?>
\t</ul>
</div>
<!-- SEO-SCRIPT-START -->
<script>
/**
 * Activate the zoom
 * See: http://www.elevateweb.co.uk/image-zoom/examples
 */
jQuery(document).ready(function() 
{
\tif( !jQuery('body').hasClass('viewport_mobile') )
\t{
\t\tjQuery('#elevatezoom_image_gallery_<?php echo \$this->id; ?>').elevateZoom(
\t\t{
\t\t   gallery:'elevatezoom_gallery_<?php echo \$this->id; ?>', 
\t\t   galleryActiveClass: 'active', 
\t\t   responsive: true,
\t\t   cursor: 'pointer',
\t\t   imageCrossfade: true,
\t\t   zoomType\t: \"lens\",
\t\t   lensShape : \"round\",
\t\t   lensSize : 200
\t\t});
\t}
});
</script>
<!-- SEO-SCRIPT-STOP -->
<script>
jQuery(document).ready(function() 
{
\tjQuery('#elevatezoom_gallery_<?php echo \$this->id; ?> a').click(function(e)
\t{
\t\te.preventDefault();
\t\tjQuery('#elevatezoom_image_gallery_<?php echo \$this->id; ?>_window').attr('href', jQuery(this).data('zoom-image') );
\t\tjQuery('#elevatezoom_image_gallery_<?php echo \$this->id; ?>').attr('src', jQuery(this).data('zoom-image') );
\t});
});
</script>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/gallery/gallery_elevatezoom.html5";
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
        return new Source("", "@pct_theme_templates/gallery/gallery_elevatezoom.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/gallery/gallery_elevatezoom.html5");
    }
}
