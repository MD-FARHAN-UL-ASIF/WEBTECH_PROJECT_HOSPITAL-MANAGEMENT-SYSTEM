<?php

include('../model/database.php');

if(isset($_POST['create'])){
   
      $msg=insert_data($connection);
      
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
  //-------------------validation-----------------//                          
  
  // checking if inputs are empty
  if(empty($_POST['blood_type'])){
      header("location: ../view/create-blood.php?error=btypeErr");
      exit();
  } else{
      $blood_type = sanitize($_POST['blood_type']); 
  }

  if(empty($_POST['blood_status'])){
      header("location: ../view/create-blood.php?error=bstatusErr");
      exit();
  } else{
      $blood_status = sanitize($_POST['blood_status']);
  }
  
  if(empty($_POST['exp_date'])){
      header("location: ../view/create-blood.php?error=dateErr");
      exit();
  } else{
      $exp_date = sanitize($_POST['exp_date']);
  }
  
  if(empty($_POST['source_type'])){
    header("location: ../view/create-blood.php?error=stypeErr");
    exit();
} else{
    $source_type = sanitize($_POST['source_type']); 
}

}
// insert query
function insert_data($connection){
   
      $blood_type= sanitize($_POST['blood_type']);
      $blood_status= sanitize($_POST['blood_status']);
      $exp_date = sanitize($_POST['exp_date']);
      $source_type = sanitize($_POST['source_type']);

      $query="INSERT INTO blood(blood_type,blood_status,exp_date,source_type) VALUES ('$blood_type','$blood_status','$exp_date','$source_type')";
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
