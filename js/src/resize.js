(function($) {
	$(window).resize(function() {
		viewPortWidth = $(window).width();
		if (viewPortWidth >= 768 && $('.menu').css('display') == 'none') {
			$('.menu').css('display', 'block');
		}
	});
})(jQuery);