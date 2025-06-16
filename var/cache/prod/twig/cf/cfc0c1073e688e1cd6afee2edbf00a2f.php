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

/* @pct_frontend_quickedit/interface/interface_contentelement_autogridColStart.html5 */
class __TwigTemplate_9773dc7fe5b70fa66b3275cd1f94b450 extends Template
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
        yield "<!-- indexer::stop -->
<div id=\"<?= \$this->selector; ?>_interface\" class=\"pct_edit_interface <?= \$this->Config->table; ?>\" data-id=\"<?= \$this->Config->id; ?>\" data-table=\"<?= \$this->Config->table; ?>\" data-selector=\"<?= \$this->selector; ?>\"<?php if(\$this->clickToEdit): ?> data-clicktoedit=\"true\"<?php endif; ?>>
<div class=\"__info__ <?= \$this->Config->type; ?> <?= \$this->Config->table; ?>\">
<div>
\t<div><?= (\$GLOBALS['TL_LANG']['CTE'][\$this->Config->type][0] ?? \$this->Config->type); ?></div>
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
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_frontend_quickedit/interface/interface_contentelement_autogridColStart.html5";
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
        return new Source("", "@pct_frontend_quickedit/interface/interface_contentelement_autogridColStart.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_frontend_quickedit/templates/interface/interface_contentelement_autogridColStart.html5");
    }
}
