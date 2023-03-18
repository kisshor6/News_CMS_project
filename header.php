<?php 
include('config.php');
$page =  basename($_SERVER['PHP_SELF']);
switch ($page) {
    case 'single.php':
        if (isset($_GET['id'])) {
            $sql_title = "SELECT *FROM post WHERE post_id={$_GET['id']}";
            $query_result = mysqli_query($conn, $sql_title);
            $row_title = mysqli_fetch_assoc($query_result);
            $page_title = $row_title['title'];
        }else{
            $page_title = "Page not found";
        }
        break;
    
    case 'category.php':
            if (isset($_GET['catid'])) {
            $sql_title = "SELECT *FROM category WHERE category_id={$_GET['catid']}";
            $query_result = mysqli_query($conn, $sql_title);
            $row_title = mysqli_fetch_assoc($query_result);
            $page_title = $row_title['category_name']."News";
        }else{
            $page_title = "Page not found";
        }  
        break;
    
    case 'author.php':
            if (isset($_GET['aid'])) {
            $sql_title = "SELECT *FROM user WHERE user_id={$_GET['aid']}";
            $query_result = mysqli_query($conn, $sql_title);
            $row_title = mysqli_fetch_assoc($query_result);
            $page_title = "News By ". $row_title['first_name'] ." ".$row_title['last_name'];
        }else{
            $page_title = "Page not found";
        }  
        break;
    
    case 'search.php':
            if (isset($_GET['search'])) {
            $page_title = $_GET['search'];
        }else{
            $page_title = "Page not found";
        }  
        break;
    default:
        $page_title = "News Site";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>
    <!-- Bootstrap -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['catid'])) {
                    $cat_id1 = $_GET['catid'];
                }
                $sql = "SELECT *FROM category WHERE post > 0";
                $active1 = "";
                
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {  
                ?>
                <ul class='menu'>
                    <li><a href='index.php'>Home</a></li>
                <?php while ($row = mysqli_fetch_assoc($query)) {

                    if (isset($_GET['catid'])) {
                        if ($row['category_id'] === $cat_id1) {
                        $active1 = "active";
                        }else{
                            $active1 = "";
                        }
                    }

                    echo"<li><a class='{$active1}' href='category.php?catid={$row['category_id']}'>{$row['category_name']}</a></li>";
                 } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
