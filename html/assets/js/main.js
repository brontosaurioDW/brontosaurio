jQuery(document).ready(function($) {
	
    /*  SMOOTH SCROLL  */
    $('a[href*="#"]')
    	.not('[href="#"]')
    	.not('[href="#0"]')
    	.on('click', function(event) {
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });

    /*  PARALLAX  */
    $('.parallax-el').paroller();

    $(window).scroll(function() {
    	var scrollDistance = $(window).scrollTop();

    	$('section').each(function(i) {
    		if ($(this).position().top <= scrollDistance) {
    			$('.menu li.active').removeClass('active');
    			$('.menu li').eq(i).addClass('active');

    			$('section').removeClass('active_section');
    			$(this).addClass('active_section');
    		}

    		if ($('.active_section').hasClass('dk-bg')) {
    			$('.menu').addClass('lg-menu');
    		} else {
    			$('.menu').removeClass('lg-menu');
    		}
    	});
    }).scroll();
});