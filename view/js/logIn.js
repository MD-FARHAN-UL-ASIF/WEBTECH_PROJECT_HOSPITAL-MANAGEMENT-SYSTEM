const loginForm = document.getElementById('lg-form');

function isValid(loginForm){
    const username = loginForm.userName.value;
    const password = loginForm.password.value;

    document.getElementById('lg-unameErr').innerHTML = "";
    document.getElementById('lg-passwordErr').innerHTML = "";
    
    
    let isValid = true;
    
    if(username == "" || username == null){
        document.getElementById('lg-unameErr').innerHTML = "Please provide your username!";
        isValid = false;
    }
    
    if(password == "" || password == null){
        document.getElementById('lg-passwordErr').innerHTML = "Please provide your password!";
        isValid = false;
    }

    if (!isValid) return false;

	return true;
}