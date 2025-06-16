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

/* @pct_theme_templates/customelements/customelement_bgimage_start.html5 */
class __TwigTemplate_d94d9905d974aacf1dfe8a45fc2fbc01 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_bgimage.css|static';
if(\$this->field('parallax')->value())
{
\t\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/parallax/jquery.stellar.min.js|static';
}
?>
<!-- SEO-SCRIPT-START -->
<script>
<?php if(\$this->field('fullscreen-image')->value()): ?>
function bgImageFullscreen_<?php echo \$this->id; ?>() {
\tvar windowHeight = jQuery(window).height();
\tvar mobHeaderHeight = jQuery('.header.cloned').height();

\tif (jQuery(window).width() < 768)
\t{
\t\tvar setNewHeightMobile = windowHeight - mobHeaderHeight;
\t\tjQuery('.ce_bgimage_<?php echo \$this->id; ?>').height(setNewHeightMobile);

\t} else {
\t\t<?php if(\$this->field('offset')->value()): ?>
\t\t\tvar offsetHeight_<?php echo \$this->id; ?> = jQuery('<?php echo \$this->field('offset')->value(); ?>').height();
\t\t\tvar setNewHeight_<?php echo \$this->id; ?> = windowHeight - offsetHeight_<?php echo \$this->id; ?>;
\t\t\tjQuery('.ce_bgimage_<?php echo \$this->id; ?>').height(setNewHeight_<?php echo \$this->id; ?>);
\t\t<?php else: ?>
\t\t\tjQuery('.ce_bgimage_<?php echo \$this->id; ?>').height(windowHeight);
\t\t<?php endif; ?>
\t}
};

jQuery(document).ready(function()
{
\tif( jQuery('body').hasClass('mobile') )
\t{
\t\tsetTimeout(function() 
\t\t{ 
\t\t\tbgImageFullscreen_<?php echo \$this->id; ?>() 
\t\t}, 100);\t
\t}
\telse
\t{
\t\tbgImageFullscreen_<?php echo \$this->id; ?>();
\t}\t\t
\t
});

jQuery(window).on(\"resize\", function(){
\tbgImageFullscreen_<?php echo \$this->id; ?>();
});

<?php endif; ?>

function oversize_<?php echo \$this->id; ?>() {

\tvar contentHeight_<?php echo \$this->id; ?> = jQuery('.ce_bgimage_<?php echo \$this->id; ?> .ce_bgimage-inside').height();
\tvar availableHeight = jQuery(window).height() - 100;

\tif (contentHeight_<?php echo \$this->id; ?> > availableHeight)
\t{
\t\tjQuery('.ce_bgimage_<?php echo \$this->id; ?>').addClass('oversize');

\t} else {
\t\tjQuery('.ce_bgimage_<?php echo \$this->id; ?>').removeClass('oversize');
\t}
};

jQuery(document).ready(function(){
    setTimeout(function(){
        oversize_<?php echo \$this->id; ?>();
    }, 500);
});

jQuery(window).on(\"resize\", function(){
\toversize_<?php echo \$this->id; ?>();
});
</script>
<!-- SEO-SCRIPT-STOP -->

<?php
if(\$this->field('mobile_height')->value())
{
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_bgimage_\" . \$this->id  . \" {height:\" . \$this->field('mobile_height')->value() . \"px!important;}}</style>\";
}
?>

<?php // responsive images
\$container = \\Contao\\System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();

\$objFile = \\Contao\\FilesModel::findByPk( \$this->field('image')->value() );
\$size = \\Contao\\StringUtil::deserialize( \$this->field('image')->option('size') );
\$strImage = \$this->field('image')->generate();
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
\t\t\t\$arrMediaQueries[] = '@media '.\$data['media'].' { .ce_bgimage_'.\$this->id.' > .ce_bgimage-image { background-image:url('.\$data['src'].') !important; } }';
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
\tif( count(\$arrMediaQueries) > 0 )
\t{
\t\t\$GLOBALS['TL_HEAD'][] = '<style>'.implode(\"\\n\",\$arrMediaQueries).'</style>';
\t}
}
?>

<?php 
\$offset_color = '';
if( \$this->field('offset_color')->value() )
{
\t// compile color
\t\$color = \$this->field('offset_color')->attribute()->compileColor( \$this->field('offset_color')->value() );
\t\$offset_color = \$color->rgba;
}
\$bg_owncolor = '';
if( \$this->field('bg_owncolor')->value() )
{
\t// compile color
\t\$color = \$this->field('bg_owncolor')->attribute()->compileColor( \$this->field('bg_owncolor')->value() );
\t\$bg_owncolor = \$color->rgba;
}
?>

<div class=\"<?php echo \$this->class; ?> block ce_bgimage_<?php echo \$this->id; ?> boxed-content <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('bg_color')->value(); ?><?php if(\$this->field('parallax')->value()): ?> parallax<?php endif; ?><?php if(\$this->field('invert')->value()): ?> color-white<?php endif; ?><?php if(\$this->field('fullscreen-image')->value()): ?> fullscreen-image<?php endif; ?><?php if(\$this->field('bg_contain')->value()): ?> bg_contain<?php endif; ?><?php if(\$this->field('vertical_centered')->value()): ?> vertical_centered<?php endif; ?><?php if(\$this->field('bg_position')->value()): ?> <?php echo \$this->field('bg_position')->value(); ?><?php endif; ?><?php if(\$this->field('hide_mobile')->value()): ?> bg-hide-mobile<?php endif; ?><?php if(\$this->field('max_width')->value()): ?> <?php echo \$this->field('max_width')->value(); ?><?php endif; ?>\" style=\"<?php if(\$this->field('height')->value()): ?> height:<?php echo \$this->field('height')->value(); ?>px;<?php endif; ?><?php if(\$this->field('bg_owncolor')->value()): ?>background-color:<?php echo \$bg_owncolor; ?>;<?php endif; ?><?php if (\$this->style): ?><?php echo \$this->style; ?><?php endif; ?>\"<?php echo \$this->cssID; ?>>
\t<?php if(\$this->field('image')->value()): ?>
\t<div class=\"ce_bgimage-image\" style=\"<?php if(\$this->field('image')->value()): ?>background-image: url(<?= \$strImage; ?>);<?php endif; ?>\"<?php if(\$this->field('parallax')->value()): ?> data-stellar-background-ratio=\"0.1\" data-stellar-offset-parent=\"true\"<?php endif; ?>></div>
\t<?php endif; ?>
\t<div class=\"ce_bgimage-outer\">
\t<?php if(\$this->field('offset_layer')->value() != 'no-offset-layer'): ?><div class=\"offset_layer <?php echo \$this->field('offset_layer')->value(); ?>\" style=\"background-color:<?= \$offset_color; ?>;height:<?php echo \$this->field('offset_height')->value(); ?>%\"></div><?php endif; ?>
\t\t<div class=\"ce_bgimage-inside contentwrap<?php if(\$this->field('padding_top_class')->value()): ?> <?php echo \$this->field('padding_top_class')->value(); ?><?php endif; ?><?php if(\$this->field('padding_bottom_class')->value()): ?> <?php echo \$this->field('padding_bottom_class')->value(); ?><?php endif; ?>\">
\t\t\t<?php if(\$this->field('schema')->value() != 'img-as-bg'): ?><div class=\"mobile_image\" style=\"display: none\"><?php echo \$this->field('image')->html(); ?></div><?php endif; ?>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_bgimage_start.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_bgimage_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_bgimage_start.html5");
    }
}
