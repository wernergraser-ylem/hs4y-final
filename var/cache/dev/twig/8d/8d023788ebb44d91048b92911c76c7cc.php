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

/* @pct_theme_templates/customelements/customelement_flipbox.html5 */
class __TwigTemplate_6893097424495bb7d15990a6ea707df8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_flipbox.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_flipbox.html5"));

        // line 1
        yield "<?php
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_flipbox.css|static';

\$background_color_front = ''; 
if( \$this->field('background_color_front')->value() )
{
\t// compile color
\t\$color = \$this->field('background_color_front')->attribute()->compileColor( \$this->field('background_color_front')->value() );
\t\$background_color_front = \$color->rgba;
}
\$background_color_back = '';
if( \$this->field('background_color_back')->value() )
{
\t// compile color
\t\$color = \$this->field('background_color_back')->attribute()->compileColor( \$this->field('background_color_back')->value() );
\t\$background_color_back = \$color->rgba;
}\t
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('style')->value(); ?> \"<?php echo \$this->cssID; ?>style=\"height: <?php echo \$this->field('height')->value(); ?>px\" >
\t<div class=\"ce_flipbox_inside\">
\t\t<div class=\"ce_flipbox_frontside<?php if (\$this->field('color_invert_front')->value()): ?> color-white<?php endif; ?>\" style=\"<?php if (\$this->field('background_color_front')->value()): ?>background-color:<?= \$background_color_front; ?>;<?php endif; ?><?php if (\$this->field('image_front')->value()): ?>background-image: url(<?php echo \$this->field('image_front')->generate(); ?>);<?php endif; ?>\">
\t\t\t<div class=\"ce_flipbox_frontside_inside\">
\t\t\t\t<?php if (\$this->field('headline_front')->value()): ?><?php echo \$this->field('headline_front')->html(); ?><?php endif; ?>
\t\t\t</div>
\t\t</div>

\t\t<div class=\"ce_flipbox_backside<?php if (\$this->field('color_invert_back')->value()): ?> color-white<?php endif; ?>\" style=\"<?php if (\$this->field('background_color_back')->value()): ?>background-color:<?= \$background_color_back; ?>;<?php endif; ?><?php if (\$this->field('image_back')->value()): ?>background-image: url(<?php echo \$this->field('image_back')->generate(); ?>);<?php endif; ?>\">
\t\t\t<div class=\"ce_flipbox_backside_inside\">
\t\t\t\t<?php if (\$this->field('headline_back')->value()): ?><?php echo \$this->field('headline_back')->html(); ?><?php endif; ?>
\t\t\t\t<?php if (\$this->field('text_back')->value()): ?><?php echo \$this->field('text_back')->html(); ?><?php endif; ?>
\t\t\t\t<?php if (\$this->field('link_back')->value()): ?><?php echo \$this->field('link_back')->html(); ?><?php endif; ?>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
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
        return "@pct_theme_templates/customelements/customelement_flipbox.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_flipbox.css|static';

\$background_color_front = ''; 
if( \$this->field('background_color_front')->value() )
{
\t// compile color
\t\$color = \$this->field('background_color_front')->attribute()->compileColor( \$this->field('background_color_front')->value() );
\t\$background_color_front = \$color->rgba;
}
\$background_color_back = '';
if( \$this->field('background_color_back')->value() )
{
\t// compile color
\t\$color = \$this->field('background_color_back')->attribute()->compileColor( \$this->field('background_color_back')->value() );
\t\$background_color_back = \$color->rgba;
}\t
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('style')->value(); ?> \"<?php echo \$this->cssID; ?>style=\"height: <?php echo \$this->field('height')->value(); ?>px\" >
\t<div class=\"ce_flipbox_inside\">
\t\t<div class=\"ce_flipbox_frontside<?php if (\$this->field('color_invert_front')->value()): ?> color-white<?php endif; ?>\" style=\"<?php if (\$this->field('background_color_front')->value()): ?>background-color:<?= \$background_color_front; ?>;<?php endif; ?><?php if (\$this->field('image_front')->value()): ?>background-image: url(<?php echo \$this->field('image_front')->generate(); ?>);<?php endif; ?>\">
\t\t\t<div class=\"ce_flipbox_frontside_inside\">
\t\t\t\t<?php if (\$this->field('headline_front')->value()): ?><?php echo \$this->field('headline_front')->html(); ?><?php endif; ?>
\t\t\t</div>
\t\t</div>

\t\t<div class=\"ce_flipbox_backside<?php if (\$this->field('color_invert_back')->value()): ?> color-white<?php endif; ?>\" style=\"<?php if (\$this->field('background_color_back')->value()): ?>background-color:<?= \$background_color_back; ?>;<?php endif; ?><?php if (\$this->field('image_back')->value()): ?>background-image: url(<?php echo \$this->field('image_back')->generate(); ?>);<?php endif; ?>\">
\t\t\t<div class=\"ce_flipbox_backside_inside\">
\t\t\t\t<?php if (\$this->field('headline_back')->value()): ?><?php echo \$this->field('headline_back')->html(); ?><?php endif; ?>
\t\t\t\t<?php if (\$this->field('text_back')->value()): ?><?php echo \$this->field('text_back')->html(); ?><?php endif; ?>
\t\t\t\t<?php if (\$this->field('link_back')->value()): ?><?php echo \$this->field('link_back')->html(); ?><?php endif; ?>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
", "@pct_theme_templates/customelements/customelement_flipbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_flipbox.html5");
    }
}
