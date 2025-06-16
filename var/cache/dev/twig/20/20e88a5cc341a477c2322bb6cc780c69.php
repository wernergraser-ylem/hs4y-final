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

/* @pct_customelements_plugin_customcatalog/filters/customcatalog_filter_linklist.html5 */
class __TwigTemplate_9e461b9dc2e70c94070b73b28e2564f2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_linklist.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_linklist.html5"));

        // line 1
        yield "<?php
/**
 * Linklist filter template
 */
?>

<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"linklist_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<ul class=\"linklist\">
\t<?php foreach(\$this->options as \$option): ?>
\t<?php if(\$option['selected']): ?>
\t<li id=\"<?php echo \$option['id']; ?>\" class=\"sibling active\"><a class=\"active\" href=\"<?php echo \$option['href']; ?>\" title=\"\"><?php echo \$option['label']; ?></a>
\t<?php else: ?>
\t<li id=\"<?php echo \$option['id']; ?>\" class=\"sibling\"><a href=\"<?php echo \$option['href']; ?>\" title=\"\"><?php echo \$option['label']; ?></a>
\t<?php endif;?>
\t<?php endforeach; ?>
\t</ul>
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>
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
        return "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_linklist.html5";
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
 * Linklist filter template
 */
?>

<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"linklist_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<ul class=\"linklist\">
\t<?php foreach(\$this->options as \$option): ?>
\t<?php if(\$option['selected']): ?>
\t<li id=\"<?php echo \$option['id']; ?>\" class=\"sibling active\"><a class=\"active\" href=\"<?php echo \$option['href']; ?>\" title=\"\"><?php echo \$option['label']; ?></a>
\t<?php else: ?>
\t<li id=\"<?php echo \$option['id']; ?>\" class=\"sibling\"><a href=\"<?php echo \$option['href']; ?>\" title=\"\"><?php echo \$option['label']; ?></a>
\t<?php endif;?>
\t<?php endforeach; ?>
\t</ul>
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>
</div>
", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_linklist.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/filters/customcatalog_filter_linklist.html5");
    }
}
