<?php

    require "dbConnection/dbconn.php";
    require "changePasswordValidation.php";

    if (isset($_POST['submitBtn'])) {
        
        $oldPassword = $_POST['oldPassword'];
        $newPassword1 = $_POST['newPassword1'];
        $newPassword2 = $_POST['newPassword2'];

        if (validate($newPassword1, $newPassword1, $allChecked)) {
            echo "Good password";
        }

    } else {
        header("Location: changePasswordForm.php");
    }

?>