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


    <link rel="stylesheet" href="assets/blog.css?v=5.04">

    <title>Search - CacheUp Blog</title>

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
  padding: 5px;
  background-color: transparent;
  border: none;
}
.dropdown-menu {
  margin-top: -5px;
  border: none;
  background-color: transparent;
  position: relative;
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
      .login_error {
                border-left: 4px solid #72aee6;
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
      .search-link:hover {
        color: #03c6fc !important;
      }
      p img {
        display: none;
      }
      h2 {
        display: none;
      }
      h3 {
        display: none;
      }
    </style>
</head>
<body>

<div class="blocked-page">
  <?php include(ROOT_PATH . '/app/includes/blocked-page.php'); ?>
</div>

<?php
$loggedin = $_SESSION['loggedin'];
if($loggedin == 1) { ?>
  
  <div class="position-fixed row" style="width: 100.75% !important; background-color: #1e2327; height: 30px;">
    <div class="col">
      <p class="text-start" style="margin-top: 5px; font-size: 12px;"><img class="ms-3" src="../assets/images/updated-logo.png" style="height: 20px !important; width: 20px !important;" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="log-link text-white" style="text-decoration: none;" href="<?php echo BASE_URL . '/rp-admin/' ?>"><i class="bi bi-speedometer2"></i>&nbsp;Dashboard</a></p>
    </div>
    <div class="col">


      <!-- start dropdown -->
        <div class="dropdown-menu text-end float-end" style="">
          <a style="font-size: 12px; text-decoration: none; color: white;" href="/" class="log-link menu-btn text-white">
            Welcome, <?php echo $_SESSION['username']; ?> <i class="text-white bi bi-person-square"></i> 
          </a>
          <div class="menu-content" style="">
              <div class="float-start">
                  <i class="bi bi-person-square text-muted" style="font-size: 45px;margin-left: 15px;"></i>
              </div>
              <div class="float-end" style="margin-right: 15px;">
                  <a class="links text-white" href="<?php echo BASE_URL . '/rp-admin/profile.php' ?>">Edit Profile</a>
                  <a class="links text-white" href="<?php echo BASE_URL . '/logout.php' ?>">Log Out</a>
                  <div class="pb-3"></div>
              </div>
          </div>
        </div>
      <!-- end dropdown -->
    
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

    <div class="mt-5"></div>
    <p class="text-muted text-center">
        This search engine looks through the database to find similar titles to what is inputed.
      </p>
    <div class="d-flex justify-content-center">
    
      <form action="" method="post" class="">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="param" aria-label="param" aria-describedby="basic-addon1">
          <button type="submit" name="search" class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
    
    <div class="mx-auto pop-post row row-cols-1 row-cols-md-3 g-4">
      

    <?php
    if(isset($_POST['search'])){
        $param = mysqli_real_escape_string($conn, $_POST['param']);
        $select = " SELECT * FROM recipes WHERE title LIKE '%$param%' AND status = 'published'";
    
          $result = $conn->query($select);
            if($result->num_rows> 0){
              $search= mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
              $error = '
                <div class="pt-3"></div>
                <div class="text-black login_error">
                <strong>Error:</strong> 
                There are no post titles including: "<strong>'. $_POST['param'] .'</strong>". Please try again.
                </div>
                ';
            }
          }
          ?>
          <?php foreach ($search as $s) {

            $category = $s['category'];
            $grab = " SELECT * FROM categories WHERE idno = '$category' ";
            $new = mysqli_query($conn, $grab);
            if (mysqli_num_rows($new) > 0) {
              while($cap = mysqli_fetch_assoc($new)) {
                $name    = $cap['category'];
            }}
            
            ?>
            
    <div class="col">
      <div class="card h-100" style="background-color: #1f1f1f;">
        <div class="card-body mb-4">
          <p class="card-subtitle mb-3 mt-4 text-uppercase fw-bold" style="font-size: 12px;color: #03c6fc;"><?php echo $name; ?></p>
          <a href="single_post.php?id=<?php echo $s['post_id']; ?>" class="text-decoration-none text-white"><h5 class="card-title blog-title"><?php echo $s['title']; ?></h5></a>
          <div class="pt-4"></div>
          <p class="text-muted" style="font-size: 14px; margin-bottom: -10px;">
            <?php echo $s['author']; ?> / <?php echo $s['published_date']; ?>
          </p>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php echo $error; ?>
    
        </div>
        

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