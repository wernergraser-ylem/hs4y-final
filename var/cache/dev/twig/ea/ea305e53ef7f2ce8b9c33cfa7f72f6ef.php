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
class __TwigTemplate_6479558a0e7ca16d77c8499d5274d3ae extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_revolutionslider/ce_revolutionslider_hyperlink.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_revolutionslider/ce_revolutionslider_hyperlink.html5"));

        // line 1
        yield "
<?= \$this->embed_pre; ?>
<a class=\"hyperlink_txt <?= \$this->class; ?> block\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?> href=\"<?= \$this->href; ?>\" title=\"<?= \$this->linkTitle; ?>\"<?= \$this->attribute; ?><?= \$this->target; ?> data-textAlign=\"['center','center']\">
  <?= \$this->link; ?>
</a>
<?= \$this->embed_post; ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
<?= \$this->embed_pre; ?>
<a class=\"hyperlink_txt <?= \$this->class; ?> block\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?> href=\"<?= \$this->href; ?>\" title=\"<?= \$this->linkTitle; ?>\"<?= \$this->attribute; ?><?= \$this->target; ?> data-textAlign=\"['center','center']\">
  <?= \$this->link; ?>
</a>
<?= \$this->embed_post; ?>", "@pct_revolutionslider/ce_revolutionslider_hyperlink.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_revolutionslider/templates/ce_revolutionslider_hyperlink.html5");
    }
}
