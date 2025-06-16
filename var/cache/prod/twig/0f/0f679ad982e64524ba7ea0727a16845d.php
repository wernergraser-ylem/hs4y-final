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

/* @pct_customelements_plugin_customcatalog/backend/be_page_api_export_summary.html5 */
class __TwigTemplate_1a27a514d8ffcd918df7444fcb97f6e0 extends Template
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
        yield "<?php
/**
 * CustomCatalog API Standard: \"Summary\" page backend template
 */

use PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Controller;

?>

<?php 
\$objLang = (object)\$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api'];
?>

<?php if(count(\$this->data) > 0): ?>

<div id=\"tl_rebuild_index\">\t
\t
\t<?php if(isset(\$this->file)) :?>
\t<p><?php echo sprintf(\$objLang->file_created, \$this->file->__get('name'), str_replace(Controller::rootDir(),'',\$this->file->__get('dirname') )); ?></p>
\t<?php endif; ?>
\t
\t<?php if(\$this->report): ?>
\t<p><?php echo \$this->report; ?></p>
\t<?php else: ?>
\t<p><?php echo \$objLang->no_summary; ?></p>
\t<?php endif; ?>
\t
\t<?php if(\$this->hasDownload): ?>
\t<a href=\"<?php echo \$this->file->path; ?>\" class=\"tl_submit download\">Download</a>
\t<?php endif; ?>
\t
\t
</div>

<?php else: ?>

<div id=\"tl_rebuild_index\">
<p class=\"tl_error\">No export data found</p>
</div>

<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/backend/be_page_api_export_summary.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/backend/be_page_api_export_summary.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/backend/be_page_api_export_summary.html5");
    }
}
