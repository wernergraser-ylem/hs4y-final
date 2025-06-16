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

/* @pct_themer/themedesigner/js/js_themedesigner.html5 */
class __TwigTemplate_c9fab38a370b02257c390fed4a877a22 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/js/js_themedesigner.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/themedesigner/js/js_themedesigner.html5"));

        // line 1
        yield "<script>
/* <![CDATA[ */

/**
 * Class object
 * ThemeDesigner
 */
var ThemeDesigner = 
{
\t/**
\t * The current time stamp
\t * @var integer
\t */
\ttimestamp : <?= \$this->timestamp; ?>,
\t
\t/**
\t * The current theme name
\t * @var string
\t */
\ttheme : '<?= \$this->theme; ?>',

\t/**
\t * The current zoom level
\t * @var integer
\t */
\tzoom : <?= \$this->zoom ?: 100; ?>,

\t/**
\t * The current device
\t * @var string
\t */
\tdevice : '<?= \$this->device; ?>',
\t
\t/**
\t * Store pending ajax requests
\t * @var object
\t */
\tpending : {},\t
\t\t
\t/**
\t * Apply a form field value and send it via ajax
\t * @param string\tName of the field
\t * @param mixed\t\tValue of the field
\t * @param boolean\tSend ajax request or not
\t */
\tapplyValue : function(strName,varValue,blnAjax)
\t{
\t\tif(varValue === undefined) {varValue = null;}
\t\tif(blnAjax === undefined) {blnAjax = true;}
\t\t\t\t
\t\t// update the storage
\t\tThemeDesigner.storage(strName,varValue);
\t\t
\t\t// trigger global applyValue event
\t\t//jQuery(document).trigger('ThemeDesigner.onApplyValue',{'name':strName,'value':varValue,'action':'applyValue'});
\t\t
\t\tjQuery(document).trigger('ThemeDesigner.onValue',{'name':strName,'value':varValue,'action':'applyValue'});
\t\t
\t\t// send ajax
\t\tif(blnAjax)
\t\t{
\t\t\tthis.request('applyValue',{name:strName, value:varValue});
\t\t\t//this.request('applyValue',{name:strName, value:varValue});
\t\t}
\t},
\t
\t
\t/**
\t * Send a form field value via ajax without applying the stylesheet
\t * @param string\tName of the field
\t * @param mixed\t\tValue of the field
\t * @param boolean\tSend ajax request or not
\t */
\tsendValue : function(strName,varValue,blnAjax)
\t{
\t\tif(varValue === undefined) {varValue = null;}
\t\tif(blnAjax === undefined) {blnAjax = true;}
\t\t
\t\t// update the storage
\t\tThemeDesigner.storage(strName,varValue);
\t\t
\t\t// trigger global applyValue event
\t\tjQuery(document).trigger('ThemeDesigner.onValue',{'name':strName,'value':varValue,'action':'sendValue'});
\t\t
\t\t// send ajax
\t\tif(blnAjax)
\t\t{
\t\t\tthis.request('sendValue',{name:strName, value:varValue});
\t\t}
\t},
\t
\t
\t/**
\t * Apply multiple fields with their values
\t * @param object||array
\t *
\t * object {FIELD_NAME:VALUE} || array [FIELD_NAME] = VALUE
\t */
\tapplyValues : function(varSet)
\t{
\t\tobjSet = varSet;
\t\tif(isArray(varSet))
\t\t{
\t\t\t
\t\t}
\t\t
\t\tthis.request('applyValues',objSet);
\t},
\t
\t
\t/**
\t * Set a field value or elements value
\t * @param string
\t * @param mixed
\t * @param boolean
\t * @return mixed\t\tReturns the validated value
\t */
\tsetValue : function(strName,varValue,blnApply)
\t{
\t\tif(blnApply === undefined) {blnApply = false;}
\t\t
\t\tvar objElement = ThemeDesigner.findByName(strName);
\t\t
\t\tif(objElement === null)
\t\t{
\t\t\treturn;
\t\t}
\t\t
\t\t// validate the value
\t\tvarValue = ThemeDesigner.validateValueForInput(varValue);
\t\t
\t\t// set as new value
\t\tobjElement.val( varValue );
\t\t
\t\t// trigger event
\t\tobjElement.trigger('ThemeDesigner.onSetValue',{'name':strName,'value':varValue});
\t\t
\t\tif(blnApply === true)
\t\t{
\t\t\tthis.applyValue(strName,varValue);
\t\t}
\t\t
\t\treturn varValue;
\t},
\t
\t
\t/**
\t * Toggle the value of an element
\t * @param DOMElement
\t */
\ttoggleValue : function(objElement)
\t{
\t\tobjElement = jQuery(objElement);
\t\t// toggle checkbox values
\t\tswitch(objElement.attr('type'))
\t\t{
\t\t\tcase 'checkbox':
\t\t\t\tif(objElement.val() == 1)
\t\t\t\t{
\t\t\t\t\tobjElement.removeAttr('checked');
\t\t\t\t\tobjElement.val(0);
\t\t\t\t\tobjElement.prop('checked',false);
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\tobjElement.attr('checked');
\t\t\t\t\tobjElement.val(1);
\t\t\t\t\tobjElement.prop('checked',true);
\t\t\t\t}
\t\t\t\tbreak;
\t\t}
\t},
\t
\t
\t/**
\t * Find an element by its name and return as jquery object
\t * @param string\tName of the element
\t * @return object
\t */
\tfindByName : function(strName)
\t{
\t\tvar arrTests = ['[data-td_selector=\"'+strName+'\"]','[name=\"'+strName+'\"]','#'+strName];
\t\t
\t\tvar objReturn = null;
\t\tjQuery.each(arrTests, function(index,value)
\t\t{
\t\t\tobjReturn = jQuery(value);
\t\t\t
\t\t\t// break if we have a match
\t\t\tif(objReturn.length > 0)
\t\t\t{
\t\t\t\treturn false;
\t\t\t}
\t\t});
\t\t
\t\tif(objReturn.length < 1)
\t\t{
\t\t\treturn null;
\t\t}
\t\t
\t\treturn objReturn;
\t},
\t
\t
\t/**
\t * Add more attributes to an element
\t * @param DOMElement
\t */
\taddAttributes : function(objElement,objAttributes)
\t{
\t\tobjElement = jQuery(objElement);
\t\t
\t\tjQuery.each(objAttributes, function(i,v)
\t\t{
\t\t\tobjElement.attr(v);
\t\t});
\t},
\t
\t
\t/**
\t * Unbind events from element
\t * @param DOMElement
\t */
\tunbind : function(objElement)
\t{
\t\tobjElement.unbind('ThemeDesigner.onSelector');
\t\tobjElement.unbind('ThemeDesigner.onSetValue');
\t\t
\t\treturn objElement;
\t},
\t
\t
\t/**
\t * Apply the settings by reloading the current theme designer output stylesheet
\t */
\tapply : function()
\t{
\t\t// new timestamp
\t\tvar time = jQuery.now();
\t\t
\t\tvar curr_stylesheet = '<?= \$this->stylesheet; ?>'+'?'+ThemeDesigner.timestamp;
\t\tvar new_stylesheet = '<?= \$this->stylesheet; ?>'+'?'+time;
\t\t
\t\t// apply stylesheet
\t\tjQuery('head link#layout_css').attr('href',new_stylesheet);
\t\t
\t\t// apply stylesheet in iframe
\t\tjQuery('#themedesigner_iframe').contents().find('link#layout_css').attr('href',new_stylesheet);
\t\t
\t\t// send info
\t\tconsole.log('New stylesheet applied by ThemeDesigner: '+new_stylesheet);
\t\t
\t\t// remember timestamp
\t\tThemeDesigner.timestamp = time;
\t}
}

// TODO: !LocalStorage management

/**
 * LocalStorage management
 * @param string\tName of the field
 * @param mixed\t\tValue of the field
 * @param string\tName of the current theme
 */
ThemeDesigner.storage = function(strName,varValue,strTheme)
{
\tif(strName === undefined) {strName = '';}
\t
\tif(strTheme === undefined || strTheme == '')
\t{
\t\tstrTheme = ThemeDesigner.theme;
\t}
\t
\tvar strIdent = 'ThemeDesigner_'+strTheme;
\t\t
\tif(strName.length < 1 && varValue === undefined)
\t{
\t\tvar arrKeys = Object.keys(localStorage);
\t\tvar arrReturn = {};
\t\tfor(var i = 0; i <= arrKeys.length; i++)
\t\t{
\t\t\tvar key = arrKeys[i];
\t\t\tif(key == undefined)
\t\t\t{
\t\t\t\tcontinue;
\t\t\t}
\t\t\t
\t\t\tif(key.indexOf(strIdent+'.') >= 0)
\t\t\t{
\t\t\t\tvar k = key.replace(strIdent+'.','');
\t\t\t\t
\t\t\t\t// recursivly find the value
\t\t\t\tarrReturn[k] = ThemeDesigner.storage(k);
\t\t\t}
\t\t}
\t\treturn arrReturn;
\t}
\t
\t// set value
\tif(strName !== '' && varValue !== undefined)
\t{
\t\tlocalStorage.setItem(strIdent+'.'+strName,varValue);
\t}
\t// get a value
\telse if(strName.length > 0 && varValue == undefined)
\t{
\t\tvar varReturn = localStorage.getItem(strIdent+'.'+strName);
\t\ttry 
\t\t{
\t\t\tvarReturn = jQuery.parseJSON(varReturn);
\t\t}
\t\tcatch(err) {}
\t\t
\t\treturn varReturn;
\t}
}


/**
 * Remove from storage
 * @param string\tName of the field
 */
ThemeDesigner.removeFromStorage = function(strName,strTheme)
{
\tif(strTheme === undefined || strTheme == '')
\t{
\t\tstrTheme = ThemeDesigner.theme;
\t}
\t
\tvar strIdent = 'ThemeDesigner_'+strTheme;
\t
\t<?php if(\\Contao\\Config::get('debugMode')):?>
\tconsole.log('Remove '+strName+' from storage');
\t<?php endif; ?>\t
\tlocalStorage.removeItem(strIdent+'.'+strName);
}


/**
 * Clear the localStorage
 */
ThemeDesigner.clearStorage = function(strTheme)
{
\tif(strTheme === undefined || strTheme == '')
\t{
\t\tstrTheme = ThemeDesigner.theme;
\t}
\t
\tvar strIdent = 'ThemeDesigner_'+strTheme;
\t
\tvar arrKeys = Object.keys(localStorage);
\t
\tvar count = 0;
\tfor(var i = 0; i <= arrKeys.length; i++)
\t{
\t\tvar key = arrKeys[i];
\t\tif(key == undefined)
\t\t{
\t\t\tcontinue;
\t\t}
\t\t
\t\tif(key.indexOf(strIdent+'.') >= 0)
\t\t{
\t\t\tlocalStorage.removeItem(key);
\t\t\tcount++;
\t\t}
\t}
\tconsole.log('ThemeDesigner ['+strTheme+'] storage cleared. Items removed: '+count);
}


/**
 * Loading overlay
 * @param string\t'show'||'hide'
 */
ThemeDesigner.loader = function(strAction)
{
\tvar objLoader = jQuery('#themedesigner_loader');
\tif(objLoader.length < 1)
\t{
\t\treturn;
\t}
\t
\tif(strAction == 'isActive')
\t{
\t\treturn objLoader.hasClass('active');
\t}
\t
\tif(strAction == 'hide')
\t{
\t\tobjLoader.removeClass('active');
\t}
\telse if(strAction == 'show')
\t{
\t\tobjLoader.addClass('active');
\t}
}


/**
 * Request handlers
 * @param string\tThe request action identifier
 * @param object\tAn optional object to pass variables through
 * @return object\tThe jquery ajax request object
 *
 * objOptions = {}
 * objOptions.name \t\tName of the field
 * objOptions.value\t\tValue of the field
 */
ThemeDesigner.request = function(strAction,objOptions)
{
\tif(objOptions === undefined)
\t{
\t\tobjOptions = {};
\t}
\t
\tvar strUrl = '<?= \$GLOBALS['PCT_THEMEDESIGNER']['ajaxUrl']; ?>';
\tif(!strUrl)
\t{
\t\tstrUrl = location.href;
\t}
\t
\tvar objData = {};
\tobjData.themedesigner = 1;
\tobjData.action = strAction;
\tobjData.theme = ThemeDesigner.theme;
\t
\tvar blnApply = true;
\tif(objOptions.doNotApply === true)
\t{
\t\tblnApply = false;
\t}
\t
\tvar blnLoader = false;
\tif(objOptions.loader === true)
\t{
\t\tblnLoader = true;
\t}
\t
\tswitch(strAction)
\t{
\t\t// single field value call
\t\tcase 'applyValue':
\t\t\tobjData.field = objOptions.name;
\t\t\tobjData.value = objOptions.value;
\t\t\tbreak;
\t\t// multiple fields and values call
\t\tcase 'applyValues':
\t\t\tobjData.fields = fields;
\t\t\tobjData.values = values;
\t\t\tbreak;
\t\t// just send a value without applying the new stylesheet
\t\tcase 'sendValue':
\t\t\tobjData.field = objOptions.name;
\t\t\tobjData.value = objOptions.value;
\t\t\t
\t\t\tblnApply = false;
\t\t\tblnLoader = false;
\t\t\t
\t\t\t// check if a similar request is still pending
\t\t\tif(ThemeDesigner.pending['action=sendValue&field='+objData.field+'&value='+objData.value])
\t\t\t{
\t\t\t\treturn;
\t\t\t}
\t\t\t
\t\t\tbreak;
\t\t// show section
\t\tcase 'showSection':
\t\t\tobjData.section = objOptions.section;
\t\t\tbreak;
\t\t// toggle palette
\t\tcase 'togglePalette':
\t\t\tobjData.section = objOptions.section;
\t\t\tobjData.palette = objOptions.palette;
\t\t\tobjData.active = objOptions.active
\t\t\tbreak;\t
\t\t// toggle switcjh
\t\tcase 'toggleSwitch':
\t\t\tobjData.name = objOptions.name;
\t\t\tobjData.active = objOptions.active
\t\t\tbreak;
\t\t// toggle multiple switches
\t\tcase 'toggleSwitches':
\t\t\tobjData.switches = objOptions.switches
\t\t\tbreak;
\t\tcase 'toggleVisibility':
\t\tcase 'toggleMobile':
\t\t\tobjData.state = objOptions.active;
\t\t\tbreak;
\t\t// toggle device
\t\tcase 'toggleDevice':
\t\t\tobjData.value = objOptions.value
\t\t\tbreak;
\t\t// toggle zoom
\t\tcase 'toggleZoom':
\t\t\tobjData.value = objOptions.value;
\t\t\tbreak;
\t\t// iframe url
\t\tcase 'updateIframeUrl':
\t\t\tobjData.url = objOptions.url;
\t\t\tbreak;
\t}
\t
\t// write request string
\tvar strRequest = jQuery.param(objData);
\t
\t// check if a similar request is still pending
\tif(ThemeDesigner.pending[strRequest] === true)
\t{
\t\treturn;
\t}
\t
\t// send request
\tvar objRequest = jQuery.ajax(
\t{
\t\tmethod\t: \"GET\",
\t\turl\t\t: strUrl,
\t\tdata\t: objData,
\t\t// before sending
\t\tbeforeSend : function()
\t\t{
\t\t\t// set request as pending
\t\t\tThemeDesigner.pending[strRequest] = true;
\t\t\t
\t\t\tif(blnLoader)
\t\t\t{
\t\t\t\t// show loader
\t\t\t\tThemeDesigner.loader('show');
\t\t\t}
\t\t},
\t\t// success
\t\tsuccess\t: function(response)
\t\t{
\t\t\tif(blnApply)
\t\t\t{
\t\t\t\t// all good. Apply
\t\t\t\tThemeDesigner.apply();
\t\t\t}
\t\t\t
\t\t\tif(blnLoader)
\t\t\t{
\t\t\t\t// remove loader
\t\t\t\tThemeDesigner.loader('hide');
\t\t\t}
\t\t\t
\t\t\t// trigger complete event and pass the whole data object as parameter
\t\t\tjQuery(document).trigger('ThemeDesigner.ajax_complete',objData);
\t\t},
\t\t// complete
\t\tcomplete: function()
\t\t{
\t\t\tThemeDesigner.pending[strRequest] = false;
\t\t},
\t\t// error 
\t\terror\t: function(response)
\t\t{
\t\t\t<?php if(\\Contao\\Config::get('debugMode')): ?>
\t\t\tconsole.log('AJAX ERROR: '+ response);
\t\t\t<?php endif; ?>
\t\t} 
\t});
\t
\treturn objRequest;
}


/**
 * Selector logic
 * @param string\tName of the vield
 * @param mixed\t\tValue of the field
 * @param object\tJson object with effected fields and values
 */
ThemeDesigner.selector = function(strName,varValue,objEffected)
{
\tif(objEffected === undefined) {objEffected = {};}
\t
\tvar objElement = ThemeDesigner.findByName(strName);
\tif(objElement === null)
\t{
\t\treturn;
\t}
\t
\t// return if value is uninteresting
\tif(objElement.val() != varValue)
\t{
\t\treturn;
\t}
\t
\t
\t// json string is coming
\tif(typeof(objEffected) == 'string')
\t{
\t\tobjEffected = jQuery.parseJSON(objEffected);
\t}
\t
\tjQuery.each(objEffected, function(name, value)
\t{
\t\tvar element = ThemeDesigner.findByName(name);
\t\tif(element === null)
\t\t{
\t\t\treturn true;
\t\t}

\t\tvalue = ThemeDesigner.setValue(name,value);
\t\t
\t\t// trigger onSelector event
\t\telement.trigger('ThemeDesigner.onSelector',{'name':name,'value':value,'selector':strName,'selector_value':varValue});
\t} );
\t
\t<?php if(\\Contao\\Config::get('debugMode')): ?>
\tconsole.log('SELECTOR: ' + strName + \".\"+varValue);
\t<?php endif; ?>
}


/**
 * Shortcut to ThemeDesigner toggle visibilty
 * @param string\tName of the section
 * @param string\tName of the palette
 * @param integer\tActive status 0=false, 1=true
 */
ThemeDesigner.toggleVisibility = function(intStatus)
{
\tThemeDesigner.request('toggleVisibility',{active:intStatus,doNotApply:true});
}


/**
 * Shortcut to ThemeDesigner show palette request
 * @param string\tName of the section
 * @param string\tName of the palette
 * @param integer\tActive status 0=false, 1=true
 */
ThemeDesigner.togglePalette = function(strSection,strPalette,intStatus)
{
\tThemeDesigner.request('togglePalette',{section:strSection,palette:strPalette,active:intStatus,doNotApply:true});
}


/**
 * Shortcurt to ThemeDesigner toggle ON/OFF switch request
 * @param string\tName of the switch
 * @param integer\tActive status 0=false, 1=true
 * @param boolean\tShow loader 0=false, 1=true
 */
ThemeDesigner.toggleSwitch = function(strSwitch,intStatus,blnLoader)
{
\tif(blnLoader === undefined) {blnLoader == false;}
\t
\t// trigger onToggleSwitch event
\tjQuery('[data-init_switch=\"1\"][data-name=\"'+strSwitch+'\"]').trigger('ThemeDesigner.onToggleSwitch',{'name':strSwitch,'status':intStatus});
\t
\t// trigger global onToggleSwitch event
\tjQuery(document).trigger('ThemeDesigner.onToggleSwitch',{'name':strSwitch,'status':intStatus});
\t
\tThemeDesigner.request('toggleSwitch',{name:strSwitch,active:intStatus,doNotApply:true,loader:blnLoader});
}


/**
 * Shortcut to ThemeDesigner toggle multiple switches request
 * @param object
 * @param boolean\tShow loader 0=false, 1=tru
 */
ThemeDesigner.toggleSwitches = function(objSwitches,blnLoader)
{
\tif(objSwitches === undefined) {objSwitches = {};}
\tif(blnLoader === undefined) {blnLoader == false;}
\t
\tjQuery.each( objSwitches, function(strSwitch, intStatus)
\t{
\t\tvar objSwitch = jQuery('[data-switch=\"'+strSwitch+'\"]');
\t\t
\t\tif(objSwitch !== undefined)
\t\t{
\t\t\t// trigger onToggleSwitch event
\t\t\tobjSwitch.trigger('ThemeDesigner.onToggleSwitch',{'name':strSwitch,'status':intStatus});
\t\t
\t\t\t// trigger global onToggleSwitch event
\t\t\tjQuery(document).trigger('ThemeDesigner.onToggleSwitch',{'name':strSwitch,'status':intStatus});
\t\t}
\t});
\t
\tThemeDesigner.request('toggleSwitches',{switches:objSwitches,doNotApply:true,loader:blnLoader});
}


/**
 * Toggle mobile view port request
 */
ThemeDesigner.toggleMobile = function(intStatus)
{
\tThemeDesigner.request('toggleMobile',{active:intStatus,doNotApply:true});
}


/**
 * Toggle device request
 */
ThemeDesigner.toggleDevice = function(varValue)
{
\t// hide all fields not part of the current device selected
\tvar objElements = jQuery('[data-devices]:not([data-devices=\"\"]):not([data-devices=\"*\"])');
\t
\tjQuery.each( objElements, function(intIndex,objElement)
\t{
\t\tobjElement = jQuery(objElement);
\t\tvar devices = objElement.data('devices').split(',');
\t\t
\t\tif( jQuery.inArray(varValue,devices) >= 0 )
\t\t{
\t\t\tobjElement.show();
\t\t\t// remove hidden classes
\t\t\tobjElement.removeClass('hidden');
\t\t}
\t\telse
\t\t{
\t\t\tobjElement.hide();
\t\t}
\t});
\t
\t// trigger global onDevice event
\tjQuery(document).trigger('ThemeDesigner.onDevice',{'name':varValue});

\tThemeDesigner.request('toggleDevice',{value:varValue,doNotApply:true});
}


/**
 * Toggle zoom request
 */
ThemeDesigner.toggleZoom = function(varValue)
{
\tThemeDesigner.request('toggleZoom',{value:varValue,doNotApply:true});
}


/**
 * Validate or convert a value to use as value in an input
 * @param mixed
 * @param string
 */
ThemeDesigner.validateValueForInput = function(varValue,strName)
{
\tif(strName === undefined) {strName = '';}
\t
\tvar objElement = null;
\tif(strName.length > 0)
\t{
\t\tobjElement = jQuery('[data-td_selector=\"'+strName+'\"]');
\t}
\t
\treturn varValue;
}

// TODO: !ThemeDesignerNavigation

/**
 * ThemeDesigner Navigation class object
 */
var ThemeDesignerNavigation = 
{
\t/**
\t * Toggle active sections
\t * @param name
\t */
\tshowSection(strSection)
\t{
\t\t// send request
\t\tThemeDesigner.request('showSection',{section:strSection,doNotApply:true});
\t\t
\t\tjQuery('.pct_themedesigner .section').removeClass('active');
\t\tjQuery('.pct_themedesigner .section[data-section=\"'+strSection+'\"]').addClass('active');
\t}
}

// TODO: !ThemeDesignerIframe

/**
 * ThemeDesigner iframe class object
 */
var ThemeDesignerIframe = 
{
\tresize : function()
\t{
\t\tvar height = jQuery(window).innerHeight() - jQuery('#themedesigner_iframe_wrapper').position(window).top - 60;
\t\tvar width = jQuery(window).innerWidth() - jQuery('#themedesigner_iframe_wrapper').position(window).left - 255;
\t\tjQuery('#themedesigner_iframe').css({'height':height,'width':width});
\t}
}


/**
 * Clear local storage on page load
 */
<?php if(!\\Contao\\Environment::get('isAjaxRequest')):?>
ThemeDesigner.clearStorage();
<?php endif; ?>

/**
 * Fill the local storage with current php data
 */
<?php 
\$objThemeDesigner = new \\PCT\\ThemeDesigner;
\$arrFonts = \$objThemeDesigner->getFonts();
\$arrData = \$objThemeDesigner->getData(true);
?>

<?php foreach(\$arrData as \$key => \$value): ?>
<?php 
if(is_array(\$value) || is_object(\$value))
{
\t\$value =  \"'\".json_encode(\$value).\"'\";
}

// fonts
else if( isset(\$arrFonts[\$value]) && is_array(\$arrFonts[\$value]) && empty(\$arrFonts[\$value]) === false )
{
\t\$value = \"'\".\$value.\"'\";
\tif(isset(\$arrFonts[\$value]['family']) && strlen(\$arrFonts[\$value]['family']) > 0)
\t{
\t\t#\$value = str_replace('\"',\"'\",\$arrFonts[\$value]['family']);
\t\t\$value = \$arrFonts[\$value]['family'];
\t}
}
else
{
\t\$value = \"'\".\$value.\"'\";
}
?>
// fill storage
ThemeDesigner.storage('<?= \$key; ?>',<?= \$value; ?>);
<?php endforeach; ?>\t


/**
 * Remove items from storage when switch has been turned off
 */
jQuery(document).on('ThemeDesigner.onToggleSwitch',function(event,params)
{
\tif(params.status < 1)
\t{
\t\tThemeDesigner.removeFromStorage(params.name);
\t}
});


/**
 * Append the little save info star when user changed something
 */
var blnUserChangedSomething = false;
jQuery(document).on('ThemeDesigner.onValue',function(event,params)
{
\tif(blnUserChangedSomething === false)
\t{
\t\tblnUserChangedSomething = true;
\t\tvar txt = jQuery('#ctrl_themedesigner_version_description').attr('placeholder');
\t\tif(txt !== undefined)
\t\t{
\t\t\tjQuery('#ctrl_themedesigner_version_description').attr('placeholder', txt.replace('*','') + '*');
\t\t}
\t}
});

// TODO: !Switch dependencies

<?php if(is_array(\$GLOBALS['PCT_THEMEDESIGNER_SWITCHES']) && count(\$GLOBALS['PCT_THEMEDESIGNER_SWITCHES']) > 0): ?>
jQuery(document).ready(function()
{
\t<?php foreach(\$GLOBALS['PCT_THEMEDESIGNER_SWITCHES'] as \$strSwitch => \$arrStatus): ?>
\t
\t// register switch eventlistener
\tvar objSwitch = jQuery('[data-switch=\"<?= \$strSwitch; ?>\"]');
\tif(objSwitch !== undefined)
\t{
\t\tobjSwitch.on('ThemeDesigner.onToggleSwitch',function(event,params)
\t\t{
\t\t\t<?php foreach(\$arrStatus as \$intStatus => \$arrEffected): ?>
\t\t\tvar objEffected = <?= json_encode(\$arrEffected); ?>;
\t\t\t
\t\t\t// run action by status
\t\t\tif(params.status == <?= \$intStatus; ?> && objEffected !== undefined)
\t\t\t{
\t\t\t\t// circle through effected switches an toggle their state
\t\t\t\tfor(var key in objEffected)
\t\t\t\t{
\t\t\t\t\tvar value = objEffected[key];
\t\t\t\t\t
\t\t\t\t\tvar objElement = jQuery('[data-switch=\"'+key+'\"]');
\t\t\t\t\tif(!objElement || objElement === undefined)
\t\t\t\t\t{
\t\t\t\t\t\tcontinue;
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\tvar isActive = objElement.hasClass('active');
\t\t\t\t\t
\t\t\t\t\tif(value > 0 && !isActive)
\t\t\t\t\t{
\t\t\t\t\t\tobjElement.addClass('active');
\t\t\t\t\t\tobjElement.parent('li.field').addClass('active');
\t\t\t\t\t\t
\t\t\t\t\t\t// switch childs
\t\t\t\t\t\tobjElement.parent('li.field').siblings('.switch_childs').addClass('active');
\t\t\t\t\t}
\t\t\t\t\telse if(value < 1 && isActive)
\t\t\t\t\t{
\t\t\t\t\t\tobjElement.removeClass('active');
\t\t\t\t\t\tobjElement.parent('li.field').removeClass('active');
\t\t\t\t\t\t
\t\t\t\t\t\t// switch childs
\t\t\t\t\t\tobjElement.parent('li.field').siblings('.switch_childs').removeClass('active');
\t\t\t\t\t}
\t\t\t\t\t// state is already correct, delete the switch from the effected ones
\t\t\t\t\telse
\t\t\t\t\t{
\t\t\t\t\t\tdelete objEffected[key];
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\t// send the toggleSwitch request for the effected switches
\t\t\t\t\t//ThemeDesigner.toggleSwitch( key, value );
\t\t\t\t}
\t\t\t\t
\t\t\t\t// send the toggleSwitches request for the effected switches
\t\t\t\tThemeDesigner.toggleSwitches( objEffected );\t
\t\t\t}
\t\t\t
\t\t\t<?php endforeach; ?>
\t\t});
\t}
\t
\t<?php endforeach; ?>
});
<?php endif; ?>


// TODO: !-- ThemeDesigner Interactions

// TODO: !Minify

/**
 * Minify toggler
 */
jQuery(document).ready(function() 
{
\tjQuery('#themedesigner_toggler').click(function(event) 
\t{
\t\t// prevent default behavior. good for real anchors
\t\tevent.preventDefault();
\t\t
\t\tjQuery(this).toggleClass('active');
\t\tjQuery('body').toggleClass('themedesigner_minified');
\t\t
\t\tvar isActive = 0;
\t\tif( jQuery(this).hasClass('active') )
\t\t{
\t\t\tisActive = 1;
\t\t}
\t\t
\t\t// send toggle visibility
\t\tThemeDesigner.toggleVisibility( isActive );
\t});
});

// TODO: !Palettes

/**
 * Palette toggler
 */
jQuery(document).ready(function() 
{
\tjQuery('[data-init_slider=\"1\"] .td_toggler').click(function(event) 
\t{
\t\t// prevent default behavior. good for real anchors
\t\tevent.preventDefault();
\t\t
\t\tjQuery(this).toggleClass('active');
\t\tvar _parent = jQuery(this).parent('[data-init_slider=\"1\"]');
\t\t_parent.toggleClass('active');
\t\t_parent.find('.td_palette').toggleClass('active');
\t\t
\t\tvar isActive = 0;
\t\tif( jQuery(this).hasClass('active') )
\t\t{
\t\t\tisActive = 1;
\t\t}
\t\t
\t\t// send toggle palette request
\t\tThemeDesigner.togglePalette( _parent.data('section'), _parent.data('palette'), isActive );
\t});
});

// TODO: !Switches

/**
 * On/Off switches
 */
jQuery(document).ready(function() 
{
\tjQuery('[data-init_switch=\"1\"]').click(function(event) 
\t{
\t\t// prevent default behavior. good for real anchors
\t\tevent.preventDefault();
\t\t
\t\tjQuery(this).toggleClass('active');
\t\t
\t\t
\t\tvar _parent = jQuery(this).parent('li.field').toggleClass('active');
\t\t
\t\t// switch childs
\t\t_parent.siblings('.switch_childs').toggleClass('active');
\t\t
\t\tvar isActive = 0;
\t\tif( jQuery(this).hasClass('active') )
\t\t{
\t\t\tisActive = 1;
\t\t}
\t\t
\t\t// send toggle palette request
\t\tThemeDesigner.toggleSwitch( jQuery(this).data('name'), isActive );
\t});
});

// TODO: !Mobile view

/**
 * Mobile view
 */
jQuery(document).ready(function() 
{
\tjQuery('#themedesigner_mobile').click(function(event) 
\t{
\t\tjQuery('body').toggleClass('themedesigner_mobile');
\t\tjQuery('#themedesigner_iframe_wrapper').toggleClass('mobile');
\t\tjQuery('#themedesigner_iframe').contents().find('body').toggleClass('mobile themedesigner_mobile');
\t\t
\t\t// send request
\t\tvar isActive = 0;
\t\tif(jQuery('body').hasClass('themedesigner_mobile'))
\t\t{
\t\t\tisActive = 1
\t\t}
\t\t
\t\tThemeDesigner.toggleMobile( isActive );
\t});
});

// TODO: !Device switch

/**
 * Device switch
 */
jQuery(document).ready(function() 
{
\tvar prevDevice = ThemeDesigner.device;
\t
\tjQuery('#device_and_zoom .devices li').click(function(event) 
\t{
\t\tevent.preventDefault();
\t\t
\t\t// remove prev active
\t\tjQuery('#device_and_zoom .devices li').removeClass('active');
\t\tjQuery(this).toggleClass('active');

\t\tvalue = jQuery(this).data('value');
\t\t
\t\t// remove old classes 
\t\tif( prevDevice.length > 0)
\t\t{
\t\t\tjQuery('body').removeClass('themedesigner_'+prevDevice);
\t\t\tjQuery('#themedesigner_iframe_wrapper').removeClass( prevDevice );
\t\t\tjQuery('#themedesigner_iframe').contents().find('body').removeClass(prevDevice + ' themedesigner_' + prevDevice);
\t\t}
\t\t
\t\t// apply new class
\t\tjQuery('body').addClass('themedesigner_'+value);
\t\tjQuery('#themedesigner_iframe_wrapper').addClass( value );
\t\tjQuery('#themedesigner_iframe').contents().find('body').addClass(value + ' themedesigner_' + value);
\t\t// update
\t\tprevDevice = value;

\t\tThemeDesigner.toggleDevice( value );
\t});
});


// TODO: !Zoom switch

/**
 * Zoom switch
 */
jQuery(document).ready(function() 
{
\tvar prevZoomClass = 'zoom_'+ThemeDesigner.zoom;
\t
\tjQuery('#device_and_zoom .zoom li').click(function(event) 
\t{
\t\tevent.preventDefault();
\t\tjQuery('#device_and_zoom .zoom li').removeClass('active');
\t\tjQuery(this).toggleClass('active');

\t\tvalue = jQuery(this).data('value');
\t\t
\t\t// remove old classes 
\t\tif( prevZoomClass.length > 0)
\t\t{
\t\t\tjQuery('body').removeClass(prevZoomClass);
\t\t\tjQuery('#themedesigner_iframe_wrapper').removeClass(prevZoomClass);
\t\t\tjQuery('#themedesigner_iframe').contents().find('body').removeClass(prevZoomClass);
\t\t}
\t\t
\t\tvar cssClass = 'zoom_'+value;
\t\t// apply new class
\t\tjQuery('body').addClass(cssClass);
\t\tjQuery('#themedesigner_iframe_wrapper').addClass(cssClass);
\t\tjQuery('#themedesigner_iframe').contents().find('body').addClass(cssClass);
\t\t// update
\t\tprevZoomClass = cssClass;
\t\t
\t\tThemeDesigner.toggleZoom( value );
\t});
});

// TODO: !Navi

/**
 * Navi script
 */
jQuery(document).ready(function() 
{
\tvar last = null;
\tjQuery('.pct_navigation span[data-clickable=\"1\"]').click(function(event)
\t{
\t\t// prevent default behavior. good for real anchors
\t\tevent.preventDefault();
\t\t
\t\tif(last == this)
\t\t{
\t\t\treturn false;
\t\t}
\t\t
\t\t// remove any active
\t\tjQuery('.pct_navigation span, .pct_navigation li').removeClass('active');
\t\t
\t\t// set active
\t\tjQuery(this).parent('li').addClass('active');
\t\tjQuery(this).addClass('active');
\t\t
\t\t// send show section request
\t\tThemeDesignerNavigation.showSection( jQuery(this).data('section') );
\t\t
\t\t// remember last one clicked
\t\tlast = this;
\t});
});

// TODO: !RevolutionSlider Helper

/**
 * Force the themedesigner iframe to reload on switching devices when it contains a slider instance
 */
jQuery(document).bind('ThemeDesigner.onDevice',function(e,params) 
{
\tif( jQuery(\"#themedesigner_iframe\").contents().find('.rs-container').length > 0 )
\t{
\t\tjQuery('#themedesigner_iframe_wrapper .inner .loader').addClass('show');
\t\tjQuery(\"#themedesigner_iframe\").attr('src', jQuery(\"#themedesigner_iframe\").attr('src'));
\t}
});

/* ]]> */
</script>


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
        return "@pct_themer/themedesigner/js/js_themedesigner.html5";
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
        return new Source("<script>
/* <![CDATA[ */

/**
 * Class object
 * ThemeDesigner
 */
var ThemeDesigner = 
{
\t/**
\t * The current time stamp
\t * @var integer
\t */
\ttimestamp : <?= \$this->timestamp; ?>,
\t
\t/**
\t * The current theme name
\t * @var string
\t */
\ttheme : '<?= \$this->theme; ?>',

\t/**
\t * The current zoom level
\t * @var integer
\t */
\tzoom : <?= \$this->zoom ?: 100; ?>,

\t/**
\t * The current device
\t * @var string
\t */
\tdevice : '<?= \$this->device; ?>',
\t
\t/**
\t * Store pending ajax requests
\t * @var object
\t */
\tpending : {},\t
\t\t
\t/**
\t * Apply a form field value and send it via ajax
\t * @param string\tName of the field
\t * @param mixed\t\tValue of the field
\t * @param boolean\tSend ajax request or not
\t */
\tapplyValue : function(strName,varValue,blnAjax)
\t{
\t\tif(varValue === undefined) {varValue = null;}
\t\tif(blnAjax === undefined) {blnAjax = true;}
\t\t\t\t
\t\t// update the storage
\t\tThemeDesigner.storage(strName,varValue);
\t\t
\t\t// trigger global applyValue event
\t\t//jQuery(document).trigger('ThemeDesigner.onApplyValue',{'name':strName,'value':varValue,'action':'applyValue'});
\t\t
\t\tjQuery(document).trigger('ThemeDesigner.onValue',{'name':strName,'value':varValue,'action':'applyValue'});
\t\t
\t\t// send ajax
\t\tif(blnAjax)
\t\t{
\t\t\tthis.request('applyValue',{name:strName, value:varValue});
\t\t\t//this.request('applyValue',{name:strName, value:varValue});
\t\t}
\t},
\t
\t
\t/**
\t * Send a form field value via ajax without applying the stylesheet
\t * @param string\tName of the field
\t * @param mixed\t\tValue of the field
\t * @param boolean\tSend ajax request or not
\t */
\tsendValue : function(strName,varValue,blnAjax)
\t{
\t\tif(varValue === undefined) {varValue = null;}
\t\tif(blnAjax === undefined) {blnAjax = true;}
\t\t
\t\t// update the storage
\t\tThemeDesigner.storage(strName,varValue);
\t\t
\t\t// trigger global applyValue event
\t\tjQuery(document).trigger('ThemeDesigner.onValue',{'name':strName,'value':varValue,'action':'sendValue'});
\t\t
\t\t// send ajax
\t\tif(blnAjax)
\t\t{
\t\t\tthis.request('sendValue',{name:strName, value:varValue});
\t\t}
\t},
\t
\t
\t/**
\t * Apply multiple fields with their values
\t * @param object||array
\t *
\t * object {FIELD_NAME:VALUE} || array [FIELD_NAME] = VALUE
\t */
\tapplyValues : function(varSet)
\t{
\t\tobjSet = varSet;
\t\tif(isArray(varSet))
\t\t{
\t\t\t
\t\t}
\t\t
\t\tthis.request('applyValues',objSet);
\t},
\t
\t
\t/**
\t * Set a field value or elements value
\t * @param string
\t * @param mixed
\t * @param boolean
\t * @return mixed\t\tReturns the validated value
\t */
\tsetValue : function(strName,varValue,blnApply)
\t{
\t\tif(blnApply === undefined) {blnApply = false;}
\t\t
\t\tvar objElement = ThemeDesigner.findByName(strName);
\t\t
\t\tif(objElement === null)
\t\t{
\t\t\treturn;
\t\t}
\t\t
\t\t// validate the value
\t\tvarValue = ThemeDesigner.validateValueForInput(varValue);
\t\t
\t\t// set as new value
\t\tobjElement.val( varValue );
\t\t
\t\t// trigger event
\t\tobjElement.trigger('ThemeDesigner.onSetValue',{'name':strName,'value':varValue});
\t\t
\t\tif(blnApply === true)
\t\t{
\t\t\tthis.applyValue(strName,varValue);
\t\t}
\t\t
\t\treturn varValue;
\t},
\t
\t
\t/**
\t * Toggle the value of an element
\t * @param DOMElement
\t */
\ttoggleValue : function(objElement)
\t{
\t\tobjElement = jQuery(objElement);
\t\t// toggle checkbox values
\t\tswitch(objElement.attr('type'))
\t\t{
\t\t\tcase 'checkbox':
\t\t\t\tif(objElement.val() == 1)
\t\t\t\t{
\t\t\t\t\tobjElement.removeAttr('checked');
\t\t\t\t\tobjElement.val(0);
\t\t\t\t\tobjElement.prop('checked',false);
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\tobjElement.attr('checked');
\t\t\t\t\tobjElement.val(1);
\t\t\t\t\tobjElement.prop('checked',true);
\t\t\t\t}
\t\t\t\tbreak;
\t\t}
\t},
\t
\t
\t/**
\t * Find an element by its name and return as jquery object
\t * @param string\tName of the element
\t * @return object
\t */
\tfindByName : function(strName)
\t{
\t\tvar arrTests = ['[data-td_selector=\"'+strName+'\"]','[name=\"'+strName+'\"]','#'+strName];
\t\t
\t\tvar objReturn = null;
\t\tjQuery.each(arrTests, function(index,value)
\t\t{
\t\t\tobjReturn = jQuery(value);
\t\t\t
\t\t\t// break if we have a match
\t\t\tif(objReturn.length > 0)
\t\t\t{
\t\t\t\treturn false;
\t\t\t}
\t\t});
\t\t
\t\tif(objReturn.length < 1)
\t\t{
\t\t\treturn null;
\t\t}
\t\t
\t\treturn objReturn;
\t},
\t
\t
\t/**
\t * Add more attributes to an element
\t * @param DOMElement
\t */
\taddAttributes : function(objElement,objAttributes)
\t{
\t\tobjElement = jQuery(objElement);
\t\t
\t\tjQuery.each(objAttributes, function(i,v)
\t\t{
\t\t\tobjElement.attr(v);
\t\t});
\t},
\t
\t
\t/**
\t * Unbind events from element
\t * @param DOMElement
\t */
\tunbind : function(objElement)
\t{
\t\tobjElement.unbind('ThemeDesigner.onSelector');
\t\tobjElement.unbind('ThemeDesigner.onSetValue');
\t\t
\t\treturn objElement;
\t},
\t
\t
\t/**
\t * Apply the settings by reloading the current theme designer output stylesheet
\t */
\tapply : function()
\t{
\t\t// new timestamp
\t\tvar time = jQuery.now();
\t\t
\t\tvar curr_stylesheet = '<?= \$this->stylesheet; ?>'+'?'+ThemeDesigner.timestamp;
\t\tvar new_stylesheet = '<?= \$this->stylesheet; ?>'+'?'+time;
\t\t
\t\t// apply stylesheet
\t\tjQuery('head link#layout_css').attr('href',new_stylesheet);
\t\t
\t\t// apply stylesheet in iframe
\t\tjQuery('#themedesigner_iframe').contents().find('link#layout_css').attr('href',new_stylesheet);
\t\t
\t\t// send info
\t\tconsole.log('New stylesheet applied by ThemeDesigner: '+new_stylesheet);
\t\t
\t\t// remember timestamp
\t\tThemeDesigner.timestamp = time;
\t}
}

// TODO: !LocalStorage management

/**
 * LocalStorage management
 * @param string\tName of the field
 * @param mixed\t\tValue of the field
 * @param string\tName of the current theme
 */
ThemeDesigner.storage = function(strName,varValue,strTheme)
{
\tif(strName === undefined) {strName = '';}
\t
\tif(strTheme === undefined || strTheme == '')
\t{
\t\tstrTheme = ThemeDesigner.theme;
\t}
\t
\tvar strIdent = 'ThemeDesigner_'+strTheme;
\t\t
\tif(strName.length < 1 && varValue === undefined)
\t{
\t\tvar arrKeys = Object.keys(localStorage);
\t\tvar arrReturn = {};
\t\tfor(var i = 0; i <= arrKeys.length; i++)
\t\t{
\t\t\tvar key = arrKeys[i];
\t\t\tif(key == undefined)
\t\t\t{
\t\t\t\tcontinue;
\t\t\t}
\t\t\t
\t\t\tif(key.indexOf(strIdent+'.') >= 0)
\t\t\t{
\t\t\t\tvar k = key.replace(strIdent+'.','');
\t\t\t\t
\t\t\t\t// recursivly find the value
\t\t\t\tarrReturn[k] = ThemeDesigner.storage(k);
\t\t\t}
\t\t}
\t\treturn arrReturn;
\t}
\t
\t// set value
\tif(strName !== '' && varValue !== undefined)
\t{
\t\tlocalStorage.setItem(strIdent+'.'+strName,varValue);
\t}
\t// get a value
\telse if(strName.length > 0 && varValue == undefined)
\t{
\t\tvar varReturn = localStorage.getItem(strIdent+'.'+strName);
\t\ttry 
\t\t{
\t\t\tvarReturn = jQuery.parseJSON(varReturn);
\t\t}
\t\tcatch(err) {}
\t\t
\t\treturn varReturn;
\t}
}


/**
 * Remove from storage
 * @param string\tName of the field
 */
ThemeDesigner.removeFromStorage = function(strName,strTheme)
{
\tif(strTheme === undefined || strTheme == '')
\t{
\t\tstrTheme = ThemeDesigner.theme;
\t}
\t
\tvar strIdent = 'ThemeDesigner_'+strTheme;
\t
\t<?php if(\\Contao\\Config::get('debugMode')):?>
\tconsole.log('Remove '+strName+' from storage');
\t<?php endif; ?>\t
\tlocalStorage.removeItem(strIdent+'.'+strName);
}


/**
 * Clear the localStorage
 */
ThemeDesigner.clearStorage = function(strTheme)
{
\tif(strTheme === undefined || strTheme == '')
\t{
\t\tstrTheme = ThemeDesigner.theme;
\t}
\t
\tvar strIdent = 'ThemeDesigner_'+strTheme;
\t
\tvar arrKeys = Object.keys(localStorage);
\t
\tvar count = 0;
\tfor(var i = 0; i <= arrKeys.length; i++)
\t{
\t\tvar key = arrKeys[i];
\t\tif(key == undefined)
\t\t{
\t\t\tcontinue;
\t\t}
\t\t
\t\tif(key.indexOf(strIdent+'.') >= 0)
\t\t{
\t\t\tlocalStorage.removeItem(key);
\t\t\tcount++;
\t\t}
\t}
\tconsole.log('ThemeDesigner ['+strTheme+'] storage cleared. Items removed: '+count);
}


/**
 * Loading overlay
 * @param string\t'show'||'hide'
 */
ThemeDesigner.loader = function(strAction)
{
\tvar objLoader = jQuery('#themedesigner_loader');
\tif(objLoader.length < 1)
\t{
\t\treturn;
\t}
\t
\tif(strAction == 'isActive')
\t{
\t\treturn objLoader.hasClass('active');
\t}
\t
\tif(strAction == 'hide')
\t{
\t\tobjLoader.removeClass('active');
\t}
\telse if(strAction == 'show')
\t{
\t\tobjLoader.addClass('active');
\t}
}


/**
 * Request handlers
 * @param string\tThe request action identifier
 * @param object\tAn optional object to pass variables through
 * @return object\tThe jquery ajax request object
 *
 * objOptions = {}
 * objOptions.name \t\tName of the field
 * objOptions.value\t\tValue of the field
 */
ThemeDesigner.request = function(strAction,objOptions)
{
\tif(objOptions === undefined)
\t{
\t\tobjOptions = {};
\t}
\t
\tvar strUrl = '<?= \$GLOBALS['PCT_THEMEDESIGNER']['ajaxUrl']; ?>';
\tif(!strUrl)
\t{
\t\tstrUrl = location.href;
\t}
\t
\tvar objData = {};
\tobjData.themedesigner = 1;
\tobjData.action = strAction;
\tobjData.theme = ThemeDesigner.theme;
\t
\tvar blnApply = true;
\tif(objOptions.doNotApply === true)
\t{
\t\tblnApply = false;
\t}
\t
\tvar blnLoader = false;
\tif(objOptions.loader === true)
\t{
\t\tblnLoader = true;
\t}
\t
\tswitch(strAction)
\t{
\t\t// single field value call
\t\tcase 'applyValue':
\t\t\tobjData.field = objOptions.name;
\t\t\tobjData.value = objOptions.value;
\t\t\tbreak;
\t\t// multiple fields and values call
\t\tcase 'applyValues':
\t\t\tobjData.fields = fields;
\t\t\tobjData.values = values;
\t\t\tbreak;
\t\t// just send a value without applying the new stylesheet
\t\tcase 'sendValue':
\t\t\tobjData.field = objOptions.name;
\t\t\tobjData.value = objOptions.value;
\t\t\t
\t\t\tblnApply = false;
\t\t\tblnLoader = false;
\t\t\t
\t\t\t// check if a similar request is still pending
\t\t\tif(ThemeDesigner.pending['action=sendValue&field='+objData.field+'&value='+objData.value])
\t\t\t{
\t\t\t\treturn;
\t\t\t}
\t\t\t
\t\t\tbreak;
\t\t// show section
\t\tcase 'showSection':
\t\t\tobjData.section = objOptions.section;
\t\t\tbreak;
\t\t// toggle palette
\t\tcase 'togglePalette':
\t\t\tobjData.section = objOptions.section;
\t\t\tobjData.palette = objOptions.palette;
\t\t\tobjData.active = objOptions.active
\t\t\tbreak;\t
\t\t// toggle switcjh
\t\tcase 'toggleSwitch':
\t\t\tobjData.name = objOptions.name;
\t\t\tobjData.active = objOptions.active
\t\t\tbreak;
\t\t// toggle multiple switches
\t\tcase 'toggleSwitches':
\t\t\tobjData.switches = objOptions.switches
\t\t\tbreak;
\t\tcase 'toggleVisibility':
\t\tcase 'toggleMobile':
\t\t\tobjData.state = objOptions.active;
\t\t\tbreak;
\t\t// toggle device
\t\tcase 'toggleDevice':
\t\t\tobjData.value = objOptions.value
\t\t\tbreak;
\t\t// toggle zoom
\t\tcase 'toggleZoom':
\t\t\tobjData.value = objOptions.value;
\t\t\tbreak;
\t\t// iframe url
\t\tcase 'updateIframeUrl':
\t\t\tobjData.url = objOptions.url;
\t\t\tbreak;
\t}
\t
\t// write request string
\tvar strRequest = jQuery.param(objData);
\t
\t// check if a similar request is still pending
\tif(ThemeDesigner.pending[strRequest] === true)
\t{
\t\treturn;
\t}
\t
\t// send request
\tvar objRequest = jQuery.ajax(
\t{
\t\tmethod\t: \"GET\",
\t\turl\t\t: strUrl,
\t\tdata\t: objData,
\t\t// before sending
\t\tbeforeSend : function()
\t\t{
\t\t\t// set request as pending
\t\t\tThemeDesigner.pending[strRequest] = true;
\t\t\t
\t\t\tif(blnLoader)
\t\t\t{
\t\t\t\t// show loader
\t\t\t\tThemeDesigner.loader('show');
\t\t\t}
\t\t},
\t\t// success
\t\tsuccess\t: function(response)
\t\t{
\t\t\tif(blnApply)
\t\t\t{
\t\t\t\t// all good. Apply
\t\t\t\tThemeDesigner.apply();
\t\t\t}
\t\t\t
\t\t\tif(blnLoader)
\t\t\t{
\t\t\t\t// remove loader
\t\t\t\tThemeDesigner.loader('hide');
\t\t\t}
\t\t\t
\t\t\t// trigger complete event and pass the whole data object as parameter
\t\t\tjQuery(document).trigger('ThemeDesigner.ajax_complete',objData);
\t\t},
\t\t// complete
\t\tcomplete: function()
\t\t{
\t\t\tThemeDesigner.pending[strRequest] = false;
\t\t},
\t\t// error 
\t\terror\t: function(response)
\t\t{
\t\t\t<?php if(\\Contao\\Config::get('debugMode')): ?>
\t\t\tconsole.log('AJAX ERROR: '+ response);
\t\t\t<?php endif; ?>
\t\t} 
\t});
\t
\treturn objRequest;
}


/**
 * Selector logic
 * @param string\tName of the vield
 * @param mixed\t\tValue of the field
 * @param object\tJson object with effected fields and values
 */
ThemeDesigner.selector = function(strName,varValue,objEffected)
{
\tif(objEffected === undefined) {objEffected = {};}
\t
\tvar objElement = ThemeDesigner.findByName(strName);
\tif(objElement === null)
\t{
\t\treturn;
\t}
\t
\t// return if value is uninteresting
\tif(objElement.val() != varValue)
\t{
\t\treturn;
\t}
\t
\t
\t// json string is coming
\tif(typeof(objEffected) == 'string')
\t{
\t\tobjEffected = jQuery.parseJSON(objEffected);
\t}
\t
\tjQuery.each(objEffected, function(name, value)
\t{
\t\tvar element = ThemeDesigner.findByName(name);
\t\tif(element === null)
\t\t{
\t\t\treturn true;
\t\t}

\t\tvalue = ThemeDesigner.setValue(name,value);
\t\t
\t\t// trigger onSelector event
\t\telement.trigger('ThemeDesigner.onSelector',{'name':name,'value':value,'selector':strName,'selector_value':varValue});
\t} );
\t
\t<?php if(\\Contao\\Config::get('debugMode')): ?>
\tconsole.log('SELECTOR: ' + strName + \".\"+varValue);
\t<?php endif; ?>
}


/**
 * Shortcut to ThemeDesigner toggle visibilty
 * @param string\tName of the section
 * @param string\tName of the palette
 * @param integer\tActive status 0=false, 1=true
 */
ThemeDesigner.toggleVisibility = function(intStatus)
{
\tThemeDesigner.request('toggleVisibility',{active:intStatus,doNotApply:true});
}


/**
 * Shortcut to ThemeDesigner show palette request
 * @param string\tName of the section
 * @param string\tName of the palette
 * @param integer\tActive status 0=false, 1=true
 */
ThemeDesigner.togglePalette = function(strSection,strPalette,intStatus)
{
\tThemeDesigner.request('togglePalette',{section:strSection,palette:strPalette,active:intStatus,doNotApply:true});
}


/**
 * Shortcurt to ThemeDesigner toggle ON/OFF switch request
 * @param string\tName of the switch
 * @param integer\tActive status 0=false, 1=true
 * @param boolean\tShow loader 0=false, 1=true
 */
ThemeDesigner.toggleSwitch = function(strSwitch,intStatus,blnLoader)
{
\tif(blnLoader === undefined) {blnLoader == false;}
\t
\t// trigger onToggleSwitch event
\tjQuery('[data-init_switch=\"1\"][data-name=\"'+strSwitch+'\"]').trigger('ThemeDesigner.onToggleSwitch',{'name':strSwitch,'status':intStatus});
\t
\t// trigger global onToggleSwitch event
\tjQuery(document).trigger('ThemeDesigner.onToggleSwitch',{'name':strSwitch,'status':intStatus});
\t
\tThemeDesigner.request('toggleSwitch',{name:strSwitch,active:intStatus,doNotApply:true,loader:blnLoader});
}


/**
 * Shortcut to ThemeDesigner toggle multiple switches request
 * @param object
 * @param boolean\tShow loader 0=false, 1=tru
 */
ThemeDesigner.toggleSwitches = function(objSwitches,blnLoader)
{
\tif(objSwitches === undefined) {objSwitches = {};}
\tif(blnLoader === undefined) {blnLoader == false;}
\t
\tjQuery.each( objSwitches, function(strSwitch, intStatus)
\t{
\t\tvar objSwitch = jQuery('[data-switch=\"'+strSwitch+'\"]');
\t\t
\t\tif(objSwitch !== undefined)
\t\t{
\t\t\t// trigger onToggleSwitch event
\t\t\tobjSwitch.trigger('ThemeDesigner.onToggleSwitch',{'name':strSwitch,'status':intStatus});
\t\t
\t\t\t// trigger global onToggleSwitch event
\t\t\tjQuery(document).trigger('ThemeDesigner.onToggleSwitch',{'name':strSwitch,'status':intStatus});
\t\t}
\t});
\t
\tThemeDesigner.request('toggleSwitches',{switches:objSwitches,doNotApply:true,loader:blnLoader});
}


/**
 * Toggle mobile view port request
 */
ThemeDesigner.toggleMobile = function(intStatus)
{
\tThemeDesigner.request('toggleMobile',{active:intStatus,doNotApply:true});
}


/**
 * Toggle device request
 */
ThemeDesigner.toggleDevice = function(varValue)
{
\t// hide all fields not part of the current device selected
\tvar objElements = jQuery('[data-devices]:not([data-devices=\"\"]):not([data-devices=\"*\"])');
\t
\tjQuery.each( objElements, function(intIndex,objElement)
\t{
\t\tobjElement = jQuery(objElement);
\t\tvar devices = objElement.data('devices').split(',');
\t\t
\t\tif( jQuery.inArray(varValue,devices) >= 0 )
\t\t{
\t\t\tobjElement.show();
\t\t\t// remove hidden classes
\t\t\tobjElement.removeClass('hidden');
\t\t}
\t\telse
\t\t{
\t\t\tobjElement.hide();
\t\t}
\t});
\t
\t// trigger global onDevice event
\tjQuery(document).trigger('ThemeDesigner.onDevice',{'name':varValue});

\tThemeDesigner.request('toggleDevice',{value:varValue,doNotApply:true});
}


/**
 * Toggle zoom request
 */
ThemeDesigner.toggleZoom = function(varValue)
{
\tThemeDesigner.request('toggleZoom',{value:varValue,doNotApply:true});
}


/**
 * Validate or convert a value to use as value in an input
 * @param mixed
 * @param string
 */
ThemeDesigner.validateValueForInput = function(varValue,strName)
{
\tif(strName === undefined) {strName = '';}
\t
\tvar objElement = null;
\tif(strName.length > 0)
\t{
\t\tobjElement = jQuery('[data-td_selector=\"'+strName+'\"]');
\t}
\t
\treturn varValue;
}

// TODO: !ThemeDesignerNavigation

/**
 * ThemeDesigner Navigation class object
 */
var ThemeDesignerNavigation = 
{
\t/**
\t * Toggle active sections
\t * @param name
\t */
\tshowSection(strSection)
\t{
\t\t// send request
\t\tThemeDesigner.request('showSection',{section:strSection,doNotApply:true});
\t\t
\t\tjQuery('.pct_themedesigner .section').removeClass('active');
\t\tjQuery('.pct_themedesigner .section[data-section=\"'+strSection+'\"]').addClass('active');
\t}
}

// TODO: !ThemeDesignerIframe

/**
 * ThemeDesigner iframe class object
 */
var ThemeDesignerIframe = 
{
\tresize : function()
\t{
\t\tvar height = jQuery(window).innerHeight() - jQuery('#themedesigner_iframe_wrapper').position(window).top - 60;
\t\tvar width = jQuery(window).innerWidth() - jQuery('#themedesigner_iframe_wrapper').position(window).left - 255;
\t\tjQuery('#themedesigner_iframe').css({'height':height,'width':width});
\t}
}


/**
 * Clear local storage on page load
 */
<?php if(!\\Contao\\Environment::get('isAjaxRequest')):?>
ThemeDesigner.clearStorage();
<?php endif; ?>

/**
 * Fill the local storage with current php data
 */
<?php 
\$objThemeDesigner = new \\PCT\\ThemeDesigner;
\$arrFonts = \$objThemeDesigner->getFonts();
\$arrData = \$objThemeDesigner->getData(true);
?>

<?php foreach(\$arrData as \$key => \$value): ?>
<?php 
if(is_array(\$value) || is_object(\$value))
{
\t\$value =  \"'\".json_encode(\$value).\"'\";
}

// fonts
else if( isset(\$arrFonts[\$value]) && is_array(\$arrFonts[\$value]) && empty(\$arrFonts[\$value]) === false )
{
\t\$value = \"'\".\$value.\"'\";
\tif(isset(\$arrFonts[\$value]['family']) && strlen(\$arrFonts[\$value]['family']) > 0)
\t{
\t\t#\$value = str_replace('\"',\"'\",\$arrFonts[\$value]['family']);
\t\t\$value = \$arrFonts[\$value]['family'];
\t}
}
else
{
\t\$value = \"'\".\$value.\"'\";
}
?>
// fill storage
ThemeDesigner.storage('<?= \$key; ?>',<?= \$value; ?>);
<?php endforeach; ?>\t


/**
 * Remove items from storage when switch has been turned off
 */
jQuery(document).on('ThemeDesigner.onToggleSwitch',function(event,params)
{
\tif(params.status < 1)
\t{
\t\tThemeDesigner.removeFromStorage(params.name);
\t}
});


/**
 * Append the little save info star when user changed something
 */
var blnUserChangedSomething = false;
jQuery(document).on('ThemeDesigner.onValue',function(event,params)
{
\tif(blnUserChangedSomething === false)
\t{
\t\tblnUserChangedSomething = true;
\t\tvar txt = jQuery('#ctrl_themedesigner_version_description').attr('placeholder');
\t\tif(txt !== undefined)
\t\t{
\t\t\tjQuery('#ctrl_themedesigner_version_description').attr('placeholder', txt.replace('*','') + '*');
\t\t}
\t}
});

// TODO: !Switch dependencies

<?php if(is_array(\$GLOBALS['PCT_THEMEDESIGNER_SWITCHES']) && count(\$GLOBALS['PCT_THEMEDESIGNER_SWITCHES']) > 0): ?>
jQuery(document).ready(function()
{
\t<?php foreach(\$GLOBALS['PCT_THEMEDESIGNER_SWITCHES'] as \$strSwitch => \$arrStatus): ?>
\t
\t// register switch eventlistener
\tvar objSwitch = jQuery('[data-switch=\"<?= \$strSwitch; ?>\"]');
\tif(objSwitch !== undefined)
\t{
\t\tobjSwitch.on('ThemeDesigner.onToggleSwitch',function(event,params)
\t\t{
\t\t\t<?php foreach(\$arrStatus as \$intStatus => \$arrEffected): ?>
\t\t\tvar objEffected = <?= json_encode(\$arrEffected); ?>;
\t\t\t
\t\t\t// run action by status
\t\t\tif(params.status == <?= \$intStatus; ?> && objEffected !== undefined)
\t\t\t{
\t\t\t\t// circle through effected switches an toggle their state
\t\t\t\tfor(var key in objEffected)
\t\t\t\t{
\t\t\t\t\tvar value = objEffected[key];
\t\t\t\t\t
\t\t\t\t\tvar objElement = jQuery('[data-switch=\"'+key+'\"]');
\t\t\t\t\tif(!objElement || objElement === undefined)
\t\t\t\t\t{
\t\t\t\t\t\tcontinue;
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\tvar isActive = objElement.hasClass('active');
\t\t\t\t\t
\t\t\t\t\tif(value > 0 && !isActive)
\t\t\t\t\t{
\t\t\t\t\t\tobjElement.addClass('active');
\t\t\t\t\t\tobjElement.parent('li.field').addClass('active');
\t\t\t\t\t\t
\t\t\t\t\t\t// switch childs
\t\t\t\t\t\tobjElement.parent('li.field').siblings('.switch_childs').addClass('active');
\t\t\t\t\t}
\t\t\t\t\telse if(value < 1 && isActive)
\t\t\t\t\t{
\t\t\t\t\t\tobjElement.removeClass('active');
\t\t\t\t\t\tobjElement.parent('li.field').removeClass('active');
\t\t\t\t\t\t
\t\t\t\t\t\t// switch childs
\t\t\t\t\t\tobjElement.parent('li.field').siblings('.switch_childs').removeClass('active');
\t\t\t\t\t}
\t\t\t\t\t// state is already correct, delete the switch from the effected ones
\t\t\t\t\telse
\t\t\t\t\t{
\t\t\t\t\t\tdelete objEffected[key];
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\t// send the toggleSwitch request for the effected switches
\t\t\t\t\t//ThemeDesigner.toggleSwitch( key, value );
\t\t\t\t}
\t\t\t\t
\t\t\t\t// send the toggleSwitches request for the effected switches
\t\t\t\tThemeDesigner.toggleSwitches( objEffected );\t
\t\t\t}
\t\t\t
\t\t\t<?php endforeach; ?>
\t\t});
\t}
\t
\t<?php endforeach; ?>
});
<?php endif; ?>


// TODO: !-- ThemeDesigner Interactions

// TODO: !Minify

/**
 * Minify toggler
 */
jQuery(document).ready(function() 
{
\tjQuery('#themedesigner_toggler').click(function(event) 
\t{
\t\t// prevent default behavior. good for real anchors
\t\tevent.preventDefault();
\t\t
\t\tjQuery(this).toggleClass('active');
\t\tjQuery('body').toggleClass('themedesigner_minified');
\t\t
\t\tvar isActive = 0;
\t\tif( jQuery(this).hasClass('active') )
\t\t{
\t\t\tisActive = 1;
\t\t}
\t\t
\t\t// send toggle visibility
\t\tThemeDesigner.toggleVisibility( isActive );
\t});
});

// TODO: !Palettes

/**
 * Palette toggler
 */
jQuery(document).ready(function() 
{
\tjQuery('[data-init_slider=\"1\"] .td_toggler').click(function(event) 
\t{
\t\t// prevent default behavior. good for real anchors
\t\tevent.preventDefault();
\t\t
\t\tjQuery(this).toggleClass('active');
\t\tvar _parent = jQuery(this).parent('[data-init_slider=\"1\"]');
\t\t_parent.toggleClass('active');
\t\t_parent.find('.td_palette').toggleClass('active');
\t\t
\t\tvar isActive = 0;
\t\tif( jQuery(this).hasClass('active') )
\t\t{
\t\t\tisActive = 1;
\t\t}
\t\t
\t\t// send toggle palette request
\t\tThemeDesigner.togglePalette( _parent.data('section'), _parent.data('palette'), isActive );
\t});
});

// TODO: !Switches

/**
 * On/Off switches
 */
jQuery(document).ready(function() 
{
\tjQuery('[data-init_switch=\"1\"]').click(function(event) 
\t{
\t\t// prevent default behavior. good for real anchors
\t\tevent.preventDefault();
\t\t
\t\tjQuery(this).toggleClass('active');
\t\t
\t\t
\t\tvar _parent = jQuery(this).parent('li.field').toggleClass('active');
\t\t
\t\t// switch childs
\t\t_parent.siblings('.switch_childs').toggleClass('active');
\t\t
\t\tvar isActive = 0;
\t\tif( jQuery(this).hasClass('active') )
\t\t{
\t\t\tisActive = 1;
\t\t}
\t\t
\t\t// send toggle palette request
\t\tThemeDesigner.toggleSwitch( jQuery(this).data('name'), isActive );
\t});
});

// TODO: !Mobile view

/**
 * Mobile view
 */
jQuery(document).ready(function() 
{
\tjQuery('#themedesigner_mobile').click(function(event) 
\t{
\t\tjQuery('body').toggleClass('themedesigner_mobile');
\t\tjQuery('#themedesigner_iframe_wrapper').toggleClass('mobile');
\t\tjQuery('#themedesigner_iframe').contents().find('body').toggleClass('mobile themedesigner_mobile');
\t\t
\t\t// send request
\t\tvar isActive = 0;
\t\tif(jQuery('body').hasClass('themedesigner_mobile'))
\t\t{
\t\t\tisActive = 1
\t\t}
\t\t
\t\tThemeDesigner.toggleMobile( isActive );
\t});
});

// TODO: !Device switch

/**
 * Device switch
 */
jQuery(document).ready(function() 
{
\tvar prevDevice = ThemeDesigner.device;
\t
\tjQuery('#device_and_zoom .devices li').click(function(event) 
\t{
\t\tevent.preventDefault();
\t\t
\t\t// remove prev active
\t\tjQuery('#device_and_zoom .devices li').removeClass('active');
\t\tjQuery(this).toggleClass('active');

\t\tvalue = jQuery(this).data('value');
\t\t
\t\t// remove old classes 
\t\tif( prevDevice.length > 0)
\t\t{
\t\t\tjQuery('body').removeClass('themedesigner_'+prevDevice);
\t\t\tjQuery('#themedesigner_iframe_wrapper').removeClass( prevDevice );
\t\t\tjQuery('#themedesigner_iframe').contents().find('body').removeClass(prevDevice + ' themedesigner_' + prevDevice);
\t\t}
\t\t
\t\t// apply new class
\t\tjQuery('body').addClass('themedesigner_'+value);
\t\tjQuery('#themedesigner_iframe_wrapper').addClass( value );
\t\tjQuery('#themedesigner_iframe').contents().find('body').addClass(value + ' themedesigner_' + value);
\t\t// update
\t\tprevDevice = value;

\t\tThemeDesigner.toggleDevice( value );
\t});
});


// TODO: !Zoom switch

/**
 * Zoom switch
 */
jQuery(document).ready(function() 
{
\tvar prevZoomClass = 'zoom_'+ThemeDesigner.zoom;
\t
\tjQuery('#device_and_zoom .zoom li').click(function(event) 
\t{
\t\tevent.preventDefault();
\t\tjQuery('#device_and_zoom .zoom li').removeClass('active');
\t\tjQuery(this).toggleClass('active');

\t\tvalue = jQuery(this).data('value');
\t\t
\t\t// remove old classes 
\t\tif( prevZoomClass.length > 0)
\t\t{
\t\t\tjQuery('body').removeClass(prevZoomClass);
\t\t\tjQuery('#themedesigner_iframe_wrapper').removeClass(prevZoomClass);
\t\t\tjQuery('#themedesigner_iframe').contents().find('body').removeClass(prevZoomClass);
\t\t}
\t\t
\t\tvar cssClass = 'zoom_'+value;
\t\t// apply new class
\t\tjQuery('body').addClass(cssClass);
\t\tjQuery('#themedesigner_iframe_wrapper').addClass(cssClass);
\t\tjQuery('#themedesigner_iframe').contents().find('body').addClass(cssClass);
\t\t// update
\t\tprevZoomClass = cssClass;
\t\t
\t\tThemeDesigner.toggleZoom( value );
\t});
});

// TODO: !Navi

/**
 * Navi script
 */
jQuery(document).ready(function() 
{
\tvar last = null;
\tjQuery('.pct_navigation span[data-clickable=\"1\"]').click(function(event)
\t{
\t\t// prevent default behavior. good for real anchors
\t\tevent.preventDefault();
\t\t
\t\tif(last == this)
\t\t{
\t\t\treturn false;
\t\t}
\t\t
\t\t// remove any active
\t\tjQuery('.pct_navigation span, .pct_navigation li').removeClass('active');
\t\t
\t\t// set active
\t\tjQuery(this).parent('li').addClass('active');
\t\tjQuery(this).addClass('active');
\t\t
\t\t// send show section request
\t\tThemeDesignerNavigation.showSection( jQuery(this).data('section') );
\t\t
\t\t// remember last one clicked
\t\tlast = this;
\t});
});

// TODO: !RevolutionSlider Helper

/**
 * Force the themedesigner iframe to reload on switching devices when it contains a slider instance
 */
jQuery(document).bind('ThemeDesigner.onDevice',function(e,params) 
{
\tif( jQuery(\"#themedesigner_iframe\").contents().find('.rs-container').length > 0 )
\t{
\t\tjQuery('#themedesigner_iframe_wrapper .inner .loader').addClass('show');
\t\tjQuery(\"#themedesigner_iframe\").attr('src', jQuery(\"#themedesigner_iframe\").attr('src'));
\t}
});

/* ]]> */
</script>


", "@pct_themer/themedesigner/js/js_themedesigner.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/js/js_themedesigner.html5");
    }
}
