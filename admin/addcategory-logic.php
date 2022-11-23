<?php

   session_start();
   require "config/database.php";

   // get signup data if signup button is clicked
   if (isset($_POST['submit'])) {
     $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
     $desc = filter_var($_POST['desc'], FILTER_SANITIZE_SPECIAL_CHARS);
    
  //    validate input value
       if (!$title) {
           $_SESSION['category-error'] = "please enter title";
       } elseif (!$desc) {
           $_SESSION['category-error'] = "please enter discription";
       } else{
           
          $sql= "INSERT INTO categories (title, description) VALUES ('$title', '$desc')";
          $result = mysqli_query($connection, $sql);
          if($result){
               $_SESSION['category-success'] = "category is added";
               header('location:'. ROOT_URL .'admin/add-category.php');
          } else{
               $_SESSION['category-error'] = "somthing is wrong";
          }
       }
       if($_SESSION['category-error']){
          header('location:'. ROOT_URL .'admin/add-category.php');
       }

    } else{
     header('location:'. ROOT_URL . 'index.php');
    }