<?php
require "../model/dbConnect.php";
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_SESSION['username'])){
        $userName = $_SESSION['username'];
    }
    // -----------validation------------ //
    if(empty($_POST['password'])){
        header("location: ../view/changePassword.php?error=changePasswordErr");
        exit();
    } else{
        $previousPassword = sanitize($_POST['password']);
    }
    
    if(empty($_POST['newPassword'])){
        header("location: ../view/changePassword.php?error=newPasswordErr");
        exit();
    } else{
        $newPassword = sanitize($_POST['newPassword']);
    }

    if(empty($_POST['confirmPassword'])){
        header("location: ../view/changePassword.php?error=confirmPasswordErr");
        exit();
    } else{
        $confirmPassword = sanitize($_POST['confirmPassword']);
    }

    if($newPassword === $confirmPassword){
        // echo $_SESSION['username'];
        $sqlFindtUser = "UPDATE `users` SET `password`= ? WHERE `userName` = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sqlFindtUser))
        {
            header("location: ../view/changePassword.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $newPassword, $userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../view/dashboard.php?");
    }
    else{
        header("location: ../view/changePassword.php?error=newPassConfPassMismatchErr");
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