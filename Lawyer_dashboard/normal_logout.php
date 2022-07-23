<?php

    session_start();

    if ($_SESSION["name"] != "") {
        session_unset();

        header("Location: ./lawyer_login.php");
    }
    else {
        header("Location: ./lawyer_login.php");
    }

?>