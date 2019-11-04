<?php

    header('Content-type: application/json');

    session_start();

    require "dbConnection/dbconn.php";

    $userId = $_SESSION['userId'];
    
    $sqlToGetEvents = "SELECT * FROM `Events` WHERE user_Id = '$userId'";
    
    $result = $conn->query($sqlToGetEvents);

    echo json_encode($result->fetchAll());

    

?>