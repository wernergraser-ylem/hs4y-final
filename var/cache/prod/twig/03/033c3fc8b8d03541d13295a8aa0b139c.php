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

/* @pct_theme_templates/gallery/gallery_default_borders.html5 */
class __TwigTemplate_4cb1390bdf9befce21a47681daaa781a extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/gallery/ce_gallery.css|static';
?>
<ul class=\"cols_<?php echo \$this->perRow; ?> borders flex-gallery\" itemscope itemtype=\"http://schema.org/ImageGallery\">
  <?php foreach (\$this->body as \$class=>\$row): ?>
    <?php foreach (\$row as \$col): ?>
      <?php 
      foreach(array('href','caption','class','margin','linkTitle','attributes','alt','addImage') as \$f)
      {
        if( !isset(\$col->{\$f}) )
        {
          \$col->{\$f} = '';
        }
      }
      ?>
      <?php if (\$col->addImage): ?>
        <li class=\"entry row<?= \$this->perRow; ?><?php if(\$col->class): ?> <?php echo \$col->class; ?><?php endif; ?>\">
          <figure class=\"image_container\"<?php if (\$col->margin): ?> style=\"<?php echo \$col->margin; ?>\"<?php endif; ?> itemscope itemtype=\"http://schema.org/ImageObject\">
            <?php if (\$col->href): ?>
              <a href=\"<?php echo \$col->href; ?>\"<?php echo \$col->attributes; ?> title=\"<?= \$col->linkTitle ?: \$col->alt; ?>\" itemprop=\"contentUrl\"><?php \$this->insert('picture_default', \$col->picture); ?></a>
            <?php else: ?>
              <?php \$this->insert('picture_default', \$col->picture); ?>
            <?php endif; ?>
            <?php if (\$col->caption): ?>
              <figcaption class=\"caption\" style=\"width:<?php echo \$col->arrSize[0]; ?>px\" itemprop=\"caption\"><?php echo \$col->caption; ?></figcaption>
            <?php endif; ?>
          </figure>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</ul>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/gallery/gallery_default_borders.html5";
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
        return new Source("", "@pct_theme_templates/gallery/gallery_default_borders.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/gallery/gallery_default_borders.html5");
    }
}
