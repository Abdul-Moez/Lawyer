<?php

    session_start();

    // error_reporting(0);

    $id = $_SESSION["id"];

    include_once("./include/conn.inc.php");

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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 mb-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4" style="font-family: 'Luckiest Guy', cursive;" >Edit Your Lawyer Account</h3></div>

                                        <a href="./index.php" class="text-center mt-3"> <button class="btn btn-primary">Home Page</button> </a>

                                    <div class="card-body">

                                        <!-- Image Form Start -->

                                        <form action="" method="post" name="image" enctype="multipart/form-data" onsubmit="requiredImage()">

                                            <?php

                                                include_once("./include/conn.inc.php");

                                                $query = "SELECT * FROM `lawyer` WHERE `id` = $id";

                                                $result = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($result)) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        
                                            ?>


                                            <div class="form-floating mb-3 text-center">
                                                Your Old Profile Photo
                                                </br>
                                                <img src="./user_img/<?php echo $row[10]; ?>" alt="<?php echo $row[10]; ?>" style="width: 10rem; margin: 0rem 0rem 1rem 0rem;">
                                                <input class="form-control pt-3" id="inputImage" type="file" name="img" />
                                            </div>

                                            <div class="mt-2 mb-4">
                                                <div class="d-grid gap-2 col-3 mx-auto">
                                                    <input class="btn btn-primary btn-block mb-2" type="submit" value="Upload Image" name="submitImage" id="submitImage">
                                                </div>
                                            </div>

                                            <script>
                                                function requiredImage() {
                                                    
                                                    var empt = document.forms["image"]["img"].value;

                                                    if (empt == "") {

                                                        alert("Please Upload Image Before Submitting, Thank You");
                                                        
                                                        return false;
                                                    }
                                                    else {

                                                        return true; 

                                                    }
                                                }
                                            </script>

                                                <?php

                                                if (isset($_POST["submitImage"])) {
                                                    
                                                    $img_name = $_FILES["img"]["name"];
                                                    $img_tmp = $_FILES["img"]["tmp_name"];
                                                    
                                                    $path = "./user_img/" . $img_name;

                                                    move_uploaded_file($img_tmp,$path);

                                                    $query = "UPDATE `lawyer` SET `Profile`= ?  WHERE id = $id;";

                                                    $stmt = mysqli_stmt_init($conn);
                                                    if (!mysqli_stmt_prepare($stmt, $query)) {
                                                        echo "SQL error";
                                                    } else {
                                                        mysqli_stmt_bind_param($stmt, "s", $img_name);
                                                        mysqli_stmt_execute($stmt);

                                                        echo '<script> alert("Image Updated"); </script>';

                                                    ?>

                                                    <script>
                                                        window.location.assign("./editLawyerProfile.php");
                                                    </script>

                                                    <?php

                                                    }
                                                }
                                            }
                                        }

                                                ?>

                                        </form>

                                        <!-- Image Form End -->

                                        <!-- USERNAME FORM Start -->

                                        <form action="" name="username" method="post" onsubmit="requiredUsername()">

                                            <?php

                                                include_once("./include/conn.inc.php");

                                                $query = "SELECT * FROM `lawyer` WHERE `id` = ?";
                                                
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
                                                        <input class="form-control" id="inputUserName" type="text" placeholder="Please Enter Your New Username" name="username" />
                                                        <label for="inputUserName">Enter Your New Username</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                function requiredUsername() {
                                                    
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
                                                    <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit Username" name="submitUsername">
                                                </div>
                                            </div>
                                            
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
                                    
                                                        $sql_username = "SELECT * FROM `lawyer` WHERE `name` = '$username';";
                                    
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
                                                                    window.location.assign("./editLawyerProfile.php");
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

                                        <!-- Title FORM Start -->

                                        <form action="" name="title" method="post" onsubmit="requiredTitle()">

                                        <?php

                                            include_once("./include/conn.inc.php");

                                            $query = "SELECT * FROM `lawyer` WHERE `id` = $id";

                                            $result = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($result)) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    
                                        ?>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputUserName" type="text" value="<?php echo $row['2']; ?>" disabled />
                                                    <label for="inputUserName">Your Old Title</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputUserName" type="text" placeholder="Please Enter Your New Title" name="title" />
                                                    <label for="inputUserName">Enter Your New Title</label>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function requiredTitle() {
                                                
                                                var empt = document.forms["title"]["title"].value;

                                                if (empt == "") {

                                                    alert("Please Input Title Before Submitting, Thank You");
                                                    
                                                    return false;
                                                }
                                                else {

                                                    return true; 

                                                }
                                            }
                                        </script>

                                        <div class="mt-2 mb-4">
                                            <div class="d-grid gap-2 col-3 mx-auto">
                                                <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit Title" name="submitTitle">
                                            </div>
                                        </div>

                                        <?php

                                            // echo $row[1];

                                            if (isset($_POST["submitTitle"])) {
                                                
                                                //get title from form
                                                $title = mysqli_real_escape_string($conn, $_POST['title']);

                                                $query = "UPDATE `lawyer` SET `Title`='$title' WHERE id = $id";

                                                $query_run = mysqli_query($conn, $query);

                                                if($query_run)
                                                {
                                                    echo '<script> alert("Title Updated"); </script>';
                                                ?>

                                                <script>
                                                    window.location.assign("./editLawyerProfile.php");
                                                </script>

                                                <?php
                                                }
                                                else
                                                {
                                                    exit ('<script> alert("Title Not Updated, Please Try Again"); </script>');
                                                }
                                            }
                                        }
                                    }


                                        ?>


                                        </form>

                                        <!-- Title FORM End -->
                                        
                                        <!-- Email FORM Start -->

                                        <form action="" name="email" method="post" onsubmit="requiredEmail()">

                                        <?php

                                            include_once("./include/conn.inc.php");

                                            $query = "SELECT * FROM `lawyer` WHERE `id` = ?";
    
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
                                                    <input class="form-control" id="inputUserName" type="text" value="<?php echo $row['3']; ?>" disabled />
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
                                            function requiredEmail() {
                                                
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
                                                <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit Email" name="submitEmail">
                                            </div>
                                        </div>

                                        <?php

                                            // echo $row[1];
                                            
                                            if (isset($_POST["submitEmail"])) {
                
                                                //get email from form
                                                $email = mysqli_real_escape_string($conn, $_POST['email']);
                                
                                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            
                                                    // echo "Please Input Valid Email";
                                                    
                                                ?>
                                            
                                                    <script>
                                                        window.location.assign("./editLawyerProfile?invalid=email");
                                                    </script>
                                            
                                                <?php
                                                    
                                                }
                                                else {
                                
                                                    $sql_email = "SELECT * FROM `lawyer` WHERE `email` = '$email';";
                                
                                                    $select = mysqli_query($conn, $sql_email);
                                
                                                    if ($email == $row["1"]) {
                                
                                                        echo ('Please Dont Use The Email That You Are Already Using, Thanks');
                                
                                                    }else {
                                
                                                        if(mysqli_num_rows($select)) {
                                
                                                            echo('This email already exists');
                                        
                                                        }
                                                        else {
                                
                                                            $query = "UPDATE `lawyer` SET `email`='$email' WHERE id = $id";
                                
                                                            $query_run = mysqli_query($conn, $query);
                                
                                                            if($query_run)
                                                            {
                                                                echo '<script> alert("Email Updated"); </script>';
                                                        ?>
                                
                                                            <script>
                                                                window.location.assign("./editLawyerProfile.php");
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

                                    <!-- Phone No FORM Start -->

                                    <form action="" name="phone" method="post" onsubmit="requiredPhone()">

                                    <?php

                                        include_once("./include/conn.inc.php");

                                        $query = "SELECT * FROM `lawyer` WHERE `id` = ?";
    
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
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="tel" value="<?php echo $row['4']; ?>" disabled />
                                                <label for="inputUserName">Your Old Phone No</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="tel" placeholder="Please Enter Your New Email" name="phone" />
                                                <label for="inputUserName">Enter Your New Phone No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function requiredPhone() {
                                            
                                            var empt = document.forms["phone"]["phone"].value;

                                            if (empt == "") {

                                                alert("Please Input Phone No Before Submitting, Thank You");
                                                
                                                return false;
                                            }
                                            else {

                                                return true; 

                                            }
                                        }
                                    </script>

                                    <div class="mt-2 mb-4">
                                        <div class="d-grid gap-2 col-3 mx-auto">
                                            <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit PhoneNo" name="submitPhone">
                                        </div>
                                    </div>

                                    <?php

                                        // echo $row[1];

                                        if (isset($_POST["submitPhone"])) {
                
                                            //get email from form
                                            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                                            
                                            $length = strlen ($phone);  
                
                                            // Phone No Validation If Start
                                            if ( $length < 11 && $length > 11) {
                                        
                                                // echo "Please Input Valid Email";
                                                
                                            ?>
                                        
                                                <script>
                                                    window.location.assign("./editLawyerProfile?invalid=phoneno");
                                                </script>
                                        
                                            <?php
                                                
                                            }
                                            else {
                            
                                                $sql_phone = "SELECT * FROM `lawyer` WHERE `phoneno` = '$phone';";
                            
                                                $select = mysqli_query($conn, $sql_phone);
                            
                                                if ($phone == $row["1"]) {
                            
                                                    echo ('Please Dont Use The PhoneNo That You Are Already Using, Thanks');
                            
                                                }else {
                            
                                                    if(mysqli_num_rows($select)) {
                            
                                                        echo('This Phone No already exists');
                                    
                                                    }
                                                    else {
                            
                                                        $query = "UPDATE `lawyer` SET `phoneno`='$phone' WHERE id = $id";
                            
                                                        $query_run = mysqli_query($conn, $query);
                            
                                                        if($query_run)
                                                        {
                                                            echo '<script> alert("PhoneNo Updated"); </script>';
                                                    ?>
                            
                                                        <script>
                                                            window.location.assign("./editLawyerProfile.php");
                                                        </script>
                            
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                            echo '<script> alert("PhoneNo Not Updated, Please Try Again"); </script>';
                                                        }
                            
                                                    }
                            
                                                }
                                            }
                                        }

                                    }
                                }

                                    ?>

                                    </form>

                                    <!-- Phone No FORM End -->

                                    <!-- education FORM Start -->

                                    <form action="" name="education" method="post" onsubmit="requirededucation()">

                                    <?php

                                        include_once("./include/conn.inc.php");

                                        $query = "SELECT * FROM `lawyer` WHERE `id` = $id";

                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result)) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                
                                    ?>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="text" value="<?php echo $row['5']; ?>" disabled />
                                                <label for="inputUserName">Your Old education</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="text" placeholder="Please Enter Your New education" name="education" />
                                                <label for="inputUserName">Enter Your New education</label>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function requirededucation() {
                                            
                                            var empt = document.forms["education"]["education"].value;

                                            if (empt == "") {

                                                alert("Please Input education Before Submitting, Thank You");
                                                
                                                return false;
                                            }
                                            else {

                                                return true; 

                                            }
                                        }
                                    </script>

                                    <div class="mt-2 mb-4">
                                        <div class="d-grid gap-2 col-3 mx-auto">
                                            <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit education" name="submiteducation">
                                        </div>
                                    </div>

                                    <?php

                                        // echo $row[1];

                                        if (isset($_POST["submiteducation"])) {
                                            
                                            //get email from form
                                            $education = mysqli_real_escape_string($conn, $_POST['education']);

                                            $query = "UPDATE `lawyer` SET `education`='$education' WHERE id = $id";

                                            $query_run = mysqli_query($conn, $query);

                                            if($query_run)
                                            {
                                                echo '<script> alert("education Updated"); </script>';
                                            ?>

                                            <script>
                                                window.location.assign("./editLawyerProfile.php");
                                            </script>

                                            <?php
                                            }
                                            else
                                            {
                                                exit ('<script> alert("education Not Updated, Please Try Again"); </script>');
                                            }
                                        }
                                    }
                                    }


                                    ?>


                                    </form>

                                    <!-- education FORM End -->

                                    <!-- degree FORM Start -->

                                    <form action="" name="degree" method="post" onsubmit="requireddegree()">

                                    <?php

                                        include_once("./include/conn.inc.php");

                                        $query = "SELECT * FROM `lawyer` WHERE `id` = $id";

                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result)) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                
                                    ?>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="text" value="<?php echo $row['6']; ?>" disabled />
                                                <label for="inputUserName">Your Old degree</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="text" placeholder="Please Enter Your New degree" name="degree" />
                                                <label for="inputUserName">Enter Your New degree</label>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function requireddegree() {
                                            
                                            var empt = document.forms["degree"]["degree"].value;

                                            if (empt == "") {

                                                alert("Please Input degree Before Submitting, Thank You");
                                                
                                                return false;
                                            }
                                            else {

                                                return true; 

                                            }
                                        }
                                    </script>

                                    <div class="mt-2 mb-4">
                                        <div class="d-grid gap-2 col-3 mx-auto">
                                            <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit degree" name="submitdegree">
                                        </div>
                                    </div>

                                    <?php

                                        // echo $row[1];

                                        if (isset($_POST["submitdegree"])) {
                                            
                                            //get email from form
                                            $degree = mysqli_real_escape_string($conn, $_POST['degree']);

                                            $query = "UPDATE `lawyer` SET `degree`='$degree' WHERE id = $id";

                                            $query_run = mysqli_query($conn, $query);

                                            if($query_run)
                                            {
                                                echo '<script> alert("degree Updated"); </script>';
                                            ?>

                                            <script>
                                                window.location.assign("./editLawyerProfile.php");
                                            </script>

                                            <?php
                                            }
                                            else
                                            {
                                                exit ('<script> alert("degree Not Updated, Please Try Again"); </script>');
                                            }
                                        }
                                    }
                                    }


                                    ?>


                                    </form>

                                    <!-- degree FORM End -->

                                    <!-- experience FORM Start -->

                                    <form action="" name="experience" method="post" onsubmit="requiredexperience()">

                                    <?php

                                        include_once("./include/conn.inc.php");

                                        $query = "SELECT * FROM `lawyer` WHERE `id` = $id";

                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result)) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                
                                    ?>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="text" value="<?php echo $row['7']; ?>" disabled />
                                                <label for="inputUserName">Your Old experience</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="text" placeholder="Please Enter Your New experience" name="experience" />
                                                <label for="inputUserName">Enter Your New experience</label>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function requiredexperience() {
                                            
                                            var empt = document.forms["experience"]["experience"].value;

                                            if (empt == "") {

                                                alert("Please Input experience Before Submitting, Thank You");
                                                
                                                return false;
                                            }
                                            else {

                                                return true; 

                                            }
                                        }
                                    </script>

                                    <div class="mt-2 mb-4">
                                        <div class="d-grid gap-2 col-3 mx-auto">
                                            <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit experience" name="submitexperience">
                                        </div>
                                    </div>

                                    <?php

                                        // echo $row[1];

                                        if (isset($_POST["submitexperience"])) {
                                            
                                            //get email from form
                                            $experience = mysqli_real_escape_string($conn, $_POST['experience']);

                                            $query = "UPDATE `lawyer` SET `experience`='$experience' WHERE id = $id";

                                            $query_run = mysqli_query($conn, $query);

                                            if($query_run)
                                            {
                                                echo '<script> alert("experience Updated"); </script>';
                                            ?>

                                            <script>
                                                window.location.assign("./editLawyerProfile.php");
                                            </script>

                                            <?php
                                            }
                                            else
                                            {
                                                exit ('<script> alert("experience Not Updated, Please Try Again"); </script>');
                                            }
                                        }
                                    }
                                    }


                                    ?>


                                    </form>

                                    <!-- experience FORM End -->

                                    <!-- successstories FORM Start -->

                                    <form action="" name="successstories" method="post" onsubmit="requiredsuccessstories()">

                                    <?php

                                        include_once("./include/conn.inc.php");

                                        $query = "SELECT * FROM `lawyer` WHERE `id` = $id";

                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result)) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                
                                    ?>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="text" value="<?php echo $row['8']; ?>" disabled />
                                                <label for="inputUserName">Your Old Success Stories</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputUserName" type="text" placeholder="Please Enter Your New Success Stories" name="successstories" />
                                                <label for="inputUserName">Enter Your New  Success Stories</label>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function requiredsuccessstories() {
                                            
                                            var empt = document.forms["successstories"]["successstories"].value;

                                            if (empt == "") {

                                                alert("Please Input successstories Before Submitting, Thank You");
                                                
                                                return false;
                                            }
                                            else {

                                                return true; 

                                            }
                                        }
                                    </script>

                                    <div class="mt-2 mb-4">
                                        <div class="d-grid gap-2 col-3 mx-auto">
                                            <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit Success Stories" name="submitsuccessstories">
                                        </div>
                                    </div>

                                    <?php

                                        // echo $row[1];

                                        if (isset($_POST["submitsuccessstories"])) {
                                            
                                            //get email from form
                                            $successstories = mysqli_real_escape_string($conn, $_POST['successstories']);

                                            $query = "UPDATE `lawyer` SET `SucessStories`='$successstories' WHERE id = '$id';";

                                            $query_run = mysqli_query($conn, $query);

                                            if($query_run)
                                            {
                                                echo '<script> alert("Success Stories Updated"); </script>';
                                            ?>

                                            <script>
                                                window.location.assign("./editLawyerProfile.php");
                                            </script>

                                            <?php
                                            }
                                            else
                                            {
                                                exit ('<script> alert("Success Stories Not Updated, Please Try Again"); </script>');
                                            }
                                        }
                                    }
                                    }


                                    ?>


                                    </form>

                                    <!-- successstories FORM End -->

                                    <!-- description FORM Start -->

                                    <form action="" name="description" method="post" onsubmit="requireddescription()">

                                    <?php

                                        include_once("./include/conn.inc.php");

                                        $query = "SELECT * FROM `lawyer` WHERE `id` = $id";

                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result)) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                
                                    ?>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <!-- <input class="form-control" id="inputUserName" type="text" value="<?php echo $row['9']; ?>" disabled /> -->
                                                <textarea name="description" id="inputFirstName" class="form-control" cols="30" rows="10" disabled><?php echo $row['9']; ?></textarea>
                                                <label for="inputUserName">Your Old description</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <textarea name="description" id="inputFirstName" class="form-control" cols="30" rows="10"></textarea>
                                                <label for="inputUserName">Enter Your New description</label>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function requireddescription() {
                                            
                                            var empt = document.forms["description"]["description"].value;

                                            if (empt == "") {

                                                alert("Please Input description Before Submitting, Thank You");
                                                
                                                return false;
                                            }
                                            else {

                                                return true; 

                                            }
                                        }
                                    </script>

                                    <div class="mt-2 mb-4">
                                        <div class="d-grid gap-2 col-3 mx-auto">
                                            <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit description" name="submitdescription">
                                        </div>
                                    </div>

                                    <?php

                                        // echo $row[1];

                                        if (isset($_POST["submitdescription"])) {
                                            
                                            //get email from form
                                            $description = mysqli_real_escape_string($conn, $_POST['description']);

                                            $query = "UPDATE `lawyer` SET `description`='$description' WHERE id = $id";

                                            $query_run = mysqli_query($conn, $query);

                                            if($query_run)
                                            {
                                                echo '<script> alert("description Updated"); </script>';
                                            ?>

                                            <script>
                                                window.location.assign("./editLawyerProfile.php");
                                            </script>

                                            <?php
                                            }
                                            else
                                            {
                                                exit ('<script> alert("description Not Updated, Please Try Again"); </script>');
                                            }
                                        }
                                    }
                                    }


                                    ?>


                                    </form>

                                    <!-- description FORM End -->
                                    
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

                                    <script>
                                        function requiredPassword() {
                                            
                                            var empt = document.forms["password"]["oldPassword"].value;
                                            var empt = document.forms["password"]["newPassword"].value;

                                            if (empt == "" && empt == "") {

                                                alert("Please Input Password Before Submitting, Thank You");
                                                
                                                return false;
                                            }
                                            else {

                                                return true; 

                                            }
                                        }
                                    </script>

                                    <div class="mt-4 mb-0">
                                        <div class="d-grid gap-2 col-3 mx-auto">
                                            <input class="btn btn-primary btn-block mb-2" type="submit" value="Submit Password" name="submitPassword">
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
                                            
                                            $query = "UPDATE `lawyer` SET `Password`='$convertingPass' WHERE id = $id;";

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