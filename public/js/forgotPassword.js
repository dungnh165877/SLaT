$(document).on('click', '.btn-send-mail', function(event) {
	event.preventDefault();
    $.ajax({
    	url: '/forgot-password',
    	type: 'POST',
		dataType: 'json',
    	data: {
			"_token": $('#token').val(),
    		email: $("#email").val()
    	},
    	success: function(res) {
    		$('.alert.alert-success.success').remove();
    		$('.alert.alert-danger.error').remove();
			if (res) {
				console.log('true');
				$("<div class='alert alert-success success'>Please check mail to reset your password !</div>").insertAfter(".form-forgot-password");
			} else {
				console.log('false');
				$("<div class='alert alert-danger error'>Email is not in the system, please check again !</div>").insertAfter(".form-forgot-password");
			}
    	}
    })
});