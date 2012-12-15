/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#formRegister");
	var username = $("#username");
	var nameInfo = $("#nameInfo");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	var password = $("#password");
	var pass1Info = $("#pass1Info");
	var password_confirm = $("#password_confirm");
	var pass2Info = $("#pass2Info");

	//On blur
	username.blur(validateUsername);
	email.blur(validateEmail);
	password.blur(validatePassword);
	password_confirm.blur(validatePassword_confirm);
	//On key press
	username.keyup(validateUsername);
	password.keyup(validatePassword);
	password_confirm.keyup(validatePassword_confirm);

	//On Submitting
	form.submit(function(){
		if(validateUsername() & validateEmail() & validatePassword() & validatePassword_confirm())
			return true
		else
			return false;
	});
	
	//validation functions
	function validateEmail(){
		//testing regular expression
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){
			email.removeClass("error");
			emailInfo.text("Valid E-mail please, you will need it to log in!");
			emailInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			email.addClass("error");
			emailInfo.text("Stop cowboy! Type a valid e-mail please :P");
			emailInfo.addClass("error");
			return false;
		}
	}
	function validateUsername(){
		//if it's NOT valid
		if(username.val().length < 4){
			username.addClass("error");
			nameInfo.text("We want names with more than 3 letters!");
			nameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
		    username.removeClass("error");
			nameInfo.text("What's your name?");
			nameInfo.removeClass("error");
			return true;
		}
	}
	function validatePassword(){
		var a = $("#password1");
		var b = $("#password2");

		//it's NOT valid
		if(password.val().length <5){
			password.addClass("error");
			pass1Info.text("Ey! Remember: At least 5 characters: letters, numbers and '_'");
			pass1Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			password.removeClass("error");
			pass1Info.text("At least 5 characters: letters, numbers and '_'");
			pass1Info.removeClass("error");
			validatePass2();
			return true;
		}
	}
	function validatePassword_confirm(){
		var a = $("#password1");
		var b = $("#password2");
		//are NOT valid
		if( password.val() != password_confirm.val() ){
			password_confirm.addClass("error");
			pass2Info.text("Passwords doesn't match!");
			pass2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			password_confirm.removeClass("error");
			pass2Info.text("Confirm password");
			pass2Info.removeClass("error");
			return true;
		}
	}

});