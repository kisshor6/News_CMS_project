<?php include "header.php";
if ($_SESSION['user_role'] == '0') {
  header('location:post.php');
}

include('config.php');

    if (isset($_POST['submit'])) {

        if (isset($_FILES['fileToUpload'])) {
            $errors = array();

            $file_name = $_FILES['fileToUpload']['name'];
            $file_size = $_FILES['fileToUpload']['size'];
            $file_tmp = $_FILES['fileToUpload']['tmp_name'];
            $file_type = $_FILES['fileToUpload']['type'];
            $file_ext = strtolower(end(explode('.',$file_name)));
            $extensions = array("jpeg","jpg","png");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "This extension file is not alowed, Please choose a jpeg, jpg or png file";
            }
            if ($file_size > 2097152) {
                $errors[] = "File must be less than 2 mb";
            }
            $new_name = time(). "-". basename($file_name);
            $target = "upload/".  $new_name;
            $image_name = $new_name;
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $target);
            }else{
                print_r($errors);
                die();
            }

        }


        $title = mysqli_real_escape_string($conn, $_POST['post_title']);
        $description = mysqli_real_escape_string($conn, $_POST['postdesc']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $date = date("d M, Y");
        $author = $_SESSION['user_id'];

        
        $sql = "INSERT INTO post SET title='$title', description='$description', category='$category', post_date='$date', author='$author', post_img='$image_name';";

        $sql .= "UPDATE category SET post = post + 1 WHERE category_id='$category'";
        $query = mysqli_multi_query($conn, $sql);
        if ($query) {
            header('location: post.php');

        }else{
        echo"<div class='alert alert-danger'> Some internal error!</div>";

        }
    }     
?>