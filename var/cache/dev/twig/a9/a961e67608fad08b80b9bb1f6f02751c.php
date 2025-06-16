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

/* @pct_theme_templates/gallery/gallery_default_video.html5 */
class __TwigTemplate_d84f192d9b95446dbf70902d88b279c9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/gallery/gallery_default_video.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/gallery/gallery_default_video.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/gallery/ce_gallery.css|static';
?>

<ul class=\"cols_<?php echo \$this->perRow; ?> flex-gallery\" id=\"gallery_<?php echo \$this->id; ?>\" itemscope itemtype=\"http://schema.org/ImageGallery\">

<?php 
\$intItem = 0;
   ?>
  <?php foreach (\$this->body as \$class=>\$row): ?>
    <?php foreach (\$row as \$col): ?>
\t<?php 
      foreach(array('href','caption','class','margin','linkTitle','attributes','alt','addImage') as \$f)
      {
        if( !isset(\$col->{\$f}) )
        {
          \$col->{\$f} = '';
        }
      }
      ?>
      <?php if (\$col->addImage): ?>
        <li class=\"entry row<?php echo \$this->perRow; ?><?php if(\$col->class): ?> <?php echo \$col->class; ?><?php endif; ?>\">
       \t <figure class=\"image_container\" itemscope itemtype=\"http://schema.org/ImageObject\">

            <?php \$this->insert('picture_default', \$col->picture); ?>
\t\t\t
\t\t\t<?php 
\t\t\t\$itemId = \$this->id.'_'.\$intItem;
\t\t\t\$isVideo = false;
\t        if( in_array(\\pathinfo(\$col->href,PATHINFO_EXTENSION), array('mp4','mov','ogv','webm')) )
\t\t\t{
\t\t\t\t\$isVideo = true;
\t\t\t}
\t\t\t?>
\t\t\t
\t\t\t<?php if (\$col->href): ?>
            <a href=\"<?php echo \$col->href; ?>\" class=\"gallery_link_<?= \$itemId; ?><?= \$isVideo ? '_video' : ''; ?>\" <?= \$col->attributes; ?> title=\"<?php echo \$col->alt; ?>\" itemprop=\"contentUrl\">
            <?php endif; ?>

            <?php if (\$col->href || \$col->caption): ?>
            <div class=\"content\">
\t            <div class=\"content-outside\">
\t\t        \t<div class=\"content-inside\">
\t\t\t\t\t\t<div class=\"capt\" itemprop=\"caption\"><?php echo \$col->caption; ?></div>
\t\t\t\t\t<?php if (strlen(\$col->href) > 0 && strlen(\$col->caption) < 1): ?>
\t\t\t\t\t\t<i class=\"fa <?= \$isVideo ? 'fa-play-circle': 'fa-plus-circle'; ?> fa-3x\"></i>
\t\t\t\t   \t<?php endif; ?>
\t\t            </div>
\t            </div>
            </div>
            <?php endif; ?>

            <?php if (\$col->href): ?>
            </a>
            <?php endif; ?>
            
            <?php 
\t        if( \$isVideo ): ?>
           <div style='display:none'>
\t\t\t    <div id=\"inlinevideocontent_<?= \$itemId ; ?>\" class=\"inlinevideocontent\">
\t\t\t        <video id=\"video_<?= \$itemId; ?>\" class=\"video\" controls autoplay>
\t\t\t\t\t\t<source src=\"<?= \$col->href; ?>\" type=\"video/mp4\">
\t\t\t\t\t</video>
\t\t\t    </div>
\t\t\t</div>
\t\t\t<!-- SEO-SCRIPT-START -->
\t\t\t<script>
\t\t\tvar arrVideos = [];
\t\t\tjQuery(document).ready(function()
\t\t\t{
\t\t\t\tvar video =  document.getElementById(\"video_<?= \$itemId; ?>\");
\t\t\t\tarrVideos.push(\"video_<?= \$itemId; ?>\");
\t\t\t\tif( jQuery(video).attr('autoplay') )
\t\t\t\t{
\t\t\t\t\tvideo.muted = true;
\t\t\t\t}
\t\t\t\t
\t\t\t\tjQuery('.gallery_link_<?= \$itemId; ?>_video').colorbox(
\t\t\t\t{
\t\t\t\t\trel:\"gallery<?= \$this->id; ?>\",\tinline:true, width:\"80%\", height:\"auto\", maxWidth:\"900px\",href:\"#inlinevideocontent_<?= \$itemId ; ?>\",
\t\t\t\t\tonComplete: function()
\t\t\t\t\t{
\t\t\t\t\t\t// pause other videos
\t\t\t\t\t\tjQuery.each(arrVideos, function(i,elem) 
\t\t\t\t\t\t{
\t\t\t\t\t\t\tdocument.getElementById(elem).pause();
\t\t\t\t\t\t});
\t\t\t\t\t\t
\t\t\t\t\t\tvideo = jQuery('#video_<?= \$itemId; ?>')[0];
\t\t\t\t\t\tif( jQuery(video).attr('autoplay') )
\t\t\t\t\t\t{
\t\t\t\t\t\t\tvideo.muted = false;
\t\t\t\t\t\t\tvideo.play();
\t\t\t\t\t\t}
\t\t\t\t\t},
\t\t\t\t\tonClosed: function()
\t\t\t\t\t{
\t\t\t\t\t\tvideo.pause();
\t\t\t\t\t}
\t\t\t\t});
\t\t\t});
\t\t\t</script>
\t\t\t<!-- SEO-SCRIPT-STOP -->
\t\t\t<?php endif; ?>
\t\t\t
          </figure>
        </li>
      <?php endif; ?>
      <?php \$intItem++; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</ul>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\tjQuery('.gallery_link_<?= \$this->id; ?>').removeAttr('data-lightbox');
\tjQuery('.gallery_link_<?= \$this->id; ?>').colorbox({rel:\"gallery<?= \$this->id; ?>\"});
});
</script>
<!-- SEO-SCRIPT-STOP -->
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/gallery/gallery_default_video.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/gallery/ce_gallery.css|static';
?>

<ul class=\"cols_<?php echo \$this->perRow; ?> flex-gallery\" id=\"gallery_<?php echo \$this->id; ?>\" itemscope itemtype=\"http://schema.org/ImageGallery\">

<?php 
\$intItem = 0;
   ?>
  <?php foreach (\$this->body as \$class=>\$row): ?>
    <?php foreach (\$row as \$col): ?>
\t<?php 
      foreach(array('href','caption','class','margin','linkTitle','attributes','alt','addImage') as \$f)
      {
        if( !isset(\$col->{\$f}) )
        {
          \$col->{\$f} = '';
        }
      }
      ?>
      <?php if (\$col->addImage): ?>
        <li class=\"entry row<?php echo \$this->perRow; ?><?php if(\$col->class): ?> <?php echo \$col->class; ?><?php endif; ?>\">
       \t <figure class=\"image_container\" itemscope itemtype=\"http://schema.org/ImageObject\">

            <?php \$this->insert('picture_default', \$col->picture); ?>
\t\t\t
\t\t\t<?php 
\t\t\t\$itemId = \$this->id.'_'.\$intItem;
\t\t\t\$isVideo = false;
\t        if( in_array(\\pathinfo(\$col->href,PATHINFO_EXTENSION), array('mp4','mov','ogv','webm')) )
\t\t\t{
\t\t\t\t\$isVideo = true;
\t\t\t}
\t\t\t?>
\t\t\t
\t\t\t<?php if (\$col->href): ?>
            <a href=\"<?php echo \$col->href; ?>\" class=\"gallery_link_<?= \$itemId; ?><?= \$isVideo ? '_video' : ''; ?>\" <?= \$col->attributes; ?> title=\"<?php echo \$col->alt; ?>\" itemprop=\"contentUrl\">
            <?php endif; ?>

            <?php if (\$col->href || \$col->caption): ?>
            <div class=\"content\">
\t            <div class=\"content-outside\">
\t\t        \t<div class=\"content-inside\">
\t\t\t\t\t\t<div class=\"capt\" itemprop=\"caption\"><?php echo \$col->caption; ?></div>
\t\t\t\t\t<?php if (strlen(\$col->href) > 0 && strlen(\$col->caption) < 1): ?>
\t\t\t\t\t\t<i class=\"fa <?= \$isVideo ? 'fa-play-circle': 'fa-plus-circle'; ?> fa-3x\"></i>
\t\t\t\t   \t<?php endif; ?>
\t\t            </div>
\t            </div>
            </div>
            <?php endif; ?>

            <?php if (\$col->href): ?>
            </a>
            <?php endif; ?>
            
            <?php 
\t        if( \$isVideo ): ?>
           <div style='display:none'>
\t\t\t    <div id=\"inlinevideocontent_<?= \$itemId ; ?>\" class=\"inlinevideocontent\">
\t\t\t        <video id=\"video_<?= \$itemId; ?>\" class=\"video\" controls autoplay>
\t\t\t\t\t\t<source src=\"<?= \$col->href; ?>\" type=\"video/mp4\">
\t\t\t\t\t</video>
\t\t\t    </div>
\t\t\t</div>
\t\t\t<!-- SEO-SCRIPT-START -->
\t\t\t<script>
\t\t\tvar arrVideos = [];
\t\t\tjQuery(document).ready(function()
\t\t\t{
\t\t\t\tvar video =  document.getElementById(\"video_<?= \$itemId; ?>\");
\t\t\t\tarrVideos.push(\"video_<?= \$itemId; ?>\");
\t\t\t\tif( jQuery(video).attr('autoplay') )
\t\t\t\t{
\t\t\t\t\tvideo.muted = true;
\t\t\t\t}
\t\t\t\t
\t\t\t\tjQuery('.gallery_link_<?= \$itemId; ?>_video').colorbox(
\t\t\t\t{
\t\t\t\t\trel:\"gallery<?= \$this->id; ?>\",\tinline:true, width:\"80%\", height:\"auto\", maxWidth:\"900px\",href:\"#inlinevideocontent_<?= \$itemId ; ?>\",
\t\t\t\t\tonComplete: function()
\t\t\t\t\t{
\t\t\t\t\t\t// pause other videos
\t\t\t\t\t\tjQuery.each(arrVideos, function(i,elem) 
\t\t\t\t\t\t{
\t\t\t\t\t\t\tdocument.getElementById(elem).pause();
\t\t\t\t\t\t});
\t\t\t\t\t\t
\t\t\t\t\t\tvideo = jQuery('#video_<?= \$itemId; ?>')[0];
\t\t\t\t\t\tif( jQuery(video).attr('autoplay') )
\t\t\t\t\t\t{
\t\t\t\t\t\t\tvideo.muted = false;
\t\t\t\t\t\t\tvideo.play();
\t\t\t\t\t\t}
\t\t\t\t\t},
\t\t\t\t\tonClosed: function()
\t\t\t\t\t{
\t\t\t\t\t\tvideo.pause();
\t\t\t\t\t}
\t\t\t\t});
\t\t\t});
\t\t\t</script>
\t\t\t<!-- SEO-SCRIPT-STOP -->
\t\t\t<?php endif; ?>
\t\t\t
          </figure>
        </li>
      <?php endif; ?>
      <?php \$intItem++; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</ul>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\tjQuery('.gallery_link_<?= \$this->id; ?>').removeAttr('data-lightbox');
\tjQuery('.gallery_link_<?= \$this->id; ?>').colorbox({rel:\"gallery<?= \$this->id; ?>\"});
});
</script>
<!-- SEO-SCRIPT-STOP -->
", "@pct_theme_templates/gallery/gallery_default_video.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/gallery/gallery_default_video.html5");
    }
}
