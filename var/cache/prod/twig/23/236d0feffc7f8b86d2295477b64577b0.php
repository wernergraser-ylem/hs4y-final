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

/* @pct_theme_settings/portfolio/mod_portfolioreader.html5 */
class __TwigTemplate_59f71311087f03a2c6ac63e586e5dfe5 extends Template
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
        yield "<?php \$this->extend('block_searchable'); ?>

<?php \$this->block('content'); ?>

  <?= \$this->articles ?>

  <!-- indexer::stop -->
  <p class=\"back\"><a href=\"<?= \$this->referer ?>\" title=\"<?= \$this->back ?>\"><?= \$this->back ?></a></p>
  <!-- indexer::continue -->

  <?php if (\$this->allowComments): ?>
    <div class=\"ce_comments block\">
      <<?= \$this->hlc ?>><?= \$this->addComment ?></<?= \$this->hlc ?>>
      <?= implode('', \$this->comments) ?>
      <?= \$this->pagination ?>
      <?php include \$this->getTemplate('mod_comment_form', 'html5'); ?>
    </div>
  <?php endif; ?>

<?php \$this->endblock(); ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_settings/portfolio/mod_portfolioreader.html5";
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
        return new Source("", "@pct_theme_settings/portfolio/mod_portfolioreader.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/portfolio/mod_portfolioreader.html5");
    }
}
