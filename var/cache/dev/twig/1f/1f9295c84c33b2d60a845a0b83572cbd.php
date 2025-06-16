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

/* @pct_theme_templates/event/mod_eventreader.html5 */
class __TwigTemplate_6069379d7a8a88e9f74bbb5a44f198c9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/event/mod_eventreader.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/event/mod_eventreader.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/events/mod_eventreader.css|static';
?>
<?php \$this->extend('block_searchable'); ?>

<?php \$this->block('content'); ?>

  <?= \$this->event ?>

  <?php if (\$this->referer): ?>
    <!-- indexer::stop -->
    <p class=\"back\"><a href=\"<?= \$this->referer ?>\" title=\"<?= \$this->back ?>\"><?= \$this->back ?></a></p>
    <!-- indexer::continue -->
  <?php endif; ?>

  <?php if (\$this->allowComments): ?>
    <div class=\"ce_comments block\">
      <<?= \$this->hlc ?>><?= \$this->hlcText ?></<?= \$this->hlc ?>>
      <?= implode('', \$this->comments) ?>
      <?= \$this->pagination ?>
      <<?= \$this->hlc ?>><?= \$this->addComment ?></<?= \$this->hlc ?>>
      <?php \$this->insert('mod_comment_form', \$this->arrData); ?>
    </div>
  <?php endif; ?>

<?php \$this->endblock(); ?>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/event/mod_eventreader.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/events/mod_eventreader.css|static';
?>
<?php \$this->extend('block_searchable'); ?>

<?php \$this->block('content'); ?>

  <?= \$this->event ?>

  <?php if (\$this->referer): ?>
    <!-- indexer::stop -->
    <p class=\"back\"><a href=\"<?= \$this->referer ?>\" title=\"<?= \$this->back ?>\"><?= \$this->back ?></a></p>
    <!-- indexer::continue -->
  <?php endif; ?>

  <?php if (\$this->allowComments): ?>
    <div class=\"ce_comments block\">
      <<?= \$this->hlc ?>><?= \$this->hlcText ?></<?= \$this->hlc ?>>
      <?= implode('', \$this->comments) ?>
      <?= \$this->pagination ?>
      <<?= \$this->hlc ?>><?= \$this->addComment ?></<?= \$this->hlc ?>>
      <?php \$this->insert('mod_comment_form', \$this->arrData); ?>
    </div>
  <?php endif; ?>

<?php \$this->endblock(); ?>
", "@pct_theme_templates/event/mod_eventreader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/event/mod_eventreader.html5");
    }
}
