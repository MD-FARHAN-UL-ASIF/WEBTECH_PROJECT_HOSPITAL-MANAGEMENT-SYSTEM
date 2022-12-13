<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>

<?php

include('../control/create-bloodAction.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BLOOD</title>
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
        $bloodTypeEmpty = false;
        $bloodStatusEmpty = false;
        $expDateEmpty = false;
        $sourceTypeEmpty = false;
        $stmtfailed = false;
        $stmt2failed = false;

        if(strpos($fullUrl,"error=bloodTypeEmpty") == true){
            $bloodTypeEmpty = true;
        }

        elseif(strpos($fullUrl,"error=bloodStatusEmpty") == true){
            $emailbloodStatusEmptyEempty = true;
        }

        elseif(strpos($fullUrl,"error=expDateEmpty") == true){
            $expDateEmpty = true;
        }
        
        elseif(strpos($fullUrl,"error=sourceTypeEmpty") == true){
            $sourceTypeEmpty = true;
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

<div class="blood-detail">

    <div class="form-title">
    <h2>Add Blood</h2>
    
    
    </div>
 
<p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>

    <form method="post" action="" novalidate id="bl-form" onsubmit="return isValid(this);">
          <label>Blood Type</label>
          <input type="text" placeholder="Enter Blood Type" name="blood_type" id="blood_type">
          <?php
                        if($bloodTypeEmpty === true){
                            echo "<i style='color:red;'>Blood Type empty</i>";
                        }
          ?>
                        <span style='color:red;' id="btypeErr"></span>
                        <br><br><br>
          <label>Blood Status</label>
          <input type="text" placeholder="Enter Blood Status" name="blood_status" id="blood_status">
          <?php
                        if($bloodStatusEmpty === true){
                            echo "<i style='color:red;'>Blood Status empty</i>";
                        }
          ?>
                        <span style='color:red;' id="bstatusErr"></span>
                        <br><br><br>
          <label>Expire Date</label>
          <input type="date" placeholder="Enter Expire Date" name="exp_date" id="exp_date">
          <?php
                        if($expDateEmpty === true){
                            echo "<i style='color:red;'>Expire date empty</i>";
                        }
          ?>
                        <span style='color:red;' id="dateErr"></span>
                        <br><br><br>
          <label>Source Type</label>
          <input type="text" placeholder="Enter Source Type" name="source_type" id="source_type">
          <?php
                        if($sourceTypeEmpty === true){
                            echo "<i style='color:red;'>Source Type empty</i>";
                        }
          ?>
                        <span style='color:red;' id="stypeErr"></span>
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
          <button type="back" onclick="document.location='../view/blood-table.php'">Back</button>
    </form>
        </div>
</div>
<!--====form section start====-->

<?php include "../model/footer.php"; ?>
<script src="../view/js/blood.js"></script>
</body>
</html>