<?php

   session_start();

   require "config/database.php";
   


   // get signup data if signup button is clicked
   if (isset($_POST['submit'])) {
       $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
       $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
       $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
       $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
       $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
       $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
       $avatar = $_FILES['avatar'];
       $user_role = $_POST['userrole'];
       

    //    validate input value
    if (!$firstname) {
        $_SESSION['adduser'] = "please enter your first name";
    } elseif (!$lastname) {
        $_SESSION['adduser'] = "please enter your last name";
    } elseif (!$username) {
        $_SESSION['adduser'] = "please enter your username";
    } elseif (!$email) {
        $_SESSION['adduser'] = "please enter your email";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['adduser'] = "password should be more than 8 characters";
    } elseif (!$avatar['name']) {
        $_SESSION['adduser'] = "please add avatar";
    }elseif(!$user_role){
        $_SESSION['adduser'] = "please add user role";
    } else {
        // cheack if password don't match

        if($createpassword !== $confirmpassword){
            $_SESSION['adduser'] = "passwords doesn't match";
        } else{
            // hash pasword
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // cheak if username or email is exists or not
            $user_check_query = "SELECT * FROM users WHERE username = '$username 'OR email = '$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['adduser'] = "username or email already exists";
            } else {
                //work on avatar
                //rename avatar
                $time = time(); //  making each image name unique using timestemp
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;

                //make sure file is an image 
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    // make sure image size is not large (1mb+)
                    if ($avatar['size'] < 1000000) {
                        // upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    }else {
                        $_SESSION['adduser'] = "file size too big. should be less than 1mb";
                    }
                } else {
                    $_SESSION['adduser'] = "file should be png, jpg, jpeg only";
                }
            }
        }
    }

    // redirect back to signup page if there was any problem
    if (isset($_SESSION['adduser'])) {
         //go back to signup page
        //  $_SESSION['signup-data'] = $_POST;
         header('location:' . ROOT_URL . 'admin/add-user.php');
        die();
    } else{
        // insert new user into user table in database
        $inset_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES ('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$avatar_name', '$user_role')";
        $inset_user_result = mysqli_query($connection, $inset_user_query);

        if(!mysqli_errno($connection)){
            // redirect to login page with success message
            $_SESSION['adduser-success'] = "user added successfully";
             header('location:' . ROOT_URL . 'admin/add-user.php');
             die();
        }
    }
    
   }else {
    // button is not clicked , bounce back to sign up page 
    header('location:' . ROOT_URL . 'admin/add-user.php');
    die();
   } 

  
?>