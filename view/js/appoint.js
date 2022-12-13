/*global document*/
/**/
const appointForm = document.getElementById('ap-form');

function isValid(appointForm){
    // const firstname = document.getElementById('su-firstName');
    const p_name = appointForm.p_name.value;
    const email = appointForm.email.value;
    const phone = appointForm.phone.value;
    const d_name = appointForm.d_name.value;

    document.getElementById('pnameErr').innerHTML = "";
    document.getElementById('emailErr').innerHTML = "";
    document.getElementById('phoneErr').innerHTML = "";
    document.getElementById('dnameErr').innerHTML = "";
    
    let isValid = true;
    
    if(p_name == "" || p_name == null){
        document.getElementById('pnameErr').innerHTML = "Please enter patient name!";
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

    if(phone == "" || phone == null){
        document.getElementById('phoneErr').innerHTML = "Please provide your phone number!";
        isValid = false;
    }
    if(d_name == "" || d_name == null){
        document.getElementById('dnameErr').innerHTML = "Please enter doctorname!";
        isValid = false;
    }
   

    if (!isValid) return false;

	return true;
}