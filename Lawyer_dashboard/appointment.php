<?php

    include_once("./include/conn.inc.php");
    include_once("header.php");

    $id = $_SESSION['id'];

    $title = $_SESSION['title'];

    if ($_SESSION["role"] == "2") {

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 mb-4">Appointment</h1>
        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Appointment DataTable
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </tfoot>
                        <?php

                            $query = "SELECT * FROM `appointment`";

                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_array($result)) {
                            
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row[0] ?></td>
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                                <td><?php echo $row[4] ?></td>
                                <td><?php echo $row[5] ?></td>
                                <td><?php echo $row[6] ?></td>
                                <td><?php echo $row[7] ?></td>
                            </tr>
                        </tbody>
                        <?php

                                }
                            }

                        ?>
                    </table>
                </div>
            </div>
        </div>
    </main>

<?php

include_once("footer.php");

    }
    else {
    ?>

    <script>
        window.location.assign("./lawyer_login.php");
    </script>

    <?php
    }

?>