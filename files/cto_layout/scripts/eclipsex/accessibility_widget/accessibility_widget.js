/**
 * Accessibility settings
 */
jQuery(document).ready(function() 
{
	// Fontsize
	if( Number( localStorage.getItem('accessibility_fontsize') ) != 0)
	{
		jQuery('html,body').addClass('acc_fontsize_'+Number( localStorage.getItem('accessibility_fontsize') ));
	}	
	// Default fonts active
	if( Number( localStorage.getItem('accessibility_default_fonts') ) > 0)
	{
		jQuery('html,body').addClass('acc_default_fonts');
	}
	// High contrast active
	if( Number( localStorage.getItem('accessibility_contrast') ) > 0)
	{
		jQuery('html,body').addClass('acc_contrast');
		
		if( jQuery('link#css_acc_contrast').length < 1 )
		{
			jQuery('head').append('<link id="css_acc_contrast" rel="stylesheet" type="text/css" href="files/cto_layout/css/accessibility_widget/acc_contrast.css">');
		}
	}
	// Boldface active
	if( Number( localStorage.getItem('accessibility_boldface') ) > 0)
	{
		jQuery('html,body').addClass('acc_boldface');
	}
	// disable_animations
	if( Number( localStorage.getItem('accessibility_disable_animations') ) > 0)
	{
		jQuery('html,body').addClass('acc_disable_animations');
		
		if( jQuery('link#css_acc_disable_animations').length < 1 )
		{
			jQuery('head').append('<link id="css_acc_disable_animations" rel="stylesheet" type="text/css" href="files/cto_layout/css/accessibility_widget/acc_disable_animations.css">');
		}
	}	
});

// tabmenu
jQuery(document).ready(function () {
    let menuItems = jQuery('#accessibility_tabmenu a'); // Alle Links im Tab-Menü
    let firstItem = menuItems.first(); // Erstes Element
    let lastItem = menuItems.last(); // Letztes Element
	
	menuItems.on('keydown', function (e) {
        if (e.key === 'Tab' && !e.shiftKey) { // Tab gedrückt, ohne Shift
            e.preventDefault();
            if (jQuery(this).is(lastItem)) {
                firstItem.focus(); // Springe zurück zum ersten Tab-Element
            } else {
                jQuery(this).next().focus(); // Gehe zum nächsten Element
            }
        } else if (e.key === 'Tab' && e.shiftKey) { // Shift + Tab gedrückt
            e.preventDefault();
            if (jQuery(this).is(firstItem)) {
                lastItem.focus(); // Springe zurück zum letzten Tab-Element
            } else {
                jQuery(this).prev().focus(); // Gehe zum vorherigen Element
            }
        }
    });
});

jQuery(document).ready(function () {
    jQuery('#top *, \
       .header *')
       .attr('tabindex', '-1');
});