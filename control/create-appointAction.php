<?php

include('../model/database.php');

if(isset($_POST['create'])){
   
      $msg=insert_data($connection);
     
      
      
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
  //-------------------validation-----------------//                          
  
  // checking if inputs are empty
  if(empty($_POST['p_name'])){
      header("location: ../view/create-appoint.php?error=patientNameErr");
      exit();
  } else{
      $p_name = sanitize($_POST['p_name']); 
  }

  if(empty($_POST['email'])){
      header("location: ../view/create-appoint.php?error=emailErr");
      exit();
  } else{
      $email = sanitize($_POST['email']);
  }
  
  if(empty($_POST['phone'])){
      header("location: ../view/create-appoint.php?error=phoneErr");
      exit();
  } else{
      $phone = sanitize($_POST['phone']);
  }
  
  if(empty($_POST['d_name'])){
    header("location: ../view/create-appoint.php?error=dNameErr");
    exit();
} else{
    $d_name = sanitize($_POST['d_name']); 
}

  
  
  //validate email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("location: ../view/create-appoint.php?error=emailConvensionErr");
      exit();
  }
}

// insert query
function insert_data($connection){
   
      $p_name= sanitize($_POST['p_name']);
      $email= sanitize($_POST['email']);
      $phone = sanitize($_POST['phone']);
      $d_name = sanitize($_POST['d_name']);

      $query="INSERT INTO appointment (p_name,email,phone,d_name) VALUES ('$p_name','$email','$phone','$d_name')";
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
