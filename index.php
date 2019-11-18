<?php

    define('FACEBOOK_API','');

    define('FACEBOOK_SECRET','');

    define('REDIRECT_URI','http://localhost/Calendar');

    $facebook_redirect_uri = 'https://www.facebook.com/v5.0/dialog/oauth?client_id='.FACEBOOK_API.'&redirect_uri='.urlencode(REDIRECT_URI).'&sdk=php-sdk-4.0.12&scope=email';


    session_start();

    if ($_SESSION['loggedIn']) {
        header("Location: calendar.php");
    }

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

    <script>
    window.fbAsyncInit = function() {
        FB.init({
        appId      : '',
        cookie     : true,
        xfbml      : true,
        version    : 'v5.0'
        });
        
        FB.AppEvents.logPageView();   
        
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

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

                <div class="or">
                    <div class="leftLine"></div>OR<div class="rightLine"></div>
                </div>

                <a  class="FBLogin" href="<?= $facebook_redirect_uri; ?>">Login by Facebook!</a>

            </form>
        </div>
    </div>

    <?php

        include "layouts/footer.html";

        if(!empty($_REQUEST['code'])){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/oauth/access_token?fields=email,name&client_id=".FACEBOOK_API."&redirect_uri=".urlencode(REDIRECT_URI)."&client_secret=".FACEBOOK_SECRET."&code=".$_REQUEST['code']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $fb_params = json_decode(curl_exec($ch));
            curl_close($ch);
            if(isset($fb_params->access_token)){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?fields=email,name&access_token=".$fb_params->access_token);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $output = curl_exec($ch);
                $fb_user = json_decode($output);
                curl_close($ch);
            } 
        }

   ?>

</body>

</html>
