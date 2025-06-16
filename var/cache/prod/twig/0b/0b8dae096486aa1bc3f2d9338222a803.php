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

/* @pct_theme_templates/customcatalog/customcatalog_filter_select_nocount.html5 */
class __TwigTemplate_9fd6e7630ca850d8af23265f8ea7345c extends Template
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
 * Select/Radio-Button filter template
 */
?>

<?php if(\$this->radio): ?>
<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"radio_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<?php foreach(\$this->options as \$option): ?>
\t<div>
\t\t<input type=\"radio\" class=\"radio\" name=\"<?php echo \$this->name; ?>\" value=\"<?php echo \$option['value']; ?>\" <?php if(\$option['selected']):?>checked<?php endif;?> ><?php echo \$option['label']; ?>
\t\t<label id=\"lbl_<?php echo \$option['id']; ?>\" for=\"opt_<?php echo \$option['id']; ?>\"><?php echo \$option['label']; ?></label>
\t</div>
\t<?php endforeach; ?>
\t<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>\t
</div>
<?php else: ?>
<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"select_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<select name=\"<?php echo \$this->name; ?>\">
\t<?php foreach(\$this->options as \$option): ?>
\t<option value=\"<?php echo \$option['value']; ?>\"<?php if(\$option['selected']):?>selected<?php endif;?>><?php echo \$option['label']; ?></option>
\t<?php endforeach; ?>
\t</select>
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>\t
</div>
<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_filter_select_nocount.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_filter_select_nocount.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_filter_select_nocount.html5");
    }
}
