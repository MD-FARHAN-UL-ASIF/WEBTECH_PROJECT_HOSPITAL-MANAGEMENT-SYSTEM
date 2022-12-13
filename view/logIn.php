<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
<?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $userNameEmpty = false;
        $passEmpty = false;
        $stmtFailed = false;
        $wrongCredentials = false;
        $userNotFound = false;

        if(strpos($fullUrl,"error=userNameErr") == true){
            $userNameEmpty = true;
        }

        elseif(strpos($fullUrl,"error=passwordErr") == true){
            $passEmpty = true;
        }

        elseif(strpos($fullUrl,"error=stmtfailed") == true){
            $stmtFailed = true;
        }

        elseif(strpos($fullUrl,"error=wrongcredentials") == true){
            $wrongCredentials = true;
        }

        elseif(strpos($fullUrl,"error=usernotfound") == true){
            $userNotFound = true;
        }
    ?>
    <main>
        <section>
            <div style="margin:auto;width:20%;margin-top:12rem;background-color:#0D1559;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
                <div style="margin-top:4rem;text-align:center;padding-top:0.5rem;color:#e6e6e6;">
                    <h1>Log In</h1>
                </div>
                <div>
                    <form style="margin-left:0rem;" action="../control/logInAction.php" method="post" novalidate id="lg-form" onsubmit="return isValid(this);">
                        <label style="color:#e6e6e6;" for="userName">User Name</label>
                        <br>
                        <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="text" name="userName" id="userName">
                        <?php
                        if($userNameEmpty === true){
                            echo "<i style='color:red;'>User Name empty</i>";
                        }
                        ?>
                        <span style='color:red;' id="lg-unameErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="password">Password</label>
                        <br>
                        <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="password" name="password" id="password">
                        <?php
                        if($passEmpty === true){
                            echo "<i style='color:red;'>Password empty</i>";
                        }
                        ?>
                        <span style='color:red;' id="lg-passwordErr"></span>
                        <br><br><br>
                        <input style="text-color:#e6e6e6;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;border-radius: 30px;border:none;font-size:15px;" type="submit" value="Submit">
                    </form>
                </div>
                <div style="margin-top:1rem;padding-top:1rem;text-align:center;">
                <span style="text-decoration:none;color:#e6e6e6;">Forgot Password? 
                <a style="text-decoration:none;color:crimson;" 
                href="../view/forgotPassword.php">Click Here..!</a>
                </span> 
                <br><br>
                <span style="text-decoration:none;color:#e6e6e6;">Don't have an account? 
                <a style="text-decoration:none;color:crimson;" href="../view/signUp.php">Sign Up</a>
            </span>
            </div>
            <?php
                    if($stmtFailed === true){
                        echo "Statement failed!";
                    }
                    if($wrongCredentials === true || $userNotFound === true){
                        echo "<p style='text-align:center;color:red;'>Invalid credentials!</p>";
                    }
                ?>
            </div>
        </section>
    </main>
    <script src="js/logIn.js"></script>
</body>
</html>