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

/* @pct_revolutionslider/ce_revolutionslider_hyperlink.html5 */
class __TwigTemplate_56d58ca0d3c40dbf0064a74153338174 extends Template
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
<?= \$this->embed_pre; ?>
<a class=\"hyperlink_txt <?= \$this->class; ?> block\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?> href=\"<?= \$this->href; ?>\" title=\"<?= \$this->linkTitle; ?>\"<?= \$this->attribute; ?><?= \$this->target; ?> data-textAlign=\"['center','center']\">
  <?= \$this->link; ?>
</a>
<?= \$this->embed_post; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_revolutionslider/ce_revolutionslider_hyperlink.html5";
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
        return new Source("", "@pct_revolutionslider/ce_revolutionslider_hyperlink.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_revolutionslider/templates/ce_revolutionslider_hyperlink.html5");
    }
}
