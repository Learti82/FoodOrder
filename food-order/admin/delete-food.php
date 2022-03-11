<?php
    
    include('../config/constants.php');

    //echo "delete food page";

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //echo "process to delete";

        //get id and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the image if available
        //check whether the image is available or not and delete only if available
        if($image_name != "")
        {
            //it has image and need to remove folder
            //get the image path
            $path = "../images/food/".$image_name;

            $remove = unlink($path);

            //check whether the image is removed or not
            if($remove==false)
            {
                //failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }

        //delete food from database 
        $sql = "DELETE FROM tbl_food WHERE id=$id";

        $res = mysqli_query($conn, $sql);
        
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to delete food</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }



    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>