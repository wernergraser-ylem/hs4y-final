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

/* @pct_theme_templates/customelements/customelement_image_text_box_v2.html5 */
class __TwigTemplate_5ca61fdecb78a27551d2caf6c3a88a07 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_image_text_box_v2.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_image_text_box_v2.html5"));

        // line 1
        yield "<?php
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_image_text_box_v2.css|static';
\$lightbox = \$this->field('link')->option('lightbox');
if( \$this->field('link')->option('lightbox') )
{
\tif( strpos(\$lightbox, 'data-lightbox') !== false )
\t{
\t\t\$lightbox = str_replace('data-', '',\$lightbox);\t
\t}\t
\t\$lightbox = ' data-lightbox=\"'.\$lightbox.'\"';
}
?>
<div class=\"<?=  \$this->class; ?>\" data-font-size=\"<?php echo \$this->field('font_size')->value(); ?>\"<?php echo \$this->cssID; ?>>
\t<?php if(\$this->field('link')->value()): ?>
\t<a href=\"<?php echo \$this->field('link')->value(); ?>\" <?php if(\$this->field('link')->option('titleText')): ?> title=\"<?php echo \$this->field('link')->option('titleText'); ?>\"<?php endif; ?><?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('lightbox')): ?><?php echo \$lightbox; ?><?php endif; ?>>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('image')->value()): ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t<?php endif; ?>

\t<?php if(\$this->field('headline')->value()): ?>
\t\t<?php echo \$this->field('headline')->html(); ?>
\t<?php endif; ?>

\t<?php if(\$this->field('text')->value()): ?>
\t<div class=\"text\">
\t\t<?php echo \$this->field('text')->html(); ?>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('link')->value()): ?>
\t</a>
\t<?php endif; ?>
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
        return "@pct_theme_templates/customelements/customelement_image_text_box_v2.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_image_text_box_v2.css|static';
\$lightbox = \$this->field('link')->option('lightbox');
if( \$this->field('link')->option('lightbox') )
{
\tif( strpos(\$lightbox, 'data-lightbox') !== false )
\t{
\t\t\$lightbox = str_replace('data-', '',\$lightbox);\t
\t}\t
\t\$lightbox = ' data-lightbox=\"'.\$lightbox.'\"';
}
?>
<div class=\"<?=  \$this->class; ?>\" data-font-size=\"<?php echo \$this->field('font_size')->value(); ?>\"<?php echo \$this->cssID; ?>>
\t<?php if(\$this->field('link')->value()): ?>
\t<a href=\"<?php echo \$this->field('link')->value(); ?>\" <?php if(\$this->field('link')->option('titleText')): ?> title=\"<?php echo \$this->field('link')->option('titleText'); ?>\"<?php endif; ?><?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('lightbox')): ?><?php echo \$lightbox; ?><?php endif; ?>>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('image')->value()): ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t<?php endif; ?>

\t<?php if(\$this->field('headline')->value()): ?>
\t\t<?php echo \$this->field('headline')->html(); ?>
\t<?php endif; ?>

\t<?php if(\$this->field('text')->value()): ?>
\t<div class=\"text\">
\t\t<?php echo \$this->field('text')->html(); ?>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('link')->value()): ?>
\t</a>
\t<?php endif; ?>
</div>", "@pct_theme_templates/customelements/customelement_image_text_box_v2.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_image_text_box_v2.html5");
    }
}
