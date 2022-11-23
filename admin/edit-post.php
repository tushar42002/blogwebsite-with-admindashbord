<?php
  session_start();
  include 'partials/header.php';

  if(!isset($_SESSION['user-signin'])){
    header('location:'. ROOT_URL . 'signin.php');
  }
  $sql3 = "SELECT * FROM posts WHERE post_id = {$_GET['postid']}";
  $result3 = mysqli_query($connection, $sql3);
  $row3 = mysqli_fetch_assoc($result3);
?>


    <section class="form_section">
        <div class="container form_container">
            <h2>Edit Post</h2>
            <form action="<?= ROOT_URL?>admin/edit-post-logic.php" enctype="multipart/form-data" method = "POST">
                <input type="text" name="heading" value = "<?= $row3['post_title'] ?>" placeholder="Title">
                <input type="hidden" name="postid" value="<?= $_GET['postid'] ?>">
                <select name="category">
                    <option> select category </option>
                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($connection, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)){
                       echo'<option value="'. $row['id'] .'">'. $row['title'] .'</option>';
                    }
                    ?>
                    
                </select>
                <textarea rows="5" name="contant" placeholder="Body"><?= $row3['post_contant'] ?></textarea>
                <!-- <div class="form_control inline">
                    <input type="checkbox" id="is_featured" checked>
                    <label for="is_featured">Featured</label>
                </div> -->
                <div class="form_control">
                    <label for="thumbnail">Change Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Update Post</button>
            </form>
        </div>
    </section>



<?php
  include '../partials/footer.php';
?>