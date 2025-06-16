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

/* @pct_theme_templates/elements/ce_accordionStart.html5 */
class __TwigTemplate_ff4b80d86f67379cb6f6d16f367476fc extends Template
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
<section class=\"<?= \$this->class ?> ce_accordion block\"<?= \$this->cssID ?><?php if (\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?>>

  <button type=\"button\" class=\"<?= \$this->toggler ?>\"<?php if (\$this->headlineStyle): ?> style=\"<?= \$this->headlineStyle ?>\"<?php endif; ?>>
    <?= \$this->headline ?>
  </button>

  <div class=\"<?= \$this->accordion ?>\"><div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/elements/ce_accordionStart.html5";
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
        return new Source("", "@pct_theme_templates/elements/ce_accordionStart.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/elements/ce_accordionStart.html5");
    }
}
