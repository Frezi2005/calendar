<?php

    session_start();

    require "mail.php";
    require "dbConnection/dbconn.php";


    if (isset($_POST['reportBtn'])) {
        $message = $_POST['message'];
        $email = $_POST['email'];
        $reportCause = $_POST['reportCause'];
        $date = date('Y-m-d H:i:s');
        $userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : NULL;

        $stmt = $conn->prepare("INSERT INTO `Reports`(`id`, `message`, `created`, `userId`, `type`, `email`) VALUES (null, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$message, $date, $userId, $reportCause, $email])) {
            echo "Inserted";
            sendMail('', NULL, 'kamil.wan05@gmail.com', $message, 'Report');
        } else {
            echo "Not inserted";
        }

    } else {
        header("Location: report.php");
    }

?>