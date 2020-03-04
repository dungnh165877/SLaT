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
		beforeSend: function() {
			$('.alert.alert-success.success').remove();
			$('.alert.alert-danger.error').remove();
			$('#submit').remove();
			$('.form-forgot-password').append("<div id='submit-div' class='form-submit btn-send-mail'><img src='images/loading2.gif' width='59'></div>")
		},
    	success: function(res) {
    		$('#submit-div').remove();
			$('.form-forgot-password').append("<input type='submit' name='submit' id='submit' class='form-submit btn-send-mail' value='Send mail'>");
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