<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>

<?php

include('../control/create-appointAction.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>APPOINTMENT</title>
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
        $emailEempty = false;
        $phoneErr = false;
        $doctorNameEmpty = false;
        $emailConvensionErr = false;
        $stmtfailed = false;
        $stmt2failed = false;

        if(strpos($fullUrl,"error=patientNameErr") == true){
            $patientNameEmpty = true;
        }

        elseif(strpos($fullUrl,"error=emailErr") == true){
            $emailEempty = true;
        }

        elseif(strpos($fullUrl,"error=phoneErr") == true){
            $phoneErr = true;
        }
        
        elseif(strpos($fullUrl,"error=emailConvensionErr") == true){
            $emailConvensionErr = true;
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

<div class="appoint-detail">

    <div class="form-title">
    <h2>Create Appointment</h2>
    
    
    </div>
 
<p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>

    <form method="post" action="" novalidate id="ap-form" onsubmit="return isValid(this);">
          <label>Patient Name</label>
          <input type="text" placeholder="Enter Patient Name" name="p_name" id="p_name" >
          <?php
                        if($patientNameEmpty === true){
                            echo "<i style='color:red;'>Patient Name empty</i>";
                        }
          ?>
                        <span style='color:red;' id="pnameErr"></span>
                        <br><br><br>
          <label>Email Address</label>
          <input type="email" placeholder="Enter Email Address" name="email" id="email" >
          <?php
                        if($emailEempty === true){
                           echo "<i style='color:red;'>Enter an email Address!</i>";
                        }
          ?>
                        <span style='color:red;'id="emailErr"></span>
                        <br><br><br>
          <label>Phone Number</label>
          <input type="phone" placeholder="Enter Phone Number" name="phone" id="phone">
          <?php
                        if($phoneErr === true){
                            echo "<i style='color:red;'>Enter a phone number!</i>";
                        }
          ?>
                         <span style='color:red;'id="phoneErr"></span>
                        <br><br><br>
          <label>Doctor Name</label>
          <input type="text" placeholder="Enter Doctor Name" name="d_name" id="d_name">
          <?php
                        if($doctorNameEmpty === true){
                            echo "<i style='color:red;'>Doctor Name empty</i>";
                        }
          ?>
                        <span style='color:red;' id="dnameErr"></span>
                        <br><br><br>

          <?php
                    if($emailConvensionErr === true){
                        echo "<i style='color:red;'>Please enter a valid email!</i>";
                    }
          ?>

          <?php
                    if($stmtfailed === true){
                        echo "<i style='color:red;'>Sql statement failed!</i>";
                      
                    }
                  
                    if($stmt2failed === true){
                        echo "<i style='color:red;'>Sql statement failed!</i>";
  
                    }
                ?>

          <button type="submit" name="create">Submit</button>
          <button type="back" onclick="document.location='../view/appoint-table.php'">Back</button>
    </form>
        </div>
</div>

<!--====form section start====-->

<?php include "../model/footer.php"; ?>
<script src="../view/js/appoint.js"></script>
</body>
</html>