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

/* @pct_theme_templates/customelements/customelement_before_after_slider.html5 */
class __TwigTemplate_7c10d702157df95abd82a4595583a9e5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_before_after_slider.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_before_after_slider.html5"));

        // line 1
        yield "<?php
namespace Contao;

\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/twentytwenty/js/jquery.event.move.js|static';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/twentytwenty/js/jquery.twentytwenty.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/twentytwenty/css/twentytwenty.css|static';\t
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_before_after_slider.css|static';

\$container = System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();
\t
\$arrImages = array();
foreach(array('image_before','image_after') as \$name)
{
\t\$arrImages[ \$name ] = \$this->field(\$name)->generate();
\t\$objFile = FilesModel::findByPk( \$this->field(\$name)->value() );
\t\$size = StringUtil::deserialize( \$this->field(\$name)->option('size') );
\tif( \$objFile !== null && \\is_array(\$size) )
\t{
\t\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\t\tif( \$objPicture !== null )
\t\t{
\t\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\t\t// look up prefered source image file (not media query)
\t\t\tforeach(\$sources ?: array() as \$data)
\t\t\t{
\t\t\t\tif( (isset(\$data['src']) && \$data['src']) != \$strImage && (!isset(\$data['media']) || strlen(\$data['media']) < 1) )
\t\t\t\t{
\t\t\t\t\t\$arrImages[ \$name ] = \$data['src'];
\t\t\t\t}
\t\t\t}
\t\t}
\t}
}
?>


<div class=\"<?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div id=\"ce_before_after_slider_<?php echo \$this->id; ?>\">
\t\t<img src=\"<?= \$arrImages['image_before']; ?>\"<?php if(\$this->field('image_before')->option('title')): ?> title=\"<?php echo \$this->field('image_before')->option('title'); ?>\"<?php endif; ?><?php if(\$this->field('image_before')->option('alt')): ?> alt=\"<?php echo \$this->field('image_before')->option('alt'); ?>\"<?php endif; ?>>
\t\t<img src=\"<?= \$arrImages['image_after']; ?>\"<?php if(\$this->field('image_after')->option('title')): ?> title=\"<?php echo \$this->field('image_after')->option('title'); ?>\"<?php endif; ?><?php if(\$this->field('image_after')->option('alt')): ?> alt=\"<?php echo \$this->field('image_after')->option('alt'); ?>\"<?php endif; ?>>
\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{\t
\tsetTimeout(function()
\t{
\t\tjQuery(\"#ce_before_after_slider_<?php echo \$this->id; ?>\").twentytwenty(
\t\t{
\t\t\tdefault_offset_pct: <?php echo \$this->field('default_offset_pct')->value(); ?>, // How much of the before image is visible when the page loads
\t\t\torientation: '<?php echo \$this->field('orientation')->value(); ?>', // Orientation of the before and after images ('horizontal' or 'vertical')
\t\t\tbefore_label: '<?php echo \$this->field('before_label')->value(); ?>', // Set a custom before label
\t\t\tafter_label: '<?php echo \$this->field('after_label')->value(); ?>', // Set a custom after label
\t\t\tno_overlay: <?php if(\$this->field('no_overlay')->value()): ?> true<?php else: ?>false<?php endif; ?>, //Do not show the overlay with before and after
\t\t\tmove_slider_on_hover: false, // Move slider on mouse hover?
\t\t\tmove_with_handle_only: false, // Allow a user to swipe anywhere on the image to control slider movement. 
\t\t\tclick_to_move: false // Allow a user to click (or tap) anywhere on the image to move the slider to that location.
\t\t});

\t\t// fire resize event
\t\tjQuery(window).trigger('resize');
\t}, 800);
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_before_after_slider.html5";
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

\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/twentytwenty/js/jquery.event.move.js|static';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/twentytwenty/js/jquery.twentytwenty.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/twentytwenty/css/twentytwenty.css|static';\t
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_before_after_slider.css|static';

\$container = System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();
\t
\$arrImages = array();
foreach(array('image_before','image_after') as \$name)
{
\t\$arrImages[ \$name ] = \$this->field(\$name)->generate();
\t\$objFile = FilesModel::findByPk( \$this->field(\$name)->value() );
\t\$size = StringUtil::deserialize( \$this->field(\$name)->option('size') );
\tif( \$objFile !== null && \\is_array(\$size) )
\t{
\t\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\t\tif( \$objPicture !== null )
\t\t{
\t\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\t\t// look up prefered source image file (not media query)
\t\t\tforeach(\$sources ?: array() as \$data)
\t\t\t{
\t\t\t\tif( (isset(\$data['src']) && \$data['src']) != \$strImage && (!isset(\$data['media']) || strlen(\$data['media']) < 1) )
\t\t\t\t{
\t\t\t\t\t\$arrImages[ \$name ] = \$data['src'];
\t\t\t\t}
\t\t\t}
\t\t}
\t}
}
?>


<div class=\"<?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div id=\"ce_before_after_slider_<?php echo \$this->id; ?>\">
\t\t<img src=\"<?= \$arrImages['image_before']; ?>\"<?php if(\$this->field('image_before')->option('title')): ?> title=\"<?php echo \$this->field('image_before')->option('title'); ?>\"<?php endif; ?><?php if(\$this->field('image_before')->option('alt')): ?> alt=\"<?php echo \$this->field('image_before')->option('alt'); ?>\"<?php endif; ?>>
\t\t<img src=\"<?= \$arrImages['image_after']; ?>\"<?php if(\$this->field('image_after')->option('title')): ?> title=\"<?php echo \$this->field('image_after')->option('title'); ?>\"<?php endif; ?><?php if(\$this->field('image_after')->option('alt')): ?> alt=\"<?php echo \$this->field('image_after')->option('alt'); ?>\"<?php endif; ?>>
\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{\t
\tsetTimeout(function()
\t{
\t\tjQuery(\"#ce_before_after_slider_<?php echo \$this->id; ?>\").twentytwenty(
\t\t{
\t\t\tdefault_offset_pct: <?php echo \$this->field('default_offset_pct')->value(); ?>, // How much of the before image is visible when the page loads
\t\t\torientation: '<?php echo \$this->field('orientation')->value(); ?>', // Orientation of the before and after images ('horizontal' or 'vertical')
\t\t\tbefore_label: '<?php echo \$this->field('before_label')->value(); ?>', // Set a custom before label
\t\t\tafter_label: '<?php echo \$this->field('after_label')->value(); ?>', // Set a custom after label
\t\t\tno_overlay: <?php if(\$this->field('no_overlay')->value()): ?> true<?php else: ?>false<?php endif; ?>, //Do not show the overlay with before and after
\t\t\tmove_slider_on_hover: false, // Move slider on mouse hover?
\t\t\tmove_with_handle_only: false, // Allow a user to swipe anywhere on the image to control slider movement. 
\t\t\tclick_to_move: false // Allow a user to click (or tap) anywhere on the image to move the slider to that location.
\t\t});

\t\t// fire resize event
\t\tjQuery(window).trigger('resize');
\t}, 800);
});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/customelements/customelement_before_after_slider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_before_after_slider.html5");
    }
}
