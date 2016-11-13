(function($) {
	var inputs = $('.wpcf7');

	inputs.on('focus', 'textarea, input[type="text"], input[type="email"]', function() {
		$(this).parent().parent().find('label').first().addClass('lh-focused');
	});

	inputs.on('blur', 'textarea, input[type="text"], input[type="email"]', function() {
		if ($(this).val().length < 1) {
			$(this).parent().parent().find('label').first().removeClass('lh-focused');
		}
	});

	var searchForm = $('.search-form .search-field');

	searchForm.on('focus', function() {
		$(this).parent().find('label').first().addClass('lh-focused');
	});

	searchForm.on('blur', function() {
		if ($(this).val().length < 1) {
			$(this).parent().find('label').first().removeClass('lh-focused');
		}
	});

})(jQuery);