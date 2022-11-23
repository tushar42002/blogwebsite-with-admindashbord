<?php
  session_start();
  include 'partials/header.php';
  if(!isset($_SESSION['user-signin'])){
    header('location:'. ROOT_URL . 'signin.php');
  }
?>


<section class="form_section">
    <div class="container form_container">
        <h2>Add User</h2>

        <?php 

        if(isset($_SESSION['adduser'])){
          echo'<div class="alert_message error">
                   <p>'. $_SESSION['adduser'] .'</p>
               </div>';
        }
        if(isset($_SESSION['adduser-success'])){
          echo'<div class="alert_message error">
                   <p>'. $_SESSION['adduser-success'] .'</p>
               </div>';
        }
        

        ?>

        <!-- <div class="alert_message success">
            <p>this is an success message</p>
        </div> -->
        <form action="<?= ROOT_URL ?>admin/adduser-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastname" placeholder="last Name">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="createpassword" placeholder="Create password">
            <input type="password" name="confirmpassword" placeholder="Confirm password">
            <select name="userrole">
                <option value="2">plese add user role</option>
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form_control">
                <label for="User Avatar"></label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Add User</button>
        </form>
    </div>
</section>

<?php
  include '../partials/footer.php';
?>