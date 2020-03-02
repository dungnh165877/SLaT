$(document).ready(function() {
	var captcha = makeCaptcha(5);

	$("#divGenerateRandomValues").text(captcha);
});

$(document).on('click', '#submit', function(event) {
	if ($("#divGenerateRandomValues").text() != $("input.captcha").val()) {
		event.preventDefault();
		$("<div class='alert alert-danger'>Captcha don't match. Please fill again!!!</div>").insertAfter(".form-captcha");
		var captcha = makeCaptcha(5);
		$("#divGenerateRandomValues").text(captcha);
		$("input.captcha").val("");
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