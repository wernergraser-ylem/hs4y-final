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

/* @pct_theme_templates/customelements/customelement_headline_extended.html5 */
class __TwigTemplate_5c5a3a6af988d14f166476038206aff5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_headline_extended.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_headline_extended.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_headline_extended.css|static';
\$element = \$this->field('headline_type')->value();
\$type = \$this->field('headline_type')->value();
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}

\$type = str_replace('.', '', \$type);
?>

<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('align')->value(); ?><?php if(\$this->field('invert')->value()): ?> color-white<?php endif; ?> block\" <?php echo \$this->cssID; ?>style=\"<?php if(\$this->field('max_width')->value()): ?>max-width:<?php echo \$this->field('max_width')->value(); ?>px;<?php endif; ?><?php if (\$this->style): ?><?php echo \$this->style; ?><?php endif; ?>\">
\t<?php if(\$this->field('background_text')->value()): ?><div class=\"background-text h3\"><?php echo \$this->field('background_text')->value(); ?></div><?php endif; ?>
\t<?php if(\$this->field('headline_part_1')->value() || \$this->field('headline_part_2')->value() || \$this->field('headline_part_3')->value() || \$this->field('headline_part_4')->value()): ?>
\t<<?= \$element; ?> class=\"<?= \$type; ?>\"><?php echo \$this->field('headline_part_1')->value(); ?><?php if(\$this->field('headline_part_2')->value()): ?> <span class=\"color-accent\"><?php echo \$this->field('headline_part_2')->value(); ?></span><?php endif; ?><?php if(\$this->field('headline_part_3')->value()): ?> <?php echo \$this->field('headline_part_3')->value(); ?><?php endif; ?><?php if(\$this->field('headline_part_4')->value()): ?> <span class=\"color-accent\"><?php echo \$this->field('headline_part_4')->value(); ?></span><?php endif; ?></<?= \$element; ?>>
\t<?php endif; ?>
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
        return "@pct_theme_templates/customelements/customelement_headline_extended.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_headline_extended.css|static';
\$element = \$this->field('headline_type')->value();
\$type = \$this->field('headline_type')->value();
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}

\$type = str_replace('.', '', \$type);
?>

<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('align')->value(); ?><?php if(\$this->field('invert')->value()): ?> color-white<?php endif; ?> block\" <?php echo \$this->cssID; ?>style=\"<?php if(\$this->field('max_width')->value()): ?>max-width:<?php echo \$this->field('max_width')->value(); ?>px;<?php endif; ?><?php if (\$this->style): ?><?php echo \$this->style; ?><?php endif; ?>\">
\t<?php if(\$this->field('background_text')->value()): ?><div class=\"background-text h3\"><?php echo \$this->field('background_text')->value(); ?></div><?php endif; ?>
\t<?php if(\$this->field('headline_part_1')->value() || \$this->field('headline_part_2')->value() || \$this->field('headline_part_3')->value() || \$this->field('headline_part_4')->value()): ?>
\t<<?= \$element; ?> class=\"<?= \$type; ?>\"><?php echo \$this->field('headline_part_1')->value(); ?><?php if(\$this->field('headline_part_2')->value()): ?> <span class=\"color-accent\"><?php echo \$this->field('headline_part_2')->value(); ?></span><?php endif; ?><?php if(\$this->field('headline_part_3')->value()): ?> <?php echo \$this->field('headline_part_3')->value(); ?><?php endif; ?><?php if(\$this->field('headline_part_4')->value()): ?> <span class=\"color-accent\"><?php echo \$this->field('headline_part_4')->value(); ?></span><?php endif; ?></<?= \$element; ?>>
\t<?php endif; ?>
</div>", "@pct_theme_templates/customelements/customelement_headline_extended.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_headline_extended.html5");
    }
}
