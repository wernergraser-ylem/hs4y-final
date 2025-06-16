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

/* @pct_theme_templates/customelements/customelement_infobox.html5 */
class __TwigTemplate_2d010f85decec7c6712824daba6c07ee extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_infobox.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_infobox.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_infobox.css|static';
?>
<?php if(\$this->field('schema')->value() == 'alert'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_alert block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-flash\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>

<?php if(\$this->field('schema')->value() == 'info'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_info block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-bullhorn\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>

<?php if(\$this->field('schema')->value() == 'success'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_success block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-check\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>

<?php if(\$this->field('schema')->value() == 'warning'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_warning block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-warning\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_infobox.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_infobox.css|static';
?>
<?php if(\$this->field('schema')->value() == 'alert'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_alert block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-flash\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>

<?php if(\$this->field('schema')->value() == 'info'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_info block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-bullhorn\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>

<?php if(\$this->field('schema')->value() == 'success'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_success block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-check\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>

<?php if(\$this->field('schema')->value() == 'warning'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_warning block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-warning\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>", "@pct_theme_templates/customelements/customelement_infobox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_infobox.html5");
    }
}
