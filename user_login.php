<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB User</title>
        <link href="./admin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 

        <style>
            .toggle_btn{
                display: flex;
                flex-direction: row;
                justify-content: center;
            }
            .user_btn{
                border-radius: 1.6rem 1.6rem 1.6rem 1.6rem;
                border: 2px solid #fff;
                box-shadow: 0 0 5px #000;
                padding: 0.5rem 1rem 0.5rem 1rem;
                background: #000;
                color: #fff;
            }
            .lawyer_btn{
                border-radius: 1.6rem 1.6rem 1.6rem 1.6rem;
                border: 2px solid #fff;
                box-shadow: 0 0 5px #000;
                padding: 0.5rem 1rem 0.5rem 1rem;
            }
            .user_link{
                border-radius: 1.6rem 0rem 0rem 1.6rem;
                border: 2px solid #000 #000 #fff #fff;
                padding: 0.25rem 1.25rem 0.25rem 0.25rem;
                background: #0278f5;
            }
            .lawyer_link{
                border-radius: 0rem 1.6rem 1.6rem 0rem;
                border: 2px solid #000 #000 #fff #fff;
                padding: 0.25rem 0.25rem 0.25rem 1.25rem;
                background: #0278f5;
            }
        </style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4" style="font-family: 'Luckiest Guy', cursive;" >Login as a User</h3></div>
                                    <div class="toggle_btn mb-1 mt-3">
                                        <a href="user_login.php" class="user_link"><button class="user_btn">Login as a User</button></a>
                                        <a href="./lawyer_dashboard/lawyer_login.php" class="lawyer_link"><button class="lawyer_btn">Login as a Lawyer</button></a>
                                    </div>

                                    <?php

                                    $invalidLogin = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                    if (strpos($invalidLogin, "login=invalid") == true) {
                                        ?>

                                            <h4 class="bg-danger text-center mx-2 my-2 p-2 rounded">Invalid Email Or Password</h4>

                                        <?php
                                    }
                                    else {
                                        // echo "no";
                                    }

                                    $nullStatus = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                    if (strpos($nullStatus, "status=null") == true) {
                                        ?>

                                            <h4 class="bg-danger text-center mx-2 my-2 p-2 rounded">Your Account Has Been Disabled,</br> Please Contact an Admin</h4>

                                        <?php
                                    }
                                    else {
                                        // echo "no";
                                    }

                                    $invalidPass = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                    if (strpos($invalidPass, "password=invalid") == true) {
                                        ?>

                                            <h4 class="bg-danger text-center mx-2 my-2 p-2 rounded">Incorrect password Please Enter Correct Password</h4>

                                        <?php
                                    }
                                    else {
                                        // echo "no";
                                    }

                                    ?>


                                    <div class="card-body">
                                        <form action="./include/user_auth.inc.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" required />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" required/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button name="submit" type="submit" class="btn btn-primary" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="user_registration.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Lawyer 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>