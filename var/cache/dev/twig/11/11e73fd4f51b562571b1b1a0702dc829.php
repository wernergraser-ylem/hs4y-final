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

/* @pct_theme_templates/customelements/customelement_highlighted_text.html5 */
class __TwigTemplate_8265ad52ff8a7a540ec06af5da3a5719 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_highlighted_text.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_highlighted_text.html5"));

        // line 1
        yield "<?php
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_highlighted_text.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/waypoint/js/scripts.js';

\$element = \$this->field('markup')->value() ?? 'div';
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
?>

<<?= \$element; ?> class=\"<?= \$this->class; ?> ce_highlighted_text_<?= \$this->id; ?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-color-highlighted=\"<?= \$this->field('color_highlighted')->value(); ?>\" data-highlighted-bg=\"<?= \$this->field('highlighted_bg')->value(); ?>\" data-speed=\"<?= \$this->field('speed')->value(); ?>\">
\t<?php foreach(\$this->group('text') as \$i => \$fields): ?>
\t\t<?php if(\$this->field('text#'.\$i)->value()): ?>
\t\t<?= \$this->field('text#'.\$i)->value(); ?>
\t\t<?php endif; ?>
\t\t<?php if(\$this->field('highlighted_text#'.\$i)->value()): ?>
\t\t<span data-highlighted=\"true\"><?php echo \$this->field('highlighted_text#'.\$i)->value(); ?></span>
\t\t<?php endif; ?>\t
\t<?php endforeach; ?>
</<?= \$element; ?>>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{\t
\tconst element = jQuery('.ce_highlighted_text_<?= \$this->id; ?>');
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
        return "@pct_theme_templates/customelements/customelement_highlighted_text.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_highlighted_text.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/waypoint/js/scripts.js';

\$element = \$this->field('markup')->value() ?? 'div';
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
?>

<<?= \$element; ?> class=\"<?= \$this->class; ?> ce_highlighted_text_<?= \$this->id; ?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-color-highlighted=\"<?= \$this->field('color_highlighted')->value(); ?>\" data-highlighted-bg=\"<?= \$this->field('highlighted_bg')->value(); ?>\" data-speed=\"<?= \$this->field('speed')->value(); ?>\">
\t<?php foreach(\$this->group('text') as \$i => \$fields): ?>
\t\t<?php if(\$this->field('text#'.\$i)->value()): ?>
\t\t<?= \$this->field('text#'.\$i)->value(); ?>
\t\t<?php endif; ?>
\t\t<?php if(\$this->field('highlighted_text#'.\$i)->value()): ?>
\t\t<span data-highlighted=\"true\"><?php echo \$this->field('highlighted_text#'.\$i)->value(); ?></span>
\t\t<?php endif; ?>\t
\t<?php endforeach; ?>
</<?= \$element; ?>>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{\t
\tconst element = jQuery('.ce_highlighted_text_<?= \$this->id; ?>');
\tvar waypoint = EX.fx.waypoint(element);
\tjQuery(element).on('intersecting',function(e,params)
\t{
\t    element.addClass('isInViewport');
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->
", "@pct_theme_templates/customelements/customelement_highlighted_text.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_highlighted_text.html5");
    }
}
