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

/* @pct_theme_templates/customelements/customelement_pricelist_image.html5 */
class __TwigTemplate_0247edeb2f9b7591820708525fb942bd extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_pricelist_image.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t\t\t
\t<?php foreach(\$this->group('item') as \$i => \$fields): ?>
\t<div class=\"item\">
\t\t<div class=\"item-inside\">
\t\t\t<?php if(\$this->field('image#'.\$i)->value()): ?><?php echo \$this->field('image#'.\$i)->html(); ?><?php endif; ?>
\t\t\t<div class=\"item-content\">
\t\t\t\t<h4><?php echo \$this->field('label#'.\$i)->value(); ?></h4>
\t\t\t\t<span class=\"price color-accent\"><?php echo \$this->field('price#'.\$i)->value(); ?></span>
\t\t\t</div>
\t\t\t<?php if(\$this->field('subline#'.\$i)->value()): ?><div class=\"subline\"><?php echo \$this->field('subline#'.\$i)->value(); ?></div><?php endif; ?>
\t\t</div>
\t</div>
\t<?php endforeach; ?>
\t\t
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_pricelist_image.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_pricelist_image.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_pricelist_image.html5");
    }
}
