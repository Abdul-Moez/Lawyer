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
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            
            <?php

                include_once("./include/header.php");

            ?>
            
            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Contact Us</h2>
                        </div>
                        <div class="col-12">
                            <a href="./index.php">Home</a>
                            <a href="./contact.php">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Contact Start -->
            <div class="contact">
                <div class="container">
                    <div class="section-header">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info">
                                <div class="contact-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="contact-text">
                                        <h2>Location</h2>
                                        <p>123 Street, New York, USA</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fa fa-phone-alt"></i>
                                    <div class="contact-text">
                                        <h2>Phone</h2>
                                        <p>+012 345 67890</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fa fa-envelope"></i>
                                    <div class="contact-text">
                                        <h2>Email</h2>
                                        <p>info@example.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name" required="required" id="firstname" name="firstname" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name" required="required" id="lastname" name="lastname" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" required="required" id="email" name="email" />
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Message" required="required" id="message" name="message" ></textarea>
                                    </div>
                                    <div>
                                        <button class="btn" id="contactBtn" type="submit" name="submit">Send Message</button>
                                    </div>
                                </form>

                                <script>

                                // $(document).ready(function(){
                                //     $('#contactBtn').prop('disabled',true);
                                //     $('#firstname').keyup(function(){
                                //         $('#contactBtn').prop('disabled', this.value == "" ? true : false);     
                                //     })
                                // });

                                $(document).ready(function() {
                                    $('#contactBtn').prop('disabled', true);

                                    function validateNextButton() {
                                        var buttonDisabled = $('#firstname').val().trim() === '' || $('#lastname').val().trim() === '' || $('#email').val().trim() === '' || $('#message').val().trim() === '';
                                        $('#contactBtn').prop('disabled', buttonDisabled);
                                    }

                                    $('#firstname').on('keyup', validateNextButton);
                                    $('#lastname').on('keyup', validateNextButton);
                                    $('#email').on('keyup', validateNextButton);
                                    $('#message').on('keyup', validateNextButton);
                                });
                                
                                </script>

                                <?php

                                    include_once("./include/conn.inc.php");

                                    if (isset($_POST["submit"])) {
                    
                                        $fname = mysqli_real_escape_string($conn, $_POST["firstname"]);
                                        
                                        $lname = mysqli_real_escape_string($conn, $_POST["lastname"]);
                                        
                                        $email = mysqli_real_escape_string($conn, $_POST["email"]);
                                        
                                        $message = mysqli_real_escape_string($conn, $_POST["message"]);
                    
                                        $query = "INSERT INTO `contact`(`Id`, `FirstName`, `LastName`, `Email`, `Message`) VALUES (NULL, ? , ? , ? , ?)";

                                        $stmt = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt, $query)) {
                                            echo "SQL error";
                                        } else {
                                            mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $message);
                                            mysqli_stmt_execute($stmt);
                                        }
                    
                                        ?>
                    
                                        <script>
                                            alert("We Have Received your message");
                                        </script>
                    
                                        <?php

                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->


            <!-- Newsletter Start -->
    <div class="newsletter">
        <div class="container">
            <div class="section-header">
                <h2>Subscribe Our Newsletter</h2>
            </div>

            <form action="" method="post" class="form">
            
                <input class="form-control" id="emailinput" type="email" placeholder="Email here" name="email" required>

                <input type="submit" value="Submit" name="submitEmail" id="emailbtn" class="btn">
           
            </form>

            <script>

                // $(document).ready(
                //     function () {
                //         var txt = $("#emailinput").val();

                //         if (txt == "") {
                //         document.getElementById("emailbtn").disabled = true;
                //         }

                //         $("#emailinput").keyup(function () {
                //             document.getElementById("emailbtn").disabled = false;
                //         })

                //     }
                // )

                $(document).ready(function(){
                    $('#emailbtn').prop('disabled',true);
                    $('#emailinput').keyup(function(){
                        $('#emailbtn').prop('disabled', this.value == "" ? true : false);     
                    })
                });
                
            </script>

            <?php

                if (isset($_POST["submitEmail"])) {
                    
                    $email = mysqli_real_escape_string($conn, $_POST["email"]);

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
                        // echo "Please Input Valid Email";
                        
                    ?>
                
                        <script>

                            Swal.fire({
                            title: 'Error!',
                            text: 'Please Input Valid Email',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                            })

                        </script>
                
                    <?php
                        
                    }
                    else {
                        
                        // echo "Yes Email";

                        $query = "INSERT INTO `email`(`Id`, `Email`) VALUES (NULL, ? )";

                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $query)) {
                            
                            echo "SQL ERROR";

                        } else {

                            mysqli_stmt_bind_param($stmt, "s", $email);

                            mysqli_stmt_execute($stmt);
                        }

                        ?>

                        <script>

                            Swal.fire({
                            title: 'Success!',
                            text: 'You Are Registered!',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                            })

                        </script>

                    <?php

                    }

                }

            ?>

        </div>
    </div>
    <!-- Newsletter End -->

            <?php

                include_once("./include/footer.php");

            ?>
            
            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>