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

/* @KnpMenu/menu.html.twig */
class __TwigTemplate_3390b2d381353ddb56a86fe091f06877 extends Template
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

        $this->blocks = [
            'label' => [$this, 'block_label'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("knp_menu.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        $context["translation_domain"] = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "extra", ["translation_domain", "messages"], "method", false, false, false, 4);
        // line 5
        $context["label"] = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "label", [], "any", false, false, false, 5);
        // line 6
        if ((($tmp =  !(($context["translation_domain"] ?? null) === false)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            $context["label"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["label"] ?? null), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "extra", ["translation_params", []], "method", false, false, false, 7), ($context["translation_domain"] ?? null));
        }
        // line 9
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "allow_safe_labels", [], "any", false, false, false, 9) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "extra", ["safe_label", false], "method", false, false, false, 9))) {
            yield ($context["label"] ?? null);
        } else {
            yield $this->env->getFilter('escape')->getCallable()($this->env, ($context["label"] ?? null), "html", null, true);
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@KnpMenu/menu.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  67 => 9,  64 => 7,  62 => 6,  60 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@KnpMenu/menu.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/knplabs/knp-menu-bundle/templates/menu.html.twig");
    }
}
