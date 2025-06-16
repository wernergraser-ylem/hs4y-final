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

/* @pct_theme_templates/modules/mod_customcatalog_megamenu.html5 */
class __TwigTemplate_6e61384a58fc33553ee688c5e067df88 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_customcatalog_megamenu.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_customcatalog_megamenu.html5"));

        // line 1
        yield "
<div class=\"mod_customcatalog_megamenu cc_booklibrary block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_customcatalog_megamenu.html5";
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
        return new Source("
<div class=\"mod_customcatalog_megamenu cc_booklibrary block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
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

</div>", "@pct_theme_templates/modules/mod_customcatalog_megamenu.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_customcatalog_megamenu.html5");
    }
}
