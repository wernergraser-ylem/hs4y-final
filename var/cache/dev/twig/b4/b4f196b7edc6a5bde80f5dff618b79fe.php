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

/* @pct_customelements_plugin_customcatalog/customcatalog_default.html5 */
class __TwigTemplate_074c69d31ef5141b4e5b9b39deb25252 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/customcatalog_default.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/customcatalog_default.html5"));

        // line 1
        yield "<?php
/**
 * Custom catalog template example file
 */
?>

<div class=\"<?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?>>
<div class=\"title\"><?php echo \$this->title; ?></div>
<?php if(!\$this->empty): ?>
<div class=\"content block\">
<?php foreach(\$this->entries as \$entry): ?>
<div class=\"<?php echo \$entry->get('class'); ?> block\">
\t<?php foreach(\$entry->get('fields') as \$field): ?>\t
\t<?php if(\$field->hidden) {continue;} ?>
\t<div class=\"<?php echo \$field->class; ?>\">
\t\t<div class=\"label\"><?php echo \$field->label; ?></div>
\t\t<div class=\"value\"><?php echo \$field->html(); ?></div>
\t</div>
\t<?php endforeach; ?>
\t
\t<?php if(\$entry->get('more')): ?>
\t<p class=\"more\"><?php echo \$entry->get('more'); ?></p>
\t<?php endif; ?>
\t
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
        return "@pct_customelements_plugin_customcatalog/customcatalog_default.html5";
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
 * Custom catalog template example file
 */
?>

<div class=\"<?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?>>
<div class=\"title\"><?php echo \$this->title; ?></div>
<?php if(!\$this->empty): ?>
<div class=\"content block\">
<?php foreach(\$this->entries as \$entry): ?>
<div class=\"<?php echo \$entry->get('class'); ?> block\">
\t<?php foreach(\$entry->get('fields') as \$field): ?>\t
\t<?php if(\$field->hidden) {continue;} ?>
\t<div class=\"<?php echo \$field->class; ?>\">
\t\t<div class=\"label\"><?php echo \$field->label; ?></div>
\t\t<div class=\"value\"><?php echo \$field->html(); ?></div>
\t</div>
\t<?php endforeach; ?>
\t
\t<?php if(\$entry->get('more')): ?>
\t<p class=\"more\"><?php echo \$entry->get('more'); ?></p>
\t<?php endif; ?>
\t
</div>
<?php endforeach; ?>
</div>
<?php else: ?>
<p class=\"info empty\"><?php echo \$this->empty; ?></p>
<?php endif;?>
</div>", "@pct_customelements_plugin_customcatalog/customcatalog_default.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/customcatalog_default.html5");
    }
}
