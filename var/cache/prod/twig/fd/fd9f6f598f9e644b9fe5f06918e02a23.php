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

/* @pct_theme_templates/news/news_newslist_v4.html5 */
class __TwigTemplate_5dd273e56e4dd43304641b3a8ea5fabb extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newslist-v4.css|static';
\$hasText = \$this->hasText;
\$teaserMaxLength = 180;
\$teaser = \\Contao\\StringUtil::substrHtml(\$this->teaser,\$teaserMaxLength);
if( strlen(\$teaser) != strlen(\$this->teaser) )
{
\t\$teaser = rtrim(\$teaser,'</p>').' ...</p>';
}
?>

<div class=\"newslist-v4 block autogrid one_third item <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<div class=\"newslist-v4-inside\">
\t\t<div class=\"image_container<?php echo \$this->floatClass; ?>\"<?php if (\$this->margin || \$this->float): ?> style=\"<?php echo trim(\$this->margin . \$this->float); ?>\"<?php endif; ?>>
\t\t\t<?php if (\$hasText): ?><a href=\"<?php echo \$this->link; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>><?php endif; ?>
\t\t\t\t<?php if (\$this->picture): ?><?php \$this->insert('picture_default', \$this->picture); ?><?php endif; ?>
\t\t\t\t<span class=\"news-overlay\"><i class=\"fa fa-plus\"></i></span>
\t\t\t<?php if (\$hasText): ?></a><?php endif; ?>
\t\t\t<?php if (\$this->date): ?>
\t\t\t<div class=\"date bg-accent\" itemprop=\"datePublished\">
\t\t\t\t<span class=\"day\"><?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?></span>
\t\t\t\t<span class=\"month\"><?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?></span>
\t\t\t\t<span class=\"year\"><?= \\Contao\\Date::parse(\"Y\", \$this->timestamp);?></span>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t</div>
\t
\t\t<div class=\"content\">\t\t
\t\t\t<div class=\"h6\"><?php echo \$hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t\t\t<div class=\"teaser\" itemprop=\"description\"><?= \$teaser; ?></div>
\t\t\t<div class=\"info-v3\"><?php if (\$this->date): ?><div class=\"date-v3\" itemprop=\"datePublished\"><?php echo \$this->date; ?></div><?php endif; ?><?php if (\$this->author): ?><div class=\"author-v3\"><?php echo \$this->author; ?></div><?php endif; ?><?php if (\$this->commentCount): ?><div class=\"comments-v3\"><?php echo \$this->commentCount; ?></div><?php endif; ?></div>
\t\t\t<?php if (\$hasText): ?>
\t\t\t\t<p class=\"link\"><?php echo \$this->more; ?></p>
\t\t\t<?php endif; ?>
\t\t\t<div class=\"info\">
\t\t\t\t<?php if (\$this->author): ?>
\t\t\t\t<span class=\"author\"><?php echo \$this->author; ?></span>
\t\t\t\t<?php endif; ?>
\t\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t\t<span class=\"comments\"><?php echo \$this->numberOfComments; ?></span>
\t\t\t\t<?php endif; ?>
\t\t\t</div>\t
\t\t</div>
\t</div>
</div>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/news/news_newslist_v4.html5";
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
        return new Source("", "@pct_theme_templates/news/news_newslist_v4.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newslist_v4.html5");
    }
}
