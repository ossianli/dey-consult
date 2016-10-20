/*  Header module, makes it sticky when scrolling down.
	! make compatible with screen-size
*/
var header = (function () {

	var scrollPos,
		scrollEl,
		hidden = false;

	function scrollWatcher() {
		$(window).scroll(function() {
			scrollPos = $(window).scrollTop();
			if(scrollPos >= 100) {
				fix();
			}
			else {
				loose(); 
			}
		});
	}

	// fix timings
	function fix() {
		$(scrollEl).css({'position': 'fixed', 'top':'-100px'});
		/*if(!hidden)
			$('.logo-condensed', scrollEl).animate({'top':'0px'},200)
		hidden = true;*/
	}

	function loose() {
		$(scrollEl).removeAttr('style');
		/*if(hidden)
			$('.logo-condensed', scrollEl).animate({'top':'-100px'},200)
		hidden = false;*/
	}

	return {
		init: function(element) {
			scrollEl = element;
			scrollWatcher();
		}
	}

})();