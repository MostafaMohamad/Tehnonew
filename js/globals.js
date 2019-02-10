// JavaScript Document
$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";

	$("#search-btn").click(function () {
		var keyword = $("#search").val();
		window.location.href = 'productslist.php?keyword=' + keyword;
	});

	$("#search").keypress(function (e) {
		if (e.which === 13) {
			$("#search-btn").click();
		}
	});
	
});
