<?php

    require "dbConnection/dbconn.php";

    require "mail.php";

    if (isset($_POST['submit'])) {

        $email = $_POST['email'];

        $index = 0;
        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE `mail` LIKE ?");
        if ($stmt->execute(array("$email"))) {
            while ($row = $stmt->fetch()) {
                $index++;  
            }

        }

        if ($index == 1) {
            
            $newPassword = substr(md5(microtime()),rand(0,26),5);
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql = "UPDATE `Users` SET `password` = ? WHERE `mail` LIKE ?";
            $stmtToUpdatePassword = $conn->prepare($sql);
            $stmtToUpdatePassword->execute(["$hashedPassword", "$email"]);
            sendMail('', NULL, $email, "Your password has been changed to this: $newPassword. You can login to your account now with this password.", 'Password Change');

        }

        

    }

?>