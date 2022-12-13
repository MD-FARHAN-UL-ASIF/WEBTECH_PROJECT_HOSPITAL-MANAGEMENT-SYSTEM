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
 $query= "SELECT * FROM blood WHERE id= $id";
 $exec = mysqli_query($connection, $query);
 $row= mysqli_fetch_assoc($exec);
 return $row;
}


function update_data($connection, $id){

    $blood_type= legal_input($_POST['blood_type']);
      $blood_status= legal_input($_POST['blood_status']);
      $exp_date = legal_input($_POST['exp_date']);
      $source_type = legal_input($_POST['source_type']);

      $query="UPDATE blood 
            SET blood_type='$blood_type',
                blood_status='$blood_status',
                exp_date= '$exp_date',
                source_type='$source_type' WHERE id=$id";

      $exec= mysqli_query($connection,$query);
  
      if($exec){
         header('location:../view/blood-table.php');
      
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