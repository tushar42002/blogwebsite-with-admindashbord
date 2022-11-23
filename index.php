<?php
   include "partials/header.php";
?>

    <section class="featured">
        <div class="container featured_container post">
           <?php
                $get_featured_post = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1";
                $get_featured_result = mysqli_query($connection, $get_featured_post);
                $featured_post = mysqli_fetch_assoc($get_featured_result);

                $featured_title = $featured_post['post_title'];
                $featured_contant = $featured_post['post_contant'];
                $featured_desc = substr($featured_contant, 0, 400);
                $featured_date = $featured_post['date'];
                $featured_thumbnail = $featured_post['post_image'];


                $get_category_sql = "SELECT * FROM categories WHERE id = {$featured_post['category_id']}";
                $get_category_result = mysqli_query($connection, $get_category_sql);
                $category_featured_detail = mysqli_fetch_assoc($get_category_result);


                $get_user_sql = "SELECT * FROM users WHERE id = {$featured_post['user_id']}";
                $get_user_result = mysqli_query($connection, $get_user_sql);
                $user_featured_detail = mysqli_fetch_assoc($get_user_result);

                echo'<div class="post_thumbnail">
                         <img src="images/'. $featured_thumbnail .'">
                     </div>
                     <div class="post_info">
                         <a href="category-posts.php?catid='.$category_featured_detail['id'].'" class="category_button">'. $category_featured_detail['title'] .'</a>
                         <h2 class="post_title"><a href="post.php?postid='.$featured_post['post_id'].'">'. $featured_title .'</a>
                         </h2>
                         <p class="post_body">'. $featured_desc .'</p>
                         <div class="post_author">
                             <div class="post_author-avatar">
                                 <img src="images/'. $user_featured_detail['avatar'] .'">
                             </div>
                             <div class="post_author-info">
                                 <h5>By: '. $user_featured_detail['firstname'] .'</h5>
                                 <small>'. $featured_date .'</small>
                             </div>
                         </div>
                     </div>';
            ?>
            <!-- <div class="post_thumbnail">
                <img src="img/blog1.jpg">
            </div>
            <div class="post_info">
                <a href="category-posts.php" class="category_button">Wild life</a>
                <h2 class="post_title"><a href="post.php">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                </h2>
                <p class="post_body">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur porro in
                    laudantium repellat possimus cupiditate fugiat. Voluptatum recusandae eveniet et quos quisquam
                    architecto soluta enim quo! Voluptas perferendis magni dolor.</p>
                <div class="post_author">
                    <div class="post_author-avatar">
                        <img src="img/avatar2.jpg">
                    </div>
                    <div class="post_author-info">
                        <h5>By: Trilok</h5>
                        <small>June 10,2022 - 07:07</small>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    <!-- ==================== end of feature ==================== -->



    

    <section class="posts">
        <div class="container posts_container">

            <?php

                $post_sql = "SELECT * FROM posts";
                $post_result = mysqli_query($connection, $post_sql);
                
                while($post_row = mysqli_fetch_assoc($post_result)){

                    $contant = $post_row['post_contant'];
                    $description = substr($contant, 0, 200);
                
                 $category_sql = "SELECT * FROM categories WHERE id = {$post_row['category_id']}";
                 $category_result = mysqli_query($connection, $category_sql);
                 $category_row = mysqli_fetch_assoc($category_result);
                
                
                 $user_sql = "SELECT * FROM users WHERE id = {$post_row['user_id']}";
                 $user_result = mysqli_query($connection, $user_sql);
                 $user_row = mysqli_fetch_assoc($user_result);
                
                 echo' <article class="post">
                 <div class="post_thumbnail">
                     <img src="images/'.$post_row['post_image'].'" alt="">
                 </div>
                 <div class="post_info">
                     <a href="category-posts.php?catid='. $category_row['id'] .'" class="category_button">'. $category_row['title'] .'</a>
                     <h3 class="post_title"><a href="post.php?postid='. $post_row['post_id'] .'">'. $post_row['post_title'] .'</a></h3>
                     <p class="post_body">'. $description .'</p>
                     <div class="post_author">
                         <div class="post_author-avatar">
                             <img src="images/'. $user_row['avatar'] .'">
                         </div>
                         <div class="post_author-info">
                             <h5>By: Tushar</h5>
                             <small>' . $post_row['date'] . '</small>
                         </div>
                     </div>
                 </div>
                </article>';
                   
                }
            
            ?>
        
            
        </div>
    </section>
    <!-- ================================ end of posts ============================ -->

    <section class="category_buttons">
        <div class="container category_buttons-container">
            <?php
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($connection, $sql);
                
                while($row = mysqli_fetch_assoc($result)){
                   echo' <a href="category-posts.php?catid='. $row['id'] .'" class="category_button">'. $row['title'] .'</a>';
                }
            ?>
        </div>
    </section>
    <!-- ================================ end of category buttons ============================ -->



<?php
   include "partials/footer.php";
?>