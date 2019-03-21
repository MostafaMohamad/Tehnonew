// JavaScript Document
$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	$("#pm-list").select2();
	GetPM();
	$("#pm-list").change(function () {
		var pid = $(this).val();
		GetAssignedPrograms(pid);
	});
	
	$("#add-pm-form").submit(function(){
		var name = $("#pm").val();
		var pm_type = $( "#pm-type option:selected" ).text();
		AddNewPM(name, pm_type);
	});
});

function GetPM() {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "pm-list"

		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				$("#pm-list").empty();
			} else if (data !== null) {
				var PMs = data;
				PopulatePM(PMs);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function PopulatePM(list) {
	'use strict';
	var pm_list = '';
	for (var i = 0; i < list.length; i++) {
		pm_list += '<option value ="' + list[i].pm_id + '">' + list[i].pm_name + '</option>';
	}
	$("#pm-list").empty().append(pm_list);
	GetAssignedPrograms(list[0].pm_id);
}

function GetAssignedPrograms(pm_id) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "assigned-progs",
			pm_id: pm_id
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				$("#progs-list").empty();
			} else if (data !== null) {
				var list = data;
				PopulateAssignedProgs(list);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function PopulateAssignedProgs(list) {
	'use strict';
	var programs = '';
	for(var i = 0; i< list.length; i++){
		programs += '<li class="list-group-item">'+list[i].prog_name+'</li>';
	}
	$("#progs-list").empty().append(programs);
}

function AddNewPM(name,pm_type){
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "new-pm",
			name: name,
			pm_type: pm_type
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
			} else if (data !== null) {
				PopulatePM();
				$("#add-pm-form")[0].reset();
				$("#add-pm-Modal").modal("hide");
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}
