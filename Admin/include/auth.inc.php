<?php

    session_start();

    error_reporting(0);

    include_once("./conn.inc.php");

    if (isset($_POST["submit"])) {

        $email = mysqli_real_escape_string($conn, $_POST["email"]);

        $pass = mysqli_real_escape_string($conn, $_POST["password"]);

        $passAfter = md5($pass);

        $query = "SELECT * FROM `user` WHERE `Email` = '$email' AND `Password` = '$passAfter'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                
                $_SESSION["name"] = $row[1];
                $_SESSION["role"] = $row[4];
                $_SESSION["status"] = $row[5];
                $_SESSION["id"] = $row[0];
                $_SESSION["pass"] = $row[3];
                
                $row[3] =  $_SESSION["pass"];                              
                $row[0] =  $_SESSION["id"];                              
                $row[1] =  $_SESSION["name"];
                $row[4] =  $_SESSION["role"];
                $row[5] =  $_SESSION["status"];

            }
        }

        if ($_SESSION["pass"] == $passAfter) {
            
            if ($_SESSION["status"] == 1) {

                if ($_SESSION["role"] == 0) {
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
                            window.location.assign("../login.php?login=invalid");
                        </script>

                    <?php
                }
            }
            else {
                
                session_unset();

                ?>
                    
                    <script>
                        window.location.assign("../login.php?status=null");
                    </script>

                <?php

            }

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
                    window.location.assign("../login.php?password=invalid");
                </script>

            <?php

        }

    }

?>  