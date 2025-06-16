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

/* @pct_theme_templates/customelements/customelement_linkbox.html5 */
class __TwigTemplate_65b76058084f674b73cb918d9cdc36e3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_linkbox.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_linkbox.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_linkbox.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('frame')->value(); ?> block<?php if(\$this->field('margin_top')->value()): ?> <?php echo \$this->field('margin_top')->value(); ?><?php endif; ?><?php if(\$this->field('margin_bottom')->value()): ?> <?php echo \$this->field('margin_bottom')->value(); ?><?php endif; ?><?php if(\$this->field('margin_top_mobile')->value()): ?> <?php echo \$this->field('margin_top_mobile')->value(); ?><?php endif; ?><?php if(\$this->field('margin_bottom_mobile')->value()): ?> <?php echo \$this->field('margin_bottom_mobile')->value(); ?><?php endif; ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t
\t<?php if(\$this->field('schema')->value() == 'version5'): ?>
\t<!--linkbox version 5 [start]-->
\t
\t<?php if (\$this->field('link')->value()): ?>
\t<a href=\"<?php echo \$this->field('link')->value(); ?>\" class=\"ce_linkbox_link\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>>
\t<?php endif; ?>
\t
\t<div class=\"ce_linkbox_image\">\t\t
\t\t<?php if (\$this->field('banner')->value()): ?><div class=\"ce_linkbox_banner\"><?php echo \$this->field('banner')->value(); ?></div><?php endif; ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t\t<div class=\"ce_linkbox_overlay\"<?php if (\$this->field('bg_color')->value()): ?> style=\"background-color:rgba(<?php echo \$this->field('bg_color')->value(); ?>)\"<?php endif; ?>></div>
\t</div>
\t
\t<?php if(\$this->field('headline')->value() || \$this->field('text')->value()): ?>
\t<div class=\"content\">
\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t<?php echo \$this->field('text')->value(); ?>
\t</div>
\t<?php endif; ?>
\t
\t<?php if (\$this->field('link')->value()): ?>
\t</a>
\t<?php endif; ?>
\t<!--linkbox version 5 [end]-->
\t
\t<?php else: ?>
\t
\t<!--linkbox version 1,2,3,4 [start]-->
\t<div class=\"ce_linkbox_image\">
\t\t<?php if (\$this->field('link')->value()): ?>
\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\" class=\"ce_linkbox_link\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>>
\t\t\t<div class=\"ce_linkbox_overlay\"<?php if (\$this->field('bg_color')->value()): ?> style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\"<?php endif; ?>><i></i></div>
\t\t\t<?php endif; ?>
\t\t<?php if (\$this->field('link')->value()): ?>
\t\t</a>
\t\t<?php endif; ?>
\t\t<?php if (\$this->field('banner')->value()): ?><div class=\"ce_linkbox_banner\"><?php echo \$this->field('banner')->value(); ?></div><?php endif; ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t</div>
\t
\t<?php if(\$this->field('headline')->value() || \$this->field('text')->value()): ?>
\t<div class=\"content\">
\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t<?php echo \$this->field('text')->value(); ?>
\t</div>
\t<?php endif; ?>
\t<!--linkbox version 1,2,3,4 [end]-->
\t
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
        return "@pct_theme_templates/customelements/customelement_linkbox.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_linkbox.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('frame')->value(); ?> block<?php if(\$this->field('margin_top')->value()): ?> <?php echo \$this->field('margin_top')->value(); ?><?php endif; ?><?php if(\$this->field('margin_bottom')->value()): ?> <?php echo \$this->field('margin_bottom')->value(); ?><?php endif; ?><?php if(\$this->field('margin_top_mobile')->value()): ?> <?php echo \$this->field('margin_top_mobile')->value(); ?><?php endif; ?><?php if(\$this->field('margin_bottom_mobile')->value()): ?> <?php echo \$this->field('margin_bottom_mobile')->value(); ?><?php endif; ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t
\t<?php if(\$this->field('schema')->value() == 'version5'): ?>
\t<!--linkbox version 5 [start]-->
\t
\t<?php if (\$this->field('link')->value()): ?>
\t<a href=\"<?php echo \$this->field('link')->value(); ?>\" class=\"ce_linkbox_link\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>>
\t<?php endif; ?>
\t
\t<div class=\"ce_linkbox_image\">\t\t
\t\t<?php if (\$this->field('banner')->value()): ?><div class=\"ce_linkbox_banner\"><?php echo \$this->field('banner')->value(); ?></div><?php endif; ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t\t<div class=\"ce_linkbox_overlay\"<?php if (\$this->field('bg_color')->value()): ?> style=\"background-color:rgba(<?php echo \$this->field('bg_color')->value(); ?>)\"<?php endif; ?>></div>
\t</div>
\t
\t<?php if(\$this->field('headline')->value() || \$this->field('text')->value()): ?>
\t<div class=\"content\">
\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t<?php echo \$this->field('text')->value(); ?>
\t</div>
\t<?php endif; ?>
\t
\t<?php if (\$this->field('link')->value()): ?>
\t</a>
\t<?php endif; ?>
\t<!--linkbox version 5 [end]-->
\t
\t<?php else: ?>
\t
\t<!--linkbox version 1,2,3,4 [start]-->
\t<div class=\"ce_linkbox_image\">
\t\t<?php if (\$this->field('link')->value()): ?>
\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\" class=\"ce_linkbox_link\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>>
\t\t\t<div class=\"ce_linkbox_overlay\"<?php if (\$this->field('bg_color')->value()): ?> style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\"<?php endif; ?>><i></i></div>
\t\t\t<?php endif; ?>
\t\t<?php if (\$this->field('link')->value()): ?>
\t\t</a>
\t\t<?php endif; ?>
\t\t<?php if (\$this->field('banner')->value()): ?><div class=\"ce_linkbox_banner\"><?php echo \$this->field('banner')->value(); ?></div><?php endif; ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t</div>
\t
\t<?php if(\$this->field('headline')->value() || \$this->field('text')->value()): ?>
\t<div class=\"content\">
\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t<?php echo \$this->field('text')->value(); ?>
\t</div>
\t<?php endif; ?>
\t<!--linkbox version 1,2,3,4 [end]-->
\t
\t<?php endif; ?>
</div>", "@pct_theme_templates/customelements/customelement_linkbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_linkbox.html5");
    }
}
