(function ($) {
	'use strict';
//================== For Slider =======================
	
	jQuery(document).ready(function () {

		$('.slider-area').owlCarousel({
			items: 1,
			nav: false,
			dots: true,
			loop: true
		});
		
//================= For sticky header ================
		
		$(window).scroll(function(){
			
			var top = $(window).scrollTop();
			
			if(top >= 70)
				{
					$('.absoulate-header').addClass('sticky-header');
				}
			else if($('.absoulate-header').hasClass('sticky-header'))
				{
					$('.absoulate-header').removeClass('sticky-header');
				}
		});

	});


})(jQuery);