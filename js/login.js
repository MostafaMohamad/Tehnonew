$(document).ready(function () {
	'use strict';
	window.serverURL = "http://localhost/technonew/ws/";
	$("#login-form").submit(function () {
		var email = $("#login-email").val();
		var pass = $("#login-pass").val();
		UserLogin(email, pass);

	});

	$("#login-email , #login-pass").keyup(function () {
		$(".error").css("display", "none");
	});

});


function UserLogin(email, password) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_users.php",
		data: ({
			op: "login",
			uemail: email,
			uuname: email,
			upass: password
			
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {
				$(".error").css("display", "inline-block");
			} else if (data !== null) {
				var utype = data.user_type;
				UserType(utype);
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function UserType(type) {
	"use strict";
	if (type === '0') {
		alert("normal");
	} else if (type === '1') {
		alert("admin");
	}
}
