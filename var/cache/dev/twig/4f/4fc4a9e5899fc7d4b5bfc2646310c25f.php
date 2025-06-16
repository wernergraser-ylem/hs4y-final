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

/* @pct_theme_templates/elements/ce_download.html5 */
class __TwigTemplate_66d8d10d025973a57a6fb6b6b8847284 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/elements/ce_download.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/elements/ce_download.html5"));

        // line 1
        yield "<?php \$this->block('content'); ?>
<?php if (\$this->headline): ?><<?php echo \$this->hl; ?>><?php echo \$this->headline; ?></<?php echo \$this->hl; ?>><?php endif; ?>
<div class=\"ce_download_default <?php echo \$this->class; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_download_inside\">
\t  <?php if ( isset(\$this->previews) && \$this->previews): ?>
\t    <?php foreach (\$this->previews as \$preview): ?>
\t      <?php \$this->insert('image', \$preview->getLegacyTemplateData()) ?>
\t    <?php endforeach ?>
\t  <?php endif ?>
\t<a href=\"<?= \$this->href ?>\" title=\"<?= \$this->title ?>\"><?= \$this->link ?><span class=\"size\">(<?= \$this->filesize ?>)</span></a>
\t</div>
</div>

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
        return "@pct_theme_templates/elements/ce_download.html5";
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
        return new Source("<?php \$this->block('content'); ?>
<?php if (\$this->headline): ?><<?php echo \$this->hl; ?>><?php echo \$this->headline; ?></<?php echo \$this->hl; ?>><?php endif; ?>
<div class=\"ce_download_default <?php echo \$this->class; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_download_inside\">
\t  <?php if ( isset(\$this->previews) && \$this->previews): ?>
\t    <?php foreach (\$this->previews as \$preview): ?>
\t      <?php \$this->insert('image', \$preview->getLegacyTemplateData()) ?>
\t    <?php endforeach ?>
\t  <?php endif ?>
\t<a href=\"<?= \$this->href ?>\" title=\"<?= \$this->title ?>\"><?= \$this->link ?><span class=\"size\">(<?= \$this->filesize ?>)</span></a>
\t</div>
</div>

", "@pct_theme_templates/elements/ce_download.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/elements/ce_download.html5");
    }
}
