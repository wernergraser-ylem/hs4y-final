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

/* @pct_customelements_plugin_customcatalog/backend/be_page_api_import_run.html5 */
class __TwigTemplate_62af9f01841781710ae2d6b7ee10dd77 extends Template
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
 * CustomCatalog API Standard: \"Run\" page backend template
 */\t
?>

<?php 
\$objLang = (object)\$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api'];
\$intRange = \$this->objApi->maxRange;

// reset the range if it is higher than the number of data to be processed
if(\$intRange >= count(\$this->data))
{
\t\$intRange = 0;
}
?>

<?php if(count(\$this->data) > 0): ?>

<div id=\"tl_rebuild_index\">\t
\t<?php if(\$intRange > 0): ?>
\t\t<p id=\"index_loading\"><?php echo \$objLang->subheadline_import_running; ?></p>
\t\t<p id=\"index_complete\" style=\"display:none\"><?php echo \$objLang->subheadline_import_complete; ?></p>
\t\t<p id=\"index_error\" class=\"tl_error\" style=\"display:none\"><?php echo \$objLang->subheadline_errors; ?></p>
\t\t
\t\t<?php \$numItem = 0; ?>
\t\t
\t\t<?php for(\$index = 0; \$index <= count(\$this->data); \$index += \$intRange): ?>
\t\t<?php
\t\t\$arrLabels = array();
\t\t\$arrData = array_splice(\$this->data, \$index, \$intRange);\t
\t\t?>
\t\t<ul class=\"tl_listing index_<?php echo \$index; ?>\">
\t\t\t<?php foreach(\$arrData as \$i => \$data): ?>
\t\t\t\t<?php
\t\t\t\t\$label = \"Data-Index: \$numItem\";
\t\t\t\tif(\$this->mode == 'export' && \$this->objApi->uniqueTarget)
\t\t\t\t{
\t\t\t\t\t\$label = \$this->objApi->uniqueTarget.':'.\$data[\$this->objApi->uniqueTarget];
\t\t\t\t}
\t\t\t\telse if(\$this->mode == 'import' && \$this->objApi->uniqueSource)
\t\t\t\t{
\t\t\t\t\t\$label = \$this->objApi->uniqueSource.':'.\$data[\$this->objApi->uniqueSource];
\t\t\t\t}
\t\t\t\t// collect labels
\t\t\t\t\$arrLabels[] = \$label;
\t\t\t\t
\t\t\t\t// increate item counter
\t\t\t\t\$numItem++;
\t\t\t\t
\t\t\t\t// continue if last data has not been proceeded yet
\t\t\t\tif(\$i < count(\$arrData) - 1)
\t\t\t\t{
\t\t\t\t\tcontinue;
\t\t\t\t}
\t\t\t\t?>
\t\t\t\t
\t\t\t\t<li class=\"api_data tl_file\" data-index=\"<?php echo \$index; ?>\" data-range=\"<?php echo \$intRange; ?>\">
\t\t\t\t\t<div class=\"tl_left\">
\t\t\t\t\t\t<?php echo implode(', ', \$arrLabels); ?>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<?php if( \$this->objApi->uniqueTarget ): ?>
\t\t\t\t\t<div class=\"tl_right\">id:<?php echo \$data[\$this->objApi->uniqueTarget]; ?></div>
\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t
\t\t\t\t\t<div style=\"clear:both\"></div>
\t\t\t\t</li>
\t\t\t
\t\t\t<?php endforeach; ?>
\t\t</ul>
\t\t
\t\t
\t\t<?php endfor; ?>
\t\t
\t<?php else: ?>
\t<p><?php echo \$objLang->process_all_data_at_once; ?></p>
\t<?php endif; ?>
</div>

<form action=\"<?php echo \$this->action; ?>\" method=\"get\">
<input type=\"hidden\" name=\"do\" value=\"<?php echo \\Contao\\Input::get('do'); ?>\">
<input type=\"hidden\" name=\"table\" value=\"<?php echo \\Contao\\Input::get('table'); ?>\">
<input type=\"hidden\" name=\"id\" value=\"<?php echo \\Contao\\Input::get('id'); ?>\">
<input type=\"hidden\" name=\"rt\" value=\"<?php echo \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
<input type=\"hidden\" name=\"key\" value=\"summary\">

<div class=\"tl_formbody_submit\">
\t<div class=\"tl_submit_container\">
\t\t<input id=\"ctrl_tl_submit_summary\" type=\"submit\" name=\"redirect_to_summary\" class=\"tl_submit btn_summary <?php if(\$intRange > 0):?>hidden<?php endif; ?>\" value=\"<?php echo \$objLang->submit_summary; ?>\">
\t</div>
</div>
</form>

<?php 
// need the script only when range is set\t
if(\$intRange > 0): ?>
<script>
window.addEvent('domready', function() 
{
\tvar urls = \$\$('.api_data');
\tvar last = urls.length-1; 

\tfunction run(i)
\t{
\t\tvar el = urls[i];
\t\tvar data = {};
\t\tdata.index = el.getAttribute('data-index');
\t\tdata.range = el.getAttribute('data-range');
\t\tdata.api_running = 1;
\t\t
\t\tif(i >= last)
\t\t{
\t\t\tdata.complete = 1;
\t\t}
\t
\t\tnew Request(
\t\t{
\t\t\t'method': 'get',
\t\t\t'url': location.href,
\t\t\t'data': data,
\t\t\tonComplete: function(response) 
\t\t\t{
\t\t\t\tif(response == undefined)
\t\t\t\t{
\t\t\t\t\tresponse = '';
\t\t\t\t}
\t\t\t\t
\t\t\t\t// log response to browser console
\t\t\t\t<?php if(\$GLOBALS['PCT_CUSTOMCATALOG']['debug']): ?>
\t\t\t\tconsole.log('--- API response log for index: '+data.index+'---')
\t\t\t\tif(response.indexOf('<html') < 1)
\t\t\t\t{
\t\t\t\t\tconsole.log(response);
\t\t\t\t}
\t\t\t\t<?php endif; ?>
\t\t\t\t
\t\t\t\tvar hasError = false;
\t\t\t\t
\t\t\t\t// response is an json string
\t\t\t\tif(response.length > 0 && response.indexOf('{') == 0 && response.lastIndexOf('}') > 0)
\t\t\t\t{
\t\t\t\t\tresponse = JSON.decode(response);
\t\t\t\t\tif(response.error)
\t\t\t\t\t{
\t\t\t\t\t\thasError = true;
\t\t\t\t\t}
\t\t\t\t}
\t\t\t\t
\t\t\t\tel.addClass('tl_green');
\t\t\t\t
\t\t\t\t// error handling
\t\t\t\tif(hasError)
\t\t\t\t{
\t\t\t\t\tel.addClass('tl_red');
\t\t\t\t\t
\t\t\t\t\t// break
\t\t\t\t\tif(response.onError == 'escape')
\t\t\t\t\t{
\t\t\t\t\t\tconsole.log(response.error);\t
\t\t\t\t\t\t\$('index_loading').setStyle('display', 'none');
\t\t\t\t\t\t\$('index_error').setStyle('display', 'block');
\t\t\t\t\t\treturn false;
\t\t\t\t\t\t\t
\t\t\t\t\t}
\t\t\t\t}
\t\t\t\t
\t\t\t\tif(i < last)
\t\t\t\t{
\t\t\t\t\treturn run(i+1);
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\t\$('index_loading').setStyle('display', 'none');
\t\t\t\t\t\$('index_complete').setStyle('display', 'block');
\t\t\t\t\t
\t\t\t\t\t// show summary button
\t\t\t\t\t\$('ctrl_tl_submit_summary').setStyle('display', 'block');
\t\t\t\t\t
\t\t\t\t\t// send log to console
\t\t\t\t\tconsole.log('<?php echo sprintf(\$objLang->ajax_complete_console_log, \$this->objApi->id); ?>');\t\t\t\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\tonFailure: function()
\t\t\t{
\t\t\t\tel.addClass('tl_red');
\t\t\t},
\t\t\tonException: function()
\t\t\t{
\t\t\t\tel.addClass('tl_red');
\t\t\t}
\t\t}).get();
\t}
\trun(0);
});\t
</script>
<?php endif; ?>




<?php else: ?>

<div id=\"tl_rebuild_index\">
<p class=\"tl_error\">No <?php echo \$this->mode; ?> data found</p>
</div>

<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/backend/be_page_api_import_run.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/backend/be_page_api_import_run.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/backend/be_page_api_import_run.html5");
    }
}
