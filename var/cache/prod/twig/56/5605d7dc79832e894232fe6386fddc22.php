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

/* @pct_theme_templates/customelements/customelement_grid_gallery_image.html5 */
class __TwigTemplate_502dec9622bd18b14ebec011ebad059d extends Template
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
\$container = \\Contao\\System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();

\$file = \\Contao\\FilesModel::findByPk( \$this->field('image')->value() );
\$meta = array();

\$strImage = \$this->field('image')->generate();
if( \$file !== null )
{
\t\$tmp = \\Contao\\StringUtil::deserialize( \$file->meta );
\tif( isset(\$tmp[ \$GLOBALS['TL_LANGUAGE'] ]) )
\t{
\t\t\$meta = \$tmp[ \$GLOBALS['TL_LANGUAGE'] ];
\t}
\tunset(\$tmp);
\t
\t\$size = \\Contao\\StringUtil::deserialize( \$this->field('image')->option('size') );
\tif( is_array(\$size) )
\t{
\t\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$file->path, \$size);
\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\tif( \$objPicture !== null && !empty(\$sources) )
\t\t{
\t\t\t// look up prefered source image file (not media query)
\t\t\tforeach(\$sources ?: array() as \$data)
\t\t\t{
\t\t\t\tif( (isset(\$data['src']) && \$data['src']) != \$strImage && (!isset(\$data['media']) || strlen(\$data['media']) < 1) )
\t\t\t\t{
\t\t\t\t\t\$strImage = \$data['src'];
\t\t\t\t}
\t\t\t}
\t\t}
\t}
}
if( \$this->field('image')->option('alt') )
{
\t\$meta['alt'] = \$this->field('image')->option('alt');
}
if( \$this->field('image')->option('title') )
{
\t\$meta['title'] = \$this->field('image')->option('title');
}
?>
<li <?= \$this->cssID; ?> class=\"grid-item <?= \$this->class; ?> <?php echo \$this->field('style')->value(); ?><?php if(\$this->field('valign')->value()): ?> <?php echo \$this->field('valign')->value(); ?><?php endif; ?><?php if(\$this->field('halign')->value()): ?> <?php echo \$this->field('halign')->value(); ?><?php endif; ?><?php if(\$this->field('image_height')->value()): ?> <?php echo \$this->field('image_height')->value(); ?><?php endif; ?><?php if(\$this->field('image_width')->value()): ?> <?php echo \$this->field('image_width')->value(); ?><?php endif; ?><?php if(\$this->field('desc')->value()): ?> has-content<?php endif; ?><?php if(\$this->field('invert')->value()): ?> color-white<?php endif; ?><?php if(\$this->field('image')->value() ==''): ?> no-background-image<?php endif; ?>\"<?php if(\$this->field('image')->value()): ?> style=\"background-image: url(<?= \$strImage; ?>)\"<?php endif; ?>>
<?php if(\$this->field('lightbox')->value() && !\$this->field('link')->value()): ?>
<a href=\"<?= \$file->path ?? ''; ?>\" data-lightbox=\"grid-gallery_<?php echo \$GLOBALS['grid_gallery_start_id']; ?>\" class=\"lightbox-link\"<?php if(isset(\$meta['title'])): ?> title=\"<?= \$meta['title']; ?>\"<?php endif; ?>>
<?php endif; ?>
<?php if(\$this->field('link')->value()): ?>
<a href=\"<?php echo \$this->field('link')->value(); ?>\" class=\"lightbox-link\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>>
<?php endif; ?>
<?php if(\$this->field('lightbox')->value() || \$this->field('link')->value() || \$this->field('title')->value() || \$this->field('desc')->value()): ?>
<div class=\"ce_grid_gallery_overlay\">
\t<div class=\"ce_grid_gallery_overlay_inside\">
\t<?php if(\$this->field('lightbox')->value() || \$this->field('link')->value()): ?><i></i><?php endif; ?>
<?php endif; ?>
<?php if(\$this->field('title')->value()): ?><div class=\"title font_headline <?php if(\$this->field('title_size')->value()): ?><?php echo \$this->field('title_size')->value(); ?><?php else: ?>font-size-s<?php endif; ?>\"><?php echo \$this->field('title')->html(); ?></div><?php endif; ?>
<?php if(\$this->field('desc')->value()): ?><div class=\"desc <?php echo \$this->field('text_size')->value(); ?>\"><?php echo \$this->field('desc')->html(); ?></div><?php endif; ?>
<?php if(\$this->field('link')->option('linkText')): ?><div class=\"linktext <?php echo \$this->field('text_size')->value(); ?>\"><?php echo \$this->field('link')->option('linkText'); ?></div><?php endif; ?>
<?php if(\$this->field('lightbox')->value() || \$this->field('link')->value() || \$this->field('title')->value() || \$this->field('desc')->value()): ?>
\t</div>
</div>
<?php endif; ?>
<?php if(\$this->field('link')->value() || \$this->field('lightbox')->value()): ?></a><?php endif; ?>
</li>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_grid_gallery_image.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_grid_gallery_image.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_grid_gallery_image.html5");
    }
}
