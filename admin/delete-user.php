<?php
    include('config.php');
    if ($_SESSION['user_role'] == '0') {
        header('location:post.php');
    }

    $user_id = $_GET['id'];
    $sql = "DELETE FROM user WHERE user_id='$user_id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header('location:http://localhost/report/admin/users.php');
    }else{
        echo"<p style='color:red;text-align:center;margin: 10px 0;'>Can't delete the record of this row</p>";
    }
?>