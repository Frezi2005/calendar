<?php

    session_start();

    require "dbConnection/dbconn.php";

    $allChecked = true;

    function validate($name, $surname, $username, $email, $password1, $password2, $allChecked, $conn) {
        
        $usernameCount = 0;

        $stmtToGetUsername = $conn->prepare("SELECT * FROM `Users` WHERE `username` = ?");
        if ($stmtToGetUsername->execute(array("$username"))) {
            while ($row = $stmtToGetUsername->fetch()) {
                $usernameCount++;
            }
        }

        $emailCount = 0;

        $stmtToGetEmail = $conn->prepare("SELECT * FROM `Users` WHERE `mail` = ?");
        if ($stmtToGetEmail->execute(array("$email"))) {
            while ($row = $stmtToGetEmail->fetch()) {
                $emailCount++;
            }
        }

        if (strlen($name) < 2) {
            $_SESSION['nameError'] = "Your name is too short. It has to be at least 2 characters long.";
            $allChecked = false;
        }

        if ($usernameCount > 0) {
            $_SESSION['usernameError'] = "This username is already taken.";
            $allChecked = false;
        }

        if ($emailCount > 0) {
            $_SESSION['emailError'] = "This email is already taken.";
            $allChecked = false;
        }

        if (preg_match('/[\W]/', $name)) {
            $_SESSION['nameError'] = "Your name cannot contain any special character.";    
            $allChecked = false;
        }

        
        if (strlen($password1) < 8 || strlen($password1) > 20) {
            $_SESSION['passwordError'] = "Your password must be between 8 and 20 characters long.";
            $allChecked = false;
        }

        if (preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]/', $password1) == false) {      
            $_SESSION['passwordError'] = "Your password must contain at least 1 big letter, 1 special character, 1 number and 1 small letter.";
            $allChecked = false;
        }
    
        if (strlen($surname) < 2) { 
            $_SESSION['surnameError'] = "Your surname is too short. It has to be at least 2 characters long.";
            $allChecked = false;
        }

        if (preg_match('/[\W]/', $surname)) {
            $_SESSION['surnameError'] = "Your surname cannot contain any special character.";
            $allChecked = false;
        }


        if (strlen($username) < 2 || strlen($username) > 20) {
            $_SESSION['usernameError'] = "Your username must be between 2 and 20 characters.";
            $allChecked = false;
        }

        if (preg_match('/[\s]/', $username)) {
            $_SESSION['usernameError'] = "Your username cannot contain any whitespaces.";
            $allChecked = false;
        }

        if (preg_match('/[\s]/', $surname)) {
            $_SESSION['surnameError'] = "Your surname cannot contain any whitespaces.";
            $allChecked = false;
        }

        if (preg_match('/[\s]/', $name)) {
            $_SESSION['nameError'] = "Your name cannot contain any whitespaces.";
            $allChecked = false;
        }

        $em = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$em){
            $_SESSION['emailError'] = "Your email has to be valid.";
            $allChecked = false;
        }


        if ($password2 != $password1) {
            $_SESSION['passwordError'] = "Passwords must be the same.";
            $allChecked = false;
        }

        return ($allChecked==false)? false : true;

    }

?>
    
