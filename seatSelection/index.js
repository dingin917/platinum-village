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
	if (checked.length) {
		addtoCart.removeAttribute('disabled');
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

function confirm(){
	var checked = document.querySelectorAll('input[type = "checkbox"]:checked');
	var result = Array.from(checked);
	var seatsresult = [];
	for (i = 0; i < result.length; i++) {
		seatsresult[i] = result[i].value;
	}
	window.location.href = "index.php?seat_confirm=" + seatsresult + "&timeslotid=" + timeslotid;
}