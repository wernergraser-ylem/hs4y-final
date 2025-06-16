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

/* @pct_theme_templates/modules/mod_customcatalog_list_sidebar.html5 */
class __TwigTemplate_c61785ac88021aa918978e9c9d07e40a extends Template
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
<div class=\"mod_customcatalog_list_sidebar block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
<?php if (\$this->headline): ?>
<<?php echo \$this->hl; ?>><?php echo \$this->headline; ?></<?php echo \$this->hl; ?>>
<?php endif; ?>

<?= \$this->CustomCatalog->render(); ?>

<?php if (\$this->allowComments): ?>
<div class=\"ce_comments block\">
  <<?php echo \$this->hlc; ?>><?php echo \$this->addComment; ?></<?php echo \$this->hlc; ?>>
  <?php echo implode('', \$this->comments); ?>
  <?php echo \$this->commentsPagination; ?>
  <?php include \$this->getTemplate('mod_comment_form', 'html5'); ?>
</div>
<?php endif; ?>

<?php if(\$this->pagination):?>
<?php echo \$this->pagination; ?>
<?php endif; ?>

<?php if(\$this->back): ?>
<!-- indexer::stop -->
<p class=\"back\"><a href=\"<?php echo \$this->referer; ?>\" title=\"<?php echo \$this->back; ?>\"><?php echo \$this->back; ?></a></p>
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
        return "@pct_theme_templates/modules/mod_customcatalog_list_sidebar.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_customcatalog_list_sidebar.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_customcatalog_list_sidebar.html5");
    }
}
