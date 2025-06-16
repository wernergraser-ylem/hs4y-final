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

/* @pct_theme_templates/customelements/customelement_teaserbox.html5 */
class __TwigTemplate_5202231670a56448828a639cf557273c extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_teaserbox.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('image_valign')->value(); ?> <?php echo \$this->field('text_valign')->value(); ?> <?php echo \$this->field('text_halign')->value(); ?> <?php echo \$this->field('width')->value(); ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t\t<div class=\"ce_teaserbox_inside\">
\t\t\t
\t\t\t<?php if(\$this->field('schema')->value()==\"image_left\"): ?>
\t\t\t<div class=\"image_wrapper\">
\t\t \t\t<div class=\"margins\" style=\"<?php if(\$this->field('image_margin_top')->value()): ?>margin-top:<?php echo \$this->field('image_margin_top')->value(); ?>%;<?php endif; ?><?php if(\$this->field('image_margin_right')->value()): ?>margin-right:<?php echo \$this->field('image_margin_right')->value(); ?>%;<?php endif; ?><?php if(\$this->field('image_margin_bottom')->value()): ?>margin-bottom:<?php echo \$this->field('image_margin_bottom')->value(); ?>%;<?php endif; ?><?php if(\$this->field('image_margin_left')->value()): ?>margin-left:<?php echo \$this->field('image_margin_left')->value(); ?>%;<?php endif; ?>\">
\t\t \t\t\t<?php echo \$this->field('image')->html(); ?>
\t\t \t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"text_wrapper\">
\t\t\t\t<div class=\"margins\"  style=\"<?php if(\$this->field('text_margin_top')->value()): ?>margin-top:<?php echo \$this->field('text_margin_top')->value(); ?>%;<?php endif; ?><?php if(\$this->field('text_margin_right')->value()): ?>margin-right:<?php echo \$this->field('text_margin_right')->value(); ?>%;<?php endif; ?><?php if(\$this->field('text_margin_bottom')->value()): ?>margin-bottom:<?php echo \$this->field('text_margin_bottom')->value(); ?>%;<?php endif; ?><?php if(\$this->field('text_margin_left')->value()): ?>margin-left:<?php echo \$this->field('text_margin_left')->value(); ?>%;<?php endif; ?>\">
\t\t \t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t \t\t\t<?php echo \$this->field('text')->html(); ?>
\t\t \t\t\t<?php if(\$this->field('hyperlink')->value()): ?><div class=\"ce_hyperlink\"><?php echo \$this->field('hyperlink')->html(); ?></div><?php endif; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if(\$this->field('schema')->value()==\"image_right\"): ?>
\t\t\t<div class=\"text_wrapper\">
\t\t\t\t<div class=\"margins\"  style=\"<?php if(\$this->field('text_margin_top')->value()): ?>margin-top:<?php echo \$this->field('text_margin_top')->value(); ?>%;<?php endif; ?><?php if(\$this->field('text_margin_right')->value()): ?>margin-right:<?php echo \$this->field('text_margin_right')->value(); ?>%;<?php endif; ?><?php if(\$this->field('text_margin_bottom')->value()): ?>margin-bottom:<?php echo \$this->field('text_margin_bottom')->value(); ?>%;<?php endif; ?><?php if(\$this->field('text_margin_left')->value()): ?>margin-left:<?php echo \$this->field('text_margin_left')->value(); ?>%;<?php endif; ?>\">
\t\t \t\t\t<?php echo \$this->field('headline')->html(); ?>
\t\t \t\t\t<?php echo \$this->field('text')->html(); ?>
\t\t \t\t\t<?php if(\$this->field('hyperlink')->value()): ?><div class=\"ce_hyperlink\"><?php echo \$this->field('hyperlink')->html(); ?></div><?php endif; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"image_wrapper\">
\t\t \t\t<div class=\"margins\" style=\"<?php if(\$this->field('image_margin_top')->value()): ?>margin-top:<?php echo \$this->field('image_margin_top')->value(); ?>%;<?php endif; ?><?php if(\$this->field('image_margin_right')->value()): ?>margin-right:<?php echo \$this->field('image_margin_right')->value(); ?>%;<?php endif; ?><?php if(\$this->field('image_margin_bottom')->value()): ?>margin-bottom:<?php echo \$this->field('image_margin_bottom')->value(); ?>%;<?php endif; ?><?php if(\$this->field('image_margin_left')->value()): ?>margin-left:<?php echo \$this->field('image_margin_left')->value(); ?>%;<?php endif; ?>\">
\t\t \t\t\t<?php echo \$this->field('image')->html(); ?>
\t\t \t\t</div>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t</div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_teaserbox.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_teaserbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_teaserbox.html5");
    }
}
