var total_price;
var timeslotid;

function pageLoad() {
	document.getElementById("seatsNo").innerHTML = 0;
	document.getElementById("toAmount").innerHTML = '0.00';
	timeslotid = document.getElementById("hidden").innerHTML;
}
function seatClick() {
	var checked = document.querySelectorAll('input[type = "checkbox"]:checked');
	console.log(checked);
	var addtoCart = document.getElementById('addto-cart');
	var confirm = document.getElementById('confirm');
	if (checked.length) {
		addtoCart.removeAttribute('disabled');
		confirm.removeAttribute('disabled');
		var ticket_price = document.getElementById("ticket_price").innerHTML;
		var ticketNo = checked.length;
		if (ticketNo) {
			var total = ticketNo * ticket_price;
			total_price = total.toFixed(2);
		}
		else {
			total = 0;
			total_price = total.toFixed(2);
		}

		var result = Array.from(checked);
		var seatsresult = '';
		for (i = 0; i < result.length; i++) {
			seatsresult = seatsresult + ',  ' + result[i].value;
		}
		seatsresult = seatsresult.substring(1);
		document.getElementById("seatsNo").innerHTML = seatsresult;
		document.getElementById("toAmount").innerHTML = total_price;
	}
	else {
		addtoCart.setAttribute('disabled', 'disabled');
		confirm.setAttribute('disabled', 'disabled');
	}
}

function add_to_cart() {
	var checked = document.querySelectorAll('input[type = "checkbox"]:checked');
	var result = Array.from(checked);
	var seatsresult = [];
	for (i = 0; i < result.length; i++) {
		seatsresult[i] = result[i].value;
	}
	window.location.href = "index.php?seat=" + seatsresult + "&total_price=" +total_price + "&timeslotid=" + timeslotid;
}

// $('.chked').click(function() {
// 	if ($('.chked:checked').length) {
//         $('#addto-cart').removeAttr('disabled');
//         $('#confirm').removeAttr('disabled');
// 	} else {
//         $('#confirm').attr('disabled', 'disabled');
//         $('#addto-cart').attr('disabled', 'disabled');
// 		}
// });

// var total_price;
// var timeslotid;
// $('.chked').change(function(){
// 		var ticket_price = document.getElementById("ticket_price").innerHTML;
// 		var ticketNo = $(".chked:checked").length;
// 		if (ticketNo) {
// 			var total = ticketNo * ticket_price;
// 			total_price = total.toFixed(2);
// 		}
// 		else {
// 			total = 0;
// 			total_price = total.toFixed(2);
// 		}
// 		document.getElementById("seatsNo").innerHTML = ticketNo;
// 		document.getElementById("toAmount").innerHTML = total_price;
// });


// $(document).ready(function() {
// 	document.getElementById("seatsNo").innerHTML = 0;
// 	document.getElementById("toAmount").innerHTML = '0.00';
// 	timeslotid =document.getElementById("hidden").innerHTML;
// });

// $('.addto-cart').click(function(){
// 	var seat = [];
// 	$.each($("[type='checkbox']:checked"), function(){
// 		seat.push($(this).val());
// 		var seatid = '#' + $(this).val();
// 		$(seatid).attr('disabled', 'disabled');
// 	});

// 	window.location.href = "index.php?seat=" + seat + "&total_price=" +total_price + "&timeslotid=" + timeslotid;
// });