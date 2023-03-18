<?php include "header.php";
if ($_SESSION['user_role'] == 0) {
    $post_id = $_GET['id'];
    $sql4 = "SELECT author FROM post
    WHERE post.post_id={$post_id}";
    $query4 = mysqli_query($conn, $sql4);

    $row4 = mysqli_fetch_assoc($query4);
    if ($row4['author'] != $_SESSION['user_id']) {
        header('location:post.php');
    }
}
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="offset-3 col-md-6">

    <?php  
    include('config.php');
    $post_id = $_GET['id'];
    $sql = "SELECT *FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id
    WHERE post.post_id={$post_id}";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query)>0) {
        while ($row = mysqli_fetch_assoc($query)) {
    
    ?>

        <!-- Form for show edit-->
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="mb-3">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id']; ?>" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
            </div>
            <div class="mb-3">
                <label for="postdesc"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                  <?php echo $row['description']; ?>
                </textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputCategory">Category</label>
                    <select name="category" class="form-control">
                        <option disabled> Select Category</option>
                        <?php
                        include('config.php');
                        $sql1 = "SELECT *FROM category";
                        $query1 = mysqli_query($conn, $sql1);
                        $numRows1 = mysqli_num_rows($query1);
                        if ($numRows1>0) {
                            while ($row1 = mysqli_fetch_assoc($query1)) {
                                if ($row['category'] == $row1['category_id']) {
                                    $selected = "selected";
                                }else{
                                    $selected = "";
                                }

                                echo"<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                            }
                        }
                        ?>

                    </select>
                    <input type="hidden"name="old_category" value="<?php echo $row['category']; ?>">
            </div>
            <div class="mb-3">
                <label for="">Update image</label>
                <input type="file" class="form-control" name="new-image">
                <img  src="upload/<?php echo $row['post_img']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['post_img']; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
        <?php
        }
    }else{
        echo"result not found";
    }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
