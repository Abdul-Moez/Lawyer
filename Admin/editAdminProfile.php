<?php

    session_start();

    $id = $_SESSION["id"];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lawyer - Admin</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="container bg-primary">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Admin Dashboard</a>
            <!-- Navbar-->
            <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./index.php">Home Page</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="admin_logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        </br>

        <h1 class="text-center">Edit Your Info</h1>
        

        </br>

    <!-- USERNAME FORM Start -->

    <form action="" name="username" method="post" onsubmit="required()" style="height: 15vh;">

        <?php

            include_once("./include/conn.inc.php");

            $query = "SELECT * FROM `user` WHERE `id` = $id";
    
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_array($result)) {
                    
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
                    <input class="form-control" id="inputUserName" type="text" placeholder="Please Enter Your New Username" name="username" />
                    <label for="inputUserName">Enter Your New Username</label>
                </div>
            </div>
        </div>

        <script>
            function required() {
                
                var empt = document.forms["username"]["username"].value;

                if (empt == "") {

                    alert("Please Input Username Before Submitting, Thank You");
                    
                    return false;
                }
                else {

                    return true; 

                }
            }
        </script>

        <div class="mt-2 mb-4">
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-success btn-block mb-2" type="submit" value="Submit Username" name="submitUsername">
            </div>
        </div>
        
        <?php

            // echo $row[1];

            if (isset($_POST["submitUsername"])) {
                
                //get username from form
                $username = mysqli_real_escape_string($conn, $_POST['username']);

                $sql_username = "SELECT * FROM `user` WHERE `name` = '$username';";

                $select = mysqli_query($conn, $sql_username);

                if ($username == $row["1"]) {

                    echo ('Please Dont Use The Username That You Are Already Using, Thanks');

                }else {

                    if(mysqli_num_rows($select)) {

                        exit('This username already exists');
    
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


        ?>

    
    </form>

    <!-- USERNAME FORM End -->
    
    <!-- Email FORM Start -->

    <form action="" name="email" method="post" onsubmit="required()" style="height: 15vh;">

        <?php

            include_once("./include/conn.inc.php");

            $query = "SELECT * FROM `user` WHERE `id` = $id";
    
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_array($result)) {
                    
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
                    <input class="form-control" id="inputUserName" type="email" placeholder="Please Enter Your New Email" name="email" />
                    <label for="inputUserName">Enter Your New Email</label>
                </div>
            </div>
        </div>

        <script>
            function required() {
                
                var empt = document.forms["email"]["email"].value;

                if (empt == "") {

                    alert("Please Input Email Before Submitting, Thank You");
                    
                    return false;
                }
                else {

                    return true; 

                }
            }
        </script>

        <div class="mt-2 mb-4">
            <div class="d-grid gap-2 col-3 mx-auto">
                <input class="btn btn-success btn-block mb-2" type="submit" value="Submit Email" name="submitEmail">
            </div>
        </div>
        
        <?php

            // echo $row[1];

            if (isset($_POST["submitEmail"])) {
                
                //get email from form
                $email = mysqli_real_escape_string($conn, $_POST['email']);

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


        ?>

    
    </form>

    <!-- Email FORM End -->

    <!-- Password Form Start -->
    
    <form action="" name="password" method="post"  style="height: 15vh;">

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
                <input class="btn btn-success btn-block mb-2" type="submit" value="Submit Password" name="submitPassword">
            </div>
        </div>

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

        <footer class="py-4 bg-light mt-auto fixed-bottom" >
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; lawyer 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </body>
</html>
