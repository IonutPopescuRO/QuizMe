$(window).load(function(){
		function checkPasswordMatch() {
			var password = $("#password").val();
			var confirmPassword = $("#rpassword").val();

			if (password != confirmPassword)
				$("#checkpassword").css("color", "red");
			else
				$("#checkpassword").css("color", "green");
		}

		$(document).ready(function () {
		   $("#rpassword").keyup(checkPasswordMatch);
		});
		
		function checkUserEmail() {
			var email = $("#email").val();
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			
			if (re.test(String(email).toLowerCase()))
				$('#checkemail').css("color", "green");
			else
				$('#checkemail').css("color", "red");
		}

		$(document).ready(function () {
		   $("#email").keyup(checkUserEmail);
		});	
});