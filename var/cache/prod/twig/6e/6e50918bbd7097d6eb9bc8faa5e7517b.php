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

/* @pct_theme_templates/customelements/customelement_productbox.html5 */
class __TwigTemplate_7b7f1d89ae288aff2b2ba427253586bf extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_productbox.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('style')->value(); ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_productbox_inside\">
\t\t<?php if (\$this->field('banner')->value()): ?><div class=\"ce_productbox_banner bg-accent\"><?php echo \$this->field('banner')->value(); ?></div><?php endif; ?>
\t\t<?php if (\$this->field('link')->value()): ?> <a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>><?php endif; ?>
\t\t<div class=\"image-wrapper\">
\t\t\t<?php echo \$this->field('image')->html(); ?>
\t\t\t<?php if (\$this->field('image_hover')->value()): ?>
\t\t\t<div class=\"image-hover\">
\t\t\t\t<?php echo \$this->field('image_hover')->html(); ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<?php if (\$this->field('link')->value()): ?> </a><?php endif; ?>
\t\t
\t\t<div class=\"ce_productbox_content_top\">
\t\t\t<?php if (\$this->field('link')->value()): ?> <a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>><?php endif; ?>
\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t<?php if (\$this->field('link')->value()): ?> </a><?php endif; ?>
\t\t\t<?php if (\$this->field('subheadline')->value()): ?><div class=\"subheadline\"><?php echo \$this->field('subheadline')->value(); ?></div><?php endif; ?>
\t\t\t<?php echo \$this->field('text')->html(); ?>
\t\t</div>
\t\t
\t\t<?php if (\$this->field('price')->value() || \$this->field('price_add')->value() || \$this->field('price_old')->value() || \$this->field('link')->option('linkText')): ?>
\t\t<div class=\"ce_productbox_content_bottom\">
\t\t\t<div class=\"price\">
\t\t\t\t<?php if (\$this->field('price')->value()): ?><?php echo \$this->field('price')->value(); ?><?php endif; ?>
\t\t\t\t<?php if (\$this->field('price_add')->value()): ?><span><?php echo \$this->field('price_add')->value(); ?></span><?php endif; ?>
\t\t\t\t<?php if (\$this->field('price_old')->value()): ?><span class=\"price-old\"><?php echo \$this->field('price_old')->value(); ?></span><?php endif; ?>
\t\t\t</div>
\t\t\t<?php if (\$this->field('link')->value()): ?>
\t\t\t<div class=\"ce_hyperlink\">
\t\t\t\t<?php echo \$this->field('link')->html(); ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t</div>\t
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_productbox.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_productbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_productbox.html5");
    }
}
