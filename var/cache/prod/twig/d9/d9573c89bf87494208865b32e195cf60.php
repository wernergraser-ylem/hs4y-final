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

/* @pct_theme_templates/modules/mod_navigation_mainmenu.html5 */
class __TwigTemplate_86f2a092ddd04e79fc3be63905d506b0 extends Template
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
<!-- indexer::stop -->
<nav class=\"<?= \$this->class ?> mainmenu block edit-off\" tabindex=\"-1\"<?php if (\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?> itemscope itemtype=\"http://schema.org/SiteNavigationElement\">

  <?php if (\$this->headline): ?>
    <<?= \$this->hl ?>><?= \$this->headline ?></<?= \$this->hl ?>>
  <?php endif; ?>

  <?= \$this->items ?>

</nav>
<!-- indexer::continue -->
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_navigation_mainmenu.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_navigation_mainmenu.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_navigation_mainmenu.html5");
    }
}
