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

/* @pct_theme_templates/customelements/customelement_imagemap_content.html5 */
class __TwigTemplate_5d388fbfaa6cd176d560812a79906738 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_imagemap_content.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_imagemap_content.html5"));

        // line 1
        yield "<div id=\"hotspot_<?= \$this->id; ?>\" class=\"hotspot <?php echo \$GLOBALS['ce_imagemap_hotspot_size']; ?>\" style=\"top: <?php echo \$this->field('vposition')->value(); ?>%; left: <?php echo \$this->field('hposition')->value(); ?>%;\">
\t<div class=\"circle\"></div>
\t<div>
\t\t<div class=\"hotspot_content <?php echo \$this->field('content_position')->value(); ?>\">
\t\t\t<?php echo \$this->field('hotspot_content')->value(); ?>
\t\t</div>
\t</div>
\t
\t<!-- SEO-SCRIPT-START -->
\t<script>
\tjQuery(document).ready(function() 
\t{
\t\tjQuery('#hotspot_<?= \$this->id; ?>').click(function()
\t\t{
\t\t\tjQuery(this).toggleClass('active');
\t\t});
\t});
\t</script>
\t<!-- SEO-SCRIPT-STOP -->

</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_imagemap_content.html5";
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
        return new Source("<div id=\"hotspot_<?= \$this->id; ?>\" class=\"hotspot <?php echo \$GLOBALS['ce_imagemap_hotspot_size']; ?>\" style=\"top: <?php echo \$this->field('vposition')->value(); ?>%; left: <?php echo \$this->field('hposition')->value(); ?>%;\">
\t<div class=\"circle\"></div>
\t<div>
\t\t<div class=\"hotspot_content <?php echo \$this->field('content_position')->value(); ?>\">
\t\t\t<?php echo \$this->field('hotspot_content')->value(); ?>
\t\t</div>
\t</div>
\t
\t<!-- SEO-SCRIPT-START -->
\t<script>
\tjQuery(document).ready(function() 
\t{
\t\tjQuery('#hotspot_<?= \$this->id; ?>').click(function()
\t\t{
\t\t\tjQuery(this).toggleClass('active');
\t\t});
\t});
\t</script>
\t<!-- SEO-SCRIPT-STOP -->

</div>", "@pct_theme_templates/customelements/customelement_imagemap_content.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_imagemap_content.html5");
    }
}
