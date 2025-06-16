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

/* @pct_customelements/customelement_grouped.html5 */
class __TwigTemplate_a1f88cb5c079a5cac6c0f9e392730412 extends Template
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
 * Custom element grouped template example file
 */
?>
<div class=\"<?php echo \$this->class; ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>

<?php if(!\$this->empty): ?>
<div class=\"content\">
<?php foreach(\$this->groups() as \$group): ?>
<div <?php echo \$group['cssID']; ?> class=\"<?php echo \$group['class']; ?>\">
\t<?php foreach(\$group['fields'] as \$field): ?>\t
\t<div class=\"<?php echo \$field->class; ?>\">
\t\t<div class=\"label\"><?php echo \$field->label; ?></div>
\t\t<div class=\"value\"><?php echo \$field->html(); ?></div>
\t</div>
\t<?php endforeach; ?>
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
        return "@pct_customelements/customelement_grouped.html5";
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
        return new Source("", "@pct_customelements/customelement_grouped.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/customelement_grouped.html5");
    }
}
