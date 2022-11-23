<?php
   include "partials/header.php";
?>
    

    <section class="search_bar">
        <form class="container search_bar-container" action="search-result.php" method="POST">
            <div>
                <i class="fas fa-search"></i>
                <input type="search" name="search" placeholder="Search">
            </div>
            <button type="submit" class="btn">Go</button>
        </form>
    </section>



    <section class="posts">
        <div class="container posts_container">

            <?php

                 $search = mysqli_real_escape_string($connection, $_POST['search']);
            
                $post_sql = "SELECT * FROM posts WHERE (post_title LIKE '%{$search}%')";
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