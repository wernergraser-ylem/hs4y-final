/* =============================================================================
 * Horizontal scrolling layout
 * ========================================================================== */
jQuery(document).ready(function ()
{
	if (jQuery('body').hasClass('horizontal_scrolling') === false)
	{
		return;
	}

	var anchors = [];
	var buttons = jQuery('.onepagenav li a[href!=""]');
	jQuery.each(buttons, function(i,elem)
	{
		var anchor = jQuery(elem).attr('href').split('#')[1];
		var article = jQuery('#' + anchor);
		if( article == undefined || article.length < 1 )
		{
			return;
		}
		anchors.push('#'+anchor);
	});
	var articles = jQuery( Array.from( new Set(anchors) ).join(',') );
	buttons.click(function (e)
	{
		var anchor = jQuery(this).attr('href').split('#')[1];
		var article = jQuery('#' + anchor);
		if( article == undefined || article.length < 1 )
		{
			return;
		}
		// set all related articles back to 100vh.
		articles.css('height', '100vh');
		// set the target article to its content height if it is larger than the current window height
		var height = article.find('*').height();
		if (height < window.innerHeight)
		{
			height = "100vh";
		}
		article.css( 'height',height );
	});
	// fire onload
	//jQuery('body.horizontal_scrolling .onepagenav li a').first().click();
});
