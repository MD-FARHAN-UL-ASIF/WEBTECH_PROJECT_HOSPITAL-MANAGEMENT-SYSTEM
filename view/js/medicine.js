/*global document*/
/**/
const medicineForm = document.getElementById('med-form');

function isValid(medicineForm){
    // const firstname = document.getElementById('su-firstName');
    const m_name = medicineForm.m_name.value;
    const batch = medicineForm.batch.value;
    const exp = medicineForm.exp.value;
    const quantity = medicineForm.quantity.value;
    const c_name = medicineForm.c_name.value;

    document.getElementById('mnameErr').innerHTML = "";
    document.getElementById('batchErr').innerHTML = "";
    document.getElementById('dateErr').innerHTML = "";
    document.getElementById('quantityErr').innerHTML = "";
    document.getElementById('cnameErr').innerHTML = "";
    
    let isValid = true;
    
    if(m_name == "" || m_name == null){
        document.getElementById('mnameErr').innerHTML = "Please enter medicine name!";
        isValid = false;
    }
    if(batch == "" || batch == null){
        document.getElementById('batchErr').innerHTML = "Please enter batch no!";
        isValid = false;
    }

    if(exp == "" || exp == null){
        document.getElementById('dateErr').innerHTML = "Please provide expire date!";
        isValid = false;
    }

    if(quantity == "" || quantity == null){
        document.getElementById('quantityErr').innerHTML = "Please provide quantity!";
        isValid = false;
    }

    if(c_name == "" || c_name == null){
        document.getElementById('cnameErr').innerHTML = "Please enter company name!";
        isValid = false;
    }
   

    if (!isValid) return false;

	return true;
}