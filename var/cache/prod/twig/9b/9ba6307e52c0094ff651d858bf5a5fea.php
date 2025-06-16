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

/* @pct_theme_templates/customelements/customelement_price_column.html5 */
class __TwigTemplate_20975b1d0fdaad587e8052edf6b9d325 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_price_column.css|static';
?>

<div class=\"<?=  \$this->class; ?>\" data-font-size=\"<?php echo \$this->field('text_size')->value(); ?>\" data-style=\"<?php echo \$this->field('style')->value(); ?>\"<?php echo \$this->cssID; ?>>
\t<div class=\"label <?php echo \$this->field('label_size')->value(); ?>\">
\t\t<?php if(\$this->field('icon')->value('')): ?><i class=\"<?php echo \$this->field('icon')->value(); ?>\"></i><?php endif; ?>
\t\t<?php if(\$this->field('image_icon')->value('')): ?><i class=\"image_icon\"><?php echo \$this->field('image_icon')->html(); ?></i><?php endif; ?>
\t\t<span><?php echo \$this->field('label')->value(); ?></span>
\t</div>
\t<div class=\"text <?php echo \$this->field('text_size')->value(); ?>\"><?php echo \$this->field('text')->value(); ?></div>
\t<div class=\"price <?php echo \$this->field('price_size')->value(); ?>\"><?php echo \$this->field('price')->value(); ?></div>
\t<?php if(\$this->field('link')->value('')): ?><div class=\"link\"><?php echo \$this->field('link')->html(); ?></div><?php endif; ?>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_price_column.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_price_column.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_price_column.html5");
    }
}
