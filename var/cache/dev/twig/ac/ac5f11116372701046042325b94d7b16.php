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

/* @pct_theme_templates/customelements/customelement_pricelist.html5 */
class __TwigTemplate_59d876bb0885c5597a2128dbf91621d7 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_pricelist.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_pricelist.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_pricelist.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('schema')->value(); ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t\t\t
\t<?php foreach(\$this->group('item') as \$i => \$fields): ?>
\t<div class=\"item\">
\t\t<div class=\"item-inside\">
\t\t\t<div class=\"label\"><?php echo \$this->field('label#'.\$i)->value(); ?></div>
\t\t\t<div class=\"price\"><?php echo \$this->field('price#'.\$i)->value(); ?></div>
\t\t</div>
\t\t<?php if(\$this->field('subline#'.\$i)->value()): ?><div class=\"subline\"><?php echo \$this->field('subline#'.\$i)->value(); ?></div><?php endif; ?>
\t</div>
\t<?php endforeach; ?>
\t\t
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
        return "@pct_theme_templates/customelements/customelement_pricelist.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_pricelist.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('schema')->value(); ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t\t\t
\t<?php foreach(\$this->group('item') as \$i => \$fields): ?>
\t<div class=\"item\">
\t\t<div class=\"item-inside\">
\t\t\t<div class=\"label\"><?php echo \$this->field('label#'.\$i)->value(); ?></div>
\t\t\t<div class=\"price\"><?php echo \$this->field('price#'.\$i)->value(); ?></div>
\t\t</div>
\t\t<?php if(\$this->field('subline#'.\$i)->value()): ?><div class=\"subline\"><?php echo \$this->field('subline#'.\$i)->value(); ?></div><?php endif; ?>
\t</div>
\t<?php endforeach; ?>
\t\t
</div>", "@pct_theme_templates/customelements/customelement_pricelist.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_pricelist.html5");
    }
}
