$(window).load(function() {
    $(".se-pre-con").fadeOut("slow");;
});

$(document).ready(function() {
    $(document).on("scroll", onScroll);
     
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");

        $('a').each(function () {
            $(this).parent('li').removeClass('active');
        })

        $(this).parent('li').addClass('active');

        var target = this.hash;
        $target = $(target);
        
        if (target == '#contact' || target == '#portfolio') {
            $('.menu').addClass('lg-menu');
        } else {
            $('.menu').removeClass('lg-menu');
        }

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top + 2
        }, 1000, 'swing', function () {
            window.location.hash = target;
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
        forceHeight: true
    });

    /*if ($(window).width() > 1199) {
        Animate();
    }

    $(window).on('scroll', function(event) {
        if ($(window).width() > 1199) {
            Animate();
        }
    });*/
});

/*function Animate() {
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
}*/

function onScroll(event) {
    var scrollPosition = $(document).scrollTop();
    $('nav a').each(function () {
        var currentLink = $(this);
        var refElement = $(currentLink.attr("href"));
        if (refElement.position().top - 10 <= scrollPosition && refElement.position().top - 10 + refElement.height() > scrollPosition) {
            $('nav ul li').removeClass("active");
            currentLink.parent('li').addClass("active");
        } else{
            currentLink.parent('li').removeClass("active");
        }
    });
}