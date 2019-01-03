// JavaScript Document

$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	$("#add_new").click(function () {

		$("#ptable").each(function () {

			var tds = '<tr><td><input type="text" class="form-control"></td>' +
				'<td><div class="dropdown"><p class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Select category <span class="caret"></span></p><ul class="dropdown-menu"><li><a href="#">HTML</a></li><li><a href="#">CSS</a></li><li><a href="#">JavaScript</a></li></ul></div></td>' +
				'<td><input type="text" class="form-control"></td>' +
				'<td><input type="text" class="form-control"></td>' +
				'<td><a href="#"><img src="http://placehold.it/50x50"></a></td>' +
				'<td><input type="number" min="0" class="form-control"></td>' +
				'<td></td>';
			tds += '</tr>';
			if ($('tbody', this).length > 0) {
				$('tbody', this).append(tds);
			} else {
				$(this).append(tds);
			}
		});
	});

	PopulateTable();
});

function PopulateTable() {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_products.php",
		data: ({
			op: "allproducts"
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				alert("null");
			} else if (data !== null) {
				var products = data;
				Populate(products);
				

			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}
function Populate(prod){
	'use strict';
	var t = "";
				for (var i = 0; i < prod.length; i++) { 
					var tds = '<tr>';
					tds += '<td>' + prod[i].p_name + '</td>';
					tds += '<td>' + prod[i].p_id + '</td>';
					tds += '<td>' + prod[i].p_brand + '</td>';
					tds += '<td>' + prod[i].p_description + '</td>';
					tds += '<td><img style="max-width:100px; max-height:100px;" src="http://localhost/technonew/img/p_img/'+ prod[i].p_image + '"></td>';
					tds += '<td>' + prod[i].p_price + '</td>';
					tds += '<td>' + prod[i].p_created + '</td>';
					tds += '</tr>';
					t += tds;
				}
				
				$("#ptable").append(t);

}
