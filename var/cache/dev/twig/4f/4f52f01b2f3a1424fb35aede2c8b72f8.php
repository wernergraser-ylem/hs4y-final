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

/* @pct_theme_templates/customelements/customelement_imagemap.html5 */
class __TwigTemplate_8f7996db1f1ccecead69c0fafbf45b6f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_imagemap.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_imagemap.html5"));

        // line 1
        yield "<?php
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_imagemap.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div id=\"imagemap_inside_<?= \$this->id; ?>\" class=\"imagemap_inside <?php echo \$this->field('align')->value(); ?><?php if(\$this->field('margin_top')->value()): ?> <?php echo \$this->field('margin_top')->value(); ?><?php endif; ?><?php if(\$this->field('margin_bottom')->value()): ?> <?php echo \$this->field('margin_bottom')->value(); ?><?php endif; ?><?php if(\$this->field('margin_top_mobile')->value()): ?> <?php echo \$this->field('margin_top_mobile')->value(); ?><?php endif; ?><?php if(\$this->field('margin_bottom_mobile')->value()): ?> <?php echo \$this->field('margin_bottom_mobile')->value(); ?><?php endif; ?>\"<?php if(\$this->field('image_width')->value()): ?> style=\"max-width:<?php echo \$this->field('image_width')->value(); ?>px;\"<?php endif; ?>>
\t\t<?php foreach(\$this->group('hotspot') as \$i => \$fields): ?>
\t\t<div class=\"hotspot <?php echo \$this->field('hotspot-size')->value(); ?>\" style=\"top: <?php echo \$this->field('vposition#'.\$i)->value(); ?>%; left: <?php echo \$this->field('hposition#'.\$i)->value(); ?>%;\">
\t\t\t<div class=\"circle\"></div>
\t\t\t<div>
\t\t\t\t<div class=\"hotspot_content <?php echo \$this->field('content_position#'.\$i)->value(); ?>\">
\t\t\t\t\t<?php echo \$this->field('hotspot_content#'.\$i)->value(); ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<?php endforeach; ?>
\t\t
\t\t<div class=\"image\"><?php echo \$this->field('image')->html(); ?></div>\t\t
\t</div>

\t<!-- SEO-SCRIPT-START -->
\t<script>
\tjQuery(document).ready(function() 
\t{
\t\tjQuery('#imagemap_inside_<?= \$this->id; ?> .hotspot').click(function() 
\t\t{
\t\t\tjQuery(this).toggleClass('active');
\t\t});
\t});
\t</script>
\t<!-- SEO-SCRIPT-STOP -->

</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_imagemap.html5";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<?php
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_imagemap.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div id=\"imagemap_inside_<?= \$this->id; ?>\" class=\"imagemap_inside <?php echo \$this->field('align')->value(); ?><?php if(\$this->field('margin_top')->value()): ?> <?php echo \$this->field('margin_top')->value(); ?><?php endif; ?><?php if(\$this->field('margin_bottom')->value()): ?> <?php echo \$this->field('margin_bottom')->value(); ?><?php endif; ?><?php if(\$this->field('margin_top_mobile')->value()): ?> <?php echo \$this->field('margin_top_mobile')->value(); ?><?php endif; ?><?php if(\$this->field('margin_bottom_mobile')->value()): ?> <?php echo \$this->field('margin_bottom_mobile')->value(); ?><?php endif; ?>\"<?php if(\$this->field('image_width')->value()): ?> style=\"max-width:<?php echo \$this->field('image_width')->value(); ?>px;\"<?php endif; ?>>
\t\t<?php foreach(\$this->group('hotspot') as \$i => \$fields): ?>
\t\t<div class=\"hotspot <?php echo \$this->field('hotspot-size')->value(); ?>\" style=\"top: <?php echo \$this->field('vposition#'.\$i)->value(); ?>%; left: <?php echo \$this->field('hposition#'.\$i)->value(); ?>%;\">
\t\t\t<div class=\"circle\"></div>
\t\t\t<div>
\t\t\t\t<div class=\"hotspot_content <?php echo \$this->field('content_position#'.\$i)->value(); ?>\">
\t\t\t\t\t<?php echo \$this->field('hotspot_content#'.\$i)->value(); ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<?php endforeach; ?>
\t\t
\t\t<div class=\"image\"><?php echo \$this->field('image')->html(); ?></div>\t\t
\t</div>

\t<!-- SEO-SCRIPT-START -->
\t<script>
\tjQuery(document).ready(function() 
\t{
\t\tjQuery('#imagemap_inside_<?= \$this->id; ?> .hotspot').click(function() 
\t\t{
\t\t\tjQuery(this).toggleClass('active');
\t\t});
\t});
\t</script>
\t<!-- SEO-SCRIPT-STOP -->

</div>", "@pct_theme_templates/customelements/customelement_imagemap.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_imagemap.html5");
    }
}
