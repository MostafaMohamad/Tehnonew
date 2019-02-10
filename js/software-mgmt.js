// JavaScript Document
$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	$("#hgf").select2({
		templateResult: '<span><img src="img/programs/Adobe Dreamweaver/08022019155856.svg" class="img-flag">Chrome</span>'
	});
	var table = $("#all-prog-tbl").DataTable();
	$("#progs-search").keyup(function () {
		table.search($(this).val()).draw();
	});
	$("#btn-add-prog").click(function () {
		$("#new-program-form")[0].reset();
	});
	$("#new-program-form").submit(function () {
		UploadIcon();
	});

	$("#btn-add-ext").click(function () {
		$("#ext-program-form")[0].reset();
		GetAllPrograms();
	});

	$("#ext-program-form").submit(function () {
		var prog_id = $("#ext-prog").val();
		AssignSpecs(prog_id, "ext");
	});
});

function UploadIcon() {
	'use strict';
	var data = new FormData();
	var filename = $("#prg-name").val();

	data.append('icon', $("#icon")[0].files[0], filename);

	$.ajax({
		type: 'post',
		url: window.serverURL + 'upload_icon.php',
		processData: false,
		contentType: false,
		data: data,
		success: function (response) {
			if (response !== null) {
				var prog_image = response;
				NewSoftware(prog_image);
			} else {

			}
		},
		error: function (err) {
			alert(err);
		}
	});
}

function NewSoftware(icon) {
	'use strict';
	var name = $("#prg-name").val();
	var details = $("#prg-name").val();

	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "addprog",
			pname: name,
			pimage: icon,
			pdetails: details
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (response) {
			if (response !== 'null' || response !== '-1' || response !== '0') {
				var prog_id = response;
				AssignSpecs(prog_id, "new");
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function AssignSpecs(pid, op) {
	'use strict';
	var cpu;
	var ram;
	var gpu;
	var os;
	var osv;
	var mcore;

	if (op === "new") {
		cpu = $("#cpu").val();
		ram = $("#ram").val();
		gpu = $("#gpu").val();
		os = $("#os").val();
		if ($("#os-v").val() === '64 bit') {
			osv = "1";
		} else {
			osv = "0";
		}
		if ($("#m-core").val() === "Yes") {
			mcore = "1";
		} else if ($("#m-core").val() === "No") {
			mcore = "0";
		}

	} else if (op === 'ext') {

		cpu = $("#xcpu").val();
		ram = $("#xram").val();
		gpu = $("#xgpu").val();
		os = $("#xos").val();
		if ($("#xos-v").val() === '64 bit') {
			osv = "1";
		} else {
			osv = "0";
		}
		if ($("#xm-core").val() === "Yes") {
			mcore = "1";
		} else if ($("#xm-core").val() === "No") {
			mcore = "0";
		}
	}
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "progspecs",
			prog_id: pid,
			cpu: cpu,
			ram: ram,
			gpu: gpu,
			os: os,
			osv: osv,
			mcore: mcore
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

function GetAllPrograms() {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "getallprog"
		}),

		cache: true,
		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data !== null) {
				var progs = data;
				PopulateSelect(progs);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function PopulateSelect(progs) {
	'use strict';
	var progams = "";
	for (var i = 0; i < progs.length; i++) {
		progams += '<option value="' + progs[i].prog_id + '">' + progs[i].prog_name + '</option>';
	}
	$("#ext-prog").empty().append(progams);
	$("#ext-prog").select2();
}
