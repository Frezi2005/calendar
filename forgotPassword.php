<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/forgotPassword.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/c98a31cca4.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="overlay"></div>

    <div class="limiter">
        <div class="wrapper">
            <div class="logo">
                <i class="fas fa-calendar-alt calendar-icon"></i>
            </div>

            <span class="logInText">FORGOT PASSWORD</span>

            <form action="sendForgotPassword.php" method="post">

                <div>
                    <input type="email" class="emailInput" name="email" value="" required/>
                    <label for="usernameInput">Email</label>
                </div>

                <div class="error">
                    <span><?= $error?></span>
                </div>

                <div class="sendPasswordBtnContainer">
                    <button class="sendPasswordBtn" name="submit">Send Email</button>
                </div>

                <a class="link" href="index.php">
                        Go back to login!
                </a>

            </form>
        </div>
    </div>

    <?php
        include "layouts/footer.html";
    ?>

</body>

</html>