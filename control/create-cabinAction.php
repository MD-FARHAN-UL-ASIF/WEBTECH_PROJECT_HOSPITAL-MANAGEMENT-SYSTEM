<?php

include('../model/database.php');

if(isset($_POST['create'])){
   
      $msg=insert_data($connection);
      
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
  //-------------------validation-----------------//                          
  
  // checking if inputs are empty
  if(empty($_POST['p_name'])){
      header("location: ../view/create-cabin.php?error=patientNameErr");
      exit();
  } else{
      $p_name = sanitize($_POST['p_name']); 
  }

  if(empty($_POST['b_name'])){
      header("location: ../view/create-cabin.php?error=buildingNameEmpty");
      exit();
  } else{
      $b_name = sanitize($_POST['b_name']);
  }
  
  if(empty($_POST['room'])){
      header("location: ../view/create-cabin.php?error=roomEmpty");
      exit();
  } else{
      $room = sanitize($_POST['room']);
  }
  
  if(empty($_POST['n_name'])){
    header("location: ../view/create-cabin.php?error=nurseNameEmpty");
    exit();
} else{
    $n_name = sanitize($_POST['n_name']); 
}
}

// insert query
function insert_data($connection){
   
      $p_name= sanitize($_POST['p_name']);
      $b_name= sanitize($_POST['b_name']);
      $room = sanitize($_POST['room']);
      $n_name = sanitize($_POST['n_name']);

      $query="INSERT INTO cabin (p_name,b_name,room,n_name) VALUES ('$p_name','$b_name','$room','$n_name')";
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
