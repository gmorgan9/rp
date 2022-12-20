<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";
session_start();

if(isLoggedIn() == false){
  header('location: '. BASE_URL . '/cu-login.php');
}

?>

<?php
if(isset($_POST['update'])){
  //$idno  = rand(10000, 99999);
  $profile_picture = mysqli_real_escape_string($conn, $_POST['profile_picture']);
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $about_me = mysqli_real_escape_string($conn, $_POST['about_me']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);


  date_default_timezone_set('America/Denver');
  $date = date('F d, Y, g:i a', time());

  $insert = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', username = '$username', about_me = '$about_me', gender = '$gender', profile_picture = '$profile_picture' WHERE idno = '".$_POST['idno']."'";
  mysqli_query($conn, $insert);
  header("location: profile.php");

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="../assets/styles.css?v=4.01">
    <link rel="stylesheet" href="../assets/sidebar.css?v=1.10">

    <script src="https://cdn.tiny.cloud/1/7kainuaawjddfzf3pj7t2fm3qdjgq5smjfjtsw3l4kqfd1h4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Add New User - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="margin:0;padding:0;box-sizing:border-box;">

<!-- main-container -->
  <div class="container-fluid">

    <div class="row">
      <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    </div>

    <div class="row">
      <div class="col" style="margin:0;padding:0;">
        <?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
      </div>
    </div>

    <div class="mt-5"></div>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-10" style="margin-left: -30px;">
        <h3 class="text-black">
          Dashboard
        </h3>
        <div class="mt-3"></div>


        <div class="row">
            <div class="col">
                <p>Create a brand new user and add them to this site.</p>
                <form action="" method="POST">
                    <input type="text" name="firstname">
                </form>
            </div>
        </div>

    
<div class="row">
      <div class="col-2"></div>
      <div class="col position-absolute bottom-0">
        <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
      </div>
    </div>

  </div>
<!-- END main-container -->


  
  

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

  <script>
    $('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});
  </script>
  
  <script src="../assets/js/dropdown.js"></script>
  <!-- <script src="../assets/js/main.js"></script> -->
  <script src="../assets/js/bar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>