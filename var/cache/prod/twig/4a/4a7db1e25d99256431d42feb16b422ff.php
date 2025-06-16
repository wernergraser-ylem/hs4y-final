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

/* @pct_autogrid/backend/be_autogrid_row.html5 */
class __TwigTemplate_f9746f5c52b50f21bd94ec1ae35c8e4b extends Template
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
<?php if(isset(\$this->AutoGrid->start)): ?>
<div class=\"grid_preview\">
<div class=\"placeholder\" data-id=\"<?= \$this->id; ?>\"></div>
<div class=\"autogrid_row<?php if(\$this->autogrid_gutter):?> <?= \$this->autogrid_gutter; ?><?php endif; ?><?php if(\$this->autogrid_sameheight):?> same_height<?php endif; ?>\">
<?php endif; ?>
<?php if(isset(\$this->AutoGrid->stop)): ?>
</div>
<div class=\"placeholder\" data-id=\"<?= \$this->id; ?>\"></div>
</div>
<?php endif;?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/backend/be_autogrid_row.html5";
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
        return new Source("", "@pct_autogrid/backend/be_autogrid_row.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/backend/be_autogrid_row.html5");
    }
}
