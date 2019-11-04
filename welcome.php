<?php

    session_start();

    if (!isset($_SESSION['emailAddress'])) {
        header("Location: registrationForm.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/welcomePage.css">
</head>
<body>
    <div class="wrapper">
        <span class="messageTitle">Activation email has been sent to: <?=$_SESSION['emailAddress']; ?></span><br/><br/>
        <p class="message">Email with an account activation link has been sent to your email address.</p>
    </div>

    <div class="overlay"></div>
</body>
</html>