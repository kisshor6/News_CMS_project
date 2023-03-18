<?php 
include('config.php');
session_start();
if (isset($_SESSION['username'])) {
    header('location: post.php');
}
?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome Icon -->
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

      $sql = "SELECT *FROM user WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if ($num > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              if (password_verify($password, $hash =  $row['password'])) {
                session_start();    
                  $_SESSION['user_id'] = $row['user_id'];
                  $_SESSION['username'] = $row['username'];
                  $_SESSION['user_role'] = $row['role'];
                  header('location: users.php');
              }else{
                  echo"<p style='color:red;text-align:center;margin: 10px 0;'>Invalid password and usernmae !</p>";
                }
            }
        }else{
            echo"<p style='color:red;text-align:center;margin: 10px 0;'>Invalid password and usernmae !</p>";
        }
    
    }
    
?>
