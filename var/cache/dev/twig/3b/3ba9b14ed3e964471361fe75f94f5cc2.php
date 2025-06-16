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

/* @pct_theme_settings/page/mod_pageimage.html5 */
class __TwigTemplate_cda5851a01a09a041a8ef5d62e683d76 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/page/mod_pageimage.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/page/mod_pageimage.html5"));

        // line 1
        yield "<?php
// add media queries to page
if(\$this->hasMediaQueries)
{
    \$GLOBALS['TL_HEAD'][] = '<style>'.\$this->mediaqueries.'</style>';
}
?>
<?php \$this->extend('block_unsearchable'); ?>
<?php \$this->block('content'); ?>
<div class=\"inside<?php if(\$this->Page->style_css): ?> <?= \$this->Page->style_css; ?><?php endif; ?><?php if(\$this->Page->height_css): ?> <?= \$this->Page->height_css; ?><?php endif; ?><?php if(\$this->Page->color_css): ?> <?= \$this->Page->color_css; ?><?php endif; ?><?php if(\$this->bgposition): ?> <?= \$this->bgposition; ?><?php endif; ?><?php if(\$this->Page->bgcolor_css): ?> <?= \$this->Page->bgcolor_css; ?><?php endif; ?>\"<?php if(isset(\$this->image)): ?> style=\"background-image: url('<?= \$this->image['src']; ?>')\"<?php endif; ?>>
  <div class=\"container\">
    <div class=\"content\">
      <?php if(\$this->Page->imgHeadline): ?><div class=\"headline\"><?= \$this->Page->imgHeadline; ?></div><?php endif; ?>
      <?php if(\$this->Page->imgSubheadline): ?><div class=\"subheadline\"><?= \$this->Page->imgSubheadline; ?></div><?php endif; ?>
    </div>
  </div>
</div>
<?php \$this->endblock(); ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_settings/page/mod_pageimage.html5";
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
// add media queries to page
if(\$this->hasMediaQueries)
{
    \$GLOBALS['TL_HEAD'][] = '<style>'.\$this->mediaqueries.'</style>';
}
?>
<?php \$this->extend('block_unsearchable'); ?>
<?php \$this->block('content'); ?>
<div class=\"inside<?php if(\$this->Page->style_css): ?> <?= \$this->Page->style_css; ?><?php endif; ?><?php if(\$this->Page->height_css): ?> <?= \$this->Page->height_css; ?><?php endif; ?><?php if(\$this->Page->color_css): ?> <?= \$this->Page->color_css; ?><?php endif; ?><?php if(\$this->bgposition): ?> <?= \$this->bgposition; ?><?php endif; ?><?php if(\$this->Page->bgcolor_css): ?> <?= \$this->Page->bgcolor_css; ?><?php endif; ?>\"<?php if(isset(\$this->image)): ?> style=\"background-image: url('<?= \$this->image['src']; ?>')\"<?php endif; ?>>
  <div class=\"container\">
    <div class=\"content\">
      <?php if(\$this->Page->imgHeadline): ?><div class=\"headline\"><?= \$this->Page->imgHeadline; ?></div><?php endif; ?>
      <?php if(\$this->Page->imgSubheadline): ?><div class=\"subheadline\"><?= \$this->Page->imgSubheadline; ?></div><?php endif; ?>
    </div>
  </div>
</div>
<?php \$this->endblock(); ?>", "@pct_theme_settings/page/mod_pageimage.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/page/mod_pageimage.html5");
    }
}
