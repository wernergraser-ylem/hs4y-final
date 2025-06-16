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

/* @pct_theme_templates/modules/mod_breadcrumb.html5 */
class __TwigTemplate_d482f71e8d2d4da276ed3bfb84b60823 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_breadcrumb.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_breadcrumb.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/modules/mod_breadcrumb.css|static';
?>
<?php \$this->extend('block_unsearchable'); ?>
<?php \$this->block('content'); ?>
<?php global \$objPage; ?>
<div class=\"mod_breadcrumb_inside\">
<div class=\"pagetitle\"><?= \$objPage->pageTitle ?: \$objPage->title; ?></div>
  <ul itemprop=\"breadcrumb\" itemscope itemtype=\"http://schema.org/BreadcrumbList\">
    <?php foreach (\$this->items as \$position => \$item): ?>
      <?php
\t  // append page css classes
\t  \$item['class'] = \$item['class'] ?? '';
\t  \t  
\t  if( isset(\$item['data']['cssClass']) && !empty(\$item['data']['cssClass']) )
\t  {
\t\t  \$item['class'] .= ' '.\$item['data']['cssClass'];
\t  }
\t  ?>
      <?php if (\$item['isActive']): ?>
        <li class=\"active<?php if (\$item['class']): ?> <?= \$item['class'] ?><?php endif; ?> last\"><?= \$item['link'] ?></li>
      <?php else: ?>
        <li<?php if (\$item['class']): ?> class=\"<?= \$item['class'] ?>\"<?php endif; ?> itemscope itemtype=\"http://schema.org/ListItem\" itemprop=\"itemListElement\"><a href=\"<?= \$item['href'] ?: './' ?>\" title=\"<?= \$item['title'] ?>\" itemprop=\"item\"><span itemprop=\"name\"><?= \$item['link'] ?></span></a><meta itemprop=\"position\" content=\"<?= \$position + 1 ?>\"></li>
      <?php endif; ?>
      <?php endforeach; ?>
  </ul>
</div>
<?php \$this->endblock(); ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_breadcrumb.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/modules/mod_breadcrumb.css|static';
?>
<?php \$this->extend('block_unsearchable'); ?>
<?php \$this->block('content'); ?>
<?php global \$objPage; ?>
<div class=\"mod_breadcrumb_inside\">
<div class=\"pagetitle\"><?= \$objPage->pageTitle ?: \$objPage->title; ?></div>
  <ul itemprop=\"breadcrumb\" itemscope itemtype=\"http://schema.org/BreadcrumbList\">
    <?php foreach (\$this->items as \$position => \$item): ?>
      <?php
\t  // append page css classes
\t  \$item['class'] = \$item['class'] ?? '';
\t  \t  
\t  if( isset(\$item['data']['cssClass']) && !empty(\$item['data']['cssClass']) )
\t  {
\t\t  \$item['class'] .= ' '.\$item['data']['cssClass'];
\t  }
\t  ?>
      <?php if (\$item['isActive']): ?>
        <li class=\"active<?php if (\$item['class']): ?> <?= \$item['class'] ?><?php endif; ?> last\"><?= \$item['link'] ?></li>
      <?php else: ?>
        <li<?php if (\$item['class']): ?> class=\"<?= \$item['class'] ?>\"<?php endif; ?> itemscope itemtype=\"http://schema.org/ListItem\" itemprop=\"itemListElement\"><a href=\"<?= \$item['href'] ?: './' ?>\" title=\"<?= \$item['title'] ?>\" itemprop=\"item\"><span itemprop=\"name\"><?= \$item['link'] ?></span></a><meta itemprop=\"position\" content=\"<?= \$position + 1 ?>\"></li>
      <?php endif; ?>
      <?php endforeach; ?>
  </ul>
</div>
<?php \$this->endblock(); ?>", "@pct_theme_templates/modules/mod_breadcrumb.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_breadcrumb.html5");
    }
}
