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

/* @pct_theme_templates/customelements/customelement_headerimage.html5 */
class __TwigTemplate_385b2dee81679ff8e60008725810c033 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_headerimage.css|static';

\$container = \\Contao\\System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();

\$strImage = \$this->field('image')->generate();

// responsive images
\$objFile = \\Contao\\FilesModel::findByPk( \$this->field('image')->value() );
\$size = \\Contao\\StringUtil::deserialize( \$this->field('image')->option('size') );\t
if( \$objFile !== null && is_array(\$size) )
{
\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t
\t\$arrMediaQueries = array();
\tif( \$objPicture !== null && !empty(\$sources) )
\t{
\t\tforeach(\$sources ?: array() as \$data)
\t\t{
\t\t\tif( !isset(\$data['media']) || strlen(\$data['media']) < 1 )
\t\t\t{
\t\t\t\tcontinue;
\t\t\t}
\t\t\t\$arrMediaQueries[] = '@media '.\$data['media'].' { .ce_headerimage_'.\$this->id.' { background-image:url('.\$data['src'].') !important; } }';
\t\t}
\t\t// look up prefered source image file (not media query)
\t\tforeach(\$sources ?: array() as \$data)
\t\t{
\t\t\tif( (isset(\$data['src']) && \$data['src']) != \$strImage && (!isset(\$data['media']) || strlen(\$data['media']) < 1) )
\t\t\t{
\t\t\t\t\$strImage = \$data['src'];
\t\t\t}
\t\t}
\t}
\t
\tif( count(\$arrMediaQueries) > 0 )
\t{
\t\t\$GLOBALS['TL_HEAD'][] = '<style>'.implode(\"\\n\",\$arrMediaQueries).'</style>';
\t}\t
}
?>
<div class=\"<?php echo \$this->class; ?> ce_headerimage_<?php echo \$this->id;?> block <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('height_preset')->value(); ?> <?php echo \$this->field('align')->value(); ?> <?php echo \$this->field('valign')->value(); ?><?php if(\$this->field('invert')->value()): ?> color-white<?php endif; ?><?php if(\$this->field('img_align')->value()): ?> <?php echo \$this->field('img_align')->value(); ?><?php endif; ?>\" <?php echo \$this->cssID; ?> style=\"background-image: url(<?= \$strImage; ?>);<?php if(\$this->field('height')->value()): ?>height:<?php echo \$this->field('height')->value(); ?>px;<?php endif; ?>\">
\t<div class=\"ce_headerimage_inside\">
\t\t<?php if(\$this->field('headline')->value() || \$this->field('subheadline')->value()): ?><div class=\"content\"><?php endif; ?>
\t\t\t<?php if(\$this->field('headline')->value()): ?><?php echo \$this->field('headline')->html(); ?><?php endif; ?>
\t\t\t<?php if(\$this->field('subheadline')->value()): ?><div class=\"subline\"><?php echo \$this->field('subheadline')->value(); ?></div><?php endif; ?>
\t\t<?php if(\$this->field('headline')->value() || \$this->field('subheadline')->value()): ?></div><?php endif; ?>
\t</div>
</div>
<?php 
if(\$this->field('mobile_height')->value())
\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_headerimage_\" . \$this->id  . \" {height:\" . \$this->field('mobile_height')->value() . \"px!important;}}</style>\"
?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_headerimage.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_headerimage.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_headerimage.html5");
    }
}
