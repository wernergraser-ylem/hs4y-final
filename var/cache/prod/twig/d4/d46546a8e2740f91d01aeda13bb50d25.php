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

/* @pct_theme_templates/news/news_portfolioteaser_oner.html5 */
class __TwigTemplate_a1aa4cc1ae4026175b8c9e6d9a31d633 extends Template
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
<div class=\"item swiper-slide portfoliolist_onepage block <?php echo \$this->class; ?> port_overlay filter_<?= \\Contao\\StringUtil::standardize(\$this->subHeadline); ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<a href=\"<?php echo \$this->href ? \$this->href : \$this->link; ?>\" data-lightbox=\"portfolio_<?= \$this->pid; ?>\" data-cbox-width=\"80%\" data-cbox-height=\"100%\" class=\"more\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>>
\t<figure class=\"image_container\">
\t\t<div class=\"image_container_img\"><?php \$this->insert('picture_default', \$this->picture); ?></div>
\t\t<div class=\"content\">
\t\t\t<div class=\"info\">
\t\t\t\t<div class=\"title h5\"><?php echo \$this->newsHeadline; ?></div>
\t\t\t\t<div class=\"subline\"><?php echo \$this->subHeadline; ?></div>
\t\t\t</div>
\t\t</div>
\t</figure>
\t</a>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/news/news_portfolioteaser_oner.html5";
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
        return new Source("", "@pct_theme_templates/news/news_portfolioteaser_oner.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_portfolioteaser_oner.html5");
    }
}
