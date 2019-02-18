// JavaScript Document
$(document).ready(function(){
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	
	$("#prof-mj,#os-type,#progs-list,#prog-os").select2();
	
	$("#mp-form").submit(function(){
		var mp  = $("#prof-mj").val();
		var os = $("#os-type").val();
		var max_price = $("#max-price").val();
		window.location.href = "productslist.php?mp="+mp+"&os="+os+"&max-price="+max_price;
	});
	
	$("#prog-form").submit(function(){
		var progList = $("#progs-list").val();
		var os = $("#prog-os").val();
		var max_price = $("#prog-max-price").val();
		window.location.href = "productslist.php?programs="+progList+"&os="+os+"&max-price="+max_price;
	});
	
	$("#prog-os").change(function(){
		GetProgramsList($(this).val());
	});
	
	GetProgramsList("All");
	
	$(".choice").click(function(){
		$('#prog-form')[0].reset();
		$('#mp-form')[0].reset();
	});
});

function GetProgramsList(os){
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_search.php",
		data: ({
			op: "progbyos",
			os: os

		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data !== null) {
				var progs = data;
				FillProgList(progs);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function FillProgList(programs){
	'use strict';
	var progList = '';
	for(var i = 0; i< programs.length ; i++){
		progList += '<option value = "'+programs[i].prog_name+'">'+programs[i].prog_name+'</option>';
	}
	$("#progs-list").empty().append(progList);
	$("#progs-list").select2();
}