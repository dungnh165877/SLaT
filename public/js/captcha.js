$(document).ready(function() {
	var captcha = makeCaptcha(5);

	$("#divGenerateRandomValues").text(captcha);
});

$(document).on('click', '#submit', function(event) {
	if ($("#divGenerateRandomValues").text() != $("input.captcha").val()) {
		event.preventDefault();
		$(".alert-captcha").remove();
		$("<div class='alert alert-danger alert-captcha'>Captcha don't match !</div>").insertAfter(".form-captcha");
		var captcha = makeCaptcha(5);
		$("#divGenerateRandomValues").text(captcha);
		$("input.captcha").val("");
	} else {
		$("#signup-form").submit();
	}
});

function makeCaptcha(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}