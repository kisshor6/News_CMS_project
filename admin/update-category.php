<?php include "header.php";
    include('config.php');
    if ($_SESSION['user_role'] == '0') {
        header('location:post.php');
    }
    if (isset($_POST['submit'])) {
    $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);

    $sql2 = "SELECT category_name FROM category WHERE category_name='$cat_name'";
    $query2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($query2) > 0) {
        echo "<p style = 'color:red;text-align:center;margin: 10px 0';> Category Name '".$cat_name."' already exists.</p>";
    }else{
        $sql1 = "UPDATE category SET category_id='$cat_id', category_name='$cat_name' WHERE category_id='$cat_id'";
        if (mysqli_query($conn, $sql1)) {
            header('location: category.php');
        }
    }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="offset-3 col-md-6">
                <?php
                include 'config.php';
                $cat_id = $_GET['id'];
                /* query record for modify*/
                $sql = "SELECT * FROM category WHERE category_id ='{$cat_id}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <!-- Form Start -->
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                        <div class="mb-3">
                            <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>">
                        </div>
                        <div class="mb-3">
                            <label>category Name</label>
                            <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                    </form>
                    <!-- Form End-->
                    <?php
                    }
                }
                ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
