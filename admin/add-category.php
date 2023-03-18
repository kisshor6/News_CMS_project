<?php include "header.php";
    if ($_SESSION['user_role'] == '0') {
        header('location:post.php');
    }

    if (isset($_POST['submit'])) {
        $cat = mysqli_real_escape_string($conn, $_POST['cat']);
        
        $sql = "SELECT category_name FROM category WHERE category_name='$cat'";
        $query = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($query);
        
        if ($numRows>0) {
            echo"<p style='color:red;text-align:center;margin: 10px 0;'>This Category is already Available !</p>";
        }else{
            $sql3 = "INSERT INTO category SET category_name='$cat', post='0'";
            $query = mysqli_query($conn, $sql3);
            if ($query) {
                echo"<p style='color:green;text-align:center;margin: 10px 0;'>successfully inserted</p>";
            }else{
                die();
            } 
        }
    }
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="offset-md-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                      <div class="mb-3">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
