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

/* @pct_theme_templates/theme/js_themedesigner_webfonts_optin.html5 */
class __TwigTemplate_5607cbf5c311fb5c85b5a16bd3de86c4 extends Template
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
<!-- SEO-SCRIPT-START -->
<script>
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
</script>
<!-- SEO-SCRIPT-STOP -->
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/theme/js_themedesigner_webfonts_optin.html5";
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
        return new Source("", "@pct_theme_templates/theme/js_themedesigner_webfonts_optin.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/js_themedesigner_webfonts_optin.html5");
    }
}
