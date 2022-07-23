<?php

    session_start();

    if ($_SESSION["name"] != "") {
        session_unset();

        header("Location: ./login.php");
    }
    else {
        header("Location: ./login.php");
    }

?>