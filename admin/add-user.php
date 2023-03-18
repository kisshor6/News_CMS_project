<?php include "header.php";
if ($_SESSION['user_role'] == '0') {
  header('location:post.php');
}

include('config.php');

    if (isset($_POST['submit'])) {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        
        $sql = "SELECT username FROM user WHERE username='$user'";
        $query = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($query);
        if ($numRows>0) {
            echo"<p style='color:red;text-align:center;margin: 10px 0;'>This user-email is already taken !</p>";
        }else{
            if ($password === $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql3 = "INSERT INTO user SET first_name='$fname', last_name='$lname', username='$user', password='$hash', role='$role'";
            $query = mysqli_query($conn, $sql3);
            if ($query) {
                header("location:users.php");
                echo"<p style='color:green;text-align:center;margin: 10px 0;'>successfully inserted</p>";
                
                }
            }else{
            echo"<p style='color:red;text-align:center;margin: 10px 0;'>Password does not matched !</p>";
            
            }
        }
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="mb-3">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="mb-3">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="mb-3">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="mb-3">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="mb-3">
                          <label>Conform Password</label>
                          <input type="password" name="cpassword" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="mb-3">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="submit" class="btn btn-primary" value="Submit" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
