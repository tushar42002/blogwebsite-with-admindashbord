<?php

  session_start();
  require "admin/config/database.php";

  

//   if (isset($_POST['submit'])) {
      $username_email = $_POST['username_email'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM users WHERE email='$username_email' OR username = '$username_email'";
      $result = mysqli_query($connection, $sql);
      $num = mysqli_num_rows($result);
      

      if( $num == 1){
        
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $_SESSION['user-signin'] = true;
            $_SESSION['userid'] = $row['id'];
            $_SESSION['admin'] = $row['is_admin'];
            header('location:'. ROOT_URL .'index.php');
            die();

        } else{
            $_SESSION['error'] = "incorrect username , email or password";
            header('location:' . ROOT_URL . 'signin.php');
          }
          
      } else{
        $_SESSION['error'] = "incorrect username , email or password";
        header('location:' . ROOT_URL . 'signin.php');
      }

//   } else{
//      header('location:' . ROOT_URL . 'signin.php');
//      die();
//   }


?>