(function($) {

var spinnerContainer = $('#lh-submit-container');

$('.wpcf7-submit').on('click', function() {
	$('#lh-submit-container').addClass('active-spinner');
});

$('.wpcf7').on('wpcf7:invalid wpcf7:spam wpcf7:mailsent wpcf7:mailfailed', function () {
    $('#lh-submit-container').removeClass('active-spinner');
});

})(jQuery);