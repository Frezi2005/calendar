<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/register.css">
    <script src="https://kit.fontawesome.com/c98a31cca4.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>


    <div class="overlay"></div>

    <div class="limiter">
        <div class="wrapper">
            <div class="logo">
                <i class="fas fa-calendar-alt calendar-icon"></i>
            </div>

            <span class="registerText">REGISTER</span>

            <form action="index.php" method="post">

                <div>
                    <input type="text" class="nameInput" name="nameInput" required/>
                    <label for="nameInput">Name</label>
                </div>

                <div>
                    <input type="text" class="surnameInput" name="surnameInput" required/>
                    <label for="surnameInput">Surname</label>
                </div>

                <div>
                    <input type="text" class="usernameInput" name="usernameInput" required/>
                    <label for="usernameInput">Username</label>
                </div>
                
                <div>
                    <input type="password" class="passwordInput" name="password1" required/>
                    <label for="passwordInput">Password</label>
                </div>

                <div>
                    <input type="password" class="passwordInput" name="password2" required/>
                    <label for="passwordInput">Confirm password</label>
                </div>

                <div>
                    <input type="text" class="emailInput" name="emailInput" required/>
                    <label for="emailInput">Email</label>
                </div>

                <div class="g-recaptcha" data-sitekey="6LfLx7oUAAAAAOIz1R5Pf7SumOVLp6vCYoSYF-T2"></div>

                <div class="error">
                    <span><?= $error?></span>
                </div>

                <div class="registerBtnContainer">
                    <button class="registerBtn" name="submit">Register</button>
                </div>

                <div class="registerContainer">
                    <a class="register" href="#">
                        Already have account? Log in!
                    </a>
                </div>


            </form>
        </div>
    </div>

    
</body>
</html>