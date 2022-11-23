<?php
  session_start();
  include 'partials/header.php';
  
  if(!isset($_SESSION['user-signin'])){
    header('location:'. ROOT_URL . 'signin.php');
  }

?>


<?php
  
  $sql = "SELECT * FROM users WHERE id = {$_GET['userid']}";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);


 echo'<section class="form_section">
 <div class="container form_container">
     <h2>Edit User</h2>
     <div class="alert_message success">
         <p>this is an success message</p>
     </div>
     <form action="edit-user-logic.php?id='.$row['id'].'" method="POST">
         <input type="text" name="firstname" value="'.$row['firstname'].'" placeholder="First Name">
         <input type="text" name="lastname" value="'.$row['lastname'].'" placeholder="last Name">
         <select name="userrole">
             <option>select user role</option>
             <option value="0">Author</option>
             <option value="1">Admin</option>
         </select>
       
         <button type="submit" name="submit" class="btn">Update User</button>
     </form>
 </div>
</section>';
 
?>


<script src="js.js"></script>


</body>

</html>