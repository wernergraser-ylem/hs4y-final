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

/* @pct_themer/themedesigner/forms/td_form_textfield_slider.html5 */
class __TwigTemplate_757b780fb3b1949049d59581d321d57b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/forms/td_form_textfield_slider.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/forms/td_form_textfield_slider.html5"));

        // line 1
        yield "<div class=\"field_wrapper\">
<?php // include jquery ui
#\$GLOBALS['TL_CSS'][] = '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css';
\$GLOBALS['TL_CSS'][] = PCT_THEMER_PATH.'/assets/js/jquery/ui/jquery-ui.css';
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_THEMER_PATH.'/assets/js/jquery/ui/jquery-ui.min.js'; 


// field definition
\$arrField = \\PCT\\ThemeDesigner::findByName( \$this->selector );

// settings and values
\$min = \$arrField['eval']['min'] ?? 0;
\$max = \$arrField['eval']['max'] ?? 10;
\$steps = \$arrField['eval']['steps'] ?? 1;
\$value = \$arrField['default'] ?? 0;
\$isRange = \$arrField['range'] ?? false;

// apply current value
if(strlen(\$this->value) > 0)
{
\t\$value = \$this->value;
}

?>
<?php if(\$this->description):?>
<div class=\"description\">
\t<i class=\"fa fa-info\"></i>
\t<div class=\"description-content\">
\t\t<?= \$this->description; ?>
\t</div>
</div>
<?php endif; ?>
<div class=\"slider-input-wrapper\">
\t<?php if(\$this->label): ?><label for=\"<?= \$this->name; ?>\"><?= \$this->label; ?></label><?php endif; ?>
\t<input data-td_selector=\"<?= \$this->selector; ?>\" name=\"<?= \$this->name; ?>\" type=\"hidden\" id=\"slider-input_<?= \$this->name; ?>\" value=\"<?= \$value; ?>\">
\t<input type=\"number\" <?php if(\$min): ?>min=\"<?= \$min; ?>\"<?php endif; ?> <?php if(\$max): ?>max=\"<?= \$max; ?>\"<?php endif; ?> step=\"<?= \$steps; ?>\" id=\"slider-text_<?= \$this->name; ?>\">
</div>
<div id=\"slider-range_<?= \$this->selector; ?>\"></div>
<script>
/* <![CDATA[ */
jQuery(document).ready(function()
{
\tvar elem = jQuery('#slider-range_<?= \$this->selector; ?>');
\tvar text = jQuery('#slider-text_<?= \$this->selector; ?>');
\tvar input = jQuery('#slider-input_<?= \$this->selector; ?>');
\tvar updateDelay = 0;
\t
\tvar slider = elem.slider(
\t{
\t\tstep: <?= \$steps; ?>,
\t    max: <?= \$max; ?>,
\t\tmin: <?= \$min; ?>,
\t\t// range slider
\t\t<?php if(\$isRange):?>
\t\trange: true,
\t\tvalues: [<?= \$min; ?>, <?= \$max; ?>],
\t\t<?php else: ?>
\t\trange: 'min',
\t\tvalue: <?= \$value; ?>,
\t\t<?php endif; ?>
\t\t// update values on slide
\t    slide: function(event,ui)
\t\t{
\t\t\t// single value
\t\t\tif(ui.value)
\t\t\t{
\t\t   \t\ttext.val(ui.value);
\t\t   \t\tinput.val(ui.value);
\t\t\t}
\t
\t\t\t// range values
\t\t\tif(ui.values)
\t\t\t{
\t\t   \t\ttext.val(ui.values[0] + \" - \" + ui.values[1]);
\t\t   \t\tinput.val(ui.values[0] + \",\" + ui.values[1]);
\t\t   \t}
\t\t},
\t\tchange:function(event,ui)
\t\t{
\t\t\t// send value to ThemeDesigner 
\t\t \tThemeDesigner.sendValue('<?= \$this->selector; ?>',ui.value);
\t\t}

\t});
\t
\tvar intTimeout = 0
\t
\t// update slider on text input
\ttext.keyup(function(event) 
\t{
\t\tif(intTimeout > 0)
\t\t{
\t\t\tclearTimeout(intTimeout);
\t\t}
\t\t
\t\tvar value = event.target.value;
\t\tsetTimeout(function() 
\t\t{
\t\t\telem.slider(\"value\",value);
\t\t}, updateDelay);
\t});
\t
\t// update slider on numeric stepper
\ttext.change(function(event)
\t{
\t\tif(intTimeout > 0)
\t\t{
\t\t\tclearTimeout(intTimeout);
\t\t}
\t\t
\t\tvar value = event.target.value;
\t\tintTimeout = setTimeout(function() 
\t\t{
\t\t\telem.slider(\"value\",value);
\t\t}, updateDelay);
\t});
\t
\t<?php if(\$isRange):?>
\ttext.val(elem.slider(\"values\",0) + \" - \" + elem.slider(\"values\",1));
\tinput.val(elem.slider(\"values\",0) + \",\" + elem.slider(\"values\",1));
\t<?php else: ?>
\ttext.val(elem.slider(\"value\"));
\tinput.val(elem.slider(\"value\"));
\t<?php endif; ?>
\t
\t// catch onToggleSwitch event of the parent switch
\tjQuery('[data-init_switch=\"1\"][data-name=\"<?= \$this->switch; ?>\"]').on('ThemeDesigner.onToggleSwitch',function(event,params)
\t{
\t\tvar value = jQuery('#slider-input_<?= \$this->selector; ?>').val();
\t\tif(params.status < 1)
\t\t{
\t\t\tvalue = '';
\t\t}
\t\t
\t\t// send new value
\t\tThemeDesigner.sendValue('<?= \$this->selector; ?>',value);
\t});
\t
\t
\t/**
\t * Eventlistener: ThemeDesigner.onSelector
\t * triggered when the ThemeDesigner triggers a selector
\t * @param object\tThe jquery event object
\t * @param object\tThe parameter object
\t * 
\t * objParams:
\t * {name,value}
\t */
\tinput.on('ThemeDesigner.onSelector',function(event,objParams)
\t{
\t\tvar value = objParams.value;
\t\t
\t\ttext.val(value);
\t\ttext.trigger('change');\t\t
\t});
});
/* ]]> */
</script>
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
        return "@pct_themer/themedesigner/forms/td_form_textfield_slider.html5";
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
        return new Source("<div class=\"field_wrapper\">
<?php // include jquery ui
#\$GLOBALS['TL_CSS'][] = '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css';
\$GLOBALS['TL_CSS'][] = PCT_THEMER_PATH.'/assets/js/jquery/ui/jquery-ui.css';
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_THEMER_PATH.'/assets/js/jquery/ui/jquery-ui.min.js'; 


// field definition
\$arrField = \\PCT\\ThemeDesigner::findByName( \$this->selector );

// settings and values
\$min = \$arrField['eval']['min'] ?? 0;
\$max = \$arrField['eval']['max'] ?? 10;
\$steps = \$arrField['eval']['steps'] ?? 1;
\$value = \$arrField['default'] ?? 0;
\$isRange = \$arrField['range'] ?? false;

// apply current value
if(strlen(\$this->value) > 0)
{
\t\$value = \$this->value;
}

?>
<?php if(\$this->description):?>
<div class=\"description\">
\t<i class=\"fa fa-info\"></i>
\t<div class=\"description-content\">
\t\t<?= \$this->description; ?>
\t</div>
</div>
<?php endif; ?>
<div class=\"slider-input-wrapper\">
\t<?php if(\$this->label): ?><label for=\"<?= \$this->name; ?>\"><?= \$this->label; ?></label><?php endif; ?>
\t<input data-td_selector=\"<?= \$this->selector; ?>\" name=\"<?= \$this->name; ?>\" type=\"hidden\" id=\"slider-input_<?= \$this->name; ?>\" value=\"<?= \$value; ?>\">
\t<input type=\"number\" <?php if(\$min): ?>min=\"<?= \$min; ?>\"<?php endif; ?> <?php if(\$max): ?>max=\"<?= \$max; ?>\"<?php endif; ?> step=\"<?= \$steps; ?>\" id=\"slider-text_<?= \$this->name; ?>\">
</div>
<div id=\"slider-range_<?= \$this->selector; ?>\"></div>
<script>
/* <![CDATA[ */
jQuery(document).ready(function()
{
\tvar elem = jQuery('#slider-range_<?= \$this->selector; ?>');
\tvar text = jQuery('#slider-text_<?= \$this->selector; ?>');
\tvar input = jQuery('#slider-input_<?= \$this->selector; ?>');
\tvar updateDelay = 0;
\t
\tvar slider = elem.slider(
\t{
\t\tstep: <?= \$steps; ?>,
\t    max: <?= \$max; ?>,
\t\tmin: <?= \$min; ?>,
\t\t// range slider
\t\t<?php if(\$isRange):?>
\t\trange: true,
\t\tvalues: [<?= \$min; ?>, <?= \$max; ?>],
\t\t<?php else: ?>
\t\trange: 'min',
\t\tvalue: <?= \$value; ?>,
\t\t<?php endif; ?>
\t\t// update values on slide
\t    slide: function(event,ui)
\t\t{
\t\t\t// single value
\t\t\tif(ui.value)
\t\t\t{
\t\t   \t\ttext.val(ui.value);
\t\t   \t\tinput.val(ui.value);
\t\t\t}
\t
\t\t\t// range values
\t\t\tif(ui.values)
\t\t\t{
\t\t   \t\ttext.val(ui.values[0] + \" - \" + ui.values[1]);
\t\t   \t\tinput.val(ui.values[0] + \",\" + ui.values[1]);
\t\t   \t}
\t\t},
\t\tchange:function(event,ui)
\t\t{
\t\t\t// send value to ThemeDesigner 
\t\t \tThemeDesigner.sendValue('<?= \$this->selector; ?>',ui.value);
\t\t}

\t});
\t
\tvar intTimeout = 0
\t
\t// update slider on text input
\ttext.keyup(function(event) 
\t{
\t\tif(intTimeout > 0)
\t\t{
\t\t\tclearTimeout(intTimeout);
\t\t}
\t\t
\t\tvar value = event.target.value;
\t\tsetTimeout(function() 
\t\t{
\t\t\telem.slider(\"value\",value);
\t\t}, updateDelay);
\t});
\t
\t// update slider on numeric stepper
\ttext.change(function(event)
\t{
\t\tif(intTimeout > 0)
\t\t{
\t\t\tclearTimeout(intTimeout);
\t\t}
\t\t
\t\tvar value = event.target.value;
\t\tintTimeout = setTimeout(function() 
\t\t{
\t\t\telem.slider(\"value\",value);
\t\t}, updateDelay);
\t});
\t
\t<?php if(\$isRange):?>
\ttext.val(elem.slider(\"values\",0) + \" - \" + elem.slider(\"values\",1));
\tinput.val(elem.slider(\"values\",0) + \",\" + elem.slider(\"values\",1));
\t<?php else: ?>
\ttext.val(elem.slider(\"value\"));
\tinput.val(elem.slider(\"value\"));
\t<?php endif; ?>
\t
\t// catch onToggleSwitch event of the parent switch
\tjQuery('[data-init_switch=\"1\"][data-name=\"<?= \$this->switch; ?>\"]').on('ThemeDesigner.onToggleSwitch',function(event,params)
\t{
\t\tvar value = jQuery('#slider-input_<?= \$this->selector; ?>').val();
\t\tif(params.status < 1)
\t\t{
\t\t\tvalue = '';
\t\t}
\t\t
\t\t// send new value
\t\tThemeDesigner.sendValue('<?= \$this->selector; ?>',value);
\t});
\t
\t
\t/**
\t * Eventlistener: ThemeDesigner.onSelector
\t * triggered when the ThemeDesigner triggers a selector
\t * @param object\tThe jquery event object
\t * @param object\tThe parameter object
\t * 
\t * objParams:
\t * {name,value}
\t */
\tinput.on('ThemeDesigner.onSelector',function(event,objParams)
\t{
\t\tvar value = objParams.value;
\t\t
\t\ttext.val(value);
\t\ttext.trigger('change');\t\t
\t});
});
/* ]]> */
</script>
<br class=\"clear\"></div>", "@pct_themer/themedesigner/forms/td_form_textfield_slider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/forms/td_form_textfield_slider.html5");
    }
}
