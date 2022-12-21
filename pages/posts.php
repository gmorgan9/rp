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
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="../assets/blog.css?v=3.92">

    <title>Posts - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
    
      <a href="<?php echo BASE_URL . '/search.php' ?>" class="text-decoration-none text-white">
        <i class="bi bi-search">&nbsp;&nbsp;&nbsp;&nbsp;</i>
      </a>
      <button class="btn talk-btn me-2">
        <a href="mailto:garrett.morgan.pro@gmail.com" class="text-decoration-none">
          LET'S TALK
        </a>
      </button> 
    </div>
  </div>
<!-- end header -->


<!-- start middle -->

    <nav class="mt-5" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
      <ol class="breadcrumb justify-content-center">
        <li class="text-center breadcrumb-item" style="font-size: 12px;"><a href="/" class="text-decoration-none text-uppercase" style="color: #03c6fc;">Home</a></li>
        <li class="breadcrumb-item active text-white text-uppercase" aria-current="page" style="font-size: 12px;">Posts</li>
      </ol>
    </nav>



<div class="middle">
  <h1 class="behind text-center mt-2">
    Posts
  </h1>
  <h1 class="front text-center">
    <strong>Posts</strong>
  </h1>
</div>

<!-- end middle -->


<br><br><br>

<!-- start blog posts -->

<!-- <div class="sub-title">
  <h1 class="behind-2 mt-5">
    Popular Posts
  </h1>
  <h1 class="front-2">
    <strong>Popular Posts</strong>
  </h1>
</div> -->
<br>
<div class="mx-auto pop-post row row-cols-1 row-cols-md-3 g-4">
  <?php
    $query ="SELECT * FROM posts WHERE status = 'published'";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
  ?>
  <?php foreach ($options as $option) { ?>
    <div class="col">
      <div class="card h-100" style="background-color: #1f1f1f;">
        <div class="card-body mb-4">
          <p class="card-subtitle mb-3 mt-4 text-uppercase fw-bold" style="font-size: 12px;color: #03c6fc;"><?php echo $option['category']; ?></p>
          <a href="single_post.php?id=<?php echo $option['post_id']; ?>" class="text-decoration-none text-white"><h5 class="card-title blog-title"><?php echo $option['title']; ?></h5></a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>




<!-- end blog posts -->

<!-- social links -->

<!-- Linkedin -->
<div class="social-links text-center" style="margin-top: 90px; padding-bottom: 30px;">
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


    
  </div>
</div>
</div>

    


    <script src="../assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>