<?php

    $allValdated = false;
    $nameErr;
    $surnameErr;
    $usernameErr;
    $mailErr;
    $passwordErr;
    $usernameErr;

    function validateName($string) {

        if (strlen($string) < 2) {
            $allValidated = false;
            $nameErr = "Your name is too short. It has to be at least 2 characters long.";
        }

        if (preg_match('[\W]', $string)) {
            $allValidated = false;
            $nameErr = "Your name cannot contain any special character.";
        }
    
    }

    function validatePassword($string) {
        
        if (strlen($string) < 8 || strlen($string) > 20) {
            $allValdated = false;
            $passwordErr = "Your password must be between 8 and 20 characters long.";
        }

        if (preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/', $string) == false) {
            $allValidated = false;
            $passwordErr = "Your password must contain at least 1 big letter, 1 special character, 1 number and 1 small letter.";
        }

    }

    function validateSurname() {
        
        if (strlen($string) < 2) {
            $allValidated = false;
            $surnameErr = "Your surname is too short. It has to be at least 2 characters long.";
        }

        if (preg_match('[\W]', $string)) {
            $allValidated = false;
            $surnameErr = "Your surname cannot contain any special character.";
        }
    
    }

    function validateUsername($string) {

        if (strlen($string) < 2 || strlen($string) > 20) {
            $allValidated = false;
            $usernameErr = "Your username must be between 2 and 20 characters";
        }

    }

    function validateEmail($string) {

        if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
            $allValdated = false;
            $mailErr = "Your email has to be valid.";
        }

    }

    function checkIfPasswordsAreMatching($password1, $password2) {
        if ($password2 != $password1) {
            $allValdated = false;
            $passwordErr = "Passwords must be the same";
        }
    }

?>