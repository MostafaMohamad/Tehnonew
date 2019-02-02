$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	PopulateList();
});

function PopulateList() {
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
				var list = data;
				ViewProducts(list)();

			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function ViewProducts(data) {
	'use strict';
	var s = "";
	var location = "img/products/";
	for (var i = 0; i < data.length; i++) {
		var lst = '<div class="col-lg-3 col-md-4 col-sm-6">'+
			'<div class="items col-xs-12">'+
			'<h5>' + data[i].product_brand + '</h5>'+
			'<h5><strong>' + data[i].product_name + '</strong></h5>'+
			'<a href="#"><img class="img-responsive img-home-portfolio" src="'+location+data[i].product_name+data[i].model_number+'/' + data[i].product_image + '"></a>'+
			'<div class="prices">'+
			'<h4 class = "col-xs-6" > '+data[i].product_price+' &#36; </h4>'+
			'<h4 class= "pull-right" > <a href = "#" > <span class = "fas fa-cart-plus" > </span></a> </h4>'+
			'</div></div></div>';
		s += lst;
	}

	$("#product-list").empty().append(s);
}
