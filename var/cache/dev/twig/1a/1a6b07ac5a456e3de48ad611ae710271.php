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

/* @pct_theme_templates/customelements/customelement_calltoaction.html5 */
class __TwigTemplate_8738f49aa144c582f6539c2bac71539f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_calltoaction.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_calltoaction.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_calltoaction.css|static';

\$container = \\Contao\\System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();
\t
// responsive images
\$strImage = \$this->field('image')->generate();

\$objFile = \\Contao\\FilesModel::findByPk( \$this->field('image')->value() );
\$size = \\Contao\\StringUtil::deserialize( \$this->field('image')->option('size') );
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
\t\t\t\$arrMediaQueries[] = '@media '.\$data['media'].' { .ce_calltoaction_v2_'.\$this->id.' { background-image:url('.\$data['src'].') !important; } }';
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

\$bg_color = '';
if( \$this->field('bg_color')->value() )
{
\t// compile color
\t\$color = \$this->field('bg_color')->attribute()->compileColor( \$this->field('bg_color')->value() );
\t\$bg_color = \$color->rgba;
}
?>

<div class=\"<?php echo \$this->class; ?> ce_calltoaction_v2 ce_calltoaction_v2_<?php echo \$this->id; ?> block<?php if(\$this->field('invert')->value()): ?> color-white<?php endif; ?>\" <?php echo \$this->cssID; ?> style=\"<?php if(\$this->field('image')->value()): ?>background-image: url(<?= \$strImage; ?>);<?php endif; ?><?php if(\$this->field('bg_color')->value()): ?>background-color:<?= \$bg_color; ?>;<?php endif; ?><?php if (\$this->style): ?><?php echo \$this->style; ?><?php endif; ?>\">
\t<div class=\"ce_calltoaction_inside\">
\t\t<div class=\"ce_calltoaction_content\">
\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t<?php echo \$this->field('text')->html(); ?>
\t\t\t<div class=\"ce_hyperlink\"><?php echo \$this->field('link')->html(); ?></div>
\t\t</div>
\t</div>
</div>
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
        return "@pct_theme_templates/customelements/customelement_calltoaction.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_calltoaction.css|static';

\$container = \\Contao\\System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();
\t
// responsive images
\$strImage = \$this->field('image')->generate();

\$objFile = \\Contao\\FilesModel::findByPk( \$this->field('image')->value() );
\$size = \\Contao\\StringUtil::deserialize( \$this->field('image')->option('size') );
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
\t\t\t\$arrMediaQueries[] = '@media '.\$data['media'].' { .ce_calltoaction_v2_'.\$this->id.' { background-image:url('.\$data['src'].') !important; } }';
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

\$bg_color = '';
if( \$this->field('bg_color')->value() )
{
\t// compile color
\t\$color = \$this->field('bg_color')->attribute()->compileColor( \$this->field('bg_color')->value() );
\t\$bg_color = \$color->rgba;
}
?>

<div class=\"<?php echo \$this->class; ?> ce_calltoaction_v2 ce_calltoaction_v2_<?php echo \$this->id; ?> block<?php if(\$this->field('invert')->value()): ?> color-white<?php endif; ?>\" <?php echo \$this->cssID; ?> style=\"<?php if(\$this->field('image')->value()): ?>background-image: url(<?= \$strImage; ?>);<?php endif; ?><?php if(\$this->field('bg_color')->value()): ?>background-color:<?= \$bg_color; ?>;<?php endif; ?><?php if (\$this->style): ?><?php echo \$this->style; ?><?php endif; ?>\">
\t<div class=\"ce_calltoaction_inside\">
\t\t<div class=\"ce_calltoaction_content\">
\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t<?php echo \$this->field('text')->html(); ?>
\t\t\t<div class=\"ce_hyperlink\"><?php echo \$this->field('link')->html(); ?></div>
\t\t</div>
\t</div>
</div>
", "@pct_theme_templates/customelements/customelement_calltoaction.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_calltoaction.html5");
    }
}
