<?php
require_once "app/database/connection.php";
require_once "path.php";
session_start();
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
    <style>
      .log-link:hover {
        color: #47a0c9 !important;
      }
      .head-link:hover {
        color: #47a0c9 !important;
      }

      /* DROPDOWN */
.menu-btn {
  /* padding: 5px; */
  background-color: transparent;
  border: none;
}
.dropdown-menu {
  /* margin-top: -5px; */
  border: none;
  background-color: transparent;
  /* position: relative; */
  display: block;
}
.menu-content {
  /* margin-left: -25% !important; */
  padding-top: 10px;
  /* margin-top: 6px; */
  background-color: #1e2327 !important;
  /* background-color: #2d3337; */
  display: none;
  position: absolute;
  /* min-width: 200px; */
  /* z-index: 9999; */
}
.a-link {
  width: 100%;
}
.a-link:hover {
  width: 100%;
}
.links {
  padding: 8px;
  font-size: 12px;
  text-decoration: none;
  display: block;
  font-weight: bold;
}
.links:hover {
  color: #7fade1 !important;
}
.dropdown-menu:hover .menu-content {
  display: block;
}
.dropdown-menu:hover .menu-btn {
  /* background-color: #2d3337; */
  background-color: #1e2327 !important;
  padding: 5px;
}
    </style>
</head>
<body>

<?php
$loggedin = $_SESSION['loggedin'];
if($loggedin == 1) { ?>
  
  <div class="row" style="width: 100.75% !important; background-color: #1e2327; height: 30px;">
    <div class="col">
      <p class="text-start" style="margin-top: 5px; font-size: 12px;"><img class="ms-3" src="../assets/images/updated-logo.png" style="height: 20px !important; width: 20px !important;" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="log-link text-white" style="text-decoration: none;" href="<?php echo BASE_URL . '/cu-admin/' ?>"><i class="bi bi-speedometer2"></i>&nbsp;Dashboard</a></p>
    </div>
    <div class="col">

      <p class="text-end" style="font-size: 12px;">

      <!-- start dropdown -->
      <div class="dropdown-menu" style="">
        <a style="font-size: 14px; text-decoration: none; color: white" href="/" class="menu-btn text-white">
          Welcome, <?php echo $_SESSION['username']; ?> <i class="bi bi-person-square"></i> 
                    </a>
                    <div class="menu-content" style="">
                        <div class="float-start">
                            <i class="bi bi-person-square text-muted" style="font-size: 45px;margin-left: 15px;"></i>
                        </div>
                        <div class="float-end" style="margin-right: 15px;">
                            <a class="links text-white" href="<?php echo BASE_URL . '/cu-admin/profile.php' ?>">Edit Profile</a>
                            <!-- <a class="links text-white" href="#">Visit Us</a> -->
                            <a class="links text-white" href="<?php echo BASE_URL . '/logout.php' ?>">Log Out</a>
                            <div class="pb-3"></div>
                        </div>
                    </div>
                </div>
                <!-- end dropdown -->
    
    
    
    </p>
    </div> 
  </div>

<?php } else {}

?>
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

  <div class="middle">
    <h1 class="behind text-center mt-5">
      Home
    </h1>
    <h1 class="front text-center">
      <strong>Home</strong>
    </h1>
  </div>

<!-- end middle -->



<!-- start Tags -->

<br><br>

<div class="mx-auto pop-post row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card top-card h-100" style="background-color: #1f1f1f;">
      <div class="card-body">
        <div class="text-center">
          <i class="bi bi-list-check fs-1"></i>
        </div>
        <h5 class="card-title text-center mt-4">Walkthroughs</h5>
        <p class="card-text text-center">Includes TryHackMe and HackTheBox boxes</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card top-card h-100" style="background-color: #1f1f1f;">
      <div class="card-body">
        <div class="text-center">
          <i class="bi bi-folder fs-1"></i>
        </div>
        <h5 class="card-title text-center mt-4">Personal Projects</h5>
        <p class="card-text text-center">Projects that I have worked on or built upon personally</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card top-card h-100" style="background-color: #1f1f1f;">
      <div class="card-body">
        <div class="text-center">
          <i class="bi bi-journal fs-1"></i>
        </div>
        <h5 class="card-title text-center mt-4">IT/Cybersecurity Notes</h5>
        <p class="card-text text-center">Notes from courses taken online or via BYU - Provo.</p>
      </div>
    </div>
  </div>
</div>

<div class="text-center">
  <button class="btn mt-5 post-btn btn-lg">
    <a href="<?php echo BASE_URL . '/posts.php' ?>" class="text-decoration-none text-white p-2 text-uppercase" style="font-size: 16px;">
      View All Posts
    </a>
  </button>
</div>



<!-- end Tags -->

<br><br><br>

<!-- start blog posts -->

<div class="sub-title">
  <h1 class="behind-2 mt-5">
    Popular Posts
  </h1>
  <h1 class="front-2">
    <strong>Popular Posts</strong>
  </h1>
</div>

<br><br>


<div class="mx-auto pop-post row row-cols-1 row-cols-md-3 g-4">
  <?php
    $query ="SELECT * FROM posts WHERE status = 'published' LIMIT 3";
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
          <!-- <p class="card-text text-muted">
            <?php //echo html_entity_decode(substr($option['content'], 0, 150) . '...'); ?>
          </p> -->
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

    


    <script src="assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>