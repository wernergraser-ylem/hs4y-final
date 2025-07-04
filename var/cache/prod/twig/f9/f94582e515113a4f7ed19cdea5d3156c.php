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

/* @pct_theme_settings/backend/be_page_contentelementset_export.html5 */
class __TwigTemplate_6a60a10ab242cfa3ebb38086c4638cfb extends Template
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
<?php 
\$rootDir = \\Contao\\System::getContainer()->getParameter('kernel.project_dir');
\$strToken = \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
?>
<div id=\"page_contentelementsets\" class=\"contao-ht35\">
\t<!-- category select -->
\t<form action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"contentelementset_export\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t
\t<div id=\"tl_buttons\"><?= \$this->back ?></div>
\t
\t<?php if(\$this->messages) :?>
\t<?= \$this->messages; ?>
\t<?php else: ?>
\t\t
\t<div class=\"tl_formbody\">
\t<div class=\"tl_panel categories\">
\t\t<h2 class=\"sub_headline\"><?php echo \$this->headline; ?></h2>
\t
\t\t<!-- ingredients -->
\t\t<div class=\"tl_box\">
\t\t\t<strong><?= \$this->headline_elements; ?></strong> <?= implode(', ', \$this->elements); ?>
\t\t</div>
\t\t
\t\t<?php if(\$this->file && file_exists(\$rootDir.'/'.\$this->file->path)): ?>
\t\t<div class=\"tl_box\">
\t\t\t<strong>Download:</strong> <a href=\"<?= \$this->file->path; ?>\" download><?= \$this->file->name; ?></a>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"tl_box\">\t\t
\t\t\t<h2>Export:</h2>
\t\t\t<div class=\"float_box\"><?= \$this->nameInput; ?></div>
\t\t\t<div class=\"float_box\"><?= \$this->categorySelect; ?></div>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t\t
\t\t<input type=\"submit\" class=\"tl_submit\" name=\"run_contentelementset_export\" value=\"<?= \$this->submitLabel; ?>\">
\t\t
\t</div>
\t</div>
\t
\t<?php endif; ?>

</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_settings/backend/be_page_contentelementset_export.html5";
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
        return new Source("", "@pct_theme_settings/backend/be_page_contentelementset_export.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/backend/be_page_contentelementset_export.html5");
    }
}
