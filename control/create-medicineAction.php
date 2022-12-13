<?php

include('../model/database.php');

if(isset($_POST['create'])){
   
      $msg=insert_data($connection);
      
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
  //-------------------validation-----------------//                          
  
  // checking if inputs are empty
  if(empty($_POST['m_name'])){
      header("location: ../view/create-medicine.php?error=medicineNameEmpty");
      exit();
  } else{
      $m_name = sanitize($_POST['m_name']); 
  }

  if(empty($_POST['batch'])){
      header("location: ../view/create-medicine.php?error=batchEmpty");
      exit();
  } else{
      $batch = sanitize($_POST['batch']);
  }
  
  if(empty($_POST['exp'])){
      header("location: ../view/create-medicine.php?error=dateEmpty");
      exit();
  } else{
      $exp = sanitize($_POST['exp']);
  }
  
  if(empty($_POST['quantity'])){
    header("location: ../view/create-medicine.php?error=quantityEmpty");
    exit();
} else{
    $quantity = sanitize($_POST['quantity']);
}

  if(empty($_POST['c_name'])){
    header("location: ../view/create-medicine.php?error=companyNameEmpty");
    exit();
} else{
    $c_name = sanitize($_POST['c_name']); 
}

  
}
// insert query
function insert_data($connection){
   
      $m_name= sanitize($_POST['m_name']);
      $batch= sanitize($_POST['batch']);
      $exp = sanitize($_POST['exp']);
      $quantity = sanitize($_POST['quantity']);
      $c_name = sanitize($_POST['c_name']);

      $query="INSERT INTO medicine (m_name,batch,exp,quantity,c_name) VALUES ('$m_name','$batch','$exp','$quantity','$c_name')";
      $exec= mysqli_query($connection,$query);
      if($exec){

        $msg="Data was created sucessfully";
        return $msg;
      
      }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
      }
}

// convert illegal input to legal input
function sanitize($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>
