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
 $query= "SELECT * FROM medicine WHERE id= $id";
 $exec = mysqli_query($connection, $query);
 $row= mysqli_fetch_assoc($exec);
 return $row;
}


function update_data($connection, $id){

      $m_name= legal_input($_POST['m_name']);
      $batch= legal_input($_POST['batch']);
      $exp = legal_input($_POST['exp']);
      $quantity = legal_input($_POST['quantity']);
      $c_name = legal_input($_POST['c_name']);

      $query="UPDATE medicine 
            SET m_name='$m_name',
                batch='$batch',
                exp= '$exp',
                quantity= '$quantity',
                c_name='$c_name' WHERE id=$id";

      $exec= mysqli_query($connection,$query);
  
      if($exec){
         header('location:../view/medicine-table.php');
      
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