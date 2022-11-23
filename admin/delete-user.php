<?php

   session_start();

   require "config/database.php";
   
   $sql4 = "SELECT * FROM users WHERE id = {$_GET['userid']}";
   $result4 = mysqli_query($connection, $sql4);

   if($result4){
       $row4 = mysqli_fetch_assoc($result4);

       $sql = "DELETE FROM users WHERE id = {$_GET['userid']}";
       $result = mysqli_query($connection, $sql);
    
       if($result){
        $delete_userimage_path = '../images/'.$row4['avatar'];
         unlink($delete_userimage_path);
       }
    }
       
    

    $sql2 = "SELECT * FROM posts WHERE user_id = {$_GET['userid']}";
    $result2 = mysqli_query($connection, $sql2);

    
    while($row2 = mysqli_fetch_assoc($result2) ){
        $delete_thumbnail_path = '../images/'.$row2['post_image'];
        $sql3 = "DELETE FROM posts WHERE post_id = {$row2['post_id']}";
        $result3 = mysqli_query($connection, $sql3);
        if($result3){
            unlink($delete_thumbnail_path);
        }
    }
    
    
    header('location:'. ROOT_URL .'admin/manage-users.php');
    die();

?>
  