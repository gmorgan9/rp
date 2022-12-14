<?php

require_once "app/database/connection.php";
// require_once "app/database/functions.php";
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
    $_SESSION['firsname']         = $row['firstname'];
    $_SESSION['user_id']          = $row['user_id'];
    $_SESSION['loggedin']         = $row['loggedin'];
    $_SESSION['user_idno']        = $row['idno'];
    $_SESSION['lastname']         = $row['lastname'];
    $_SESSION['username']         = $row['username'];
    $_SESSION['email']            = $row['email'];
    $_SESSION['pass']             = $row['password'];
    $_SESSION['cpass']            = $row['cpassword'];
    header('location:' . BASE_URL . '/pages/dashboard.php');
  
}else{
   $error[] = 'incorrect email or password!';
}

};
?>

<?php
if(isset($_POST['register'])){
  $idno  = rand(10000, 99999); // figure how to not allow duplicates
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  $isadmin = $_POST['isadmin'];

  $select = " SELECT * FROM users WHERE username = '$username' && email = '$email' ";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){

     $error[] = 'user already exist!';

  }else{

     if($password != $cpassword){
        $error[] = 'passwords do not match!';
     }else{
        $insert = "INSERT INTO users (idno, firstname, lastname, username, email, password) VALUES('$idno', '$firstname','$lastname','$username','$email','$password')";
        mysqli_query($conn, $insert);
        // header('location:/');
     }
  }
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


    <link rel="stylesheet" href="assets/blog.css?v=3.76">

    <title>CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
      pre {
        color: white;
        padding: 10px;
        border-radius: 15px;
        background-color: #4f4f4f;
      }
    </style>
</head>
<body>
<?php
$user_id = $_SESSION['user_id'];
$select = " SELECT * FROM users WHERE user_id = '$user_id' ";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    $firstname    = $row['firstname'];
    $loggedin     = $row['loggedin'];
    $acct_type    = $row['isadmin'];
}}
?>
    
<div class="main-container">
        
<div class="main">

<!-- start header -->
  <div class="page-header">
    <div class="left">
      <a href="/">
        <img src="/assets/images/white-logo.png" width="230px" class="text-center" style="margin-top: 2.5%; margin-left: 2%;" alt="">
      </a>
    </div>
    <div class="right">
    
      <a href="" class="text-decoration-none text-white">
        <i class="bi bi-search">&nbsp;&nbsp;&nbsp;&nbsp;</i>
      </a>
      <button class="btn talk-btn">
        <a href="" class="text-decoration-none">
          LET'S TALK
        </a>
      </button>
        <a class="text-decoration-none text-white" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
          &nbsp;&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg>
          <div class="mt-1"></div>
          </a>
          
          <div class="dropdown-menu p-4" >

<?php 

if ($loggedin == 1) {

?>

<ul class="list-group list-group-flush" style="width: 250px;">
  <li class="list-group-item fw-bold text-capitalize mb-3" style="font-size: 18px; border-bottom: none;"><?php echo $firstname; ?>
  <?php if($acct_type == 1) { ?>
     <i class="fw-normal text-lowercase" style="font-size: 10px;">(admin)</i>
    <?php } else { ?>
      <i class="fw-normal text-lowercase" style="font-size: 10px;">(standard)</i>
    <?php } ?>

</li>
  <li class="list-group-item w-75"><a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>" class="text-decoration-none text-black">Dashboard</a></li>
  <li class="list-group-item"><a href="<?php echo BASE_URL . '/logout.php' ?>" class="text-decoration-none text-black">Logout</a></li>
</ul>


<?php

} else {

  ?>
            <!-- TABS -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center mx-auto">
                  <a class="btn btn-outline-black active" style="width: 150px;" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                </li>
                &nbsp;&nbsp;
                <li class="nav-item text-center mx-auto">
                  <a class="btn btn-outline-black" style="width: 150px;" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
                </li>
               
              </ul>
              <!-- LOGIN -->
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <form action="" method="post" class="form px-4">
                    <input class="form-control" type="text" name="username" required placeholder="enter your user name"><br>
                    <input class="form-control" type="password" name="password" required placeholder="enter your password"><br>
                    <input type="submit" name="login" value="Login" class="btn btn-dark btn-block">
                  </form>
                </div>

                <!-- REGISTER -->
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <form action="" method="post" class="form px-4">
                    <input class="form-control" type="text" name="firstname" required placeholder="enter your first name"><br>
                    <input class="form-control" type="text" name="lastname" required placeholder="enter your last name"><br>
                    <input class="form-control" type="text" name="username" required placeholder="enter your user name"><br>
                    <input class="form-control" type="email" name="email" required placeholder="enter your email"><br>
                    <input class="form-control" type="password" name="password" required placeholder="enter your password"><br>
                    <input class="form-control" type="password" name="cpassword" required placeholder="confirm your password"><br>
                    <input type="submit" name="register" value="Register" class="btn btn-dark btn-block">
                  </form>
                </div>
<?php } ?>

              </div>





            <!--  -->
</div> 




      <a href="" class="text-decoration-none text-white">
        
      </a>
    </div>
  </div>
<!-- end header -->


<!-- start blog posts -->

<?php
$id = $_GET['id'];
$select = "SELECT * FROM posts WHERE post_id = '$id' ";
$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {

?>

<div class="blog_post mt-5 ms-5 p-5" style="width: 65%; background-color: #1f1f1f;">

    <nav class="mb-5" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>'; breadcrumb-divider-color: white;">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" style="font-size: 12px;"><a href="/" class="text-decoration-none text-uppercase" style="color: #03c6fc !important;">Home</a></li>
        <li class="breadcrumb-item" style="font-size: 12px;"><a href="#" class="text-decoration-none text-uppercase" style="color: #03c6fc !important;"><?php echo $row['category']; ?></a></li>
        <li class="breadcrumb-item active text-white text-uppercase" aria-current="page" style="font-size: 12px;"><?php echo $row['title']; ?></li>
      </ol>
    </nav>


    <h1 class="fw-bold">
        <?php echo $row['title']; ?>
    </h1>


    <?php
$idno = $row['author_idno'];
$profile = "SELECT * FROM users WHERE idno = '$idno'";
$another = mysqli_query($conn, $profile);
if (mysqli_num_rows($another) > 0) {
   while($col = mysqli_fetch_assoc($another)) {
    $profile_picture  = $col['profile_picture'];
    $author           = $col['username'];
    $idno             = $col['idno'];
}}
?>

    <nav class="mt-4" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li style="margin-top: -4.5px;"><img style="border: 1px solid #969696; border-radius: 100%;" src="<?php echo $profile_picture; ?>" width="20px" height="20px" alt=""></li>&nbsp;&nbsp;
        <li class="breadcrumb-item" style="font-size: 12px;"><a href="#" class="text-decoration-none text-uppercase text-white"><?php echo $row['author']; ?></a></li>
        <li class="breadcrumb-item" style="font-size: 12px;"><a href="#" class="text-decoration-none text-uppercase text-white"><?php echo $row['published_at']; ?></a></li>
        <li class="breadcrumb-item active text-white text-uppercase" aria-current="page" style="font-size: 12px;"><?php echo $row['category']; ?></li>
      </ol>
    </nav>


    <p class="preview-text">
        <?php echo html_entity_decode($row['content']); ?>
    </p>


<!-- TAGS -->
    <div class="tags">
    <?php
    $id = $_GET['id'];
    $grab = "SELECT * FROM posts WHERE post_id = '$id' ";
    $comma = mysqli_query($conn, $grab);

    while($rows = mysqli_fetch_assoc($comma)) {
       $mark = explode(',', $rows['tags']);//what will do here
       foreach($mark as $out) {
          echo "<div class='btn btn-outline-secondary'>"; 
          echo "# " . $out;
          echo "</div> &nbsp;";
       }
    }

    ?>
    </div>
<!-- END TAGS -->

<!-- social links -->
  <br>
  <!-- Linkedin -->
  <div class="social-links">
    <a class="btn btn-primary" style="background-color: #0082ca; border:none !important;" href="#!" role="button"
      ><i class="bi bi-linkedin"></i>
    </a>
    &nbsp; &nbsp; &nbsp;
    <!-- Email -->
    <a class="btn btn-primary" style="background-color: #333333; border:none !important;" href="#!" role="button">
      <i class="bi bi-envelope-fill"></i>
    </a>
    &nbsp; &nbsp; &nbsp;
    <!-- Facebook -->
    <a class="btn btn-primary" style="background-color: #3b5998; border:none !important;" href="#!" role="button">
      <i class="bi bi-facebook"></i>
    </a>
  </div>

<!-- end social links -->


<!-- Author Box -->
  <br><br>
  <div class="top-hr d-flex">
  &nbsp;&nbsp;<hr style="width:45%;"> &nbsp;&nbsp; <img style="border: 1px solid #969696; border-radius: 100%; margin-top: -10px;" src="<?php echo $profile_picture; ?>" width="60px" height="60px" alt=""> &nbsp;&nbsp; <hr style="width:45%;">&nbsp;&nbsp;
  </div>

  <br>

  <h4 class="text-center"><?php echo $author; ?></h4>
  <a
  class=""
  style="background-color: #ac2bac; "
  href="#!"
  role="button"
  ><i class="bi bi-instagram"></i
  ></a>
  <p class="text-center">

  <?php
  $sql="SELECT count('1') FROM posts WHERE author_idno = '$idno' AND status = 'published'";
  $result=mysqli_query($conn,$sql);
  $rowtotal=mysqli_fetch_array($result); 
  echo "Posts: $rowtotal[0]";
  ?>

  </p>
  

  <br>
  <div class="top-hr d-flex">
  &nbsp;&nbsp;<hr style="width:98%;">&nbsp;&nbsp;
  </div>


<!-- END Author Box -->

</div>

<?php }} ?>

<br><br>


<!-- end blog posts -->



    
  </div>
</div>
</div>

    


    <script src="assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>