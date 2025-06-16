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

/* @pct_customelements_plugin_customcatalog/attributes/customelement_attr_rateit.html5 */
class __TwigTemplate_7a1745c495115c9d825f302a77e2a9bc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_rateit.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_rateit.html5"));

        // line 1
        yield "
<?php
/**
 * Custom elements RateIt attribute template
 */
?>

<?php
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/RateIt/assets/rateit/src/jquery.rateit.min.js|static';
\$GLOBALS['TL_CSS'][] = PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/RateIt/assets/rateit/src/rateit.css|static';
?>

<?php // options
\$steps = 0.5;
?>

<script>
/**
 * RateIt jquery star rating plugin
 * http://rateit.codeplex.com/
 * see http://www.radioactivethinking.com/rateit/example/example.htm for more options
 */
jQuery(document).ready(function()
{
\t// initialize rateit
\tjQuery('#<?php echo \$this->selector; ?>').rateit(
\t{
\t\tmin: <?php echo \$this->min_value ?? 1; ?>,
\t\tmax: <?php echo \$this->max_value ?? 5; ?>,
\t\tstep: <?php echo \$steps ?? 1; ?>,
\t\t//backingfld: '#<?php echo \$this->selector; ?>'
\t});

\t// bind an ajax request to the field
\t<?php if(\$this->votingIsAllowed): ?>
\tjQuery('#<?php echo \$this->selector; ?>').bind('rated reset',function(event)
\t{
\t\tvar elem = jQuery(this);
\t\tjQuery.ajax(
\t\t{
\t\t   url: document.location,
\t\t   data: {attr_id:elem.data('attr_id'), value:elem.rateit('value'), rateit:1, item_id:<?php echo \$this->activeRecord->id; ?>},
\t\t   type: 'GET',
\t\t   success: function(data)
\t\t   {
\t\t\t\tif(jQuery('#<?php echo \$this->selector; ?> .thankyou').length < 1)
\t\t\t\t{
\t\t\t\t\telem.attr('data-rateit-readonly',true);
\t\t\t\t\telem.attr('data-rateit-ispreset',true);
\t\t\t\t\telem.attr('data-rateit-value',elem.rateit('value'));
\t\t\t\t\t
\t\t\t\t\t//elem.unbind();
\t\t\t\t\tvar thankyou = elem.append('<p class=\"thankyou ajax_success\"><?php echo \$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC']['rateit']['thankyou']; ?></p>');
\t\t\t\t\tjQuery('#<?php echo \$this->selector; ?> .thankyou').hide().fadeIn();
\t\t\t\t}
\t\t\t}
\t\t});
\t});
\t<?php endif; ?>

\t// show value as number on hover
\tjQuery(\"#<?php echo \$this->selector; ?>\").bind('over', function (event,value) { jQuery(this).attr('title', value); });
});

</script>

<div class=\"widget rateit_container\">
\t<div class=\"counter\"><?php echo \$this->counter; ?></div>
\t<div id=\"<?php echo \$this->selector; ?>\" class=\"rateit\"
\t\tdata-attr_id=\"<?php echo \$this->id; ?>\"
\t\tdata-rateit-value=\"<?php echo \$this->value; ?>\"
\t\tdata-rateit-min=\"<?php echo \$this->min_value; ?>\"
\t\tdata-rateit-max=\"<?php echo \$this->max_value; ?>\"
\t\tdata-rateit-step=\"<?php echo \$steps; ?>\"
\t\t<?php if(!\$this->votingIsAllowed): ?>
\t\tdata-rateit-readonly=\"true\"
\t\tdata-rateit-ispreset=\"true\"
\t\t<?php endif; ?>
\t>
\t</div>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_rateit.html5";
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
 * Custom elements RateIt attribute template
 */
?>

<?php
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/RateIt/assets/rateit/src/jquery.rateit.min.js|static';
\$GLOBALS['TL_CSS'][] = PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/RateIt/assets/rateit/src/rateit.css|static';
?>

<?php // options
\$steps = 0.5;
?>

<script>
/**
 * RateIt jquery star rating plugin
 * http://rateit.codeplex.com/
 * see http://www.radioactivethinking.com/rateit/example/example.htm for more options
 */
jQuery(document).ready(function()
{
\t// initialize rateit
\tjQuery('#<?php echo \$this->selector; ?>').rateit(
\t{
\t\tmin: <?php echo \$this->min_value ?? 1; ?>,
\t\tmax: <?php echo \$this->max_value ?? 5; ?>,
\t\tstep: <?php echo \$steps ?? 1; ?>,
\t\t//backingfld: '#<?php echo \$this->selector; ?>'
\t});

\t// bind an ajax request to the field
\t<?php if(\$this->votingIsAllowed): ?>
\tjQuery('#<?php echo \$this->selector; ?>').bind('rated reset',function(event)
\t{
\t\tvar elem = jQuery(this);
\t\tjQuery.ajax(
\t\t{
\t\t   url: document.location,
\t\t   data: {attr_id:elem.data('attr_id'), value:elem.rateit('value'), rateit:1, item_id:<?php echo \$this->activeRecord->id; ?>},
\t\t   type: 'GET',
\t\t   success: function(data)
\t\t   {
\t\t\t\tif(jQuery('#<?php echo \$this->selector; ?> .thankyou').length < 1)
\t\t\t\t{
\t\t\t\t\telem.attr('data-rateit-readonly',true);
\t\t\t\t\telem.attr('data-rateit-ispreset',true);
\t\t\t\t\telem.attr('data-rateit-value',elem.rateit('value'));
\t\t\t\t\t
\t\t\t\t\t//elem.unbind();
\t\t\t\t\tvar thankyou = elem.append('<p class=\"thankyou ajax_success\"><?php echo \$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC']['rateit']['thankyou']; ?></p>');
\t\t\t\t\tjQuery('#<?php echo \$this->selector; ?> .thankyou').hide().fadeIn();
\t\t\t\t}
\t\t\t}
\t\t});
\t});
\t<?php endif; ?>

\t// show value as number on hover
\tjQuery(\"#<?php echo \$this->selector; ?>\").bind('over', function (event,value) { jQuery(this).attr('title', value); });
});

</script>

<div class=\"widget rateit_container\">
\t<div class=\"counter\"><?php echo \$this->counter; ?></div>
\t<div id=\"<?php echo \$this->selector; ?>\" class=\"rateit\"
\t\tdata-attr_id=\"<?php echo \$this->id; ?>\"
\t\tdata-rateit-value=\"<?php echo \$this->value; ?>\"
\t\tdata-rateit-min=\"<?php echo \$this->min_value; ?>\"
\t\tdata-rateit-max=\"<?php echo \$this->max_value; ?>\"
\t\tdata-rateit-step=\"<?php echo \$steps; ?>\"
\t\t<?php if(!\$this->votingIsAllowed): ?>
\t\tdata-rateit-readonly=\"true\"
\t\tdata-rateit-ispreset=\"true\"
\t\t<?php endif; ?>
\t>
\t</div>
</div>", "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_rateit.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/attributes/customelement_attr_rateit.html5");
    }
}
