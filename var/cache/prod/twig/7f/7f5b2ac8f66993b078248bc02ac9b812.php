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

/* @pct_themer/themedesigner/td_nav.html5 */
class __TwigTemplate_27111ed9c00e42f1e1eea8dc1e60069c extends Template
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
        yield "<ul class=\"<?= \$this->level ?>\">
  <?php foreach (\$this->items as \$item): ?>
     <li<?php if (\$item['class']): ?> class=\"<?= \$item['class'] ?><?php if(\$item['isActive']):?> active<?php endif; ?>\"<?php endif; ?><?= \$item['data_attributes']; ?>>
     \t<span title=\"<?= \$item['title'] ?>\"<?php if (\$item['class']): ?> class=\"<?= \$item['class'] ?>><?php if(\$item['isActive']):?> active<?php endif; ?>\"<?php endif; ?><?= \$item['target'] ?><?= \$item['attributes']; ?>><?= \$item['link'] ?></span><?= \$item['subitems'] ?>
\t </li>
  <?php endforeach; ?>
</ul>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/td_nav.html5";
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
        return new Source("", "@pct_themer/themedesigner/td_nav.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/td_nav.html5");
    }
}
