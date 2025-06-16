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

/* @pct_customelements_plugin_customcatalog/attributes/customelement_attr_tags_include_catalog.html5 */
class __TwigTemplate_1cb68dbadd2dfba432a23a80fb16d4a0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_tags_include_catalog.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_tags_include_catalog.html5"));

        // line 1
        yield "<?php
use Contao\\CustomCatalog;
use Contao\\StringUtil;

\$arrValues = StringUtil::deserialize( \$this->rawValue );
\$objFilter = new \\PCT\\CustomElements\\Filters\\SimpleFilter(\$arrValues);
\$objCC = CustomCatalog::findByTableName( \$this->tag_table );
?>
<?php if( \$objCC === null ): ?>
<p>CustomCatalog not found: <?= \$this->tag_table; ?>
<?php else: ?>
<?php
\$objCC->setOrigin( \$this->CustomCatalog->getModule() );
\$objCC->setFilter( \$objFilter ); // applys the simple filter to the selected elements
\$objCC->setLayoutTemplate('customcatalog_default'); // set the layout template
?>
<?php endif; ?>
<div <?= \$this->cssID; ?> <?php if(\$this->class): ?>class=\"<?= \$this->class; ?>\"<?php endif; ?>>
<?php // render the catalog to the template
echo \$objCC->render(); ?>
</div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_tags_include_catalog.html5";
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
        return new Source("<?php
use Contao\\CustomCatalog;
use Contao\\StringUtil;

\$arrValues = StringUtil::deserialize( \$this->rawValue );
\$objFilter = new \\PCT\\CustomElements\\Filters\\SimpleFilter(\$arrValues);
\$objCC = CustomCatalog::findByTableName( \$this->tag_table );
?>
<?php if( \$objCC === null ): ?>
<p>CustomCatalog not found: <?= \$this->tag_table; ?>
<?php else: ?>
<?php
\$objCC->setOrigin( \$this->CustomCatalog->getModule() );
\$objCC->setFilter( \$objFilter ); // applys the simple filter to the selected elements
\$objCC->setLayoutTemplate('customcatalog_default'); // set the layout template
?>
<?php endif; ?>
<div <?= \$this->cssID; ?> <?php if(\$this->class): ?>class=\"<?= \$this->class; ?>\"<?php endif; ?>>
<?php // render the catalog to the template
echo \$objCC->render(); ?>
</div>
", "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_tags_include_catalog.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/attributes/customelement_attr_tags_include_catalog.html5");
    }
}
