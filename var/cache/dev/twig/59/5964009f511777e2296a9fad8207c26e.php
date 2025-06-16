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

/* @pct_frontend_quickedit/interface/interface_contentelement_sliderStart.html5 */
class __TwigTemplate_2812f4229a1c220b818a6806d6279942 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_frontend_quickedit/interface/interface_contentelement_sliderStart.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_frontend_quickedit/interface/interface_contentelement_sliderStart.html5"));

        // line 1
        yield "<!-- indexer::stop -->
<div id=\"<?= \$this->selector; ?>_interface\" class=\"pct_edit_interface <?= \$this->Config->table; ?>\" data-id=\"<?= \$this->Config->id; ?>\" data-table=\"<?= \$this->Config->table; ?>\" data-selector=\"<?= \$this->selector; ?>\"<?php if(\$this->clickToEdit): ?> data-clicktoedit=\"true\"<?php endif; ?>>
<div class=\"__info__ <?= \$this->Config->type; ?> <?= \$this->Config->table; ?>\">
<div>
\t<div><?= \$this->Config->type; ?></div>
</div>
</div>
<div class=\"__buttons__ <?= \$this->Config->table; ?> <?= \$this->Config->type; ?>\">
\t<?php \$button = \$this->buttons['edit']; ?>
\t<div class=\"edit __button__\">
\t<a href=\"<?= \$button['href']; ?>\" class=\"<?= \$button['class']; ?>\"  title=\"<?= \$button['title']; ?>\" <?php if(\$button['target']): ?>target=\"<?= \$button['target']; ?>\"<?php endif; ?><?= \$button['attributes']; ?>><?= \$button['icon']; ?></a>
\t</div>
\t<?php \$button = \$this->buttons['edit_list']; ?>
\t<div class=\"edit_list __button__\">
\t<a href=\"<?= \$button['href']; ?>\" class=\"<?= \$button['class']; ?>\"  title=\"<?= \$button['title']; ?>\" <?php if(\$button['target']): ?>target=\"<?= \$button['target']; ?>\"<?php endif; ?><?= \$button['attributes']; ?>><?= \$button['icon']; ?></a>
\t</div>
</div>
</div>
<!-- indexer::continue -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_frontend_quickedit/interface/interface_contentelement_sliderStart.html5";
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
        return new Source("<!-- indexer::stop -->
<div id=\"<?= \$this->selector; ?>_interface\" class=\"pct_edit_interface <?= \$this->Config->table; ?>\" data-id=\"<?= \$this->Config->id; ?>\" data-table=\"<?= \$this->Config->table; ?>\" data-selector=\"<?= \$this->selector; ?>\"<?php if(\$this->clickToEdit): ?> data-clicktoedit=\"true\"<?php endif; ?>>
<div class=\"__info__ <?= \$this->Config->type; ?> <?= \$this->Config->table; ?>\">
<div>
\t<div><?= \$this->Config->type; ?></div>
</div>
</div>
<div class=\"__buttons__ <?= \$this->Config->table; ?> <?= \$this->Config->type; ?>\">
\t<?php \$button = \$this->buttons['edit']; ?>
\t<div class=\"edit __button__\">
\t<a href=\"<?= \$button['href']; ?>\" class=\"<?= \$button['class']; ?>\"  title=\"<?= \$button['title']; ?>\" <?php if(\$button['target']): ?>target=\"<?= \$button['target']; ?>\"<?php endif; ?><?= \$button['attributes']; ?>><?= \$button['icon']; ?></a>
\t</div>
\t<?php \$button = \$this->buttons['edit_list']; ?>
\t<div class=\"edit_list __button__\">
\t<a href=\"<?= \$button['href']; ?>\" class=\"<?= \$button['class']; ?>\"  title=\"<?= \$button['title']; ?>\" <?php if(\$button['target']): ?>target=\"<?= \$button['target']; ?>\"<?php endif; ?><?= \$button['attributes']; ?>><?= \$button['icon']; ?></a>
\t</div>
</div>
</div>
<!-- indexer::continue -->", "@pct_frontend_quickedit/interface/interface_contentelement_sliderStart.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_frontend_quickedit/templates/interface/interface_contentelement_sliderStart.html5");
    }
}
