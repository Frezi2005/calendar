<?php

    if (isset($_POST['submit'])) {
        if(!empty($_POST["rememberMe"])) {
            setcookie ("username",$_POST["username"],time()+ 3600);
            setcookie ("password",$_POST["password"],time()+ 3600);
        } else {
            setcookie("username","");
            setcookie("password","");
        }

    }

?>