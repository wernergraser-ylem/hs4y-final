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

/* @pct_theme_templates/customelements/customelement_image_text_box.html5 */
class __TwigTemplate_a7bdfb873879e167d2730d8d694cb9b6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_image_text_box.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_image_text_box.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_image_text_box.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('style')->value(); ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_image_text_box_inside\">
\t\t<?php if (\$this->field('link')->value()): ?>
\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('title')): ?> title=\"<?php echo \$this->field('link')->option('title'); ?>\"<?php endif; ?>>
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"ce_image_text_box_image\">\t\t
\t\t\t<?php if (\$this->field('banner')->value()): ?><div class=\"ce_image_text_box_banner\"><?php echo \$this->field('banner')->value(); ?></div><?php endif; ?>
\t\t\t<?php echo \$this->field('image')->html(); ?>
\t\t</div>
\t\t
\t\t<?php if (\$this->field('link')->value()): ?>
\t\t</a>
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"ce_image_text_box_content_outside\">
\t\t\t<div class=\"ce_image_text_box_content\">
\t\t\t\t<?php if (\$this->field('link')->value()): ?>
\t\t\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('title')): ?> title=\"<?php echo \$this->field('link')->option('title'); ?>\"<?php endif; ?>>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t\t
\t\t\t\t<?php if (\$this->field('link')->value()): ?>
\t\t\t\t</a>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php echo \$this->field('text')->html(); ?>
\t\t\t</div>
\t\t
\t\t\t<?php if (\$this->field('link')->option('linkText')): ?>
\t\t\t\t<?php echo \$this->field('link')->html(); ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t</div>
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
        return "@pct_theme_templates/customelements/customelement_image_text_box.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_image_text_box.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('style')->value(); ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_image_text_box_inside\">
\t\t<?php if (\$this->field('link')->value()): ?>
\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('title')): ?> title=\"<?php echo \$this->field('link')->option('title'); ?>\"<?php endif; ?>>
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"ce_image_text_box_image\">\t\t
\t\t\t<?php if (\$this->field('banner')->value()): ?><div class=\"ce_image_text_box_banner\"><?php echo \$this->field('banner')->value(); ?></div><?php endif; ?>
\t\t\t<?php echo \$this->field('image')->html(); ?>
\t\t</div>
\t\t
\t\t<?php if (\$this->field('link')->value()): ?>
\t\t</a>
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"ce_image_text_box_content_outside\">
\t\t\t<div class=\"ce_image_text_box_content\">
\t\t\t\t<?php if (\$this->field('link')->value()): ?>
\t\t\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('title')): ?> title=\"<?php echo \$this->field('link')->option('title'); ?>\"<?php endif; ?>>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t\t
\t\t\t\t<?php if (\$this->field('link')->value()): ?>
\t\t\t\t</a>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php echo \$this->field('text')->html(); ?>
\t\t\t</div>
\t\t
\t\t\t<?php if (\$this->field('link')->option('linkText')): ?>
\t\t\t\t<?php echo \$this->field('link')->html(); ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t</div>
</div>", "@pct_theme_templates/customelements/customelement_image_text_box.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_image_text_box.html5");
    }
}
