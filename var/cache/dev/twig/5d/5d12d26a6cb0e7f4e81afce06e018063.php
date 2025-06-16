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
class __TwigTemplate_35e886518866a4333cca01626fe5201c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_portfolioreader.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_portfolioreader.html5"));

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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
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
?>", "@pct_theme_templates/news/news_portfolioreader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_portfolioreader.html5");
    }
}
