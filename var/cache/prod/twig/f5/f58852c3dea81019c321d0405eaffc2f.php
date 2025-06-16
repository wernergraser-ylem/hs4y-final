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

/* @pct_theme_templates/customelements/customelement_wrap_start.html5 */
class __TwigTemplate_ce60d372eec66f767b8f51f4fa44c468 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_wrap.css|static';

if( \$this->field('bg_position')->value() == \"parallax\" )
{
\t\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/parallax/jquery.stellar.min.js|static';
}

if (\$this->field('css_code')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_wrap_\" . \$this->id  . \"{\" . \$this->field('css_code')->value() . \"}</style>\";
}

if (\$this->field('css_code_mobile')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_wrap_\" . \$this->id  . \"{\" . \$this->field('css_code_mobile')->value() . \"}}</style>\";
}

?>

<?php // responsive images
\$objFile = \\Contao\\FilesModel::findByPk( \$this->field('image')->value() );
\$size = \\Contao\\StringUtil::deserialize( \$this->field('image')->option('size') );
\t
if( \$objFile !== null && is_array(\$size) )
{
\t\$container = \\Contao\\System::getContainer();
\t\$projectDir = \$container->getParameter('kernel.project_dir');
\t\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();
\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\t\$img = \$objPicture->getImg(\$projectDir, \$staticUrl);
\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\t\t\t\t
\t#\$objPicture = \\Contao\\Picture::create(\$objFile->path,\\Contao\\StringUtil::deserialize( \$this->field('image')->option('size') ) );
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
\t\t\t\$arrMediaQueries[] = '@media '.\$data['media'].' { .ce_wrap_'.\$this->id.' { background-image:url('.\$data['src'].') !important; } }';
\t\t}
\t}
\tif( count(\$arrMediaQueries) > 0 )
\t{
\t\t\$GLOBALS['TL_HEAD'][] = '<style>'.implode(\"\\n\",\$arrMediaQueries).'</style>';
\t}
}
// lightbox
\$lightbox = \$this->field('link')->option('lightbox');
if( \$this->field('link')->option('lightbox') )
{
\tif( strpos(\$lightbox, 'data-lightbox') !== false )
\t{
\t\t\$lightbox = str_replace('data-', '',\$lightbox);\t
\t}\t
\t\$lightbox = ' data-lightbox=\"'.\$lightbox.'\"';
}

// link
\$link = '<a href=\"'.\$this->field('link')->value().'\"'.(\$this->field('link')->option('target') && empty(\$lightbox) ? ' target=\"_blank\"':'').(\$this->field('link')->option('titleText') ? ' title=\"'.\$this->field('link')->option('titleText').'\"':'').( !empty(\$lightbox) ? \$lightbox : '' ).' class=\"wrap-link\">&nbsp;</a>';

// classes
\$arrCSS = array
(
\t\$this->field('bg_color_class')->value(),
\t\$this->field('padding_class')->value(),
\t\$this->field('bg_position')->value(),
\t\$this->field('bg_repeat')->value(),
\t\$this->field('bg_color_hover')->value(),
\t\$this->field('hover_color')->value(),
\t\$this->field('hover_shadow')->value(),
\t\$this->field('shadow')->value(),
\t\$this->field('border_radius')->value()
);
if( \$this->field('bg_position')->value() == \"parallax\" )
{
\t\$arrCSS[] = 'parallax';
}
\$classes = implode(' ',array_filter(array_unique(\$arrCSS)) );

// styles
\$arrStyles = array();
\$arrStyles['background-position'] = \$this->field('bg_position_custom')->value();
\$arrStyles['background-size'] = \$this->field('bg_size')->value();
\$arrStyles['padding'] = \$this->field('padding')->value();
if( \$this->field('bg_color')->value() )
{
\t// compile color
\t\$color = \$this->field('bg_color')->attribute()->compileColor( \$this->field('bg_color')->value() );
\t\$arrStyles['background-color'] = \$color->rgba;
}
if( \$this->field('image')->value() )
{
\t\$arrStyles['background-image'] = 'url('.\$this->field('image')->generate().')';
}

\$styles = '';
foreach(array_filter(\$arrStyles) as \$k => \$v) 
{
\t\$styles .= \$k.':'.\$v.';';
}
?>
<div class=\"<?=  \$this->class; ?> ce_wrap_<?php echo \$this->id; ?><?php if( !empty(\$classes) ): ?> <?= \$classes; ?><?php endif; ?>\" <?php if(\$this->field('bg_position')->value() == \"parallax\"): ?> data-stellar-background-ratio=\"0.1\" data-stellar-offset-parent=\"true\"<?php endif; ?><?=  \$this->cssID; ?> style=\"<?= \$styles; ?>\">
<?php if(\$this->field('link')->value()): ?> <?=  \$link; ?><?php endif; ?>
\t<div class=\"inside\">";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_wrap_start.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_wrap_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_wrap_start.html5");
    }
}
