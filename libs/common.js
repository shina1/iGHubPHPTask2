$(document).ready(function(){
	/* handling form validation */
	$("#login-form").validate({
		rules: {
			password: {
				required: true,
			},
			username: {
				required: true,
				email: true
			},
		},
		messages: {
			password:{
			  required: "Please enter your password"
			 },
			username: "Please enter your email address",
		},
		submitHandler: submitForm	
	});	

	$("#register-form").validate({
		rules: {
			password: {
				required: true,
				minlength: 5,
			},
			re_password: {
				minlength: 5,
				equalTo : "#password",
			},
			f_name: {
				required: true,
			},
			l_name: {
				required: true,
			},
			email: {
				required: true,
				email: true
			},
		},
		messages: {
			password:"Please enter your password",
			email: "Please enter your email address",
			f_name: "Please enter your first name",
			l_name: "Please enter your last name",
		},
		submitHandler: registerForm	
	});
	/* Handling login functionality */
	function submitForm() {		
		var data = $("#login-form").serialize();
		$.ajax({				
			type : 'POST',
			url  : 'response.php?action=login',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success : function(response){			
				if($.trim(response) === "1"){
					console.log('dddd');									
					$("#login-submit").html('Signing In ...');
					setTimeout(' window.location.href = "dashboard.php"; ',2000);
				} else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html(response).show();
					});
				}
			}
		});
		return false;
	}

	function registerForm() {		
		var data = $("#register-form").serialize();
		$.ajax({				
			type : 'POST',
			url  : 'response.php?action=register',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#register_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success : function(response){
				console.log(response);
				if($.trim(response) === "1"){									
					$("#register_button").html('Signing In ...');
					$('#success').html('Successfully! User has been Registered.').show();
					setTimeout(' window.location.href = "index.php"; ',5000);
				} else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html(response).show();
					});
				}
			}
		});
		return false;
	}

	/* Handling login functionality */
	function logout() {
		console.log('fdfdf');
		$.ajax({				
			type : 'POST',
			url  : 'response.php?action=logout',
			data : data,
			success : function(response){
				window.location.href = "/index.php";
			}
		});
		return false;
	}   
});