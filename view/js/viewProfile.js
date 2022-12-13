const vhForm = document.getElementById('vp_form');

function isValid(vhForm){
    const firstname = vhForm.firstName.value;
    const lastname = vhForm.lastName.value;
    const username = vhForm.userName.value;
    const email = vhForm.email.value;
    const phone = vhForm.phone.value;

    document.getElementById('vp_fnameErr').innerHTML = "";
    document.getElementById('vp_lnameErr').innerHTML = "";
    document.getElementById('vp_unameErr').innerHTML = "";
    document.getElementById('vp_emailErr').innerHTML = "";
    document.getElementById('vp_phoneErr').innerHTML = "";
    
    let isValid = true;
    
    if(firstname == "" || firstname == null){
        document.getElementById('vp_fnameErr').innerHTML = "Please enter your first name!";
        isValid = false;
    }
    
    if(lastname == "" || lastname == null){
        document.getElementById('vp_lnameErr').innerHTML = "Please enter your last name!";
        isValid = false;
    }
    
    if(username == "" || username == null){
        document.getElementById('vp_unameErr').innerHTML = "Please enter your user name!";
        isValid = false;
    }
    
    if(email == "" || email == null){
        document.getElementById('vp_emailErr').innerHTML = "Please enter your email address!";
        isValid = false;
    } else {
		const pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if (!pattern.test(email)) {
			document.getElementById("vp_emailErr").innerHTML = "Email is not valid";
			isValid = false;
		}
	}
    
    if(phone == "" || phone == null){
        document.getElementById('vp_phoneErr').innerHTML = "Please provide your phone number!";
        isValid = false;
    }

    if (!isValid) return false;

	return true;
}