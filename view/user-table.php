<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>

<?php

include('../control/read-userAction.php');
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title >User Management</title>
<style>
     table, td, th {  
      border: 1px solid #ddd;
      text-align: left;
    }
    
    table {
      border-collapse: collapse;
      max-width: 100%;
     width:100%;

    }
    .table-data{
      
      width:100%;
      float: right;
    }
    th, td {
      padding: 15px;
    }
    th{
  background-color:gainsboro ;
}
    tr:hover {background-color:lightblue ;}
body{
    overflow-x: hidden;
}

* {
  box-sizing: border-box;}

button[type=bk] {
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
button[type=bk]:hover {
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
  h2 {
  text-align: center;
}

</style>
</head>
<body style="padding-right:7rem;padding-left:7rem;">
<?php include "../model/_nav.php"; ?>

<div class="table-data">
        <div class="list-title">
 <h2>Users List</h2>
          
            </div>

    <table border="1">

        <tr>

            <th>S.N</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>User Name</th>
            <th>Email Address</th>
            <th>Phone</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>
        
<?php

        if(count($fetchData)>0){
        $sn=1;
        foreach($fetchData as $data){
            
?> <tr>
<td><?php echo $sn; ?></td>
<td><?php echo $data['firstName']; ?></td>
<td><?php echo $data['lastName']; ?></td>
<td><?php echo $data['userName']; ?></td>
<td><?php echo $data['email']; ?></td>
<td><?php echo $data['phone']; ?></td>


<td><a style="text-decoration:none;" href="../view/update-user.php?edit=<?php echo $data['id']; ?>">
                <button style="background-color: #0D1559;color: #ffffff;padding:10px;padding: 10px;border: none;border-radius: 30px;">Edit</button></a></td>
<td><a style="text-decoration:none;" href="../control/delete-userAction.php?delete=<?php echo $data['id']; ?>">
                <button style="background-color:tomato;color: #ffffff;padding:10px;padding: 10px;border: none;border-radius: 30px;">Delete</button></a></td>

</tr> <?php

      $sn++; }

      }else{
            
?>

      <tr>
        <td colspan="7">No Data Found</td>
      </tr>
                
<?php

    }
?>
 
    </table>
    <button type="bk" onclick="document.location='../view/dashboard.php'">Back</button>
    </div>

   
    <?php include "../model/footer.php"; ?>
</body>
</html>