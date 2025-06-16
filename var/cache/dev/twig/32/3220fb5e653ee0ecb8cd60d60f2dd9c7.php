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

/* @pct_theme_templates/customelements/customelement_iconbox_vertical.html5 */
class __TwigTemplate_2816c9d6e83384257517b029fe07601c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_iconbox_vertical.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_iconbox_vertical.html5"));

        // line 1
        yield "<?php
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_iconbox_vertical.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/waypoint/js/scripts.js';
?>

<div class=\"<?=  \$this->class; ?> ce_iconbox_vertical_<?= \$this->id; ?>\" data-style=\"<?= \$this->field('style')->value(); ?>\" data-size=\"<?= \$this->field('size')->value(); ?>\" data-font-size=\"<?= \$this->field('font_size')->value(); ?>\" data-animation=\"<?= \$this->field('animation')->value(); ?>\" data-animation-delay=\"<?= \$this->field('delay')->value(); ?>\" data-padding=\"<?= \$this->field('padding_bottom')->value(); ?>\"<?= \$this->cssID; ?>>
\t<div class=\"icon\">
\t\t<div class=\"icon_inside\">
\t\t<?php if(\$this->field('font_icon')->value()): ?>
\t\t\t<i class=\"<?= \$this->field('font_icon')->value(); ?>\"></i>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('text_icon')->value()): ?>
\t\t\t<?= \$this->field('text_icon')->value(); ?>
\t\t<?php endif; ?>
\t
\t\t<?php if(\$this->field('image_icon')->value()): ?>
\t\t\t<?= \$this->field('image_icon')->html(); ?>
\t\t<?php endif; ?>
\t\t</div>
\t</div>
\t<div class=\"content\">
\t<?php if(\$this->field('headline')->value()): ?>
\t\t<?= \$this->field('headline')->html(); ?>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('text')->value()): ?>
\t\t<?= \$this->field('text')->html(); ?>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('link')->value()): ?>
\t\t<?= \$this->field('link')->html(); ?>
\t<?php endif; ?>
\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{\t
\tvar element = jQuery('.ce_iconbox_vertical_<?= \$this->id; ?>');
\tvar waypoint = EX.fx.waypoint(element);
\tjQuery(element).on('intersecting',function(e,params)
\t{
\t    element.addClass('isInViewport');
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_iconbox_vertical.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_iconbox_vertical.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/waypoint/js/scripts.js';
?>

<div class=\"<?=  \$this->class; ?> ce_iconbox_vertical_<?= \$this->id; ?>\" data-style=\"<?= \$this->field('style')->value(); ?>\" data-size=\"<?= \$this->field('size')->value(); ?>\" data-font-size=\"<?= \$this->field('font_size')->value(); ?>\" data-animation=\"<?= \$this->field('animation')->value(); ?>\" data-animation-delay=\"<?= \$this->field('delay')->value(); ?>\" data-padding=\"<?= \$this->field('padding_bottom')->value(); ?>\"<?= \$this->cssID; ?>>
\t<div class=\"icon\">
\t\t<div class=\"icon_inside\">
\t\t<?php if(\$this->field('font_icon')->value()): ?>
\t\t\t<i class=\"<?= \$this->field('font_icon')->value(); ?>\"></i>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('text_icon')->value()): ?>
\t\t\t<?= \$this->field('text_icon')->value(); ?>
\t\t<?php endif; ?>
\t
\t\t<?php if(\$this->field('image_icon')->value()): ?>
\t\t\t<?= \$this->field('image_icon')->html(); ?>
\t\t<?php endif; ?>
\t\t</div>
\t</div>
\t<div class=\"content\">
\t<?php if(\$this->field('headline')->value()): ?>
\t\t<?= \$this->field('headline')->html(); ?>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('text')->value()): ?>
\t\t<?= \$this->field('text')->html(); ?>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('link')->value()): ?>
\t\t<?= \$this->field('link')->html(); ?>
\t<?php endif; ?>
\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{\t
\tvar element = jQuery('.ce_iconbox_vertical_<?= \$this->id; ?>');
\tvar waypoint = EX.fx.waypoint(element);
\tjQuery(element).on('intersecting',function(e,params)
\t{
\t    element.addClass('isInViewport');
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->
", "@pct_theme_templates/customelements/customelement_iconbox_vertical.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_iconbox_vertical.html5");
    }
}
