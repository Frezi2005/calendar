<?php

    session_start();

    if($_SESSION['loggedIn'] == true) {
        header("Location: index.php");
    }

    session_unset();

?>