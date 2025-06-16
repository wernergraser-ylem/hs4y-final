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

/* @pct_theme_settings/backend/be_js_themesettings.html5 */
class __TwigTemplate_b19e9e4da620e1d8a39948a3d5197dad extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/backend/be_js_themesettings.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/backend/be_js_themesettings.html5"));

        // line 1
        yield "
<?php if(\$this->context == 'listElement'): ?>
<script>
/**
 * Pass theme-settings related information to list elements rows
 */
jQuery(document).ready(function() 
{
\tvar objElement = jQuery('#li_<?= \$this->id; ?>');
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}

\t// add visibility css
\t<?php if( isset(\$this->visibility_css) && !empty(\$this->visibility_css) ): ?>
\tobjElement.addClass('<?= \$this->visibility_css; ?> has_visibility');
\t<?php endif; ?>
});

</script>
<?php endif; ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_settings/backend/be_js_themesettings.html5";
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
        return new Source("
<?php if(\$this->context == 'listElement'): ?>
<script>
/**
 * Pass theme-settings related information to list elements rows
 */
jQuery(document).ready(function() 
{
\tvar objElement = jQuery('#li_<?= \$this->id; ?>');
\tif(objElement.length < 1)
\t{
\t\treturn;
\t}

\t// add visibility css
\t<?php if( isset(\$this->visibility_css) && !empty(\$this->visibility_css) ): ?>
\tobjElement.addClass('<?= \$this->visibility_css; ?> has_visibility');
\t<?php endif; ?>
});

</script>
<?php endif; ?>", "@pct_theme_settings/backend/be_js_themesettings.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/backend/be_js_themesettings.html5");
    }
}
