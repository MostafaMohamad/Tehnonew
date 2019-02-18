// JavaScript Document
$(document).ready(function () {
	'use strict';
	$("#uname").keyup(function () {
		var uname = $("#uname").val();
		useravailability(uname);

	});
	$("#email").keyup(function () {
		var email = $("#email").val();
		emailavailability(email);

	});

	//Set MAX Date to current date
	$(function () {
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth() + 1;
		var yyyy = today.getFullYear() - 18;
		if (dd < 10) {
			dd = '0' + dd;
		}
		if (mm < 10) {
			mm = '0' + mm;
		}

		today = yyyy + '-' + mm + '-' + dd;
		$("#dob").val(today);
		$("#dob").attr("max", today);
	});

	window.serverURL = "http://localhost/technonew/ws/";
	$("#signup-form").submit(function () {
		checkPasswordMatch();
		//alert(fullname+username+email+dateofbirth+gender+password);
	});

	$("#cpass , #pass").keyup(function () {
		$(".error").css("display", "none");


	});

});

function SIGNUP(fullname, username, email, dateofbirth, gender, password) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_users.php",
		data: ({
			op: "register",
			ufname: fullname,
			uuname: username,
			uemail: email,
			ugender: gender,
			udob: dateofbirth,
			upass: password,
			utype: "0",
			ustatus: "ACTIVE"

		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === null) {} else if (data !== null) {
				window.location.href = "index.php";
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function checkPasswordMatch() {
	'use strict';
	var password = $("#pass").val();
	var confirmPassword = $("#cpass").val();
	var fullname = $("#fname").val();
	var username = $("#uname").val();
	var email = $("#email").val();
	var dateofbirth = $("#dob").val();
	var gender = $("#gender").val();


	if (password !== confirmPassword) {

		$(".error").css("display", "inline-block");

	} else if (password === confirmPassword && $("#evalidationicon , #validationicon").hasClass("fa-check-circle")) {
		$("#divCheckPasswordMatch").html("Passwords match.").addClass('text-success').removeClass('text-danger');
		SIGNUP(fullname, username, email, dateofbirth, gender, password);
	}
}

function useravailability(username) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_users.php",
		data: ({
			op: "availability",
			uuname: username,
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === 0) {
				if (username === "") {
					$("#validationicon").removeClass("fas fa-times-circle").removeClass("fas fa-check-circle");
				} else {
					$("#validationicon").removeClass("fas fa-times-circle").addClass("fas fa-check-circle");

				}

			} else if (data === 1) {
				$("#validationicon").removeClass("fas fa-check-circle").addClass("fas fa-times-circle");
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}

function emailavailability(email) {
	'use strict';
	$.ajax({
		type: 'GET',
		url: window.serverURL + "ws_users.php",
		data: ({
			op: "eavailability",
			uemail: email,
		}),

		dataType: 'json',
		timeout: 5000,
		success: function (data, textStatus, xhr) {
			data = JSON.parse(xhr.responseText);
			if (data === 0) {
				if (email === "") {
					$("#evalidationicon").removeClass("fas fa-times-circle").removeClass("fas fa-check-circle");
				} else {
					$("#evalidationicon").removeClass("fas fa-times-circle").addClass("fas fa-check-circle");

				}

			} else if (data === 1) {
				$("#evalidationicon").removeClass("fas fa-check-circle").addClass("fas fa-times-circle");
			}
		},
		error: function (xhr, status, errorThrown) {
			alert(status + errorThrown);
		}
	});
}
