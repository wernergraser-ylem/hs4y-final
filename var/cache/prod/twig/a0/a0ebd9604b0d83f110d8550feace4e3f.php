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

/* @pct_customelements_plugin_customcatalog/backend/be_page_db_update.html5 */
class __TwigTemplate_e62a26b2b5b9b0672309ef09d35a49ec extends Template
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
\$objLang = (object)\$GLOBALS['TL_LANG']['tl_pct_customcatalog']['be_page_db_update'];

if(\$this->status)
{
\t\$objLang->headline = \$objLang->{'headline_'.strtolower(\$this->status)};
\t\$objLang->info = \$objLang->{'info_'.strtolower(\$this->status)};
}

\$strToken = \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
?>

<div id=\"page_db_update\" class=\"<?= 'status_'.strtolower(\$this->status); ?>\">
\t<div id=\"tl_buttons\">
\t<a href=\"<?= \\Contao\\Controller::getReferer(); ?>\" class=\"tl_button reset header_back\" title=\"<?= \$GLOBALS['TL_LANG']['MSC']['goBack']; ?>\"><?= \$GLOBALS['TL_LANG']['MSC']['goBack']; ?></a>
\t</div>
\t
\t<h2 class=\"headline sub_headline\"><?= \$objLang->headline; ?></h2>

<!-- ! ERROR -->
<?php if(\$this->status == 'DONE'): ?>
\t<div class=\"tl_message body tl_info\"><?= sprintf(\$objLang->info, implode(', ',\$this->tables)); ?></div>
\t
\t<?php if(!empty(\$this->statements)) :?>
\t<div class=\"tl_message statements\">
\t\t<div class=\"accordion_container\">
\t\t\t<div class=\"toggler tl_headline\"><?= \$objLang->subheadline_statements; ?></div>
\t\t\t<ul class=\"list_container accordion\">
\t\t\t<?php foreach(\$this->statements as \$statement): ?>
\t\t\t\t<li><?= \$statement; ?></li>
\t\t\t<?php endforeach; ?>
\t\t\t</ul>
\t\t</div>
\t</div>
\t
\t<script>
\twindow.addEvent('domready', function() 
\t{
\t\t\$\$('#page_db_update .accordion_container .toggler').addEvent('click',function(e)
\t\t{
\t\t\tthis.getParent('.accordion_container').toggleClass('open');
\t\t});
\t});
\t</script>
\t
\t<?php endif; ?>
\t

\t
<!-- ! CLEAR_CACHE -->\t\t
<?php elseif(\$this->status == 'CLEAR_CACHE'): ?>
\t<div class=\"tl_message body tl_info\"><?= \$objLang->info; ?></div>

<!-- ! DB_UPDATE -->
<?php elseif(\$this->status == 'DB_UPDATE'): ?>
\t<div class=\"tl_message body tl_info\"><?= sprintf(\$objLang->info, implode(', ',\$this->tables)); ?></div>
\t
<!-- ! ERROR -->
<?php elseif(\$this->status == 'ERROR'): ?>
\t<div class=\"tl_message body tl_info\"><?= \$objLang->info; ?></div>

\t<div class=\"tl_message tl_error\"><?= sprintf(\$objLang->errors, implode(', ',\$this->errors)); ?></div>

<!-- ! WELCOME -->

<?php elseif(empty(\$this->status) || \$this->status == 'WELCOME'): ?>
\t
\t<?php if(empty(\$this->tables)): ?>
\t<div class=\"tl_message body tl_info\"><?= \$objLang->info_empty; ?></div>
\t<?php else: ?>
\t
\t<div class=\"tl_message body tl_info\"><?= sprintf(\$objLang->info, implode(', ',\$this->tables) ); ?></div>
\t
\t<form action=\"<?= \\Contao\\Environment::get('request'); ?>\" method=\"post\">
\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formID; ?>\">
\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t
\t\t<fieldset class=\"tables\">
\t\t\t<span class=\"legend\"><?= \$objLang->legend_tables; ?></span>
\t\t\t<ul class=\"checkbox_container tables\">
\t\t\t<?php foreach(\$this->tables as \$table): ?>
\t\t\t\t<li><input type=\"checkbox\" name=\"tables[]\" value=\"<?= \$table; ?>\" id=\"input_<?= \$table; ?>\"><label for=\"input_<?= \$table; ?>\"><?= \$table; ?></label></li>\t\t
\t\t\t<?php endforeach; ?>
\t\t\t</ul>
\t\t</fieldset>
\t\t
\t\t<div class=\"tl_formbody_submit\">
\t\t\t<div class=\"tl_submit_container\">
\t\t\t\t<input type=\"submit\" name=\"run\" class=\"tl_submit\" value=\"<?= \$objLang->submit; ?>\">
\t\t\t</div>
\t\t</div>
\t</form>
\t<?php endif; ?>
\t
<?php endif; ?>
\t
\t
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/backend/be_page_db_update.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/backend/be_page_db_update.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/backend/be_page_db_update.html5");
    }
}
