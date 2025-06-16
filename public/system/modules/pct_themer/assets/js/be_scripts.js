/**
 * Toggle the active state, extend the Contao AjaxRequest class
 *
 * @param {object} el    The DOM element
 * @param {string} id    The ID of the target element
 * @param {string} table The table name
 *
 * @returns {boolean}
 */
AjaxRequest.toggleThemeDesignerActiveState = function(el, id, table)
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
