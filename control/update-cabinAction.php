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
 $query= "SELECT * FROM cabin WHERE id= $id";
 $exec = mysqli_query($connection, $query);
 $row= mysqli_fetch_assoc($exec);
 return $row;
}


function update_data($connection, $id){

    $p_name= legal_input($_POST['p_name']);
      $b_name= legal_input($_POST['b_name']);
      $room = legal_input($_POST['room']);
      $n_name = legal_input($_POST['n_name']);

      $query="UPDATE cabin 
            SET p_name='$p_name',
                b_name='$b_name',
                room= '$room',
                n_name='$n_name' WHERE id=$id";

      $exec= mysqli_query($connection,$query);
  
      if($exec){
         header('location:../view/cabin-table.php');
      
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