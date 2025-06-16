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

/* @pct_customelements_plugin_customcatalog/filters/customcatalog_filter_linklist.html5 */
class __TwigTemplate_cbbbbc4dcc8f37a1d699a5260ae215b4 extends Template
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
 * Linklist filter template
 */
?>

<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"linklist_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<ul class=\"linklist\">
\t<?php foreach(\$this->options as \$option): ?>
\t<?php if(\$option['selected']): ?>
\t<li id=\"<?php echo \$option['id']; ?>\" class=\"sibling active\"><a class=\"active\" href=\"<?php echo \$option['href']; ?>\" title=\"\"><?php echo \$option['label']; ?></a>
\t<?php else: ?>
\t<li id=\"<?php echo \$option['id']; ?>\" class=\"sibling\"><a href=\"<?php echo \$option['href']; ?>\" title=\"\"><?php echo \$option['label']; ?></a>
\t<?php endif;?>
\t<?php endforeach; ?>
\t</ul>
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
        return "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_linklist.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_linklist.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/filters/customcatalog_filter_linklist.html5");
    }
}
