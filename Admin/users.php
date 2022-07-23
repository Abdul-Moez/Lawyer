<?php

    include_once("./include/conn.inc.php");
    include_once("./header.php");

    if ($_SESSION["role"] == "0") {

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 mb-4">Users</h1>
        
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    User DataTable
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <!-- <th>Password</th> -->
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <!-- <th>Password</th> -->
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <?php

                            $query = "SELECT * FROM `user`";

                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_array($result)) {
                            
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row[0] ?></td>
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                                <!-- <td><?php echo $row[3] ?></td> -->
                                <td><?php echo $row[4] ?></td>
                                <td><?php echo $row[5] ?></td>
                                <!-- Edit Button -->

                                <!-- <td><a href="./updateUser.php?id=<?php echo $row[0]; ?>" class="btn btn-success">Edit</a></td> -->
                                
                                <!-- Edit Button modal -->
                                <td><button type="button" class="btn btn-success editbtn">Edit</button></td>

                                <!-- Edit Modal Start -->
                                <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit User Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form action="updateUser.php" method="POST">

                                        <div class="modal-body">

                                            <input type="hidden" name="update_id" id="update_id">

                                            <div class="form-group">
                                                <label> User Name </label>
                                                <input type="text" disabled name="name" id="name" class="form-control"
                                                    placeholder="User Name">
                                            </div>
                                </br>
                                            <div class="form-group">
                                                <label> User Email </label>
                                                <input type="email" disabled name="email" id="email" class="form-control"
                                                    placeholder="User Email">
                                            </div>
                                </br>
                                            <div class="form-group">
                                                <label> Edit User Role </label>
                                                <input type="text" name="role" id="role" class="form-control"
                                                    placeholder="Edit User Role">
                                            </div>
                                </br>
                                            <div class="form-group">
                                                <label> Edit User Status </label>
                                                <input type="text" name="status" id="status" class="form-control"
                                                    placeholder="Edit User Status">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                                        </div>

                                    </form>
                                    
                                </div>
                                </div>
                                <!-- Edit Modal End -->

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

        $query_remove = "DELETE FROM `user` WHERE `id` = '$userid'";

        $queryRun = mysqli_query($conn, $query_remove);

    ?>

    <script>
        window.location.assign("./users.php");
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
    
    
    $(document).ready(function () {
        $('.editbtn').on('click',function () {

           $('#editmodal').modal('show');

           $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#name').val(data[1]);
            $('#email').val(data[2]);
            // $('#password').val(data[3]);
            $('#role').val(data[3]);
            $('#status').val(data[4]);

        });
    });
    
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