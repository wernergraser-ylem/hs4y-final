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

/* @pct_theme_templates/customelements/customelement_featurelist.html5 */
class __TwigTemplate_a514dc6aa3c0d4ebfe40d4ebc4278d1f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_featurelist.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_featurelist.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_featurelist.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('style')->value(); ?> <?php echo \$this->field('columns')->value(); ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_featurelist_inside\">
\t\t<ul>
\t\t<?php foreach(\$this->group('item') as \$i => \$fields): ?>
\t\t\t<li class=\"item item_<?php echo \$i; ?>\">
\t\t\t\t<?php if(\$this->field('link#'.\$i)->value()): ?>
\t\t\t\t<a href=\"<?php echo \$this->field('link#'.\$i)->value(); ?>\" title=\"<?php echo \$this->field('link#'.\$i)->option('titleText'); ?>\"<?php if(\$this->field('link#'.\$i)->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link#'.\$i)->option('lightbox')): ?><?php echo \$this->field('link#'.\$i)->option('lightbox'); ?><?php endif; ?>>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('font_icon#'.\$i)->value()): ?><i class=\"icon <?php echo \$this->field('font_icon#'.\$i)->value(); ?>\"></i><?php endif; ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('image_icon#'.\$i)->value()): ?><div class=\"icon\"><?php echo \$this->field('image_icon#'.\$i)->html(); ?></div><?php endif; ?>
\t\t\t\t
\t\t\t\t<span><?php echo \$this->field('item#'.\$i)->value(); ?></span>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('link#'.\$i)->value()): ?>
\t\t\t\t</a>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t</li>
\t\t
\t\t<?php endforeach; ?>
\t\t</ul>
\t</div>
</div>

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
        return "@pct_theme_templates/customelements/customelement_featurelist.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_featurelist.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('style')->value(); ?> <?php echo \$this->field('columns')->value(); ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_featurelist_inside\">
\t\t<ul>
\t\t<?php foreach(\$this->group('item') as \$i => \$fields): ?>
\t\t\t<li class=\"item item_<?php echo \$i; ?>\">
\t\t\t\t<?php if(\$this->field('link#'.\$i)->value()): ?>
\t\t\t\t<a href=\"<?php echo \$this->field('link#'.\$i)->value(); ?>\" title=\"<?php echo \$this->field('link#'.\$i)->option('titleText'); ?>\"<?php if(\$this->field('link#'.\$i)->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link#'.\$i)->option('lightbox')): ?><?php echo \$this->field('link#'.\$i)->option('lightbox'); ?><?php endif; ?>>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('font_icon#'.\$i)->value()): ?><i class=\"icon <?php echo \$this->field('font_icon#'.\$i)->value(); ?>\"></i><?php endif; ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('image_icon#'.\$i)->value()): ?><div class=\"icon\"><?php echo \$this->field('image_icon#'.\$i)->html(); ?></div><?php endif; ?>
\t\t\t\t
\t\t\t\t<span><?php echo \$this->field('item#'.\$i)->value(); ?></span>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('link#'.\$i)->value()): ?>
\t\t\t\t</a>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t</li>
\t\t
\t\t<?php endforeach; ?>
\t\t</ul>
\t</div>
</div>

", "@pct_theme_templates/customelements/customelement_featurelist.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_featurelist.html5");
    }
}
