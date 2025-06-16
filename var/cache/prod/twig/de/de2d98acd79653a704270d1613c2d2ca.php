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

/* @pct_theme_templates/news/news_newslist_timeline.html5 */
class __TwigTemplate_a333baab0b7a4148bdc1fcf875f147de extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newslist_timeline.css|static';
?>
<div class=\"newslist-timeline block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t
\t<?php if (\$this->date): ?>
\t\t<div class=\"newslist-timeline-date\"><?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?>. <?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?> <?= \\Contao\\Date::parse(\"Y\", \$this->timestamp);?></div>
\t<?php endif; ?>
\t
\t<div class=\"newslist-timeline-contentwrapper\">
\t\t<div class=\"image_container<?php echo \$this->floatClass; ?>\"<?php if (\$this->margin || \$this->float): ?> style=\"<?php echo trim(\$this->margin . \$this->float); ?>\"<?php endif; ?>>
\t\t\t<?php if (\$this->hasText): ?><a href=\"<?php echo \$this->link; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target): ?>target=\"_blank\" <?php endif; ?>><?php endif; ?>
\t\t\t<?php if (\$this->picture): ?><?php \$this->insert('picture_default', \$this->picture); ?><?php endif; ?>
\t\t\t<?php if (\$this->hasText): ?></a><?php endif; ?>
\t\t</div>
\t\t
\t\t<div class=\"newslist-timeline-content\">
\t\t\t\t\t
\t\t\t<?php if (\$this->hasSubHeadline): ?>
\t\t\t<div class=\"subheadline-v2\"><?php echo \$this->subHeadline; ?></div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<div class=\"h4\"><?php echo \$this->hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t
\t\t\t<div class=\"info\">
\t\t\t\t
\t\t\t\t<?php if (\$this->author): ?>
\t\t\t\t<div class=\"author\"><i class=\"fa fa-user\"></i><?php echo \$this->author; ?></div>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t\t<div class=\"comments\"><i class=\"fa fa-comment\"></i><?php echo \$this->numberOfComments; ?></div>
\t\t\t\t<?php endif; ?>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"teaser-v2\" itemprop=\"description\"><?php echo \$this->teaser; ?></div>
\t\t
\t\t</div>
\t\t
\t</div>
\t
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/news/news_newslist_timeline.html5";
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
        return new Source("", "@pct_theme_templates/news/news_newslist_timeline.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newslist_timeline.html5");
    }
}
