<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS | Test Report</title>
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
    </style>
</head>
<body style="padding-right:7rem;padding-left:7rem;">
<!-- header -->
<?php require "../model/_nav.php";?>
    <main>
        <section>
            <?php require "../control/testReportAction.php"; ?>
        </section>
    </main>
    <!-- footer -->
    <?php include "../model/footer.php"; ?>
</body>
</html>