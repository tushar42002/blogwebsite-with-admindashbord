<?php

   session_start();
   include "admin/config/database.php";

   //get back from data if there was a registration error
   $firstname = $_SESSION['signup-data']['firstname'] ?? null;
   $lastname = $_SESSION['signup-data']['lastname'] ?? null;
   $username = $_SESSION['signup-data']['username'] ?? null;
   $email = $_SESSION['signup-data']['email'] ?? null;
   $createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
   $confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive multipage Blog page</title>

    <!-- ------custom css-------- -->
    <link rel="stylesheet" href="css/style.css">

    <!-- === fontawsome === -->
    <link rel="stylesheet" href="icon/css/all.min.css">

</head>
<body>


<section class="form_section">
    <div class="container form_container">
        <h2>Sign Up</h2>
        <?php
           if(isset($_SESSION['signup'])){
            echo'<div class="alert_message error">
                     <p>'. $_SESSION['signup'] .'</p>
                 </div>';
            
           }
        ?>

        <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="last Name">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
            <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
            <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create password">
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm password">
            <div class="form_control">
                <label for="User Avatar"></label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Alredy have an account? <a href="signin.php">Sign In</a></small>
        </form>
    </div>
</section>


<script src="js/js.js"></script>


</body>

</html>