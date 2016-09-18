function logIn(){
	var username;
	var	password;

	var loginButton = document.getElementById('loginButton');
	var logInLabel = document.getElementById('logInLabel');
	loginButton.addEventListener('click',function(){
		username=document.getElementById('usernameInput').value;
		password=document.getElementById('passwordInput').value;
		if(username!='' && password!=''){
			$.post('functions.php', {type: 'login',username:username,password:password}, function(e) {
				var e = JSON.parse(e);
				console.log(e);
				if (e.Message=='Success') {














				}
				else{
					logInLabel.innerHTML='Please check your username or password!';
				}

			});
		}else{
			logInLabel.innerHTML='Please fill both forms!';
		}

		setTimeout(function(){
			logInLabel.innerHTML="Welcome Back!";
		},3000);

	});

}

function signUp(){
	var firstname,lastname,username,password,birthdate,email,accType,signUpButton,signUpLabel;
	signUpButton=$('#signUpButton');
	signUpLabel=document.getElementById('signUpLabel');

	signUpButton.on('click',function(){
		firstname=document.getElementById('firstnameS').value;
		lastname=document.getElementById('lastnameS').value;
		username=document.getElementById('usernameS').value;
		password=document.getElementById('passwordS').value;
		birthdate=document.getElementById('birthdateS').value;
		email=document.getElementById('emailS').value;
		accType=document.querySelector('input[name="accType"]:checked');
		if (accType!=null) {
			accType=accType.value;
			$.post('functions.php', {type:'signup',firstname:firstname,lastname:lastname,username:username,usertype:accType,password:password,email:email,birthdate:birthdate}, function(e) {
				var e = JSON.parse(e);
				console.log(e);
			});


		}







	});


}



(function(){
logIn();
signUp();
})();




/*   login form    */


/*   login Form  */






