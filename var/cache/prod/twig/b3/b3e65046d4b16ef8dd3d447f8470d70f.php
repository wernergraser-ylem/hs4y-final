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

/* @pct_theme_templates/customelements/customelement_fancy_divider.html5 */
class __TwigTemplate_970877f00184f6a33b932abd56b9cc80 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_fancy_divider.css|static';
?>
<div class=\"<?php echo \$this->class; ?> <?php echo \$this->field('schema')->value(); ?> block <?php echo \$this->field('position')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>

\t<?php if(\$this->field('schema')->value() == 'version1'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 102\" preserveAspectRatio=\"none\">
\t\t\t<path d=\"M0 0 L50 100 L100 0 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>); stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>)\"></path>
\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('schema')->value() == 'version2'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\">
\t\t\t<path d=\"M0 100 C 20 0 50 0 100 100 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>);\"></path>
\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('schema')->value() == 'version3'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\">
\t\t\t<path d=\"M0 0 C 50 100 80 100 100 0 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>); stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>)\"></path>
\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('schema')->value() == 'version4'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\">
\t\t\t<path d=\"M47 0 L50 20 L53 -1 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>);stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>);\"></path>
\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('schema')->value() == 'version5'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\">
\t\t\t<path d=\"M47 0 L50 25 L53 -1 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>);stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>);background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\"></path>
\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('schema')->value() == 'version6'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\">
\t\t\t\t<path d=\"M0 0 Q 2.5 40 5 0 
\t\t\t\t\t\t Q 7.5 40 10 0
\t\t\t\t\t\t Q 12.5 40 15 0
\t\t\t\t\t\t Q 17.5 40 20 0
\t\t\t\t\t\t Q 22.5 40 25 0
\t\t\t\t\t\t Q 27.5 40 30 0
\t\t\t\t\t\t Q 32.5 40 35 0
\t\t\t\t\t\t Q 37.5 40 40 0
\t\t\t\t\t\t Q 42.5 40 45 0
\t\t\t\t\t\t Q 47.5 40 50 0 
\t\t\t\t\t\t Q 52.5 40 55 0
\t\t\t\t\t\t Q 57.5 40 60 0
\t\t\t\t\t\t Q 62.5 40 65 0
\t\t\t\t\t\t Q 67.5 40 70 0
\t\t\t\t\t\t Q 72.5 40 75 0
\t\t\t\t\t\t Q 77.5 40 80 0
\t\t\t\t\t\t Q 82.5 40 85 0
\t\t\t\t\t\t Q 87.5 40 90 0
\t\t\t\t\t\t Q 92.5 40 95 0
\t\t\t\t\t\t Q 97.5 40 100 0 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>);stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>);\">
\t\t\t\t</path>
\t\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('schema')->value() == 'version7'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 99\" preserveAspectRatio=\"none\" shape-rendering=\"auto\">
\t\t\t\t<path d=\"M-5 100 Q 0 20 5 100 Z
\t\t\t\t\t\t M0 100 Q 5 0 10 100
\t\t\t\t\t\t M5 100 Q 10 30 15 100
\t\t\t\t\t\t M10 100 Q 15 10 20 100
\t\t\t\t\t\t M15 100 Q 20 30 25 100
\t\t\t\t\t\t M20 100 Q 25 -10 30 100
\t\t\t\t\t\t M25 100 Q 30 10 35 100
\t\t\t\t\t\t M30 100 Q 35 30 40 100
\t\t\t\t\t\t M35 100 Q 40 10 45 100
\t\t\t\t\t\t M40 100 Q 45 50 50 100
\t\t\t\t\t\t M45 100 Q 50 20 55 100
\t\t\t\t\t\t M50 100 Q 55 40 60 100
\t\t\t\t\t\t M55 100 Q 60 60 65 100
\t\t\t\t\t\t M60 100 Q 65 50 70 100
\t\t\t\t\t\t M65 100 Q 70 20 75 100
\t\t\t\t\t\t M70 100 Q 75 45 80 100
\t\t\t\t\t\t M75 100 Q 80 30 85 100
\t\t\t\t\t\t M80 100 Q 85 20 90 100
\t\t\t\t\t\t M85 100 Q 90 50 95 100
\t\t\t\t\t\t M90 100 Q 95 25 100 100
\t\t\t\t\t\t M95 100 Q 100 15 105 100 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>);\">
\t\t\t\t</path>
\t\t\t</svg>\t</div>
\t<?php endif; ?>

\t<?php if(\$this->field('schema')->value() == 'version8'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\">
\t\t\t<path d=\"M0 0 L0 100 L100 100 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>); stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>)\"></path>
\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('schema')->value() == 'version9'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 102\" preserveAspectRatio=\"none\">
\t\t\t<path d=\"M0 0 L100 100 L100 0 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>); stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>)\"></path>
\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('schema')->value() == 'version10'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"100\" viewBox=\"0 0 100 102\" preserveAspectRatio=\"none\">
\t\t\t<path d=\"M0 0 L0 100 L100 0 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>); stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>)\"></path>
\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('schema')->value() == 'version11'): ?>
\t<div class=\"ce_fancy_divider_inside\" style=\"background-color: rgba(<?php echo \$this->field('bg_color')->value(); ?>)\">
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" width=\"100%\" height=\"130\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"none\">
\t\t\t<path d=\"M0 0 L0 100 L50 100 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>); stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>)\"></path>
\t\t\t<path d=\"M50 100 L100 100 L100 0 Z\" style=\"fill: rgba(<?php echo \$this->field('highlight_color')->value(); ?>); stroke: rgba(<?php echo \$this->field('highlight_color')->value(); ?>)\"></path>
\t\t</svg>
\t</div>
\t<?php endif; ?>
\t
</div>


";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_fancy_divider.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_fancy_divider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_fancy_divider.html5");
    }
}
