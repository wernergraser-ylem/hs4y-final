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
class __TwigTemplate_0613b40e24537e58b8e6b6973f97a85a extends Template
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_datepicker.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/filters/customcatalog_filter_datepicker.html5");
    }
}
