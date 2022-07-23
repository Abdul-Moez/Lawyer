<?php

    include_once("./include/header.php");
    include_once("./include/conn.inc.php");

    if ($_SESSION["role"] == 2) {
       ?>
       <script>
           window.location.assign("./lawyer_dashboard/lawyer_login.php");
       </script>

       <?php
    }
    else {

?>
    
    <!-- Carousel Start -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel-1.jpg" alt="Carousel Image">
                <div class="carousel-caption">
                    <h1 class="animated fadeInLeft">We fight for your justice</h1>
                    <p class="animated fadeInRight">Lorem ipsum dolor sit amet elit. Mauris odio mauris...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="img/carousel-2.png" alt="Carousel Image">
                <div class="carousel-caption">
                    <h1 class="animated fadeInLeft">We prepared to oppose for you</h1>
                    <p class="animated fadeInRight">Lorem ipsum dolor sit amet elit. Mauris odio mauris...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="img/carousel-3.jpg" alt="Carousel Image">
                <div class="carousel-caption">
                    <h1 class="animated fadeInLeft">We fight for your privilege</h1>
                    <p class="animated fadeInRight">Lorem ipsum dolor sit amet elit. Mauris odio mauris...</p>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Carousel End -->
    
    
    <!-- Top Feature Start-->
    <div class="feature-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6">
                    <div class="feature-item">
                        <i class="far fa-check-circle"></i>
                        <h3>Legal</h3>
                        <p>Govt Approved</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-item">
                        <i class="fa fa-user-tie"></i>
                        <h3>Attorneys</h3>
                        <p>Expert Attorneys</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-item">
                        <i class="far fa-thumbs-up"></i>
                        <h3>Success</h3>
                        <p>99.99% Case Won</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-item">
                        <i class="far fa-handshake"></i>
                        <h3>Support</h3>
                        <p>Quick Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Feature End-->
    
    
    <!-- About Start -->
    <div class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="img/about.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header">
                        <h2>Learn About Us</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
                        </p>
                        <a class="btn" href="about.php">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    
    <!-- Feature Start -->
    <div class="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="section-header">
                        <h2>Why Choose Us</h2>
                    </div>
                    <div class="row align-items-center feature-item">
                        <div class="col-5">
                            <div class="feature-icon">
                                <i class="fa fa-gavel"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <h3>Best law practices</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate.
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center feature-item">
                        <div class="col-5">
                            <div class="feature-icon">
                                <i class="fa fa-balance-scale"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <h3>Efficiency & Trust</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate.
                            </p>
                        </div>
                    </div>
                    <div class="row align-items-center feature-item">
                        <div class="col-5">
                            <div class="feature-icon">
                                <i class="far fa-smile"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <h3>Results you deserve</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="feature-img">
                        <img src="img/feature.jpg" alt="Feature">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->
    


    <!-- Team Start -->
    <div class="team" id="lawyers">
        <div class="container">
            <div class="section-header">
                <h2>Meet Our Attorneys</h2>
            </div>

            <a href="./search" class="more_link"><button type="button" class="btn btn-primary d-grid gap-2 col-2 mx-auto mb-5">Search Lawyers</button></a>

            <div class="row">

            <?php

                if ($_SESSION["role"] != "0" && $_SESSION["role"] != "1" && $_SESSION["role"] != "2") {

                    $query;
                    
                    if ($_GET["load"] == "more") {
                        
                        $query = "SELECT * FROM `lawyer`";

                    }
                    else {
                        
                        $query = "SELECT * FROM `lawyer` LIMIT 4";

                    }

                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_array($result)) {

                    ?>

                        <div class="col-lg-3 col-md-6">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="./lawyer_dashboard/user_img/<?php echo $row[10]; ?>" alt="Team Image">
                                </div>
                                <div class="team-text">
                                    <h2><?php echo $row[1]; ?></h2>
                                    <p><?php echo $row[2]; ?></p>
                                    <div class="team-social">
                                        <a class="btn" href="#">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                        }
                    }
                }

                elseif ($_SESSION["role"] == "0" . "1") {

                        $query;
                    if ($_GET["load"] == "more") {
                        $query = "SELECT * FROM `lawyer`";

                    }
                    else {
                        $query = "SELECT * FROM `lawyer` LIMIT 4";

                    }

                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_array($result)) {

                        ?>

                        <div class="col-lg-3 col-md-6">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="./lawyer_dashboard/user_img/<?php echo $row[10]; ?>" alt="Team Image">
                                </div>
                                <div class="team-text">
                                    <h2><?php echo $row[1]; ?></h2>
                                    <p><?php echo $row[2]; ?></p>
                                    <div class="team-social">
                                        
                                    <?php

                                        $id = $row["0"];
                                        $idAfter = base64_encode($id);

                                    ?>

                                        <a class="btn" href="./single.php?id=<?php echo $idAfter; ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        }
                    }
                }

                elseif ($_SESSION["role"] == "2") {
                    
                        $query;
                    if ($_GET["load"] == "more") {
                        $query = "SELECT * FROM `lawyer`";

                    }
                    else {
                        $query = "SELECT * FROM `lawyer` LIMIT 4";

                    }

                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_array($result)) {

                        ?>

                        <div class="col-lg-3 col-md-6">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="./lawyer_dashboard/user_img/<?php echo $row[10]; ?>" alt="Team Image">
                                </div>
                                <div class="team-text">
                                    <h2><?php echo $row[1]; ?></h2>
                                    <p><?php echo $row[2]; ?></p>
                                    <div class="team-social">
                                        <a class="btn" href="#">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                        }
                    }
                }

                if($_GET["load"] != "more"){

                ?>
                    <a href="?load=more" class="more_link"><button type="button" class="btn btn-success d-grid gap-2 col-2 mx-auto">Load More</button></a>
  
                <?php

                }

            ?>
        </div>



        </div>
    </div>

    <!-- Team End -->


    <!-- FAQs Start -->
    <div class="faqs">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="faqs-img">
                        <img src="img/faqs.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="section-header">
                        <h2>Have A Query?</h2>
                    </div>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                    <span>1</span> Lorem ipsum dolor sit amet?
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                                    <span>2</span> Lorem ipsum dolor sit amet?
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseThree">
                                    <span>3</span> Lorem ipsum dolor sit amet?
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                    <span>4</span> Lorem ipsum dolor sit amet?
                                </a>
                            </div>
                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseFive">
                                    <span>5</span> Lorem ipsum dolor sit amet?
                                </a>
                            </div>
                            <div id="collapseFive" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                </div>
                            </div>
                        </div> 
                    </div>
                    <a class="btn" href="./contact.php">Ask more</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->

    <!-- Testimonial Start -->
    <div class="testimonial">
        <div class="container">
            <div class="section-header">
                <h2>Review From Clients</h2>
            </div>
            <div class="owl-carousel testimonials-carousel">

                <?php

                    $query = "SELECT * FROM `client_review`";

                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_array($result)) {
                ?>

                <div class="testimonial-item">
                    <i class="fa fa-quote-right"></i>
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h2>Name: <?php echo $row[1]; ?></h2>
                            <p>Profession: <?php echo $row[2]; ?></p>
                        </div>
                        <div class="col-12">
                            <p>
                            Review: <?php echo $row[3]; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <?php
                        }
                    }

                ?>

            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    
    <!-- Newsletter Start -->
    <div class="newsletter">
        <div class="container">
            <div class="section-header">
                <h2>Subscribe Our Newsletter</h2>
            </div>

            <form action="" method="post" class="form">
            
                <input class="form-control" id="emailinput" type="email" placeholder="Email here" name="email" required>

                <input type="submit" value="Submit" name="submit" id="emailbtn" class="btn">
           
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

                if (isset($_POST["submit"])) {
                    
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
        }

    ?>