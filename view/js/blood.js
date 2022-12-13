/*global document*/
/**/
const bloodForm = document.getElementById('bl-form');

function isValid(bloodForm){
    // const firstname = document.getElementById('su-firstName');
    const blood_type = bloodForm.blood_type.value;
    const blood_status = bloodForm.blood_status.value;
    const exp_date = bloodForm.exp_date.value;
    const source_type = bloodForm.source_type.value;

    document.getElementById('btypeErr').innerHTML = "";
    document.getElementById('bstatusErr').innerHTML = "";
    document.getElementById('dateErr').innerHTML = "";
    document.getElementById('stypeErr').innerHTML = "";
    
    let isValid = true;
    
    if(blood_type == "" || blood_type == null){
        document.getElementById('btypeErr').innerHTML = "Please enter Blood Type!";
        isValid = false;
    }
    
    if(blood_status == "" || blood_status == null){
        document.getElementById('bstatusErr').innerHTML = "Please enter Blood Status!";
        isValid = false;
    }

    if(exp_date == "" || exp_date == null){
        document.getElementById('dateErr').innerHTML = "Please provide Expire Date!";
        isValid = false;
    }
    if(source_type == "" || source_type == null){
        document.getElementById('stypeErr').innerHTML = "Please enter source type!";
        isValid = false;
    }
    

    if (!isValid) return false;

	return true;
}