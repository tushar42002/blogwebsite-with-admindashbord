<?php

   session_start();

   require "config/database.php";
   
    $sql = "SELECT * FROM posts WHERE post_id = {$_GET['postid']}";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $delete_thumbnail_path = '../images/'.$row['post_image'];
       
    $sql4 = "DELETE FROM posts WHERE post_id = {$_GET['postid']}";
    $result4 = mysqli_query($connection, $sql4);

    if($result4){
        unlink($delete_thumbnail_path);
    }
    
    header('location:'. ROOT_URL .'admin/dashboard.php');
    die();

?>
  