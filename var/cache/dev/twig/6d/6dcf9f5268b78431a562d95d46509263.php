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

/* @pct_theme_settings/portfolio/portfolio_latest.html5 */
class __TwigTemplate_28499418388105c9d07ed6909289d616 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/portfolio/portfolio_latest.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/portfolio/portfolio_latest.html5"));

        // line 1
        yield "<?php // handle multiple filter values
\$arrFilterClasses = array();
if(\$this->addFilter)
{
\tforeach(\\deserialize(\$this->filters) as \$v)
\t{
\t\t\$arrFilterClasses[] = 'filter_'.standardize(\$v);
\t}
}
?>

<div class=\"item block <?= \$this->class; ?> <?= implode(' ', \$arrFilterClasses) ?>\" itemscope itemtype=\"http://schema.org/Article\">
<?php if (\$this->hasMetaFields): ?>
    <p class=\"info\"><time datetime=\"<?= \$this->datetime ?>\"><?= \$this->date ?></time> <?= \$this->author ?> <?= \$this->commentCount ?></p>
  <?php endif; ?>

  <?php if (\$this->addImage): ?>
    <figure class=\"image_container<?= \$this->floatClass ?>\"<?php if (\$this->margin): ?> style=\"<?= \$this->margin ?>\"<?php endif; ?>>

      <?php if (\$this->href): ?>
        <a href=\"<?= \$this->href ?>\"<?= \$this->attributes ?> title=\"<?= \$this->alt ?>\">
      <?php endif; ?>

      <?php \$this->insert('picture_default', \$this->picture); ?>

      <?php if (\$this->href): ?>
        </a>
      <?php endif; ?>

      <?php if (\$this->caption): ?>
        <figcaption class=\"caption\"><?= \$this->caption ?></figcaption>
      <?php endif; ?>

    </figure>
  <?php endif; ?>

  <h2><?= \$this->linkHeadline ?></h2>

  <div class=\"teaser\">
    <?= \$this->teaser ?>
  </div>

  <?php if (\$this->hasText || \$this->hasTeaser): ?>
    <p class=\"more\"><?= \$this->more ?></p>
  <?php endif; ?>
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
        return "@pct_theme_settings/portfolio/portfolio_latest.html5";
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
        return new Source("<?php // handle multiple filter values
\$arrFilterClasses = array();
if(\$this->addFilter)
{
\tforeach(\\deserialize(\$this->filters) as \$v)
\t{
\t\t\$arrFilterClasses[] = 'filter_'.standardize(\$v);
\t}
}
?>

<div class=\"item block <?= \$this->class; ?> <?= implode(' ', \$arrFilterClasses) ?>\" itemscope itemtype=\"http://schema.org/Article\">
<?php if (\$this->hasMetaFields): ?>
    <p class=\"info\"><time datetime=\"<?= \$this->datetime ?>\"><?= \$this->date ?></time> <?= \$this->author ?> <?= \$this->commentCount ?></p>
  <?php endif; ?>

  <?php if (\$this->addImage): ?>
    <figure class=\"image_container<?= \$this->floatClass ?>\"<?php if (\$this->margin): ?> style=\"<?= \$this->margin ?>\"<?php endif; ?>>

      <?php if (\$this->href): ?>
        <a href=\"<?= \$this->href ?>\"<?= \$this->attributes ?> title=\"<?= \$this->alt ?>\">
      <?php endif; ?>

      <?php \$this->insert('picture_default', \$this->picture); ?>

      <?php if (\$this->href): ?>
        </a>
      <?php endif; ?>

      <?php if (\$this->caption): ?>
        <figcaption class=\"caption\"><?= \$this->caption ?></figcaption>
      <?php endif; ?>

    </figure>
  <?php endif; ?>

  <h2><?= \$this->linkHeadline ?></h2>

  <div class=\"teaser\">
    <?= \$this->teaser ?>
  </div>

  <?php if (\$this->hasText || \$this->hasTeaser): ?>
    <p class=\"more\"><?= \$this->more ?></p>
  <?php endif; ?>
</div>", "@pct_theme_settings/portfolio/portfolio_latest.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/portfolio/portfolio_latest.html5");
    }
}
