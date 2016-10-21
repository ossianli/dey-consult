/*  Header module, makes it sticky when scrolling down.
	! make compatible with screen-size
*/
$('#menutoggle').click(function() {
	$('.nav-links.condensed').toggleClass('open');
});

$('.nav-pills', '.nav-links.condensed').children().click(function() {
	$('.nav-links.condensed').removeClass('open');
})

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });
});