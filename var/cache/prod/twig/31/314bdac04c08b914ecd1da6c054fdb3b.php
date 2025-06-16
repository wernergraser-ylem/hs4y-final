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

/* @pct_customelements_plugin_customcatalog/customcatalog_grouped.html5 */
class __TwigTemplate_18ccb2a7b0170c08dbb306be621a78fa extends Template
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
 * Custom catalog template example file
 */
?>

<div class=\"<?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?>>
<div class=\"title\"><?php echo \$this->title; ?></div>
<?php if(!\$this->empty): ?>
<div class=\"content block\">
<?php foreach(\$this->entries as \$entry): ?>
<div class=\"<?php echo \$entry->get('class'); ?> block\">
\t<?php foreach(\$entry->groups() as \$group): ?>
\t<div <?php echo \$group['cssID']; ?> class=\"<?php echo \$group['class']; ?>\">
\t\t<?php foreach(\$group['fields'] as \$field): ?>\t
\t\t<div class=\"<?php echo \$field->class; ?>\">
\t\t\t<div class=\"label\"><?php echo \$field->label; ?></div>
\t\t\t<div class=\"value\"><?php echo \$field->html(); ?></div>
\t\t</div>
\t\t<?php endforeach; ?>
\t</div>
\t<?php endforeach; ?>

\t<?php if(\$entry->get('more')): ?>
\t<p class=\"more\"><?php echo \$entry->get('more'); ?></p>
\t<?php endif; ?>
</div>
<?php endforeach; ?>
</div>
<?php else: ?>
<p class=\"info empty\"><?php echo \$this->empty; ?></p>
<?php endif;?>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/customcatalog_grouped.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/customcatalog_grouped.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/customcatalog_grouped.html5");
    }
}
