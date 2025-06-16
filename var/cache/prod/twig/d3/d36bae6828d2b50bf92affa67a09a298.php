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

/* @pct_theme_templates/news/news_newsteaser_v7.html5 */
class __TwigTemplate_64ccec71aa4fa19ff6f31101d5a9af19 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsteaser_v7.css|static';
\$hasText = \$this->hasText;
?>

<div class=\"newsteaser_v7 autogrid one_third block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<div class=\"item-inside\">
\t<?php if (\$hasText): ?><a href=\"<?php echo \$this->link; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>><?php endif; ?>
\t
\t<div class=\"image_container\">
\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t<?php if (\$this->hasTeaser): ?>
\t\t<div class=\"item-overlay\">
\t\t\t<div class=\"item-overlay-inside\" itemprop=\"description\">
\t\t\t\t<?php echo \$this->teaser; ?>
\t\t\t</div>
\t\t</div>
\t\t<?php endif; ?>
\t</div>
\t
\t<div class=\"title h5\"><?php echo \$this->newsHeadline; ?></div>

\t<?php if (\$this->date): ?>
\t<div class=\"date\" itemprop=\"datePublished\">
\t\t<span class=\"day\"><?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?></span>
\t\t<span class=\"month\"><?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?></span>
\t\t<span class=\"year\"><?= \\Contao\\Date::parse(\"Y\", \$this->timestamp);?></span>
\t</div>
\t<?php endif; ?>
\t
\t<?php if (\$hasText): ?></a><?php endif; ?>
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
        return "@pct_theme_templates/news/news_newsteaser_v7.html5";
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
        return new Source("", "@pct_theme_templates/news/news_newsteaser_v7.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newsteaser_v7.html5");
    }
}
