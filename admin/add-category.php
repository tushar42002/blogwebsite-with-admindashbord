<?php
  session_start();
  include 'partials/header.php';
  
  if(!isset($_SESSION['user-signin'])){
    header('location:'. ROOT_URL . 'signin.php');
  }
?>

<section class="form_section">
    <div class="container form_container">
        <h2>Add Category</h2>
        <?php if(isset($_SESSION['category-success'])) {
          echo' <div class="alert_message success">
                  <p>'. $_SESSION['category-success'] .'</p>
                </div>';
            }elseif(isset($_SESSION['category-error'])){
              echo' <div class="alert_message error">
                  <p>'. $_SESSION['category-error'] .'</p>
                </div>';
            }     
            ?>
        <form action="addcategory-logic.php" method="POST">
            <input type="text" name="title" placeholder="Title">
            <textarea rows="4" name="desc" placeholder="Description"></textarea>
            <button type="submit" name="submit" class="btn">Add Category</button>
        </form>
    </div>
</section>



<?php
  include '../partials/footer.php';
?>