// JavaScript Document
$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/";
	$(".cart-del").click(function () {
		var cart_id = $(this).val();
		RemoveFromCart(cart_id);

	});

	$(".price-input").keyup(function () {
		$(".price-input").each(function () {

			var sum = 0;
			sum += parseFloat(this.value);
			
		});
	});


});

function RemoveFromCart(cid) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "cart-mgmt.php",
		data: ({
			op: "delcart",
			cart_id: cid
		}),

		dataType: 'json',
		timeout: 5000,
		success: function () {
			location.reload();

		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});

}
