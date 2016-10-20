/*  Header module, makes it sticky when scrolling down.
	! make compatible with screen-size
*/
$('#menutoggle').click(function() {
	$('.nav-links.condensed').toggleClass('open');
});

$('.nav-pills', '.nav-links.condensed').children().click(function() {
	$('.nav-links.condensed').removeClass('open');
})