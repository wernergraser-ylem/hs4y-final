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

/* @pct_theme_templates/news/news_portfoliolist.html5 */
class __TwigTemplate_aaa1535f8f7b8e60d2cf31bf6e46d390 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/portfolio/news_portfoliolist.css|static';

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

<div class=\"item block <?php echo \$this->class; ?> port_overlay <?php echo implode(' ', \$arrFilterClasses) ?><?php if (!\$this->hasText): ?> no_more_link<?php endif; ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<figure class=\"image_container\">
\t\t<?php if (\$hasText): ?><a href=\"<?php echo \$this->href ? \$this->href : \$this->link; ?>\"<?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\"<?php endif; ?>><?php endif; ?>
\t\t\t<div class=\"image_container_inside\">
\t\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t\t<div class=\"overflow-layer\"></div>
\t\t\t</div>
\t\t\t<div class=\"info\">
\t\t\t\t<div class=\"title h5\"><?php echo \$this->newsHeadline; ?></div>
\t\t\t\t<?php if(\$this->subHeadline): ?><div class=\"subline\"><?php echo \$this->subHeadline; ?></div><?php endif; ?>
\t\t\t</div>
\t\t<?php if (\$hasText): ?></a><?php endif; ?>
\t\t<?php if (\$hasText): ?>
\t\t<div class=\"linkbar\">
\t\t\t<a href=\"<?php echo \$this->singleSRC; ?>\" data-lightbox=\"portfolio_<?php echo implode('_', \$arrFilterClasses) ?>\" class=\"zoom\">
\t\t\t\t<i class=\"fa fa-search\"></i>
\t\t\t</a>
\t\t\t<a href=\"<?php echo \$this->href ? \$this->href : \$this->link; ?>\" class=\"more\">
\t\t\t\t<i class=\"fa fa-share\"></i>
\t\t\t</a>
\t\t</div>
\t\t<?php endif; ?>
\t</figure>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/news/news_portfoliolist.html5";
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
        return new Source("", "@pct_theme_templates/news/news_portfoliolist.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_portfoliolist.html5");
    }
}
