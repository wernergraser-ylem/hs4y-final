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

/* @pct_customelements_plugin_customcatalog/backend/be_scripts.html5 */
class __TwigTemplate_55883ce6645f088d770eabef22e063b9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/backend/be_scripts.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/backend/be_scripts.html5"));

        // line 1
        yield "
<?php
/**
 * Backend panel helper scripts.
 */\t
\$objSession = \\Contao\\System::getContainer()->get('request_stack')->getSession();
\$strSession = \$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'];
\$arrSession = \$objSession->get(\$strSession);

\$objCC = \\PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\CustomCatalogFactory::fetchCurrent();
if( \$objCC === null )
{
\treturn '';
}
\$strTable = (\$objCC->mode == 'new' ? \$objCC->tableName : \$objCC->existingTable);
?>

<?php if( isset(\$arrSession[\$strSession][\$strTable]) && is_array(\$arrSession[\$strSession][\$strTable])): ?>
<script>
jQuery(document).ready(function() 
{

\t<?php foreach(\$arrSession[\$strSession][\$strTable] as \$strField => \$varValue): ?>
\tvar elem = jQuery('.tl_filter #<?= \$strField; ?>.tl_chosen');
\tvar chosen = jQuery('.tl_filter #<?= \$strField; ?>_chzn');
\tif( elem.length > 0 )
\t{
\t\t// remove the contao standard chosen
\t\tchosen.remove();
\t\telem.find('option[value=<?= \$varValue; ?>]').attr('selected',true);
\t\tvar chosen =  new Chosen(elem[0]);
\t}
\t<?php endforeach; ?>
});
</script>
<?php endif; ?>

<?php if(isset(\$arrSession[\$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'].'_search'][\$strTable]) && isset(\$arrSession[\$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'].'_search'][\$strTable]['value']) ): ?>
<script>
/**
 * Manipulate the backend search field for nonstandard fieldtypes
 */
window.addEvent('domready', function() 
{
\tvar elem = \$\$('.tl_search > input[name=tl_value]');
\tvar value = '<?php echo \$arrSession[\$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'].'_search'][\$strTable]['value'] ?? ''; ?>';
\tvar field = '<?php echo \$arrSession[\$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'].'_search'][\$strTable]['field'] ?? ''; ?>'
\tvar act_option = \$\$('.tl_search option[value=\"'+field+'\"]');
\tact_option.set('selected',1);
\t\$\$('.tl_search > .tl_select > span').set('text',act_option.get('text'));
\telem.set('value',value);
\telem.addClass('active');
\t\$\$('#main .tl_search .styled_select').addClass('active');
\t\$\$('select[name=tl_field]').addClass('active');
});\t
</script>
<?php endif; ?>
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
        return "@pct_customelements_plugin_customcatalog/backend/be_scripts.html5";
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
<?php
/**
 * Backend panel helper scripts.
 */\t
\$objSession = \\Contao\\System::getContainer()->get('request_stack')->getSession();
\$strSession = \$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'];
\$arrSession = \$objSession->get(\$strSession);

\$objCC = \\PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\CustomCatalogFactory::fetchCurrent();
if( \$objCC === null )
{
\treturn '';
}
\$strTable = (\$objCC->mode == 'new' ? \$objCC->tableName : \$objCC->existingTable);
?>

<?php if( isset(\$arrSession[\$strSession][\$strTable]) && is_array(\$arrSession[\$strSession][\$strTable])): ?>
<script>
jQuery(document).ready(function() 
{

\t<?php foreach(\$arrSession[\$strSession][\$strTable] as \$strField => \$varValue): ?>
\tvar elem = jQuery('.tl_filter #<?= \$strField; ?>.tl_chosen');
\tvar chosen = jQuery('.tl_filter #<?= \$strField; ?>_chzn');
\tif( elem.length > 0 )
\t{
\t\t// remove the contao standard chosen
\t\tchosen.remove();
\t\telem.find('option[value=<?= \$varValue; ?>]').attr('selected',true);
\t\tvar chosen =  new Chosen(elem[0]);
\t}
\t<?php endforeach; ?>
});
</script>
<?php endif; ?>

<?php if(isset(\$arrSession[\$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'].'_search'][\$strTable]) && isset(\$arrSession[\$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'].'_search'][\$strTable]['value']) ): ?>
<script>
/**
 * Manipulate the backend search field for nonstandard fieldtypes
 */
window.addEvent('domready', function() 
{
\tvar elem = \$\$('.tl_search > input[name=tl_value]');
\tvar value = '<?php echo \$arrSession[\$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'].'_search'][\$strTable]['value'] ?? ''; ?>';
\tvar field = '<?php echo \$arrSession[\$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'].'_search'][\$strTable]['field'] ?? ''; ?>'
\tvar act_option = \$\$('.tl_search option[value=\"'+field+'\"]');
\tact_option.set('selected',1);
\t\$\$('.tl_search > .tl_select > span').set('text',act_option.get('text'));
\telem.set('value',value);
\telem.addClass('active');
\t\$\$('#main .tl_search .styled_select').addClass('active');
\t\$\$('select[name=tl_field]').addClass('active');
});\t
</script>
<?php endif; ?>
", "@pct_customelements_plugin_customcatalog/backend/be_scripts.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/backend/be_scripts.html5");
    }
}
