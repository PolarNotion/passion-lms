/**
 * general.js
 *
 */

// Smooth scrolling to targets on the same page
$('a[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top - 59
      }, 1000);
      return false;
      $(window).scroll();
    }
  }
});

// Open collapsed navigation on mobile
$(".toggleable").click(function(){
  var target = $(this).data('target');

  $(target).fadeToggle();

  return false;
});

// Match .card heights with jquery.matchHeight.js
$(function() {
	$('.js-height').matchHeight();
});

$('.view-more-btn').click(function() {
  var currentText = $(this).text();
  if (currentText == 'VIEW MORE') {
    $(this).text("SHOW LESS");
  } else {
    $(this).text("VIEW MORE");
  }
});

// test the video bigger button on the content list module
$('.video-bigger').click(function(){
  var parent = $(this).closest('.content-list-module-wrapper');
  $('.content-pane-wrapper', parent).toggleClass('full-width');
  $('.content-list-wrapper', parent).toggleClass('hidden');
  $('.fa-chevron-circle-left', parent).toggleClass('switch-chevron');
});

$('.hide-list').click(function(){
  var parentModule = $(this).closest('.js-content-list');
  $('.content-list-wrapper', parentModule).toggleClass('hidden');
  $('.fa-chevron-circle-left', parentModule).toggleClass('switch-chevron');
});
