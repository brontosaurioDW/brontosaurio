$(document).ready(function() {
    $(document).on("scroll", onScroll);
    $(document).on("scroll", changeMenuColor);

    //smoothscroll
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();

        $(document).off("scroll");

        var parentItem = $(this).parent('li');

        $('li').each(function() {
            $(this).removeClass('active');
        });

        $(parentItem).addClass('active');

        var target = this.hash,
            menu = target;

        $target = $(target);
        
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top + 10
        }, 1000, 'swing', function() {
            window.location.hash = '';
            $(document).on("scroll", onScroll);
        });
    });

    var hamburger = $('#hamburger-icon');
    hamburger.on('click', function() {
        hamburger.toggleClass('active');

        $('nav').slideToggle().toggleClass('open');

        $('nav.open a').on('click', function() {
            hamburger.removeClass('active');

            $('nav').slideUp().removeClass('open');
        });

        return false;
    });

    /*  SLIDER PORTFOLIO  */
    $('.slider').slick({
        dots: false,
        infinite: true,
        speed: 1700,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: true,
        adaptiveHeight: true,
        prevArrow: $('.prev'),
        nextArrow: $('.next')
    });
    
    /*  PARALLAX  */
    var s = skrollr.init({
        forceHeight: false
    });

    if ($(window).width() > 991) {
        Animate();
    }

    $(window).on('scroll', function(event) {
        if ($(window).width() > 991) {
            Animate();
        }
    });
});

function Animate() {
    /*  ANIMATE with AOS */
    AOS.init({
        disable: false,
        startEvent: 'DOMContentLoaded',
        initClassName: 'aos-init',
        animatedClassName: 'aos-animate',
        useClassNames: false,
        offset: 250,
        delay: 0,
        duration: 900,
        easing: 'ease',
        once: false,
        mirror: false,
        anchorPlacement: 'top-bottom',
    });
}

function onScroll(event) {
    var scrollPos = $(document).scrollTop();
    $('.menu li').each(function() {
        var currLink = $(this).find('a');
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos + 10 && refElement.position().top + refElement.height() > scrollPos) {
            $('.menu li').removeClass("active");
            $(this).addClass("active");
        } else {
            $(this).removeClass("active");
        }
    });

    if ($(window).scrollTop() > 800) {}
}

function changeMenuColor() {

    var scrollPos = $(document).scrollTop();

    var portfolioSection    = $('#portfolio').position().top + 10,
        porfolioHeight      = $('#portfolio').outerHeight(),
        contactSection      = $('#contact').position().top + 10,
        contactHeight       = $('#contact').outerHeight();

    if (portfolioSection <= scrollPos && portfolioSection + porfolioHeight > scrollPos) {
        $('.menu').removeClass('lg-menu');
    } else {
        $('.menu').addClass('lg-menu');
    }
}

