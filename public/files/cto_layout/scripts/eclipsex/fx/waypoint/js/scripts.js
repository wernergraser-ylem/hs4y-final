/**
 * Observer script
 * @param {E} selector 
 * @param {*} options (Intersection observer options)
 */
EX.fx.waypoint = function (selector, options = {})
{ 
	var element = jQuery(selector);

    if ( element.length < 1)
    {
        return;
	}

	if (options.length < 1)
	{
		options = { root: null, rootMargin: '0px', threshold: 0.25 };
	}

	function init() 
	{
		var objObserver = new IntersectionObserver( function(entries, observer)
		{
			entries.forEach(function(entry) 
			{
				if (entry.isIntersecting) 
				{
					// send global event
					jQuery(document).trigger('EX.fx.waypoint.intersecting', { elem: element });
					// send oop event
					element.trigger('intersecting', { elem: element });
					// stop observing
					objObserver.unobserve( entry.target );
				}
			});
		}, options );
		objObserver.observe( element[0] );
	}

	// check if a revolutionslider exists in page
	if (jQuery(document).revolution != undefined)
	{
		jQuery(document).on('RevolutionSlider.loaded', function (e, params)
		{ 
			init();
		});
	}
	else
	{
		init();
	}
}