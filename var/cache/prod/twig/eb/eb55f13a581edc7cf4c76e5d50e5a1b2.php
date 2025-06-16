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

/* @pct_customelements_plugin_customcatalog/backend/be_page_api.html5 */
class __TwigTemplate_600fcf785552ddc08bb36ade187d5e40 extends Template
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
\$objLang = (object)\$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api'];
?>


<?php 
/**
 * Page has errors
 */ 
if(\$this->error) : ?>

<div id=\"page_api\" class=\"tl_listing_container\">
\t<div id=\"tl_buttons\">
\t<?= \$this->back; ?>
\t</div>
\t
\t<h2 class=\"headline sub_headline\"><?= \$this->headline; ?></h2>
\t
\t<div id=\"tl_rebuild_index\">\t
\t<div class=\"tl_error\"><?php echo \$this->error; ?></div>
\t</div>
</div>
\t
<?php return; endif; ?>

<div id=\"page_api\" class=\"tl_listing_container\">
\t<div id=\"tl_buttons\">
\t<?= \$this->back; ?>
\t</div>

\t<h2 class=\"headline sub_headline\"><?= \$this->headline; ?></h2>

<?php
/**
 * Pre-run waiting page
 */
if(\\Contao\\Input::get('key') == 'ready'): ?>

<div id=\"tl_rebuild_index\">\t
\t<p class=\"info\"><?php echo sprintf(\$objLang->ready_info,\$this->objApi->id,\$this->countJobs); ?></p>
\t
\t<?php if(\$this->backup): ?>
\t<div>
\t<strong><?php echo \$objLang->headline_backup; ?></strong>
\t<p class=\"tl_green\"><?php echo sprintf(\$objLang->backupCreated,\$this->table,\$this->backup); ?></p>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(\$this->purgeTable): ?>
\t<div>
\t<strong><?php echo \$objLang->headline_purgeTable; ?></strong>
\t<p class=\"tl_green\"><?php echo sprintf(\$objLang->purgedTable,\$this->table); ?></p>
\t</div>
\t<?php endif; ?>
\t
\t<?php if(!\$this->backup && !\$this->purgeTable): ?>
\t<p class=\"tl_green\"><?php echo \$objLang->readyToRock; ?></p>
\t<?php endif; ?>
\t
</div>


<form action=\"<?php echo \$this->action; ?>\" method=\"get\">
\t<input type=\"hidden\" name=\"do\" value=\"<?php echo \\Contao\\Input::get('do'); ?>\">
\t<input type=\"hidden\" name=\"table\" value=\"<?php echo \\Contao\\Input::get('table'); ?>\">
\t<input type=\"hidden\" name=\"id\" value=\"<?php echo \\Contao\\Input::get('id'); ?>\">
\t<input type=\"hidden\" name=\"rt\" value=\"<?php echo \\Contao\\Input::get('rt'); ?>\">
\t<input type=\"hidden\" name=\"key\" value=\"run\">

\t<div class=\"tl_formbody_submit\">
\t\t<div class=\"tl_submit_container\">
\t\t\t<input type=\"submit\" class=\"tl_submit\" value=\"<?php echo \$this->runLabel; ?>\">
\t\t</div>
\t</div>
</form>

<?php 
/**
 * Run or summary
 */\t
elseif( in_array(\\Contao\\Input::get('key'), array('summary','run')) ): ?>

<?php if(strlen(\$this->main) > 0): ?>
<?php echo \$this->main; ?>
<?php endif; ?>

<?php else: ?>

<?php \$this->redirect(\$this->getReferer()); ?>

<?php endif; ?>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/backend/be_page_api.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/backend/be_page_api.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/backend/be_page_api.html5");
    }
}
