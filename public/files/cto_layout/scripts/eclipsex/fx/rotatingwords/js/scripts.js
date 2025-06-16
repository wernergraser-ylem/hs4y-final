/**
 * Rotating effect methode 
 * @param {E} selector 
 * @param {*} options
 */
EX.fx.rotatingwords = function (selector, options = {})
{
    if (selector.length < 1)
    {
        return;
    }

    let words = jQuery(selector).find('.word');
    let transitionSpeed = options.speed || 800;
    let displayDuration = options.duration || 2000;
    
    let currentIndex = 0;
    function showNextWord()
    {
        // Hide the current word by setting the mask width to 0
        jQuery(words[currentIndex]).find('.mask').css('width', '0');

        // Set a delay to allow the mask to close before changing the word
        setTimeout(function() {
            jQuery(words[currentIndex]).removeClass('active');

            // Calculate the next index
            currentIndex = (currentIndex + 1) % words.length;
           
            // Adjust the width of the container to fit the next word quickly
            let currentWordWidth = jQuery(words[currentIndex]).find('.mask').get(0).scrollWidth;
            jQuery(selector).find('.rotating-words').css('width', currentWordWidth);

            // Set a delay to allow the width adjustment to complete before showing the next word
            setTimeout(function() {
                // Show the next word
                jQuery(words[currentIndex]).addClass('active');
                let maskWidth = jQuery(words[currentIndex]).find('.mask').get(0).scrollWidth;
                jQuery(words[currentIndex]).find('.mask').css('width', maskWidth);
            }, 50); // Short delay to allow the reset to take effect
        }, transitionSpeed); // Delay for the mask to close
    }

    // Initialize the first word and start the rotation
    let firstWordWidth = jQuery(words[currentIndex]).find('.mask').get(0).scrollWidth;
    jQuery(selector).find('.rotating-words').css('width', firstWordWidth);
    jQuery(words[currentIndex]).addClass('active');
    setTimeout(function() {
        let maskWidth = jQuery(words[currentIndex]).find('.mask').get(0).scrollWidth;
        jQuery(words[currentIndex]).find('.mask').css('width', maskWidth);
    }, 50); // Short delay to allow the initial mask width to take effect

    // Set interval for continuous rotation
    setInterval(showNextWord, displayDuration + transitionSpeed);
}
