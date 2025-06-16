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

/* @pct_theme_templates/customelements/customelement_bgimage_content_start.html5 */
class __TwigTemplate_150856b2f4669b7034eba9b68d553f63 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_bgimage_content_start.css|static';
?>
<div class=\"<?php echo \$this->class; ?> ce_bgimage_extended boxed-content <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('bg_color')->value(); ?> <?php echo \$this->field('valign')->value(); ?><?php if(\$this->field('invert_leftcol')->value()): ?> invert_leftcol<?php endif; ?><?php if(\$this->field('invert_rightcol')->value()): ?> invert_rightcol<?php endif; ?>\" style=\"background-image: url(<?php echo \$this->field('image')->generate(); ?>);<?php if (\$this->style): ?><?php echo \$this->style; ?><?php endif; ?>\"<?php echo \$this->cssID; ?>>
\t<div class=\"ce_bgimage_extended_inside <?php echo \$this->field('padding_top_class')->value(); ?> <?php echo \$this->field('padding_bottom_class')->value(); ?>\">
\t\t<div class=\"ce_bgimage_content_left\">
\t\t\t<div class=\"bg_overlay\"></div>
\t\t\t<div class=\"ce_bgimage_content\">";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_bgimage_content_start.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_bgimage_content_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_bgimage_content_start.html5");
    }
}
