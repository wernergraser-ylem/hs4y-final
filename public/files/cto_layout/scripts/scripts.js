/* =============================================================================
 * to top link
 * ========================================================================== */
jQuery(document).ready(function() {
  var progressRing = jQuery('.progress-ring__circle');
  var radius = progressRing.attr('r');
  var circumference = 2 * Math.PI * radius;

  progressRing.css('stroke-dasharray', circumference);
  progressRing.css('stroke-dashoffset', circumference);

  function updateProgressRing() {
    var scrollTop = jQuery(window).scrollTop();
    var scrollHeight = jQuery(document).height() - jQuery(window).height();
    var scrollFraction = scrollTop / scrollHeight;
    var offset = circumference * (1 - scrollFraction);
    
    progressRing.css('stroke-dashoffset', offset);
  }

  jQuery(window).on('scroll', updateProgressRing);
  updateProgressRing();
});


jQuery(document).ready(function()
{
	// scroll to
	jQuery('#top_link a').click(function(e){
    	e.preventDefault();
    	jQuery("html, body").animate({scrollTop: jQuery('#contentwrapper').offset().top - 100}, 500);
	});
});

/* =============================================================================
 * mobnav trigger
 * ========================================================================== */
 
jQuery(document).ready(function() 
{
	jQuery('.mmenu_trigger').click(function(e) 
	{
		var elem = jQuery('#header');
		if( jQuery('body').hasClass('fixed-header') )
		{
			elem = jQuery('#stickyheader');
		}
		var delta = elem.position('body').top + elem.height();
		jQuery('#mmenu').css({
		    'transition': 'transform 0.6s cubic-bezier(0.1, 0, 0.1, 1)',
		    'top': delta,
		    'transform': 'translateY(calc(-100% - ' + delta + 'px))',
		    'height': 'calc(100% - ' + delta + 'px)',
		});

	});
});

/* =============================================================================
 * Viewport pixel
 * ========================================================================== */
jQuery(window).on('load resize', function () 
{	
	if (jQuery('#viewport-pixel').length < 1 || jQuery('#viewport-pixel') == undefined)
	{
		return;
	}
	
	var val = jQuery('#viewport-pixel').css('opacity');
	
	// remove old class
	jQuery('body').removeClass('viewport_desktop viewport_tablet viewport_mobile');

	// tablet
	var device = 'desktop';
	if (val > 0.75)
	{
		jQuery('body').addClass('viewport_desktop');
	}
	else if (val <= 0.75 && val > 0.5)
	{
		jQuery('body').addClass('viewport_tablet');
		device = 'tablet';
	}
	else if (val <= 0.5)
	{
		jQuery('body').addClass('viewport_mobile');
		device = 'mobile';
	}
	
	// fire event
	jQuery(window).trigger('Eclipse.viewport',{'device':device});
});


/* =============================================================================
 * Mobile view
 * ========================================================================== */
jQuery(document).ready(function() 
{	
	if (jQuery('body').hasClass('mobile'))
	{
		// set body class
		jQuery('body').addClass('viewport_mobile');
		// fire event
		jQuery(document).trigger('Eclipse.viewport_mobile',{});
	}
});


/* =============================================================================
 * IOS workaround for wrong position bug under IOS11,12
 * ========================================================================== */
jQuery(document).ready(function() 
{
	if( jQuery('body').hasClass('ios') && window.location.hash.toString().length < 1)
	{
		jQuery("html, body").animate({scrollTop: 0});
	} 
});

/* =============================================================================
 * PrivacyManager listener
 * ========================================================================== */
jQuery(document).on('Privacy.changed', function (event, params)
{
	jQuery(document).trigger('Eclipse.user_privacy', params);
});

jQuery(document).on('Privacy.cleared', function (event)
{
	Eclipse_clearPrivacy(true);
});


/* =============================================================================
 * Eclipse_setPrivacy(intLevel)
 * @param array||string	Levels of privacy
 * ========================================================================== */
function Eclipse_setPrivacy(varLevels)
{
	if (typeof (varLevels) == 'Array')
	{
		varLevels = varLevels.join(',');
	}
	// set local storage
	localStorage.setItem('user_privacy_settings',varLevels);
	// fire event
	jQuery(document).trigger('Eclipse.user_privacy',{'level':varLevels});
}


/* =============================================================================
 * Eclipse_clearPrivacy(blnReload)
 * @param boolean	Reload page true/false
 * ========================================================================== */
function Eclipse_clearPrivacy(blnReload)
{
	if(blnReload == undefined || blnReload == null)
	{
		blnReload = true;
	}
	
	// clear local storage
	localStorage.removeItem('user_privacy_settings');
	// fire event
	jQuery(document).trigger('Eclipse.clear_privacy_settings',{});
	// reload page
	if(blnReload)
	{
		location.reload();
	}
}

/* =============================================================================
 * smartmenu
 * ========================================================================== */
jQuery(document).ready(function(){ 

	jQuery('.smartmenu-trigger').click(function(e){
		e.preventDefault();
		jQuery('.smartmenu-content').addClass('open');
		jQuery('.smartmenu').addClass('open');
		jQuery('body').addClass('no_scroll');
		jQuery('body').addClass('smartmenu_open');
	});
	
	jQuery('.smartmenu-content .smartmenu-close').click(function(e){
		e.preventDefault();
		jQuery('.smartmenu-content').removeClass('open');
		jQuery('.smartmenu').removeClass('open');
		jQuery('body').removeClass('no_scroll');
		jQuery('body').removeClass('smartmenu_open');
	});
	
	jQuery('.smartmenu-content a:not(.submenu)').click(function(e)
	{
		if( jQuery(e.target).hasClass('pct_megamenu') )
		{
			return false;
		}
		
		// follow link
		if(jQuery(e.target).attr('target') != '_blank' && jQuery(e.target).attr('href') != "/")
		{
			jQuery('.smartmenu-content').removeClass('open');
			jQuery('body').removeClass('no_scroll');
			jQuery('body').removeClass('smartmenu_open');
		}
	});
	
	// open trail content on page load
	jQuery('.smartmenu-content').find('.trail').addClass('open');
	jQuery('.smartmenu-content').find('.trail > ul').show();
});

jQuery(document).ready(function(){ 
	
	jQuery('.smartmenu-content .subitems_trigger').on('click', function (e)
	{
		e.stopPropagation();
		var element = jQuery(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp();
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown();
			element.siblings('li').children('ul').slideUp();
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp();
		}
	});

	// internal redirect pages as container pages
	jQuery('.smartmenu-content a.forward:not(.click-default), .smartmenu-content a.pct_megamenu:not(.click-default)').click(function (e)
	{
		e.preventDefault();
		e.stopPropagation();
		jQuery(this).siblings('.subitems_trigger').trigger('click');
	});
});

/* =============================================================================
 * mmenu
 * ========================================================================== */
jQuery(document).ready(function(){ 
	jQuery('.mmenu_trigger, .mmenu_overlay').click(function()
	{
		jQuery('body').toggleClass('mmenu_open');
		jQuery('body').toggleClass('no_scroll');
		jQuery('.burger').toggleClass('open');
	});
});

jQuery(document).keyup(function(e) {
  if (e.keyCode == 27 && jQuery('body').hasClass('mmenu_open')) 
  {
	  jQuery('.burger').removeClass('open');
	  jQuery('body').removeClass('mmenu_open');
	  jQuery('body').removeClass('no_scroll');
  }
});

/* =============================================================================
 * mainmenu menuheader (deactivate link)
 * ========================================================================== */
jQuery(document).ready(function(){
	jQuery('.mainmenu .menuheader').removeAttr("href");
});

/* =============================================================================
 * mainmenu avoid_click
 * ========================================================================== */
jQuery(document).ready(function ()
{
	jQuery('.avoid-click > a, .avoid_click > a').click(function (e) { e.preventDefault(); });
	jQuery('.avoid-click-all a, .avoid_click_all a').click(function (e) { e.preventDefault(); });
});

/* =============================================================================
 * mainmenu click opener
 * ========================================================================== */
jQuery(document).ready(function() 
{
	if( jQuery('body').hasClass('mobile') || jQuery('body').hasClass('viewport_tablet') || jQuery('body').hasClass('viewport_mobile') )
	{
		return;
	}

	var last = null;
	jQuery('.mainmenu a.click_open').click(function (e)
	{
		e.preventDefault();
		e.stopPropagation();
		// close last open
		//if (last != this )
		//{
		//	if( jQuery(last).parents() )
		//	{
		//		jQuery(last).removeClass('active');
		//		jQuery(last).next('.megamenu-wrapper, ul').removeClass('active');
		//		jQuery('.mod_pct_megamenu, .mod_pct_megamenu .item').removeClass('active');
		//	}
		//}
		
		jQuery('.mainmenu a.pct_megamenu').removeClass('active');
		jQuery('.mod_pct_megamenu, .mod_pct_megamenu .item').removeClass('active');
		
		// toggle
		if( last == this )
		{
			jQuery(this).toggleClass('active');
			jQuery(this).parent('li.click_open').toggleClass('active');
			jQuery(this).next('.megamenu-wrapper, ul').toggleClass('active');
			return;
		}
		
		// close all click_open elements
		jQuery('.mainmenu .click_open, .mainmenu .click_open ul').removeClass('active');	
		// open parent click_open elements
		var parents = jQuery(this).parents('li.click_open');
		parents.addClass('active');
		parents.find('> a, > ul').addClass('active');
		
		//jQuery(this).toggleClass('active');
				
		last = this;
	});
});

/* =============================================================================
 * css3 animation (css/animate.css)
 * ========================================================================== */
jQuery(document).ready(function ()
{
	var root = jQuery("body");
	var animationClasses = ["fadeIn", "zoomIn", "fadeInDown","fadeInDownBig","fadeInLeft","fadeInLeftBig","fadeInRight","fadeInRightBig","fadeInUp","fadeInUpBig","rotateIn","zoomIn","slideInDown","slideInLeft","slideInRight","slideInUp","bounceIn","bounceInDown","bounceInLeft","bounceInRight","bounceInUp","imageZoomOut","imageZoomIn"];
	jQuery.each(animationClasses, function(key, value)
	{
		root.find("." + value).each(function()
		{
			jQuery(this).removeClass(value).attr("data-animate", value);
		});
	});
	
	function initObserver( options )
	{ 
		// @var IntersectionObserver
		const objObserver = new IntersectionObserver(function (entries, observer)
		{
			entries.forEach(function(entry) 
			{
				if (entry.isIntersecting) 
				{
					var element = jQuery(entry.target);
					var animation = element.data("animate");
					element.removeClass('animate').addClass('animated ' + animation).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function ()
					{
						element.removeClass(animation+' animated');
					});
					// stop observing
					objObserver.unobserve( entry.target );
				}
			});
		},options);
		
		jQuery('.animate').not('.nowaypoint').each(function(i,elem) 
		{
			var element = jQuery(elem);
			// remove animations for ios or android
			if(jQuery('body').hasClass('ios') || jQuery('body').hasClass('android')) 
			{
				element.removeClass('animate');
				return true;
			} 
			else 
			{
				objObserver.observe( element[0] );
			}
		});
	}

	// check if a revolutionslider exists in page
	if (jQuery(document).revolution != undefined)
	{
		jQuery(document).on('RevolutionSlider.loaded', function (e, params)
		{ 
			initObserver( { root: null, rootMargin: '0px', threshold: 0.25 } );
		});
	}
	else
	{
		initObserver( { root: null, rootMargin: '0px', threshold: 0.25 } );
	}
});

/* =============================================================================
 * #slider min-height
 * ========================================================================== */
jQuery(document).ready(setMinHeightToSliderSection);
jQuery(window).resize(setMinHeightToSliderSection);
function setMinHeightToSliderSection()
{
	if( jQuery('#fix-wrapper').css('position') == 'absolute' )
	{
		jQuery('#slider.empty').css('min-height', jQuery('#fix-wrapper').height());
	}
	else
	{
		jQuery('#slider.empty').css('min-height', '');
	}
}

/* =============================================================================
 * Fixed-header body class
 * ========================================================================== */

function headerFixed() {
	var topHeight = jQuery("#top-wrapper").outerHeight();
	if(topHeight == jQuery(window).innerHeight())
	{
		topHeight = jQuery(window).innerHeight() / 3;
	}
	
	if (jQuery(this).scrollTop() > topHeight) {
		jQuery("body").addClass("fixed-header");
		
	} else {
		jQuery("body").removeClass("fixed-header");
    }
};
	
jQuery(document).ready(function(){ 
	headerFixed();
});

jQuery(window).scroll(function() {
	headerFixed();
});

/* =============================================================================
 * doubleTapToGo scripts/doubletaptogo/
 * ========================================================================== */
jQuery(document).ready(function(){
	if(jQuery('body').hasClass('android') || jQuery('body').hasClass('win') || jQuery('body').hasClass('ios') || jQuery('body').hasClass('viewport_tablet')){
		jQuery('nav.mainmenu li.submenu:not(.level_2 .megamenu)').doubleTapToGo();
		jQuery('.smartmenu li.submenu').doubleTapToGo();
		jQuery('.top_metanavi li.submenu').doubleTapToGo();
		jQuery('.header_metanavi li.submenu').doubleTapToGo();
		jQuery('.mod_langswitcher li').doubleTapToGo();
		
		jQuery.each(jQuery('.mod_langswitcher li a'),function(i,elem)
		{
			jQuery(elem).click(function(e) { e.preventDefault(); window.location.href = jQuery(this).attr('href'); });
		});
	}
});

/* =============================================================================
 * Add no-scroll class to body when lightbox opens
 * ========================================================================== */
jQuery(document).bind('cbox_open',function() {
	jQuery('body').addClass('no_scroll');
});

jQuery(document).bind('cbox_closed',function() {
	jQuery('body').removeClass('no_scroll');
});

/* =============================================================================
 * search top trigger
 * ========================================================================== */
jQuery(document).ready(function(){
	jQuery(".ce_search_label").click(function(){
    	jQuery(".body_bottom .mod_search").addClass("show-search");
    	jQuery('body').addClass('search_overlay');
	});
	jQuery(".body_bottom .close-window").click(function(){
    	jQuery(".body_bottom .mod_search").removeClass("show-search");
    	jQuery('body').removeClass('search_overlay');
	});
});

/* =============================================================================
 * scroll to anchors
 * ========================================================================== */
jQuery(document).ready(function()
{
    jQuery('a.scroll-to-anchor, #main a[href*=\\#], #left a[href*=\\#], #right a[href*=\\#], #slider a[href*=\\#], #footer a[href*=\\#], #bottom a[href*=\\#], .mod_quickmenu a[href*=\\#]').click(function(e)
	{
		// return with default behavior
		if( jQuery(this).hasClass('external-anchor') || jQuery(this).hasClass('not-anchor') )
		{
			return true;
		}
		
    	var target = jQuery('#'+jQuery(this).attr("href").split('#')[1]);
		if(target == undefined || target == null)
        {
            return true;    
        }
        else if(target.length < 1)
        {
	        return true;
        }
        
        e.preventDefault();
        
        var stickheaderHeight = 0;
		if(jQuery('#stickyheader'))
		{
			stickheaderHeight = jQuery('#stickyheader').height();
        }
		
		jQuery("html, body").animate({ scrollTop: target.offset().top - stickheaderHeight }, 500, function ()
		{ 
			if (jQuery('body').hasClass('mmenu_open'))
			{
				jQuery('body').removeClass('mmenu_open');
				jQuery('body').removeClass('no_scroll');
				jQuery('.mmenu_trigger .burger').removeClass('open');
				jQuery('.mmenu_overlay').fadeOut('fast');
			}	
		});
        return false;
    });
});


/* =============================================================================
 * force page to start on top "to_top"
 * ========================================================================== */
jQuery(document).ready(function ()
{
	if (jQuery('body').hasClass('to_top') )
	{
		document.body.scrollTop = 0;
 		document.documentElement.scrollTop = 0;
		jQuery('html,body').animate({ scrollTop: 0 });
		// force browsers like chrome to reset last remembered scroll position
		window.onload = function ()
		{
			setTimeout(function(){ scrollTo(0,-1); },0);
		}
	}
});

/* =============================================================================
 * ce_parallax scripts/parallax/
 * ========================================================================== */
jQuery(window).on('Eclipse.viewport',function(e,params)
{
	if( params.device == 'desktop' && typeof jQuery(window).stellar == 'function' )
	{
		jQuery(window).stellar({ horizontalScrolling: false, responsive: true });
	}
});

/* =============================================================================
 * Parallax elements
 * ========================================================================== */
jQuery(document).ready(function ()
{
	var elements = jQuery('[class*=parallax-speed]');
	if (elements.length < 1)
	{
		return;
	}

	elements.addClass('has-parallax');
	
	// create a parallax box inside each target element
	//jQuery.each(elements, function (i,elem)
	//{
	//	jQuery(elem).wrapInner('<div class="parallax-inner"></div>');
	//});
	
	const SPEED = 3;
	const EASING = 50;
	
	/**
	 * Applay the parallax effect on an element
	 * @param object
	 * @param integer
	 */
	var parallax = function(objElement, intSpeed)
	{
		if( intSpeed == undefined || isNaN(intSpeed) )
		{
			intSpeed = SPEED;
		}
		
		var pos = objElement.getBoundingClientRect();
		var posY = pos.y - (pos.height);
		
		// fallback when getBoudingClientRect is not available
		//var posY = jQuery(objElement).offset().top - jQuery(window).scrollTop() - jQuery(objElement).height();
		
		var translateY = (posY * (intSpeed / EASING));
		jQuery(objElement).css({'transform':'translateY('+translateY+'px)'});	
	}
	//--
	
	var SPEEDS = []; // store easings
	
	jQuery(window).scroll(function ()
	{
		jQuery.each(elements, function (i,elem)
		{
			parallax(elem,SPEEDS[i]);	
		});
	});
	
	jQuery(document).ready(function ()
	{
		jQuery.each(elements, function (i,elem)
		{
			for (var z = 1; z <= 10; z++)
			{
				if (jQuery(elem).hasClass('parallax-speed-' + z))
				{
					SPEEDS[i] = z;
					return true;
				}
			}
			parallax(elem,SPEEDS[i]);		
		});
	});
});

/* =============================================================================
 * Accessibility helper for legacy accordions
 * ========================================================================== */
jQuery(document).ready(function() 
{	
	jQuery.each(jQuery('.ce_accordionStart, .ce_accordionSingle'), function(i,elem)
	{
		jQuery(elem).find('.toggler').removeAttr('role');
		jQuery(elem).find('.toggler').removeAttr('aria-selected');
		jQuery(elem).find('.toggler').removeAttr('tabindex');
		jQuery(elem).find('.toggler').attr('aria-disabled',"false");	
		jQuery(elem).find('.accordion').attr('role','region');
		jQuery(elem).find('.accordion').removeAttr('aria-hidden');
	});
});


/* =============================================================================
 * hyperlink animation
 * ========================================================================== */
jQuery(document).ready(function() {
  jQuery('.ce_hyperlink.animate-style4 .hyperlink_txt,.ce_hyperlink.animate-style5 .hyperlink_txt').each(function() {
    var $this = jQuery(this);
    var $span = $this.find('span');

    if ($span.length === 0) {
      // Wenn kein span vorhanden ist, erstelle eins und füge den gesamten Text ein
      var text = $this.html();
      $this.empty().append('<span>' + text + '</span>');
      $span = $this.find('span');
    }

    var text = $span.text();
    var newContent = '';

    // Erstelle neuen Inhalt mit <span> für jedes Zeichen, einschließlich Leerzeichen
    jQuery.each(text.split(''), function(index, char) {
      var charSpan = jQuery('<span>').text(char === ' ' ? '\u00A0' : char); // Use non-breaking space for spaces
      charSpan.css('animation-delay', (index * 0.01) + 's');
      newContent += charSpan.prop('outerHTML');
    });

    // Setze neuen Inhalt
    $span.html(newContent);
  });
});


/* =============================================================================
 * parallax footer
 * ========================================================================== */

jQuery(document).ready(function() {
    // Prüfe, ob die Klasse 'parallax-footer' im <body> vorhanden ist
    if (jQuery('body').hasClass('parallax-footer')) {
        jQuery(window).on('scroll', function() {
            var scrollTop = jQuery(window).scrollTop(); // Aktuelle Scroll-Position
            var documentHeight = jQuery(document).height(); // Gesamthöhe des Dokuments
            var windowHeight = jQuery(window).height(); // Höhe des Fensters

            // Berechne das Scroll-Verhältnis (0 = Anfang, 1 = Ende)
            var scrollPercent = (scrollTop + windowHeight) / documentHeight;

            // Setze den Start- und Endwert für translateY
            var startY = -500; // Negative Startposition (z.B. -500px)
            var endY = 0; // Endposition bei 0px

            // Berechne die aktuelle translateY Position
            var translateY = startY + (endY - startY) * scrollPercent;

            // Wende die Transformation auf den Footer-Inhalt an
            jQuery('#footer .inside').css({
                'transform': 'translateY(' + translateY + 'px)',
            });
        });
    }
});

/* =============================================================================
 * offcanvas trigger
 * ========================================================================== */
 
jQuery(document).ready(function(){ 
	jQuery('.offcanvas-trigger').click(function(){
		jQuery('#offcanvas-top').toggleClass('offcanvas-top-open');
		jQuery('.offcanvas-trigger').toggleClass('offcanvas-top-open');
	});
});