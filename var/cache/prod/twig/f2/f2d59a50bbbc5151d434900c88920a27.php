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

/* @pct_theme_templates/customelements/customelement_benefitbox.html5 */
class __TwigTemplate_be900a0a14b90986e840d39713176681 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_benefitbox.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('style')->value(); ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t
\t<div class=\"ce_benefitbox_inside\">
\t\t
\t\t<?php if(\$this->field('image_icon')->value()): ?>
\t\t\t<?php echo \$this->field('image_icon')->html(); ?>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('font_icon')->value()): ?>
\t\t\t<i class=\"fonticon <?php echo \$this->field('font_icon')->value(); ?>\"></i>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('headline')->value()): ?>
\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('number')->value()): ?>
\t\t\t<div class=\"number\"><?php echo \$this->field('number')->html(); ?></div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('list')->value()): ?>
\t\t\t<?php echo \$this->field('list')->html(); ?>
\t\t<?php endif; ?>
\t\t
\t\t
\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t<div class=\"ce_hyperlink\"><?php echo \$this->field('link')->html(); ?></div>
\t\t<?php endif; ?>
\t\t\t
\t</div>
\t
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_benefitbox.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_benefitbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_benefitbox.html5");
    }
}
