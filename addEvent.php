<?php

    session_start();

    require_once "dbConnection/dbconn.php";

    $eventName = $_POST['eventName'];
    $eventDescription = $_POST['eventDescription'];
    $eventPlace = $_POST['eventPlace'];
    $eventStartHour = $_POST['eventStartHour'];
    $eventEndHour = $_POST['eventEndHour'];
    $eventColor = $_POST['eventColor'];
    $eventDate = $_POST['eventDate'];
    $userId = $_POST['userId'];

    $stmt = $conn->prepare("INSERT INTO `Events` (`Id`, `name`, `description`, `date`, `color`, `user_Id`, `calendar_Id`, `place`) VALUES (null, '$eventName', '$eventDescription', '$eventDate', '$eventColor', $userId, $userId, '$eventPlace')");
    $stmt->execute([null, $name, $eventDescription, $eventDate, $eventColor, $userId, $userId, $eventPlace]);



?>