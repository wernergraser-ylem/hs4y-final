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

/* @pct_theme_templates/news/news_newsteaser_oner.html5 */
class __TwigTemplate_e17164ae1cbdca7ba4b9be40045db3a9 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsteaser_v4.css|static';
\$hasText = \$this->hasText;
?>

<div class=\"newsteaser-v4 autogrid one_third block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<div class=\"newsteaser-v4-inside\">
\t\t
\t\t<?php if (\$this->addImage): ?>
\t\t<div class=\"image_container<?php echo \$this->floatClass; ?>\"<?php if (\$this->margin || \$this->float): ?> style=\"<?php echo trim(\$this->margin . \$this->float); ?>\"<?php endif; ?>>
\t\t\t<?php if (\$hasText): ?><a href=\"<?php echo \$this->href ? \$this->href : \$this->link; ?>\" data-lightbox=\"newsreader\" data-cbox-width=\"80%\" data-cbox-height=\"100%\"><?php endif; ?>
\t\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t\t<span class=\"news-overlay\"><i class=\"fa fa-plus\"></i></span>
\t\t\t<?php if (\$hasText): ?></a><?php endif; ?>\t\t
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"content\">
\t\t\t <?php if (\$this->hasSubHeadline): ?><div class=\"subheadline\"><?php echo \$this->subHeadline; ?></div><?php endif; ?>
\t\t\t<div class=\"h6\"><?php if (\$hasText): ?><a href=\"<?php echo \$this->href ? \$this->href : \$this->link; ?>\" data-lightbox=\"news-reader\"><?php endif; ?>
\t\t\t<?php echo \$this->headline; ?>
\t\t\t<?php if (\$hasText): ?></a><?php endif; ?>
\t\t\t</div>
\t\t\t<div class=\"teaser\" itemprop=\"description\"><?php echo \$this->teaser; ?></div>
\t\t\t<?php \$this->block('info'); ?>
\t\t\t<div class=\"info\">
\t\t\t\t <?php if (\$this->author): ?><div class=\"author\"><?php echo \$this->author; ?></div><?php endif; ?>
\t\t\t\t <?php if (\$this->date): ?><time datetime=\"<?php echo \$this->datetime; ?>\" itemprop=\"datePublished\"><?php echo \$this->date; ?></time><?php endif; ?>
\t\t\t\t <?php if (\$this->commentCount): ?><div class=\"comments\"><?php echo \$this->commentCount; ?></div><?php endif; ?>
\t\t\t</div>
\t\t\t<?php \$this->endblock(); ?>
\t\t</div>
\t\t
\t</div>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/news/news_newsteaser_oner.html5";
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
        return new Source("", "@pct_theme_templates/news/news_newsteaser_oner.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newsteaser_oner.html5");
    }
}
