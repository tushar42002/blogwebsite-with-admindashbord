<?php

   session_start();

   require "config/database.php";

   if(isset($_POST['submit'])){
   
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $userrole = filter_var($_POST['userrole'], FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "UPDATE users SET firstname ='$firstname', lastname= '$lastname', is_admin = '$userrole' where id = {$_GET['id']}";
    $result = mysqli_query($connection, $sql);

    header('location:'.ROOT_URL.'admin/manage-users.php');
    die();

   } else{
    header('location:'.ROOT_URL.'admin/manage-users.php');
    die();
   }

  



?>   