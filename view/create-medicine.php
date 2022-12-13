<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>

<?php

include('../control/create-medicineAction.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Medicine</title>
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
        $medicineNameEmpty = false;
        $batchEmpty = false;
        $dateEmpty = false;
        $quantityEmpty = false;
        $companyNameEmpty = false;
        $stmtfailed = false;
        $stmt2failed = false;

        if(strpos($fullUrl,"error=medicineNameEmpty") == true){
            $medicineNameEmpty = true;
        }

        elseif(strpos($fullUrl,"error=batchEmpty") == true){
            $batchEmpty = true;
        }

        elseif(strpos($fullUrl,"error=dateEmpty") == true){
            $dateEmpty = true;
        }
        
        elseif(strpos($fullUrl,"error=quantityEmpty") == true){
            $quantityEmpty = true;
        }
        
        elseif(strpos($fullUrl,"error=companyNameEmpty") == true){
            $companyNameEmpty = true;
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

<div class="medicine-detail">

    <div class="form-title">
    <h2>ADD MEDICINE</h2>
    
    
    </div>
 
<p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>

    <form method="post" action=""  novalidate id="med-form" onsubmit="return isValid(this);">
          <label>MEDICINE NAME</label>
          <input type="text" placeholder="Enter Medicine Name" name="m_name" id="m_name">
          <?php
                        if($medicineNameEmpty === true){
                            echo "<i style='color:red;'>Medicine Name empty</i>";
                        }
          ?>
                        <span style='color:red;' id="mnameErr"></span>
                        <br><br><br>
          <label>BATCH NO.</label>
          <input type="text" placeholder="Enter Batch No" name="batch" id="batch">
          <?php
                        if($batchEmpty === true){
                            echo "<i style='color:red;'>Batch no empty</i>";
                        }
          ?>
                        <span style='color:red;' id="batchErr"></span>
                        <br><br><br>
          <label>EXP DATE</label>
          <input type="date" placeholder="Select Expire Date" name="exp" id="exp">
          <?php
                        if($dateEmpty === true){
                            echo "<i style='color:red;'>expire date empty</i>";
                        }
          ?>
                        <span style='color:red;' id="dateErr"></span>
                        <br><br><br>
          <label>QUANTITY(BOX)</label>
          <input type="text" placeholder="Enter Quantity" name="quantity" id="quantity">
          <?php
                        if($quantityEmpty === true){
                            echo "<i style='color:red;'>Quantity empty</i>";
                        }
          ?>
                        <span style='color:red;' id="quantityErr"></span>
                        <br><br><br>
          <label>COMPANY NAME</label>
          <input type="text" placeholder="Enter Company Name" name="c_name" id="c_name">
          <?php
                        if($companyNameEmpty === true){
                            echo "<i style='color:red;'>Company Name empty</i>";
                        }
          ?>
                        <span style='color:red;' id="cnameErr"></span>
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
          <button type="back" onclick="document.location='../view/medicine-table.php'">Back</button>
    </form>
        </div>
</div>
<!--====form section start====-->

<?php include "../model/footer.php"; ?>
<script src="../view/js/medicine.js"></script>
</body>
</html>