// JavaScript Document
$(window).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	var model;

	$("#allpdttbl").DataTable({
		"pagingType": "full_numbers",
		"aaSorting": [],
		"columnDefs": [{
			"targets": [6, 7, 8],
			"orderable": false
		}]
	});

	var table = $("#allpdttbl").DataTable();
	$('#tbl-search').keyup(function () {
		table.search($(this).val()).draw();
	});

	FillOptions();
	$("#pdt-subc").select2();
	
	FillSpecs();
	$(".spec-name").select2();
	
	$("#new-spec").click(function () {
		$("#specs-body").append('<div class="form-group col-xs-5"><select class="form-control spec-name" style="width: 100%;"></select></div><div class="form-group col-xs-5"><input type="text" class="form-control spec-val" ></div>');
		FillSpecs();
		$(".spec-name").select2();

	});

	/*$(document).on("keyup", ".spec-val", function () {
		alert($(".spec-val").eq($(".spec-val").index(this)).val());
		alert($(".spec-name").eq($(".spec-val").index(this)).val());
	});*/
	$("#imup").click(function () {
		UploadImage();
	});

	$(document).on("click", ".nftd", function () {
		model = $(this).closest("tr").children('td:nth-child(2)').text();
		var name = $(this).closest("tr").children('td:nth-child(1)').text();
		OpenModal(model, name, "#pdtname", "#pdtmodel", "#addtoftd");
	});

	$("#save-ftd").click(function () {
		AddPdtToFeatured(model, "addtoftd");
	});

	$(document).on("click", ".ftd", function () {
		model = $(this).closest("tr").children('td:nth-child(2)').text();
		var name = $(this).closest("tr").children('td:nth-child(1)').text();
		OpenModal(model, name, "#fpdtname", "#fpdtmodel", "#rm-ftd");
	});

	$("#save-nftd").click(function () {
		AddPdtToFeatured(model, "rmftd");
	});

	$(document).on("click", ".dis , .enb", function () {
		alert($(this).className());
		if ($(this).classList.contains("dis")) {
			alert("dis");
		}
		if ($(this).classList.contains("enb")) {
			alert("enb");
		}

		model = $(this).closest("tr").children('td:nth-child(2)').text();
		var name = $(this).closest("tr").children('td:nth-child(1)').text();
		OpenModal(model, name, "#dpdtname", "#dpdtmodel", "#disable");
	});

	$("#disable-pdt").click(function () {
		//EnableDisablePdt(model, "disablepdt");
	});

});

function OpenModal(model, name, pname, model_nb, modal_name) {
	'use strict';
	$(pname).empty().append(name);
	$(model_nb).empty().append(model);
	$(modal_name).modal('show');
}

function FillOptions() {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "getallsubc"

		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				$("#pdt-subc").empty();
			} else if (data !== null) {
				var options = data;
				PopulateOptions(options);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function PopulateOptions(option) {
	'use strict';
	for (var i = 0; i < option.length; i++) {
		$('#pdt-subc').append($('<option>', {
			value: option[i].subc_name,
			text: option[i].subc_name
		}));
	}
}

function FillSpecs() {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "getallspecs"

		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {

			} else if (data !== null) {
				var specs = data;
				PopulateSpecs(specs);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function PopulateSpecs(spec) {
	'use strict';
	for (var i = 0; i < spec.length; i++) {
		$('.spec-name').append($('<option>', {
			value: spec[i].spec_name,
			text: spec[i].spec_name
		}));
	}
}

function UploadImage() {
	'use strict';
	var data = new FormData();
	var filename = $("#pdt-name").val() + $("#pdt-model").val();

	data.append('file', $("#pdt-image")[0].files[0], filename);

	$.ajax({
		type: 'post',
		url: window.serverURL + 'upload.php',
		processData: false,
		contentType: false,
		data: data,
		success: function (response) {
			if (response !== null) {
				var p_image = response;
				AddNewProduct(p_image);
			} else {

			}
		},
		error: function (err) {
			alert(err);
			$(".error").css("display", "inline-block");
		}
	});
}

function AddNewProduct(pimage) {
	'use strict';
	var name = $("#pdt-name").val();
	var model = $("#pdt-model").val();
	var subc = $("#pdt-subc").val();
	var brand = $("#pdt-brand").val();
	var price = $("#pdt-price").val();
	var desc = $("#pdt-dsc").val();

	AddPdt(name, model, subc, brand, price, desc, pimage);

}

function AddPdt(name, model, subc, brand, price, desc, pimage) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "addpdt",
			pname: name,
			pmodel: model,
			subc: subc,
			pbrand: brand,
			pprice: price,
			pdsc: desc,
			pimage: pimage


		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data !== "-1") {
				var pid = data;
				AddSpecs(pid);
			}else{
				alert(data);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});

}

function AddSpecs(pid) {
	'use strict';
	var classLength = $(".spec-val").length;
	var names = [];
	var specs = [];
	for (var i = 0; i < classLength; i++) {
		names.push($(".spec-name").eq(i).val());
		specs.push($(".spec-val").eq(i).val());
	}

	AddPdtSpecs(pid, names, specs);
}

function AddPdtSpecs(pid, specs_names, specs_values) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "addspecs",
			pid: pid,
			Snames: specs_names,
			Svalues: specs_values


		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {

			} else if (data !== null) {
				UploadAllImages(pid);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function UploadAllImages(pid){
	'use strict';
	var file  = $("#images");
	var data = new FormData();
	var fileSize = file[0].files.length;
	var fileList = [];
	var folderNAme = $("#pdt-name").val() + $("#pdt-model").val();
	
	for(var i = 0; i < fileSize; i++){
		fileList.push(file[0].files[i]);
		data.append('images[]',file[0].files[i],folderNAme);
	}
	$.ajax({
		type: 'POST',
		url: window.serverURL + "multiple_upload.php",
		processData: false,
		contentType: false,
		data: data,
		success: function(response){
			var names = response.substring(0,response.length - 1);
			var namesList = names.split(',');
			
			SendImagesNames(pid,namesList);
		},
		error: function(err){
			alert(err);
		}
	});	
}

function SendImagesNames(pid,namesList){
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "pdtphotos",
			pid: pid,
			names: namesList
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {

			} else if (data !== null) {
				location.reload();
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

//Add or remove a featured product
function AddPdtToFeatured(model, operation) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: operation,
			pmodel: model
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			location.reload();
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}
