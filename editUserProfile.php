<?php
    
    session_start();
    
    error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lawyer - Law Firm Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Law Firm Website Template" name="keywords">
        <meta content="Law Firm Website Template" name="description">

        <!-- Favicon -->
        <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- CSS only -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="index.php">
                                    <h1 style="margin-bottom: 2rem; margin-top: -0.5rem;">Lawyer</h1>
                                    <!-- <img src="img/logo.jpg" alt="Logo"> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="top-bar-right">
                                <div class="text">
                                    <h2>8:00 AM - 9:00 PM</h2>
                                    <p>Opening Hour Mon - Fri</p>
                                </div>
                                <div class="text">
                                    <h2>+123 456 7890</h2>
                                    <p>Call Us For Free Consultation</p>
                                </div>
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- Nav Bar Start -->
            <div class="nav-bar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <a href="#" class="navbar-brand">MENU</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto">
                                <a href="index.php" class="nav-item nav-link">Home</a>
                                <a href="about.php" class="nav-item nav-link">About</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                            </div>
                            
                            <div class="ml-2">
                                <a class="btn" href="./index">Home</a>
                            </div>
                            
                            <div class="ml-2">
                                <a class="btn" href="./index#lawyers">Get Appointment</a>
                            </div>
                            
                            <div class="ml-2">
                                <a class="btn" href="./normal_logout">Logout</a>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
            <!-- Nav Bar End -->

<?php

    $id = $_SESSION["id"];

?>

</br>

    <!-- USERNAME FORM Start -->

    <form action="" method="post">

        <?php

            include_once("./include/conn.inc.php");

            $query = "SELECT * FROM `user` WHERE `id` = ?";

            // Create a prepared statement
            $stmt = mysqli_stmt_init($conn);

            // Prepare the prepared statement
            if (!mysqli_stmt_prepare($stmt, $query)) {
                
                echo "SQL Statement Failed";

            } else {

                // Bind parameters to the placehokder
                mysqli_stmt_bind_param($stmt, "s", $id);

                // Run parameters inside database
                mysqli_stmt_execute($stmt);
                
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_array($result)) {
          
                $usernameUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($usernameUrl, "invalid=username") == true) {
                    ?>

                        <h4 class="bg-danger text-center mx-2 my-2 p-2 rounded">Username Should Only Contain Letters And Spaces</h4>

                    <?php
                }
                else {
                    // echo "no";
                }

        ?>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputUserName" type="text" value="<?php echo $row['1']; ?>" disabled />
                    <label for="inputUserName">Your Old Username</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" type="text" placeholder="Please Enter Your New Username" name="username" id="username" />
                    <label for="inputUserName">Enter Your New Username</label>
                </div>
            </div>
        </div>

        <div class="mt-2 mb-4">
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit Username" name="submitUsername" id="usernameSubmit" >
            </div>
        </div>

        <script>

            $(document).ready(function(){
                $('#usernameSubmit').prop('disabled',true);
                $('#username').keyup(function(){
                    $('#usernameSubmit').prop('disabled', this.value == "" ? true : false);     
                })
            });
            
        </script>
        
        <?php

            // echo $row[1];

            if (isset($_POST["submitUsername"])) {
                
                //get username from form
                $username = mysqli_real_escape_string($conn, $_POST['username']);

                // Username Validation If Start
                if (!preg_match("/^[a-zA-Z-']*$/", $username)) {
                
                    ?>

                        <script>
                            window.location.assign("./editUserProfile?invalid=username");
                        </script>

                    <?php

                }
                else{        

                    $sql_username = "SELECT * FROM `user` WHERE `name` = '$username';";

                    $select = mysqli_query($conn, $sql_username);

                    if ($username == $row["1"]) {

                        echo ('Please Dont Use The Username That You Are Already Using, Thanks');

                    }else {

                        if(mysqli_num_rows($select)) {

                            echo 'This username already exists';
        
                        }
                        else {

                            $query = "UPDATE `user` SET `Name`='$username' WHERE id = $id";

                            $query_run = mysqli_query($conn, $query);

                            if($query_run)
                            {
                                echo '<script> alert("Username Updated"); </script>';
                        ?>

                            <script>
                                window.location.assign("./editUserProfile.php");
                            </script>

                        <?php
                            }
                            else
                            {
                                echo '<script> alert("Username Not Updated, Please Try Again"); </script>';
                            }

                        }
                    }
                }
            }
        }
    }


        ?>

    
    </form>

    <!-- USERNAME FORM End -->
    
    <!-- Email FORM Start -->

    <form action="" name="email" method="post" onsubmit="requiredEmail()">

        <?php

            include_once("./include/conn.inc.php");

            $query = "SELECT * FROM `user` WHERE `id` = ?";
    
            // Create a prepared statement
            $stmt = mysqli_stmt_init($conn);

            // Prepare The prepared statement
            if (!mysqli_stmt_prepare($stmt, $query)) {
                
                echo "SQL Statement Failed";

            }else {
                
                // Bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "s", $id);

                // Run parameters inside database
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_array($result)) {

                $emailUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
                if (strpos($emailUrl, "invalid=email") == true) {
                    ?>
    
                        <h4 class="bg-danger text-center mx-2 my-2 p-2 rounded">Email is not valid, Please enter a valid Email</h4>
    
                    <?php
                }
                else {
                    // echo "no";
                }

        ?>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputUserName" type="text" value="<?php echo $row['2']; ?>" disabled />
                    <label for="inputUserName">Your Old Email</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="email" type="email" placeholder="Please Enter Your New Email" name="email" />
                    <label for="inputUserName">Enter Your New Email</label>
                </div>
            </div>
        </div>

        <div class="mt-2 mb-4">
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit Email" name="submitEmail" id="submitEmail">
            </div>
        </div>

        <script>

            $(document).ready(function(){
                $('#submitEmail').prop('disabled',true);
                $('#email').keyup(function(){
                    $('#submitEmail').prop('disabled', this.value == "" ? true : false);     
                })
            });
            
        </script>
        
        <?php

            // echo $row[1];

            if (isset($_POST["submitEmail"])) {
                
                //get email from form
                $email = mysqli_real_escape_string($conn, $_POST['email']);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
                    // echo "Please Input Valid Email";
                    
                ?>
            
                    <script>
                        window.location.assign("./editUserProfile?invalid=email");
                    </script>
            
                <?php
                    
                }
                else {

                    $sql_email = "SELECT * FROM `user` WHERE `email` = '$email';";

                    $select = mysqli_query($conn, $sql_email);

                    if ($email == $row["1"]) {

                        echo ('Please Dont Use The Email That You Are Already Using, Thanks');

                    }else {

                        if(mysqli_num_rows($select)) {

                            echo('This email already exists');
        
                        }
                        else {

                            $query = "UPDATE `user` SET `email`='$email' WHERE id = $id";

                            $query_run = mysqli_query($conn, $query);

                            if($query_run)
                            {
                                echo '<script> alert("Email Updated"); </script>';
                        ?>

                            <script>
                                window.location.assign("./editUserProfile.php");
                            </script>

                        <?php
                            }
                            else
                            {
                                echo '<script> alert("Email Not Updated, Please Try Again"); </script>';
                            }

                        }

                    }
                }
            }
        }
    }


        ?>

    
    </form>

    <!-- Email FORM End -->

    <!-- Password Form Start -->
    
    <form action="" name="password" method="post" onsubmit="requiredPassword()">

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputOldPassword" type="password" name="oldPassword"  />
                    <label for="inputOldPassword">Enter Old Password</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputNewPassword" type="password" name="newPassword"  />
                    <label for="inputNewPassword">Enter New Password</label>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-0">
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit Password" name="submitPassword" id="submitPassword">
            </div>
        </div>
        
        <script>
            
            $(document).ready(function() {
                $('#submitPassword').prop('disabled', true);

                function validateNextButton() {
                    var buttonDisabled = $('#inputOldPassword').val().trim() === '' || $('#inputNewPassword').val().trim() === '';
                    $('#submitPassword').prop('disabled', buttonDisabled);
                }

                $('#inputOldPassword').on('keyup', validateNextButton);
                $('#inputNewPassword').on('keyup', validateNextButton);
            });

        </script>

    <?php

        if (isset($_POST["submitPassword"])) {

            $oldPassword = mysqli_real_escape_string($conn, $_POST["oldPassword"]);
            $newPassword = mysqli_real_escape_string($conn, $_POST["newPassword"]);

            $convertedPass = md5($oldPassword);

            $convertingPass = md5($newPassword);

            // echo $convertedPass . "</br>";

            // echo $_SESSION["pass"];

            if ($_SESSION["pass"] == $convertedPass) {
                
                $query = "UPDATE `user` SET `Password`='$convertingPass' WHERE id = $id;";

                $query_run = mysqli_query($conn, $query);

                if($query_run)
                {
                    echo '<script> alert("Data Updated Please Login Again"); </script>';
                    ?>
                    
                        <script>
                            window.location.assign("./normal_logout.php");
                        </script>
                    
                    <?php
                }
                else
                {
                    echo '<script> alert("Data Not Updated"); </script>';
                }

            }
            else {
                echo "Invalid Old Password Please Enter Correct Old Password";
            }

        }

    ?>

    </form>

    <!-- Password Form End -->
    
<?php

include_once("./include/footer.php");

?>