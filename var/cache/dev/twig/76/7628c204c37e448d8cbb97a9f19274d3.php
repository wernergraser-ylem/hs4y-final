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

/* @pct_theme_updater/be_pct_theme_updater.html5 */
class __TwigTemplate_7d01f91a2998ec44bce38a938884eab4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_updater/be_pct_theme_updater.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_updater/be_pct_theme_updater.html5"));

        // line 1
        yield "<?php
namespace Contao;

\$strToken = \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
\$this->l_status = strtolower(\$this->status);
\$this->l_step = strtolower(\$this->step);
\$this->l_status_step = strtolower(\$this->status).(\$this->step ? '.'.strtolower(\$this->step) : '');
\$arrLang = \$GLOBALS['TL_LANG']['PCT_THEME_UPDATER'];
\$arrLangTpl = \$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['TEMPLATE'];

\$strStatus = \$arrLang['STATUS'][\$this->l_status] ?? '';
\$strStep = \$arrLang['STATUS'][\$this->l_status_step] ?? '';
\$strTheme = \$GLOBALS['PCT_THEME_UPDATER']['THEMES'][\$this->theme]['label'] ?? '';
if(strlen(\$strStatus) < 1 && strlen(\$strStep) > 0)
{
\t\$strStatus = \$strStep;
}
if(isset(\$this->license->registration->domains) && !is_array(\$this->license->registration->domains))
{
\t\$this->license->registration->domains = (array)\$this->license->registration->domains;
}
if( !isset(\$arrLang['BACKEND_DESCRIPTION'][\$this->l_status_step]) )
{
\t\$arrLang['BACKEND_DESCRIPTION'][\$this->l_status_step] = '';
}


?>

<div id=\"pct_theme_updater\" class=\"<?= \\strtolower(\$this->status); ?>\">
\t<div class=\"tl_formbody\">
\t\t<div id=\"tl_buttons\">
\t\t\t<span class=\"version\">Version: <?= \\PCT_THEME_UPDATER; ?></span>
\t\t\t<!-- <a class=\"shop_link\" href=\"https://www.premium-contao-themes.com/contao-installer.html\" target=\"_blank\"><?= \$arrLangTpl['button_installer_buy']; ?></a>-->
\t\t\t<a class=\"shop_link\" href=\"https://www.premium-contao-themes.com\" target=\"_blank\"><?= \$arrLangTpl['button_license_buy']; ?></a>
\t\t\t<?php if(\$strStatus): ?>
\t\t\t<span class=\"status hidden\"><?= sprintf(\$arrLangTpl['label_status'],\$strStatus); ?></span>
\t\t\t<?php endif; ?>
\t\t\t<a href=\"<?= \$this->resetUrl; ?>\" class=\"tl_button reset header_back\" title=\"<?= \$arrLangTpl['button_reset'][1]; ?>\"><?= \$arrLangTpl['button_reset'][0]; ?></a>
\t\t</div>
\t\t
\t\t<div class=\"backend_explanation\"><?= sprintf(\$arrLang['BACKEND_DESCRIPTION'][\$this->l_status_step],\$strTheme); ?></div>

<!-- ! UPDATER_LICENSE, WELCOME screen -->
<?php if(\$this->status == 'ENTER_UPDATER_LICENSE' || \$this->status == 'WELCOME'): ?>
\t\t
\t\t<?php if(\$this->errors): ?>
\t\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t\t<?php endif; ?>
\t
\t\t<div class=\"backend_explanation_additional\">
\t\t\t<?= \$arrLangTpl['enter_updater_license_info']; ?>
\t\t</div>
\t\t
\t\t<form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken ; ?>\">
\t\t\t
\t\t\t<div class=\"tl_formbody_top\">
\t\t\t\t<div class=\"input_wrapper licence_check\">
\t\t\t\t\t<div class=\"widget field w50 license\">
\t\t\t\t\t\t<h3><?= \$arrLangTpl['input_license'][0]; ?></h3>
\t\t\t\t\t\t<input type=\"text\" name=\"license\" value=\"\" class=\"tl_text\" <?php if(\$this->strLicense): ?>value=\"<?= \$this->strLicense; ?>\"<?php endif; ?> placeholder=\"<?= \$this->strLicense; ?>\">
\t\t\t\t\t\t<p class=\"tl_help tl_tip\"><?= \$arrLangTpl['input_license'][1]; ?></p>
\t\t\t\t\t</div>
\t\t\t\t\t<?php if(!\$this->themeLicenseFileExists): ?>
\t\t\t\t\t<div class=\"widget field w50 license\">
\t\t\t\t\t\t<h3><?= \$arrLangTpl['input_license_theme'][0]; ?></h3>
\t\t\t\t\t\t<input type=\"text\" name=\"license_theme\" value=\"\" class=\"tl_text\" <?php if(\$this->strThemeLicense): ?>value=\"<?= \$this->strThemeLicense; ?>\"<?php endif; ?> placeholder=\"<?= \$this->strThemeLicense; ?>\">
\t\t\t\t\t\t<p class=\"tl_help tl_tip\"><?= \$arrLangTpl['input_license_theme'][1]; ?></p>
\t\t\t\t\t</div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"tl_formbody_middle\">
\t\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t\t<?php endif; ?>
\t\t\t</div>

\t\t\t<div class=\"tl_formbody_bottom tl_formbody_submit\">
\t\t\t\t<div class=\"tl_submit_container\">
\t\t\t\t\t<input type=\"submit\" name=\"validate_updater_license\" class=\"tl_submit\" value=\"<?= \$arrLangTpl['submit_license']; ?>\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>

<!-- ! WELCOME, ENTER THEME LICENSE screen -->
<?php elseif(\$this->status == 'ENTER_THEME_LICENSE'): ?>
\t\t<div class=\"backend_explanation_additional\">
\t\t\t<?= \$arrLangTpl['welcome_info']; ?>
\t\t</div>
\t\t
\t\t<form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t
\t\t\t<div class=\"tl_formbody_top\">
\t\t\t\t<div class=\"input_wrapper licence_check\">
\t\t\t\t\t<div class=\"widget field w50 license\">
\t\t\t\t\t\t<h3><?= \$arrLangTpl['input_license_theme'][0]; ?></h3>
\t\t\t\t\t\t<input type=\"text\" name=\"license\" value=\"\" class=\"tl_text\" placeholder=\"\" required>
\t\t\t\t\t\t<p class=\"tl_help tl_tip\"><?= \$arrLangTpl['input_license_theme'][1]; ?></p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"widget field w50 email\">
\t\t\t\t\t\t<h3><?= \$arrLangTpl['input_email'][0]; ?></h3>
\t\t\t\t\t\t<input type=\"email\" name=\"email\" value=\"\" class=\"tl_text\" placeholder=\"\" required>
\t\t\t\t\t\t<p class=\"tl_help tl_tip\"><?= \$arrLangTpl['input_email'][1]; ?></p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"tl_formbody_middle\">
\t\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t\t<?php endif; ?>
\t\t\t</div>

\t\t\t<div class=\"tl_formbody_bottom tl_formbody_submit\">
\t\t\t\t<div class=\"tl_submit_container\">
\t\t\t\t\t<input type=\"submit\" name=\"validate_license\" class=\"tl_submit\" value=\"<?= \$arrLangTpl['submit_license']; ?>\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>

<?php elseif(\$this->status == 'ERROR'): ?>
<!-- ! ERROR screen -->
\t
\t<div class=\"tl_formbody_middle\">
\t<?php if(\$this->errors): ?>
\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t<?php endif; ?>
\t
\t
\t<p class=\"tl_message\"><a href=\"<?= StringUtil::decodeEntities( Controller::addToUrl('do=log',true,array('step','status')) ); ?>\" title=\"<?= \$arrLangTpl['button_systemlog'][0]; ?>\"><?= \$arrLangTpl['button_systemlog'][0]; ?></a></p>
\t<p class=\"tl_message header_back\"><a class=\"reset\" href=\"<?= StringUtil::decodeEntities( Controller::addToUrl('status=reset',true) ); ?>\" title=\"<?= \$arrLangTpl['button_reset'][1]; ?>\"><?= \$arrLangTpl['button_reset'][0]; ?></a></p>
\t</div>
<?php elseif(\$this->status == 'DONE'): ?>
<!-- ! DONE, COMPLETED screen -->
\t
\t<?php if(\$this->errors): ?>
\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t<?php endif; ?>

\t<?php if(\$this->messages): ?>
\t<div class=\"backend_explanation_additional\"><?= implode(\"\\n\", \$this->messages); ?></div>
\t<?php endif; ?>

\t<?php // up to date
\tif( \$this->up_to_date ): ?>
\t<div class=\"backend_explanation_additional\">
\t<p class=\"checked\"><?= \$arrLangTpl['up_to_date']; ?></p>
\t<table>
\t\t<tr class=\"tl_green\">
\t\t\t<td>Installation ist aktuell. Version: <?= \$this->local_version; ?></td>
\t\t<tr>
\t</table>
\t</div>

\t<?php endif; ?>
\t
\t<script>
\tlocalStorage.removeItem('ThemeUpdater.toggler');
\tlocalStorage.removeItem('ThemeUpdater.checked');
\t</script>
\t
<?php elseif( in_array(\$this->status, array('VERSION_CONFLICT', 'MIN_REQUIREMENT')) ): ?>
<!-- ! VERSION_CONFLICT screen -->
\t
\t<div class=\"tl_formbody_middle\">
\t<?php if(\$this->errors): ?>
\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t<?php endif; ?>
\t
\t</div>
\t\t
<?php elseif(\$this->status == 'SESSION_LOST'): ?>
<!-- ! SESSION LOST -->
\t
\t<p class=\"tl_message header_back\"><a class=\"reset\" href=\"<?= StringUtil::decodeEntities( Backend::addToUrl('status=reset',true) ); ?>\" title=\"<?= \$arrLangTpl['button_reset'][1]; ?>\"><?= \$arrLangTpl['button_reset'][0]; ?></a></p>

<?php elseif(\$this->status == 'READY'): ?>
<!-- ! READY  -->
\t\t<div class=\"theme_updater_desc\"><?= \$arrLang['BACKEND_DESCRIPTION']['theme_updater_desc']; ?></div>
\t\t<div class=\"backend_explanation_additional\">
\t\t<table>
\t\t\t<tr class=\"tl_blue\">
\t\t\t\t<td>Installierte Version:</td>
\t\t\t\t<td><?= \$this->local_version; ?>
\t\t\t\t<?php if( \$this->version_conflict ): ?>
\t\t\t\t<span class=\"error\">(<?= \\sprintf(\$GLOBALS['TL_LANG']['XPT']['pct_theme_updater']['min_theme_version'], \$this->local_version); ?>)</span>
\t\t\t\t<?php endif; ?>
\t\t\t\t</td>
\t\t\t\t
\t\t\t<tr>
\t\t\t<tr class=\"tl_green\">
\t\t\t\t<td>Verfügbare Version:</td>
\t\t\t\t<td><?= \$this->live_version; ?>, Datum der Veröffentlichung: <?= \$this->release_date; ?></td>
\t\t\t<tr>
\t\t\t<tr>
\t\t\t\t<td><a href=\"<?= \$this->changelog_txt; ?>\" title=\"Siehe Changelog.txt\" target=\"_blank\">Siehe Changelog.txt</a></td>
\t\t\t</tr>
\t\t</table>
\t\t
\t\t</div>
\t\t
\t\t<div class=\"license_information tl_formbody_middle\">
\t\t\t<?php if(\$this->errors): ?>
\t\t\t<div class=\"tl_message\">
\t\t\t\t<p class=\"tl_error\"><?= implode(\"\\n\", \$this->errors); ?></p>
\t\t\t</div>
\t\t\t<?php endif; ?>

\t\t\t<!-- wrong domain registration -->
\t\t\t<?php if(\$this->hasRegistrationError): ?>
\t\t\t<div class=\"tl_message\">
\t\t\t\t<p class=\"tl_error\"><?= sprintf(\$arrLangTpl['domainRegistrationError'],Environment::get('host'),\$this->license->key,Environment::get('host')); ?></p>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<!-- file information -->
\t\t\t<div class=\"product file\"><?= \$this->license->file->name; ?></div>\t
\t\t</div>
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<form id=\"form_pct_theme_updater\" action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken ; ?>\">
\t\t\t
\t\t\t<div class=\"tl_formbody_top\">
\t\t\t</div>
\t\t\t\t\t\t
\t\t\t<div class=\"tl_formbody_bottom tl_formbody_submit\">

\t\t\t\t<div class=\"tl_submit_container\">
   \t\t\t\t<div class=\"agreement_container\">
   \t\t\t\t   <input type=\"checkbox\" name=\"agreement\" id=\"agreement\">
                  <label for=\"agreement\"><?= \$arrLang['BACKEND_DESCRIPTION']['agreement']; ?></label>
   \t\t\t\t</div>
\t\t\t\t\t<input type=\"submit\" disabled name=\"install\" class=\"tl_submit\" value=\"<?= \$arrLangTpl['submit_install']; ?>\">
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<script>
\t\t\tjQuery(document).ready(function() 
\t\t\t{
\t\t\t\tjQuery('input[name=\"agreement\"]').change(function()
\t\t\t\t{
\t\t\t\t\tjQuery('input[name=\"install\"]').attr('disabled','disabled');
\t\t\t\t\tif( this.checked )
\t\t\t\t\t{
\t\t\t\t\t\tjQuery('input[name=\"install\"]').removeAttr('disabled');
\t\t\t\t\t}
\t\t\t\t});
\t\t\t});
\t\t\t</script>
\t\t</form>

<?php elseif(\$this->status == 'MANUAL_ADJUSTMENT'): ?>
<!-- ! MANUAL_ADJUSTMENT -->\t\t

\t\t<?php if( !empty(\$this->tasks) ): ?>
\t\t<div class=\"backend_explanation_additional\">
\t\t<?php if(\$this->language == 'de'): ?>
\t\tIn diesem Schritt finden Sie eine Auflistung der manuellen Anpassungen des Themes, die für den Update-Abschluss notwendig sind. Automatisierte Updates sind technisch für diese Anpassungen leider nicht möglich. Die Checklisten dienen der Selbstkontrolle und geben eine Übersicht der bereits abgeschlossenen Aufgaben.
\t\t<?php else: ?>
\t\tIn this step you will find a list of the manual adjustments to the theme that are necessary to complete the update. Unfortunately, automated updates are technically not possible for these adjustments. The checklists are used for self-control and provide an overview of the tasks that have already been completed.
\t\t<?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"backend_explanation_additional\">
\t\t<table>
\t\t\t<tr class=\"tl_green\">
\t\t\t\t<td>Manuelle Update-Schritte für Version:&nbsp;</td>
\t\t\t\t<td><?= \$this->live_version; ?></td>
\t\t\t<tr>
\t\t\t<tr>
\t\t\t\t<td><a href=\"<?= \$this->changelog_txt; ?>\" title=\"Siehe Changelog.txt\" target=\"_blank\">Siehe Changelog.txt</a></td>
\t\t\t</tr>
\t\t</table>
\t\t</div>

\t\t<?php if( empty(\$this->tasks) ): ?>
\t\t<div class=\"content\">
\t\t\t<p class=\"info\"><?= \$arrLangTpl['empty_tasks']; ?></p>
\t\t</div>

\t\t<form id=\"form_pct_theme_updater\" action=\"<?= \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t<div class=\"tl_formbody_submit\">
\t\t\t\t<div class=\"tl_submit_container\">
\t\t\t\t\t<div class=\"checkbox_container\">
\t\t\t\t\t\t<input type=\"checkbox\" name=\"delete_demo_files\" id=\"delete_demo_files\">
\t\t\t\t\t\t<label for=\"agreement\"><?= \$arrLang['BACKEND_DESCRIPTION']['delete_demo_files']; ?></label>
\t\t\t\t\t</div>
\t\t\t\t\t<button type=\"submit\" class=\"tl_submit\" name=\"done\"><?= \$arrLangTpl['submit_done']; ?></button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t\t<?php else: ?>
\t\t<form id=\"form_pct_theme_updater\" action=\"<?= \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t<input type=\"hidden\" name=\"action\" value=\"toggle_tasks\">
\t\t<div class=\"content\">
\t\t<?php foreach(\$this->tasks as \$k => \$category): ?>
\t\t<div id=\"categorory_<?= \$k; ?>\" class=\"category container\">\t
\t\t\t<div class=\"thead row toggler\" data-toggler=\"cat_<?= \$k; ?>\">
\t\t\t\t<p class=\"title\"><?= \$category->title; ?></p>
\t\t\t</div>
\t\t\t<div class=\"tasks_container\">
\t\t\t\t<p class=\"description\"><?= \$category->description; ?></p>
\t\t\t\t<div class=\"task_columns\">
\t\t\t\t\t<div class=\"task\"><?= \$arrLangTpl['manual_table']['head']['task']; ?></div>
\t\t\t\t\t<div class=\"description\"><?= \$arrLangTpl['manual_table']['head']['description']; ?></div>
\t\t\t\t\t<div class=\"status\"><?= \$arrLangTpl['manual_table']['head']['status']; ?></div>
\t\t\t\t</div>
\t\t\t\t<div class=\"task_container\">
\t\t\t\t<?php foreach(\$category->tasks as \$i => \$task): ?>\t
\t\t\t\t<?php 
\t\t\t\t\$arrClass = array('row','row_'.\$i);
\t\t\t\tif( \$task->mandatory ) { \$arrClass[] = 'mandatory'; }
\t\t\t\t(\$i%2 == 0 ? \$arrClass[] = 'even' : \$arrClass[] = 'odd');
\t\t\t\t(\$i == 0 ? \$arrClass[] = 'first' : '');
\t\t\t\t(\$i == count(\$category->tasks) - 1 ? \$arrClass[] = 'last' : '');
\t\t\t\t?>
\t\t\t\t<div class=\"task <?= implode(' ', \$arrClass); ?> container\">
\t\t\t\t\t<div class=\"thead row\">
\t\t\t\t\t\t<div class=\"title toggler\" data-toggler=\"task_<?= \$task->id; ?>\"><?= \$task->title; ?></div>
\t\t\t\t\t\t<div class=\"description\"><?= \$task->description; ?></div>
\t\t\t\t\t\t<div class=\"status\"><input type=\"checkbox\" name=\"tasks[<?= \$task->id; ?>]\" <?php if(\$task->checked): ?>checked<?php endif; ?> class=\"checkbox<?= (\$task->mandatory ? ' mandatory' : ''); ?>\" value=\"<?= \$task->id; ?>\">
\t\t\t\t\t\t<?php if(\$task->checked && \$task->user): ?>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Eingereicht von: <?= UserModel::findByPk(\$task->user)->username; ?></li>
\t\t\t\t\t\t\t<li>Datum: <?= Date::parse('d.m.Y h:i',\$task->tstamp); ?></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tbody row\">
\t\t\t\t\t\t<div class=\"documentation\"><?= \$task->documentation; ?></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<?php endforeach; ?>
\t\t\t\t</div>\t
\t\t\t</div>\t\t\t\t
\t\t</div>
\t\t<?php endforeach; ?>
\t\t\t
\t\t\t<script type=\"text/javascript\">
\t\t\t// -- Checkboxes
\t\t\tvar objParams = {};
\t\t\tjQuery.each(jQuery('form#form_pct_theme_updater').serializeArray(),function(i,v)
\t\t\t{
\t\t\t\tobjParams[v.name] = v.value;
\t\t\t});
\t\t\t
\t\t\tvar numberOfTasks = <?= \$this->numberOfTasks; ?>;
\t\t\tvar checkboxes = [];
\t\t\t// check all checkboxes from localstorage
\t\t\tif( localStorage.getItem('ThemeUpdater.checked') != null )
\t\t\t{
\t\t\t\tcheckboxes = JSON.parse( localStorage.getItem('ThemeUpdater.checked') );
\t\t\t\t
\t\t\t\tjQuery.each(checkboxes,function(i,k)
\t\t\t\t{
\t\t\t\t\tjQuery('form#form_pct_theme_updater input[name=\"'+k+'\"]').prop('checked',true);
\t\t\t\t});
\t\t\t}
\t\t\tjQuery(document).ready(function() 
\t\t\t{\t
\t\t\t\t// reset checkboxes and collect all checked ones
\t\t\t\tcheckboxes = [];
\t\t\t\tjQuery.each(jQuery('form#form_pct_theme_updater input[type=\"checkbox\"]:checked'), function(i,k)
\t\t\t\t{
\t\t\t\t\tcheckboxes.push( jQuery(k).attr('name') );
\t\t\t\t});

\t\t\t\t// set button to disabled or not
\t\t\t\tif( checkboxes.length >= numberOfTasks )
\t\t\t\t{
\t\t\t\t\tjQuery('form#form_pct_theme_updater button[name=\"done\"]').prop('disabled',false);
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t\tjQuery('form#form_pct_theme_updater .task .checkbox').on('change',function(e)
\t\t\t{
\t\t\t\tobjParams.task = this.value
\t\t\t\tobjParams.checked = jQuery(this).prop('checked');
\t\t\t\t
\t\t\t\tvar id = jQuery(this).attr('name');
\t\t\t\tif( jQuery(this).prop('checked') )
\t\t\t\t{
\t\t\t\t\tcheckboxes.push( id )
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\tcheckboxes.splice( checkboxes.indexOf(id), 1 );
\t\t\t\t}
\t\t\t\tlocalStorage.setItem('ThemeUpdater.checked', JSON.stringify(checkboxes));
\t\t\t});
\t\t\t
\t\t\t//-- Togglers
\t\t\tvar togglers = JSON.parse( localStorage.getItem('ThemeUpdater.togglers') );\t\t\t
\t\t\tif( togglers == null )
\t\t\t{
\t\t\t\ttogglers = [];
\t\t\t\t// open first category
\t\t\t\tjQuery('#form_pct_theme_updater .category.container:first-child').addClass('open');
\t\t\t}
\t\t\t
\t\t\t// reopen togglers
\t\t\tjQuery.each(togglers, function(i,k)
\t\t\t{
\t\t\t\tvar toggler = jQuery('[data-toggler=\"'+k+'\"]');
\t\t\t\ttoggler.addClass('open');
\t\t\t\t\t\t
\t\t\t\t// task_
\t\t\t\tif( k.indexOf('task_') == 0 )
\t\t\t\t{
\t\t\t\t\ttoggler.parent().parent('.container').addClass('open');
\t\t\t\t}
\t\t\t\t// cat_
\t\t\t\tif( k.indexOf('cat_') == 0 )
\t\t\t\t{
\t\t\t\t\ttoggler.parent('.container').addClass('open');
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t\t// toggle category palettes
\t\t\tjQuery('#form_pct_theme_updater .category > .toggler').click(function(e)
\t\t\t{
\t\t\t\te.preventDefault();
\t\t\t\tjQuery(this).toggleClass('open');
\t\t\t\tjQuery(this).parent('.container').toggleClass('open');

\t\t\t\tjQuery(document).trigger('ThemeUpdater.onToggler',{'toggler':jQuery(this).attr('data-toggler')});
\t\t\t});

\t\t\t// toggle tasks
\t\t\tjQuery('#form_pct_theme_updater .task .toggler').click(function(e)
\t\t\t{
\t\t\t\te.preventDefault();
\t\t\t\tjQuery(this).toggleClass('open');
\t\t\t\tjQuery(this).parent().parent('.container').toggleClass('open');

\t\t\t\tjQuery(document).trigger('ThemeUpdater.onToggler',{'toggler':jQuery(this).attr('data-toggler')});
\t\t\t});

\t\t\tjQuery(document).on('ThemeUpdater.onToggler',function(e,params) 
\t\t\t{
\t\t\t\tvar id = params.toggler;
\t\t\t\tif( jQuery('[data-toggler=\"'+id+'\"]').hasClass('open') )
\t\t\t\t{
\t\t\t\t\ttogglers.push( id );
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\ttogglers.splice( togglers.indexOf(id), 1 );
\t\t\t\t}
\t\t\t\tlocalStorage.setItem('ThemeUpdater.togglers', JSON.stringify(togglers) );
\t\t\t});
\t\t\t
\t\t\t</script>

\t\t\t<div class=\"tl_formbody_submit\">
\t\t\t\t<div class=\"tl_submit_container\">
\t\t\t\t\t<div class=\"checkbox_container\">
\t\t\t\t\t\t<input type=\"checkbox\" name=\"delete_demo_files\" id=\"delete_demo_files\">
\t\t\t\t\t\t<label for=\"agreement\"><?= \$arrLang['BACKEND_DESCRIPTION']['delete_demo_files']; ?></label>
\t\t\t\t\t</div>
\t\t\t\t\t<button type=\"submit\" class=\"tl_submit\" name=\"commit\"><?= \$arrLangTpl['submit_commit']; ?></button>
\t\t\t\t\t<button type=\"submit\" class=\"tl_submit\" name=\"done\"><?= \$arrLangTpl['submit_done']; ?></button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t\t<?php endif; ?>
\t\t</div>

<?php elseif(\$this->status == 'INSTALLATION' && \$this->step == 'UNZIP'): ?>
<!-- ! INSTALLATION : STEP UNZIP (1): Unzip -->\t\t
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if(!\$this->ajax_running): ?>
\t\t<!-- start the unzip command via ajax -->
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=installation&step=copy_files') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= \$arrLang['AJAX_INFO']['unzip']; ?>';
\t\tPCT_ThemeUpdater.request({'action':'run','redirectTo':'<?= \$url; ?>'});
\t\t</script>
\t\t<?php endif; ?>
\t\t
<?php elseif(\$this->status == 'INSTALLATION' && \$this->step == 'COPY_FILES'): ?>
<!-- ! INSTALLATION : STEP UNZIP (2): Copy the files -->\t\t
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if(!\$this->ajax_running): ?>
\t\t<!-- start the file coping via ajax -->
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=installation&step=clear_cache') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= \$arrLang['AJAX_INFO']['copy_files']; ?>';
\t\tPCT_ThemeUpdater.request({'action':'run','redirectTo':'<?= \$url; ?>'});
\t\t</script>
\t\t<?php endif; ?>
\t\t
<?php elseif(\$this->status == 'INSTALLATION' && \$this->step == 'CLEAR_CACHE'): ?>
<!-- ! INSTALLATION : STEP : Clear the internal caches -->\t\t
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if(!\$this->ajax_running): ?>
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=installation&step=db_update_modules') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= \$arrLang['AJAX_INFO']['clear_cache']; ?>';
\t\tPCT_ThemeUpdater.request({'action':'run','redirectTo':'<?= \$url; ?>'});
\t\t</script>
\t\t<?php endif; ?>

<?php elseif(\$this->status == 'INSTALLATION' && \$this->step == 'DB_UPDATE_MODULES'): ?>
<!-- ! INSTALLATION : STEP DB_UPDATE_MODULES -->\t\t
\t\t
\t\t<?php if(\$this->errors): ?>
\t\t<p><?= \$this->errors; ?></p>
\t\t<?php else: ?>
\t\t
\t\t<p class=\"hidden\">Datenbank ist up to date.</p>
\t\t
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=manual_adjustment') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= \$arrLang['AJAX_INFO']['db_update_modules']; ?>';
\t\tPCT_ThemeUpdater.redirectTo('<?= \$url; ?>',3000);
\t\t</script>
\t\t
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>

<?php elseif(\$this->status == 'LOADING'): ?>
<!-- ! LICENSE ACCEPTED... begin loading -->
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if(!\$this->ajax_running): ?>
\t\t<!-- start the loading process via ajax -->
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=installation&step=unzip') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= sprintf(\$arrLang['AJAX_INFO']['loading'],\$this->license->file->name); ?>';
\t\tPCT_ThemeUpdater.request({'action':'run','redirectTo':'<?= \$url; ?>'});
\t\t</script>
\t\t<?php endif; ?>

<?php elseif(\$this->status == 'NOT_ACCEPTED' || \$this->status == 'ACCESS_DENIED'): ?>
<!-- ! LICENSE NOT_ACCEPTED, ACCESS DENIED... -->
\t\t
\t\t<div class=\"backend_explanation_additional\">
\t\t<?php if(\$this->language == 'de'): ?>
\t\tBitte prüfen Sie die Bestellnummer und die hinterlegte Lizenznehmerdomain in Ihrem Kundenbereich.
\t\t<?php else: ?>
\t\tPlease check the order number and the registered license domain in your customer area.
\t\t<?php endif; ?>
\t\t</div>

\t\t<?php if(\$this->errors): ?>
\t\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t\t<?php endif; ?>
\t\t
\t\t<p class=\"tl_message header_back\"><a class=\"reset\" href=\"<?= Controller::getReferer(); ?>\" title=\"<?= \$GLOBALS['TL_LANG']['MSC']['backBTTitle']; ?>\"><?= \$GLOBALS['TL_LANG']['MSC']['backBT']; ?></a></p>

<?php elseif(\$this->status == 'NOT_SUPPORTED'): ?>
<!-- ! THEME NOT SUPPORTED... -->
\t\t
\t\t<?php 
\t\t\$themes = array();
\t\tforeach(\$GLOBALS['PCT_THEME_UPDATER']['THEMES'] as \$data)
\t\t{
\t\t\t\$themes[] = \$data['label'];
\t\t}\t
\t\t?>
\t\t
\t\t<p class=\"backend_explanation_additional error\"><?= sprintf(\$arrLangTpl['not_supported'], implode(', ', \$themes)); ?></p>
\t\t<p class=\"tl_message header_back\"><a class=\"reset\" href=\"<?= Backend::addToUrl('status=reset',true,array('status','step')); ?>\" title=\"<?= \$arrLangTpl['button_reset'][1]; ?>\"><?= \$arrLangTpl['button_reset'][0]; ?></a></p>
\t\t\t\t\t\t
\t\t<?php endif; ?>


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
        return "@pct_theme_updater/be_pct_theme_updater.html5";
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
namespace Contao;

\$strToken = \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
\$this->l_status = strtolower(\$this->status);
\$this->l_step = strtolower(\$this->step);
\$this->l_status_step = strtolower(\$this->status).(\$this->step ? '.'.strtolower(\$this->step) : '');
\$arrLang = \$GLOBALS['TL_LANG']['PCT_THEME_UPDATER'];
\$arrLangTpl = \$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['TEMPLATE'];

\$strStatus = \$arrLang['STATUS'][\$this->l_status] ?? '';
\$strStep = \$arrLang['STATUS'][\$this->l_status_step] ?? '';
\$strTheme = \$GLOBALS['PCT_THEME_UPDATER']['THEMES'][\$this->theme]['label'] ?? '';
if(strlen(\$strStatus) < 1 && strlen(\$strStep) > 0)
{
\t\$strStatus = \$strStep;
}
if(isset(\$this->license->registration->domains) && !is_array(\$this->license->registration->domains))
{
\t\$this->license->registration->domains = (array)\$this->license->registration->domains;
}
if( !isset(\$arrLang['BACKEND_DESCRIPTION'][\$this->l_status_step]) )
{
\t\$arrLang['BACKEND_DESCRIPTION'][\$this->l_status_step] = '';
}


?>

<div id=\"pct_theme_updater\" class=\"<?= \\strtolower(\$this->status); ?>\">
\t<div class=\"tl_formbody\">
\t\t<div id=\"tl_buttons\">
\t\t\t<span class=\"version\">Version: <?= \\PCT_THEME_UPDATER; ?></span>
\t\t\t<!-- <a class=\"shop_link\" href=\"https://www.premium-contao-themes.com/contao-installer.html\" target=\"_blank\"><?= \$arrLangTpl['button_installer_buy']; ?></a>-->
\t\t\t<a class=\"shop_link\" href=\"https://www.premium-contao-themes.com\" target=\"_blank\"><?= \$arrLangTpl['button_license_buy']; ?></a>
\t\t\t<?php if(\$strStatus): ?>
\t\t\t<span class=\"status hidden\"><?= sprintf(\$arrLangTpl['label_status'],\$strStatus); ?></span>
\t\t\t<?php endif; ?>
\t\t\t<a href=\"<?= \$this->resetUrl; ?>\" class=\"tl_button reset header_back\" title=\"<?= \$arrLangTpl['button_reset'][1]; ?>\"><?= \$arrLangTpl['button_reset'][0]; ?></a>
\t\t</div>
\t\t
\t\t<div class=\"backend_explanation\"><?= sprintf(\$arrLang['BACKEND_DESCRIPTION'][\$this->l_status_step],\$strTheme); ?></div>

<!-- ! UPDATER_LICENSE, WELCOME screen -->
<?php if(\$this->status == 'ENTER_UPDATER_LICENSE' || \$this->status == 'WELCOME'): ?>
\t\t
\t\t<?php if(\$this->errors): ?>
\t\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t\t<?php endif; ?>
\t
\t\t<div class=\"backend_explanation_additional\">
\t\t\t<?= \$arrLangTpl['enter_updater_license_info']; ?>
\t\t</div>
\t\t
\t\t<form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken ; ?>\">
\t\t\t
\t\t\t<div class=\"tl_formbody_top\">
\t\t\t\t<div class=\"input_wrapper licence_check\">
\t\t\t\t\t<div class=\"widget field w50 license\">
\t\t\t\t\t\t<h3><?= \$arrLangTpl['input_license'][0]; ?></h3>
\t\t\t\t\t\t<input type=\"text\" name=\"license\" value=\"\" class=\"tl_text\" <?php if(\$this->strLicense): ?>value=\"<?= \$this->strLicense; ?>\"<?php endif; ?> placeholder=\"<?= \$this->strLicense; ?>\">
\t\t\t\t\t\t<p class=\"tl_help tl_tip\"><?= \$arrLangTpl['input_license'][1]; ?></p>
\t\t\t\t\t</div>
\t\t\t\t\t<?php if(!\$this->themeLicenseFileExists): ?>
\t\t\t\t\t<div class=\"widget field w50 license\">
\t\t\t\t\t\t<h3><?= \$arrLangTpl['input_license_theme'][0]; ?></h3>
\t\t\t\t\t\t<input type=\"text\" name=\"license_theme\" value=\"\" class=\"tl_text\" <?php if(\$this->strThemeLicense): ?>value=\"<?= \$this->strThemeLicense; ?>\"<?php endif; ?> placeholder=\"<?= \$this->strThemeLicense; ?>\">
\t\t\t\t\t\t<p class=\"tl_help tl_tip\"><?= \$arrLangTpl['input_license_theme'][1]; ?></p>
\t\t\t\t\t</div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"tl_formbody_middle\">
\t\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t\t<?php endif; ?>
\t\t\t</div>

\t\t\t<div class=\"tl_formbody_bottom tl_formbody_submit\">
\t\t\t\t<div class=\"tl_submit_container\">
\t\t\t\t\t<input type=\"submit\" name=\"validate_updater_license\" class=\"tl_submit\" value=\"<?= \$arrLangTpl['submit_license']; ?>\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>

<!-- ! WELCOME, ENTER THEME LICENSE screen -->
<?php elseif(\$this->status == 'ENTER_THEME_LICENSE'): ?>
\t\t<div class=\"backend_explanation_additional\">
\t\t\t<?= \$arrLangTpl['welcome_info']; ?>
\t\t</div>
\t\t
\t\t<form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t
\t\t\t<div class=\"tl_formbody_top\">
\t\t\t\t<div class=\"input_wrapper licence_check\">
\t\t\t\t\t<div class=\"widget field w50 license\">
\t\t\t\t\t\t<h3><?= \$arrLangTpl['input_license_theme'][0]; ?></h3>
\t\t\t\t\t\t<input type=\"text\" name=\"license\" value=\"\" class=\"tl_text\" placeholder=\"\" required>
\t\t\t\t\t\t<p class=\"tl_help tl_tip\"><?= \$arrLangTpl['input_license_theme'][1]; ?></p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"widget field w50 email\">
\t\t\t\t\t\t<h3><?= \$arrLangTpl['input_email'][0]; ?></h3>
\t\t\t\t\t\t<input type=\"email\" name=\"email\" value=\"\" class=\"tl_text\" placeholder=\"\" required>
\t\t\t\t\t\t<p class=\"tl_help tl_tip\"><?= \$arrLangTpl['input_email'][1]; ?></p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"tl_formbody_middle\">
\t\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t\t<?php endif; ?>
\t\t\t</div>

\t\t\t<div class=\"tl_formbody_bottom tl_formbody_submit\">
\t\t\t\t<div class=\"tl_submit_container\">
\t\t\t\t\t<input type=\"submit\" name=\"validate_license\" class=\"tl_submit\" value=\"<?= \$arrLangTpl['submit_license']; ?>\">
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>

<?php elseif(\$this->status == 'ERROR'): ?>
<!-- ! ERROR screen -->
\t
\t<div class=\"tl_formbody_middle\">
\t<?php if(\$this->errors): ?>
\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t<?php endif; ?>
\t
\t
\t<p class=\"tl_message\"><a href=\"<?= StringUtil::decodeEntities( Controller::addToUrl('do=log',true,array('step','status')) ); ?>\" title=\"<?= \$arrLangTpl['button_systemlog'][0]; ?>\"><?= \$arrLangTpl['button_systemlog'][0]; ?></a></p>
\t<p class=\"tl_message header_back\"><a class=\"reset\" href=\"<?= StringUtil::decodeEntities( Controller::addToUrl('status=reset',true) ); ?>\" title=\"<?= \$arrLangTpl['button_reset'][1]; ?>\"><?= \$arrLangTpl['button_reset'][0]; ?></a></p>
\t</div>
<?php elseif(\$this->status == 'DONE'): ?>
<!-- ! DONE, COMPLETED screen -->
\t
\t<?php if(\$this->errors): ?>
\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t<?php endif; ?>

\t<?php if(\$this->messages): ?>
\t<div class=\"backend_explanation_additional\"><?= implode(\"\\n\", \$this->messages); ?></div>
\t<?php endif; ?>

\t<?php // up to date
\tif( \$this->up_to_date ): ?>
\t<div class=\"backend_explanation_additional\">
\t<p class=\"checked\"><?= \$arrLangTpl['up_to_date']; ?></p>
\t<table>
\t\t<tr class=\"tl_green\">
\t\t\t<td>Installation ist aktuell. Version: <?= \$this->local_version; ?></td>
\t\t<tr>
\t</table>
\t</div>

\t<?php endif; ?>
\t
\t<script>
\tlocalStorage.removeItem('ThemeUpdater.toggler');
\tlocalStorage.removeItem('ThemeUpdater.checked');
\t</script>
\t
<?php elseif( in_array(\$this->status, array('VERSION_CONFLICT', 'MIN_REQUIREMENT')) ): ?>
<!-- ! VERSION_CONFLICT screen -->
\t
\t<div class=\"tl_formbody_middle\">
\t<?php if(\$this->errors): ?>
\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t<?php endif; ?>
\t
\t</div>
\t\t
<?php elseif(\$this->status == 'SESSION_LOST'): ?>
<!-- ! SESSION LOST -->
\t
\t<p class=\"tl_message header_back\"><a class=\"reset\" href=\"<?= StringUtil::decodeEntities( Backend::addToUrl('status=reset',true) ); ?>\" title=\"<?= \$arrLangTpl['button_reset'][1]; ?>\"><?= \$arrLangTpl['button_reset'][0]; ?></a></p>

<?php elseif(\$this->status == 'READY'): ?>
<!-- ! READY  -->
\t\t<div class=\"theme_updater_desc\"><?= \$arrLang['BACKEND_DESCRIPTION']['theme_updater_desc']; ?></div>
\t\t<div class=\"backend_explanation_additional\">
\t\t<table>
\t\t\t<tr class=\"tl_blue\">
\t\t\t\t<td>Installierte Version:</td>
\t\t\t\t<td><?= \$this->local_version; ?>
\t\t\t\t<?php if( \$this->version_conflict ): ?>
\t\t\t\t<span class=\"error\">(<?= \\sprintf(\$GLOBALS['TL_LANG']['XPT']['pct_theme_updater']['min_theme_version'], \$this->local_version); ?>)</span>
\t\t\t\t<?php endif; ?>
\t\t\t\t</td>
\t\t\t\t
\t\t\t<tr>
\t\t\t<tr class=\"tl_green\">
\t\t\t\t<td>Verfügbare Version:</td>
\t\t\t\t<td><?= \$this->live_version; ?>, Datum der Veröffentlichung: <?= \$this->release_date; ?></td>
\t\t\t<tr>
\t\t\t<tr>
\t\t\t\t<td><a href=\"<?= \$this->changelog_txt; ?>\" title=\"Siehe Changelog.txt\" target=\"_blank\">Siehe Changelog.txt</a></td>
\t\t\t</tr>
\t\t</table>
\t\t
\t\t</div>
\t\t
\t\t<div class=\"license_information tl_formbody_middle\">
\t\t\t<?php if(\$this->errors): ?>
\t\t\t<div class=\"tl_message\">
\t\t\t\t<p class=\"tl_error\"><?= implode(\"\\n\", \$this->errors); ?></p>
\t\t\t</div>
\t\t\t<?php endif; ?>

\t\t\t<!-- wrong domain registration -->
\t\t\t<?php if(\$this->hasRegistrationError): ?>
\t\t\t<div class=\"tl_message\">
\t\t\t\t<p class=\"tl_error\"><?= sprintf(\$arrLangTpl['domainRegistrationError'],Environment::get('host'),\$this->license->key,Environment::get('host')); ?></p>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<!-- file information -->
\t\t\t<div class=\"product file\"><?= \$this->license->file->name; ?></div>\t
\t\t</div>
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<form id=\"form_pct_theme_updater\" action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken ; ?>\">
\t\t\t
\t\t\t<div class=\"tl_formbody_top\">
\t\t\t</div>
\t\t\t\t\t\t
\t\t\t<div class=\"tl_formbody_bottom tl_formbody_submit\">

\t\t\t\t<div class=\"tl_submit_container\">
   \t\t\t\t<div class=\"agreement_container\">
   \t\t\t\t   <input type=\"checkbox\" name=\"agreement\" id=\"agreement\">
                  <label for=\"agreement\"><?= \$arrLang['BACKEND_DESCRIPTION']['agreement']; ?></label>
   \t\t\t\t</div>
\t\t\t\t\t<input type=\"submit\" disabled name=\"install\" class=\"tl_submit\" value=\"<?= \$arrLangTpl['submit_install']; ?>\">
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<script>
\t\t\tjQuery(document).ready(function() 
\t\t\t{
\t\t\t\tjQuery('input[name=\"agreement\"]').change(function()
\t\t\t\t{
\t\t\t\t\tjQuery('input[name=\"install\"]').attr('disabled','disabled');
\t\t\t\t\tif( this.checked )
\t\t\t\t\t{
\t\t\t\t\t\tjQuery('input[name=\"install\"]').removeAttr('disabled');
\t\t\t\t\t}
\t\t\t\t});
\t\t\t});
\t\t\t</script>
\t\t</form>

<?php elseif(\$this->status == 'MANUAL_ADJUSTMENT'): ?>
<!-- ! MANUAL_ADJUSTMENT -->\t\t

\t\t<?php if( !empty(\$this->tasks) ): ?>
\t\t<div class=\"backend_explanation_additional\">
\t\t<?php if(\$this->language == 'de'): ?>
\t\tIn diesem Schritt finden Sie eine Auflistung der manuellen Anpassungen des Themes, die für den Update-Abschluss notwendig sind. Automatisierte Updates sind technisch für diese Anpassungen leider nicht möglich. Die Checklisten dienen der Selbstkontrolle und geben eine Übersicht der bereits abgeschlossenen Aufgaben.
\t\t<?php else: ?>
\t\tIn this step you will find a list of the manual adjustments to the theme that are necessary to complete the update. Unfortunately, automated updates are technically not possible for these adjustments. The checklists are used for self-control and provide an overview of the tasks that have already been completed.
\t\t<?php endif; ?>
\t\t</div>
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"backend_explanation_additional\">
\t\t<table>
\t\t\t<tr class=\"tl_green\">
\t\t\t\t<td>Manuelle Update-Schritte für Version:&nbsp;</td>
\t\t\t\t<td><?= \$this->live_version; ?></td>
\t\t\t<tr>
\t\t\t<tr>
\t\t\t\t<td><a href=\"<?= \$this->changelog_txt; ?>\" title=\"Siehe Changelog.txt\" target=\"_blank\">Siehe Changelog.txt</a></td>
\t\t\t</tr>
\t\t</table>
\t\t</div>

\t\t<?php if( empty(\$this->tasks) ): ?>
\t\t<div class=\"content\">
\t\t\t<p class=\"info\"><?= \$arrLangTpl['empty_tasks']; ?></p>
\t\t</div>

\t\t<form id=\"form_pct_theme_updater\" action=\"<?= \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t<div class=\"tl_formbody_submit\">
\t\t\t\t<div class=\"tl_submit_container\">
\t\t\t\t\t<div class=\"checkbox_container\">
\t\t\t\t\t\t<input type=\"checkbox\" name=\"delete_demo_files\" id=\"delete_demo_files\">
\t\t\t\t\t\t<label for=\"agreement\"><?= \$arrLang['BACKEND_DESCRIPTION']['delete_demo_files']; ?></label>
\t\t\t\t\t</div>
\t\t\t\t\t<button type=\"submit\" class=\"tl_submit\" name=\"done\"><?= \$arrLangTpl['submit_done']; ?></button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t\t<?php else: ?>
\t\t<form id=\"form_pct_theme_updater\" action=\"<?= \$this->action; ?>\" class=\"tl_form\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId; ?>\">
\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t<input type=\"hidden\" name=\"action\" value=\"toggle_tasks\">
\t\t<div class=\"content\">
\t\t<?php foreach(\$this->tasks as \$k => \$category): ?>
\t\t<div id=\"categorory_<?= \$k; ?>\" class=\"category container\">\t
\t\t\t<div class=\"thead row toggler\" data-toggler=\"cat_<?= \$k; ?>\">
\t\t\t\t<p class=\"title\"><?= \$category->title; ?></p>
\t\t\t</div>
\t\t\t<div class=\"tasks_container\">
\t\t\t\t<p class=\"description\"><?= \$category->description; ?></p>
\t\t\t\t<div class=\"task_columns\">
\t\t\t\t\t<div class=\"task\"><?= \$arrLangTpl['manual_table']['head']['task']; ?></div>
\t\t\t\t\t<div class=\"description\"><?= \$arrLangTpl['manual_table']['head']['description']; ?></div>
\t\t\t\t\t<div class=\"status\"><?= \$arrLangTpl['manual_table']['head']['status']; ?></div>
\t\t\t\t</div>
\t\t\t\t<div class=\"task_container\">
\t\t\t\t<?php foreach(\$category->tasks as \$i => \$task): ?>\t
\t\t\t\t<?php 
\t\t\t\t\$arrClass = array('row','row_'.\$i);
\t\t\t\tif( \$task->mandatory ) { \$arrClass[] = 'mandatory'; }
\t\t\t\t(\$i%2 == 0 ? \$arrClass[] = 'even' : \$arrClass[] = 'odd');
\t\t\t\t(\$i == 0 ? \$arrClass[] = 'first' : '');
\t\t\t\t(\$i == count(\$category->tasks) - 1 ? \$arrClass[] = 'last' : '');
\t\t\t\t?>
\t\t\t\t<div class=\"task <?= implode(' ', \$arrClass); ?> container\">
\t\t\t\t\t<div class=\"thead row\">
\t\t\t\t\t\t<div class=\"title toggler\" data-toggler=\"task_<?= \$task->id; ?>\"><?= \$task->title; ?></div>
\t\t\t\t\t\t<div class=\"description\"><?= \$task->description; ?></div>
\t\t\t\t\t\t<div class=\"status\"><input type=\"checkbox\" name=\"tasks[<?= \$task->id; ?>]\" <?php if(\$task->checked): ?>checked<?php endif; ?> class=\"checkbox<?= (\$task->mandatory ? ' mandatory' : ''); ?>\" value=\"<?= \$task->id; ?>\">
\t\t\t\t\t\t<?php if(\$task->checked && \$task->user): ?>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Eingereicht von: <?= UserModel::findByPk(\$task->user)->username; ?></li>
\t\t\t\t\t\t\t<li>Datum: <?= Date::parse('d.m.Y h:i',\$task->tstamp); ?></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tbody row\">
\t\t\t\t\t\t<div class=\"documentation\"><?= \$task->documentation; ?></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<?php endforeach; ?>
\t\t\t\t</div>\t
\t\t\t</div>\t\t\t\t
\t\t</div>
\t\t<?php endforeach; ?>
\t\t\t
\t\t\t<script type=\"text/javascript\">
\t\t\t// -- Checkboxes
\t\t\tvar objParams = {};
\t\t\tjQuery.each(jQuery('form#form_pct_theme_updater').serializeArray(),function(i,v)
\t\t\t{
\t\t\t\tobjParams[v.name] = v.value;
\t\t\t});
\t\t\t
\t\t\tvar numberOfTasks = <?= \$this->numberOfTasks; ?>;
\t\t\tvar checkboxes = [];
\t\t\t// check all checkboxes from localstorage
\t\t\tif( localStorage.getItem('ThemeUpdater.checked') != null )
\t\t\t{
\t\t\t\tcheckboxes = JSON.parse( localStorage.getItem('ThemeUpdater.checked') );
\t\t\t\t
\t\t\t\tjQuery.each(checkboxes,function(i,k)
\t\t\t\t{
\t\t\t\t\tjQuery('form#form_pct_theme_updater input[name=\"'+k+'\"]').prop('checked',true);
\t\t\t\t});
\t\t\t}
\t\t\tjQuery(document).ready(function() 
\t\t\t{\t
\t\t\t\t// reset checkboxes and collect all checked ones
\t\t\t\tcheckboxes = [];
\t\t\t\tjQuery.each(jQuery('form#form_pct_theme_updater input[type=\"checkbox\"]:checked'), function(i,k)
\t\t\t\t{
\t\t\t\t\tcheckboxes.push( jQuery(k).attr('name') );
\t\t\t\t});

\t\t\t\t// set button to disabled or not
\t\t\t\tif( checkboxes.length >= numberOfTasks )
\t\t\t\t{
\t\t\t\t\tjQuery('form#form_pct_theme_updater button[name=\"done\"]').prop('disabled',false);
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t\tjQuery('form#form_pct_theme_updater .task .checkbox').on('change',function(e)
\t\t\t{
\t\t\t\tobjParams.task = this.value
\t\t\t\tobjParams.checked = jQuery(this).prop('checked');
\t\t\t\t
\t\t\t\tvar id = jQuery(this).attr('name');
\t\t\t\tif( jQuery(this).prop('checked') )
\t\t\t\t{
\t\t\t\t\tcheckboxes.push( id )
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\tcheckboxes.splice( checkboxes.indexOf(id), 1 );
\t\t\t\t}
\t\t\t\tlocalStorage.setItem('ThemeUpdater.checked', JSON.stringify(checkboxes));
\t\t\t});
\t\t\t
\t\t\t//-- Togglers
\t\t\tvar togglers = JSON.parse( localStorage.getItem('ThemeUpdater.togglers') );\t\t\t
\t\t\tif( togglers == null )
\t\t\t{
\t\t\t\ttogglers = [];
\t\t\t\t// open first category
\t\t\t\tjQuery('#form_pct_theme_updater .category.container:first-child').addClass('open');
\t\t\t}
\t\t\t
\t\t\t// reopen togglers
\t\t\tjQuery.each(togglers, function(i,k)
\t\t\t{
\t\t\t\tvar toggler = jQuery('[data-toggler=\"'+k+'\"]');
\t\t\t\ttoggler.addClass('open');
\t\t\t\t\t\t
\t\t\t\t// task_
\t\t\t\tif( k.indexOf('task_') == 0 )
\t\t\t\t{
\t\t\t\t\ttoggler.parent().parent('.container').addClass('open');
\t\t\t\t}
\t\t\t\t// cat_
\t\t\t\tif( k.indexOf('cat_') == 0 )
\t\t\t\t{
\t\t\t\t\ttoggler.parent('.container').addClass('open');
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t\t// toggle category palettes
\t\t\tjQuery('#form_pct_theme_updater .category > .toggler').click(function(e)
\t\t\t{
\t\t\t\te.preventDefault();
\t\t\t\tjQuery(this).toggleClass('open');
\t\t\t\tjQuery(this).parent('.container').toggleClass('open');

\t\t\t\tjQuery(document).trigger('ThemeUpdater.onToggler',{'toggler':jQuery(this).attr('data-toggler')});
\t\t\t});

\t\t\t// toggle tasks
\t\t\tjQuery('#form_pct_theme_updater .task .toggler').click(function(e)
\t\t\t{
\t\t\t\te.preventDefault();
\t\t\t\tjQuery(this).toggleClass('open');
\t\t\t\tjQuery(this).parent().parent('.container').toggleClass('open');

\t\t\t\tjQuery(document).trigger('ThemeUpdater.onToggler',{'toggler':jQuery(this).attr('data-toggler')});
\t\t\t});

\t\t\tjQuery(document).on('ThemeUpdater.onToggler',function(e,params) 
\t\t\t{
\t\t\t\tvar id = params.toggler;
\t\t\t\tif( jQuery('[data-toggler=\"'+id+'\"]').hasClass('open') )
\t\t\t\t{
\t\t\t\t\ttogglers.push( id );
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\ttogglers.splice( togglers.indexOf(id), 1 );
\t\t\t\t}
\t\t\t\tlocalStorage.setItem('ThemeUpdater.togglers', JSON.stringify(togglers) );
\t\t\t});
\t\t\t
\t\t\t</script>

\t\t\t<div class=\"tl_formbody_submit\">
\t\t\t\t<div class=\"tl_submit_container\">
\t\t\t\t\t<div class=\"checkbox_container\">
\t\t\t\t\t\t<input type=\"checkbox\" name=\"delete_demo_files\" id=\"delete_demo_files\">
\t\t\t\t\t\t<label for=\"agreement\"><?= \$arrLang['BACKEND_DESCRIPTION']['delete_demo_files']; ?></label>
\t\t\t\t\t</div>
\t\t\t\t\t<button type=\"submit\" class=\"tl_submit\" name=\"commit\"><?= \$arrLangTpl['submit_commit']; ?></button>
\t\t\t\t\t<button type=\"submit\" class=\"tl_submit\" name=\"done\"><?= \$arrLangTpl['submit_done']; ?></button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t\t<?php endif; ?>
\t\t</div>

<?php elseif(\$this->status == 'INSTALLATION' && \$this->step == 'UNZIP'): ?>
<!-- ! INSTALLATION : STEP UNZIP (1): Unzip -->\t\t
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if(!\$this->ajax_running): ?>
\t\t<!-- start the unzip command via ajax -->
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=installation&step=copy_files') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= \$arrLang['AJAX_INFO']['unzip']; ?>';
\t\tPCT_ThemeUpdater.request({'action':'run','redirectTo':'<?= \$url; ?>'});
\t\t</script>
\t\t<?php endif; ?>
\t\t
<?php elseif(\$this->status == 'INSTALLATION' && \$this->step == 'COPY_FILES'): ?>
<!-- ! INSTALLATION : STEP UNZIP (2): Copy the files -->\t\t
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if(!\$this->ajax_running): ?>
\t\t<!-- start the file coping via ajax -->
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=installation&step=clear_cache') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= \$arrLang['AJAX_INFO']['copy_files']; ?>';
\t\tPCT_ThemeUpdater.request({'action':'run','redirectTo':'<?= \$url; ?>'});
\t\t</script>
\t\t<?php endif; ?>
\t\t
<?php elseif(\$this->status == 'INSTALLATION' && \$this->step == 'CLEAR_CACHE'): ?>
<!-- ! INSTALLATION : STEP : Clear the internal caches -->\t\t
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if(!\$this->ajax_running): ?>
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=installation&step=db_update_modules') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= \$arrLang['AJAX_INFO']['clear_cache']; ?>';
\t\tPCT_ThemeUpdater.request({'action':'run','redirectTo':'<?= \$url; ?>'});
\t\t</script>
\t\t<?php endif; ?>

<?php elseif(\$this->status == 'INSTALLATION' && \$this->step == 'DB_UPDATE_MODULES'): ?>
<!-- ! INSTALLATION : STEP DB_UPDATE_MODULES -->\t\t
\t\t
\t\t<?php if(\$this->errors): ?>
\t\t<p><?= \$this->errors; ?></p>
\t\t<?php else: ?>
\t\t
\t\t<p class=\"hidden\">Datenbank ist up to date.</p>
\t\t
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=manual_adjustment') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= \$arrLang['AJAX_INFO']['db_update_modules']; ?>';
\t\tPCT_ThemeUpdater.redirectTo('<?= \$url; ?>',3000);
\t\t</script>
\t\t
\t\t<?php endif; ?>
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>

<?php elseif(\$this->status == 'LOADING'): ?>
<!-- ! LICENSE ACCEPTED... begin loading -->
\t\t
\t\t<div class=\"tl_formbody_middle\">
\t\t\t<?php if(\$this->breadcrumb): ?>
\t\t\t\t<?= \$this->breadcrumb; ?>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if(!\$this->ajax_running): ?>
\t\t<!-- start the loading process via ajax -->
\t\t<script type=\"text/javascript\">
\t\t<?php 
\t\t\$url = StringUtil::decodeEntities( Backend::addToUrl('status=installation&step=unzip') );
\t\t?>
\t\tPCT_ThemeUpdater.ajax_infotext = '<?= sprintf(\$arrLang['AJAX_INFO']['loading'],\$this->license->file->name); ?>';
\t\tPCT_ThemeUpdater.request({'action':'run','redirectTo':'<?= \$url; ?>'});
\t\t</script>
\t\t<?php endif; ?>

<?php elseif(\$this->status == 'NOT_ACCEPTED' || \$this->status == 'ACCESS_DENIED'): ?>
<!-- ! LICENSE NOT_ACCEPTED, ACCESS DENIED... -->
\t\t
\t\t<div class=\"backend_explanation_additional\">
\t\t<?php if(\$this->language == 'de'): ?>
\t\tBitte prüfen Sie die Bestellnummer und die hinterlegte Lizenznehmerdomain in Ihrem Kundenbereich.
\t\t<?php else: ?>
\t\tPlease check the order number and the registered license domain in your customer area.
\t\t<?php endif; ?>
\t\t</div>

\t\t<?php if(\$this->errors): ?>
\t\t<div class=\"backend_explanation_additional error\"><?= implode(\"\\n\", \$this->errors); ?></div>
\t\t<?php endif; ?>
\t\t
\t\t<p class=\"tl_message header_back\"><a class=\"reset\" href=\"<?= Controller::getReferer(); ?>\" title=\"<?= \$GLOBALS['TL_LANG']['MSC']['backBTTitle']; ?>\"><?= \$GLOBALS['TL_LANG']['MSC']['backBT']; ?></a></p>

<?php elseif(\$this->status == 'NOT_SUPPORTED'): ?>
<!-- ! THEME NOT SUPPORTED... -->
\t\t
\t\t<?php 
\t\t\$themes = array();
\t\tforeach(\$GLOBALS['PCT_THEME_UPDATER']['THEMES'] as \$data)
\t\t{
\t\t\t\$themes[] = \$data['label'];
\t\t}\t
\t\t?>
\t\t
\t\t<p class=\"backend_explanation_additional error\"><?= sprintf(\$arrLangTpl['not_supported'], implode(', ', \$themes)); ?></p>
\t\t<p class=\"tl_message header_back\"><a class=\"reset\" href=\"<?= Backend::addToUrl('status=reset',true,array('status','step')); ?>\" title=\"<?= \$arrLangTpl['button_reset'][1]; ?>\"><?= \$arrLangTpl['button_reset'][0]; ?></a></p>
\t\t\t\t\t\t
\t\t<?php endif; ?>


\t</div>

</div>
", "@pct_theme_updater/be_pct_theme_updater.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_updater/templates/be_pct_theme_updater.html5");
    }
}
