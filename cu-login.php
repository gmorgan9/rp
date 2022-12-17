<?php

require_once "app/database/connection.php";
require_once "app/database/functions.php";
require_once "path.php";
session_start();

// if(isLoggedIn()){
//   header('location: '. BASE_URL . '/pages/dashboard.php');
// }

?>
<?php

if(isset($_POST['login'])){
// $idno  = rand(1000000, 9999999); // figure how to not allow duplicates
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);
$isadmin = $_POST['isadmin'];
$loggedin = $_POST['loggedin'];

$select = " SELECT * FROM users WHERE username = '$username' && password = '$password' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

   $row = mysqli_fetch_array($result);
   $sql = "UPDATE users SET loggedin='1' WHERE username='$username'";
   if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
    $_SESSION['firstname']         = $row['firstname'];
    $_SESSION['user_id']          = $row['user_id'];
    $_SESSION['loggedin']         = $row['loggedin'];
    $_SESSION['user_idno']        = $row['idno'];
    $_SESSION['lastname']         = $row['lastname'];
    $_SESSION['username']         = $row['username'];
    $_SESSION['email']            = $row['email'];
    $_SESSION['pass']             = $row['password'];
    $_SESSION['cpass']            = $row['cpassword'];
    header('location:' . BASE_URL . '/cu-admin/');
  
}else{
   $error[] = 'incorrect email or password!';
}

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <title>Log In &lsaquo; CacheUp</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- custom styles -->
        <style>
            body {
                background-color: #f0f0f0;
            }
            .login-form {
                padding: 80px 0px;
                width: 320px;
                margin: auto;
            }
            .form {
                border: 1px solid #cfd4d9;
                border-radius: 5px;
                margin-top: 20px;
                padding: 26px 24px 34px;
                background-color: white;
            }
            .btn {
                background-color: #325A73 !important;
                border: none !important;
            }
            .link:hover {
                color: #325A73 !important;
            }
        </style>
    <!-- end custom styles -->
</head>
<body>

    <div class="login-form">
        <h1 class="logo text-center">
            <img src="assets/images/sm-logo-border.png" width="84px" height="84px" alt="">
        </h1>
        <form class="form" action="" method="POST">
            <div class="username">
                <label for="user_login">Username</label>
                <input type="text" id="user_login" name="username" class="form-control" autocapitalize="off">
            </div>
            <br>
            <div class="password">
                <label for="user_pass">Password</label>
                <input type="password" id="user_pass" name="password" class="form-control" autocapitalize="off">
            </div>
            <br>
            <div class="button text-end">
                <input type="submit" name="login" class="btn btn-primary" value="Log In">
            </div>
        </form>
        <br>
        <div class="bottom-links ms-4">
            <p><a class="link text-muted" style="text-decoration:none; font-size: 12px;" href="">Forgot password?</a></p>
            <p><a class="link text-muted" style="text-decoration:none; font-size: 12px;" href="https://cacheup.morganserver.com/">← Go to CacheUp</a></p>
        </div>
    </div>
    
</body>
</html>