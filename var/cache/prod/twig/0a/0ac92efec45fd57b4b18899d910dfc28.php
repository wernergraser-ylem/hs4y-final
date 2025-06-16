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

/* @pct_theme_templates/elements/ce_image_no_responsive.html5 */
class __TwigTemplate_c44f3191be02f573a5f2e9e3a065f794 extends Template
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

  <figure class=\"image_container no-responsive\"<?php if (\$this->margin): ?> style=\"<?= \$this->margin ?>\"<?php endif; ?> itemscope itemtype=\"http://schema.org/ImageObject\">

    <?php if (\$this->href): ?>
      <a href=\"<?= \$this->href ?>\"<?php if (\$this->linkTitle): ?> title=\"<?= \$this->linkTitle ?>\"<?php endif; ?><?= \$this->attributes ?> itemprop=\"contentUrl\">
    <?php endif; ?>

    <?php \$this->insert('picture_default', \$this->picture); ?>

    <?php if (\$this->href): ?>
      </a>
    <?php endif; ?>

    <?php if (\$this->caption): ?>
      <figcaption class=\"caption\" itemprop=\"caption\"><?= \$this->caption ?></figcaption>
    <?php endif; ?>

  </figure>

<?php \$this->endblock(); ?>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/elements/ce_image_no_responsive.html5";
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
        return new Source("", "@pct_theme_templates/elements/ce_image_no_responsive.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/elements/ce_image_no_responsive.html5");
    }
}
