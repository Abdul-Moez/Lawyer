<?php

    include_once("./include/header.php");

    include_once("./include/conn.inc.php");

    // error_reporting(0);

    if ($_SESSION["role"] == 2) {
        ?>
        <script>
            window.location.assign("./lawyer_dashboard/lawyer_login.php");
        </script>

        <?php
    }
    else {

    $idBefore = $_GET['id'];

    $id = base64_decode($idBefore);

    $query = "SELECT * FROM `lawyer` WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {

?>  

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?php echo $row["1"]; ?></h2>
            </div>
            <div class="col-12">
                <a href="./index.php">Home</a>
                <a href="#"><?php echo $row["1"]; ?></a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Single Page Start -->
<div class="single">
    <div class="container">
        <div class="section-header">
            <h2><?php echo $row["2"]; ?></h2>
        </div>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded mx-auto d-block border border-dark" src="./lawyer_dashboard/user_img/<?php echo $row[10]; ?>" alt="Image">
                

                <div class="lawyer_info">
                    <h3 class="lawyer_head">Education: </h3>
                    <p class="lawyer_para"><?php echo $row["5"]; ?></p>
                </div>
            </br>
            </hr>
            
                <div class="lawyer_info">
                    <h3 class="lawyer_head">Degree: </h3>
                    <p class="lawyer_para"><?php echo $row["6"]; ?></p>
                </div>
            </br>
            </hr>

                <div class="lawyer_info">
                    <h3 class="lawyer_head">Experience: </h3>
                    <p class="lawyer_para"><?php echo $row["7"]; ?></p>
                </div>
            </br>
            </hr>

                <div class="lawyer_info">
                    <h3 class="lawyer_head">Success Stories: </h3>
                    <p class="lawyer_para"><?php echo $row["8"]; ?></p>
                </div>
            </br>
            </hr>

                <div class="lawyer_info">
                    <h3 class="lawyer_head">Description: </h3>
                    <p class="lawyer_para"><?php echo $row["9"]; ?></p>
                </div>
            </br>
            </hr>            

            <!-- Query modal button -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#queryModal">
            Query
            </button>

            <!-- Query Modal -->
            <div class="modal fade" id="queryModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="queryModalLabel">Please Enter Your Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave your message here" id="floatingTextarea2" style="height: 100px" name="message"></textarea>
                                <label for="floatingTextarea2">Message</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="submit" name="submitQuery"> Submit </button>
                        </div>
                    </form>
                    <?php

                        if (isset($_POST["submitQuery"])) {
                            
                            $message = mysqli_real_escape_string($conn, $_POST["message"]);
                            
                            $user_id = $_SESSION["id"];

                            $query = "INSERT INTO `client_query`(`id`, `User_id`, `Lawyer_id`, `Message`) VALUES (NULL,'$user_id','$id','$message')";

                            mysqli_query($conn, $query);

                    ?>

                        <script>
                            window.location.assign("./index.php");
                        </script>

                    <?php


                        }

                    ?>
                </div>
            </div>
            </div>

            <!-- Appoint modal button -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointModal">
            Appoint
            </button>

            <!-- Appoint Modal -->
            <div class="modal fade" id="appointModal" tabindex="-1" aria-labelledby="appointModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="appointModalLabel">Please Enter The Required Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Enter Your Name" name="name">
                                <label for="floatingInput">Enter Your Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="Enter Your Email" name="email">
                                <label for="floatingInput">Enter Your Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="floatingInput" placeholder="03000000000" name="phoneno">
                                <label for="floatingInput">Phone No</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingInput" name="date">
                                <label for="floatingInput">Date</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="floatingInput" name="startTime">
                                <label for="floatingInput">Start Time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="floatingInput" name="endTime">
                                <label for="floatingInput">End Time</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="submit" name="submitAppointment"> Submit </button>
                        </div>
                    </form>
                    <?php

                        if (isset($_POST["submitAppointment"])) {
                            
                            $name = mysqli_real_escape_string($conn, $_POST["name"]);
                            
                            $email = mysqli_real_escape_string($conn, $_POST["email"]);
                            
                            $phoneno = mysqli_real_escape_string($conn, $_POST["phoneno"]);
                            
                            $category = $row[2];
                            
                            $date = mysqli_real_escape_string($conn, $_POST["date"]);

                            $startTime = mysqli_real_escape_string($conn, $_POST["startTime"]);
                            
                            $endTime = mysqli_real_escape_string($conn, $_POST["endTime"]);

                            // echo $date . $startTime . $endTime;

                            if ($date == "") {
                    
                                ?>
            
                                <script>
                                    Swal.fire({
                                    title: 'Error!',
                                    text: 'Please Input Date',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                    })
                                </script>
            
                                <?php
                                
                            }
                            else {

                                $dateBefore = $date; 
                                $dateAfter = date('m/d/Y', strtotime($dateBefore));
    
                                $startTimeBefore = $startTime;
                                $startTimeAfter = date(' h:i A', strtotime($startTimeBefore));
    
                                $endTimeBefore = $endTime;
                                $endTimeAfter = date(' h:i A', strtotime($endTimeBefore));

                            }


                            $query = "INSERT INTO `appointment`(`Id`, `Name`, `Email`, `Category`, `PhoneNo`, `Date`, `Start Time`, `End Time`) VALUES ( NULL , ? , ? , ? , ? , ? , ? , ? )";

                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $query)) {
                                echo "SQL error";
                            } else {
                                mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $category, $phoneno, $dateAfter, $startTimeAfter, $endTimeAfter);
                                mysqli_stmt_execute($stmt);
                            }

                    ?>

                        <script>

                            Swal.fire({
                                title: 'Success!',
                                text: 'Appointment Has Been Submitted Lawyer Will Contact You Soon',
                                icon: 'success',
                                timerProgressBar: 'true',
                                timer: '1600',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                            })

                            function redirect() {
                            window.location.assign("./index.php");
                            }
                            setTimeout(redirect, 1600);

                        </script>

                    <?php


                        }

                    ?>
                </div>
            </div>
            </div>


            </div>
        </div>
    </div>
</div>
<!-- Single Page End -->
            
<?php

        }
    }

    include_once("./include/footer.php");
    
    }

?>