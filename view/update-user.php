<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>

<?php

include('../control/update-userAction.php');
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Mangement</title>
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

<div class="users">

    <div class="form-title">
    <h2 style= "text-align: center;">Update User's detail</h2>
    
    
    </div>
 
    <p style="color:red">
    
<?php if(!empty($msg)){echo $msg; }?>
</p>
    <form method="post" action="">
          <label>First Name</label>
        
<input type="text" placeholder="Enter First Name" name="firstName" required value="<?php echo isset($editData) ? $editData['firstName'] : '' ?>">

          <label>Last Name</label>
        
<input type="text" placeholder="Enter Last Name" name="lastName" required value="<?php echo isset($editData) ? $editData['lastName'] : '' ?>">

          <label>User Name</label>
        
<input type="text" placeholder="Enter User Name" name="userName" required value="<?php echo isset($editData) ? $editData['userName'] : '' ?>">

          <label>Email Address</label>
        
<input type="email" placeholder="Enter Email Address" name="email" required value="<?php echo isset($editData) ? $editData['email'] : '' ?>">

          <label>Phone Number</label>
<input type="phone" placeholder="Enter Phone Number" name="phone" required value="<?php echo isset($editData) ? $editData['phone'] : '' ?>">

          <button type="submit" name="update">Submit</button>
          
    </form>
  </div>
</div>
<!--====form section start====-->

<?php include "../model/footer.php"; ?>
</body>
</html>