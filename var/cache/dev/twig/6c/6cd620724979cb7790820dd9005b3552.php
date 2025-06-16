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
class __TwigTemplate_739b1633c290c42b32ef9fd2a7ff9681 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_updater/pct_theme_updater_breadcrumb.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_updater/pct_theme_updater_breadcrumb.html5"));

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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
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
\t\t", "@pct_theme_updater/pct_theme_updater_breadcrumb.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_updater/templates/pct_theme_updater_breadcrumb.html5");
    }
}
