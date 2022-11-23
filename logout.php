<?php
    session_start();
    include "admin/config/database.php";


    if (isset($_SESSION['userid'])) {
        session_unset();
        session_destroy();
        header('location:'. ROOT_URL . 'index.php');
    }else{
        header('location:'. ROOT_URL . 'index.php');
    }
    


?>