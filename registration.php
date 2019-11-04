<?php

    session_start();

    include 'validation.php';
    include "mail.php";
    include 'dbConnection/dbconn.php';

    require 'vendor/autoload.php';

    use Ramsey\Uuid\Uuid;
    use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

    if (isset($_POST['submit'])) { 

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $email = $_POST['email'];


        try {

            $uuid1 = Uuid::uuid1();
            $uuid = $uuid1->toString() . "\n"; 
        
        } catch (UnsatisfiedDependencyException $e) {
        
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        
        }

        $date = date('Y-m-d');

        if (validate($name, $surname, $username, $email, $password1, $password2, $allChecked) == false) {
            $_SESSION['rememberedName'] = $name;
            $_SESSION['rememberedSurname'] = $surname;
            $_SESSION['rememberedUsername'] = $username;
            $_SESSION['rememberedEmail'] = $email;
            header("Location: registrationForm.php");
        } else {
            $password = password_hash($password1, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `Users`(`Id`, `name`, `surname`, `username`, `mail`, `password`, `change_Password_Date`, `calendar_Id`, `is_active`, `token`) VALUES (null, '$name', '$surname', '$username', '$email', '$password', '$date', '$uuid', 0, '$uuid')";
            $conn->query($sql);     
            sendMail($username, $uuid, $email);
            $_SESSION['emailAddress'] = $email;
            header("Location: welcome.php"); 
        }

    } else {
        header("Location: registrationForm.php");
    }

?>



