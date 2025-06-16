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
class __TwigTemplate_b622ae80b3a8bc442439ddbc03ca8a73 extends Template
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_theme_templates/event/mod_eventreader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/event/mod_eventreader.html5");
    }
}
