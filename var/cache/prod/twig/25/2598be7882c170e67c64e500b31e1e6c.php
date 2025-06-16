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
class __TwigTemplate_77d64effebe078818ae677a2c1cbfb31 extends Template
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_tags_include_catalog.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/attributes/customelement_attr_tags_include_catalog.html5");
    }
}
