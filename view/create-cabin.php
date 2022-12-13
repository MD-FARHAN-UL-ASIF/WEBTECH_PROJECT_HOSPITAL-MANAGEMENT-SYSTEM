<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>

<?php

include('../control/create-cabinAction.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CABIN ALLOTMENT</title>
<style>
    
body{
    overflow-x: hidden;
}


* {
  box-sizing: border-box;}
.user-detail form {
    height: 100vh;
    border: 2px solid #f1f1f1;
    padding: 16px;
    background-color: white;
    }
    .user-detail{
      width: 30%;
    float: left;
    }

input{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;}
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;}
button[type=submit] {
    background-color: #0D1559;
    color: #ffffff;
    padding: 10px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    font-size: 20px;}
button[type=back] {
    background-color: #0D1559;
    color: #ffffff;
    padding: 10px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    font-size: 20px;}
label{
  font-size: 18px;;}
button[type=submit]:hover {
  background-color:#3d3c3c;}
button[type=back]:hover {
  background-color:#3d3c3c;}
  .form-title a, .form-title h2{
   display: inline-block;

  }
  .form-title a{
      text-decoration: none;
      font-size: 20px;
      background-color: green;
      color: honeydew;
      padding: 2px 10px;
  }
 

 
</style>
</head>
<body style="padding-right:7rem;padding-left:7rem;">
<?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $patientNameEmpty = false;
        $buildingNameEmpty = false;
        $roomEmpty = false;
        $nurseNameEmpty = false;
        $stmtfailed = false;
        $stmt2failed = false;

        if(strpos($fullUrl,"error=patientNameErr") == true){
            $patientNameEmpty = true;
        }

        elseif(strpos($fullUrl,"error=buildingNameEmpty") == true){
            $buildingNameEmpty = true;
        }

        elseif(strpos($fullUrl,"error=roomEmpty") == true){
            $roomEmpty = true;
        }
        
        elseif(strpos($fullUrl,"error=nurseNameEmpty") == true){
            $nurseNameEmpty = true;
        }
    
        elseif(strpos($fullUrl,"error=stmtfailed") == true){
            $stmtfailed = true;
        }
    
        elseif(strpos($fullUrl,"error=stmt2failed") == true){
            $stmt2failed = true;
        }
    ?>
<?php include "../model/_nav.php"; ?>
<!--====form section start====-->

<div class="cabin-detail">

    <div class="form-title">
    <h2>Allocate Cabin</h2>
    
    
    </div>
 
<p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>

    <form method="post" action="" novalidate id="cb-form" onsubmit="return isValid(this);">
          <label>PATIENT NAME</label>
          <input type="text" placeholder="Enter Patient Name" name="p_name" id="p_name">
          <?php
                        if($patientNameEmpty === true){
                            echo "<i style='color:red;'>Patient Name empty</i>";
                        }
          ?>
                        <span style='color:red;' id="pnameErr"></span>
                        <br><br><br>
          <label>BUILDING NAME</label>
          <input type="text" placeholder="Enter Building Name" name="b_name" id="b_name">
          <?php
                        if($buildingNameEmpty === true){
                            echo "<i style='color:red;'>Building Name empty</i>";
                        }
          ?>
                        <span style='color:red;' id="bnameErr"></span>
                        <br><br><br>
          <label>ROOM NO.</label>
          <input type="room" placeholder="Enter Room Number" name="room" id="room">
          <?php
                        if($roomEmpty === true){
                            echo "<i style='color:red;'>Patient Name empty</i>";
                        }
          ?>
                        <span style='color:red;' id="roomErr"></span>
                        <br><br><br>
          <label>NURSE NAME</label>
          <input type="text" placeholder="Enter Nurse Name" name="n_name" id="n_name">
          <?php
                        if($nurseNameEmpty === true){
                            echo "<i style='color:red;'>Patient Name empty</i>";
                        }
          ?>
                        <span style='color:red;' id="nnameErr"></span>
                        <br><br><br>
         <?php
                    if($stmtfailed === true){
                        echo "<i style='color:red;'>Sql statement failed!</i>";
                      
                    }
                  
                    if($stmt2failed === true){
                        echo "<i style='color:red;'>Sql statement failed!</i>";
  
                    }
        ?>
          <button type="submit" name="create">Submit</button>
          <button type="back" onclick="document.location='../view/cabin-table.php'">Back</button>
    </form>
        </div>
</div>
<!--====form section start====-->

<?php include "../model/footer.php"; ?>
<script src="../view/js/cabin.js"></script>
</body>
</html>