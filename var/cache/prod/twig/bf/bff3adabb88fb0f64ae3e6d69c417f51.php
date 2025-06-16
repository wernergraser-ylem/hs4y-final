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

/* @pct_customelements_plugin_customcatalog/mod_customcatalog.html5 */
class __TwigTemplate_b7d938aba74f2abd13dbabe7ef57a2ff extends Template
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
        yield "
<div class=\"<?= \$this->class; ?> block\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?>>
<?php if (\$this->headline): ?>
<<?= \$this->hl; ?>><?= \$this->headline; ?></<?= \$this->hl; ?>>
<?php endif; ?>

<?= \$this->CustomCatalog->render(); ?>

<?php if (\$this->allowComments): ?>
<div class=\"ce_comments block\">
  <<?= \$this->hlc; ?>><?= \$this->addComment; ?></<?= \$this->hlc; ?>>
  <?= implode('', \$this->comments); ?>
  <?= \$this->commentsPagination; ?>
  <?php include \$this->getTemplate('mod_comment_form', 'html5'); ?>
</div>
<?php endif; ?>

<?php if(\$this->pagination):?>
<?= \$this->pagination; ?>
<?php endif; ?>

<?php if(\$this->back): ?>
<!-- indexer::stop -->
<p class=\"back\"><a href=\"<?= \$this->referer; ?>\" title=\"<?= \$this->back; ?>\"><?= \$this->back; ?></a></p>
<!-- indexer::continue -->
<?php endif; ?>

</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/mod_customcatalog.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/mod_customcatalog.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/mod_customcatalog.html5");
    }
}
