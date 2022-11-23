<?php

   session_start();

   require "config/database.php";
   
    $cat_id = $_GET['catid'];

    $sql = "DELETE FROM categories WHERE id = '$cat_id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $sql2= "UPDATE posts SET category_id = '1' WHERE category_id = '$cat_id'";
        $result2 = mysqli_query($connection, $sql2);
    }


    
    
    header('location:'. ROOT_URL .'admin/manage-categories.php');
    die();

?>