<?php

    session_start();

    if ($_SESSION["name"] != "") {
        session_unset();

        header("Location: ./user_login.php");
    }
    else {
        header("Location: ./user_login.php");
    }

?>