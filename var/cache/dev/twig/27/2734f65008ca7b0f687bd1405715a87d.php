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

/* @pct_customelements_plugin_customcatalog/backend/mod_be_cc_navigation.html5 */
class __TwigTemplate_787b5c2b36121afd604552d967aed22b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/backend/mod_be_cc_navigation.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/backend/mod_be_cc_navigation.html5"));

        // line 1
        yield "<div class=\"mod_be_cc_navigation block<?php if(\$this->class): ?> <?= \$this->class; ?><?php endif; ?>\">
\t<div class=\"section button edit_configs first\"><?php echo \$this->editConfigsButton; ?></div>
\t<div class=\"section configs_container\"><?php echo \$this->configItems; ?></div>
\t<?php if(\$this->hasGroups): ?>
\t<div class=\"section button edit_groups\"><?php echo \$this->editGroupsButton; ?></div>
\t<?php endif; ?>
\t<?php if(\$this->attributeItems): ?>
\t<div class=\"section attributes_container last\"><?php echo \$this->attributeItems; ?></div>
\t<?php endif; ?>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/backend/mod_be_cc_navigation.html5";
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
        return new Source("<div class=\"mod_be_cc_navigation block<?php if(\$this->class): ?> <?= \$this->class; ?><?php endif; ?>\">
\t<div class=\"section button edit_configs first\"><?php echo \$this->editConfigsButton; ?></div>
\t<div class=\"section configs_container\"><?php echo \$this->configItems; ?></div>
\t<?php if(\$this->hasGroups): ?>
\t<div class=\"section button edit_groups\"><?php echo \$this->editGroupsButton; ?></div>
\t<?php endif; ?>
\t<?php if(\$this->attributeItems): ?>
\t<div class=\"section attributes_container last\"><?php echo \$this->attributeItems; ?></div>
\t<?php endif; ?>
</div>", "@pct_customelements_plugin_customcatalog/backend/mod_be_cc_navigation.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/backend/mod_be_cc_navigation.html5");
    }
}
