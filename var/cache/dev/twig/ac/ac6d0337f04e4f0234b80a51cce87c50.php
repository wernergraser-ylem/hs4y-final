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

/* @pct_theme_templates/news/news_newsreader.html5 */
class __TwigTemplate_50adf678ac8faa456280ffc2d9a7ab38 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_newsreader.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_newsreader.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsreader.css|static';
?>
<div class=\"newsreader block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">

<?php \$this->block('info'); ?>
<div class=\"info\"><?php if (\$this->date): ?><div class=\"date\" itemprop=\"datePublished\"><?php echo \$this->date; ?></div><?php endif; ?><?php if (\$this->author): ?><div class=\"author\"><?php echo \$this->author; ?></div><?php endif; ?><?php if (\$this->commentCount): ?><div class=\"comments\"><?php echo \$this->commentCount; ?></div><?php endif; ?></div>
<?php \$this->endblock(); ?>

<?php if (\$this->hasSubHeadline): ?>

<?php endif; ?>
<?php echo \$this->text; ?>
<?php if (\$this->enclosure): ?>

<div class=\"enclosure\">
<?php foreach (\$this->enclosure as \$enclosure): ?>
<p><img src=\"<?php echo \$enclosure['icon']; ?>\" width=\"18\" height=\"18\" alt=\"<?php echo \$enclosure['title']; ?>\" class=\"mime_icon\" /> <a href=\"<?php echo \$enclosure['href']; ?>\" title=\"<?php echo \$enclosure['title']; ?>\"><?php echo \$enclosure['link']; ?> <span class=\"size\">(<?php echo \$enclosure['filesize']; ?>)</span></a></p>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>

<?php
\$schemaOrg = \$this->getSchemaOrgData();
if( \$this->addImage && \$this->singleSRC )
{
\t\$schemaOrg['primaryImageOfPage']['contentUrl'] = \$this->singleSRC;
}
if (\$this->hasText) {
\t\$schemaOrg['text'] = \$this->rawHtmlToPlainText(\$this->text);
}

\$this->addSchemaOrg(\$schemaOrg);
?>
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
        return "@pct_theme_templates/news/news_newsreader.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsreader.css|static';
?>
<div class=\"newsreader block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">

<?php \$this->block('info'); ?>
<div class=\"info\"><?php if (\$this->date): ?><div class=\"date\" itemprop=\"datePublished\"><?php echo \$this->date; ?></div><?php endif; ?><?php if (\$this->author): ?><div class=\"author\"><?php echo \$this->author; ?></div><?php endif; ?><?php if (\$this->commentCount): ?><div class=\"comments\"><?php echo \$this->commentCount; ?></div><?php endif; ?></div>
<?php \$this->endblock(); ?>

<?php if (\$this->hasSubHeadline): ?>

<?php endif; ?>
<?php echo \$this->text; ?>
<?php if (\$this->enclosure): ?>

<div class=\"enclosure\">
<?php foreach (\$this->enclosure as \$enclosure): ?>
<p><img src=\"<?php echo \$enclosure['icon']; ?>\" width=\"18\" height=\"18\" alt=\"<?php echo \$enclosure['title']; ?>\" class=\"mime_icon\" /> <a href=\"<?php echo \$enclosure['href']; ?>\" title=\"<?php echo \$enclosure['title']; ?>\"><?php echo \$enclosure['link']; ?> <span class=\"size\">(<?php echo \$enclosure['filesize']; ?>)</span></a></p>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>

<?php
\$schemaOrg = \$this->getSchemaOrgData();
if( \$this->addImage && \$this->singleSRC )
{
\t\$schemaOrg['primaryImageOfPage']['contentUrl'] = \$this->singleSRC;
}
if (\$this->hasText) {
\t\$schemaOrg['text'] = \$this->rawHtmlToPlainText(\$this->text);
}

\$this->addSchemaOrg(\$schemaOrg);
?>
", "@pct_theme_templates/news/news_newsreader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newsreader.html5");
    }
}
