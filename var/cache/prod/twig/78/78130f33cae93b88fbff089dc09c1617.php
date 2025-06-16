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

/* @pct_frontend_quickedit/interface/interface_default.html5 */
class __TwigTemplate_f4e1dc78b897ebae9bf916e864f0cbfb extends Template
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
<div id=\"<?= \$this->selector; ?>_interface\" class=\"pct_edit_interface <?= \$this->Config->table; ?>\" data-id=\"<?= \$this->Config->id; ?>\" data-table=\"<?= \$this->Config->table; ?>\" data-selector=\"<?= \$this->selector; ?>\" data-clicktoedit=\"true\">
<div class=\"__info__ <?= \$this->Config->type; ?> <?= \$this->Config->table; ?>\">
<div>
\t<div><?= \$this->Config->type; ?></div>
</div>
</div>

<div class=\"__buttons__ <?= \$this->Config->table; ?>\">
<?php foreach(\$this->buttons as \$key => \$button): ?>
<div class=\"<?= \$key; ?> __button__\">
<a href=\"<?= \$button['href']; ?>\" class=\"<?= \$button['class']; ?>\"  title=\"<?= \$button['title']; ?>\" <?php if(\$button['target']): ?>target=\"<?= \$button['target']; ?>\"<?php endif; ?><?= \$button['attributes']; ?>><?= \$button['icon']; ?></a>
</div>
<?php endforeach; ?>
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
        return "@pct_frontend_quickedit/interface/interface_default.html5";
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
        return new Source("", "@pct_frontend_quickedit/interface/interface_default.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_frontend_quickedit/templates/interface/interface_default.html5");
    }
}
