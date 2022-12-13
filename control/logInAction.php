<?php
require "../model/dbConnect.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // -----------validation------------ //
    if(empty($_POST['userName'])){
        header("location: ../view/logIn.php?error=userNameErr");
        exit();
    } else{
        $userName = sanitize($_POST['userName']);
    }
    
    if(empty($_POST['password'])){
        header("location: ../view/logIn.php?error=passwordErr");
        exit();
    } else{
        $password = sanitize($_POST['password']);
    }
    
    // log the user in
    $sqlFindtUser = "SELECT firstName, lastName, userName, email, password, phone from users WHERE userName = ? AND password = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlFindtUser))
    {
        header("location: ../view/signUp.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $userName, $password);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)){
        echo "i am in";
        
        if($row["userName"] == $userName and $row["password"] === $password){
            session_start();
            $_SESSION['username'] = $userName;
            $_SESSION['password'] = $password;
            header("location: ../view/dashboard.php");
            mysqli_stmt_close($stmt);
        }
        else{
            header("location../view/logIn.php?error=wrongcredentials");
            mysqli_stmt_close($stmt);
            exit();
        }
        
    }
    else{
        header("location:../view/logIn.php?error=usernotfound");
        echo "i am here";
            mysqli_stmt_close($stmt);
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