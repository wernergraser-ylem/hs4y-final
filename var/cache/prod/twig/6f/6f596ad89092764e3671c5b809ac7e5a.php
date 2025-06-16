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

/* @pct_theme_templates/news/news_newsteaser_v6.html5 */
class __TwigTemplate_f1309836d0fb8eccaa608df3338cb5d9 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsteaser_v6.css|static';
\$hasText = \$this->hasText;
?>
<div class=\"item test swiper-slide block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<div class=\"item-inside fullscreen-helper\" style=\"background-image: url(<?php echo \$this->src; ?>)\">
\t\t<div class=\"content\">
\t\t\t<div class=\"title h1\"><?php echo \$hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t\t\t<div class=\"subline color-accent\"><?php echo \$this->subHeadline; ?></div>
\t\t\t<div class=\"teaser\" itemprop=\"description\"><?php echo \$this->teaser; ?></div>
\t\t</div>
\t\t<div class=\"info\">
\t\t\t<?php if (\$this->author): ?><div class=\"author\"><?php echo \$this->author; ?></div><?php endif; ?>
\t\t\t<?php if (\$this->date): ?><time datetime=\"<?php echo \$this->datetime; ?>\" itemprop=\"datePublished\"><?php echo \$this->date; ?></time><?php endif; ?>
\t\t\t<?php if (\$this->commentCount): ?><div class=\"comments\"><?php echo \$this->commentCount; ?></div><?php endif; ?>
\t\t</div>
\t</div>\t
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/news/news_newsteaser_v6.html5";
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
        return new Source("", "@pct_theme_templates/news/news_newsteaser_v6.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newsteaser_v6.html5");
    }
}
