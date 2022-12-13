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
        <title>HMS | A complete System</title>
        <style>
           
            body {
                overflow-x: hidden;
            }
            
            .container {
  width: 100%;
  height: 50vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

h1 {
    font-size: 40px;
    text-transform: uppercase;
    font-family: 'Gambetta', serif;
    letter-spacing: -3px;
    transition: 700ms ease;
    font-variation-settings: "wght" 311;
    margin-bottom: 0.8rem;
    color:#0D1559;
    outline: none;
    text-align: center;
}

h1:hover {
    font-variation-settings: "wght" 582; 
    letter-spacing: 1px;
}

p {
    font-size: 1.2em;
    line-height: 150%;
    text-align: center;
    color:darkslategrey;
    letter-spacing: .5px;
}
</style>
<?php include "../model/_nav.php"; ?>
</head>

<body style="padding-right:7rem;padding-left:7rem;">
    
    <!-- header -->

    <div class="container">
  <h1 contenteditable>Welcome, admin!</h1>
<p>Hospital Mangement System</p>
<p>Our specialty is you</p>
</div>
    <!-- footer -->
    <?php include "../model/footer.php"; ?>

</body>
</html>