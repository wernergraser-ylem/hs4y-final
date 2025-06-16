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

/* @pct_theme_templates/customelements/customelement_imagemap_start.html5 */
class __TwigTemplate_278e2dbed599fe6a426883bb28e69090 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_imagemap_start.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_imagemap_start.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['ce_imagemap_hotspot_size'] = \$this->field('hotspot-size')->value(); 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_imagemap.css|static';
?>
<div class=\"ce_imagemap <?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"imagemap_inside <?php echo \$this->field('align')->value(); ?>\"<?php if(\$this->field('image_width')->value()): ?> style=\"max-width:<?php echo \$this->field('image_width')->value(); ?>px;\"<?php endif; ?>>
\t\t<div class=\"image\"><?php echo \$this->field('image')->html(); ?></div>\t\t
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_imagemap_start.html5";
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
\$GLOBALS['ce_imagemap_hotspot_size'] = \$this->field('hotspot-size')->value(); 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_imagemap.css|static';
?>
<div class=\"ce_imagemap <?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"imagemap_inside <?php echo \$this->field('align')->value(); ?>\"<?php if(\$this->field('image_width')->value()): ?> style=\"max-width:<?php echo \$this->field('image_width')->value(); ?>px;\"<?php endif; ?>>
\t\t<div class=\"image\"><?php echo \$this->field('image')->html(); ?></div>\t\t
", "@pct_theme_templates/customelements/customelement_imagemap_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_imagemap_start.html5");
    }
}
