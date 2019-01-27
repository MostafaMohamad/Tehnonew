// JavaScript Document
$(window).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	RefreshList();
	$("#ct-list").on('change', function () {
		var ct_name = $("#ct-list").val();
		GetSubc(ct_name);
	});
	
	$("#newsubc").submit(function(){
		var ct_name = $("#ct-list1").val();
		var sc_name = $("#subc-text").val();
		
		AddNewSubc(ct_name,sc_name);
	});
});

function RefreshList(){
	'use strict';
	var ct_name = $("#ct-list").val();
	GetSubc(ct_name);
}
function GetSubc(ctname) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "subcname",
			ct_name: ctname


		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				$("#subc-list").empty();
			} else if (data !== null) {
				var subc_list = data;
				PopulateSubc(subc_list);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function PopulateSubc(data) {
	'use strict';
	var subclist = '';
	for (var i = 0; i < data.length; i++) {
		subclist += '<li class="list-group-item">' + data[i].subc_name + '</li>';
	}

	$("#subc-list").empty().append(subclist);

}

//Add new subcategory
function AddNewSubc(ctname, scname){
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "addsubc",
			ct_name: ctname,
			sc_name: scname


		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				$("#subc-list").empty();
			} else if (data !== null) {
				$('#subc-modal').modal('toggle');
				RefreshList();

			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}
