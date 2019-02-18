// JavaScript Document
$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";

	$("#search-btn").click(function () {
		var keyword = $("#search").val();
		window.location.href = 'productslist.php?keyword=' + keyword;
		AddRecom(keyword);
	});

	$("#search").keypress(function (e) {
		if (e.which === 13) {
			$("#search-btn").click();
		}
	});

});

function AddRecom(keyword) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_users.php",
		data: ({
			op: "addkeyword",
			keyword: keyword
		}),

		dataType: 'json',
		timeout: 5000,
		success: function () {},
		error: function () {}
	});
}
