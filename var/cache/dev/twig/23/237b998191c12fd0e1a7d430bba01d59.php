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

/* @pct_themer/themedesigner/js/js_themedesigner_webfonts_optin.html5 */
class __TwigTemplate_b024b2b244c2a1624bec6e389b717a70 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/js/js_themedesigner_webfonts_optin.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/js/js_themedesigner_webfonts_optin.html5"));

        // line 1
        yield "<script>
// create ThemeDesigner class object if not done yet
if(typeof ThemeDesigner == undefined || typeof ThemeDesigner != 'object') {var ThemeDesigner = {};}
// add ThemeDesigner getFonts method to return webfonts information
ThemeDesigner.getFonts = function() 
{
\treturn '<?= \$this->webfonts; ?>';
}

var token = localStorage.getItem('<?= \$this->privacy_session_name; ?>');
if( token == undefined )
{
\ttoken = '';
}
// Opt-in
if(token.indexOf(2) >= 0)
{
\tjQuery('head').append('<link id=\"webfonts_optin\" rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=<?= \$this->webfonts; ?>\">');
}

// listen to Eclipse.user_privacy Event
jQuery(document).on('Eclipse.user_privacy',function(event,params)
{
\tif(params.level.indexOf(2) >= 0)
\t{
\t\tjQuery('head').append('<link id=\"webfonts_optin\" rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=<?= \$this->webfonts; ?>\">');
\t}
});
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
        return "@pct_themer/themedesigner/js/js_themedesigner_webfonts_optin.html5";
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
        return new Source("<script>
// create ThemeDesigner class object if not done yet
if(typeof ThemeDesigner == undefined || typeof ThemeDesigner != 'object') {var ThemeDesigner = {};}
// add ThemeDesigner getFonts method to return webfonts information
ThemeDesigner.getFonts = function() 
{
\treturn '<?= \$this->webfonts; ?>';
}

var token = localStorage.getItem('<?= \$this->privacy_session_name; ?>');
if( token == undefined )
{
\ttoken = '';
}
// Opt-in
if(token.indexOf(2) >= 0)
{
\tjQuery('head').append('<link id=\"webfonts_optin\" rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=<?= \$this->webfonts; ?>\">');
}

// listen to Eclipse.user_privacy Event
jQuery(document).on('Eclipse.user_privacy',function(event,params)
{
\tif(params.level.indexOf(2) >= 0)
\t{
\t\tjQuery('head').append('<link id=\"webfonts_optin\" rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=<?= \$this->webfonts; ?>\">');
\t}
});
</script>", "@pct_themer/themedesigner/js/js_themedesigner_webfonts_optin.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/js/js_themedesigner_webfonts_optin.html5");
    }
}
