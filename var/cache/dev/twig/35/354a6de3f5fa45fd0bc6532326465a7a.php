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

/* @pct_themer/themedesigner/forms/td_form_upload_dropzone.html5 */
class __TwigTemplate_88c536b9fcb5401b7f1569ffd36739ab extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/forms/td_form_upload_dropzone.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/forms/td_form_upload_dropzone.html5"));

        // line 1
        yield "<?php if(\$this->description):?>
<div class=\"description\">
\t<i class=\"fa fa-info\"></i>
\t<div class=\"description-content\">
\t\t<?= \$this->description; ?>
\t</div>
</div>
<?php endif; ?>

<div class=\"field_wrapper\">
<?php 
// include dropzone script: http://www.dropzonejs.com/
\\Contao\\ArrayUtil::arrayInsert(\$GLOBALS['TL_CSS'],0,array(PCT_THEMER_PATH.'/assets/js/dropzone/dist/min/basic.min.css'));
\\Contao\\ArrayUtil::arrayInsert(\$GLOBALS['TL_CSS'],0,array(PCT_THEMER_PATH.'/assets/js/dropzone/dist/min/dropzone.min.css')); 
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_THEMER_PATH.'/assets/js/dropzone/dist/min/dropzone.min.js'; 

// config
\$maxFileSize = \$GLOBALS['PCT_THEMEDESIGNER']['maxFileSize'];
\t
?>

<form action=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\" class=\"dropzone dz-clickable\" name=\"form_<?= \$this->name ?>\" id=\"form_<?= \$this->id ?>\" method=\"post\" enctype=\"multipart/form-data\">
<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->name ?>\">
<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"<?= \$GLOBALS['PCT_THEMEDESIGNER']['maxFileSize'] ?>\">
<input type=\"hidden\" name=\"themedesigner\" value=\"1\">
<input type=\"hidden\" name=\"field\" value=\"<?= \$this->selector; ?>\">
<input type=\"hidden\" name=\"action\" value=\"upload\">

<div class=\"dz-default dz-message\">
<span>Drag file here</span>
</div>

<div class=\"fallback\">
<input data-td_selector=\"<?= \$this->selector; ?>\" type=\"file\" name=\"<?= \$this->name ?>\" id=\"ctrl_<?= \$this->id ?>\" class=\"dz-hidden-input hidden\"<?= \$this->getAttributes() ?>>
<!--
<input type=\"submit\" value=\"submit\"></div>
-->
</div>

</form>

<script>
/* <![CDATA[ */

Dropzone.autoDiscover = false;
\t
jQuery(document).ready(function()
{
\tvar strBase = '<?= \\Contao\\Environment::get('base'); ?>';
\tvar strUploadPath = '<?= \$GLOBALS['PCT_THEMEDESIGNER']['uploadFolder']; ?>';
\t
\tvar last_file = undefined;
\t
\tif(jQuery('body').hasClass('edge'))
\t{
\t\tstrUploadPath = strBase + strUploadPath;
\t}
\t
\tvar uploader = new Dropzone('#form_<?= \$this->id ?>',
\t{
\t   url: location.href,
\t   paramName: \"<?= \$this->name ?>\",
\t   acceptedFiles: 'image/*',
\t   thumbnailWidth: '170',
\t   thumbnailHeight: '90',
\t   maxFilesize: '<?= \$maxFileSize / 1000000 ; ?>', // MB

\t   //maxFiles: 1,
\t   init: function(file) 
\t   {
\t       this.removeAllFiles();
\t       //this.on(\"addedfile\", function(file) { alert(file.name + ' added'); });
\t\t},
\t   drop: function(event)
\t   {
\t\t   // remove all previous files on drop
\t   \t\tthis.removeAllFiles();
\t   },
\t   // completed
\t   complete : function(file)
\t   {
\t\t   if(file.status == 'success')
\t\t   {
\t   \t\t\tvar strName = file.name.replace(/\\s/g,'_');
\t   \t\t\t
\t   \t\t\tvar objValue = {};
\t   \t\t\tobjValue.file = strUploadPath + \"/\"+ strName+ '?'+Date.now();
\t   \t\t\tobjValue.mime = file.type;
\t   \t\t\tobjValue.name = strName + '?'+Date.now();
\t   \t\t\t
\t   \t\t\t\t   \t\t\t
\t   \t\t\tThemeDesigner.sendValue('<?= \$this->name ?>',JSON.stringify(objValue));
\t   \t\t\t
\t   \t\t\tif(last_file !== undefined)
\t   \t\t\t{
\t   \t\t\t \tthis.removeFile(last_file);
\t   \t\t\t}
\t   \t\t\t
\t   \t\t\tlast_file = file;
\t   \t\t\t//ThemeDesigner.apply();
\t   \t\t\t//jQuery(document).trigger('ThemeDesigner.onValue',{'name':'<?= \$this->name ?>','value':JSON.stringify(objValue)});
\t   \t\t}
\t\t}
\t});
\t
\t
\t/**
\t * Catch Switch event
\t */
\tjQuery('[data-name=\"<?= \$this->switch; ?>\"]').on('ThemeDesigner.onToggleSwitch',function(event,params)
\t{
\t\tif(params.status < 1)
\t\t{
\t\t\t // remove preview
\t\t\t uploader.removeAllFiles();
\t\t\t 
\t\t\t ThemeDesigner.sendValue('<?= \$this->selector; ?>',null);
\t\t}
\t});
});

/* ]]> */
</script>

<?php
// submit uploaded file to ThemeDesigner
if(\\Contao\\Input::post('field') == \$this->selector && \$_FILES[\$this->selector])
{
\t\$objThemeDesigner = new \\PCT\\ThemeDesigner;
\t\$objThemeDesigner->addUpload(\$this->selector,\$_FILES[\$this->selector]);
}

?>
<br class=\"clear\"></div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/forms/td_form_upload_dropzone.html5";
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
        return new Source("<?php if(\$this->description):?>
<div class=\"description\">
\t<i class=\"fa fa-info\"></i>
\t<div class=\"description-content\">
\t\t<?= \$this->description; ?>
\t</div>
</div>
<?php endif; ?>

<div class=\"field_wrapper\">
<?php 
// include dropzone script: http://www.dropzonejs.com/
\\Contao\\ArrayUtil::arrayInsert(\$GLOBALS['TL_CSS'],0,array(PCT_THEMER_PATH.'/assets/js/dropzone/dist/min/basic.min.css'));
\\Contao\\ArrayUtil::arrayInsert(\$GLOBALS['TL_CSS'],0,array(PCT_THEMER_PATH.'/assets/js/dropzone/dist/min/dropzone.min.css')); 
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_THEMER_PATH.'/assets/js/dropzone/dist/min/dropzone.min.js'; 

// config
\$maxFileSize = \$GLOBALS['PCT_THEMEDESIGNER']['maxFileSize'];
\t
?>

<form action=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\" class=\"dropzone dz-clickable\" name=\"form_<?= \$this->name ?>\" id=\"form_<?= \$this->id ?>\" method=\"post\" enctype=\"multipart/form-data\">
<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->name ?>\">
<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"<?= \$GLOBALS['PCT_THEMEDESIGNER']['maxFileSize'] ?>\">
<input type=\"hidden\" name=\"themedesigner\" value=\"1\">
<input type=\"hidden\" name=\"field\" value=\"<?= \$this->selector; ?>\">
<input type=\"hidden\" name=\"action\" value=\"upload\">

<div class=\"dz-default dz-message\">
<span>Drag file here</span>
</div>

<div class=\"fallback\">
<input data-td_selector=\"<?= \$this->selector; ?>\" type=\"file\" name=\"<?= \$this->name ?>\" id=\"ctrl_<?= \$this->id ?>\" class=\"dz-hidden-input hidden\"<?= \$this->getAttributes() ?>>
<!--
<input type=\"submit\" value=\"submit\"></div>
-->
</div>

</form>

<script>
/* <![CDATA[ */

Dropzone.autoDiscover = false;
\t
jQuery(document).ready(function()
{
\tvar strBase = '<?= \\Contao\\Environment::get('base'); ?>';
\tvar strUploadPath = '<?= \$GLOBALS['PCT_THEMEDESIGNER']['uploadFolder']; ?>';
\t
\tvar last_file = undefined;
\t
\tif(jQuery('body').hasClass('edge'))
\t{
\t\tstrUploadPath = strBase + strUploadPath;
\t}
\t
\tvar uploader = new Dropzone('#form_<?= \$this->id ?>',
\t{
\t   url: location.href,
\t   paramName: \"<?= \$this->name ?>\",
\t   acceptedFiles: 'image/*',
\t   thumbnailWidth: '170',
\t   thumbnailHeight: '90',
\t   maxFilesize: '<?= \$maxFileSize / 1000000 ; ?>', // MB

\t   //maxFiles: 1,
\t   init: function(file) 
\t   {
\t       this.removeAllFiles();
\t       //this.on(\"addedfile\", function(file) { alert(file.name + ' added'); });
\t\t},
\t   drop: function(event)
\t   {
\t\t   // remove all previous files on drop
\t   \t\tthis.removeAllFiles();
\t   },
\t   // completed
\t   complete : function(file)
\t   {
\t\t   if(file.status == 'success')
\t\t   {
\t   \t\t\tvar strName = file.name.replace(/\\s/g,'_');
\t   \t\t\t
\t   \t\t\tvar objValue = {};
\t   \t\t\tobjValue.file = strUploadPath + \"/\"+ strName+ '?'+Date.now();
\t   \t\t\tobjValue.mime = file.type;
\t   \t\t\tobjValue.name = strName + '?'+Date.now();
\t   \t\t\t
\t   \t\t\t\t   \t\t\t
\t   \t\t\tThemeDesigner.sendValue('<?= \$this->name ?>',JSON.stringify(objValue));
\t   \t\t\t
\t   \t\t\tif(last_file !== undefined)
\t   \t\t\t{
\t   \t\t\t \tthis.removeFile(last_file);
\t   \t\t\t}
\t   \t\t\t
\t   \t\t\tlast_file = file;
\t   \t\t\t//ThemeDesigner.apply();
\t   \t\t\t//jQuery(document).trigger('ThemeDesigner.onValue',{'name':'<?= \$this->name ?>','value':JSON.stringify(objValue)});
\t   \t\t}
\t\t}
\t});
\t
\t
\t/**
\t * Catch Switch event
\t */
\tjQuery('[data-name=\"<?= \$this->switch; ?>\"]').on('ThemeDesigner.onToggleSwitch',function(event,params)
\t{
\t\tif(params.status < 1)
\t\t{
\t\t\t // remove preview
\t\t\t uploader.removeAllFiles();
\t\t\t 
\t\t\t ThemeDesigner.sendValue('<?= \$this->selector; ?>',null);
\t\t}
\t});
});

/* ]]> */
</script>

<?php
// submit uploaded file to ThemeDesigner
if(\\Contao\\Input::post('field') == \$this->selector && \$_FILES[\$this->selector])
{
\t\$objThemeDesigner = new \\PCT\\ThemeDesigner;
\t\$objThemeDesigner->addUpload(\$this->selector,\$_FILES[\$this->selector]);
}

?>
<br class=\"clear\"></div>", "@pct_themer/themedesigner/forms/td_form_upload_dropzone.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/forms/td_form_upload_dropzone.html5");
    }
}
