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

/* @pct_theme_templates/customelements/customelement_scribble_animation.html5 */
class __TwigTemplate_0814f1e400aa9518b314e517748e24c6 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_scribble_animation.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/waypoint/js/scripts.js';

\$element = \$this->field('markup')->value() ?? 'div';
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
?>

<<?= \$element; ?> class=\"<?=  \$this->class; ?> ce_scribble_animation_<?= \$this->id; ?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" data-style=\"<?= \$this->field('style')->value(); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-color-scribble=\"<?= \$this->field('color_scribble')->value(); ?>\">
\t
\t<?php foreach(\$this->group('text') as \$i => \$fields): ?>
\t\t
\t\t<?php if(\$this->field('text#'.\$i)->value()): ?>
\t\t<?= \$this->field('text#'.\$i)->value(); ?>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('scribble_text#'.\$i)->value()): ?>
\t\t<span data-scribble=\"true\">
\t\t\t<?= \$this->field('scribble_text#'.\$i)->value(); ?>
\t\t\t
\t\t\t<?php if(\$this->field('style')->value() == \"style1\"): ?>
\t\t\t<svg role=\"presentation\" viewBox=\"-400 -55 730 60\" preserveAspectRatio=\"none\">
\t\t\t  <path style=\"animation-duration: 1.4s;\" d=\"m -380 -7 c 60 -20 135 -34 300 -37 c 55 -0.7 200 -3 405 13\" stroke=\"#000000\" pathLength=\"1\" stroke-width=\"14\" fill=\"none\"></path>
\t\t\t</svg>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if(\$this->field('style')->value() == \"style2\"): ?>
\t\t\t<svg role=\"presentation\" viewBox=\"-158.17 -22.0172 289.2 53.8\" preserveAspectRatio=\"none\">
\t\t\t\t<path style=\"animation-duration: 1.4s;\" d=\"M -153.17 20.736 C -153.17 20.736 -132 -2 -117 -0.5 C -98 -0.5 -133.093 32.632 -115 25 C -104 17 -77 4 -71 2 C -50 -9 -60 10 -56.375 21.387 C -52.89 30.449 -25 2 -7 -1 C 17 -7 -14.599 23.918 4.917 21.827 C 24.434 19.735 41 4 53 1 C 66 -2 59.24 31.585 79 22 C 99 11 99 -1 118 -3\" stroke=\"#000000\" pathLength=\"1\" stroke-width=\"8\" fill=\"none\"></path>
\t\t\t</svg>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if(\$this->field('style')->value() == \"style3\"): ?>
\t\t\t<svg role=\"presentation\" viewBox=\"-347 -30.1947 694 96.19\" preserveAspectRatio=\"none\">
\t\t\t  <path style=\"animation-duration: 1.5s;\" d=\"M-340,53 C-340,53 -175,-60 -198,-2 C-221,50 -229.1199951171875,75.552001953125 -122,13 C-65,-25 -142,52 -28,44 C37.43899917602539,39.042999267578125 152.14700317382812,-27.308000564575195 340,4\" stroke=\"#000000\" pathLength=\"1\" stroke-width=\"20\" fill=\"none\"></path>
\t\t\t</svg>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if(\$this->field('style')->value() == \"style4\"): ?>
\t\t\t<svg role=\"presentation\" viewBox=\"0 0 800 350\" preserveAspectRatio=\"none\">
\t\t\t  <path style=\"animation-duration: 1.5s;\" transform=\"matrix(0.975,0,0,0.975,400,179)\" stroke-linejoin=\"round\" fill-opacity=\"0\" pathLength=\"1\" stroke-miterlimit=\"4\" stroke=\"#000000\" stroke-opacity=\"1\" stroke-width=\"20\" d=\" M260,-160 C260,-160 -290,-200 -380,-20 C-470,160 70,170 260,120 C570,30 250,-140 20,-110\"></path>
\t\t\t</svg>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if(\$this->field('style')->value() == \"style5\"): ?>
\t\t\t<svg role=\"presentation\" viewBox=\"-320 -70.8161 640.4 59.82\" preserveAspectRatio=\"none\">
\t\t\t\t<path style=\"animation-duration: 1.5s;\" d=\"M-310,-55 C-55,-70 305,-63 308,-57 C340,-51 -245,-35 -260,-26 C-275,-17 -85,-22 95,-18\" stroke=\"#000000\" pathLength=\"1\" stroke-width=\"11\" fill=\"none\"></path>
\t\t\t</svg>
\t\t\t<?php endif; ?>
\t\t\t
\t\t</span>
\t\t<?php endif; ?>
\t\t\t\t
\t<?php endforeach; ?>
</<?= \$element; ?>>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\tconst element = jQuery('.ce_scribble_animation_<?= \$this->id; ?>');
\tvar waypoint = EX.fx.waypoint(element);
\tjQuery(element).on('intersecting',function(e,params)
\t{
\t    element.addClass('isInViewport');
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_scribble_animation.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_scribble_animation.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_scribble_animation.html5");
    }
}
