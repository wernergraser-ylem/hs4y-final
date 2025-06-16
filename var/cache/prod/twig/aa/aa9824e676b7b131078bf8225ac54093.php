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

/* @pct_theme_templates/customelements/customelement_infobox.html5 */
class __TwigTemplate_e18c092e95af3b95b8c7ff69f4094e9e extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_infobox.css|static';
?>
<?php if(\$this->field('schema')->value() == 'alert'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_alert block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-flash\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>

<?php if(\$this->field('schema')->value() == 'info'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_info block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-bullhorn\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>

<?php if(\$this->field('schema')->value() == 'success'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_success block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-check\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>

<?php if(\$this->field('schema')->value() == 'warning'): ?>
<div class=\"<?php echo \$this->class; ?> ce_infobox_warning block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<i class=\"fa fa-warning\"></i>
\t<?php echo \$this->field('text')->html(); ?>
</div>
<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_infobox.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_infobox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_infobox.html5");
    }
}
