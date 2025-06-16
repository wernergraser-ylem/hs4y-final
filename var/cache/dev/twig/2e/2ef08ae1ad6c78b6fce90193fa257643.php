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

/* @pct_theme_templates/customelements/customelement_contentbox.html5 */
class __TwigTemplate_aa497a21c14186e91f12c8edbc34f507 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_contentbox.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_contentbox.html5"));

        // line 1
        yield "<?php 
namespace Contao;

\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_contentbox.css|static';

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
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('h-align')->value(); ?> <?php echo \$this->field('v-align')->value(); ?><?php if(\$this->field('hover')->value()): ?> hover<?php endif; ?>\" <?php echo \$this->cssID; ?> style=\"<?php if(\$this->field('color')->value()): ?>color: #<?php echo \$this->field('color')->value(); ?>;<?php endif; ?><?php if(\$this->field('background-color')->value()): ?>background-color: #<?php echo \$this->field('background-color')->value(); ?>;<?php endif; ?><?php if(\$this->field('height')->value()): ?>height: <?php echo \$this->field('height')->value(); ?>px;<?php endif; ?><?php if (\$this->style): ?><?php echo \$this->style; ?><?php endif; ?>\">
\t<?php if(\$this->field('link')->value()): ?><a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>><?php endif; ?>
\t<div class=\"ce_contentbox_table\"<?php if(\$this->field('image')->value()): ?> style=\"background-image: url(<?= \$strImage; ?>);\"<?php endif; ?>>
\t\t<div class=\"ce_contentbox_cell\">
\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t<?php echo \$this->field('text')->value(); ?>
\t\t</div>
\t\t<?php if(\$this->field('arrow')->value() != 'no-arrow'): ?>
\t\t<div class=\"arrow <?php echo \$this->field('arrow')->value(); ?>\"<?php if(\$this->field('arrow-color')->value()): ?>style=\"background-color:#<?php echo \$this->field('arrow-color')->value(); ?>;\"<?php endif; ?>></div>
\t\t<?php endif; ?>
\t</div>
\t<?php if(\$this->field('link')->value()): ?></a><?php endif; ?>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_contentbox.html5";
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

\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_contentbox.css|static';

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
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('h-align')->value(); ?> <?php echo \$this->field('v-align')->value(); ?><?php if(\$this->field('hover')->value()): ?> hover<?php endif; ?>\" <?php echo \$this->cssID; ?> style=\"<?php if(\$this->field('color')->value()): ?>color: #<?php echo \$this->field('color')->value(); ?>;<?php endif; ?><?php if(\$this->field('background-color')->value()): ?>background-color: #<?php echo \$this->field('background-color')->value(); ?>;<?php endif; ?><?php if(\$this->field('height')->value()): ?>height: <?php echo \$this->field('height')->value(); ?>px;<?php endif; ?><?php if (\$this->style): ?><?php echo \$this->style; ?><?php endif; ?>\">
\t<?php if(\$this->field('link')->value()): ?><a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>><?php endif; ?>
\t<div class=\"ce_contentbox_table\"<?php if(\$this->field('image')->value()): ?> style=\"background-image: url(<?= \$strImage; ?>);\"<?php endif; ?>>
\t\t<div class=\"ce_contentbox_cell\">
\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t<?php echo \$this->field('text')->value(); ?>
\t\t</div>
\t\t<?php if(\$this->field('arrow')->value() != 'no-arrow'): ?>
\t\t<div class=\"arrow <?php echo \$this->field('arrow')->value(); ?>\"<?php if(\$this->field('arrow-color')->value()): ?>style=\"background-color:#<?php echo \$this->field('arrow-color')->value(); ?>;\"<?php endif; ?>></div>
\t\t<?php endif; ?>
\t</div>
\t<?php if(\$this->field('link')->value()): ?></a><?php endif; ?>
</div>", "@pct_theme_templates/customelements/customelement_contentbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_contentbox.html5");
    }
}
