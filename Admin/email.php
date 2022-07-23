<?php

    include_once("./include/conn.inc.php");
    include_once("header.php");

    if ($_SESSION["role"] == "0") {

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 mb-4">Email</h1>
        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Email DataTable
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <!-- <th>Edit</th> -->
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <!-- <th>Edit</th> -->
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <?php

                            $query = "SELECT * FROM `email`";

                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_array($result)) {
                            
                        ?>
                        <tbody>
                            <tr>
                                <th><?php echo $row[0] ?></th>
                                <th><?php echo $row[1] ?></th>
                                <!-- <td><button class="btn btn-success" >Edit</button></td> -->

                                <!-- Delete Modal Button -->
                                <td><button type="button" value="<?php echo $row[0]; ?>" class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#modalDelete">Delete</button></td>
                                
                                <!-- Delete Modal Start -->
                                <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modallabelDelete" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modallabelDelete">Delete User?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <form action="" method="post">

                                            <div class="modal-body">
                                                <input type="hidden" name="delete_id" class="delete_User_Id">
                                                Are you sure you want to delete this user?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger" name="deleteUserBtn">Yes, Delete!</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                </div>
                                <!-- Delete Modal End -->
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

if (isset($_POST['deleteUserBtn'])) {

    $userid = $_POST['delete_id'];

    $query_remove = "DELETE FROM `email` WHERE `id` = '$userid'";

    $queryRun = mysqli_query($conn, $query_remove);

?>

<script>
    window.location.assign("./email.php");
</script>

<?php

}

include_once("footer.php");
?>

<script>
    
    $(document).ready(function () {
        $('.deleteBtn').click(function (e) {
            e.preventDefault();

            var user_id = $(this).val();
            //console.log(user_id);

            $('.delete_User_Id').val(user_id);
            $('#modalDelete').modal('show');
        })        
    })
    
</script>

<?php

    }
    else {
    ?>

    <script>
        window.location.assign("../Admin/login.php");
    </script>

    <?php
    }

?>