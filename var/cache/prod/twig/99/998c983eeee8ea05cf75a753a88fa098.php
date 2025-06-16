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
class __TwigTemplate_8651e0600b7bc108cf073bd761bdd3d8 extends Template
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_theme_settings/backend/be_js_themesettings.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/backend/be_js_themesettings.html5");
    }
}
