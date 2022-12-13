const cpForm = document.getElementById('cp_form');

function isValid(cpForm){
    const previouspassword = cpForm.password.value;
    const newpassword = cpForm.newPassword.value;
    const confpass = cpForm.confirmPassword.value;

    document.getElementById('cp_opERR').innerHTML = "";
    document.getElementById('cp_npERR').innerHTML = "";
    document.getElementById('cp_cnpERR').innerHTML = "";
    
    let isValid = true;
    
    if(previouspassword == "" || previouspassword == null){
        document.getElementById('cp_opERR').innerHTML = "Please enter your old password!";
        isValid = false;
    }
    
    if(newpassword == "" || newpassword == null){
        document.getElementById('cp_npERR').innerHTML = "Please enter the password you want to set!";
        isValid = false;
    }
    
    if(confpass == "" || confpass == null){
        document.getElementById('cp_cnpERR').innerHTML = "Please enter repeat new password!";
        isValid = false;
    }
    if (!isValid) return false;

	return true;
}