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

/* @pct_theme_templates/customelements/customelement_pricetable3.html5 */
class __TwigTemplate_b1477d0821640c14d1bc8aebfbdace3c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_pricetable3.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_pricetable3.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_pricetable.css|static';
?>
<div class=\"ce_pricetable autogrid_row gutter_none <?php echo \$this->class; ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>

\t<div class=\"pricetable column col_4 block<?php if(\$this->field('highlight_1')->value()): ?> highlight<?php endif; ?>\">
\t\t
\t\t<div class=\"title\">
\t\t\t<i class=\"<?php echo \$this->field('icon_1')->value(); ?>\"></i>
\t\t\t<?php echo \$this->field('title_1')->value(); ?>
\t\t</div>
\t\t
\t\t<div class=\"price\">
\t\t\t<?php if(\$this->field('price_1')->value()): ?>
\t\t\t<div class=\"price-inside\">
\t\t\t\t<span class=\"currency\"><?php echo \$this->field('currency_1')->value(); ?></span>
\t\t\t\t<span class=\"font-size-l price-data\"><?php echo \$this->field('price_1')->value(); ?></span>
\t\t\t\t<span class=\"period\"><?php echo \$this->field('period_1')->value(); ?></span>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if(\$this->field('priceinfo_1')->value()): ?>
\t\t\t<div class=\"priceinfo\"><?php echo \$this->field('priceinfo_1')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<div class=\"contents\">
\t\t\t<?php echo \$this->field('contents_1')->value(); ?>
\t\t</div>
\t\t
\t\t<?php if(\$this->field('rating_1')->value()): ?>
\t\t<div class=\"rating\">
\t\t<?php if(\$this->field('rating_1')->value() =='star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_1')->value() =='star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_1')->value() =='star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_1')->value() =='star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_1')->value() =='star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('link_1')->value()): ?>
\t\t<div class=\"ce_hyperlink\">
\t\t\t<?php echo \$this->field('link_1')->html(); ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('highlight_text_1')->value()): ?><div class=\"hightlight_text\"><?php echo \$this->field('highlight_text_1')->value(); ?></div><?php endif; ?>
\t
\t</div>
\t
\t<div class=\"pricetable autogrid column col_4 block<?php if(\$this->field('highlight_2')->value()): ?> highlight<?php endif; ?>\">
\t\t
\t\t<div class=\"title\">
\t\t\t<i class=\"<?php echo \$this->field('icon_2')->value(); ?>\"></i>
\t\t\t<?php echo \$this->field('title_2')->value(); ?>
\t\t</div>
\t\t
\t\t<div class=\"price\">
\t\t\t
\t\t\t<?php if(\$this->field('price_2')->value()): ?>
\t\t\t<div class=\"price-inside\">
\t\t\t\t<span class=\"currency\"><?php echo \$this->field('currency_2')->value(); ?></span>
\t\t\t\t<span class=\"font-size-l price-data\"><?php echo \$this->field('price_2')->value(); ?></span>
\t\t\t\t<span class=\"period\"><?php echo \$this->field('period_2')->value(); ?></span>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if(\$this->field('priceinfo_2')->value()): ?>
\t\t\t<div class=\"priceinfo\"><?php echo \$this->field('priceinfo_2')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<div class=\"contents\">
\t\t\t<?php echo \$this->field('contents_2')->value(); ?>
\t\t</div>
\t\t
\t\t<?php if(\$this->field('rating_2')->value()): ?>
\t\t<div class=\"rating\">
\t\t<?php if(\$this->field('rating_2')->value() =='star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_2')->value() =='star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_2')->value() =='star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_2')->value() =='star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_2')->value() =='star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('link_2')->value()): ?>
\t\t<div class=\"ce_hyperlink align-center\">
\t\t\t<?php echo \$this->field('link_2')->html(); ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('highlight_text_2')->value()): ?><div class=\"hightlight_text\"><?php echo \$this->field('highlight_text_2')->value(); ?></div><?php endif; ?>
\t\t
\t</div>
\t
\t<div class=\"pricetable column col_4 block<?php if(\$this->field('highlight_3')->value()): ?> highlight<?php endif; ?>\">
\t\t
\t\t<div class=\"title\">
\t\t\t<i class=\"<?php echo \$this->field('icon_3')->value(); ?>\"></i>
\t\t\t<?php echo \$this->field('title_3')->value(); ?>
\t\t</div>
\t\t
\t\t<div class=\"price\">
\t\t\t
\t\t\t<?php if(\$this->field('price_3')->value()): ?>
\t\t\t<div class=\"price-inside\">
\t\t\t\t<span class=\"currency\"><?php echo \$this->field('currency_3')->value(); ?></span>
\t\t\t\t<span class=\"font-size-l price-data\"><?php echo \$this->field('price_3')->value(); ?></span>
\t\t\t\t<span class=\"period\"><?php echo \$this->field('period_3')->value(); ?></span>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if(\$this->field('priceinfo_3')->value()): ?>
\t\t\t<div class=\"priceinfo\"><?php echo \$this->field('priceinfo_3')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<div class=\"contents\">
\t\t\t<?php echo \$this->field('contents_3')->value(); ?>
\t\t</div>
\t\t
\t\t<?php if(\$this->field('rating_3')->value()): ?>
\t\t<div class=\"rating\">
\t\t<?php if(\$this->field('rating_3')->value() =='star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_3')->value() =='star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_3')->value() =='star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_3')->value() =='star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_3')->value() =='star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('link_3')->value()): ?>
\t\t<div class=\"ce_hyperlink\">
\t\t\t<?php echo \$this->field('link_3')->html(); ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('highlight_text_3')->value()): ?><div class=\"hightlight_text\"><?php echo \$this->field('highlight_text_3')->value(); ?></div><?php endif; ?>
\t\t
\t</div>
\t
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
        return "@pct_theme_templates/customelements/customelement_pricetable3.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_pricetable.css|static';
?>
<div class=\"ce_pricetable autogrid_row gutter_none <?php echo \$this->class; ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>

\t<div class=\"pricetable column col_4 block<?php if(\$this->field('highlight_1')->value()): ?> highlight<?php endif; ?>\">
\t\t
\t\t<div class=\"title\">
\t\t\t<i class=\"<?php echo \$this->field('icon_1')->value(); ?>\"></i>
\t\t\t<?php echo \$this->field('title_1')->value(); ?>
\t\t</div>
\t\t
\t\t<div class=\"price\">
\t\t\t<?php if(\$this->field('price_1')->value()): ?>
\t\t\t<div class=\"price-inside\">
\t\t\t\t<span class=\"currency\"><?php echo \$this->field('currency_1')->value(); ?></span>
\t\t\t\t<span class=\"font-size-l price-data\"><?php echo \$this->field('price_1')->value(); ?></span>
\t\t\t\t<span class=\"period\"><?php echo \$this->field('period_1')->value(); ?></span>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if(\$this->field('priceinfo_1')->value()): ?>
\t\t\t<div class=\"priceinfo\"><?php echo \$this->field('priceinfo_1')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<div class=\"contents\">
\t\t\t<?php echo \$this->field('contents_1')->value(); ?>
\t\t</div>
\t\t
\t\t<?php if(\$this->field('rating_1')->value()): ?>
\t\t<div class=\"rating\">
\t\t<?php if(\$this->field('rating_1')->value() =='star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_1')->value() =='star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_1')->value() =='star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_1')->value() =='star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_1')->value() =='star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('link_1')->value()): ?>
\t\t<div class=\"ce_hyperlink\">
\t\t\t<?php echo \$this->field('link_1')->html(); ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('highlight_text_1')->value()): ?><div class=\"hightlight_text\"><?php echo \$this->field('highlight_text_1')->value(); ?></div><?php endif; ?>
\t
\t</div>
\t
\t<div class=\"pricetable autogrid column col_4 block<?php if(\$this->field('highlight_2')->value()): ?> highlight<?php endif; ?>\">
\t\t
\t\t<div class=\"title\">
\t\t\t<i class=\"<?php echo \$this->field('icon_2')->value(); ?>\"></i>
\t\t\t<?php echo \$this->field('title_2')->value(); ?>
\t\t</div>
\t\t
\t\t<div class=\"price\">
\t\t\t
\t\t\t<?php if(\$this->field('price_2')->value()): ?>
\t\t\t<div class=\"price-inside\">
\t\t\t\t<span class=\"currency\"><?php echo \$this->field('currency_2')->value(); ?></span>
\t\t\t\t<span class=\"font-size-l price-data\"><?php echo \$this->field('price_2')->value(); ?></span>
\t\t\t\t<span class=\"period\"><?php echo \$this->field('period_2')->value(); ?></span>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if(\$this->field('priceinfo_2')->value()): ?>
\t\t\t<div class=\"priceinfo\"><?php echo \$this->field('priceinfo_2')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<div class=\"contents\">
\t\t\t<?php echo \$this->field('contents_2')->value(); ?>
\t\t</div>
\t\t
\t\t<?php if(\$this->field('rating_2')->value()): ?>
\t\t<div class=\"rating\">
\t\t<?php if(\$this->field('rating_2')->value() =='star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_2')->value() =='star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_2')->value() =='star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_2')->value() =='star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_2')->value() =='star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('link_2')->value()): ?>
\t\t<div class=\"ce_hyperlink align-center\">
\t\t\t<?php echo \$this->field('link_2')->html(); ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('highlight_text_2')->value()): ?><div class=\"hightlight_text\"><?php echo \$this->field('highlight_text_2')->value(); ?></div><?php endif; ?>
\t\t
\t</div>
\t
\t<div class=\"pricetable column col_4 block<?php if(\$this->field('highlight_3')->value()): ?> highlight<?php endif; ?>\">
\t\t
\t\t<div class=\"title\">
\t\t\t<i class=\"<?php echo \$this->field('icon_3')->value(); ?>\"></i>
\t\t\t<?php echo \$this->field('title_3')->value(); ?>
\t\t</div>
\t\t
\t\t<div class=\"price\">
\t\t\t
\t\t\t<?php if(\$this->field('price_3')->value()): ?>
\t\t\t<div class=\"price-inside\">
\t\t\t\t<span class=\"currency\"><?php echo \$this->field('currency_3')->value(); ?></span>
\t\t\t\t<span class=\"font-size-l price-data\"><?php echo \$this->field('price_3')->value(); ?></span>
\t\t\t\t<span class=\"period\"><?php echo \$this->field('period_3')->value(); ?></span>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if(\$this->field('priceinfo_3')->value()): ?>
\t\t\t<div class=\"priceinfo\"><?php echo \$this->field('priceinfo_3')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<div class=\"contents\">
\t\t\t<?php echo \$this->field('contents_3')->value(); ?>
\t\t</div>
\t\t
\t\t<?php if(\$this->field('rating_3')->value()): ?>
\t\t<div class=\"rating\">
\t\t<?php if(\$this->field('rating_3')->value() =='star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_3')->value() =='star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_3')->value() =='star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_3')->value() =='star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t<?php if(\$this->field('rating_3')->value() =='star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('link_3')->value()): ?>
\t\t<div class=\"ce_hyperlink\">
\t\t\t<?php echo \$this->field('link_3')->html(); ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('highlight_text_3')->value()): ?><div class=\"hightlight_text\"><?php echo \$this->field('highlight_text_3')->value(); ?></div><?php endif; ?>
\t\t
\t</div>
\t
</div>", "@pct_theme_templates/customelements/customelement_pricetable3.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_pricetable3.html5");
    }
}
