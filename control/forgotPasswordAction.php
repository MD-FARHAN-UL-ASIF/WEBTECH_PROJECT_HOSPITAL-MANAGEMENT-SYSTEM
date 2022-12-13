<?php
require "../model/dbConnect.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    //-------------------validation-----------------//                          
    
    // checking if inputs are empty
    if(empty($_POST['userName'])){
        header("location: ../view/forgotPassword.php?error=userNameErr");
        exit();
    } else{
        $userName = sanitize($_POST['userName']);
    }

    if(empty($_POST['email'])){
        header("location: ../view/forgotPassword.php?error=emailErr");
        exit();
    } else{
        $email = sanitize($_POST['email']);
    }
    
    if(empty($_POST['password'])){
        header("location: ../view/forgotPassword.php?error=passwordErr");
        exit();
    } else{
        $password = sanitize($_POST['password']);
    }
    
    if(empty($_POST['confirmPassword'])){
        header("location: ../view/forgotPassword.php?error=confirmPasswordErr");
        exit();
    } else{
        $confPassword = sanitize($_POST['confirmPassword']);
    }
    
    //validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../view/forgotPassword.php?error=emailConvensionErr");
        exit();
    }
    


    // log the user in and save new password
    if($password === $confPassword){
        $sqlFindUser = "SELECT `firstName`, `lastName`, `userName`, `email`, `password`, `phone` FROM `users` WHERE `userName` = ? AND `email` = ?;";
        $stmt = mysqli_stmt_init($conn);
        // mysqli_stmt_prepare($stmt, $sqlFindUser);
        if(!mysqli_stmt_prepare($stmt, $sqlFindUser))
        {
            header("location: ../view/forgotPassword.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        
        
        if($row = mysqli_fetch_assoc($resultData)){
            if($row["userName"] === $userName or $row["email"] === $email){
                // header("location: ../view/signUp.php?error=userexits");
                // mysqli_stmt_close($stmt);
                // exit();
                $sqlchangePassword = "UPDATE `users` SET `password`= ? WHERE `userName` = ? AND `email` = ?;";
                $stmt = mysqli_stmt_init($conn);
                // mysqli_stmt_prepare($stmt, $sqlFindUser);
                if(!mysqli_stmt_prepare($stmt, $sqlchangePassword))
                {
                    header("location: ../view/forgotPassword.php?error=stmtfailed");
                    exit();
                }
                
                mysqli_stmt_bind_param($stmt, "sss", $password, $userName, $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                session_start();
                $_SESSION['username'] = $userName;
                $_SESSION['password'] = $password;
                header("location: ../view/dashboard.php");
                // echo "i am in";
            }
        }
    }
    else{
        header("location:../view/forgotPassword.php?error=passAndConfPassMismatchErr");
        exit();
    }
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>