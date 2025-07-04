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

/* @pct_theme_templates/news/news_newslist.html5 */
class __TwigTemplate_6983f47d497f6963b078e99728d34925 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_newslist.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_newslist.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newslist.css|static';
\$hasText = \$this->hasText;
?>

<div class=\"newslist block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<?php if (\$this->addImage): ?>
\t\t<div class=\"image_container<?php echo \$this->floatClass; ?>\"<?php if (\$this->margin || \$this->float): ?> style=\"<?php echo trim(\$this->margin . \$this->float); ?>\"<?php endif; ?>>
\t\t\t<?php if (\$this->href): ?>
\t\t\t<a href=\"<?php echo \$this->link; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>>
\t\t\t<?php endif; ?>
\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t<?php if (\$this->href): ?>
\t\t\t</a>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t<div class=\"news-content\">
\t\t<div class=\"news-content-inside\">
\t\t\t<div class=\"h2\"><?php echo \$hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t\t\t
\t\t\t<?php if (\$this->date): ?>
\t\t\t<span class=\"news-date\" itemprop=\"datePublished\"><?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?>. <?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?>, <?= \\Contao\\Date::parse(\"Y\", \$this->timestamp);?></span>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if (\$this->author): ?>
\t\t\t<span class=\"author\"><?php echo \$this->author; ?></span>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t<span class=\"comments\"><?php echo \$this->numberOfComments; ?></span>
\t\t\t<?php endif; ?>
\t\t
\t\t\t<div class=\"teaser\" itemprop=\"description\"><?php echo \$this->teaser; ?></div>
\t\t\t
\t\t\t<?php if (\$hasText): ?>
\t\t\t<p class=\"link\"><?php echo \$this->more; ?></p>
\t\t\t<?php endif; ?>

\t\t</div>
\t</div>
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
        return "@pct_theme_templates/news/news_newslist.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newslist.css|static';
\$hasText = \$this->hasText;
?>

<div class=\"newslist block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">
\t<?php if (\$this->addImage): ?>
\t\t<div class=\"image_container<?php echo \$this->floatClass; ?>\"<?php if (\$this->margin || \$this->float): ?> style=\"<?php echo trim(\$this->margin . \$this->float); ?>\"<?php endif; ?>>
\t\t\t<?php if (\$this->href): ?>
\t\t\t<a href=\"<?php echo \$this->link; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>>
\t\t\t<?php endif; ?>
\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t<?php if (\$this->href): ?>
\t\t\t</a>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t<div class=\"news-content\">
\t\t<div class=\"news-content-inside\">
\t\t\t<div class=\"h2\"><?php echo \$hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t\t\t
\t\t\t<?php if (\$this->date): ?>
\t\t\t<span class=\"news-date\" itemprop=\"datePublished\"><?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?>. <?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?>, <?= \\Contao\\Date::parse(\"Y\", \$this->timestamp);?></span>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if (\$this->author): ?>
\t\t\t<span class=\"author\"><?php echo \$this->author; ?></span>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t<span class=\"comments\"><?php echo \$this->numberOfComments; ?></span>
\t\t\t<?php endif; ?>
\t\t
\t\t\t<div class=\"teaser\" itemprop=\"description\"><?php echo \$this->teaser; ?></div>
\t\t\t
\t\t\t<?php if (\$hasText): ?>
\t\t\t<p class=\"link\"><?php echo \$this->more; ?></p>
\t\t\t<?php endif; ?>

\t\t</div>
\t</div>
</div>", "@pct_theme_templates/news/news_newslist.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newslist.html5");
    }
}
