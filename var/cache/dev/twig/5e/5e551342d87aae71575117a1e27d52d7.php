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

/* @pct_customelements_plugin_customcatalog/filters/customcatalog_filter_countryselect.html5 */
class __TwigTemplate_b56582226f6e978a554e13cdde8cbfab extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_countryselect.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_countryselect.html5"));

        // line 1
        yield "<?php
/**
 * Country Select/Radio-Button filter template
 */
?>

<?php 
\$arrCountries = \\Contao\\System::getContainer()->get('contao.intl.countries')->getCountries();

\$arrBlankOption = array();
\$arrOptions = \$this->options;
// blank option
if( \$this->includeReset )
{
\t\$arrBlankOption = array(\$arrOptions[0]);
\tunset(\$arrOptions[0]);
}
\$tmp = array();
foreach(\$arrOptions as \$option)
{
\t\$search = array(\"Ä\",\"ä\",\"Ö\",\"ö\",\"Ü\",\"ü\",\"ß\",\"-\");
\t\$replace = array(\"Ae\",\"ae\",\"Oe\",\"oe\",\"Ue\",\"ue\",\"ss\",\" \");
\t\$k = \\str_replace(\$search,\$replace, \\Contao\\StringUtil::standardize( \$arrCountries[\$option['value']] ) );
\t\$tmp[\$k] = \$option;
}
\\ksort(\$tmp);
\$arrOptions = \$tmp;
unset(\$tmp);
// insert blank option
if( \$this->includeReset )
{
\t\\Contao\\ArrayUtil::arrayInsert(\$arrOptions,0,\$arrBlankOption);
}
?>

<?php if(\$this->radio): ?>
<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"radio_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<?php foreach(\$arrOptions  as \$option): ?>
\t<div>
\t\t<input type=\"radio\" id=\"opt_<?= \$option['id']; ?>\" class=\"radio\" name=\"<?php echo \$this->name; ?>\" value=\"<?php echo \$option['value']; ?>\" <?php if(\$option['selected']):?>checked<?php endif;?> >
\t\t<label id=\"lbl_<?php echo \$option['id']; ?>\" for=\"opt_<?php echo \$option['id']; ?>\"><?= \\Contao\\StringUtil::specialchars(\$option['label']); ?><?php if(\$option['id']): ?>(<?php echo \$this->countValue(\$option['value']); ?>)<?php endif; ?></label>
\t</div>
\t<?php endforeach; ?>
\t<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>\t
</div>
<?php else: ?>
<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"select_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<select name=\"<?php echo \$this->name; ?>\">
\t<?php foreach(\$arrOptions as \$option): ?>
\t<option value=\"<?php echo \$option['value']; ?>\"<?php if(\$option['selected']):?>selected<?php endif;?>><?php echo \$arrCountries[ \$option['value'] ] ?: \\Contao\\StringUtil::specialchars(\$option['label']); ?> <?php if(\$option['id']): ?>(<?php echo \$this->countValue(\$option['value']); ?>)<?php endif; ?></option>
\t<?php endforeach; ?>
\t</select>
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>\t
</div>
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
        return "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_countryselect.html5";
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
/**
 * Country Select/Radio-Button filter template
 */
?>

<?php 
\$arrCountries = \\Contao\\System::getContainer()->get('contao.intl.countries')->getCountries();

\$arrBlankOption = array();
\$arrOptions = \$this->options;
// blank option
if( \$this->includeReset )
{
\t\$arrBlankOption = array(\$arrOptions[0]);
\tunset(\$arrOptions[0]);
}
\$tmp = array();
foreach(\$arrOptions as \$option)
{
\t\$search = array(\"Ä\",\"ä\",\"Ö\",\"ö\",\"Ü\",\"ü\",\"ß\",\"-\");
\t\$replace = array(\"Ae\",\"ae\",\"Oe\",\"oe\",\"Ue\",\"ue\",\"ss\",\" \");
\t\$k = \\str_replace(\$search,\$replace, \\Contao\\StringUtil::standardize( \$arrCountries[\$option['value']] ) );
\t\$tmp[\$k] = \$option;
}
\\ksort(\$tmp);
\$arrOptions = \$tmp;
unset(\$tmp);
// insert blank option
if( \$this->includeReset )
{
\t\\Contao\\ArrayUtil::arrayInsert(\$arrOptions,0,\$arrBlankOption);
}
?>

<?php if(\$this->radio): ?>
<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"radio_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<?php foreach(\$arrOptions  as \$option): ?>
\t<div>
\t\t<input type=\"radio\" id=\"opt_<?= \$option['id']; ?>\" class=\"radio\" name=\"<?php echo \$this->name; ?>\" value=\"<?php echo \$option['value']; ?>\" <?php if(\$option['selected']):?>checked<?php endif;?> >
\t\t<label id=\"lbl_<?php echo \$option['id']; ?>\" for=\"opt_<?php echo \$option['id']; ?>\"><?= \\Contao\\StringUtil::specialchars(\$option['label']); ?><?php if(\$option['id']): ?>(<?php echo \$this->countValue(\$option['value']); ?>)<?php endif; ?></label>
\t</div>
\t<?php endforeach; ?>
\t<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>\t
</div>
<?php else: ?>
<div <?php echo \$this->cssID; ?> class=\"widget <?php echo \$this->class; ?> block\">
<fieldset class=\"select_container\">
\t<?php if(\$this->label): ?><legend><?php echo \$this->label; ?></legend><?php endif; ?>
\t<select name=\"<?php echo \$this->name; ?>\">
\t<?php foreach(\$arrOptions as \$option): ?>
\t<option value=\"<?php echo \$option['value']; ?>\"<?php if(\$option['selected']):?>selected<?php endif;?>><?php echo \$arrCountries[ \$option['value'] ] ?: \\Contao\\StringUtil::specialchars(\$option['label']); ?> <?php if(\$option['id']): ?>(<?php echo \$this->countValue(\$option['value']); ?>)<?php endif; ?></option>
\t<?php endforeach; ?>
\t</select>
</fieldset>
<?php if(\$this->description): ?><div class=\"description\"><?php echo \$this->description; ?></div><?php endif; ?>\t
</div>
<?php endif; ?>", "@pct_customelements_plugin_customcatalog/filters/customcatalog_filter_countryselect.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/filters/customcatalog_filter_countryselect.html5");
    }
}
