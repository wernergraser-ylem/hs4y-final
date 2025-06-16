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

/* @pct_theme_templates/customelements/customelement_icon_text.html5 */
class __TwigTemplate_bb1c8af96d4e08d38e1c3dbc76385f85 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_icon_text.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_icon_text.html5"));

        // line 1
        yield "<?php
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_icon_text.css|static';

\$element = \$this->field('markup')->value();
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}

if (\$this->field('font_icon_size')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_icon_text_\" . \$this->id  . \" i {font-size:\" . \$this->field('font_icon_size')->value() . \";width:\" . \$this->field('font_icon_size')->value() . \";}</style>\";
}

if (\$this->field('icon_margins')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_icon_text_\" . \$this->id  . \"[data-icon-pos='after'] .icon {margin-left:\" . \$this->field('icon_margins')->value() . \";}</style>\";
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_icon_text_\" . \$this->id  . \"[data-icon-pos='before'] .icon {margin-right:\" . \$this->field('icon_margins')->value() . \";}</style>\";
}

if (\$this->field('icon_size_mob')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \" .icon{width:\" . \$this->field('icon_size_mob')->value() . \"}}</style>\";
}

if (\$this->field('icon_margins_mob')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \"[data-icon-pos='after'] .icon {margin-left:\" . \$this->field('icon_margins_mob')->value() . \";}}</style>\";
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \"[data-icon-pos='before'] .icon {margin-right:\" . \$this->field('icon_margins_mob')->value() . \";}}</style>\";
}

if (\$this->field('icon_size_mob')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \" .icon i {font-size:\" . \$this->field('icon_size_mob')->value() . \";}}</style>\";
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \" .icon {width:\" . \$this->field('icon_size_mob')->value() . \";}}</style>\";
}
?>
<div class=\"<?=  \$this->class; ?> ce_icon_text_<?php echo \$this->id; ?>\" data-icon-pos=\"<?php echo \$this->field('icon_pos')->value(); ?>\" data-align=\"<?php echo \$this->field('align')->value(); ?>\" data-color=\"<?php echo \$this->field('color')->value(); ?>\"<?php echo \$this->cssID; ?>>
\t<?php if(\$this->field('link')->value()): ?>
\t<a href=\"<?php echo \$this->field('link')->value(); ?>\" <?php if(\$this->field('link')->option('titleText')): ?> title=\"<?php echo \$this->field('link')->option('titleText'); ?>\"<?php endif; ?><?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('lightbox')): ?><?php echo \$lightbox; ?><?php endif; ?>>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('font_icon')->value()): ?>
\t<div class=\"icon\">
\t\t<i class=\"<?php echo \$this->field('font_icon')->value(); ?>\"></i>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('image_icon')->value()): ?>
\t<div class=\"icon\">
\t\t<?php echo \$this->field('image_icon')->html(); ?>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('text')->value()): ?>
\t<<?= \$element; ?> class=\"text <?= str_replace('.', '', \$this->field('markup')->value()); ?>\">
\t\t<?php echo \$this->field('text')->value(); ?>
\t</<?= \$element; ?>>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('link')->value()): ?>
\t</a>
\t<?php endif; ?>
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
        return "@pct_theme_templates/customelements/customelement_icon_text.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_icon_text.css|static';

\$element = \$this->field('markup')->value();
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}

if (\$this->field('font_icon_size')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_icon_text_\" . \$this->id  . \" i {font-size:\" . \$this->field('font_icon_size')->value() . \";width:\" . \$this->field('font_icon_size')->value() . \";}</style>\";
}

if (\$this->field('icon_margins')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_icon_text_\" . \$this->id  . \"[data-icon-pos='after'] .icon {margin-left:\" . \$this->field('icon_margins')->value() . \";}</style>\";
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_icon_text_\" . \$this->id  . \"[data-icon-pos='before'] .icon {margin-right:\" . \$this->field('icon_margins')->value() . \";}</style>\";
}

if (\$this->field('icon_size_mob')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \" .icon{width:\" . \$this->field('icon_size_mob')->value() . \"}}</style>\";
}

if (\$this->field('icon_margins_mob')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \"[data-icon-pos='after'] .icon {margin-left:\" . \$this->field('icon_margins_mob')->value() . \";}}</style>\";
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \"[data-icon-pos='before'] .icon {margin-right:\" . \$this->field('icon_margins_mob')->value() . \";}}</style>\";
}

if (\$this->field('icon_size_mob')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \" .icon i {font-size:\" . \$this->field('icon_size_mob')->value() . \";}}</style>\";
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_icon_text_\" . \$this->id  . \" .icon {width:\" . \$this->field('icon_size_mob')->value() . \";}}</style>\";
}
?>
<div class=\"<?=  \$this->class; ?> ce_icon_text_<?php echo \$this->id; ?>\" data-icon-pos=\"<?php echo \$this->field('icon_pos')->value(); ?>\" data-align=\"<?php echo \$this->field('align')->value(); ?>\" data-color=\"<?php echo \$this->field('color')->value(); ?>\"<?php echo \$this->cssID; ?>>
\t<?php if(\$this->field('link')->value()): ?>
\t<a href=\"<?php echo \$this->field('link')->value(); ?>\" <?php if(\$this->field('link')->option('titleText')): ?> title=\"<?php echo \$this->field('link')->option('titleText'); ?>\"<?php endif; ?><?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('lightbox')): ?><?php echo \$lightbox; ?><?php endif; ?>>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('font_icon')->value()): ?>
\t<div class=\"icon\">
\t\t<i class=\"<?php echo \$this->field('font_icon')->value(); ?>\"></i>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('image_icon')->value()): ?>
\t<div class=\"icon\">
\t\t<?php echo \$this->field('image_icon')->html(); ?>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('text')->value()): ?>
\t<<?= \$element; ?> class=\"text <?= str_replace('.', '', \$this->field('markup')->value()); ?>\">
\t\t<?php echo \$this->field('text')->value(); ?>
\t</<?= \$element; ?>>
\t<?php endif; ?>
\t
\t<?php if(\$this->field('link')->value()): ?>
\t</a>
\t<?php endif; ?>
</div>", "@pct_theme_templates/customelements/customelement_icon_text.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_icon_text.html5");
    }
}
