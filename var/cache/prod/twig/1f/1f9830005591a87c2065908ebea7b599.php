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

/* @pct_theme_settings/portfolio/portfoliofilter_php.html5 */
class __TwigTemplate_8485e9a0a6eb666566298d1793129cb5 extends Template
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
<?php
global \$objPage;
\$arrFilter = \\deserialize(\$this->news_filters) ?: array();

// multiple filtering
\$isMultiple = (boolean)\$this->news_filter_multiple; // true|false

\$arrFilters = array_filter( explode(',', \\Contao\\Input::get('filter') ) );
\$strBase = \$objPage->getFrontendUrl();
?>

<ul id='portfoliofilter_<?= \$this->id; ?>' class=\"mod_portfoliofilter php filter block\">
<?php foreach(\$arrFilter as \$data): ?>

<?php 
// active state
\$isActive = false;
if(in_array(\$data['value'], \$arrFilters) )
{
\t\$isActive = true;
}

\$filters = array();
if( \$isMultiple )
{
\t\$filters = \$arrFilters;
}

// add filter value
if( \$isMultiple && !in_array(\$data['value'], \$filters) )
{
\t\$filters[] = \$data['value'];
}
// remove filter value
else if( \$isMultiple && in_array(\$data['value'], \$filters) )
{
\t\$i = array_search(\$data['value'], \$filters);
\tunset( \$filters[\$i] );
}
// simply strict filter value
else if( !\$isMultiple )
{
\t\$filters = array( \$data['value'] );
}
// build filter url
\$filterUrl = \$strBase;
if( !empty(\$filters) )
{
\t\$filterUrl .= '?filter='.implode(',', \$filters); 
}
?>

<li class=\"<?= \$data['value']; ?> <?php if(\$isActive): ?>active<?php endif; ?>\" data-filter=\"<?= \$data['value']; ?>\">
<?php if(\$isActive && !\$isMultiple): ?>
<span class=\"active\"><?= \$data['label']; ?></span>
<?php else: ?>
<a href=\"<?= \$filterUrl ?>\" class=\"<?php if(\$isActive): ?>active<?php endif; ?>\" title=\"Filter: <?php \$data['label']; ?>\"><?= \$data['label']; ?></a>
<?php endif; ?>
</li>
<?php endforeach; ?>
</ul>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_settings/portfolio/portfoliofilter_php.html5";
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
        return new Source("", "@pct_theme_settings/portfolio/portfoliofilter_php.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/portfolio/portfoliofilter_php.html5");
    }
}
