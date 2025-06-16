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

/* @pct_customelements/customelement_grouped.html5 */
class __TwigTemplate_109e06ef77366a437e608d561fa16e6c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/customelement_grouped.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/customelement_grouped.html5"));

        // line 1
        yield "<?php
/**
 * Custom element grouped template example file
 */
?>
<div class=\"<?php echo \$this->class; ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>

<?php if(!\$this->empty): ?>
<div class=\"content\">
<?php foreach(\$this->groups() as \$group): ?>
<div <?php echo \$group['cssID']; ?> class=\"<?php echo \$group['class']; ?>\">
\t<?php foreach(\$group['fields'] as \$field): ?>\t
\t<div class=\"<?php echo \$field->class; ?>\">
\t\t<div class=\"label\"><?php echo \$field->label; ?></div>
\t\t<div class=\"value\"><?php echo \$field->html(); ?></div>
\t</div>
\t<?php endforeach; ?>
</div>
<?php endforeach; ?>
</div>
<?php else: ?>
<p class=\"info empty\"><?php echo \$this->empty; ?></p>
<?php endif;?>
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
        return "@pct_customelements/customelement_grouped.html5";
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
/**
 * Custom element grouped template example file
 */
?>
<div class=\"<?php echo \$this->class; ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>

<?php if(!\$this->empty): ?>
<div class=\"content\">
<?php foreach(\$this->groups() as \$group): ?>
<div <?php echo \$group['cssID']; ?> class=\"<?php echo \$group['class']; ?>\">
\t<?php foreach(\$group['fields'] as \$field): ?>\t
\t<div class=\"<?php echo \$field->class; ?>\">
\t\t<div class=\"label\"><?php echo \$field->label; ?></div>
\t\t<div class=\"value\"><?php echo \$field->html(); ?></div>
\t</div>
\t<?php endforeach; ?>
</div>
<?php endforeach; ?>
</div>
<?php else: ?>
<p class=\"info empty\"><?php echo \$this->empty; ?></p>
<?php endif;?>
</div>", "@pct_customelements/customelement_grouped.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/customelement_grouped.html5");
    }
}
