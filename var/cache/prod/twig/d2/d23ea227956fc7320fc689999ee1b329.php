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

/* @pct_customelements/backend/be_widget_customelement.html5 */
class __TwigTemplate_552558e4d732561da778a9f7fcf7c8e5 extends Template
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
 * CustomElement Widget template file
 */
?>

<?php if(\$this->empty): ?>
<div class=\"customelement_widget empty\"><p class=\"empty\"><?php echo \$this->empty; ?></p></div>
<?php else: ?>
<div class=\"customelement_widget contao-ht35 clr\" data-id=\"<?php echo \$this->customelement_raw->id; ?>\"<?php if(\$this->genericAttribute): ?>data-attr_id=\"<?php echo \$this->genericAttribute; ?>\"<?php endif; ?>>
<!-- clear clipboard button -->
<?php if(\$this->clipboard): ?><div class=\"field clipboard right\"><?php echo \$this->clipboard; ?></div><?php endif;?>
<?php foreach(\$this->groups as \$i => \$group): ?>
<div <?php echo \$group['cssID']; ?> class=\"<?php echo \$group['class']; ?>\" data-id=\"<?php echo \$group['id']; ?>\" data-count=\"<?php echo \$group['count']; ?>\" data-copy=\"<?php echo \$group['numcopy']; ?>\"<?php if(\$this->genericAttribute): ?>data-attr_id=\"<?php echo \$this->genericAttribute; ?>\"<?php endif; ?>>
\t<div class=\"head\">
\t\t<div id=\"group_toggler_<?php echo \$group['ident']; ?>\" class=\"slide_toggler title hasChilds left <?php echo \$group['legend_hide']; ?> <?php if(\$group['isActive']): ?>active<?php endif; ?>\"><?php echo \$group['title']; ?></div>
\t\t<div class=\"buttons right\"><?php echo \$group['buttons']; ?></div>
\t\t<div class=\"clear\"></div>
\t</div>
\t<div id=\"slide_<?php echo \$group['id'].'_'.\$group['numcopy'] ?? 0; ?>\" class=\"field_wrapper slide <?php if(\$group['isActive']): ?>active<?php endif; ?>\">
\t<?php foreach(\$group['fields'] as \$field): ?>
\t<?php echo \$field['html']; ?>
\t<?php endforeach; ?>
\t</div>
\t<div class=\"clear\"></div>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements/backend/be_widget_customelement.html5";
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
        return new Source("", "@pct_customelements/backend/be_widget_customelement.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_widget_customelement.html5");
    }
}
