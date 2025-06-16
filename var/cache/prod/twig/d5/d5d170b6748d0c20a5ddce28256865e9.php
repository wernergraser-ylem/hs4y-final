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

/* @pct_autogrid/form_autogrid_row.html5 */
class __TwigTemplate_87c2db5f9f860bdfeb8a99842df07860 extends Template
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
<?php if(\$this->AutoGrid->start): ?>
<div class=\"autogrid_row<?php if(\$this->class): ?> <?= \$this->class; ?><?php endif; ?><?php if(\$this->AutoGrid->gutter): ?> <?= \$this->AutoGrid->gutter; ?><?php endif; ?><?php if(\$this->AutoGrid->same_height): ?> same_height<?php endif; ?>\" <?= \$this->cssID ?><?php if(\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?> >
<?php endif; ?>
<?php if(\$this->AutoGrid->stop): ?>
</div>
<?php endif;?>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/form_autogrid_row.html5";
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
        return new Source("", "@pct_autogrid/form_autogrid_row.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/form_autogrid_row.html5");
    }
}
