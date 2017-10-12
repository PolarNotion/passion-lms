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
  $('.content-list-wrapper', parent).toggleClass('no-width');
  $('.fa-chevron-circle-left', parent).toggleClass('switch-chevron');
});

// Toggle the List Content menu (on mobile - .hide-list only shows up on mobile)
$('.hide-list').click(function(){
  var parentModule = $(this).closest('.js-ContentList');
  $('.content-list-wrapper', parentModule).toggleClass('no-width');
  $('.fa-chevron-circle-left', parentModule).toggleClass('switch-chevron');
});

// Close the List Content mobile menu when an item is clicked
$('div[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  if ( $(window).width() < 768 ) {
    var parentModule = $(this).closest('.js-ContentList');
    $('.content-list-wrapper', parentModule).toggleClass('no-width');
    $('.fa-chevron-circle-left', parentModule).toggleClass('switch-chevron');
  }
});

// Stop a video when the modal closes
$(".modal").on('hidden.bs.modal', function(e) {
    $iframe = $(this).find( "iframe" );
    $iframe.attr("src", $iframe.attr("src"));
    // And for dropbox audio
    $('audio').each(function(){
        this.pause(); // Stop playing
        this.currentTime = 0; // Reset time
    });
});
