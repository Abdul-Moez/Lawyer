<?php

    session_start();

    error_reporting(0);

    include_once("./conn.inc.php");

    if (isset($_POST["submit"])) {
        
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        
        $pass = mysqli_real_escape_string($conn, $_POST["password"]);

        $pass = md5($pass);

        $query = " SELECT * FROM `lawyer` WHERE `Email` = '$email' AND `Password` = '$pass' ";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
        
                $_SESSION["role"] = $row[12];
                $_SESSION["name"] = $row[1];
                $_SESSION["id"] = $row[0];
                $_SESSION["pass"] = $row[11];
                $_SESSION["title"] = $row[2];
                
                $row[2] = $_SESSION["title"];                
                $row[11] = $_SESSION["pass"];
                $row[1] =  $_SESSION["name"];
                $row[12] =  $_SESSION["role"];
                $row[0] =  $_SESSION["id"];

            }
        }
        
        if ($_SESSION["role"] == 2) {
            ?>

                <script>
                    window.location.assign("../index.php");
                </script>

            <?php
        }
        else {
            
            session_unset();
            
            ?>

                <script>
                    window.location.assign("../lawyer_login.php?login=invalid");
                </script>

            <?php
        }

        ?>

            <script>
                window.location.assign("../index.php");
            </script>

        <?php

    }

?>