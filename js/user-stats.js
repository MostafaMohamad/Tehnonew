// JavaScript Document
$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	RegUser("2019");
});
function RegUser(Year) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_stats.php",
		data: ({
			op: "user-month",
			year: Year
			

		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {} else if (data !== null) {
				var user = [] ;
				var month = [] ;
				for(var i = 0 ; i<data.length ; i++){
					user.push(data[i].total);
					month.push(data[i].month);
					
				}
				FillBarChart(user);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}


function FillBarChart(user) {
	'use strict';
	var ctx = $("#myChart");
	var myChart = new Chart(ctx, {
		"type": "bar",
		"data": {
			"labels": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			"datasets": [{
				"label": "New users",
				"data": user,
				"fill": false,
				"backgroundColor": "rgba(255, 99, 132, 0.2)",
				"borderColor": "rgb(255, 99, 132)",
				"borderWidth": 1
			}, ]
		},
		"options": {
			"scales": {
				"yAxes": [{
					"ticks": {
						"beginAtZero": true
					}
				}]
			}
		}
	});
}