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

/* @pct_customelements_plugin_customcatalog/filters/customcatalog_filter_hidden.html5 */
class __TwigTemplate_58a3ed92fdd15e96aa4f21e76253bc29 extends Template
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
<input <?php echo \$this->cssID ? \$this->cssID : \"id=ctrl_\".\$this->name; ?> <?php if(\$this->class): ?> class=\"<?php echo \$this->class; ?>\"<?php endif; ?> type=\"hidden\" name=\"<?php echo \$this->name; ?>\" value=\"<?php echo \$this->value; ?>\">
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_hidden.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_hidden.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/filters/customcatalog_filter_hidden.html5");
    }
}
