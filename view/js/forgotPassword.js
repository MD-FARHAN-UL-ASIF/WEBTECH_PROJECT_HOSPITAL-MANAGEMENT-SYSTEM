const fpForm = document.getElementById('fp_form');

function isValid(fpForm){
    const uname = fpForm.userName.value;
    const email = fpForm.email.value;
    const password = fpForm.password.value;
    const cp = fpForm.confirmPassword.value;

    document.getElementById('fp_unameErr').innerHTML ="";
    document.getElementById('fp_emailErr').innerHTML ="";
    document.getElementById('fp_passErr').innerHTML ="";
    document.getElementById('fp_cpErr').innerHTML ="";
    
    let isValid = true;
    
    if(uname == "" || uname == null){
        document.getElementById('fp_unameErr').innerHTML ="Please enter your User Name!";
        isValid = false;
    }
    
    if(email == "" || email == null){
        document.getElementById('fp_emailErr').innerHTML ="Please enter your email!";
        isValid = false;
    } else {
		const pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if (!pattern.test(email)) {
			document.getElementById("fp_emailErr").innerHTML = "Email is not valid";
			isValid = false;
		}
	}
    
    if(password == "" || password == null){
        document.getElementById('fp_passErr').innerHTML ="Please enter the password you want to set!";
        isValid = false;
    }
    
    if(cp == "" || cp == null){
        document.getElementById('fp_cpErr').innerHTML ="Please retype your password!";
        isValid = false;
    }
    if (!isValid) return false;

	return true;
}