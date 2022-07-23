<?php

    session_start();

    // error_reporting(0);

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
        <link href=".\css\styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
            }
            .lawyer_btn{
                border-radius: 1.6rem 1.6rem 1.6rem 1.6rem;
                border: 2px solid #fff;
                box-shadow: 0 0 5px #000;
                padding: 0.5rem 1rem 0.5rem 1rem;
                background: #000;
                color: #fff;
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
                            <div class="col-lg-8 mb-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4" style="font-family: 'Luckiest Guy', cursive;" >Create Lawyer Account</h3></div>
                                    <div class="toggle_btn mb-1 mt-3">
                                        <a href="../user_registration.php" class="user_link"><button class="user_btn">Register as a User</button></a>
                                        <a href="lawyer_registration.php" class="lawyer_link"><button class="lawyer_btn">Register as a Lawyer</button></a>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="" enctype="multipart/form-data">

                                        <?php

                                            $usernameUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                            if (strpos($usernameUrl, "invalid=username") == true) {
                                                ?>

                                                    <h4 class="bg-danger text-center mx-2 my-2 p-2 rounded">Username Should Only Contain Letters And Spaces</h4>

                                                <?php
                                            }
                                            else {
                                                // echo "no";
                                            }

                                            $emailUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                            if (strpos($emailUrl, "invalid=email") == true) {
                                                ?>

                                                    <h4 class="bg-danger text-center mx-2 my-2 p-2 rounded">Email is not valid, Please enter a valid Email</h4>

                                                <?php
                                            }
                                            else {
                                                // echo "no";
                                            }

                                            $passUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                            if (strpos($passUrl, "invalid=password") == true) {
                                                ?>

                                                    <h4 class="bg-danger text-center mx-2 my-2 p-2 rounded">Password Should Contain 1 Capital Letter, 1 Small Letter & 1 Number</h4>

                                                <?php
                                            }
                                            else {
                                                // echo "no";
                                            }
                                            
                                            $phonenoUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                            if (strpos($phonenoUrl, "invalid=phoneno") == true) {
                                                ?>

                                                    <h4 class="bg-danger text-center mx-2 my-2 p-2 rounded">Phone No must have 11 digits</h4>

                                                <?php
                                            }
                                            else {
                                                // echo "no";
                                            }

                                        ?>

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Username" name="username" required />
                                                        <label for="inputFirstName">Enter Username</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Title" name="title" required />
                                                        <label for="inputFirstName">Enter Title</label>
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
                                                        <input class="form-control" id="inputPasswordConfirm" type="tel" placeholder="Enter Your Phone no" name="phone" required/>
                                                        <label for="inputPasswordConfirm">Enter Phone no</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Education" name="education" required />
                                                        <label for="inputFirstName">Enter Education</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Degree" name="degree" required />
                                                        <label for="inputFirstName">Enter Degree</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Experience" name="experience" required />
                                                        <label for="inputFirstName">Enter Experience</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your SuccessStories" name="successstories" required />
                                                        <label for="inputFirstName">Enter SuccessStories</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <!-- <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Description" name="description" required /> -->
                                                        <textarea name="description" id="inputFirstName" class="form-control" placeholder="Enter your Description" cols="30" rows="10"></textarea>
                                                        <label for="inputFirstName">Enter Description</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control pt-3" id="inputEmail" type="file" name="img" required/>
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
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" value="submit" name="submit"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="./lawyer_login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php

                include_once("./footer.php");

            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
<?php

// Isset if start
if (isset($_POST["submit"])) {

    include_once("./include/conn.inc.php");

    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $education = mysqli_real_escape_string($conn, $_POST["education"]);
    $degree = mysqli_real_escape_string($conn, $_POST["degree"]);
    $experience = mysqli_real_escape_string($conn, $_POST["experience"]);
    $successstories = mysqli_real_escape_string($conn, $_POST["successstories"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
    $img_name = $_FILES["img"]["name"];
    $img_tmp = $_FILES["img"]["tmp_name"];

    // Username Validation If Start
    if (!preg_match("/^[a-zA-Z-']*$/", $username)) {
        
        // echo "Username Should Only Contain Letters And Spaces";
        
    ?>

        <script>
            window.location.assign("./lawyer_registration?invalid=username");
        </script>

    <?php
        
    }
    else {
        
        // echo "Yes Name";

        // Email Validation If Start
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            // echo "Please Input Valid Email";
            
        ?>
    
            <script>
                window.location.assign("./lawyer_registration?invalid=email");
            </script>
    
        <?php
            
        }
        else {
            
            // echo "Yes Email";            
            
            // Password Validation If Start
            if (!preg_match('/[A-Z]{1}.[A-Za-z0-9 ]{1,}/', $pass)) {
                
                // echo "Password Should Contain 1 Capital Letter, 1 Small Letter & 1 Number";
                
            ?>
        
                <script>
                    window.location.assign("./lawyer_registration?invalid=password");
                </script>
        
            <?php

            }
            else {
                
                // echo "Yes Password";

                $length = strlen ($phone);  
                
                // Phone No Validation If Start
                if ( $length < 11 && $length > 11) { 

                    // echo "no";
                
                ?>
                
                    <script>
                        window.location.assign("./lawyer_registration?invalid=phoneno");
                    </script>
            
                <?php
                
                } else {

                    $pass = md5($pass);

                $selectUsername = mysqli_query($conn, "SELECT * FROM lawyer WHERE `Name` = '".$_POST['username']."'");
                $selectEmail = mysqli_query($conn, "SELECT * FROM lawyer WHERE `Email` = '".$_POST['email']."'");
                $selectPhone = mysqli_query($conn, "SELECT * FROM lawyer WHERE `PhoneNo` = '".$_POST['phone']."'");

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
                elseif (mysqli_num_rows($selectPhone)) {
                    
                    // $phoneExists = ("This PhoneNo Already Exists");
                    ?>
            
                    <script>
                        // alert("This PhoneNo Already Exists");
                        Swal.fire({
                        title: 'Error!',
                        text: 'Phone No Already Exists',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                        })
                    </script>
            
                    <?php
                    exit();
            
                }
                else{
            
                    $path = "./user_img/" . $img_name;
            
                    move_uploaded_file($img_tmp,$path);
            
                    $query = "INSERT INTO `lawyer`(`Id`, `Name`, `Title`, `Email`, `PhoneNo`, `Education`, `Degree`, `Experience`, `SucessStories`, `Description`, `Profile`, `Password`) VALUES (Null, ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )";
            
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        echo "SQL error";
                    } else {
                        mysqli_stmt_bind_param($stmt, "sssssssssss", $username, $title, $email, $phone, $education, $degree, $experience, $successstories, $description, $img_name, $pass);
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
                    window.location.assign("./lawyer_login.php");
                }
                setTimeout(redirect, 1500);
            </script>
            <?php


                // Phone No validation If End
                }
     
            // Password Validation If end
            }
        
        // Email Validation If End
        }
    
    // Username Validation If enf
    }    
    // Isset if end
}
?>