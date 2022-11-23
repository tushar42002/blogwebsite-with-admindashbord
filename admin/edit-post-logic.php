<?php

   session_start();

   require "config/database.php";
   


   // get post data if post button is clicked
   if (isset($_POST['submit'])) {
       $post_id = filter_var($_POST['postid'], FILTER_SANITIZE_SPECIAL_CHARS);
       $heading = filter_var($_POST['heading'], FILTER_SANITIZE_SPECIAL_CHARS);
       $contant = filter_var($_POST['contant'], FILTER_SANITIZE_SPECIAL_CHARS);
       $category = filter_var($_POST['category'], FILTER_SANITIZE_SPECIAL_CHARS);
       $thumbnail = $_FILES['thumbnail'];
       

     // validate input value
        if (!$post_id) {
            $_SESSION['post_edit'] = "please enter your first name";
        } elseif(!$heading){
            $_SESSION['post_edit'] = "please enter your first name";
        } elseif (!$contant) {
            $_SESSION['post_edit'] = "please enter your last name";
        } elseif (!$category) {
            $_SESSION['post_edit'] = "please enter your username";
        }elseif (!$thumbnail['name']) {
            
            $update_post_sql = " UPDATE posts SET post_title = '$heading', post_contant = '$contant', category_id = '$category' WHERE post_id = '$post_id'";
            $update_post_result = mysqli_query($connection, $update_post_sql);

            header('location: dashboard.php');
            die();

        } else {

           
         
            if($thumbnail['name']){
                $get_thumbnail_sql = "SELECT * FROM posts WHERE post_id = $post_id";
                $get_thumbnail_result = mysqli_query($connection, $get_thumbnail_sql);
                $post_row = mysqli_fetch_assoc($get_thumbnail_result);

                $old_thumbnail_name = $post_row['post_image'];
                $old_thumbnail_path = '../images/'.$old_thumbnail_name;
               
                // workin on new thumbnail
                $time = time();
                $new_thumbnail_name = $time.$thumbnail['name'];
                $new_thumbnail_tmp = $thumbnail['tmp_name'];
                $new_thumbnail_path = '../images/'.$new_thumbnail_name;

                 //make sure file is an image 
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $new_thumbnail_name);
                $extention = end($extention);
                
                if (in_array($extention, $allowed_files)) {
                     // make sure image size is not large (1mb+)
                     if ($thumbnail['size'] < 1000000) {
                         
                        move_uploaded_file($new_thumbnail_tmp, $new_thumbnail_path);
                        $update_post_sql = " UPDATE posts SET post_title = '$heading', post_contant = '$contant', post_image = '$new_thumbnail_name', category_id = '$category' WHERE post_id = '$post_id'";
                        $update_post_result = mysqli_query($connection, $update_post_sql);

                         // upload avatar
                         if($update_post_result){
                            
                            unlink($old_thumbnail_path);
                            header('location:dashboard.php');

                         } else {
                            $_SESSION['post_edit'] = "Somthing is wrong from our end";
                         }
                     }else {
                         $_SESSION['post_edit'] = "file size too big. should be less than 1mb";
                     }
                } 

              

               
                

                
            }
   
           
        }

        if(isset($_SESSION['post_edit'])){
            header('location:'. ROOT_URL .'admin/edit-post.php');
            die();
        }
    
    }else{
        header('location:'. ROOT_URL .'index.php');
        die();
    }