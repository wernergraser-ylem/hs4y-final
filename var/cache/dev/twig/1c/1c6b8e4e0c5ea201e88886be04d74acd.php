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

/* @pct_theme_templates/news/news_portfoliolist_v7.html5 */
class __TwigTemplate_9fdb47b7545481faf6cb4ac18d432ffe extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_portfoliolist_v7.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_portfoliolist_v7.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/portfolio/news_portfoliolist_v7.css|static';

// handle multiple filter values by commata seperated lists
\$arrFilterClasses = array();
foreach(explode(',', \$this->subHeadline) as \$v)
{
\t\$arrFilterClasses[] = 'filter_'.str_replace(array('ä','ü','ö','ß'),array('ae','ue','oe','ss'),\\Contao\\StringUtil::standardize(\$v));
}
// filter field in use
if( isset(\$this->filters) && !empty(\$this->filters) )
{
\t\$arrFilterClasses = array();
\tforeach( \\Contao\\StringUtil::deserialize(\$this->filters) as \$v)
\t{
\t\t\$arrFilterClasses[] = 'filter_'.str_replace(array('ä','ü','ö','ß'),array('ae','ue','oe','ss'),\\Contao\\StringUtil::standardize(\$v));
\t}
}
\$hasText = \$this->hasText;
?>

<div class=\"item block <?php echo \$this->class; ?> <?php echo implode(' ', \$arrFilterClasses) ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<div class=\"item-inside\">
\t\t<div class=\"image image_container\">
\t\t\t<?php if (\$hasText): ?><a href=\"<?php echo \$this->link; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>><?php endif; ?>
\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t<?php if (\$hasText): ?></a><?php endif; ?>
\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t<span class=\"comments\"><?php echo \$this->numberOfComments; ?></span>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<div class=\"info\">
\t\t\t<?php if (\$this->subHeadline): ?>
\t\t\t<div class=\"subline\">
\t\t\t\t<?php echo \$this->subHeadline; ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t<div class=\"title h5\"><?php echo \$hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t\t\t<?php if (\$this->hasTeaser): ?>
\t\t\t<div class=\"teaser\" itemprop=\"description\">
\t\t\t\t<?php echo \$this->teaser; ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t</div>

\t\t<div class=\"item-bottom\">
\t\t\t<?php if (\$hasText): ?>
\t\t\t<?php echo \$this->more; ?>
\t\t\t<?php endif; ?>
\t\t\t<?php if (\$this->date): ?>
\t\t\t<div class=\"date\" itemprop=\"datePublished\">
\t\t\t<?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?> <?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?> <?= \\Contao\\Date::parse(\"Y\", \$this->timestamp);?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t</div>
\t</div>\t
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
        return "@pct_theme_templates/news/news_portfoliolist_v7.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/portfolio/news_portfoliolist_v7.css|static';

// handle multiple filter values by commata seperated lists
\$arrFilterClasses = array();
foreach(explode(',', \$this->subHeadline) as \$v)
{
\t\$arrFilterClasses[] = 'filter_'.str_replace(array('ä','ü','ö','ß'),array('ae','ue','oe','ss'),\\Contao\\StringUtil::standardize(\$v));
}
// filter field in use
if( isset(\$this->filters) && !empty(\$this->filters) )
{
\t\$arrFilterClasses = array();
\tforeach( \\Contao\\StringUtil::deserialize(\$this->filters) as \$v)
\t{
\t\t\$arrFilterClasses[] = 'filter_'.str_replace(array('ä','ü','ö','ß'),array('ae','ue','oe','ss'),\\Contao\\StringUtil::standardize(\$v));
\t}
}
\$hasText = \$this->hasText;
?>

<div class=\"item block <?php echo \$this->class; ?> <?php echo implode(' ', \$arrFilterClasses) ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<div class=\"item-inside\">
\t\t<div class=\"image image_container\">
\t\t\t<?php if (\$hasText): ?><a href=\"<?php echo \$this->link; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>><?php endif; ?>
\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t<?php if (\$hasText): ?></a><?php endif; ?>
\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t<span class=\"comments\"><?php echo \$this->numberOfComments; ?></span>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<div class=\"info\">
\t\t\t<?php if (\$this->subHeadline): ?>
\t\t\t<div class=\"subline\">
\t\t\t\t<?php echo \$this->subHeadline; ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t<div class=\"title h5\"><?php echo \$hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t\t\t<?php if (\$this->hasTeaser): ?>
\t\t\t<div class=\"teaser\" itemprop=\"description\">
\t\t\t\t<?php echo \$this->teaser; ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t</div>

\t\t<div class=\"item-bottom\">
\t\t\t<?php if (\$hasText): ?>
\t\t\t<?php echo \$this->more; ?>
\t\t\t<?php endif; ?>
\t\t\t<?php if (\$this->date): ?>
\t\t\t<div class=\"date\" itemprop=\"datePublished\">
\t\t\t<?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?> <?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?> <?= \\Contao\\Date::parse(\"Y\", \$this->timestamp);?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t</div>
\t</div>\t
</div>", "@pct_theme_templates/news/news_portfoliolist_v7.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_portfoliolist_v7.html5");
    }
}
