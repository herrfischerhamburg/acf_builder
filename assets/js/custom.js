"use strict";

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

jQuery(function ($) {
  var header = $('body');
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      header.removeClass('oben').addClass('unten');
    } else {
      header.removeClass('unten').addClass('oben');
    }
  });
  $(window).load(function () {
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

$(document).ready(function () {
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
}); // Content

$(document).ready(function () {
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
    menuClass: 'left-side',
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

$('a[href*=#]:not([href=#])').click(function () {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

    if (target.length) {
      $('html,body').animate({
        scrollTop: target.offset().top
      }, 1000);
      return false;
    }
  }
});