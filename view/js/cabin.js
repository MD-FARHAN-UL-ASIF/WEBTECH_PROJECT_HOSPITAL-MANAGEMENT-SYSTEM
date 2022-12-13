/*global document*/
/**/
const cabinForm = document.getElementById('cb-form');

function isValid(appointForm){
    // const firstname = document.getElementById('su-firstName');
    const p_name = cabinForm.p_name.value;
    const b_name = cabinForm.b_name.value;
    const room = cabinForm.room.value;
    const n_name = cabinForm.n_name.value;

    document.getElementById('pnameErr').innerHTML = "";
    document.getElementById('bnameErr').innerHTML = "";
    document.getElementById('roomErr').innerHTML = "";
    document.getElementById('nnameErr').innerHTML = "";
    
    let isValid = true;
    
    if(p_name == "" || p_name == null){
        document.getElementById('pnameErr').innerHTML = "Please enter patient name!";
        isValid = false;
    }
    if(b_name == "" || b_name == null){
        document.getElementById('bnameErr').innerHTML = "Please enter building email!";
        isValid = false;
	}

    if(room == "" || room == null){
        document.getElementById('roomErr').innerHTML = "Please provide room number!";
        isValid = false;
    }
    if(n_name == "" || n_name == null){
        document.getElementById('nnameErr').innerHTML = "Please enter nurse name!";
        isValid = false;
    }
   

    if (!isValid) return false;

	return true;
}