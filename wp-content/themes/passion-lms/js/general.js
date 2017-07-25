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

$(function() {
  $('.js-content-list').matchHeight({
    target: $('.content-pane-wrapper')
  });
});

// $('div[data-toggle="tab"]').on('shown.bs.tab', function (e) {
//   $('.js-content-list').matchHeight({
//     target: $('.content-pane-wrapper')
//   });
// });

$('.view-more-btn').click(function() {
  var currentText = $(this).text();
  if (currentText == 'VIEW MORE') {
    $(this).text("SHOW LESS");
  } else {
    $(this).text("VIEW MORE");
  }
});

//// test the YouTube Video Ratio Keeper
// var $allVideos = $("iframe[src^='https://www.youtube.com']"),
//     $fluidEl = $(".content-pane-wrapper");
//
// test the video bigger button on the content list module
$('#video-bigger').click(function(){
  $('.content-pane-wrapper').toggleClass('full-width');
  $('.content-list-wrapper').toggleClass('hidden');
});
//
// // Figure out and save aspect ratio for each video
// $allVideos.each(function() {
//   $(this).data('aspectRatio', this.height / this.width)
//
//   // and remove the hard coded width / height
//   .removeAttr('height')
//   .removeAttr('width');
//
// });
//
// // When the window is resized
// $(window).resize(function() {
//   var newWidth = $fluidEl.width();
//
//   //Resize all videos according to their own aspect ratio
//   $allVideos.each(function() {
//     var $el = $(this);
//     $el
//       .width(newWidth)
//       .height(newWidth * $el.data('aspectRatio'));
//   });
// // Kick off one resize to fix all videos on page load
// }).resize();
