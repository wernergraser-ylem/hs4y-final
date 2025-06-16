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

/* @pct_themer/themedesigner/js/js_themedesigner_selector.html5 */
class __TwigTemplate_888bf17c5384e33f5012e9d82a5e874c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/js/js_themedesigner_selector.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/js/js_themedesigner_selector.html5"));

        // line 1
        yield "

<script>
/* <![CDATA[ */

/**
 * Call the ThemeDesigner selector method on change and bind ThemeDesigner.onSelector event to effected elements
 */
jQuery(document).ready(function() 
{
\tvar objElement = ThemeDesigner.findByName('<?= \$this->selector; ?>');
\tif(objElement === null)
\t{
\t\treturn;
\t}
\t
\tobjElement.change(function(event) 
\t{
\t\tThemeDesigner.selector('<?= \$this->selector; ?>','<?= \$this->value; ?>','<?= \$this->json_effected; ?>');
\t});
\t
\t// autoregister ThemeDesigner.onSelector event listener
\t<?php foreach(\$this->effected as \$field => \$value): ?>
\t
\tvar element = ThemeDesigner.findByName('<?= \$field; ?>');
\tif(element !== null)
\t{
\t\telement.on('ThemeDesigner.onSelector',function(event,params) 
\t\t{
\t\t\t// do something
\t\t});
\t}
\t<?php endforeach; ?>
});

/* ]]> */
</script>


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
        return "@pct_themer/themedesigner/js/js_themedesigner_selector.html5";
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

<script>
/* <![CDATA[ */

/**
 * Call the ThemeDesigner selector method on change and bind ThemeDesigner.onSelector event to effected elements
 */
jQuery(document).ready(function() 
{
\tvar objElement = ThemeDesigner.findByName('<?= \$this->selector; ?>');
\tif(objElement === null)
\t{
\t\treturn;
\t}
\t
\tobjElement.change(function(event) 
\t{
\t\tThemeDesigner.selector('<?= \$this->selector; ?>','<?= \$this->value; ?>','<?= \$this->json_effected; ?>');
\t});
\t
\t// autoregister ThemeDesigner.onSelector event listener
\t<?php foreach(\$this->effected as \$field => \$value): ?>
\t
\tvar element = ThemeDesigner.findByName('<?= \$field; ?>');
\tif(element !== null)
\t{
\t\telement.on('ThemeDesigner.onSelector',function(event,params) 
\t\t{
\t\t\t// do something
\t\t});
\t}
\t<?php endforeach; ?>
});

/* ]]> */
</script>


", "@pct_themer/themedesigner/js/js_themedesigner_selector.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/js/js_themedesigner_selector.html5");
    }
}
