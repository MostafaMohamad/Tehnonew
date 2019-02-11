// JavaScript Document
$(document).ready(function(){
	'use strict';
	$("#prof-mj,#os-type,#progs-list,#prog-os").select2();
	
	$("#mp-search").click(function(){
		var mp  = $("#prof-mj").val();
		var os = $("#os-type").val();
		var max_price = $("#max-price").val();
		window.location.href = "productslist.php?mp="+mp+"&os="+os+"&max-price="+max_price;
	});
	
	$("#prog-os").change(function(){
		alert($(this).val());
	});
});