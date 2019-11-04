<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/c98a31cca4.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/captcha.js"></script>
</head>
<body>


    <div class="overlay"></div>

    <div class="limiter">
        <div class="wrapper">
            <div class="logo">
                <i class="fas fa-calendar-alt calendar-icon"></i>
            </div>

            <span class="registerText">REGISTER</span>

            <form action="registration.php" method="post">

                <div>
                    <input type="text" class="nameInput" name="name" value="<?php echo $_SESSION['rememberedName']; unset($_SESSION['rememberedName']) ?>" required/>
                    <label for="nameInput">Name</label><br/>
                    <span class="error"><?php echo $_SESSION['nameError']; unset($_SESSION['nameError']) ?></span>
                </div>

                <div>
                    <input type="text" class="surnameInput" name="surname" value="<?php echo $_SESSION['rememberedSurname']; unset($_SESSION['rememberedSurname']) ?>" required/>
                    <label for="surnameInput">Surname</label><br/>
                    <span class="error"><?php echo $_SESSION['surnameError']; unset($_SESSION['surnameError']) ?></span>
                </div>

                <div>
                    <input type="text" class="usernameInput" name="username" value="<?php echo $_SESSION['rememberedUsername']; unset($_SESSION['rememberedUsername']) ?>" required/>
                    <label for="usernameInput">Username</label><br/>
                    <span class="error"><?php echo $_SESSION['usernameError']; unset($_SESSION['usernameError']) ?></span>
                </div>
                
                <div>
                    <input type="password" class="passwordInput" name="password1" required/>
                    <label for="passwordInput">Password</label><br/>
                    <span class="error"><?php echo $_SESSION['passwordError']; unset($_SESSION['passwordError']) ?></span>
                </div>

                <div>
                    <input type="password" class="passwordInput" name="password2" required/>
                    <label for="passwordInput">Confirm password</label>
                </div>

                <div>
                    <input type="text" class="emailInput" name="email" value="<?php echo $_SESSION['rememberedEmail']; unset($_SESSION['rememberedEmail']) ?>" required/>
                    <label for="emailInput">Email</label><br/>
                    <span class="error"><?php echo $_SESSION['emailError']; unset($_SESSION['emailError']) ?></span>
                </div>

                <div class="g-recaptcha" data-sitekey="6LfLx7oUAAAAAOIz1R5Pf7SumOVLp6vCYoSYF-T2" data-callback="correctCaptcha"></div><br/>
                <span class="error"><?php echo $_SESSION['captchaError']; unset($_SESSION['captchaError']) ?></span>

                <div class="registerBtnContainer">
                    <button class="registerBtn" id="registerBtn" name="submit" disabled>Register</button>
                </div>

                <div class="registerContainer">
                    <a class="register" href="index.php">
                        Already have account? Log in!
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