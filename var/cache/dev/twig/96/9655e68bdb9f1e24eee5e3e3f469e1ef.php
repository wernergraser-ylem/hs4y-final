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

/* @pct_theme_templates/customelements/customelement_imagebox.html5 */
class __TwigTemplate_1716d1bc1efea4176bd5a8d04dad27b2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_imagebox.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_imagebox.html5"));

        // line 1
        yield "<?php 
namespace Contao;

\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_text_imagebox.css|static';

if(\$this->field('parallax')->value())
{
\t\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/parallax/jquery.stellar.min.js|static';
}
\$bg_color = '';
if( \$this->field('bg_color')->value() )
{
\t// compile color
\t\$color = \$this->field('bg_color')->attribute()->compileColor( \$this->field('bg_color')->value() );
\t\$bg_color = \$color->rgba;
}

\$container = System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();

\$strImage = \$this->field('image')->generate();
\$objFile = FilesModel::findByPk( \$this->field('image')->value() );
\$size = StringUtil::deserialize( \$this->field('image')->option('size') );
if ( \$objFile !== null && \\is_array(\$size) )
{
\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\tif( \$objPicture !== null )
\t{
\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\t// look up prefered source image file (not media query)
\t\tforeach(\$sources ?: array() as \$data)
\t\t{
\t\t\tif( (isset(\$data['src']) && \$data['src']) != \$strImage && (!isset(\$data['media']) || strlen(\$data['media']) < 1) )
\t\t\t{
\t\t\t\t\$strImage = \$data['src'];
\t\t\t}
\t\t}
\t}
}

?>
<div class=\"ce_text_imagebox<?php if (\$this->field('overlay')->value()): ?> overlay<?php endif; ?><?php if (\$this->field('parallax')->value()): ?> parallax<?php endif; ?> <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('width')->value(); ?> <?php echo \$this->field('version')->value(); ?> <?php echo \$this->field('align')->value(); ?> block <?php echo \$this->class; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<?php if (\$this->field('link')->value()): ?><a href=\"<?php echo \$this->field('link')->value(); ?>\" class=\"ce_text_imagebox_link\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('titleText')): ?> title=\"<?php echo \$this->field('link')->option('titleText'); ?>\"<?php endif; ?>><?php endif; ?>
\t<div class=\"ce_text_imagebox_image\" style=\"<?php if (\$this->field('bg_color')->value()): ?>background-color:<?= \$bg_color; ?>;<?php endif; ?><?php if (\$this->field('image')->value()): ?>background-image: url(<?= \$strImage; ?>);<?php endif; ?>height:<?php echo \$this->field('height')->value(); ?>px;\"<?php if(\$this->field('parallax')->value()): ?> data-stellar-background-ratio=\"0.1\" data-stellar-offset-parent=\"true\"<?php endif; ?>>
\t\t<?php if (\$this->field('headline')->value() || \$this->field('text')->value()) : ?>
\t\t<div class=\"inside\"<?php if (\$this->field('bg_color')->value()): ?> style=\"background-color:<?= \$bg_color; ?>\"<?php endif; ?>>
\t\t\t<div class=\"content<?php if (!\$this->field('text')->value()): ?> only-headline<?php endif; ?>\">
\t\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t\t<?php echo \$this->field('text')->value(); ?>
\t\t\t</div>
\t\t</div>
\t\t<?php endif; ?>
\t</div>
\t<?php if (\$this->field('link')->value()): ?></a><?php endif; ?>
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
        return "@pct_theme_templates/customelements/customelement_imagebox.html5";
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
namespace Contao;

\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_text_imagebox.css|static';

if(\$this->field('parallax')->value())
{
\t\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/parallax/jquery.stellar.min.js|static';
}
\$bg_color = '';
if( \$this->field('bg_color')->value() )
{
\t// compile color
\t\$color = \$this->field('bg_color')->attribute()->compileColor( \$this->field('bg_color')->value() );
\t\$bg_color = \$color->rgba;
}

\$container = System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();

\$strImage = \$this->field('image')->generate();
\$objFile = FilesModel::findByPk( \$this->field('image')->value() );
\$size = StringUtil::deserialize( \$this->field('image')->option('size') );
if ( \$objFile !== null && \\is_array(\$size) )
{
\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\tif( \$objPicture !== null )
\t{
\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\t// look up prefered source image file (not media query)
\t\tforeach(\$sources ?: array() as \$data)
\t\t{
\t\t\tif( (isset(\$data['src']) && \$data['src']) != \$strImage && (!isset(\$data['media']) || strlen(\$data['media']) < 1) )
\t\t\t{
\t\t\t\t\$strImage = \$data['src'];
\t\t\t}
\t\t}
\t}
}

?>
<div class=\"ce_text_imagebox<?php if (\$this->field('overlay')->value()): ?> overlay<?php endif; ?><?php if (\$this->field('parallax')->value()): ?> parallax<?php endif; ?> <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('width')->value(); ?> <?php echo \$this->field('version')->value(); ?> <?php echo \$this->field('align')->value(); ?> block <?php echo \$this->class; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<?php if (\$this->field('link')->value()): ?><a href=\"<?php echo \$this->field('link')->value(); ?>\" class=\"ce_text_imagebox_link\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('titleText')): ?> title=\"<?php echo \$this->field('link')->option('titleText'); ?>\"<?php endif; ?>><?php endif; ?>
\t<div class=\"ce_text_imagebox_image\" style=\"<?php if (\$this->field('bg_color')->value()): ?>background-color:<?= \$bg_color; ?>;<?php endif; ?><?php if (\$this->field('image')->value()): ?>background-image: url(<?= \$strImage; ?>);<?php endif; ?>height:<?php echo \$this->field('height')->value(); ?>px;\"<?php if(\$this->field('parallax')->value()): ?> data-stellar-background-ratio=\"0.1\" data-stellar-offset-parent=\"true\"<?php endif; ?>>
\t\t<?php if (\$this->field('headline')->value() || \$this->field('text')->value()) : ?>
\t\t<div class=\"inside\"<?php if (\$this->field('bg_color')->value()): ?> style=\"background-color:<?= \$bg_color; ?>\"<?php endif; ?>>
\t\t\t<div class=\"content<?php if (!\$this->field('text')->value()): ?> only-headline<?php endif; ?>\">
\t\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t\t<?php echo \$this->field('text')->value(); ?>
\t\t\t</div>
\t\t</div>
\t\t<?php endif; ?>
\t</div>
\t<?php if (\$this->field('link')->value()): ?></a><?php endif; ?>
</div>
", "@pct_theme_templates/customelements/customelement_imagebox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_imagebox.html5");
    }
}
