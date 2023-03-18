<?php
    include('config.php');

    $post_id = $_GET['id'];
    $cat_id = $_GET['catid'];

    $sql1 = "SELECT *FROM post WHERE post_id='$post_id';";
    $query1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($query1);


    unlink("upload/".$row1['post_img']);
    $sql = "DELETE FROM post WHERE post_id='$post_id';";
    $sql .= "UPDATE category SET post=post-1 WHERE category_id={$cat_id}";
    $query = mysqli_multi_query($conn, $sql);
    if ($query) {
        header('location:http://localhost/report/admin/post.php');
    }else{
        echo"<p style='color:red;text-align:center;margin: 10px 0;'>Can't delete this post</p>";
    }
?>