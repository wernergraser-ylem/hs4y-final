

/**
 * Add css class to connecting groups  
 */
window.addEvent('domready', function() 
{
	var groups = $$('.tl_content > .tl_customelement_group');
	if(groups.length < 1)
	{
		return false;
	}
	
	// check if group is marked as being a legend and add is_legend class to parent
	groups.each(function(group, index)
	{
		if(group.hasClass('is_legend'))
		{
			group.getParent('.tl_content').addClass('is_single_legend');
		}
		if(index >= groups.length-1)
		{
			group.getParent('.tl_content').addClass('last');
		}
		
		if(index+1 >= groups.length)
		{
			return false;
		}
		
		// ignore if the next group is also checked as being a legend
		var next = groups[index+1];
		if(next.hasClass('is_legend'))
		{
			return false;
		}			
		
		group.getParent('.tl_content').addClass('is_group_legend part_of_a_group');
		next.getParent('.tl_content').addClass('part_of_a_group');
	});
});