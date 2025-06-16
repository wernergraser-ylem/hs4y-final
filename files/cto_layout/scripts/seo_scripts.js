

/**
 * Set focus to search input
 */
jQuery(document).ready(function() 
{
	jQuery('.ce_search_label').click(function()
	{
		// wait for element to be in sight app. 800ms tweening delay
		setTimeout(function()
		{
			jQuery('#search_160 input[name="keywords"]').focus();
		
		}, 800);
		
		/* add class on click */
		jQuery(".body_bottom .mod_search").addClass("show-search");
		
		/* fadeIn overlay */
		jQuery(".body_bottom .mod_search .search-overlay").fadeIn();
	});
	
   /* close button*/
	jQuery(".body_bottom .close-window").click(function(){
    	jQuery(".body_bottom .mod_search").removeClass("show-search");
    	jQuery('body').removeClass('search_overlay');
    	jQuery(".search-overlay").fadeOut(300);
	});
	
	jQuery(".search-overlay").click(function(){
    	jQuery(".body_bottom .mod_search").removeClass("show-search");
    	jQuery('body').removeClass('search_overlay');
    	jQuery(".search-overlay").fadeOut(300);
	});
});

jQuery(document).keyup(function(e) {
   if (e.keyCode === 27) jQuery(".mod_search").removeClass("show-search");
   if (e.keyCode === 27) jQuery("body").removeClass("search_overlay");
   if (e.keyCode === 27) jQuery(".search-overlay").fadeOut(300);
});


 

jQuery(document).ready(function()
{
	// add hide_optin body class when on imprint or privacy page
		
	//--- opt out remove token
	jQuery('#privacy_optout_link').click(function(e)
	{
		e.preventDefault();
		PrivacyManager.optout(document.location.origin+document.location.pathname);
	});
	
	if(window.location.search.indexOf('clear_privacy_settings') >= 0)
	{
		PrivacyManager.optout(document.location.origin+document.location.pathname);
	}
	//--
	
	var privacy = localStorage.getItem('user_privacy_settings');
	var expires = Number( localStorage.getItem('user_privacy_settings_expires') );
	// check lease time
	var now = new Date().setDate(new Date().getDate());
	if( now >= expires )
	{
		expires = 0;
	}
	
	if(privacy == undefined || privacy == '' || expires <= 0 )
	{
		jQuery('#privacy_optin_611').addClass('open');
		// set privacy level to 0
		privacy = '0';
	}

	// set a body class
	jQuery('body').addClass('privacy_setting_'+privacy.toString().split(',').join('-'));
	
	// hide the info
	jQuery('#ajax_info_611').hide();

	var form = jQuery('#user_privacy_settings_611');
	var isValid = false;
	
	// set focus to autofocus input
	form.find('input[autofocus]').focus(function(e)
	{
		console.log(this);
		jQuery(this).addClass('focus');
	});

	// remove readonly from submit when user changes its selection
	form.find('input[type="checkbox"]').change(function(e)
	{
		isValid = false;
		// required field changed
		if( form.find('input[required].mandatory').is(':checked') === true )
		{
			isValid = true;
		}

		form.find('input[name="save_settings"]').addClass('readonly');
		form.find('input[name="save_settings"]').prop('disabled', true);
		
		if( isValid === true )
		{
			form.find('input[name="save_settings"]').removeClass('readonly');
			form.find('input[name="save_settings"]').prop('disabled', false);
		}
	});

	// allow all
	form.find('input[name="save_all_settings"]').click(function(e) 
	{
		e.preventDefault();
		// check all checkboxes for user feedback
		form.find('input[type="checkbox"]').prop('checked',true);
		// all good
		isValid = true;
		// fire save
		form.find('input[name="save_settings"]').trigger('click');
	});

	// tech only all
	form.find('input[name="save_tech_settings"]').click(function(e) 
	{
		e.preventDefault();
		// check required checkbox for user feedback
		form.find('#cookiebar_privacy_1').prop('checked',true);
		// all good
		isValid = true;
		// fire save
		form.find('input[name="save_settings"]').trigger('click');
	});

		
	form.find('input[name="save_settings"]').click(function(e)
	{
		e.preventDefault();

		// check if a required field is still not set
		if( isValid === false )
		{
			return false;
		}

		// show ajax info
		jQuery('#ajax_info_611').fadeIn(50);
		
		// get the user selection
		var privacy = PrivacyManager.getUserSelectionFromFormData( form.serializeArray() ).join(',');
		
		// set local storage
		localStorage.setItem('user_privacy_settings',privacy);
		// set lease time
		var expires = new Date().setDate(new Date().getDate() + 30);
		localStorage.setItem('user_privacy_settings_expires',expires);
		// set a body class
		jQuery('body').addClass('privacy_setting_'+privacy.toString().split(',').join('-'));
		// remove negative body class
		jQuery('body').removeClass('privacy_setting_0');
		setTimeout(function()
		{
			// fire JS event
			jQuery(document).trigger('Privacy.changed',{'level':privacy});

			// fire form as usal to catch it via php
			//form.submit();
		}, 500);

	});

	// help info
	jQuery(document).ready(function () {
    let privacyHelpLink = jQuery('#privacy_optin_611 .privacy_help_link');
    let privacyPopup = jQuery('#privacy_optin_611 .privacy_popup');

    // Klick-Event für das Öffnen/Schließen der Hilfe-Popup
    privacyHelpLink.click(function () {
        privacyPopup.toggleClass('view_help');
    });

    // Fokus + Enter oder Leertaste toggelt ebenfalls die Hilfe-Popup
    privacyHelpLink.on('keydown', function (event) {
        if ((event.key === "Enter" || event.key === " ") && jQuery(this).is(':focus')) {
            privacyPopup.toggleClass('view_help');
            event.preventDefault(); // Verhindert Standardverhalten (z. B. Scrollen bei Leertaste)
        }
    });
});


	// help - scrollToTop
	jQuery('#privacy_optin_611 .privacy_help_link').click(function()
	{
		jQuery("html, body").animate({ scrollTop: 0 });
		return false;
	});

});

// listen to Privacy event
jQuery(document).on('Privacy.changed',function(event,params)
{
	if( PrivacyManager.hasAccess(params.level) )
	{
		jQuery('#privacy_optin_611').removeClass('open');
		// send ajax for log file
		jQuery.ajax(
		{
			url:location.href,
			data:{'user_privacy_settings':params.level,'tstamp':Math.round(new Date().getTime()/1000)}
		});
	}
});

// Opt-out listener
jQuery(document).ready(function()
{
	jQuery('.privacy_optout_click, .privacy_optout_link').click(function()
	{
		PrivacyManager.optout();
	});
});

// accessbility focus
jQuery(document).ready(function() {
       jQuery("#privacy_checkmark_privacy_1").focus();
});

// accessbility tab-navigation
jQuery(document).ready(function () {
    jQuery(document).keydown(function (event) {
        if (event.key === "Enter" || event.key === " ") { // Enter oder Leertaste
            jQuery(".privacy_checkmark:focus").each(function () {
                let checkbox = jQuery(this).siblings("input[type='checkbox']");
                checkbox.prop("checked", !checkbox.prop("checked"));
                event.preventDefault(); // Verhindert unerwünschtes Verhalten (z. B. Scrollen bei Space)
            });
        }
    });
});



 

  jQuery(function($) 
  {
  	if( !jQuery('body').hasClass('acc_disable_animations') )
	{
		jQuery(document).accordion({
	      // Put custom options here
	      heightStyle: 'content',
	      header: '.toggler',
	      collapsible: true,
	      create: function(event, ui) {
	        ui.header.addClass('active');
	        jQuery('.toggler').attr('tabindex', 0);
	      },
	      activate: function(event, ui) {
	        ui.newHeader.addClass('active');
	        ui.oldHeader.removeClass('active');
	        jQuery('.toggler').attr('tabindex', 0);
	      }
	    });
    }
  });

 

jQuery(document).ready(function()  {
    jQuery('a[data-lightbox]').map(function() 
    {
      jQuery(this).colorbox(
      {
        // Put custom options here
        loop: false,
        rel: jQuery(this).attr('data-lightbox'),
        maxWidth: '95%',
        maxHeight: '95%'
      });
   });

    jQuery(document).bind('cbox_complete', function(e)
    {
        if( jQuery.colorbox == undefined )
        {
          return;
        }
        var text = jQuery.colorbox.element().next('.caption').text();
        if( text )
        {
          var caption = jQuery('#cboxBottomLeft').append('<div id="cboxCaption">'+text+'</div>');
          jQuery('#colorbox').height( jQuery('#colorbox').height() + caption.height()  );
        }
    });
  });


// iframe lightbox
jQuery(document).ready(function()  
{
  jQuery('a[data-lightbox-iframe]').map(function() 
  {
    jQuery(this).colorbox(
    {
        iframe:true, 
        innerWidth:"80%", 
        innerHeight:"56%", 
        maxWidth:"95%",
        maxHeight:'95%',
    });
  });
});

// lightbox 50% 50%
jQuery(document).ready(function() 
{
  jQuery('.lightbox50-50 a, a.lightbox50-50').colorbox(
    {
      // Put custom options here
      loop: false,
      rel: jQuery(this).attr('data-lightbox'),
      width: '50%',
      height: '50%'
    });
});
// lightbox 60% 40%
jQuery(document).ready(function() 
{
  jQuery('.lightbox60-40 a, a.lightbox60-40').colorbox(
    {
      // Put custom options here
      loop: false,
      rel: jQuery(this).attr('data-lightbox'),
      width: '60%',
      height: '40%'
    });
});
// lightbox 960px 575px
jQuery(document).ready(function() 
{
  jQuery('.lightbox960 a, a.lightbox960').colorbox(
    {
      // Put custom options here
      loop: false,
      rel: jQuery(this).attr('data-lightbox'),
      width: '960px',
      height: '575px'
    });
});

 

/**
 * PrivacyManager
 */
var PrivacyManager =
{
	/**
	 * The privacy localStorage key
	 * @var string
	 */
	privacy_session : 'user_privacy_settings',

	/**
	 * Get the selected privacy checkbox values from a formular array
	 * @param array 
	 * @return array
	 */
	getUserSelectionFromFormData: function (arrSubmitted)
	{
		if (arrSubmitted == null || arrSubmitted == undefined)
		{
			return [];
		}

		var arrReturn = [];
		for (var k in arrSubmitted)
		{
			var v = arrSubmitted[k];
			if (v['name'] == 'privacy')
			{ 
				arrReturn.push(v['value']);
			}
		}
		return arrReturn;
	},


	/**
	 * Access control
	 * @param string
	 */
	hasAccess : function (varSelection)
	{
		var token = localStorage.getItem( this.privacy_session );
		if( token == undefined )
		{
			return false;
		}

		// convert to string
		if( typeof(varSelection) == 'number' )
		{
			varSelection = varSelection.toString();
		}
		// convert to array
		if( typeof(varSelection) == 'string' )
		{
			varSelection = varSelection.split(',');
		}

		for(i in varSelection)
		{
			var value = varSelection[i].toString().replace(' ','');
			if( token.indexOf( value ) >= 0 )
			{
				return true;
			}
		}
		return false;
	},


	/**
	 * Clear privacy settings and redirect page
	 * @param boolean
	 */
	optout: function (strRedirect)
	{
		// clear local storage
		localStorage.removeItem(this.privacy_session);
		localStorage.removeItem(this.privacy_session+'_expires');
		// fire event
		jQuery(document).trigger('Privacy.clear_privacy_settings',{});
		// log
		console.log('Privacy settings cleared');
		// redirect
		if (strRedirect != undefined)
		{
			location.href = strRedirect;
		}
		else
		{
			location.reload();
		}
	},


	/**
	 * Clear all cookies and localstorage
	 */
	clearAll: function()
	{
		var host = window.location.hostname;
		var domain = host.substring( host.indexOf('.') , host.length);
		// clear all cookies
		document.cookie.split(";").forEach(function(c) 
		{ 
			document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"+ ";domain="+host); 
			document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"+ ";domain="+domain); 
		});
		// clear whole localstorage
		window.localStorage.clear();
		for (var i = 0; i <= localStorage.length; i++) 
		{
		   localStorage.removeItem(localStorage.key(i));
		}
		// log
		console.log('Cookies and localstorage cleared');
	}
};



/**
 * Univerasl optin protection
 * @param string	Type of element to be protected e.g. img or iframe etc.
 */
PrivacyManager.optin = function(strElementType)
{
	if(strElementType == undefined || strElementType == '')
	{
		return;
	}
	// user settings not applied yet
	if(localStorage.getItem(this.privacy_session) == undefined || localStorage.getItem(this.privacy_session) == '' || localStorage.getItem(this.privacy_session) <= 0)
	{
		return
	}

	// find all scripts having a data-src attribute
	var targets = jQuery(strElementType+'[data-src]');	
	
	if(targets.length > 0)
	{
		jQuery.each(targets,function(i,e)
		{
			var privacy = jQuery(e).data('privacy');
			if(privacy == undefined)
			{
				privacy = 0;
			}
			
			var attr = 'src';
			if(strElementType == 'link')
			{
				attr = 'href';
			}
			else if(strElementType == 'object')
			{
				attr = 'data';
			}
			
			if(localStorage.getItem('user_privacy_settings').indexOf(privacy) >= 0)
			{
				jQuery(e).attr(attr,jQuery(e).data('src') );
			}
		});
	}
}

jQuery(document).on('Privacy.changed', function() 
{
	PrivacyManager.optin('script');
	PrivacyManager.optin('link');
	PrivacyManager.optin('iframe');
	PrivacyManager.optin('object');
	PrivacyManager.optin('img');
});

jQuery(document).ready(function()
{
	PrivacyManager.optin('script');
	PrivacyManager.optin('link');
	PrivacyManager.optin('iframe');
	PrivacyManager.optin('object');
	PrivacyManager.optin('img');
});

 

jQuery(document).ready(function()  
{
    //var e = document.querySelectorAll('.content-slider, .slider-control');
    jQuery('.content-slider').each(function(i,elem) 
    {
	    var config = jQuery(elem).attr('data-config');
	   	if( config )
	    {
		    var menu = jQuery(elem).next('.slider-control');
		    c = config.split(',');
		    var options = 
		    {
			    'auto': parseInt(c[0]),
		        'speed': parseInt(c[1]),
		        'startSlide': parseInt(c[2]),
		        'continuous': parseInt(c[3])
		    }
		    // menu
		    if ( menu )
		    {
			    // replace # with slahs
			    menu.find('a').attr('href','/');
			    options.menu = menu[0];
		    }
		    new Swipe(elem, options);
	     }
      });
});

 

jQuery(document).ready(function() 
{
	jQuery('nav.mobile_vertical .trail').addClass('open');
	jQuery('nav.mobile_vertical li.submenu > a').append('<span class="opener"></span>');
	jQuery('nav.mobile_vertical a.submenu').not('.open').parent('li').children('ul').hide();
	jQuery('nav.mobile_vertical li.submenu .opener, nav.mobile_vertical li.submenu a.forward:not(.click-default), nav.mobile_vertical li.submenu a.pct_megamenu').click(function(e)
	{ 
		e.preventDefault();
		e.stopImmediatePropagation();
		
		var _this = jQuery(this);
		
		// close open siblings
		if( jQuery(this).parents('nav.mobile_vertical').hasClass('collapse') )
		{
			var siblings = _this.parents('li').siblings('li.open');
			siblings.children('ul').slideUp(
			{
				duration:300,
				complete: function()
				{
					siblings.removeClass('open');
					siblings.children('a').removeClass('open');
				}
			});
		}
		
		var parent = _this.parent('li');
		
		// opener div
		var isOpener = _this.hasClass('opener');
		if( isOpener )
		{
			var parent = _this.parent('a').parent('li');
		}
		
		if(parent.hasClass('open') )
		{
			parent.children('ul').slideUp(
			{
				duration:300,
				complete: function()
				{
					if( isOpener )
					{
						_this.siblings('a').removeClass('open');
					}
					_this.removeClass('open');
					parent.removeClass('open');
				}
			});
			
		}
		else
		{
			if( isOpener )
			{
				_this.siblings('a').toggleClass('open');	
			}
			_this.toggleClass('open');
			parent.toggleClass('open');
			parent.children('ul').slideToggle({duration:300});
		}
	});
});

