<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>

<?php

include('../control/update-bloodAction.php');
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blood Mangement</title>
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

label{
  font-size: 18px;;}
button[type=submit]:hover {
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
<?php include "../model/_nav.php"; ?>
<!--====form section start====-->

<div class="blood">

    <div class="form-title">
    <h2 style= "text-align: center;">Update Blood</h2>
    
    
    </div>
 
    <p style="color:red">
    
<?php if(!empty($msg)){echo $msg; }?>
</p>
    <form method="post" action="">
          <label>Blood Type</label>
        
<input type="text" placeholder="Enter Blood Type" name="blood_type" required value="<?php echo isset($editData) ? $editData['blood_type'] : '' ?>">

          <label>Blood Status</label>
        
<input type="text" placeholder="Enter Blood Status" name="blood_status" required value="<?php echo isset($editData) ? $editData['blood_status'] : '' ?>">

          <label>Expire Date</label>
<input type="date" placeholder="Enter Expire Date" name="exp_date" required value="<?php echo isset($editData) ? $editData['exp_date'] : '' ?>">

          <label>Source Type</label>
        
<input type="text" placeholder="Enter Source Type" name="source_type" required value="<?php echo isset($editData) ? $editData['source_type'] : '' ?>">

          <button type="submit" name="update">Submit</button>
          
    </form>
        </div>
</div>
<!--====form section start====-->

<?php include "../model/footer.php"; ?>
</body>
</html>