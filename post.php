<?php
   include "partials/header.php";
?>
    <!-- =========================end of nav===================== -->

<?php
   $post_sql = "SELECT * FROM posts WHERE post_id = {$_GET['postid']}";
   $post_result = mysqli_query($connection, $post_sql);
   $post_row = mysqli_fetch_assoc($post_result);

   $category_sql = "SELECT * FROM categories WHERE id = {$post_row['category_id']}";
   $category_result = mysqli_query($connection, $category_sql);
   $category_row = mysqli_fetch_assoc($category_result);
  
  
   $user_sql = "SELECT * FROM users WHERE id = {$post_row['user_id']}";
   $user_result = mysqli_query($connection, $user_sql);
   $user_row = mysqli_fetch_assoc($user_result);
   
?>

    <section class="singlepost">
    <div class="container singlepost_container">
            <h2><?= $post_row['post_title'] ?></h2>
            <div class="post_author">
                <div class="post_author-avatar">
                    <img src="images/<?= $user_row['avatar'] ?>">
                </div>
                <div class="post_author-info">
                    <h5>By: <?= $user_row['firstname'] ?></h5>
                    <small><?= $post_row['date'] ?></small>
                </div>
            </div>
            <div class="singlepost_thumbnail">
                <img src="images/<?= $post_row['post_image'] ?>">
            </div>
            <p><?= $post_row['post_contant'] ?></p>
        </div>
    </section>

    <!-- ===================== end of single post =============-=-==== -->
    


<?php
   include "partials/footer.php";
?>