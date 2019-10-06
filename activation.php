<?php

    if (!empty($_GET['token'])) {
        echo "Account activated succeselfully!";
        echo "You can <a href='localhost/Calendar/index.php'>login</a> now.";
    } else {
        echo "Account cannot be activated.";
        echo "Sorry for inconvenience.";
    }

?>