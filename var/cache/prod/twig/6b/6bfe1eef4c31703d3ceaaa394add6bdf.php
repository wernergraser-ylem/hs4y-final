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

/* @pct_customelements_plugin_customcatalog/mod_customcatalogapi.html5 */
class __TwigTemplate_96eef7dcdb49f729b67aaf3d9087f047 extends Template
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
<div class=\"<?php echo \$this->class; ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
<?php if (\$this->headline): ?>
<<?php echo \$this->hl; ?>><?php echo \$this->headline; ?></<?php echo \$this->hl; ?>>
<?php endif; ?>

<form action=\"<?php echo \$this->action; ?>\" method=\"<?php echo \$this->method; ?>\">
\t
\t<?php if(strtolower(\$this->method) == 'post'):?>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?php echo \$this->formId; ?>\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
\t<?php endif; ?>
\t
\t<input type=\"hidden\" name=\"api\" value=\"<?php echo \$this->Api->id; ?>\">
\t
\t<?php echo \$this->hidden; ?>
\t
\t<div class=\"tl_formbody_submit\">
\t\t<div class=\"tl_submit_container\">
\t\t\t<?php echo \$this->runSubmit; ?>
\t\t</div>
\t</div>
</form>

</div>



";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/mod_customcatalogapi.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/mod_customcatalogapi.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/mod_customcatalogapi.html5");
    }
}
