<?php
    include('../config/constants.php');

    //echo "delete page";
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get the value and delete
        //echo "get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/category".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to remove category image.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');

                die();
            }
        }

        //delete data from database
        //sql query to delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        $sql = mysqli_query($conn, $sql);


        if($res==true)
        {
            $_SESSION['delete']="<div class='success'>Category delted successfully</div>";

            header('location:'.SITEURL.'admin/manage-category.php');
        }
    
        else
        {
            //set fail message and redirecs
            $_SESSION['delete'] = "<div class='error'>Failed to delete category.</div>";
        
            header('location:'.SITEURL.'admin/manage-category.php');
        }


    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');
    }

?>