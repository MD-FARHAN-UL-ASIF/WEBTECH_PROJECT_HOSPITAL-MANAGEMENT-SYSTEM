/*global document*/
/**/
const signupForm = document.getElementById('su-form');

function isValid(signupForm){
    // const firstname = document.getElementById('su-firstName');
    const firstname = signupForm.firstName.value;
    const lastname = signupForm.lastName.value;
    const username = signupForm.userName.value;
    const email = signupForm.email.value;
    const password = signupForm.password.value;
    const confirmPassword = signupForm.confirmPassword.value;
    const phone = signupForm.phone.value;

    document.getElementById('fnameErr').innerHTML = "";
    document.getElementById('lnameErr').innerHTML = "";
    document.getElementById('unameErr').innerHTML = "";
    document.getElementById('emailErr').innerHTML = "";
    document.getElementById('passwordErr').innerHTML = "";
    document.getElementById('confirmpasswordErr').innerHTML = "";
    document.getElementById('phoneErr').innerHTML = "";
    
    let isValid = true;
    
    if(firstname == "" || firstname == null){
        document.getElementById('fnameErr').innerHTML = "Please enter your first name!";
        isValid = false;
    }
    
    if(lastname == "" || lastname == null){
        document.getElementById('lnameErr').innerHTML = "Please enter your last name!";
        isValid = false;
    }
    
    if(username == "" || username == null){
        document.getElementById('unameErr').innerHTML = "Please enter your user name!";
        isValid = false;
    }
    if(email == "" || email == null){
        document.getElementById('emailErr').innerHTML = "Please enter your email!";
        isValid = false;
    } else {
		const pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if (!pattern.test(email)) {
			document.getElementById('emailErr').innerHTML = "Email is not valid";
			isValid = false;
		}
	}

    if(password == "" || password == null){
        document.getElementById('passwordErr').innerHTML = "Please enter your password!";
        isValid = false;
    }

    if(confirmPassword == "" || confirmPassword == null){
        document.getElementById('confirmpasswordErr').innerHTML = "Please confirm your password!";
        isValid = false;
    }
    if(phone == "" || phone == null){
        document.getElementById('phoneErr').innerHTML = "Please provide your phone number!";
        isValid = false;
    }
    if(password != confirmPassword){
        document.getElementById('confirmpasswordErr').innerHTML = "Please retype your password!";
        isValid = false;
    }

    if (!isValid) return false;

	return true;
}