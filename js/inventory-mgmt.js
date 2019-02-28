// JavaScript Document
$(document).ready(function(){
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	$("#pdt-list").select2();
	
	GetProducts();
	$("#pdt-list").change(function(){
		var pid = $(this).val();
		GetSubItems(pid);
	});
	$("#open-form").click(function(){
		$('#add-inv-form')[0].reset();
		$("#error").css('visibility','hidden');
		$("#duplicate").css('visibility','hidden');
		$("#add-inv-btn").removeAttr("disabled");
	});
	$("#add-inv-form").submit(function(){
		var pid = $("#pdt-list").val();
		var sn = $("#SN").val();
		var wed = $("#wed").val();
		AddProductToInventory(pid,sn,wed);
	});
	
	$("#SN").keyup(function(){
		CheckSerialNumber($(this).val() ,$("#pdt-list").val());
	});
});

function GetProducts(){
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_products.php",
		data: ({
			op: "inv-pdt"

		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				$("#pdt-list").empty();
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

function PopulateOptions(options){
	'use strict';
	var opts = '';
	for(var i  = 0; i < options.length; i++ ){
		opts += '<option value ="'+options[i].product_id+'">'+options[i].product_name+' - '+options[i].model_number+' - ' +options[i].product_price+'&#36;</option>';
	}
	$("#pdt-list").empty().append(opts);
	GetSubItems(options[0].product_id);
}

function GetSubItems(pid){
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_products.php",
		data: ({
			op: "inv-subitems",
			pid: pid
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				$("#sub-items-list").empty();
				$("#qty").empty();
			} else if (data !== null) {
				var list = data;
				PopulateSubItems(list);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function PopulateSubItems(lst){
	'use strict';
	var list = '';
	var qty = 0;
	for(var i = 0; i < lst.length; i++){
		if(lst[i].status === 'available'){
			qty++;
		}
		list += '<tr><td>'+lst[i].SN+'</td>'+
			'<td>'+lst[i].warranty_end+'</td>'+
			'<td>'+lst[i].status+'</td></tr>';
	}
	var quantity = '<h4><i class="fas fa-shopping-basket"></i> Available quantity: '+qty+'</h4>';
	$("#qty").empty().append(quantity);
	$("#sub-items-list").empty().append(list);
}

function AddProductToInventory(pid,sn,wed){
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_products.php",
		data: ({
			op: "inv-add-item",
			pid: pid,
			sn: sn,
			wed: wed				
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
			} else if (data !== null) {
				GetSubItems(pid);
				$("#add-inv-Modal").modal('hide');
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function CheckSerialNumber(sn,pid){
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_products.php",
		data: ({
			op: "check-sn",
			sn: sn,
			pid: pid
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			$("#error").css('visibility','hidden');
			if (data === 0) {
				$("#add-inv-btn").removeAttr("disabled");
				$("#duplicate").css('visibility','hidden');
			}else if (data === 1){
				$("#add-inv-btn").attr("disabled", true);
				$("#duplicate").css('visibility','visible');
			}
		},
		error: function () {
			$("#error").css('visibility','visible');
			$("#add-inv-btn").attr("disabled", true);
		}
	});
}