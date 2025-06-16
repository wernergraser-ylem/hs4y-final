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

/* @pct_theme_templates/modules/mod_customcatalogfilter_mobile_trigger.html5 */
class __TwigTemplate_7ba24dd5a65b6947187ed1f5f5d60b23 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_customcatalogfilter_mobile_trigger.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_customcatalogfilter_mobile_trigger.html5"));

        // line 1
        yield "<div class=\"<?php echo \$this->class; ?> mod_customcatalogfilter_<?php echo \$this->id; ?> mobile_trigger_filter block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
<?php if (\$this->headline): ?>
<<?php echo \$this->hl; ?>><?php echo \$this->headline; ?></<?php echo \$this->hl; ?>>
<?php endif; ?>
<div class=\"mobile_trigger\"><i class=\"fa fa-filter\"></i></div>
<?php include \$this->getTemplate('form_customcatalog_filter', 'html5'); ?>

</div>
<!-- SEO-SCRIPT-START -->
<script>
\tjQuery(document).ready(function(){ 
\t\tjQuery('.mod_customcatalogfilter_<?php echo \$this->id; ?> .mobile_trigger').click(function(){
\t\t\tjQuery('.mod_customcatalogfilter_<?php echo \$this->id; ?> .filterform').toggleClass('show_filter');
\t\t});
\t});
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
        return "@pct_theme_templates/modules/mod_customcatalogfilter_mobile_trigger.html5";
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
        return new Source("<div class=\"<?php echo \$this->class; ?> mod_customcatalogfilter_<?php echo \$this->id; ?> mobile_trigger_filter block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
<?php if (\$this->headline): ?>
<<?php echo \$this->hl; ?>><?php echo \$this->headline; ?></<?php echo \$this->hl; ?>>
<?php endif; ?>
<div class=\"mobile_trigger\"><i class=\"fa fa-filter\"></i></div>
<?php include \$this->getTemplate('form_customcatalog_filter', 'html5'); ?>

</div>
<!-- SEO-SCRIPT-START -->
<script>
\tjQuery(document).ready(function(){ 
\t\tjQuery('.mod_customcatalogfilter_<?php echo \$this->id; ?> .mobile_trigger').click(function(){
\t\t\tjQuery('.mod_customcatalogfilter_<?php echo \$this->id; ?> .filterform').toggleClass('show_filter');
\t\t});
\t});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/modules/mod_customcatalogfilter_mobile_trigger.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_customcatalogfilter_mobile_trigger.html5");
    }
}
