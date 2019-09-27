<?php

    require_once "dbConnection/dbconn.php";

    if (isset($_POST['submit'])) {
        header("Location: calendar.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/c98a31cca4.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="overlay"></div>

    <div class="limiter">
        <div class="wrapper">
            <div class="logo">
                <i class="fas fa-calendar-alt calendar-icon"></i>
            </div>

            <span class="logInText">LOG IN</span>

            <form action="index.php" method="post">

                <div>
                    <input type="text" class="usernameInput" name="usernameInput" required/>
                    <label for="usernameInput">Username</label>
                </div>
                
                <div>
                    <input type="password" class="passwordInput" name="password" required/>
                    <label for="passwordInput">Password</label>
                </div>

                <div class="rememberMeContainer">
                    <input type="checkbox" class="rememberMe" name="rememberMeCheckbox"/>
                    Remember Me
                </div>

                <div class="error">
                    <span><?= $error?></span>
                </div>

                <div class="loginBtnContainer">
                    <button class="loginBtn" name="submit">Login</button>
                </div>

                <div class="registerContainer">
                    <a class="register" href="#">
                        Don't have account? Register now!
                    </a>
                </div>

                <div class="forgotPasswordContainer">
                    <a class="forgotPassword" href="#">
                        Forgot Password?
                    </a>
                </div>

            </form>
        </div>
    </div>

</body>

</html>