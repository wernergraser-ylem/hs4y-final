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

/* @pct_customelements_plugin_customcatalog/filters/customcatalog_filter_datepicker.html5 */
class __TwigTemplate_83d506d8c11a6da18074c1ece3014f55 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_datepicker.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_datepicker.html5"));

        // line 1
        yield "<?php
/**
 * Timestamp/date filter template
 */
?>
<?php 
global \$objPage;
\$GLOBALS['TL_CSS'][] = PCT_CUSTOMCATALOG_PATH.'/assets/js/jquery/ui/themes/smoothness/jquery-ui.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_CUSTOMCATALOG_PATH.'/assets/js/jquery/ui/jquery-ui.min.js';\t
?>

<script>
/**
 * Datepicker
 * @link http://jqueryui.com/datepicker/
 */
jQuery(document).ready(function()
{
\tjQuery(\"#filter_timestamp_<?php echo \$this->id; ?>\").datepicker({dateFormat:\"yy-mm-dd\"});
});
</script>


<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"timestamp_container\">
<legend><?php echo \$this->label; ?></legend>
<input type=\"text\" id=\"filter_timestamp_<?php echo \$this->id; ?>\" name=\"<?php echo \$this->name; ?>\" value=\"<?php echo \$this->value; ?>\">
</fieldset>
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
        return "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_datepicker.html5";
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
        return new Source("<?php
/**
 * Timestamp/date filter template
 */
?>
<?php 
global \$objPage;
\$GLOBALS['TL_CSS'][] = PCT_CUSTOMCATALOG_PATH.'/assets/js/jquery/ui/themes/smoothness/jquery-ui.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_CUSTOMCATALOG_PATH.'/assets/js/jquery/ui/jquery-ui.min.js';\t
?>

<script>
/**
 * Datepicker
 * @link http://jqueryui.com/datepicker/
 */
jQuery(document).ready(function()
{
\tjQuery(\"#filter_timestamp_<?php echo \$this->id; ?>\").datepicker({dateFormat:\"yy-mm-dd\"});
});
</script>


<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"timestamp_container\">
<legend><?php echo \$this->label; ?></legend>
<input type=\"text\" id=\"filter_timestamp_<?php echo \$this->id; ?>\" name=\"<?php echo \$this->name; ?>\" value=\"<?php echo \$this->value; ?>\">
</fieldset>
</div>", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_datepicker.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/filters/customcatalog_filter_datepicker.html5");
    }
}
