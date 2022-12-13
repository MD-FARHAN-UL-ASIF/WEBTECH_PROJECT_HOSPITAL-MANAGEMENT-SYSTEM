<?php

include('../model/database.php');


if(isset($_GET['edit'])){

    $id= $_GET['edit'];
  $editData= edit_data($connection, $id);
}

if(isset($_POST['update']) && isset($_GET['edit'])){

  $id= $_GET['edit'];
    update_data($connection,$id);
    
    
} 
function edit_data($connection, $id)
{
 $query= "SELECT * FROM users WHERE id= $id";
 $exec = mysqli_query($connection, $query);
 $row= mysqli_fetch_assoc($exec);
 return $row;
}


function update_data($connection, $id){

    $firstName= legal_input($_POST['firstName']);
    $lastName= legal_input($_POST['lastName']);
    $userName= legal_input($_POST['userName']);
    $email= legal_input($_POST['email']);
    $phone = legal_input($_POST['phone']);
    
      $query="UPDATE users 
            SET firstName='$firstName',
            lastName='$lastName',
            userName='$userName',
            email='$email',
            phone= '$phone' WHERE id=$id";
                
      $exec= mysqli_query($connection,$query);
  
      if($exec){
         header('location:../view/user-table.php');
      
      }else{
         $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
         echo $msg;  
      }
}

// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>