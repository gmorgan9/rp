<?php

require_once "app/database/connection.php";
require_once "path.php";
session_start();

?>


<!-- Login Script -->
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
<!-- END Login Script -->

<!-- Register Script -->
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
<!-- END Register Script -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
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
      form-control:focus {
        border-color: #58c5f7 !important;
      }
      .btn:hover {
        border-color: #47a0c9 !important;
        background-color: #47a0c9 !important;
      }
      .reply:hover {
        background-color: #58c5f7 !important;
        color: white !important;
        cursor: pointer;
        border-radius: 5px;
        height: 20px;
        padding: 0px 5px;
        font-size: 12px;
      }
      .reply {
        cursor: pointer;
        height: 20px;
        padding: 0px 5px;
        font-size: 12px;
        text-decoration: none;
      }
      .website-btn:hover {
        border-color: #47a0c9 !important;
        background-color: #47a0c9 !important;
      }
      .post-link:hover {
        color: #47a0c9 !important;
      }
      pre {
        color: white;
        padding: 10px;
        border-radius: 15px;
        background-color: #4f4f4f;
      }
      #myBtn {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 20px; /* Place the button at the bottom of the page */
        right: 30px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        border: none; /* Remove borders */
        outline: none; /* Remove outline */
        background-color: #58c5f7 !important; /* Set a background color */
        color: white; /* Text color */
        cursor: pointer; /* Add a mouse pointer on hover */
        padding: 7px 10px; /* Some padding */
        border-radius: 25px; /* Rounded corners */
        font-size: 14px; /* Increase font size */
      }

      #myBtn:hover {
        background-color: #47a0c9 !important; /* Add a dark-grey background on hover */
      }

      p img {
        width: 100%;
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
      <button class="btn talk-btn me-2">
        <a href="mailto:garrett.morgan.pro@gmail.com" class="text-decoration-none">
          LET'S TALK
        </a>
      </button> 
    </div>
  </div>
<!-- end header -->

<div class="row">
  <div class="col" style="width: 65%;">
<!-- start blog posts -->
  <!-- start BLOG -->
    <?php
    $id = $_GET['id'];
    $select = "SELECT * FROM posts WHERE post_id = '$id' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
        $post_idno = $row['idno'];
        $title     = $row['title'];
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
  <!-- END BLOG -->

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
    <div class="pt-3"></div>

    <div class="text-center">
    <a
    class="website-btn"
    style="background-color: #03c6fc; color: white; padding: 7px 10px; border-radius: 75px; margin-top: 10px;"
    href="https://resume.morganserver.com/"
    target="_blank"
    ><i class="bi bi-globe"></i
    ></a>
    </div>
    <p class="text-center text-uppercase" style="font-size: 12px; margin-top: 20px;">
    <a class="post-link" style="text-decoration: none; color: #58c5f7;" href="!#">
    <?php
    $sql="SELECT count('1') FROM posts WHERE author_idno = '$idno' AND status = 'published'";
    $result=mysqli_query($conn,$sql);
    $rowtotal=mysqli_fetch_array($result); 
    echo "Posts: $rowtotal[0]";
    ?>
    </a>
    </p>
    

    <br>
    <div class="top-hr d-flex">
    &nbsp;&nbsp;<hr style="width:98%;">&nbsp;&nbsp;
    </div>


  <!-- END Author Box -->

  <!-- Comments -->

    <?php
    if(isset($_POST['post'])){
      $idno  = rand(10000, 99999); // figure how to not allow duplicates
      $post_idno = mysqli_real_escape_string($conn, $_POST['post_idno']);
      $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
      $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
      $parent_idno = mysqli_real_escape_string($conn, $_POST['parent_idno']);
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $content = mysqli_real_escape_string($conn, $_POST['content']);

      $insert = "INSERT INTO `comments`(`idno`, `post_idno`, `post_id`, `post_title`, `name`, `email`, `content`) VALUES ('$idno','$post_idno','$post_id', '$post_title', '$name','$email','$content');";
      mysqli_query($conn, $insert);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    };

    ?>

    <form action="" method="POST">
    <h4>Leave a Comment</h4>
    <input type="hidden" name="post_idno" value="<?php echo $post_idno; ?>" class="text-muted form-control">
    <input type="hidden" name="post_title" value="<?php echo $title; ?>">
    <input type="hidden" name="post_id" value="<?php echo $id; ?>" class="text-muted form-control">
    <p class="text-muted" style="font-size: 12px;">Your email address will not be published. Required fields are marked <span style="color: red;">*</span></p>
    <div class="d-flex">
      <div class="form-group w-50">
        <label for="name">Full Name <span style="color: red;">*</span></label>
        <input style="background-color: #1f1f1f !important; border-color: #6e757c !important;" name="name" type="text" id="name" class="text-muted form-control">
      </div> &nbsp;&nbsp;
      <div class="form-group w-50">
        <label for="email">Email <span style="color: red;">*</span></label>
        <input style="background-color: #1f1f1f !important; border-color: #6e757c !important;" type="text" name="email" id="email" class="text-muted form-control">
      </div>
    </div>
    <br>
    <div class="form-group">
      <label for="comment">Comment <span style="color: red;">*</span></label>
      <textarea style="background-color: #1f1f1f !important; border-color: #6e757c !important;" class="text-muted form-control" name="content" id="comment" cols="30" rows="10"></textarea>
    </div>
    <br>
    <!-- <button style="background-color: #58c5f7; color: white; border-color: #58c5f7;" name="post" type="submit" class="com-btn btn btn-outline-secondary">Post Comment</button> -->
    <input type="submit" name="post" value="Post Comment" style="background-color: #58c5f7; color: white; border-color: #58c5f7;" class="com-btn btn btn-outline-secondary">

    </form>
  <!-- End Comments -->

  <!-- Display Comments -->
    <br>
    <hr>
    <br>
    <h4>
      <?php
      $sql="SELECT count('1') FROM comments WHERE post_idno = '$post_idno' AND status = '1'";
      $result=mysqli_query($conn,$sql);
      $rowtotal=mysqli_fetch_array($result);
      if($rowtotal[0] == 1) {
        echo "$rowtotal[0] Comment";
      } else {
        echo "$rowtotal[0] Comments";
      }
      ?>
    </h4>
    <br>
    <hr>
    <?php
      $query ="SELECT * FROM comments WHERE post_idno = '$post_idno' AND status = '1'";
      $result = $conn->query($query);
      if($result->num_rows> 0){
        $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
      }

      $date = date('d-m-Y', strtotime($submit_date));

    ?>
    
    <?php foreach ($options as $option) { 
      ?>
      
      <br>

      <div class="container ms-3">
        <div class="row">
          <div class="col-9">
            <h5><?php echo $option['name']; ?></h5>
          </div>
          <div class="col" style="">
            <p class="text-muted" style="font-size: 12px;"><?php echo date('F j, Y / g:i a', strtotime($option['submit_date'])); ?></p>
            &nbsp;&nbsp;
          </div>
          <!-- <div class="col" style="margin-top: -3px;">
            <a class="reply text-muted" href="#">Reply</a>
          </div> -->
        </div>
        <div class="row">
          <div class="col">
            <p class="text-muted row-2"><?php echo $option['content']; ?></p>
          </div>
        </div>
      </div>

      <br>
      <hr style="">


    <?php } ?>


  <!-- END Display Comments -->


  </div>

  <?php }} ?>

  <br><br>

  
<!-- end blog posts -->
  </div>



  <div class="col float-end">
    test
  </div>
</div>


</div>
<!-- end main -->
</div>
<!-- end main-container -->


<!-- TOP button and Script -->
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-caret-up-fill"></i></button>
  <script>
    // Get the button:
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
  </script>
<!-- END TOP button and Script -->

<!-- Other Scripts and Footer -->
  <script src="assets/js/dropdown.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
<!-- END Other Scripts and Footer -->

</body>
</html>