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

/* @pct_theme_templates/customelements/customelement_pricecard.html5 */
class __TwigTemplate_f8b4f09095ab9ea7fcf5cb7b139e137e extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_pricecard.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('style')->value(); ?><?php if (\$this->field('highlight')->value()): ?> highlight<?php endif; ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_pricecard_inside\">
\t\t<div class=\"pricecard_leftside block\">
\t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t\t<div class=\"price\"><?php echo \$this->field('price')->value(); ?></div>
\t\t\t<?php if (\$this->field('link')->value()): ?>
\t\t\t<div class=\"ce_hyperlink\"><?php echo \$this->field('link')->html(); ?></div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<div class=\"pricecard_rightside block\">
\t\t\t<?php echo \$this->field('description')->html(); ?>
\t\t</div>
\t</div>\t\t\t\t
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_pricecard.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_pricecard.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_pricecard.html5");
    }
}
