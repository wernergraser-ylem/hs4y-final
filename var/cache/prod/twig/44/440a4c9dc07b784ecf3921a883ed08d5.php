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
class __TwigTemplate_2e10ec04325418a0c8eeab1fab346c6c extends Template
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_theme_templates/customelements/customelement_image_text_box.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_image_text_box.html5");
    }
}
