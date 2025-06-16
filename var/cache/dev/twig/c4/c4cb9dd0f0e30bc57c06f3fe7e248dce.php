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

/* @pct_theme_templates/news/news_newsteaser_v8.html5 */
class __TwigTemplate_c45e1810f382e73fcdcfe725fed2d85b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_newsteaser_v8.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_newsteaser_v8.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsteaser_v8.css|static';
\$hasText = \$this->hasText;
?>

<div class=\"newsteaser_v8 block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">\t
\t
\t<div class=\"newsteaser_v8_content\">
\t\t<div class=\"h6\"><?php echo \$hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t\t
\t\t<div class=\"item-info\">
\t\t\t<?php if (\$this->date): ?>
\t\t\t\t<span class=\"date\" itemprop=\"datePublished\"><?= \\Contao\\Date::parse(\"d. M, Y\", \$this->timestamp);?></span>
\t\t\t<?php endif; ?>\t
\t\t\t
\t\t\t<?php if (\$this->author): ?>
\t\t\t\t<span class=\"author font_serif_2\"><?php echo \$this->author; ?></span>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t\t<span class=\"comments\"><?php echo \$this->commentCount; ?></span>
\t\t\t<?php endif; ?>
\t\t</div>
\t</div>
\t
\t<div class=\"item-overlay\">
\t\t<div class=\"item-overlay-inside\">
\t\t\t<?php if (\$this->addImage): ?>
\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<div class=\"item-overlay-right\">
\t\t\t\t<?php if (\$this->hasTeaser): ?>
\t\t\t\t<div class=\"item-teaser\" itemprop=\"description\">
\t\t\t\t\t<?php echo \\Contao\\StringUtil::substrHtml(\$this->teaser, 100) ?>
\t\t\t\t</div>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php if (\$hasText): ?>
\t\t\t\t\t<div class=\"item-link color-accent\"><?php echo \$this->more ?></div>
\t\t\t\t<?php endif; ?>
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t
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
        return "@pct_theme_templates/news/news_newsteaser_v8.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsteaser_v8.css|static';
\$hasText = \$this->hasText;
?>

<div class=\"newsteaser_v8 block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">\t
\t
\t<div class=\"newsteaser_v8_content\">
\t\t<div class=\"h6\"><?php echo \$hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t\t
\t\t<div class=\"item-info\">
\t\t\t<?php if (\$this->date): ?>
\t\t\t\t<span class=\"date\" itemprop=\"datePublished\"><?= \\Contao\\Date::parse(\"d. M, Y\", \$this->timestamp);?></span>
\t\t\t<?php endif; ?>\t
\t\t\t
\t\t\t<?php if (\$this->author): ?>
\t\t\t\t<span class=\"author font_serif_2\"><?php echo \$this->author; ?></span>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t\t<span class=\"comments\"><?php echo \$this->commentCount; ?></span>
\t\t\t<?php endif; ?>
\t\t</div>
\t</div>
\t
\t<div class=\"item-overlay\">
\t\t<div class=\"item-overlay-inside\">
\t\t\t<?php if (\$this->addImage): ?>
\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<div class=\"item-overlay-right\">
\t\t\t\t<?php if (\$this->hasTeaser): ?>
\t\t\t\t<div class=\"item-teaser\" itemprop=\"description\">
\t\t\t\t\t<?php echo \\Contao\\StringUtil::substrHtml(\$this->teaser, 100) ?>
\t\t\t\t</div>
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\t<?php if (\$hasText): ?>
\t\t\t\t\t<div class=\"item-link color-accent\"><?php echo \$this->more ?></div>
\t\t\t\t<?php endif; ?>
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t
</div>", "@pct_theme_templates/news/news_newsteaser_v8.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newsteaser_v8.html5");
    }
}
