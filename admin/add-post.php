<?php
  session_start();
  include 'partials/header.php';
  
  if(!isset($_SESSION['user-signin'])){
    header('location:'. ROOT_URL . 'signin.php');
  }
?>



    <section class="form_section">
        <div class="container form_container">
            <h2>Add Post</h2>
            <div class="alert_message error">
                <p>this is an error message</p>
            </div>
            <form action="<?= ROOT_URL ?>/admin/addpost-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="heading" placeholder="Title">
                <select name="category">
                <?php
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($connection, $sql);
                
                while($row = mysqli_fetch_assoc($result)){
                   echo' <option value="'. $row['id'] .'">'. $row['title'] .'</option>';
                }
                ?>
                </select>
                <textarea rows="5" name="contant" placeholder="Body"></textarea>
                <!-- <div class="form_control inline">
                    <input type="checkbox" id="is_featured" checked>
                    <label for="is_featured">Featured</label>
                </div> -->
                <div class="form_control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Add Post</button>
            </form>
        </div>
    </section>


<?php
  include '../partials/footer.php';
?>