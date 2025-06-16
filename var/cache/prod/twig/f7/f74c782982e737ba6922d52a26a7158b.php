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

/* @pct_privacy_manager/privacy_webfonts.html5 */
class __TwigTemplate_cceb40e46b65b9236c9bc68925a657c7 extends Template
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
// Optin privacy setting token
var token = localStorage.getItem('user_privacy_settings');
if( token == undefined )
{
\ttoken = '';
}
if(token.indexOf(2) >= 0)
{
\tjQuery('head').append('<link id=\"webfonts_optin\" rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=<?= \$this->webfonts; ?>\">');
}

// listen to privacy event
jQuery(document).on('Privacy.changed',function(event,params)
{
\tif(params.level.indexOf(2) >= 0)
\t{
\t\tjQuery('head').append('<link id=\"webfonts_optin\" rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=<?= \$this->webfonts; ?>\">');
\t}
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_privacy_manager/privacy_webfonts.html5";
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
        return new Source("", "@pct_privacy_manager/privacy_webfonts.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_privacy_manager/templates/privacy_webfonts.html5");
    }
}
