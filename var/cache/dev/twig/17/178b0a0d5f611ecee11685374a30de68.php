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

/* @pct_themer/themedesigner/td_versions_form.html5 */
class __TwigTemplate_d3e1edce78abc13c7f3d0905f9220c46 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/td_versions_form.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/td_versions_form.html5"));

        // line 1
        yield "
<div class=\"pct_versions_toggler\"></div>

<form action=\"<?= \\Contao\\Environment::get('request'); ?>\" id=\"<?= \$this->formId ?>\" name=\"<?= \$this->formId ?>\" method=\"<?= \$this->method ?>\" novalidate>
\t<div class=\"formbody\">
\t<?php if (\$this->method != 'get'): ?>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formSubmit ?>\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
\t<?php endif; ?>
\t
\t<?= \$this->descriptionInput; ?>
\t<?= \$this->saveSubmit; ?>
\t<?= \$this->versionsSelect; ?>
\t</div>
</form>

\t
<?php if(\$this->submitOnChange): ?>

<?php \t
global \$objPage;
if(!\$objPage->hasJQuery)
{
\t\$GLOBALS['TL_JAVASCRIPT'][] = '//code.jquery.com/jquery-1.10.2.js';
}\t
?>
<script>
/* <![CDATA[ */
jQuery(document).ready(function() 
{
\t
\t// submit form when user selects a valid value
\tjQuery('#ctrl_<?=\$this->versionsSelectId; ?>').change(function(event)
\t{
\t\tif(event.target.value > 0 && event.target.value.length > 0)
\t\t{
\t\t\tjQuery(event.target).parents('form').submit();
\t\t}
\t\t// replace the placeholder in the input
\t\telse
\t\t{
\t\t\tjQuery('#ctrl_<?= \$this->descriptionInputId; ?>').attr('placeholder','<?= \$this->descriptionInputPlaceholder; ?>');
\t\t}\t\t
\t});
});

jQuery(document).ready(function()
{ 
\tjQuery('.pct_versions_toggler').click(function(){
\t\tjQuery('.pct_versions').toggleClass('pct_versions_show');
\t});
});

/* ]]> */
</script>

<?php endif; ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/td_versions_form.html5";
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
        return new Source("
<div class=\"pct_versions_toggler\"></div>

<form action=\"<?= \\Contao\\Environment::get('request'); ?>\" id=\"<?= \$this->formId ?>\" name=\"<?= \$this->formId ?>\" method=\"<?= \$this->method ?>\" novalidate>
\t<div class=\"formbody\">
\t<?php if (\$this->method != 'get'): ?>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formSubmit ?>\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
\t<?php endif; ?>
\t
\t<?= \$this->descriptionInput; ?>
\t<?= \$this->saveSubmit; ?>
\t<?= \$this->versionsSelect; ?>
\t</div>
</form>

\t
<?php if(\$this->submitOnChange): ?>

<?php \t
global \$objPage;
if(!\$objPage->hasJQuery)
{
\t\$GLOBALS['TL_JAVASCRIPT'][] = '//code.jquery.com/jquery-1.10.2.js';
}\t
?>
<script>
/* <![CDATA[ */
jQuery(document).ready(function() 
{
\t
\t// submit form when user selects a valid value
\tjQuery('#ctrl_<?=\$this->versionsSelectId; ?>').change(function(event)
\t{
\t\tif(event.target.value > 0 && event.target.value.length > 0)
\t\t{
\t\t\tjQuery(event.target).parents('form').submit();
\t\t}
\t\t// replace the placeholder in the input
\t\telse
\t\t{
\t\t\tjQuery('#ctrl_<?= \$this->descriptionInputId; ?>').attr('placeholder','<?= \$this->descriptionInputPlaceholder; ?>');
\t\t}\t\t
\t});
});

jQuery(document).ready(function()
{ 
\tjQuery('.pct_versions_toggler').click(function(){
\t\tjQuery('.pct_versions').toggleClass('pct_versions_show');
\t});
});

/* ]]> */
</script>

<?php endif; ?>", "@pct_themer/themedesigner/td_versions_form.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/td_versions_form.html5");
    }
}
