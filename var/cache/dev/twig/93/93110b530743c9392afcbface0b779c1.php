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

/* @pct_theme_templates/customelements/customelement_featurebox.html5 */
class __TwigTemplate_e9ebd4c5a6e1c55e2b4480944940d615 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_featurebox.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_featurebox.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_featurebox.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('style')->value(); ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_featurebox_inside\">
\t\t<?php if (\$this->field('link')->value()): ?> <a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>><?php endif; ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t\t<div class=\"ce_featurebox_content\">
\t\t\t<?php if (\$this->field('headline_one')->value()): ?><div class=\"headline_one\"><?php echo \$this->field('headline_one')->html(); ?></div><?php endif; ?>
\t\t\t<?php if (\$this->field('headline_two')->value()): ?><div class=\"headline_two\"><?php echo \$this->field('headline_two')->html(); ?></div><?php endif; ?>
\t\t\t<?php if (\$this->field('text')->value()): ?><?php echo \$this->field('text')->html(); ?><?php endif; ?>
\t\t\t<?php if (\$this->field('link')->value()): ?><div class=\"link color-accent\"><?php echo \$this->field('link')->option('linkText'); ?><i class=\"fa fa-long-arrow-right\"></i></div><?php endif; ?>
\t\t</div>
\t\t<?php if (\$this->field('link')->value()): ?></a><?php endif; ?>
\t</div>
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
        return "@pct_theme_templates/customelements/customelement_featurebox.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_featurebox.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('style')->value(); ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_featurebox_inside\">
\t\t<?php if (\$this->field('link')->value()): ?> <a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>><?php endif; ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t\t<div class=\"ce_featurebox_content\">
\t\t\t<?php if (\$this->field('headline_one')->value()): ?><div class=\"headline_one\"><?php echo \$this->field('headline_one')->html(); ?></div><?php endif; ?>
\t\t\t<?php if (\$this->field('headline_two')->value()): ?><div class=\"headline_two\"><?php echo \$this->field('headline_two')->html(); ?></div><?php endif; ?>
\t\t\t<?php if (\$this->field('text')->value()): ?><?php echo \$this->field('text')->html(); ?><?php endif; ?>
\t\t\t<?php if (\$this->field('link')->value()): ?><div class=\"link color-accent\"><?php echo \$this->field('link')->option('linkText'); ?><i class=\"fa fa-long-arrow-right\"></i></div><?php endif; ?>
\t\t</div>
\t\t<?php if (\$this->field('link')->value()): ?></a><?php endif; ?>
\t</div>
</div>", "@pct_theme_templates/customelements/customelement_featurebox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_featurebox.html5");
    }
}
