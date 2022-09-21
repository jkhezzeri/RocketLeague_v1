var unique_username = true;
var unique_email = true;

function check_username(username) {
	$.ajax({
		type: "POST",
		async: false,
		url: "php/exist_user.php",
		data: {username: username},
		success: function(result){
			if (result) {
				$('#errors_register').append(result);
				unique_username = false;
			} else {
				unique_username = true;
			}
		}
	});
};

function check_email(email) {
	$.ajax({
		type: "POST",
		async: false,
		url: "php/exist_email.php",
		data: {email: email},
		success: function(result){
			if (result) {
				$('#errors_register').append(result);
				unique_email = false;
			} else {
				unique_email = true;
			}
		}
	});
};




function add_user() {
	$('#errors_register').empty();
	var required = true;
	$('#form_register input').each(function() {
		if (!$(this).val()) {
			required = false;
		}
	});
	if (required == false) {
		$('#errors_register').append('<li>All fields are required.</li>');
		return false;
	} else {
		if ($('#username_register').val().length < 3) {
			$('#errors_register').append('<li>Username must have the minimum length of 3 characters.</li>');
		}
		if ($('#username_register').val().length > 32) {
			$('#errors_register').append('<li>Username must have the maximum length of 32 characters.</li>');
		}
		var regex_email = /^[\w-.+]+@[a-zA-Z0-9.-]+\.[a-zA-z0-9]{2,4}$/;
		// if (regex_email.test($('#email_register').val())) {
		if (!$('#email_register').val().match(regex_email)) {
			$('#errors_register').append('<li>A valid email address is required.</li>');
		}
		if ($('#email_register').val() != $('#confirm_email_register').val()) {
			$('#errors_register').append('<li>Please make sure your emails match.</li>');
		}
		if ($('#password_register').val().length < 8) {
			$('#errors_register').append('<li>Your password must have the minimum length of 8 characters.</li>');
		}
		if (!$('#password_register').val().match(/[a-z]/)) {
			$('#errors_register').append('<li>Your password must contain 1 lowercase character.</li>');
		}
		if (!$('#password_register').val().match(/[A-Z]/)) {
			$('#errors_register').append('<li>Your password must contain 1 uppercase character.</li>');
		}
		if (!$('#password_register').val().match(/[0-9]/)) {
			$('#errors_register').append('<li>Your password must contain 1 number.</li>');
		}
		if ($('#password_register').val() != $('#confirm_password_register').val()) {
			$('#errors_register').append('<li>Please make sure your passwords match.</li>');
		}
		
		if (!$('#errors_register').is(':empty')) {
			return false;
		} else {
			check_username($('#username_register').val());
			check_email($('#email_register').val());
			
			if (unique_username == false || unique_email == false) {
				return false;
			} else {
				return true;
			}
		}
	}
}


$(document).ready(function () {
	
	
	
});