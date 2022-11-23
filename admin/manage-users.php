<?php
  session_start();
  include 'partials/header.php';

  if(!isset($_SESSION['user-signin'])){
    header('location:'. ROOT_URL . 'signin.php');
  }
?>
<!-- ========end of nav======== -->

<?php
    
?>

<section class="dashboard">
    <div class="container dashboard_container">
        <button id="show_sidebar-btn" class="sidebar_toggle"><i class="fas fa-angle-right"></i></button>
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="fas fa-angle-left"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="fas fa-pen"></i>
                        <h5>Add post</h5>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php"><i class="fa fa-pager"></i>
                        <h5>Manage posts</h5>
                    </a>
                </li>
                <li>
                    <a href="add-user.php"><i class="fas fa-user-plus"></i>
                        <h5>Add User</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php" class="active"><i class="fas fa-user-group"></i>
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
                </li>
            </ul>
        </aside>
        <main>
            <table>
            <h2>Manage Users</h2>
                <thead>
                    <tr>
                       <td>name</td>
                       <td>username</td>
                       <td>edit</td>
                       <td>delete</td>
                       <td>admin</td>
                    </tr>
                </thead>
                <tbody>
                    <?php

                         $get_users_query = "SELECT * FROM users";
                         $get_users_result = mysqli_query($connection, $get_users_query);
     
                         // print all users from database
     
                         while ($user_rows  = mysqli_fetch_assoc($get_users_result)) {
                             $user_fname = $user_rows['firstname'];
                             $user_username = $user_rows['username'];
                             $user_admin = $user_rows['is_admin'];
                             $user_id = $user_rows['id'];
                       
                             if($user_admin == 1){
                               $admin = "YES";
                             } else {
                               $admin = "No";
                             }
     
     
                             echo' <tr>
                                       <td>'. $user_fname .'</td>
                                       <td>'. $user_username .'</td>
                                       <td><a href="edit-user.php?userid='. $user_id .'" class="btn sm">Edit</a></td>
                                       <td><a href="delete-user.php?userid='. $user_id .'" class="btn sm danger">Delete</a></td>
                                       <td>'. $admin .'</td>
                                   </tr>';
                         }
                    ?>
                   

                </tbody>
            </table>
        </main>
    </div>
</section>




<?php
  include '../partials/footer.php';
?>