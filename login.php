<?php

    session_start();

    include 'dbConnection/dbconn.php';

    if (isset($_POST['submit'])) {
        if(!empty($_POST["rememberMe"])) {
            setcookie ("username",$_POST["username"],time()+ 3600);
            setcookie ("password",$_POST["password"],time()+ 3600);
        } else {
            setcookie("username","");
            setcookie("password","");
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $rowCount = 0;

        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE `username` = ?");
        if ($stmt->execute(array("$username"))) {
            while ($row = $stmt->fetch()) {
                $rowCount++;
                $user = $row;
            }
        }

        if ($rowCount > 0 && password_verify($password, $user['password'])) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['userId'] = $user['Id'];
            header("Location: calendar.php");
        } else {
            $_SESSION['loggedIn'] = false;
            $_SESSION['loginError'] = "Incorrect username or password";
            header("Location: index.php");
            exit();
        }

    } else {
        header("Location: index.php");
    }

?>