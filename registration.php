<?php

    require "validation.php";
    require "mail.php";

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $mail = $_POST['mail'];

        sendMail("test123", "123456789abcdefg");

    }

?>



