$('.chked').change(function button() {
	if ($('.chked:checked').length) {
        $('.addto-cart').removeAttr('disabled');
        $('.confirm').removeAttr('disabled');
		$('.ticket-info').show();
	} else {
        $('.confirm').attr('disabled', 'disabled');
        $('.addto-cart').attr('disabled', 'disabled');
		$('.ticket-info').hide();
		}
});
