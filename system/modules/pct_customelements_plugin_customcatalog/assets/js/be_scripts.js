/**
 * Toggle the active state, extend the Contao AjaxRequest class
 *
 * @param {object} el    The DOM element
 * @param {string} id    The ID of the target element
 * @param {string} table The table name
 *
 * @returns {boolean}
 */
AjaxRequest.toggleCustomCatalogActiveState = function(el, id, table)
{
	el.blur();
	var image = $(el).getFirst('img'),
		action = (image.src.indexOf('active_on') != -1),
		div = el.getParent('div'),
		next;
	
	if (action) 
	{
		image.addClass('active_on');
   		image.removeClass('active_off');
   	} 
   	else 
   	{
   		image.addClass('active_off');
   		image.removeClass('active_on');
   	}

   	var request;
	// Send request
	if (action) {
		image.src = image.src.replace('active_on.gif', 'active_off.gif');
		request = new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'taid':id, 'active':0,'REQUEST_TOKEN':Contao.request_token});
	} else {
		image.src = image.src.replace('active_off.gif', 'active_on.gif');
		request = new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'taid':id, 'active':1,'REQUEST_TOKEN':Contao.request_token});
	}
	
	return false;
}


/**
 * Toggle any state, extend the Contao AjaxRequest class
 *
 * @param {object} el    The DOM element
 * @param {string} id    The ID of the target element
 * @param {string} table The table name
 *
 * @returns {boolean}
 */
AjaxRequest.toggleAnyState = function(el, id, table)
{
	el.blur();
	
	var attr_id = el.get('data-attr_id');
	var icon_on = el.get('data-icon');
	var icon_off = el.get('data-icon_off');
	
	var image = $(el).getFirst('img'),
		action = (image.src.indexOf(icon_on) != -1),
		div = el.getParent('div'),
		next;
	
	if (action) 
	{
		image.addClass('active_on');
   		image.removeClass('active_off');
   	} 
   	else 
   	{
   		image.addClass('active_off');
   		image.removeClass('active_on');
   	}

   	var request;
	// Send request
	if (action) 
	{
		image.src = image.src.replace(icon_on, icon_off);
		request = new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'taid':id, 'state':0, 'attr_id':attr_id, 'REQUEST_TOKEN':Contao.request_token});
	} 
	else 
	{
		image.src = image.src.replace(icon_off, icon_on);
		request = new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'taid':id, 'state':1, 'attr_id':attr_id, 'REQUEST_TOKEN':Contao.request_token});
	}
	
	return false;
}

window.addEvent('domready', function() 
{
	var togglers = $$('.ui_nav_container .submenu');
	if(togglers.length < 1)
	{
		return;
	}
	
	$$('.ui_nav_container .open_subnav').addEvents(
	{
		'click' : function() 
		{
			var container = $(this).getParent('.ui_nav_container');
			var element = $(this).getParent('li');
			var tog = $(this);
			
			if (element.hasClass('open')) 
			{
				tog.removeClass('open');
				element.removeClass('open');
				
				tog.set('disabled',true);
				element.set('disabled',true);
				
				// remove from session
				request = new Request.Contao({'url':window.location.href, 'followRedirects':false}).post(
				{
					'action':'toggleQuickMenu','config_id':container.get('data-config'), 'element_id':element.get('data-id'), 'state':0, 'table':element.get('data-table'), 'REQUEST_TOKEN':Contao.request_token
				});
				
				request.onSuccess = function()
				{
					tog.set('disabled',false);
					element.set('disabled',false);
				}
			}
			else 
			{
				tog.addClass('open');
				element.addClass('open');
				
				tog.set('disabled',true);
				element.set('disabled',true);
				
				// add to session
				request = new Request.Contao({'url':window.location.href, 'followRedirects':false}).post(
				{
					'action':'toggleQuickMenu','config_id':container.get('data-config'), 'element_id':element.get('data-id'), 'state':1, 'table':element.get('data-table'), 'REQUEST_TOKEN':Contao.request_token
				});
				
				request.onSuccess = function()
				{
					tog.set('disabled',false);
					element.set('disabled',false);
				}
				
			}
		}
	});
});



/**
 * Toogle the quick menu visibility
 */
window.addEvent('domready', function() 
{
	var buttons = $$('.ui_container .ui_toggler');
	if(buttons.length < 1)
	{
		return;
	}
	
	var stayOpen = false;
	var open = false;
	buttons.addEvents(
	{
		'click' : function() 
		{
			var nav = this.getParent('.ui_container').getElement('.ui_nav_container');
			
			if(!open)
			{
				nav.setStyles({'display':'block'});
				this.addClass('active');
				open = true;
			}
			else
			{
				nav.setStyles({'display':'none'});
				this.removeClass('active');
				open = false;
			}
		}
	});
});



/**
 * Indicate subpalettes and their selectors in attribute list view 
 */
window.addEvent('domready', function() 
{
	var objSelectors = $$('.tl_listing_container .isSelector');
	if(objSelectors == undefined || objSelectors.length < 1)
	{
		return;
	}
	
	var arrListBlock = objSelectors.getParents('div.tl_content');
	arrListBlock.each(function(elem, index)
	{
		var color = elem[0].getChildren('.isSelector').get('data-color');
		var version = elem[0].getChildren('.isSelector').get('data-contao');
		elem.addClass('contao-'+version+' indent indent_left isSelector cc_wrapper_start '+color);
	});
	
	var objSubpalettes = $$('.tl_listing_container .isSubpalette');
	if(objSubpalettes == undefined || objSubpalettes.length < 1)
	{
		return;
	}
	
	var arrListBlock = objSubpalettes.getParents('div.tl_content');
	arrListBlock.each(function(elem, index)
	{
		var color = elem[0].getChildren('.isSubpalette').get('data-color');
		var version = elem[0].getChildren('.isSubpalette').get('data-contao');
		elem.addClass('contao-'+version+' indent indent_left isSubpalette '+color);
		
		if(elem[0].getChildren('.isSubpalette').getLast().hasClass('wrapper_stop'))
		{
			elem.addClass('cc_wrapper_stop');
		}
		else
		{
			elem.addClass('cc_wrapper_inner');
		}
		
	});	
});


/**
 * Protect the backend with the ajax loading box when switching languages
 */
AjaxRequest.toggleLanguageSwitch = function(language,table)
{
	if(language == '')
	{
		console.log('Change to base records in table ('+table+')');
	}
	else
	{
		console.log('Change language to ('+language+') in table ('+table+')');
	}
	
	new Request.Contao(
	{
		evalScripts: false,
		onRequest: AjaxRequest.displayBox(Contao.lang.loading + ' …'),
		onFailure: function(e) 
		{
			// if contao is to slow, reload the page
			if(e.status == 302 && e.timeout == 0)
			{
				location.reload();
			}
		},
		onSuccess: function(txt, json) 
		{
			json.javascript && Browser.exec(json.javascript);
			//AjaxRequest.hideBox();
			window.fireEvent('ajax_change');
			// reload the page	
			location.reload();
		}
	}).post({'action':'toggleLanguageSwitch', 'language':language, 'table':table, 'REQUEST_TOKEN':Contao.request_token});
}


/**
 * Hide the database update alert box
 */
window.addEvent('domready', function() 
{
	var elements = $$('#pct_alertbox .hide_box');
	if(elements.length < 1 || elements == undefined)
	{
		return true;
	}
	
	elements.addEvent('click',function()
	{
		var elem = this;
		new Request.Contao(
		{
			evalScripts: false,
			onSuccess: function(txt, json) 
			{
				elem.getParents('.message').destroy();
				console.log(txt);
			}
		}).post({'action':'hideDatabaseUpdateAlertbox', 'REQUEST_TOKEN':Contao.request_token});
	});
});