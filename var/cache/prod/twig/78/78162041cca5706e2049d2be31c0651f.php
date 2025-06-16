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

/* @pct_theme_updater/pct_theme_updater_breadcrumb.html5 */
class __TwigTemplate_1ef287bbbfa8030fc474a9dc685be499 extends Template
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
<div class=\"breadcrumb\">
\t<table>
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th class=\"col1\">Status</th>
\t\t\t\t<th class=\"col2\">Job</th>
\t\t\t\t<th class=\"col3\">Beschreibung</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t
\t\t\t<?php foreach(\$this->items as \$item): ?>
\t\t\t
\t\t\t<tr class=\"<?= \$item['class']; ?>\">
\t\t\t\t<td><i></i></td>
\t\t\t\t<td>
\t\t\t\t\t<?php if(\$item['isActive']): ?>
\t\t\t\t\t<span><?= \$item['label']; ?></span>
\t\t\t\t\t<?php else: ?>
\t\t\t\t\t<?php 
\t\t\t\t\t\$elem = \$item['isLink'] ? 'a' : 'span';
\t\t\t\t\t?>
\t\t\t\t\t<<?= \$elem; ?> href=\"<?= \$item['href']; ?>\" title=\"<?= \$item['title']; ?>\"><?= \$item['label']; ?></<?= \$elem; ?>>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t</td>
\t\t\t\t<td><?= \$item['description']; ?></td>
\t\t\t</tr>
\t\t\t
\t\t\t<?php endforeach; ?>
\t\t</tbody>
\t</table>
</div>
\t
\t\t";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_updater/pct_theme_updater_breadcrumb.html5";
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
        return new Source("", "@pct_theme_updater/pct_theme_updater_breadcrumb.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_updater/templates/pct_theme_updater_breadcrumb.html5");
    }
}
