<?php

require_once "../../app/database/connection.php";
// require_once "app/database/functions.php";
require_once "../../path.php";
session_start();

// if(isLoggedIn()){
//   header('location: '. BASE_URL . '/pages/dashboard.php');
// }

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
  header("location: ../profile.php");

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


    <link rel="stylesheet" href="../../assets/styles.css?v=2.50">

    <script src="https://cdn.tiny.cloud/1/7kainuaawjddfzf3pj7t2fm3qdjgq5smjfjtsw3l4kqfd1h4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Profile - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
// $user_id = $_SESSION['user_id'];
// $select = "SELECT * FROM users WHERE user_id = $user_id";
// $result = mysqli_query($conn, $select);
// if (mysqli_num_rows($result) > 0) {
//    while($row = mysqli_fetch_assoc($result)) {
//     $firstname    = $row['firstname'];
//     $lastname     = $row['lastname'];
// }}
// $select = "SELECT * FROM categories";
// $result = mysqli_query($conn, $select);
// if (mysqli_num_rows($result) > 0) {
//    while($row = mysqli_fetch_assoc($result)) {
//     $cat_id    = $row['cat_id'];
//     $category  = $row['category'];
// }}
?>
    
<div class="main-container">
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">
    <div class="page-header mx-auto">
        <p class="page_title">Profile</p>
    </div>

    <div class="main-content">
    
    <?php
$id = $_GET['id'];
$select = "SELECT * FROM users WHERE user_id = '$id' ";
$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {

?>


    <form action="" method="POST">
        <h3>
            New Post
        </h3>
        <div class="modal_help float-end" style="margin-right: 25px; margin-top: -55px !important;">

          <!-- Button trigger modal -->
            <button type="button" style="background: none; color: inherit; border: none; cursor: pointer; outline: inherit;" class="badge text-bg-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Instructions
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Instructions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-black">
                    <ul>
                      <li>For all profile picture, please have a link for your image ready. A useful site to help you get a link for images would be: <a href="https://postimages.org" target="_blank">https://postimages.org</a>.</li>
                    </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary text-black">Save changes</button> -->
                  </div>
                </div>
              </div>
            </div>




        </div>
        <div class="d-flex">
            <div>
                <label>First Name</label>
                <input class="form-control" type="hidden" name="idno" value="<?php echo $row['idno']; ?>">
                <input class="form-control" style="width: 95%;" type="text" name="firstname" value="<?php echo $row['firstname']; ?>">
            </div>
            <div>
                <label>Last Name</label>
                <input class="form-control" style="width: 95%;" type="text" name="lastname" value="<?php echo $row['lastname']; ?>">
            </div>
        </div>
        <div class="pt-3"></div>
        <div>
          <label>Email</label>
          <input class="form-control" style="width: 75%;" type="text" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <div class="pt-3"></div>
        <div class="d-flex">
          <div>
            <label>Username</label>
            <input class="form-control" style="width: 95%;" type="text" name="username" value="<?php echo $row['username']; ?>">
          </div>
          <div class="pt-3"></div>
          <div>
              <label>Gender</label>
              <select style="width: 100%;" name="gender" class="form-control">
                  <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
              </select>
          </div>
        </div>
        <div class="pt-3"></div>
        <div>
          <label>Profile Picture</label>
          <input class="form-control" style="width: 75%;" type="text" name="profile_picture" value="<?php echo $row['profile_picture']; ?>">
        </div>
        <div class="pt-3"></div>
        <div>
          <label>About Me</label>
          <textarea class="form-control" style="width: 75%;" type="text" name="about_me"><?php echo $row['about_me']; ?></textarea>
        </div>
        
        
        <br>
        <input type="submit" name="update" value="Update" class="btn btn-light btn-block"> &nbsp;
        <button class="btn btn-dark btn-block" onclick="window.history.go(-1); return false;">Go Back</button>
    </form>
   
    </div>


    <?php }} ?>



    
    
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
    <script src="../../assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>