<?php

    session_start();

    $allChecked = true;

    function validate($password1, $password2, $allChecked) {

        if ($password2 != $password1) {
            $_SESSION['passwordError'] = "Passwords must be the same.";
            $allChecked = false;
        }

        if (strlen($password1) > 20 || strlen($password1) < 8) {
            $_SESSION['passwordError'] = "Password is to long! Password has to be beetwen 8 and 20 charactersb long.";
            $allChecked = false;
        }

        return ($allChecked==false)? false : true;

    }

?>
    
