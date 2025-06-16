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

/* @pct_theme_templates/elements/ce_download_small.html5 */
class __TwigTemplate_d479f7f10de91775c142f15eb4cdb98b extends Template
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
        yield "<?php \$this->block('content'); ?>
<?php if (\$this->headline): ?><<?php echo \$this->hl; ?>><?php echo \$this->headline; ?></<?php echo \$this->hl; ?>><?php endif; ?>
<div class=\"ce_download_small block <?php echo \$this->class; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_download_small_inside\">
\t  <?php if ( isset(\$this->previews) && \$this->previews): ?>
\t    <?php foreach (\$this->previews as \$preview): ?>
\t      <?php \$this->insert('image', \$preview->getLegacyTemplateData()) ?>
\t    <?php endforeach ?>
\t  <?php endif ?>
\t<a href=\"<?= \$this->href ?>\" title=\"<?= \$this->title ?>\"><?= \$this->link ?><span class=\"size\">(<?= \$this->filesize ?>)</span></a>
\t</div>
</div>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/elements/ce_download_small.html5";
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
        return new Source("", "@pct_theme_templates/elements/ce_download_small.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/elements/ce_download_small.html5");
    }
}
