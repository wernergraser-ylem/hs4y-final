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

/* @pct_themer/themedesigner/forms/td_form_checkbox_single.html5 */
class __TwigTemplate_d7d847840709fc646e63beb7d0d6bf35 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/forms/td_form_checkbox_single.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/forms/td_form_checkbox_single.html5"));

        // line 1
        yield "<fieldset id=\"ctrl_<?= \$this->id ?>\" class=\"checkbox_container<?php if (\$this->class) echo ' ' . \$this->class; ?>\">


<?php if(\$this->description):?>
<div class=\"description\">
\t<i class=\"fa fa-info\"></i>
\t<div class=\"description-content\">
\t\t<?= \$this->description; ?>
\t</div>
</div>
<?php endif; ?>

<input data-td_selector=\"<?= \$this->selector; ?>\" type=\"checkbox\" name=\"<?= \$this->name; ?>\" id=\"ctrl_<?= \$this->name; ?>\" class=\"checkbox\" value=\"<?= \$this->value ?>\" <?= \$this->value ? 'checked' : ''; ?> <?= \$this->getAttributes(); ?>>

<script>
/* <![CDATA[ */

/**
 * Add the ThemeDesigner.onSetValue event listener to react to changes by selectors etc.
 */
jQuery(document).ready(function()
{
\t// catch onToggleSwitch event of the parent switch
\tjQuery('[data-init_switch=\"1\"][data-name=\"<?= \$this->switch; ?>\"]').on('ThemeDesigner.onToggleSwitch',function(event,params)
\t{
\t\tvar checkbox = jQuery('[data-td_selector=\"<?= \$this->selector; ?>\"]');
\t\t
\t\tif(params.status < 1)
\t\t{
\t\t\t checkbox.prop('checked',false).val(0);
\t\t}
\t\telse
\t\t{
\t\t\tcheckbox.prop('checked',true).val(1);
\t\t}

\t\t// send new value
\t\tThemeDesigner.sendValue('<?= \$this->selector; ?>',checkbox.val());

\t\t// trigger change
\t\tcheckbox.trigger('change');
\t});
\t
\tjQuery('[data-td_selector=\"<?= \$this->selector; ?>\"]').on('ThemeDesigner.onSetValue',function(event,params)
\t{
\t\tvar elem = jQuery(event.target);
\t\t
\t\tif(elem.length < 1)
\t\t{
\t\t\treturn;
\t\t}

\t\tif(params.value < 1)
\t\t{
\t\t   elem.prop('checked',false).val(0);
\t\t}
\t\telse
\t\t{
\t\t   elem.prop('checked',true).val(1);
\t\t}

\t\t// send value
\t\tThemeDesigner.sendValue(event.target.name,elem.val());

\t\t// trigger change
\t\tcheckbox.trigger('change');
\t});
});

/* ]]> */
</script>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/forms/td_form_checkbox_single.html5";
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
        return new Source("<fieldset id=\"ctrl_<?= \$this->id ?>\" class=\"checkbox_container<?php if (\$this->class) echo ' ' . \$this->class; ?>\">


<?php if(\$this->description):?>
<div class=\"description\">
\t<i class=\"fa fa-info\"></i>
\t<div class=\"description-content\">
\t\t<?= \$this->description; ?>
\t</div>
</div>
<?php endif; ?>

<input data-td_selector=\"<?= \$this->selector; ?>\" type=\"checkbox\" name=\"<?= \$this->name; ?>\" id=\"ctrl_<?= \$this->name; ?>\" class=\"checkbox\" value=\"<?= \$this->value ?>\" <?= \$this->value ? 'checked' : ''; ?> <?= \$this->getAttributes(); ?>>

<script>
/* <![CDATA[ */

/**
 * Add the ThemeDesigner.onSetValue event listener to react to changes by selectors etc.
 */
jQuery(document).ready(function()
{
\t// catch onToggleSwitch event of the parent switch
\tjQuery('[data-init_switch=\"1\"][data-name=\"<?= \$this->switch; ?>\"]').on('ThemeDesigner.onToggleSwitch',function(event,params)
\t{
\t\tvar checkbox = jQuery('[data-td_selector=\"<?= \$this->selector; ?>\"]');
\t\t
\t\tif(params.status < 1)
\t\t{
\t\t\t checkbox.prop('checked',false).val(0);
\t\t}
\t\telse
\t\t{
\t\t\tcheckbox.prop('checked',true).val(1);
\t\t}

\t\t// send new value
\t\tThemeDesigner.sendValue('<?= \$this->selector; ?>',checkbox.val());

\t\t// trigger change
\t\tcheckbox.trigger('change');
\t});
\t
\tjQuery('[data-td_selector=\"<?= \$this->selector; ?>\"]').on('ThemeDesigner.onSetValue',function(event,params)
\t{
\t\tvar elem = jQuery(event.target);
\t\t
\t\tif(elem.length < 1)
\t\t{
\t\t\treturn;
\t\t}

\t\tif(params.value < 1)
\t\t{
\t\t   elem.prop('checked',false).val(0);
\t\t}
\t\telse
\t\t{
\t\t   elem.prop('checked',true).val(1);
\t\t}

\t\t// send value
\t\tThemeDesigner.sendValue(event.target.name,elem.val());

\t\t// trigger change
\t\tcheckbox.trigger('change');
\t});
});

/* ]]> */
</script>", "@pct_themer/themedesigner/forms/td_form_checkbox_single.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/forms/td_form_checkbox_single.html5");
    }
}
