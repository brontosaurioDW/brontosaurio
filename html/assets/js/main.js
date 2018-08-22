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
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {                    
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1500, function() {
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) {
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); 
                            $target.focus(); 
                        };
                    });
                }
            }
        });

    $(window).scroll(function() {
    	var scrollDistance = $(window).scrollTop() + 10;

    	$('section').each(function(i) {
    		if ($(this).position().top <= scrollDistance) {
    			$('.menu li.active').removeClass('active');
    			$('.menu li').eq(i).addClass('active');
    		}
    	});
    }).scroll();

    /*  PARALLAX  */
    var s = skrollr.init();

    /*  SLIDER PORTFOLIO  */
    $('.slider').slick({
        dots: false,
        infinite: true,
        speed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: true,
        adaptiveHeight: true,
        prevArrow: $('.prev'),
        nextArrow: $('.next')
    });

    /*  ANIMATE with AOS */
    AOS.init({
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll

        // Settings that can be overriden on per-element basis, by `data-aos-*` attributes:
        offset: 120, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 400, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: false, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
    });
});