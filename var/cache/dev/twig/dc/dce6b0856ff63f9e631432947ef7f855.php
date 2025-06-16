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

/* @pct_theme_templates/news/news_newsteaser_v5.html5 */
class __TwigTemplate_5bf7c83fd651e1029b4525549647a3b2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_newsteaser_v5.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/news/news_newsteaser_v5.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsteaser_v5.css|static';
\$hasText = \$this->hasText;
?>

<div class=\"newsteaser_v5 autogrid one_third no_gutter block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">\t
\t<?php if (\$hasText): ?><a href=\"<?php echo \$this->link; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>><?php endif; ?>
\t<div class=\"newsteaser_v5_inside\">
\t\t<div class=\"date\" itemprop=\"description\">
\t\t\t<?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?> <?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?> <?= \\Contao\\Date::parse(\"Y\", \$this->timestamp);?>
\t\t</div>
\t\t<div class=\"h6\"><?php echo \$this->newsHeadline; ?></div>
\t\t<div class=\"info\">
\t\t\t<?php if (\$this->author): ?>
\t\t\t<span class=\"author\"><?php echo \$this->author; ?></span>
\t\t\t<?php endif; ?>
\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t<span class=\"comments\"><?php echo \$this->commentCount; ?></span>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<i class=\"fa fa-align-left\"></i>
\t</div>
\t<?php if (\$hasText): ?></a><?php endif; ?>
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
        return "@pct_theme_templates/news/news_newsteaser_v5.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsteaser_v5.css|static';
\$hasText = \$this->hasText;
?>

<div class=\"newsteaser_v5 autogrid one_third no_gutter block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">\t
\t<?php if (\$hasText): ?><a href=\"<?php echo \$this->link; ?>\" <?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" <?php if(\$this->target && \$this->url): ?>target=\"_blank\" <?php endif; ?>><?php endif; ?>
\t<div class=\"newsteaser_v5_inside\">
\t\t<div class=\"date\" itemprop=\"description\">
\t\t\t<?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?> <?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?> <?= \\Contao\\Date::parse(\"Y\", \$this->timestamp);?>
\t\t</div>
\t\t<div class=\"h6\"><?php echo \$this->newsHeadline; ?></div>
\t\t<div class=\"info\">
\t\t\t<?php if (\$this->author): ?>
\t\t\t<span class=\"author\"><?php echo \$this->author; ?></span>
\t\t\t<?php endif; ?>
\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t<span class=\"comments\"><?php echo \$this->commentCount; ?></span>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<i class=\"fa fa-align-left\"></i>
\t</div>
\t<?php if (\$hasText): ?></a><?php endif; ?>
</div>", "@pct_theme_templates/news/news_newsteaser_v5.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newsteaser_v5.html5");
    }
}
