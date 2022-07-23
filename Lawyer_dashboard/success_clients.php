<?php

    include_once("./include/conn.inc.php");
    include_once("header.php");

    if ($_SESSION["role"] == "2") {

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 mb-4">Successful Clients</h1>
        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Succesful Clients DataTable
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
                        <?php

                            $id = $_SESSION["id"];

                            $query = "SELECT success_clients.id, user.Name, user.Email FROM success_clients INNER JOIN user ON success_clients.Client_id = user.Id  AND success_clients.Lawyer_id = $id;";

                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_array($result)) {
                            
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row[0] ?></td>
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
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