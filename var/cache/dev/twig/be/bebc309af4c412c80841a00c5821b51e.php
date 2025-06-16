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

/* @pct_theme_templates/modules/mod_html_header_smallview_trigger.html5 */
class __TwigTemplate_aa8bd8dd5978d27a8267091f33a67cb3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_html_header_smallview_trigger.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_html_header_smallview_trigger.html5"));

        // line 1
        yield "<div class=\"sidebar_trigger\" title=\"Toggle sidebar\">
\t<div class=\"burger rotate\">
\t\t<div class=\"burger_lines\"></div>
\t</div>
</div>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\tif( localStorage.getItem('Eclipse.sidebar_closed') == 1 )
\t{
\t\tjQuery('body').addClass('sidebar_closed');
\t}
\t
\tjQuery('.sidebar_trigger').click(function(e) 
\t{
\t\te.preventDefault();
\t\te.stopImmediatePropagation();
\t\t
\t\tif( localStorage.getItem('Eclipse.sidebar_closed') == 1 )
\t\t{
\t\t\tlocalStorage.removeItem('Eclipse.sidebar_closed')
\t\t}
\t\telse
\t\t{
\t\t\tlocalStorage.setItem('Eclipse.sidebar_closed',1);
\t\t}
\t\tjQuery('body').toggleClass('sidebar_closed');
\t\t// fire resize event
\t\tsetTimeout(function() 
\t\t{
\t\t\tjQuery(window).trigger('resize');
\t\t}, 400);
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_html_header_smallview_trigger.html5";
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
        return new Source("<div class=\"sidebar_trigger\" title=\"Toggle sidebar\">
\t<div class=\"burger rotate\">
\t\t<div class=\"burger_lines\"></div>
\t</div>
</div>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\tif( localStorage.getItem('Eclipse.sidebar_closed') == 1 )
\t{
\t\tjQuery('body').addClass('sidebar_closed');
\t}
\t
\tjQuery('.sidebar_trigger').click(function(e) 
\t{
\t\te.preventDefault();
\t\te.stopImmediatePropagation();
\t\t
\t\tif( localStorage.getItem('Eclipse.sidebar_closed') == 1 )
\t\t{
\t\t\tlocalStorage.removeItem('Eclipse.sidebar_closed')
\t\t}
\t\telse
\t\t{
\t\t\tlocalStorage.setItem('Eclipse.sidebar_closed',1);
\t\t}
\t\tjQuery('body').toggleClass('sidebar_closed');
\t\t// fire resize event
\t\tsetTimeout(function() 
\t\t{
\t\t\tjQuery(window).trigger('resize');
\t\t}, 400);
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/modules/mod_html_header_smallview_trigger.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_html_header_smallview_trigger.html5");
    }
}
