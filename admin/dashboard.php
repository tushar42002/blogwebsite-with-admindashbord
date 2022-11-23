<?php
  session_start();
  include 'partials/header.php';

  if(!isset($_SESSION['user-signin'])){
    header('location:'. ROOT_URL . 'signin.php');
  }
//   echo'<br>';
//   echo $_SESSION['admin'];
//   echo'<br>';
  $admin = $_SESSION['admin'];
?>
<!-- ========end of nav======== -->

<section class="dashboard">
    <div class="container dashboard_container">
        <button id="show_sidebar-btn" class="sidebar_toggle"><i class="fas fa-angle-right"></i></button>
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="fas fa-angle-left"></i></button>
        <aside>
            <ul>





                <?php
                if($admin == 0){
                  echo'<li>
                           <a href="add-post.php"><i class="fas fa-pen"></i>
                           <h5>Add post</h5>
                           </a>
                       </li>
                       <li>
                           <a href="dashboard.php" class="active"><i class="fa fa-pager"></i>
                           <h5>Manage posts</h5>
                           </a>
                       </li>';
                }else{
                  echo'<li>
                           <a href="add-post.php"><i class="fas fa-pen"></i>
                           <h5>Add post</h5>
                           </a>
                       </li>
                       <li>
                           <a href="dashboard.php" class="active"><i class="fa fa-pager"></i>
                           <h5>Manage posts</h5>
                           </a>
                       </li>
                       <li>
                           <a href="add-user.php"><i class="fas fa-user-plus"></i>
                           <h5>Add User</h5>
                           </a>
                       </li>
                       <li>
                           <a href="manage-users.php"><i class="fas fa-user-group"></i>
                           <h5>manage users</h5>
                           </a>
                       </li>
                       <li>
                           <a href="add-category.php"><i class="fas fa-edit"></i>
                           <h5>Add Category</h5>
                           </a>
                       </li>
                       <li>
                           <a href="manage-categories.php"><i class="fas fa-list-ul"></i>
                           <h5>Manage Categories</h5>
                           </a>
                       </li>';
                }

                ?>


            </ul>
        </aside>
        <main>
            <h2>Manage Posts</h2>
            <table>
                <thead>
                    <tr>
                        <td><b>Title</b></td>
                        <td><b>Category</b></td>
                        <td><b>Edit</b></td>
                        <td><b>Delete</b></td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM posts WHERE user_id = {$_SESSION['userid']}";
                    $result = mysqli_query($connection, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)){
                        $sql2 = "SELECT * FROM categories WHERE id = {$row['category_id']}";
                        $result2 = mysqli_query($connection, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);

                       echo'<tr>
                                <td>'. $row['post_title'] .'</td>
                                <td>'. $row2['title'] .'</td>
                                <td><a href="edit-post.php?postid='. $row['post_id'] .'" class="btn sm">Edit</a></td>
                                <td><a href="delete-post.php?postid='. $row['post_id'] .'" class="btn sm danger">Delete</a></td>
                            </tr>';
                    }
                ?>
                    <!-- <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>Wild life</td>
                        <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-user.php" class="btn sm danger">Delete</a></td>
                    </tr> -->

                </tbody>
            </table>
        </main>
    </div>
</section>



<?php
  include '../partials/footer.php';
?>