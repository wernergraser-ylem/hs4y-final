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

/* @pct_theme_templates/customelements/customelement_bgimage_content_divider.html5 */
class __TwigTemplate_172a910c843603da1425cf9f93d6c4d5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_bgimage_content_divider.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_bgimage_content_divider.html5"));

        // line 1
        yield "</div></div>
<div class=\"ce_bgimage_content_right\">
\t<div class=\"bg_overlay <?php \$GLOBALS['ce_bgimage_extended']['bg_color'] ?? ''; ?>\"<?php if(isset(\$GLOBALS['ce_bgimage_extended']['bg_owncolor'])): ?> style=\"background-color:#<?php echo \$GLOBALS['ce_bgimage_extended']['bg_owncolor'] ?? ''; ?>;\"<?php endif; ?>></div>
\t<div class=\"ce_bgimage_content\">\t";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_bgimage_content_divider.html5";
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
        return new Source("</div></div>
<div class=\"ce_bgimage_content_right\">
\t<div class=\"bg_overlay <?php \$GLOBALS['ce_bgimage_extended']['bg_color'] ?? ''; ?>\"<?php if(isset(\$GLOBALS['ce_bgimage_extended']['bg_owncolor'])): ?> style=\"background-color:#<?php echo \$GLOBALS['ce_bgimage_extended']['bg_owncolor'] ?? ''; ?>;\"<?php endif; ?>></div>
\t<div class=\"ce_bgimage_content\">\t", "@pct_theme_templates/customelements/customelement_bgimage_content_divider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_bgimage_content_divider.html5");
    }
}
