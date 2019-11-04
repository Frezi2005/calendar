<?php

    session_start();

    require_once "dbConnection/dbconn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/c98a31cca4.js" crossorigin="anonymous"></script>
    <script src="js/showPassword.js"></script>
</head>

<body>

    <div class="overlay"></div>

    <div class="limiter">
        <div class="wrapper">
            <div class="logo">
                <i class="fas fa-calendar-alt calendar-icon"></i>
            </div>

            <span class="logInText">LOG IN</span>

            <form action="login.php" method="post">

                <div>
                    <input type="text" class="usernameInput" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required/>
                    <label for="usernameInput">Username</label>
                </div>
                
                <div>
                    <input type="password" class="passwordInput" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"  required/>
                    <label for="passwordInput">Password</label>
                    <i class="fas fa-eye eyeIcon"></i>
                </div>

                <div class="rememberMeContainer">
                    <input type="checkbox" class="rememberMe" name="rememberMe"/>
                    Remember Me
                </div>

                <div class="error">
                    <?php
                    if(isset($_SESSION["loginError"])){
                        $error = $_SESSION["loginError"];
                        echo "<span>$error</span>";
                        session_unset();
                    }
                    ?>  

                </div>

                <div class="loginBtnContainer">
                    <button class="loginBtn" name="submit">Login</button>
                </div>

                <div class="registerContainer">
                    <a class="register" href="registrationForm.php">
                        Don't have account? Register now!
                    </a>
                </div>

                <div class="forgotPasswordContainer">
                    <a class="forgotPassword" href="forgotPassword.php">
                        Forgot Password?
                    </a>
                </div>

            </form>
        </div>
    </div>

    <?php
        include "layouts/footer.html";
    ?>

</body>

</html>