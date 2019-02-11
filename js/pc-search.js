// JavaScript Document
$(document).ready(function(){
	'use strict';
	$("#prof-mj,#os-type").select2();
	
	$("#mp-search").click(function(){
		var mp  = $("#mp").text();
		var os = $("#os-type").val();
		var max_price = $("#max-price").val();
		window.location.href = "productslist.php?mp="+mp+"&os="+os+"&max-price="+max_price;
	});
	
});