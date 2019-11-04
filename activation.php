<?php

    include "dbConnection/dbconn.php";
    require 'vendor/autoload.php';

    use Ramsey\Uuid\Uuid;
    use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


    if (!empty($_GET['token'])) {
        $token = $_GET['token'];
        $isValid = Uuid::isValid($token);
        if(!$isValid) {
            echo "Invalid token!";
            die();
        }
        $index = 0;
        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE `token` LIKE ?");
        if ($stmt->execute(array("%$token%"))) {
            while ($row = $stmt->fetch()) {
                $index++;  
            }
        }
        if ($index == 1) {
            $sqlToUpdateAccount = "UPDATE `Users` SET `is_active` = 1 WHERE `token` LIKE ?";
            $stmt= $conn->prepare($sqlToUpdateAccount);
            $stmt->execute(["%$token%"]);
            echo "Your account has been activated!";
        } else {
            echo "Invalid token!";
        }
        
    } else {
        echo "Invalid token!";
    }

?>