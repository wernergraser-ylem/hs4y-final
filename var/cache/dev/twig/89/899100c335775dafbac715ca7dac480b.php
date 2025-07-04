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

/* @pct_theme_templates/news/news_portfoliolist_v8.html5 */
class __TwigTemplate_02fca82ff5e5bc93e9094e8651910915 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_portfoliolist_v8.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_portfoliolist_v8.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/portfolio/news_portfoliolist_v8.css|static';

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
?>

<div class=\"item block <?php echo \$this->class; ?> port_overlay <?php echo implode(' ', \$arrFilterClasses) ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<div class=\"content\">
\t\t<a href=\"<?php echo \$this->href ? \$this->href : \$this->link; ?>\" class=\"linkbar-link more\">
\t\t\t<i class=\"fa fa-share\"></i>
\t\t</a>
\t\t<a href=\"<?php echo \$this->singleSRC; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" data-lightbox=\"portfolio_<?php echo implode('_', \$arrFilterClasses) ?>\" class=\"linkbar-link zoom\">
\t\t\t<i class=\"fa fa-search\"></i>
\t\t</a>
\t\t<div class=\"info\">
\t\t\t<div class=\"title h5\"><?php echo \$this->newsHeadline; ?></div>
\t\t\t<div class=\"subline\"><?php echo \$this->subHeadline; ?></div>
\t\t</div>
\t</div>
\t<figure class=\"image_container\">
\t\t<div class=\"image_container_img\">
\t\t\t<a href=\"<?php echo \$this->href ? \$this->href : \$this->link; ?>\"<?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>>
\t\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t</a>
\t\t</div>
\t</figure>
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
        return "@pct_theme_templates/news/news_portfoliolist_v8.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/portfolio/news_portfoliolist_v8.css|static';

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
?>

<div class=\"item block <?php echo \$this->class; ?> port_overlay <?php echo implode(' ', \$arrFilterClasses) ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<div class=\"content\">
\t\t<a href=\"<?php echo \$this->href ? \$this->href : \$this->link; ?>\" class=\"linkbar-link more\">
\t\t\t<i class=\"fa fa-share\"></i>
\t\t</a>
\t\t<a href=\"<?php echo \$this->singleSRC; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" data-lightbox=\"portfolio_<?php echo implode('_', \$arrFilterClasses) ?>\" class=\"linkbar-link zoom\">
\t\t\t<i class=\"fa fa-search\"></i>
\t\t</a>
\t\t<div class=\"info\">
\t\t\t<div class=\"title h5\"><?php echo \$this->newsHeadline; ?></div>
\t\t\t<div class=\"subline\"><?php echo \$this->subHeadline; ?></div>
\t\t</div>
\t</div>
\t<figure class=\"image_container\">
\t\t<div class=\"image_container_img\">
\t\t\t<a href=\"<?php echo \$this->href ? \$this->href : \$this->link; ?>\"<?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>>
\t\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t</a>
\t\t</div>
\t</figure>
</div>", "@pct_theme_templates/news/news_portfoliolist_v8.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_portfoliolist_v8.html5");
    }
}
