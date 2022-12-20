<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";
session_start();

if(isLoggedIn() == false){
  header('location: '. BASE_URL . '/cu-login.php');
}

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
    <style>
        .login_error {
                border-left: 4px solid #72aee6;
                width: 50%;
                padding: 12px;
                margin-left: 0;
                margin-bottom: 20px;
                background-color: #fff;
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                word-wrap:break-word
            }
            /* .login .success {
                border-left-color:#00a32a
            } */
            .login_error {
                border-left-color:#d63638
            }
    </style>
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
          Add New User
        </h3>
        <div class="mt-3"></div>

        <!-- FUNCTION -->
            <?php
            if(isset($_POST['create'])){
              $idno  = rand(10000, 99999); // figure how to not allow duplicates
              $username = mysqli_real_escape_string($conn, $_POST['username']);
              $email = mysqli_real_escape_string($conn, $_POST['email']);
              $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
              $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
              $password = md5($_POST['password']);
              $isadmin = mysqli_real_escape_string($conn, $_POST['isadmin']);
              
            
              $select = " SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            
              $result = mysqli_query($conn, $select);
            
              if(mysqli_num_rows($result) > 0){
            
                $error = '
                <div class="login_error">
                <strong>Error:</strong> 
                The email or username entered is already registered on this site. Please try again.
                </div>
                ';
            
              }else {
                    $insert = "INSERT INTO users (idno, firstname, lastname, username, email, password, isadmin) VALUES('$idno', '$firstname','$lastname','$username','$email','$password', '$isadmin')";
                    mysqli_query($conn, $insert);
                    header('location: '. BASE_URL . '/cu-admin/all_users.php');
                 }
             
            };

            ?>
        <!-- end FUNCTION -->

        <!-- create new user -->
            <div class="row">
                <div class="col">
                    <p>Create a brand new user and add them to this site.</p>
                    <?php echo $error; ?>
                    <form action="" method="POST">
                        <div class="mb-4 row">
                            <label for="username" class="col-sm-1 col-form-label"><div class="d-flex">Username&nbsp;<span style="color: red;">*</span></div></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control w-50" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="email" class="col-sm-1 col-form-label"><div class="d-flex">Email&nbsp;<span style="color: red;">*</span></div></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control w-50" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="firstname" class="col-sm-1 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control w-50" id="firstname" name="firstname">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="lastname" class="col-sm-1 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control w-50" id="lastname" name="lastname">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="password" class="col-sm-1 col-form-label"><div class="d-flex">Password&nbsp;<span style="color: red;">*</span></div></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control w-50" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="role" class="col-sm-1 col-form-label"><div class="d-flex">Role&nbsp;<span style="color: red;">*</span></div></label>
                            <div class="col-sm-10">
                                <select class="form-control w-25" name="isadmin" id="role" required>
                                    <option value="">Select one...</option>
                                    <option value="1">Administrator</option>
                                    <option value="0">Standard</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="create" class="btn btn-outline-secondary">Add New User</button>
                    </form>
                </div>
            </div>
        <!-- end create new user -->

    
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