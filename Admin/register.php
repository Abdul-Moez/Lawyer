<?php

    session_start();

    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - Ecommerce Admin</title>
        <link href="css\styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="#" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Username" name="username" required />
                                                        <label for="inputFirstName">Enter Username</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" required/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="pass" required/>
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" value="Register" name="submit"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php

                include_once("footer.php");

            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
<?php


if (isset($_POST["submit"])) {

    include_once("./include/conn.inc.php");
    
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
    $pass = md5($pass);
   
    $selectUsername = mysqli_query($conn, "SELECT * FROM user WHERE `Name` = '".$_POST['username']."'");
    $selectEmail = mysqli_query($conn, "SELECT * FROM user WHERE `Email` = '".$_POST['email']."'");

    // // Email Validation If Start
    // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    //     // Password Validation If Start
    //     if (preg_match('/[A-Z]{1}.[A-Za-z0-9 ]{1,}/', $pass)) {

         
            
    //     // Password Validation If Start
    //     }
    
    // // Email Validation If End
    // }

    if(mysqli_num_rows($selectUsername)) {
        
        // $usernameExists = ("This Username Already Exists");
        ?>

        <script>
            // alert("This Username Already Exists");
            Swal.fire({
            title: 'Error!',
            text: 'Username Already Exists',
            icon: 'error',
            confirmButtonText: 'Ok'
})
        </script>

        <?php
        exit();
        
    }
    elseif (mysqli_num_rows($selectEmail)) {
        
        // $emailExists = ("This Email Already Exists");
        ?>

        <script>
            // alert("This Email Already Exists");
            Swal.fire({
            title: 'Error!',
            text: 'Email Already Exists',
            icon: 'error',
            confirmButtonText: 'Ok'
})
        </script>

        <?php
        exit();
        
    }
    else{

        $query = "INSERT INTO `user`(`Id`, `Name`, `Email`, `Password`) VALUES (Null, ? , ? , ?);";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            echo "SQL error";
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $pass);
            mysqli_stmt_execute($stmt);
        }

    }

    ?>

<script>

        Swal.fire({
            title: 'Success!',
            text: 'Registration Complete',
            icon: 'success',
            timerProgressBar: 'true',
            timer: '1500',
            showConfirmButton: false,
            allowOutsideClick: false,
        })

    function redirect() {
        window.location.assign("login.php");
    }
    setTimeout(redirect, 1500);
</script>

<?php
}
?>