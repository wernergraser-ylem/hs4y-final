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

/* @pct_theme_templates/modules/mod_html_mobilenav_trigger.html5 */
class __TwigTemplate_1c5a89668b687b9e1e280ac1d4f087bc extends Template
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
        yield "<div class=\"mmenu_trigger\" title=\"Open mobile navigation\">
\t<div class=\"label\">Menu</div>
\t<div class=\"burger transform\">
\t\t<div class=\"burger_lines\"></div>
\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\tjQuery('.mmenu_trigger').click(function(e) 
\t{
\t\tvar elem = jQuery('#header');
\t\tif( jQuery('body').hasClass('fixed-header') )
\t\t{
\t\t\telem = jQuery('#stickyheader');
\t\t}
\t\tvar delta = elem.position('body').top + elem.height();
\t\tjQuery('#mmenu').css(
\t\t{
\t\t\t'top':delta,
\t\t\t'transform':'translateY(calc(-100% - '+delta+'px))',
\t\t\t'height': 'calc(100% - '+delta+'px)'
\t\t});
\t});
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
        return "@pct_theme_templates/modules/mod_html_mobilenav_trigger.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_html_mobilenav_trigger.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_html_mobilenav_trigger.html5");
    }
}
