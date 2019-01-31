// JavaScript Document
$(window).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	GetProducts();


	$("#pdt-subc").select2();
	FillOptions();

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

	/*$("#imup").click(function () {
		UploadImage();
	});*/

});

function GetProducts() {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_admin.php",
		data: ({
			op: "getpdts"

		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				$("#pdt-table").empty();
			} else if (data !== null) {
				var products = data;
				PopulateProducts(products);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function PopulateProducts(pdts) {
	'use strict';
	var items = '';
	for (var i = 0; i < pdts.length; i++) {
		items += "<tr>";
		items += "<td>" + pdts[i].product_name + "</td>";
		items += "<td>" + pdts[i].model_number + "</td>";
		items += "<td>" + pdts[i].subc_name + "</td>";
		items += "<td>" + pdts[i].product_brand + "</td>";
		items += "<td>" + pdts[i].product_price + "</td>";
		items += "<td>" + pdts[i].product_description + "</td>";
		items += "<td><img src='" + pdts[i].product_image + "'></td>";
		items += '<td class="col-lg-1"><button class="btn del"><i class="fa fa-trash"></i></button><p> </p><button class="btn edt"><i class="fas fa-edit"></i></button></td>';
		items += "</tr>";
	}
	$("#pdt-table").empty().append(items);
	
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
			if (data === null) {

			} else if (data !== null) {
				var pid = data;
				AddSpecs(pid);
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
	
}
