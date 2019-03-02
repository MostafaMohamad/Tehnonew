// JavaScript Document
$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	
	$("#tbl-specs").DataTable({
		"pagingType": "full_numbers",
		"aaSorting": [],
		"columnDefs": [{
			"targets": 2,
			"orderable": false
		}]
	});
	  
	var table = $("#tbl-specs").DataTable();
	$("#specs-search").keyup(function(){
		table.search($(this).val()).draw();
	});
	
	var spec_id;
	
	$(document).on("click", ".edit-btn", function () {
		spec_id = $(this).closest("tr").children('td:nth-child(1)').text();
		var spec_name = $(this).closest("tr").children('td:nth-child(2)').text();
		$("#edt-spec-name").val(spec_name);
	});
	/*$(".edit-btn").click(function () {
		spec_id = $(this).closest("tr").children('td:nth-child(1)').text();
		var spec_name = $(this).closest("tr").children('td:nth-child(2)').text();
		$("#edt-spec-name").val(spec_name);
	});*/

	$("#save-edt").click(function () {
		var edited = $("#edt-spec-name").val();
		EditSpec(spec_id, edited);
	});
	
	$("#add-nspec").click(function(){
		var new_spec = $("#new-spec-name").val();
		if(new_spec !== ''){
			AddNewSpec(new_spec);
		}
	});
});

function EditSpec(id, value) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "editspec",
			sid: id,
			sname: value
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

function AddNewSpec(spec){
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "addspec",
			sname: spec
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
