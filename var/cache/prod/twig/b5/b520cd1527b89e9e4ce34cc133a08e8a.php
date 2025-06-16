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

/* @pct_theme_templates/customelements/customelement_frame_start.html5 */
class __TwigTemplate_64c7a15aaab0f02a6f2c852544f5e07f extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_frame_start.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('style')->value(); ?>\" <?php if (\$this->style): ?>style=\"<?php echo \$this->style; ?>\"<?php endif; ?><?php echo \$this->cssID; ?>>
\t<div class=\"ce_frame_start_inside\" style=\"<?php if(\$this->field('padding_vert')->value()): ?>padding-top:<?php echo \$this->field('padding_vert')->value(); ?>px;padding-bottom:<?php echo \$this->field('padding_vert')->value(); ?>px;<?php endif; ?><?php if(\$this->field('padding_hor')->value()): ?>padding-left:<?php echo \$this->field('padding_hor')->value(); ?>px; padding-right:<?php echo \$this->field('padding_hor')->value(); ?>px;<?php endif; ?>\">";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_frame_start.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_frame_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_frame_start.html5");
    }
}
