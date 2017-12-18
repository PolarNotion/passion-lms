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

// View More button on Grid Content
$('.view-more-btn').click(function() {
  var currentText = $(this).text();
  if (currentText == 'VIEW MORE') {
    $(this).text("SHOW LESS");
  } else {
    $(this).text("VIEW MORE");
  }
});

// Toggle the List Content menu (on mobile - .hide-list only shows up on mobile)
$('.hide-list').click(function(){
  var parentModule = $(this).closest('.js-ContentList');
  $('.content-list-wrapper', parentModule).toggleClass('no-width');
  $('.fa-chevron-circle-left', parentModule).toggleClass('switch-chevron');
  if ( $(window).width() > 767 ) {
    $('.content-pane-wrapper', parentModule).toggleClass('full-width');
    $('.content-list-module-wrapper', parentModule).toggleClass('full-width');
  }
});

// Close the List Content mobile menu when an item is clicked
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  if ( $(window).width() < 768 ) {
    var parentModule = $(this).closest('.js-ContentList');
    $('.content-list-wrapper', parentModule).toggleClass('no-width');
    $('.fa-chevron-circle-left', parentModule).toggleClass('switch-chevron');
  }
});

function pauseAllVideos() {
  $('iframe').each(function () {
    $this = $(this)
    if ($this.data('haivision-id')) {
      haivisionId = $this.data('haivision-id');
      return window["player" + haivisionId].pause(true);
    }
    $this.attr("src", $this.attr("src"));    
  })
}

function pauseAllAudio () {
  $('audio').each(function(){
    this.pause(); // Stop playing
    this.currentTime = 0; // Reset time
  });
}

function pauseAllMedia () {
  pauseAllAudio();
  pauseAllVideos();
}

//This will stop all videos
function pauseClosestMedia(context) {
  $iframe = $(context).find( "iframe" );
  $iframe.attr("src", $iframe.attr("src"));
  // For Haivision
  haivisionId = $iframe.data('haivision-id');
  if (haivisionId) { window["player" + haivisionId].pause(true); }
  // For dropbox audio
  $('audio').each(function(){
    this.pause(); // Stop playing
    this.currentTime = 0; // Reset time
  });
}

// Stop a video when the modal closes
$(".modal").on('hide.bs.modal', function(e) {
  pauseClosestMedia(this);
});

$('.modal').on('show.bs.modal', function (e) {
  pauseAllMedia();
})

// Reset or Pause a video/audio when another content list item is clicked.
$('a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
  pauseAllMedia();
});
