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

/* @pct_customelements_plugin_customcatalog/filters/customcatalog_filter_default.html5 */
class __TwigTemplate_26ce822624b63b38d827de768dd865d7 extends Template
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
 * Default filter template
 */
?>

<div <?php echo \$this->cssID; ?> <?php if(\$this->class): ?>class=\"widget <?php echo \$this->class; ?>\"<?php endif; ?>>
<fieldset class=\"default_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<?php if(\$this->label): ?><?php echo \$this->label; ?><?php endif; ?>
\t<?php echo \$this->widget; ?>
\t
\t<?php if(\$this->getFilter()->getModule()->customcatalog_filter_submit && \$this->type == 'text'): ?>
\t<?php \t
\tglobal \$objPage;
\tif(!\$objPage->hasJQuery)
\t{
\t\t\$GLOBALS['TL_JAVASCRIPT'][] = '//code.jquery.com/jquery-1.10.2.js';
\t}\t
\t?>
\t
\t<script>
\tjQuery(document).ready(function() 
\t{
\t\t// submit form on pressing enter
\t\tjQuery('#ctrl_<?php echo \$this->name; ?>').keypress(function(event)
\t\t{
\t\t\tif(event.which == 13) { event.preventDefault(); jQuery(event.target).parents('form').submit(); }
\t\t});
\t});
\t</script>
\t<?php endif; ?>
\t\t
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_default.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_default.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/filters/customcatalog_filter_default.html5");
    }
}
