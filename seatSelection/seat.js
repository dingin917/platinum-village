<<<<<<< HEAD
$('.chked').click(function() {
	if ($('.chked:checked').length) {
        $('.addto-cart').removeAttr('disabled');
        $('.confirm').removeAttr('disabled');
	} else {
        $('.confirm').attr('disabled', 'disabled');
        $('.addto-cart').attr('disabled', 'disabled');
		}
});

var total_price;
var timeslotid;
$('.chked').change(function(){
		var ticket_price = document.getElementById("ticket_price").innerHTML;
		var ticketNo = $(".chked:checked").length;
		if (ticketNo) {
			var total = ticketNo * ticket_price;
			total_price = total.toFixed(2);
		}
		else {
			total = 0;
			total_price = total.toFixed(2);
		}
		document.getElementById("seatsNo").innerHTML = ticketNo;
		document.getElementById("toAmount").innerHTML = total_price;
});


$(document).ready(function() {
	document.getElementById("seatsNo").innerHTML = 0;
	document.getElementById("toAmount").innerHTML = '0.00';
	timeslotid =document.getElementById("hidden").innerHTML;
});

$('.addto-cart').click(function(){
	var seat = [];
	$.each($("[type='checkbox']:checked"), function(){
		seat.push($(this).val());
		var seatid = '#' + $(this).val();
		$(seatid).attr('disabled', 'disabled');
	});

	window.location.href = "index.php?seat=" + seat + "&total_price=" +total_price + "&timeslotid=" + timeslotid;
});
=======
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
>>>>>>> c37ea7fa4675d1f1035f3c399aa860eb94a5066e
