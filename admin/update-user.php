<?php include "header.php";
    include('config.php');
    if ($_SESSION['user_role'] == '0') {
        header('location:post.php');
    }
    include('config.php'); ?>
<?php

    if (isset($_POST['submit'])) {
        $user_id = mysqli_real_escape_string($conn, $_POST['id']);
        $fname1 = mysqli_real_escape_string($conn, $_POST['f_name']);
        $lname1 = mysqli_real_escape_string($conn, $_POST['l_name']);
        $user1 = mysqli_real_escape_string($conn, $_POST['username']);
        $role1 = mysqli_real_escape_string($conn, $_POST['role']);
 

        $sql2 = "UPDATE user SET first_name='$fname1', last_name='$lname1', username='$user1',  role='$role1' WHERE user_id='$user_id'";
        $query2 = mysqli_query($conn, $sql2);
        if ($query2) {
            echo"<p style='color:green;text-align:center;margin: 10px 0;'>successfully Updated</p>";
            header('location:users.php');
            
        }else{
            header('location:users.php');
            echo"<p style='color:red;text-align:center;margin: 10px 0;'>Filed to Update</p>";
        }
    }

?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="offset-4 col-md-4">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                  $sql = "SELECT *FROM user WHERE user_id='$id'";
                  $query = mysqli_query($conn, $sql);
                  $row =  mysqli_num_rows($query);
                  if ($row>0) {
                      $data = mysqli_fetch_assoc($query);
                  }
                  
                  ?>
                  <!-- Form Start -->
                  <form  action="" method ="POST">
                      <div class="mb-3">
                          <input type="hidden" name="id"  class="form-control" value="<?php echo $data['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="mb-3">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $data['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="mb-3">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $data['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="mb-3">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" placeholder="" required>
                      </div>
                      <div class="mb-3">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $data['role']; ?>">
                          <?php if($data['role'] == 1){
                                  echo "<option value='0'>normal User</option>
                              <option value='1' selected>Admin</option>";
                              }else{
                                  echo"<option value='0' selected>normal User</option>
                              <option value='1'>Admin</option>";
                              }
                              ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
