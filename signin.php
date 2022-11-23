<?php
   session_start();
   include "admin/config/database.php";
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
            <h2>Sign In</h2>
        <?php

            if (isset($_SESSION['signup-success'])) {
                echo ' <div class="alert_message success">
                           <p>'. $_SESSION['signup-success'] .'</p>
                       </div>';
            }elseif (isset($_SESSION['error'])) {
                echo ' <div class="alert_message error">
                           <p>'. $_SESSION['error'] .'</p>
                       </div>';
            }
            
          echo'  <form action="'. ROOT_URL .'signin-logic.php" method="POST">
                <input type="text" name="username_email" placeholder="Username or Email">
                <input type="password" name="password" placeholder="password">
                ';
                ?>
                <input type="submit" class="btn" value="sign in">
                <!-- <button type="submit" class="btn">Sign In</button> -->
                <small>Create New account? <a href="signup.php">Sign up</a></small>
                </form>
                </div>
                
                
    </section>    

    <script src="js/js.js"></script>


</body>

</html>