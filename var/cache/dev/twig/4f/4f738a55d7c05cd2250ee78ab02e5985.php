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

/* @pct_privacy_manager/elements/ce_hyperlink_optout.html5 */
class __TwigTemplate_6f94d657479de9f2f9940bff6804702a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_privacy_manager/elements/ce_hyperlink_optout.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_privacy_manager/elements/ce_hyperlink_optout.html5"));

        // line 1
        yield "<?php \$this->extend('block_searchable'); ?>

<?php \$this->block('content'); ?>

  <?php if (\$this->useImage): ?>
    <figure class=\"image_container\">

      <?= \$this->embed_pre ?>
      <a href=\"<?= \$this->href ?>\"<?php if (\$this->linkTitle): ?> title=\"<?= \$this->linkTitle ?>\"<?php endif; ?> class=\"hyperlink_img privacy_optout_link\"<?= \$this->attribute ?><?= \$this->target ?>><?php \$this->insert('picture_default', \$this->picture); ?></a>
      <?= \$this->embed_post ?>

      <?php if (\$this->caption): ?>
        <figcaption class=\"caption\"><?= \$this->caption ?></figcaption>
      <?php endif; ?>

    </figure>
  <?php else: ?>
    <?= \$this->embed_pre ?>
    <a href=\"<?= \$this->href ?>\" class=\"hyperlink_txt privacy_optout_link\" title=\"<?= \$this->linkTitle ?>\"<?= \$this->attribute ?><?= \$this->target ?>><?= \$this->link ?></a>
    <?= \$this->embed_post ?>
  <?php endif; ?>

<script>
// Opt-out listener
jQuery(document).ready(function()
{
\tjQuery('.privacy_optout_link').click(function()
\t{
    PrivacyManager.optout('<?= \$this->href ?>');
\t});
});
</script>

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
        return "@pct_privacy_manager/elements/ce_hyperlink_optout.html5";
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
        return new Source("<?php \$this->extend('block_searchable'); ?>

<?php \$this->block('content'); ?>

  <?php if (\$this->useImage): ?>
    <figure class=\"image_container\">

      <?= \$this->embed_pre ?>
      <a href=\"<?= \$this->href ?>\"<?php if (\$this->linkTitle): ?> title=\"<?= \$this->linkTitle ?>\"<?php endif; ?> class=\"hyperlink_img privacy_optout_link\"<?= \$this->attribute ?><?= \$this->target ?>><?php \$this->insert('picture_default', \$this->picture); ?></a>
      <?= \$this->embed_post ?>

      <?php if (\$this->caption): ?>
        <figcaption class=\"caption\"><?= \$this->caption ?></figcaption>
      <?php endif; ?>

    </figure>
  <?php else: ?>
    <?= \$this->embed_pre ?>
    <a href=\"<?= \$this->href ?>\" class=\"hyperlink_txt privacy_optout_link\" title=\"<?= \$this->linkTitle ?>\"<?= \$this->attribute ?><?= \$this->target ?>><?= \$this->link ?></a>
    <?= \$this->embed_post ?>
  <?php endif; ?>

<script>
// Opt-out listener
jQuery(document).ready(function()
{
\tjQuery('.privacy_optout_link').click(function()
\t{
    PrivacyManager.optout('<?= \$this->href ?>');
\t});
});
</script>

<?php \$this->endblock(); ?>
", "@pct_privacy_manager/elements/ce_hyperlink_optout.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_privacy_manager/templates/elements/ce_hyperlink_optout.html5");
    }
}
