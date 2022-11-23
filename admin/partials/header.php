<?php

   session_start();

   include "config/database.php";

    $userid = $_SESSION['userid'];
    $userdata_query = "SELECT * FROM users WHERE id = '$userid'";
    $userdata_result = mysqli_query($connection, $userdata_query);
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive multipage Blog page</title>

    <!-- ------custom css-------- -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">

    <!-- === fontawsome === -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>icon/css/all.min.css">

</head>
<body>

    <nav>
        <div class="container nav_container">
            <a href="<?= ROOT_URL?>" class="nav_logo">BLOGGURU</a>
            <ul class="nav_items">
                <li><a href="<?= ROOT_URL?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL?>service.php">Services</a></li>
                <li><a href="<?= ROOT_URL?>contact.php">Contact</a></li>

                <?php if(isset($_SESSION['user-signin']) == true) {
                       $row = mysqli_fetch_assoc($userdata_result);
                       $user_image = $row['avatar'];

                    echo'<li class="nav_profile">
                             <div class="avatar">
                                 <img src="'. ROOT_URL .'images/'. $user_image .'">
                             </div>
                             <ul>
                                 <li><a href="'. ROOT_URL .'admin/dashboard.php">Dashboard</a></li>
                                 <li><a href="'. ROOT_URL .'logout.php">Log out</a></li>
                             </ul>
                         </li> ';
                } else {
                    echo'<li><a href="'. ROOT_URL .'signin.php">Signin</a></li>';
                    
                }
                 
                ?>
                <!-- <li><a href="<?= ROOT_URL?>signin.php">Signin</a></li> -->
                
            </ul>
            <button id="open_nav-btn"><i class="fas fa-bars"></i></button>
            <button id="close_nav-btn"><i class="fas fa-multiply"></i></button>
        </div>
    </nav>

    <!-- ========end of nav======== -->