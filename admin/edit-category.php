<?php
  session_start();
  include 'partials/header.php';

  if(!isset($_SESSION['user-signin'])){
    header('location:'. ROOT_URL . 'signin.php');
  }

  $sql = "SELECT * FROM categories WHERE id = {$_GET['catid']}";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);
?>


    <section class="form_section">
        <div class="container form_container">
            <h2>Edit Category</h2>
            <form action="edit-category-logic.php?id=<?= $row['id'] ?>" method="POST">
                <input type="text" name="title" value="<?= $row['title'] ?>" placeholder="Title">
                <textarea rows="4" name="description" placeholder="Description"><?= $row['description'] ?></textarea>
                <button type="submit" name="submit" class="btn">Update Category</button>
            </form>
        </div>
    </section>



<?php
  include '../partials/footer.php';
?>