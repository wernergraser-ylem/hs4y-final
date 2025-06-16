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

/* @pct_themer/themedesigner/js/js_stylesheet.html5 */
class __TwigTemplate_6367abc8b6822fec605ae118fa4bb9be extends Template
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

jQuery(document).ready(function()
{
\t// set the base variables
\t<?php echo \$this->baseVariables; ?>

\tvar objData = <?php echo json_encode(\$this->ThemeDesigner->getData(true)); ?>;
\tvar objFonts = <?php echo json_encode(\$this->ThemeDesigner->getFonts()); ?>;
\t
\tvar prepareCSS = function(objData)
\t{
\t\tif(objData === undefined)
\t\t{
\t\t\t// get the current data from the storage
\t\t\tobjData = ThemeDesigner.storage();
\t\t}

\t\tcss = '';

\t\t<?php echo \$this->js; ?>

\t\treturn css;
\t}
\t
\t// apply CSS on page load\t
\tvar css = prepareCSS(objData);
\tif(css.length > 0)
\t{
\t\t// remove the last style
\t\tjQuery('#themedesigner_style').remove();
\t\t// include new style
\t\tjQuery('head').append('<style type=\"text/css\" id=\"themedesigner_style\">'+css+'</style>');

\t\t// remove the last style in iframe
\t\tjQuery('#themedesigner_iframe').contents().find('#themedesigner_style').remove();
\t\t// include new style in iframe
\t\tjQuery('#themedesigner_iframe').contents().find('head').append('<style type=\"text/css\" id=\"themedesigner_style\">'+css+'</style>');
\t}
\t
\t/**
\t * Apply CSS on ThemeDesigner value changes
\t */
\tjQuery(document).on('ThemeDesigner.onValue',function(event,params)
\t{
\t\tvar name = params.name;
\t\tvar value = params.value;
\t\t
\t\t// rmeove from storage
\t\tif(value == null)
\t\t{
\t\t\tThemeDesigner.removeFromStorage(name);
\t\t}
\t\t
\t\tvar objFont = objFonts[value];
\t\t
\t\tvar objData = ThemeDesigner.storage();
\t\tif(objFont)
\t\t{
\t\t\tif(objFont.family)
\t\t\t{
\t\t\t\t// update storage
\t\t\t\tThemeDesigner.storage(name,objFont.family);
\t\t\t\t// get the current data from the storage
\t\t\t\tobjData[name] = objFont.family;
\t\t\t}
\t\t}
\t\t
\t\tvar css = prepareCSS(objData);

\t\tif(css.length > 0)
\t\t{
\t\t\t// remove the last style
\t\t\tjQuery('#themedesigner_style').remove();
\t\t\t// include new style
\t\t\tjQuery('head').append('<style type=\"text/css\" id=\"themedesigner_style\">'+css+'</style>');

\t\t\t// remove the last style in iframe
\t\t\tjQuery('#themedesigner_iframe').contents().find('#themedesigner_style').remove();
\t\t\t// include new style in iframe
\t\t\tjQuery('#themedesigner_iframe').contents().find('head').append('<style type=\"text/css\" id=\"themedesigner_style\">'+css+'</style>');
\t\t}
\t\telse
\t\t{
\t\t\tjQuery('#themedesigner_style').remove();
\t\t\tjQuery('#themedesigner_iframe').contents().find('#themedesigner_style').remove();
\t\t}
\t});
});

/* ]]> */
</script>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/js/js_stylesheet.html5";
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
        return new Source("", "@pct_themer/themedesigner/js/js_stylesheet.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/js/js_stylesheet.html5");
    }
}
