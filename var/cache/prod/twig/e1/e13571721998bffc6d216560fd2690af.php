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

/* @pct_theme_templates/customelements/customelement_teambox_simple.html5 */
class __TwigTemplate_fbdaa36cd6373b409f57d582f24b4e59 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_teambox_simple.css|static';
?>
<div class=\"<?=  \$this->class; ?>\" data-font-size=\"<?php echo \$this->field('font_size')->value(); ?>\"<?php echo \$this->cssID; ?>>
\t<?php if(\$this->field('link')->value()): ?>
\t<div class=\"overlay_link\"><?php echo \$this->field('link')->html(); ?></div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('image')->value('')): ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('job')->value()): ?>
\t\t<div class=\"job font_headline <?php echo \$this->field('markup_job')->value(); ?>\"><?php echo \$this->field('job')->value(); ?></div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('name')->value()): ?>
\t\t<div class=\"name font_headline <?php echo \$this->field('markup_name')->value(); ?>\"><?php echo \$this->field('name')->value(); ?></div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('description')->value()): ?>
\t\t<div class=\"description\"><?php echo \$this->field('description')->value(); ?></div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('link')->value()): ?>
\t<div class=\"link\">
\t    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"32\" height=\"32\" viewBox=\"0 0 32 32\">
\t      <g fill=\"none\" stroke=\"#000\" stroke-width=\"1.5\" stroke-linejoin=\"round\" stroke-miterlimit=\"10\">
\t        <circle cx=\"16\" cy=\"16\" r=\"15.12\"></circle>
\t        <path d=\"M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98\"></path>
\t      </g>
\t    </svg>
\t</div>
\t<?php endif; ?>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_teambox_simple.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_teambox_simple.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_teambox_simple.html5");
    }
}
