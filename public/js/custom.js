(function ($) {

    // Init Wow
    wow = new WOW( {
        animateClass: 'animated',
        offset:       100
    });
    wow.init();

    // Navigation scrolls
    $('.navbar-nav li a').bind('click', function(event) {
        $('.navbar-nav li').removeClass('active');
        $(this).closest('li').addClass('active');
        var $anchor = $(this);
        var nav = $($anchor.attr('href'));
        if (nav.length) {
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');

        event.preventDefault();
        }
    });

    // About section scroll
    $(".overlay-detail a").on('click', function(event) {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function(){
            window.location.hash = hash;
        });
    });

    // Testimonials Slider
    $('.bxslider').bxSlider({
      adaptiveHeight: true,
      mode: 'fade'
    });

})(jQuery);
