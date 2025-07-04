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

/* @pct_theme_templates/news/news_portfolioreader.html5 */
class __TwigTemplate_55be41aaad77a201f04c7194404dfe7a extends Template
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
<div class=\"portfolioreader block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">
<?php echo \$this->text; ?>
</div>

<?php
\$schemaOrg = \$this->getSchemaOrgData();
\$schemaOrg['primaryImageOfPage']['contentUrl'] = \$this->singleSRC;

if (\$this->hasText) {
\t\$schemaOrg['text'] = \$this->rawHtmlToPlainText(\$this->text);
}

\$this->addSchemaOrg(\$schemaOrg);
?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/news/news_portfolioreader.html5";
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
        return new Source("", "@pct_theme_templates/news/news_portfolioreader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_portfolioreader.html5");
    }
}
