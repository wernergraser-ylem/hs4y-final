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
class __TwigTemplate_fa8411457ee518e02cd6b33d838492fb extends Template
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_themer/themedesigner/js/js_themedesigner_selector.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/js/js_themedesigner_selector.html5");
    }
}
