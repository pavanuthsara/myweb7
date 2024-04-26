function signUpFormValidation(){
	let password = document.getElementById('pwd1').value;
	let rePassword = document.getElementById('pwd2').value;
	
	if(password != rePassword){
		document.getElementById("message").innerHTML = "Password mismatch!";
	} else {
		document.getElementById("message").innerHTML = "";
	}
		
}