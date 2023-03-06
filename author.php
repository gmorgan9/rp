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


    <link rel="stylesheet" href="assets/blog.css?v=5.06">

    <title>Author Page - CacheUp Blog</title>

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
$idno = $_GET['id'];
$select = " SELECT * FROM users WHERE idno = '$idno' ";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    $username    = $row['username'];
    $firstname     = $row['firstname'];
    $lastname    = $row['lastname'];
    $pp          = $row['profile_picture'];
    $joined      = $row['joined'];
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
    <div class="middle" style="background-color: #292929;">
        <div class="pt-5 bio">
            <div class="img d-flex justify-content-center">
                <img src="<?php echo $pp; ?>" style="width: 150px; border-radius: 100%; border: 1px solid #393939;" class="img-fluid" alt="">
            </div>
            <div class="pt-4"></div>
            <h5 class="text-center">
                <?php echo $firstname; ?> <?php echo $lastname; ?>
            </h5>
            <p class="text-center text-muted">
                <?php echo $username; ?>
            </p>
            <p class="text-uppercase text-muted text-center" style="font-size: 12px; letter-spacing: .5px;">
                <?php 
                ?>
                Joined: <?php echo date('F d, Y', strtotime($joined)); ?>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;recipes: 
                <?php
                $sql="SELECT count('1') FROM recipes WHERE author_idno = '$idno' AND status = 'published'";
                $result=mysqli_query($conn,$sql);
                $rowtotal=mysqli_fetch_array($result); 
                echo "$rowtotal[0]";
                ?>
            </p>
            <div class="pt-3"></div>
            <div class="text-center">
                <a class="website-btn" style="background-color: #03c6fc; color: white; padding: 7px 10px; border-radius: 75px; margin-top: 10px;" href="https://resume.morganserver.com/" target="_blank"><i class="bi bi-globe"></i></a>
            </div>
            <div class="pb-5"></div>
        </div>
    </div>

<!-- end middle -->


<br><br><br>

<!-- start blog lists -->


  <br>
  <div class="mx-auto pop-post row row-cols-1 row-cols-md-3 g-4">
  <?php
    $idno = $_GET['id'];
    $query ="SELECT * FROM recipes WHERE author_idno = '$idno' AND status = 'published'";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
  ?>
  <?php foreach ($options as $option) { 

    $category = $option['category'];
    $grab = " SELECT * FROM categories WHERE idno = '$category' ";
    $new = mysqli_query($conn, $grab);
    if (mysqli_num_rows($new) > 0) {
      while($cap = mysqli_fetch_assoc($new)) {
        $name    = $cap['category'];
    }}

    ?>
    
    <div class="col">
      <div class="card h-100" style="background-color: #1f1f1f;">
        <div class="card-body">
          <p class="card-subtitle mb-3 mt-4 text-uppercase fw-bold" style="font-size: 12px;color: #03c6fc;"><?php echo $name; ?></p>
          <a href="single_post.php?id=<?php echo $option['post_id']; ?>" class="text-decoration-none text-white"><h5 class="card-title blog-title"><?php echo $option['title']; ?></h5></a>
          <div class="pt-4"></div>
          <p class="text-muted" style="font-size: 12px;">
            <?php echo $option['published_date']; ?>&nbsp;&nbsp;&nbsp;
                <?php
                $sql="SELECT count('1') FROM comments WHERE post_id = '".$option['post_id']."' AND status = 1";
                $result=mysqli_query($conn,$sql);
                $rowtotal=mysqli_fetch_array($result); 
                if($rowtotal[0] > 0){
                echo "/&nbsp;&nbsp;&nbsp; Comments: $rowtotal[0]";
                } else {}
                ?>
          </p>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>




<!-- end blog lists -->

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