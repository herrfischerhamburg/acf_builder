/**
 * Custom JS.
 *
 * Custom JS scripts.
 *
 * @since 1.0.0
 */
console.log('CustomJS');

/**
 * Scroll down
 */
jQuery(function($) {
    var header = $('body');
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            header.removeClass('oben').addClass('unten');
        } else {
            header.removeClass('unten').addClass('oben');
        }
    });
    $(window).load(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            header.removeClass('oben').addClass('unten');
        } else {
            header.removeClass('unten').addClass('oben');
        }
    });
});

/** 
 * Slick Slider
 */
// Header
$(document).ready(function(){
    $('.slider').on('init', function () {
        $(this).css('visibility', 'visible');
    });
    $('.slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4500,
        dots: false,	
        arrows: false,
        fade: true,
        pauseOnHover: false
    });
});
// Content
$(document).ready(function(){
    $('.slider_content').on('init', function () {
        $(this).css('visibility', 'visible');
    });
    $('.slider_content').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4500,
        dots: true,	
        arrows: false,
        fade: true,
        pauseOnHover: false
    });
});

/**
 * Dropotron 
 */
// $('#main-nav > ul').dropotron({
//     menuClass: 'dropotron',
//     speed: 'fast',
//     // mode: 'slide',
//     easing: 'linear',
//     expandMode: 'hover',
//     hoverDelay: 100,
//     hideDelay: 100,
//     offsetY: 10,
//     alignment: 'center',
//     speed: 200,
// });

/**
 * Moby
 */
$(document).ready(function () {
    var mobyMenu = new Moby({
      breakpoint: 1024,
      enableEscape: true,
      menu: $('#main-nav'),
      menuClass: 'right-side',
      mobyTrigger: $("#moby-button"),
      onClose: false,
      onOpen: true,
      overlay: true,
      overlayClass: 'dark',
      subMenuOpenIcon: '<span>&#x25BC;</span>',
      subMenuCloseIcon: '<span>&#x25B2;</span>',
      template: '<div class="moby-wrap"><div class="moby-close"><span class="moby-close-icon"></span></div><div class="moby-menu"></div></div>'
    });
});

/**
 * Scrollto
 */
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {

        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           if (target.length) {
             $('html,body').animate({
                 scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    }
});

/**
 * AOS
 */
AOS.init({
    // Global settings:
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
    initClassName: 'aos-init', // class applied after initialization
    animatedClassName: 'aos-animate', // class applied on animation
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
    

    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: 20, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 500, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
});
