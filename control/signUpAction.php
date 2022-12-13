<?php
require "../model/dbConnect.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    //-------------------validation-----------------//                          
    
    // checking if inputs are empty
    if(empty($_POST['firstName'])){
        header("location: ../view/signUp.php?error=firstNameErr");
        exit();
    } else{
        $firsrName = sanitize($_POST['firstName']); 
    }

    if(empty($_POST['lastName'])){
        header("location: ../view/signUp.php?error=lastNameErr");
        exit();
    } else{
        $lastName = sanitize($_POST['lastName']);
    }

    if(empty($_POST['userName'])){
        header("location: ../view/signUp.php?error=userNameErr");
        exit();
    } else{
        $userName = sanitize($_POST['userName']);
    }

    if(empty($_POST['email'])){
        header("location: ../view/signUp.php?error=emailErr");
        exit();
    } else{
        $email = sanitize($_POST['email']);
    }
    
    if(empty($_POST['password'])){
        header("location: ../view/signUp.php?error=passwordErr");
        exit();
    } else{
        $password = sanitize($_POST['password']);
    }
    
    if(empty($_POST['confirmPassword'])){
        header("location: ../view/signUp.php?error=confirmPasswordErr");
        exit();
    } else{
        $confPassword = sanitize($_POST['confirmPassword']);
    }
    
    if(empty($_POST['phone'])){
        header("location: ../view/signUp.php?error=phoneErr");
        exit();
    } else{
        $phone = sanitize($_POST['phone']);
    }
    
    // validate names
    if(!preg_match("/^[a-zA-Z-' ]*$/",$firsrName)){
        header("location: ../view/signUp.php?error=firstNameCovensionErr");
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$lastName)){
        header("location: ../view/signUp.php?error=lastNameCovensionErr");
        exit();
    }
    
    //validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../view/signUp.php?error=emailConvensionErr");
        exit();
    }
    
    // password match
    if($password !== $confPassword){
        header("location: ../view/signUp.php?error=passmismatchErr");
        exit();
    }

    // check if username or useremail exists
    $sqlFindUser = "SELECT firstName, lastName, userName, email, password, phone from users WHERE userName = '?' OR email = '?';";
    $stmt = mysqli_stmt_init($conn);
    // mysqli_stmt_prepare($stmt, $sqlFindUser);
    if(!mysqli_stmt_prepare($stmt, $sqlFindUser))
    {
        header("location: ../view/signUp.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    
    
    if($row = mysqli_fetch_assoc($resultData)){
        
            if($row["userName"] === $userName or $row["email"] === $email){
                header("location: ../view/signUp.php?error=userexits");
                mysqli_stmt_close($stmt);
                exit();    
            }
        
    }

    
    // add user to database
    $sqlInsertUser = "INSERT INTO users (firstName, lastName, userName, email, password, phone) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlInsertUser))
    {
        header("location: ../view/signUp.php?error=stmt2failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssss",$firsrName, $lastName, $userName, $email, $password, $phone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION['username'] = $userName;
    $_SESSION['password'] = $password;
    header("location:../view/dashboard.php");
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>