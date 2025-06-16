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

/* @pct_theme_templates/customelements/customelement_iconbox_v3.html5 */
class __TwigTemplate_fcd45acbeb460bb537094ca44a362330 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_iconbox_v3.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_iconbox_v3.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_iconbox_v3.css|static';

\$bg_color_own = '';
if( \$this->field('bg_color_own')->value() )
{
\t// compile color
\t\$color = \$this->field('bg_color_own')->attribute()->compileColor( \$this->field('bg_color_own')->value() );
\t\$bg_color_own = \$color->rgba;
}
\$subheadline_color_own = '';
if( \$this->field('subheadline_color_own')->value() )
{
\t// compile color
\t\$color = \$this->field('subheadline_color_own')->attribute()->compileColor( \$this->field('subheadline_color_own')->value() );
\t\$subheadline_color_own = \$color->rgba;
}
\$headline_color_own = '';
if( \$this->field('headline_color_own')->value() )
{
\t// compile color
\t\$color = \$this->field('headline_color_own')->attribute()->compileColor( \$this->field('headline_color_own')->value() );
\t\$headline_color_own = \$color->rgba;
}
\$fonticon_color_own = '';
if( \$this->field('fonticon_color_own')->value() )
{
\t// compile color
\t\$color = \$this->field('fonticon_color_own')->attribute()->compileColor( \$this->field('fonticon_color_own')->value() );
\t\$fonticon_color_own = \$color->rgba;
}

\$lightbox = \$this->field('link')->option('lightbox');
if( \$this->field('link')->option('lightbox') )
{
\tif( strpos(\$this->field('link')->option('lightbox'), 'data-lightbox') !== false )
\t{
\t\t\$lightbox = \$this->field('link')->option('lightbox');
\t\t\$lightbox = str_replace('data-', '',\$lightbox);\t
\t\t\$lightbox = ' data-lightbox=\"'.\$lightbox.'\"';
\t}\t
\tif( strpos(\$this->field('link')->option('lightbox'), 'data-lightbox-iframe') !== false )
\t{
\t\t\$lightbox = \$this->field('link')->option('lightbox');
\t\t\$lightbox = str_replace('data-', '',\$lightbox);\t
\t\t\$lightbox = ' data-lightbox-iframe=\"'.\$lightbox.'\"';
\t}
}
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('style')->value(); ?> <?php echo \$this->field('text_color_hover')->value(); ?><?php if(\$this->field('text')->value()): ?> flip<?php endif; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_iconbox_v3_inside <?php echo \$this->field('bg_color')->value(); ?> <?php echo \$this->field('bg_color_hover')->value(); ?>\"<?php if(\$this->field('bg_color_own')->value()): ?> style=\"background-color: <?= \$bg_color_own; ?>;\"<?php endif; ?>>

\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t<?php echo \$this->field('link')->html(); ?>
\t\t<?php endif; ?>

\t\t<?php if(\$this->field('image-icon')->value()): ?>
\t\t\t<?php echo \$this->field('image-icon')->html(); ?>
\t\t<?php endif; ?>

\t\t<?php if(\$this->field('icon')->value()): ?>
\t\t\t<i class=\"fonticon <?php echo \$this->field('icon')->value(); ?> <?php echo \$this->field('fonticon_color')->value(); ?>\"<?php if(\$fonticon_color_own): ?> style=\"color: <?= \$fonticon_color_own; ?>;\"<?php endif; ?>></i>
\t\t<?php endif; ?>

\t\t<div class=\"ce_iconbox_v3_content\">

\t\t\t<?php if(\$this->field('headline')->value()): ?>
\t\t\t\t<<?php echo \$this->field('headline_typ')->value(); ?> class=\"headline <?php echo \$this->field('headline_color')->value(); ?>\"<?php if(\$headline_color_own): ?> style=\"color: <?= \$headline_color_own; ?>;\"<?php endif; ?>><?php echo \$this->field('headline')->value(); ?></<?php echo \$this->field('headline_typ')->value(); ?>>
\t\t\t<?php endif; ?>

\t\t\t<?php if(\$this->field('subheadline')->value()): ?>
\t\t\t\t<<?php echo \$this->field('subheadline_typ')->value(); ?> class=\"subheadline <?php echo \$this->field('subheadline_color')->value(); ?>\"<?php if(\$subheadline_color_own): ?> style=\"color: <?= \$subheadline_color_own; ?>;\"<?php endif; ?>><?php echo \$this->field('subheadline')->value(); ?></<?php echo \$this->field('subheadline_typ')->value(); ?>>
\t\t\t<?php endif; ?>

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
        return "@pct_theme_templates/customelements/customelement_iconbox_v3.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_iconbox_v3.css|static';

\$bg_color_own = '';
if( \$this->field('bg_color_own')->value() )
{
\t// compile color
\t\$color = \$this->field('bg_color_own')->attribute()->compileColor( \$this->field('bg_color_own')->value() );
\t\$bg_color_own = \$color->rgba;
}
\$subheadline_color_own = '';
if( \$this->field('subheadline_color_own')->value() )
{
\t// compile color
\t\$color = \$this->field('subheadline_color_own')->attribute()->compileColor( \$this->field('subheadline_color_own')->value() );
\t\$subheadline_color_own = \$color->rgba;
}
\$headline_color_own = '';
if( \$this->field('headline_color_own')->value() )
{
\t// compile color
\t\$color = \$this->field('headline_color_own')->attribute()->compileColor( \$this->field('headline_color_own')->value() );
\t\$headline_color_own = \$color->rgba;
}
\$fonticon_color_own = '';
if( \$this->field('fonticon_color_own')->value() )
{
\t// compile color
\t\$color = \$this->field('fonticon_color_own')->attribute()->compileColor( \$this->field('fonticon_color_own')->value() );
\t\$fonticon_color_own = \$color->rgba;
}

\$lightbox = \$this->field('link')->option('lightbox');
if( \$this->field('link')->option('lightbox') )
{
\tif( strpos(\$this->field('link')->option('lightbox'), 'data-lightbox') !== false )
\t{
\t\t\$lightbox = \$this->field('link')->option('lightbox');
\t\t\$lightbox = str_replace('data-', '',\$lightbox);\t
\t\t\$lightbox = ' data-lightbox=\"'.\$lightbox.'\"';
\t}\t
\tif( strpos(\$this->field('link')->option('lightbox'), 'data-lightbox-iframe') !== false )
\t{
\t\t\$lightbox = \$this->field('link')->option('lightbox');
\t\t\$lightbox = str_replace('data-', '',\$lightbox);\t
\t\t\$lightbox = ' data-lightbox-iframe=\"'.\$lightbox.'\"';
\t}
}
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('style')->value(); ?> <?php echo \$this->field('text_color_hover')->value(); ?><?php if(\$this->field('text')->value()): ?> flip<?php endif; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_iconbox_v3_inside <?php echo \$this->field('bg_color')->value(); ?> <?php echo \$this->field('bg_color_hover')->value(); ?>\"<?php if(\$this->field('bg_color_own')->value()): ?> style=\"background-color: <?= \$bg_color_own; ?>;\"<?php endif; ?>>

\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t<?php echo \$this->field('link')->html(); ?>
\t\t<?php endif; ?>

\t\t<?php if(\$this->field('image-icon')->value()): ?>
\t\t\t<?php echo \$this->field('image-icon')->html(); ?>
\t\t<?php endif; ?>

\t\t<?php if(\$this->field('icon')->value()): ?>
\t\t\t<i class=\"fonticon <?php echo \$this->field('icon')->value(); ?> <?php echo \$this->field('fonticon_color')->value(); ?>\"<?php if(\$fonticon_color_own): ?> style=\"color: <?= \$fonticon_color_own; ?>;\"<?php endif; ?>></i>
\t\t<?php endif; ?>

\t\t<div class=\"ce_iconbox_v3_content\">

\t\t\t<?php if(\$this->field('headline')->value()): ?>
\t\t\t\t<<?php echo \$this->field('headline_typ')->value(); ?> class=\"headline <?php echo \$this->field('headline_color')->value(); ?>\"<?php if(\$headline_color_own): ?> style=\"color: <?= \$headline_color_own; ?>;\"<?php endif; ?>><?php echo \$this->field('headline')->value(); ?></<?php echo \$this->field('headline_typ')->value(); ?>>
\t\t\t<?php endif; ?>

\t\t\t<?php if(\$this->field('subheadline')->value()): ?>
\t\t\t\t<<?php echo \$this->field('subheadline_typ')->value(); ?> class=\"subheadline <?php echo \$this->field('subheadline_color')->value(); ?>\"<?php if(\$subheadline_color_own): ?> style=\"color: <?= \$subheadline_color_own; ?>;\"<?php endif; ?>><?php echo \$this->field('subheadline')->value(); ?></<?php echo \$this->field('subheadline_typ')->value(); ?>>
\t\t\t<?php endif; ?>

\t\t</div>

\t</div>
</div>
", "@pct_theme_templates/customelements/customelement_iconbox_v3.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_iconbox_v3.html5");
    }
}
