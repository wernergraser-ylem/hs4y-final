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

/* @pct_frontend_quickedit/widgets/be_widget_sizes_wizard.html5 */
class __TwigTemplate_23b8da8420076f4011b3cf92c91d1830 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_frontend_quickedit/widgets/be_widget_sizes_wizard.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_frontend_quickedit/widgets/be_widget_sizes_wizard.html5"));

        // line 1
        yield "
<input type=\"hidden\" name=\"<?= \$this->name; ?>\" value=\"<?= \$this->value; ?>\">
<div class=\"pct_sizes_wizard select_container\">
  <?php foreach(\$this->selects as \$k => \$select): ?>
  <div class=\"select_container select_<?= \$k; ?>\">
    <?php if(\$select['label']): ?><legend><?= \$select['label']; ?></legend><?php endif; ?>
    <select name=\"<?= \$select['name']; ?>\" id=\"ctrl_<?= \$select['name']; ?>\" class=\"tl_select\" onfocus=\"Backend.getScrollOffset()\">
    <?php foreach(\$select['options'] as \$option): ?>
    <option value=\"<?php echo \$option['value']; ?>\"<?php if(\$option['selected']):?>selected<?php endif;?>><?php echo \$option['label']; ?></option>
    <?php endforeach; ?>
    </select>
    </div>
  <?php endforeach; ?>
</div>

<style>
.pct_sizes_wizard .select_container {margin-bottom: 5px;}
.pct_sizes_wizard .select_container:first-child {margin-top: 10px;}
</style>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_frontend_quickedit/widgets/be_widget_sizes_wizard.html5";
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
        return new Source("
<input type=\"hidden\" name=\"<?= \$this->name; ?>\" value=\"<?= \$this->value; ?>\">
<div class=\"pct_sizes_wizard select_container\">
  <?php foreach(\$this->selects as \$k => \$select): ?>
  <div class=\"select_container select_<?= \$k; ?>\">
    <?php if(\$select['label']): ?><legend><?= \$select['label']; ?></legend><?php endif; ?>
    <select name=\"<?= \$select['name']; ?>\" id=\"ctrl_<?= \$select['name']; ?>\" class=\"tl_select\" onfocus=\"Backend.getScrollOffset()\">
    <?php foreach(\$select['options'] as \$option): ?>
    <option value=\"<?php echo \$option['value']; ?>\"<?php if(\$option['selected']):?>selected<?php endif;?>><?php echo \$option['label']; ?></option>
    <?php endforeach; ?>
    </select>
    </div>
  <?php endforeach; ?>
</div>

<style>
.pct_sizes_wizard .select_container {margin-bottom: 5px;}
.pct_sizes_wizard .select_container:first-child {margin-top: 10px;}
</style>", "@pct_frontend_quickedit/widgets/be_widget_sizes_wizard.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_frontend_quickedit/templates/widgets/be_widget_sizes_wizard.html5");
    }
}
