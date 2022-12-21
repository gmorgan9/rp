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

    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL . '/assets/images/favicon.ico'; ?>">


    <link rel="stylesheet" href="assets/blog.css?v=3.92">

    <title>CacheUp Blog</title>

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
    
      <a href="search.php" class="text-decoration-none text-white">
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

  <div class="middle">
    <h1 class="behind text-center mt-5">
      Search
    </h1>
    <h1 class="front text-center">
      <strong>Search</strong>
    </h1>
  </div>

<!-- end middle -->



<!-- start search -->

    <?php
    if(isset($_POST['search'])){
        $param = mysqli_real_escape_string($conn, $_POST['param']);

        $select = " SELECT * FROM posts WHERE title LIKE '%$param%'";

    };
        $results = mysqli_query($conn, $select);
        if (mysqli_num_rows($results) > 0) {
            while($row = mysqli_fetch_assoc($results)) {
                $new = $row['title'];


            
    

    //     $username = mysql_real_escape_string($_POST['param']);
    //     $result = mysql_query("SELECT * FROM users WHERE username = ' $username '");
    //     print_r($result);
    // };
    ?>

    <form action="" method="post">
        <input type="text" name="param" class="form-control w-25">
        <button type="submit" name="search" class="btn btn-primary">Submit</button>
    </form>


<p>
    <?php echo $new; ?>
</p>
<?php }} ?>

<!-- end search -->



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

    


    <script src="assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>