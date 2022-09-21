

function profileGeneral() {
	$('#slide_general').addClass('selected');
	$('#slide_preferences').removeClass('selected');
	$('#profile_general').show();
	$('#profile_preferences').hide();
};

function profilePreferences() {
	$('#slide_preferences').addClass('selected');
	$('#slide_general').removeClass('selected');
	$('#profile_preferences').show();
	$('#profile_general').hide();
};







function changeImage() {
	
	var file = $('#image_profile').prop('files')[0];
    var formdata = new FormData($('#profile_image'));  
	// formdata.append('file', file);
	// var file = $('#image_profile').prop('files')[0];
	// var blob = URL.createObjectURL(file);
	console.log(file);
	console.log(formdata);
	$.ajax({
		type: "POST",
		// async: false,
		url: "php/change_image.php",
		// data: {blob: blob},
		// data: formdata,
		success: function(result){
			// if (result) {
				// $('#errors_register').append(result);
				// unique_email = false;
			// } else {
				// unique_email = true;
			// }
			$('#profile_label_username').html(result);
		}
	});
	return false;
}









$(document).ready(function () {
	profileGeneral();
	$('#submit_new_username').hide();
	$('#submit_new_image').hide();
	$('#submit_new_email').hide();
	$('#submit_new_password').hide();
	$('#submit_delete_account').hide();
	
	
	$('#label_username').click(function () {
		$('#profile_new_username').show();
		$('#submit_new_username').show();
		$('#profile_label_username').hide();
	});
	
	$('#label_email').click(function () {
		$('#profile_new_email').show();
		$('#submit_new_email').show();
		$('#profile_label_email').hide();
	});
	
	$('#label_password').click(function () {
		$('#profile_current_password').show();
		$('#profile_new_password').show();
		$('#profile_confirm_password').show();
		$('#submit_new_password').show();
		$('#profile_label_password').hide();
	});
	
	$('#button_delete_account').click(function () {
		$('#profile_delete_password').show();
		$('#submit_delete_account').show();
	});
	
	$('#button_cancel_username').click(function () {
		$('#profile_new_username').hide();
		$('#submit_new_username').hide();
		$('#profile_label_username').show();
		$('#new_username_profile').val('');
	});
	
	$('#button_cancel_email').click(function () {
		$('#profile_new_email').hide();
		$('#submit_new_email').hide();
		$('#profile_label_email').show();
		$('#new_email_profile').val('');
	});
	
	$('#button_cancel_password').click(function () {
		$('#profile_current_password').hide();
		$('#profile_new_password').hide();
		$('#profile_confirm_password').hide();
		$('#submit_new_password').hide();
		$('#profile_label_password').show();
		$('#new_password_profile').val('');
		$('#confirm_password_profile').val('');
	});
	
	$('#button_cancel_image').click(function () {
		$('#image_profile').val('');
		$('#arrow_image').hide();
		$('#new_profile_image').hide();
		$('#submit_new_image').hide();
		$('#new_profile_image').attr('src', '');
	});
	
	$('#button_cancel_delete').click(function () {
		$('#profile_delete_password').hide();
		$('#submit_delete_account').hide();
	});
	
	
	$('#image_profile').change(function () {
		$('#arrow_image').show();
		$('#new_profile_image').show();
		$('#submit_new_image').show();
		var file = $('#image_profile').prop('files')[0];
		var blob = URL.createObjectURL(file);
		if (file) {
			$('#new_profile_image').attr('src', blob);
			// console.log(file);
			// console.log(blob);
		}
	});
	
	
	
	
	
	$('#profile_image').submit(function () {
		$.ajax({
			type: "POST",
			async: false,
			url: "php/change_image.php",
			data: new FormData(this),
			contentType: false,
            cache: false,
            processData:false,
			success: function(result){
			}
		});
	});
	
	
	
	
});

