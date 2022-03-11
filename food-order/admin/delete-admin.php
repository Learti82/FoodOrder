<?php

    include('../config/constants.php');

    //get the id of admin to be deleted
    $id = $_GET['id'];

    //create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query excuted successfully or not
    if($res==true)
    {
        //echo "admin deleted";
        //create a session variable to display message
        $_SESSION['delete'] = "<div class='success'>admin deleted successfully</div>";
        //redirect to manage admin page
        header('location:' .SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //echo "failed to delete admin";
        $_SESSION['delete'] = "<div class='error'>failed to delete admin, try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>