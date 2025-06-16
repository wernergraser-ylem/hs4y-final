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

/* @pct_theme_templates/gallery/gallery_default_margin.html5 */
class __TwigTemplate_6005df3888e961137321ee79a1de5dd0 extends Template
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
<ul class=\"cols_<?php echo \$this->perRow; ?> gallery-margin flex-gallery\" id=\"gallery_<?php echo \$this->id; ?>\" itemscope itemtype=\"http://schema.org/ImageGallery\">
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
       \t <figure class=\"image_container\" itemscope itemtype=\"http://schema.org/ImageObject\">

            <?php \$this->insert('picture_default', \$col->picture); ?>

            <?php if (\$col->href): ?>
            <a href=\"<?php echo \$col->href; ?>\"<?php echo \$col->attributes; ?> title=\"<?= \$col->linkTitle ?: \$col->alt; ?>\" itemprop=\"contentUrl\">
            <?php endif; ?>

            <?php if (\$col->href || \$col->caption): ?>
            <div class=\"content\">
\t            <div class=\"content-outside\">
\t\t        \t<div class=\"content-inside\">
\t\t\t\t\t\t<div class=\"capt\" itemprop=\"caption\"><?php echo \$col->caption; ?></div>
\t\t\t\t\t<?php if (strlen(\$col->href) > 0 && strlen(\$col->caption) < 1): ?>
\t\t\t\t\t\t<i class=\"fa fa-plus-circle fa-3x\"></i>
\t\t\t\t   \t<?php endif; ?>
\t\t            </div>
\t            </div>
            </div>
            <?php endif; ?>

            <?php if (\$col->href): ?>
            </a>
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
        return "@pct_theme_templates/gallery/gallery_default_margin.html5";
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
        return new Source("", "@pct_theme_templates/gallery/gallery_default_margin.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/gallery/gallery_default_margin.html5");
    }
}
