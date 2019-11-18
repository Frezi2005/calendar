<?php

    session_start();

    $allChecked = true;

    function validate($name, $surname, $username, $email, $password1, $password2, $allChecked) {
        if (strlen($name) < 2) {
            echo "Your name is too short. It has to be at least 2 characters long.";
            $allChecked = false;
        }

        if (preg_match('/[\W]/', $name)) {
            echo "Your name cannot contain any special character.";    
            $allChecked = false;
        }

        
        if (strlen($password1) < 8 || strlen($password1) > 20) {
            echo "Your password must be between 8 and 20 characters long.";
            $allChecked = false;
        }

        if (preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]/', $password1) == false) {      
            echo "Your password must contain at least 1 big letter, 1 special character, 1 number and 1 small letter.";
            $allChecked = false;
        }
    
        if (strlen($surname) < 2) { 
            echo "Your surname is too short. It has to be at least 2 characters long.";
            $allChecked = false;
        }

        if (preg_match('/[\W]/', $surname)) {
            echo "Your surname cannot contain any special character.";
            $allChecked = false;
        }


        if (strlen($username) < 2 || strlen($username) > 20) {
            echo "Your username must be between 2 and 20 characters";
            $allChecked = false;
        }

        $em = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$em){
            echo "Your email has to be valid.";
            $allChecked = false;
        }


        if ($password2 != $password1) {
            echo "Passwords must be the same";
            $allChecked = false;
        }

        return ($allChecked==false)? false : true;

    }

    if (validate($name, $surname, $username, $email, $password1, $password2, $allChecked) == false) {
        echo "false";
    } else {
        echo "true";
    }

?>
    
