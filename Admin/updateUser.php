<?php

    session_start();

    include_once("./include/conn.inc.php");

    if (isset($_POST['updatedata'])) {
        
        $id = mysqli_real_escape_string($conn, $_POST['update_id']);
        
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $query = "UPDATE `user` SET `Role`='$role',`Status`='$status' WHERE id = '$id'";

        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:users.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }

    }

?>