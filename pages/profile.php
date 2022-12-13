<?php

require_once "../app/database/connection.php";
// require_once "app/database/functions.php";
require_once "../path.php";
session_start();

// if(isLoggedIn()){
//   header('location: '. BASE_URL . '/pages/dashboard.php');
// }

?>

<?php
// if(isset($_POST['update'])){
//   //$idno  = rand(10000, 99999);
//   $profile_picture = mysqli_real_escape_string($conn, $_POST['profile_picture']);


//   date_default_timezone_set('America/Denver');
//   $date = date('F d, Y, g:i a', time());

//   $insert = "UPDATE users SET profile_picture = '$profile_picture' WHERE idno = '".$_POST['idno']."'";
//   mysqli_query($conn, $insert);
//   header("location: profile.php");

// };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="../assets/styles.css?v=2.50">

    <script src="https://cdn.tiny.cloud/1/7kainuaawjddfzf3pj7t2fm3qdjgq5smjfjtsw3l4kqfd1h4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Profile - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
$user_id = $_SESSION['user_id'];
$select = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    $firstname        = $row['firstname'];
    $lastname         = $row['lastname'];
    $email            = $row['email'];
    $idno             = $row['idno'];
    $username         = $row['username'];
    $gender           = $row['gender'];
    $about_me         = $row['about_me'];
    $profile_picture  = $row['profile_picture'];
}}
?>
    
<div class="main-container">
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">
    <div class="page-header mx-auto">
        <p class="page_title">Profile</p>
    </div>

    <div class="main-content">

    <section>
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4" style="background-color: #1f1f1f;">
                <div class="card-body text-center">
                    <div class="" style="width: 500px;">
                        <?php echo html_entity_decode($profile_picture); ?>
                    </div>
                  
                  <h5 class="my-3"><?php echo $firstname; ?> <?php echo $lastname; ?></h5>
                  <p class="text-muted mb-1"><?php echo $idno; ?></p>
                  <!-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
                  <div class="d-flex justify-content-center mb-2">
                    <div class="btn btn-outline-secondary"># of Post</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4" style="background-color: #1f1f1f;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $firstname; ?> <?php echo $lastname; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $email; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Username</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php $username; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Gender</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $gender; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">About Me</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php $about_me; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>



    </div>  

    
</div>









<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
  $(document).on('click', 'a', function() {
    $(this).addClass('active').siblings().removeClass('active')
  })
  $(document).on('click', 'ul li a', function() {
    $(this).removeClass('active')
  })
</script>
    <script src="../assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>