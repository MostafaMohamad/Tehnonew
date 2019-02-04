// JavaScript Document
$(document).ready(function () {
	'use strict';
	$(".cat").click(function () {
		var index = $(".cat").index(this);
		var cat = $(this).text();
		GetSubcat(cat, index);
	});
	window.serverURL = "http://localhost/technonew/ws/";
	
	
});
function GetSubcat(catname, index) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_products.php",
		data: ({
			op: "subcat",
			catname: catname
		}),
		cache: true,
		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				alert("null");
			} else if (data !== null) {
				var list = data;
				PopulateSubcat(list, index);

			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function PopulateSubcat(list, index) {
	'use strict';
	if(list.length > 0){
	var subc_items = '';
	for (var i = 0; i < list.length; i++) {
		subc_items += '<li><a href="productslist.php?category=' + list[i].subc_name + '">' + list[i].subc_name + '</a></li><br>';
	}
	$(".cat").eq(index).next().empty().append(subc_items);
	}
}

