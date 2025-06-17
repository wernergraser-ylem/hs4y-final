
/**
 * Toggle the autogrid system of an element, extend the Contao AjaxRequest class
 *
 * @param {object} el    The DOM element
 * @param {string} id    The ID of the target element
 * @param {string} table The table name
 *
 * @returns {boolean}
 */
AjaxRequest.toggleAutoGrid = function(el, id, table)
{
	el.blur();
	var image = $(el).getFirst('img');
	var auto_mode = false;
	var active = false;
	
	// fallback
	var fallback = (image.src.indexOf('autogrid_on') != -1);
	if(!fallback)
	{
		fallback = (image.src.indexOf('autogrid_off') != -1);
	}
	
	if(el.hasClass('auto_mode'))
	{
		auto_mode = true;
	}
	
	if(el.hasClass('autogrid_on'))
	{
		active = true;
	}
	
	if(active) 
	{
		image.addClass('autogrid_on');
   		image.removeClass('autogrid_off');
   		
   		el.addClass('autogrid_off');
   		el.removeClass('autogrid_on');
   	} 
   	else 
   	{
   		image.addClass('autogrid_off');
   		image.removeClass('autogrid_on');
   		
   		el.addClass('autogrid_on');
   		el.removeClass('autogrid_off');
   	}

	// Send request
	if (active) 
	{
		if(fallback)
		{
			image.src = image.src.replace('autogrid_on', 'autogrid_off');
			new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'tgid':id, 'autogrid':0,'REQUEST_TOKEN':Contao.request_token});
			return false;
		}
		
		if(auto_mode)
		{image.src = image.src.replace('autogrid_a_s1.png', 'autogrid_a_s2.png');}
		else
		{image.src = image.src.replace('autogrid_m_s1.png', 'autogrid_m_s2.png');}
		
		new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'tgid':id, 'autogrid':0,'REQUEST_TOKEN':Contao.request_token});
	} 
	else 
	{
		if(fallback)
		{
			image.src = image.src.replace('autogrid_off', 'autogrid_on');
			new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'tgid':id, 'autogrid':1,'REQUEST_TOKEN':Contao.request_token});
			return false;
		}
		
		if(auto_mode)
		{image.src = image.src.replace('autogrid_a_s2.png', 'autogrid_a_s1.png');}
		else
		{image.src = image.src.replace('autogrid_m_s2.png', 'autogrid_m_s1.png');}
		
		new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'tgid':id, 'autogrid':1,'REQUEST_TOKEN':Contao.request_token});
	}

	return false;
}


/**
 * Open new flex button selection on click
 */
 window.addEvent('domready', function() 
 {
	 $$('#ag_new_flex').addEvent('click', function()
	 {
		 this.toggleClass('open');
	 });
 });