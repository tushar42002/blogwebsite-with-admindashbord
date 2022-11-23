<?php
  include 'partials/header.php';
?>

    <!-- ========end of nav======== -->


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
                    <a href="manage-categories.php" class="active"><i class="fas fa-list-ul"></i>
                    <h5>Manage Categories</h5>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Manage Categories</h2>
            <table>
                <thead>
                    <tr>
                        <td><b>Title</b></td>
                        <td><b>Edit</b></td>
                        <td><b>Delete</b></td>
                    </tr>
                </thead>
                <tbody>

                <?php
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($connection, $sql);
                
                while($row = mysqli_fetch_assoc($result)){
                   echo' <tr>
                            <td>'. $row['title'] .'</td>
                            <td><a href="edit-category.php?catid='. $row['id'] .'" class="btn sm">Edit</a></td>
                            <td><a href="delete-category.php?catid='. $row['id'] .'" class="btn sm danger">Delete</a></td>
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