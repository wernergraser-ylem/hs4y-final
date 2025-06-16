
/**
 * Class 
 * CustomElements
 */
var CustomElements = 
{
	objUuids : new Object,
	
	/**
	 * Count the current number of copies
	 */
	arrCopies : new Array,
	
	/**
	 * Duplicate a group in the customelement widget
	 * @param object
	 * @param html object
	 * @param integer		Current number of copies of the particular group
	 * @return boolean
	 */
	duplicateGroup: function(el, group)
	{
		if(group == undefined || group == null)
		{
			return false;
		}
		
		// remove class last from group
		if(group.hasClass('last'))
		{
			group.removeClass('last');
		}
		
		// increase the current max. copies count for the current group
		var count = group.get('data-count').toInt() + 1;
			
		var groupId = group.get('data-id').toInt();
		var copy = group.get('data-copy').toInt();
		var curr_ident = groupId+'_'+copy;
		var next_ident = groupId+'_'+count;
		var genericAttribute = group.get('data-attr_id');

		// inclease the counter for the all group siblings
		var groups = $$(".group[data-id='"+groupId+"']");
		groups.each(function(group, index)
		{
			group.set('data-count',count);
		});

		// clone the group
		var clone = group.clone(true,true).inject(group,'after');
		clone.set('id','group_'+next_ident);
		clone.set('data-copy', count);
		clone.set('data-count', count);
		clone.removeClass('even'); clone.removeClass('odd');
		clone.removeClass('group_'+curr_ident);
		clone.addClass('group_'+next_ident);
		if(count%2 == 0) {clone.addClass('even');}
		else {clone.addClass('odd');}
		
		// set the slide toggler
		clone.getElement('.slide_toggler').set('id', 'group_toggler_' + next_ident);
		// set the slide id
		clone.getElement('.slide').set('id','slide_'+next_ident);
		
		// add copy button
		var copyButton = clone.getElement('.copy_group');
		copyButton.set('href',CustomElements.addToUrl(copyButton.get('href'),'cmd_copygroup=group_'+next_ident) );
		copyButton.set('onclick','Backend.getScrollOffset(); return CustomElements.duplicateGroup(this,group_'+next_ident+')');
		
		// add delete group button
		if(group.getElement('a.delete_group') == undefined)
		{
			var image = new Element('img',{src:Backend.themePath+'icons/delete.svg'});
			var deleteButton = new Element('a',
			{
				href: window.location.href + '&cmd_deletegroup=group_'+next_ident,
				'class': 'button delete_group',
			});
			deleteButton.set('onclick','Backend.getScrollOffset();return CustomElements.deleteGroup(this,group_'+next_ident+');');
			deleteButton.grab(image);
			
			// inject in buttons
			var buttons = clone.getElement('div.buttons');
			buttons.grab(deleteButton,'top');
		}
		// delete group button already exists
		else
		{
			var deleteButton = clone.getElement('a.delete_group');
			//deleteButton.set('href',deleteButton.get('href').replace('group_'+groupIndex,'group_'+next));
			deleteButton.set('href',window.location.href + '&cmd_deletegroup=group_'+next_ident);
			deleteButton.set('onclick','Backend.getScrollOffset();return CustomElements.deleteGroup(this,group_'+next_ident+');');
		}
		
		// add cutButton
		if(group.getElement('a.cut_group'))
		{
			var cutButton = clone.getElement('a.cut_group');
			cutButton.set('href',CustomElements.addToUrl(cutButton.get('href'),'cmd_cutgroup=group_'+next_ident) );
			//cutButton.set('href',cutButton.get('href').replace('group_'+ident,'group_'+next_ident) );
		}
	
		var pFields = group.getElements('.field');
		var pUuids = new Array();
		pFields.each(function(elem, i)
		{
			var uuid = elem.get('data-attr_uuid');
			var id = elem.get('data-attr_id');
			
			var newUuid = CustomElements.generateUuid();
			while(pUuids.contains(newUuid))
			{
				newUuid = CustomElements.generateUuid();
			}
			pUuids.push(newUuid);
			
			// store new uuid in relation to the parent uuid
			if(CustomElements.objUuids[id] == undefined)
			{
				CustomElements.objUuids[id] = {}
			}
			
			// replace all old uuids
			var html = clone.get('html');
			var re = new RegExp(uuid, 'g');
			html = html.replace(re,newUuid);
			clone.set('html',html);
			
			// handle option child attributes, do not send them via ajax
			if(uuid.contains('_'))
			{
				return false;
			}
			
			CustomElements.objUuids[id] = newUuid;
		});
		
		// build a json string
		strJsonUuids = JSON.encode(CustomElements.objUuids);
		
		new Request.Contao(
		{
			//evalScripts: true,
			'url':window.location.href, 
			'followRedirects':false,
			onRequest: AjaxRequest.displayBox(Contao.lang.loading + ' …'),
			onSuccess: function(txt) 
			{
				AjaxRequest.hideBox(); 
				window.fireEvent('ajax_change');
				window.fireEvent('CustomElements.ajax_change');
				window.fireEvent('CustomElements.duplicate_group', { 'groupId': groupId, 'newGroupId': next_ident});
			}
		}).get({'cmd_copygroup':'group_'+curr_ident,'ajax':1,'uuids':strJsonUuids,'ce_attr':genericAttribute,'REQUEST_TOKEN':Contao.request_token});
		return false;
	},
	
	/**
	 * Remove a group in the customelement widget
	 * @param object
	 * @param string
	 * @return boolean
	 */
	deleteGroup: function(el, group)
	{
		var index = group.get('id');
		var groupId = group.get('data-id');
		var count = group.get('data-count').toInt() - 1;
		var genericAttribute = group.get('data-attr_id');

		group.destroy();
		
		// decrease the copy counter for the sibling groups
		var groups = $$(".group[data-id='"+groupId+"']");
		groups.each(function(group, index)
		{
			group.set('data-count',count);
		});
		
		new Request.Contao(
		{
			//evalScripts: true,
			'url':window.location.href, 
			'followRedirects':false,
			onRequest: AjaxRequest.displayBox(Contao.lang.loading + ' …'),
			onSuccess: function(txt) 
			{
				AjaxRequest.hideBox(); 
				window.fireEvent('ajax_change');
				window.fireEvent('CustomElements.ajax_change');
				window.fireEvent('CustomElements.delete_group', {'groupId':groupId});
			}
		}).get({'cmd_deletegroup':index,'ajax':1,'ce_attr':genericAttribute,'REQUEST_TOKEN':Contao.request_token});
		return false;
	
	},
	
	/**
	 * Generate a uuid
	 * @param integer
	 */
	generateUuid: function(intLength,strCharSet)
	{
		if(intLength == undefined) intLength = 15;
		if(strCharSet == undefined) strCharSet='1234567890abcdefghijklmnopqrstuvwxyz';
	
		var strReturn = '';
		for(var i = 0; i <= intLength; i++)
		{
			var rand = Math.floor(Math.random() * strCharSet.length);
			strReturn += strCharSet.substring(rand,rand+1);
		}

		return strReturn;
	},
	
	/**
	 * Add or remove a parameter to a url
	 * @param string
	 * @param string	(e.g. param1=10&param2=20)
	 * @return string
	 */
	addToUrl: function(url, strParam)
	{
		var arrUrl = url.split('?');
		var strBase = arrUrl[0];
		
		var arrParams = strParam.split('&');
		var arrQuery = new Array();
		var objReturn = {};
		
		if(arrUrl[1] != undefined)
		{
			arrQuery = arrUrl[1].split('&');
		}
		
		
		for(var i = 0; i < arrParams.length; i++)
		{
			var param = arrParams[i].split("=");
			var pk = param[0]; 
			var pv = param[1];
			// add the parameter
			objReturn[pk] = pv;
			
			// search for existing parameters
			for(var j=0; j < arrQuery.length; j++)
			{
				var tmp = arrQuery[j].split('=');
				var qk = tmp[0].toString();
				var qv = tmp[1];
				// parameter exists => overwrite value
				if(qk == pk)
				{
					qv = pv;
				}
				objReturn[qk] = qv;
			}
		}
		// build url and return
		var strReturn = strBase + '?';
		for(k in objReturn)
		{
			strReturn += k+"="+objReturn[k]+"&";
		}
		strReturn = strReturn.substr(0,strReturn.length-1);
		return strReturn;
	}		   
}


/**
 * Toggle an elements visibility item
 * @param object	 DOM Element
 * @param integer
 * @param string
 * Taken from core.js
 */
AjaxRequest.toggleElementVisibility = function(el, id, table)
{
	if(table == undefined || table.length < 1 || table == 'tl_style')
	{
		return AjaxRequest.toggleVisibility(el, id, table);
	}

	el.blur();

	var img = null,
		image = $(el).getFirst('img'),
		publish = (image.src.indexOf('invisible') != -1),
		div = el.getParent('div'),
		next;

	// Send request
	if (publish) {
		image.src = image.src.replace('invisible', 'visible');
		new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'tid':id, 'ttable':table, 'state':1,'REQUEST_TOKEN':Contao.request_token});
	} else {
		image.src = image.src.replace('visible', 'invisible');
		new Request.Contao({'url':window.location.href, 'followRedirects':false}).get({'tid':id, 'ttable':table, 'state':0,'REQUEST_TOKEN':Contao.request_token});
	}

	return false;
}