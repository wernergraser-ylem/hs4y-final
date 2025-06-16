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

/* @pct_theme_templates/customelements/customelement_text_image_bar.html5 */
class __TwigTemplate_b7ffa14d9efb53611031d182e251ab7b extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_text_image_bar.css|static';

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
\t\tforeach(\$sources as \$data)
\t\t{
\t\t\tif( !isset(\$data['media']) || strlen(\$data['media']) < 1 )
\t\t\t{
\t\t\t\tcontinue;
\t\t\t}
\t\t\t\$arrMediaQueries[] = '@media '.\$data['media'].' { .ce_text_image_bar_'.\$this->id.' .res-image { background-image:url('.\$data['src'].') !important; } }';
\t\t}
\t\t
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

\$bg_color_own = '';
if( \$this->field('own_color')->value() )
{
\t// compile color
\t\$color = \$this->field('own_color')->attribute()->compileColor( \$this->field('own_color')->value() );
\t\$bg_color_own = \$color->rgba;
}
?>
<div class=\"<?php echo \$this->class; ?> ce_text_image_bar_<?php echo \$this->id;?> <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('bg_color')->value(); ?> <?php echo \$this->field('color')->value(); ?> block<?php if(\$this->field('show_arrow')->value()): ?> show-arrow<?php endif; ?><?php if(\$this->field('mob_pos')->value()): ?> <?php echo \$this->field('mob_pos')->value(); ?><?php endif; ?>\"<?php echo \$this->cssID; ?> style=\"<?php if(\$this->field('own_color')->value()): ?>background-color:<?= \$bg_color_own; ?>;<?php endif; ?><?php if (\$this->style): ?><?php echo \$this->style; ?><?php endif; ?>\">
\t\t<div class=\"inside\">
\t\t\t<div class=\"textbox\"<?php if(\$this->field('height')->value()): ?> style=\"height:<?php echo \$this->field('height')->value(); ?>px\"<?php endif; ?>>
\t\t\t\t<div class=\"text-table\">
\t\t\t\t\t<div class=\"text-cell\">
\t\t\t\t\t\t<?php if(\$this->field('subheadline')->value()): ?><div class=\"subheadline\"><?php echo \$this->field('subheadline')->value(); ?></div><?php endif; ?>
\t\t\t\t\t\t<?php if(\$this->field('headline')->value()): ?><?php echo \$this->field('headline')->html(); ?><?php endif; ?>
\t\t\t\t\t\t<?php if(\$this->field('text')->value()): ?><?php echo \$this->field('text')->html(); ?><?php endif; ?>
\t\t\t\t\t\t<?php if(\$this->field('link')->value()): ?><div class=\"ce_hyperlink\"><?php echo \$this->field('link')->html(); ?></div><?php endif; ?>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"imagebox res-image\" style=\"background-image: url(<?= \$strImage; ?>);\">
\t\t\t<?php if(\$this->field('show_arrow')->value()): ?><div class=\"arrow <?php echo \$this->field('bg_color')->value(); ?>\"<?php if(\$this->field('own_color')->value()): ?> style=\"background-color:<?= \$bg_color_own; ?>\"<?php endif; ?>></div><?php endif; ?>
\t\t\t</div>
\t\t\t<div class=\"mobile_image\"><?php echo \$this->field('image')->html(); ?></div>
\t\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
function imagebarHeight() {
\tjQuery(\".ce_text_image_bar\").each(function() {
\t\tvar fixHeight = jQuery(this).height();
\t\tvar contentHeight = jQuery(this).find(\".text-table\").outerHeight();
\t\tif (contentHeight > fixHeight) {
\t\t\tjQuery(this).addClass(\"oversize\");
\t\t} else {
\t\t\tjQuery(this).removeClass(\"oversize\");
\t\t}
\t});
};

jQuery(document).ready(function(){
\timagebarHeight();
});

jQuery(window).on(\"resize\", function(){ 
\timagebarHeight(); 
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_text_image_bar.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_text_image_bar.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_text_image_bar.html5");
    }
}
