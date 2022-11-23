<?php

   session_start();

   require "config/database.php";
  


   // get signup data if signup button is clicked
   if (isset($_POST['submit'])) {
       $heading = filter_var($_POST['heading'], FILTER_SANITIZE_SPECIAL_CHARS);
       $contant = filter_var($_POST['contant'], FILTER_SANITIZE_SPECIAL_CHARS);
       $category = filter_var($_POST['category'], FILTER_SANITIZE_SPECIAL_CHARS);
       $thumbnail = $_FILES['thumbnail'];
       

    //    validate input value
    if (!$heading) {
        $_SESSION['post-error'] = "please enter your posts heading";
    } elseif (!$contant) {
        $_SESSION['post-error'] = "please enter your posts contant";
    } elseif (!$category) {
        $_SESSION['post-error'] = "please select post category";
    } elseif (!$thumbnail) {
        $_SESSION['post-error'] = "please add image or thumbnail for your post";
    }  else {
           //work on post image
           //rename post image
           $time = time(); //  making each image name unique using timestemp
           $thumbnail_name = $time . $thumbnail['name'];
           $thumbnail_tmp_name = $thumbnail['tmp_name'];
           $thumbnail_destination_path = '../images/' . $thumbnail_name;
           
           //make sure file is an image 
           $allowed_files = ['png', 'jpg', 'jpeg'];
           $extention = explode('.', $thumbnail_name);
           $extention = end($extention);
           if (in_array($extention, $allowed_files)) {
               // make sure image size is not large (1mb+)
               if ($thumbnail['size'] < 5000000) {
                   // upload avatar
                   move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
               }else {
                   $_SESSION['post-error'] = "file size too big. should be less than 1mb";
               }
           } else {
               $_SESSION['post-error'] = "file should be png, jpg, jpeg only";
           }

        
    }

    // redirect back to signup page if there was any problem
    if (isset($_SESSION['post-error'])) {
        // go back to signup page
          header('location:' . ROOT_URL . 'admin/add-post.php');
         die();
    } else{
        $user_id =  $_SESSION['userid'];
        // insert new user into user table in database
        $inset_user_query = "INSERT INTO posts (post_title, post_contant, post_image, category_id, user_id, date) VALUES ('$heading', '$contant', '$thumbnail_name', '$category', '$user_id', current_timestamp())";
         $inset_user_result = mysqli_query($connection, $inset_user_query);

              if(!mysqli_errno($connection)){
                // redirect to login page with success message
                 $_SESSION['post-done'] = "registration success. please log in";
                  header('location:' . ROOT_URL . 'admin/add-post.php');
                 die();
         }
    }
    
   }else {
    // button is not clicked , bounce back to sign up page 
    header('location:' . ROOT_URL . 'admin/add-post.php');
    die();
   } 

   echo $thumbnail_destination_path;
  
?>