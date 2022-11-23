<?php

   session_start();

   require "config/database.php";

   if(isset($_POST['submit'])){
   
    $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "UPDATE categories SET title ='$title', description= '$desc' where id = {$_GET['id']}";
    $result = mysqli_query($connection, $sql);

    header('location:'.ROOT_URL.'admin/manage-categories.php');
    die();

   } else{
    header('location:'.ROOT_URL.'admin/manage-categories.php');
    die();
   }

  



?>   