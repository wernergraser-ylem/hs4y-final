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

/* @pct_theme_templates/customelements/customelement_vertical_spacer_px.html5 */
class __TwigTemplate_8b78fff5b70a0aaa9bd69e736c339853 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_vertical_spacer_px.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_vertical_spacer_px.html5"));

        // line 1
        yield "<?php
if(\$this->field('height_mobile')->value())
\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px){.ce_vertical_spacer_\" . \$this->id  . \" {height:\" . \$this->field('height_mobile')->value() . \"px!important;}}</style>\"
?>
<div class=\"<?= \$this->class; ?> ce_vertical_spacer_<?= \$this->id ?><?php if(\$this->field('mobile_hide')->value()): ?> hide-mobile<?php endif; ?>\" style=\"height:<?= \$this->field('height')->value(); ?>px;\"<?= \$this->cssID; ?>></div>
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
        return "@pct_theme_templates/customelements/customelement_vertical_spacer_px.html5";
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
if(\$this->field('height_mobile')->value())
\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px){.ce_vertical_spacer_\" . \$this->id  . \" {height:\" . \$this->field('height_mobile')->value() . \"px!important;}}</style>\"
?>
<div class=\"<?= \$this->class; ?> ce_vertical_spacer_<?= \$this->id ?><?php if(\$this->field('mobile_hide')->value()): ?> hide-mobile<?php endif; ?>\" style=\"height:<?= \$this->field('height')->value(); ?>px;\"<?= \$this->cssID; ?>></div>
", "@pct_theme_templates/customelements/customelement_vertical_spacer_px.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_vertical_spacer_px.html5");
    }
}
