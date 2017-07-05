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
})
