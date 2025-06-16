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

/* @pct_theme_templates/elements/ce_hyperlink_iframe_lightbox.html5 */
class __TwigTemplate_05ceb469c703e05cf3e9e9130cbf08a9 extends Template
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

<?php 
\$attribute = \\str_replace('data-lightbox=','data-lightbox-iframe=', \$this->attribute);
?>
  <?php if (\$this->useImage): ?>
    <figure class=\"image_container\">

      <?= \$this->embed_pre ?>
      <a id=\"ce_hyperlinkt_lightbox_<?= \$this->id; ?>\" href=\"<?= \$this->href ?>\"<?php if (\$this->linkTitle): ?> title=\"<?= \$this->linkTitle ?>\"<?php endif; ?> class=\"hyperlink_img\"<?= \$attribute ?><?= \$this->target ?>><?php \$this->insert('picture_default', \$this->picture); ?></a>
      <?= \$this->embed_post ?>

      <?php if (\$this->caption): ?>
        <figcaption class=\"caption\"><?= \$this->caption ?></figcaption>
      <?php endif; ?>

    </figure>
  <?php else: ?>
    <?= \$this->embed_pre ?>
    <a href=\"<?= \$this->href ?>\" class=\"hyperlink_txt\" title=\"<?= \$this->linkTitle ?>\"<?= \$attribute ?><?= \$this->target ?>><?= \$this->link ?></a>
    <?= \$this->embed_post ?>
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
        return "@pct_theme_templates/elements/ce_hyperlink_iframe_lightbox.html5";
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
        return new Source("", "@pct_theme_templates/elements/ce_hyperlink_iframe_lightbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/elements/ce_hyperlink_iframe_lightbox.html5");
    }
}
