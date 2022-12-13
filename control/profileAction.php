<?php
session_start();
require "../model/dbConnect.php";

$UserName = $_SESSION['username'];
$Password = $_SESSION['password'];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // session variables
  
    echo $UserName;
    echo $Password;
    // ----------- get data from server ------------//

    // if(isset($_POST['View'])){
        
        
    // }
    // -----------update-----------//
    if(isset($_POST["Update"])){
        // ---------VALIDATION------------//
        if(empty($_POST['firstName'])){
            header("location: ../view/viewProfile.php?error=firstNameErr");
            exit();
        } else{
            $firstName = sanitize($_POST['firstName']); 
        }

        if(empty($_POST['lastName'])){
            header("location: ../view/viewProfile.php?error=lastNameErr");
            exit();
        } else{
            $lastName = sanitize($_POST['lastName']);
        }

        if(empty($_POST['userName'])){
            header("location: ../view/viewProfile.php?error=userNameErr");
            exit();
        } else{
            $userName = sanitize($_POST['userName']);
        }

        if(empty($_POST['email'])){
            header("location: ../view/viewProfile.php?error=emailErr");
            exit();
        } else{
            $email = sanitize($_POST['email']);
        }

        if(empty($_POST['phone'])){
            header("location: ../view/viewProfile.php?error=phoneErr");
            exit();
        } else{
            $phone = sanitize($_POST['phone']);
        }

        // validate names
        if(!preg_match("/^[a-zA-Z-' ]*$/",$firsrName)){
            header("location: ../view/viewProfile.php?error=firstNameCovensionErr");
            exit();
        }
        if(!preg_match("/^[a-zA-Z-' ]*$/",$lastName)){
            header("location: ../view/viewProfile.php?error=lastNameCovensionErr");
            exit();
        }
        
        //validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ../view/viewProfile.php?error=emailConvensionErr");
            exit();
        }

        // echo "i am in";
        $sqlUpdatetUser = "UPDATE `users` SET `firstName` = ?,`lastName` = ?,`userName` = ?, `email` = ?,`phone` = ? WHERE `userName` = ? AND `password`= ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sqlUpdatetUser))
        {
            header("location: ../view/viewProfile.php?error=stmt2failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssssss", $firstName, $lastName, $userName, $email, $phone, $UserName, $Password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../view/viewProfile.php?");
    }

}

$sqlFindUser = "SELECT `firstName`, `lastName`, `userName`, `email`, `password`, `phone` FROM `users` WHERE `userName` = ? AND `password` = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sqlFindUser))
        {
            header("location: ../view/viewProfile.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $UserName, $Password);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        
        if($row = mysqli_fetch_assoc($resultData)){
            if($row["userName"] === $UserName and $row["password"] === $Password){
                // echo "i am in";
                $_SESSION['dbFirstName'] = $row["firstName"];
                $_SESSION['dbLastName'] = $row["lastName"];
                $_SESSION['dbUserName'] = $row["userName"];
                $_SESSION['dbemail'] = $row["email"];
                $_SESSION['dbPhone'] = $row["phone"];
                header("location:../view/viewProfile.php?");
                mysqli_stmt_close($stmt);
            }
        }
        else{
            header("location:../control/profileAction.php?error=usernotfound");
            echo "i am here";
            mysqli_stmt_close($stmt);
            exit();
        }

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>