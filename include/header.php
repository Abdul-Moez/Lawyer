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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- CSS only -->
        <link href="css/style.css" rel="stylesheet">
        <style>

            @media (max-width: 991.98px) {
                .top-right-bar{
                    display: none;
                }
            }

            .logo_img{
                width: 50px;
                height: 50px !important;
            }

        </style>
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="container-fluid" style="height: 11vh;">
                    <div class="row" style="height: 11vh;">
                        <div class="col-lg-4" style="height: 11vh;">
                            <div class="logo">
                                <a href="index.php" style="display: flex; flex-direction: row; justify-content: center;" class="logo_link">
                                    <img src="./img/icon.png" alt="logo" class="logo_img"><h1 style="margin-bottom: 2rem; margin-top: -0.5rem; margin-left: 1rem; color: #dba64a;">Lawyer</h1>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 top-right-bar"  style="height: 11vh;">
                            <div class="top-bar-right" style="height: 11vh;">
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
                            <div class="navbar-nav mr-auto text-center nav-links">
                                <a href="index.php" class="nav-item nav-link">Home</a>
                                <a href="about.php" class="nav-item nav-link">About</a>
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                            </div>

                            <div class="nav-login">
                            
                                <?php

                                    // echo $_SESSION["role"];

                                    if ($_SESSION["role"] !== "1" && $_SESSION["role"] !== "2") {
                                    ?>

                                    <div class="ml-2">
                                        <a class="btn" href="./user_login.php">Login</a>
                                    </div>
                                    <div class="ml-2">
                                        <a class="btn" href="./user_registration.php">Sign Up</a>
                                    </div>
                                    <div class="ml-2">
                                        <a class="btn" href="#lawyers">Get Appointment</a>
                                    </div>

                                    <?php
                                    }
                                    elseif ($_SESSION["role"] == '1') {
                                    ?>

                                    <div class="ml-2">
                                        <a class="btn" href="#lawyers">Get Appointment</a>
                                    </div>

                                    <div class="ml-2">
                                        <a class="btn" href="./editUserProfile">Edit Profile</a>
                                    </div>

                                    <div class="ml-2">
                                        <a class="btn" href="./normal_logout.php">Logout</a>
                                    </div>

                                    <?php
                                    }
                                    elseif ($_SESSION["role"] == '0') {
                                    ?>

                                    <div class="ml-2">
                                        <a class="btn" href="#lawyers">Get Appointment</a>
                                    </div>

                                    <div class="ml-2">
                                        <a class="btn" href="./editUserProfile.php">Edit Profile</a>
                                    </div>

                                    <div class="ml-2">
                                        <a class="btn" href="./normal_logout.php">Logout</a>
                                    </div>

                                    <?php
                                    }
                                    elseif ($_SESSION["role"] == "2") {
                                    ?>
                                        
                                    <div class="ml-2">
                                        <a class="btn" href="./lawyer_dashboard/normal_logout.php">Logout</a>
                                    </div>
                                    
                                    <?php
                                    }
                                ?>
                            
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
            <!-- Nav Bar End -->