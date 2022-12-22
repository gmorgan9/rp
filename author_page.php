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


    <link rel="stylesheet" href="assets/blog.css?v=3.92">

    <title>Author Page - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
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
    <!-- <nav class="pt-5" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
      <ol class="breadcrumb justify-content-center">
        <li class="text-center breadcrumb-item" style="font-size: 12px;"><a href="/" class="text-decoration-none text-uppercase" style="color: #03c6fc;">Home</a></li>
        <li class="breadcrumb-item active text-white text-uppercase" aria-current="page" style="font-size: 12px;">Posts</li>
      </ol>
    </nav> -->

    <?php 

    ?>



    <div class="pt-5 bio">
        <div class="img d-flex justify-content-center">
            <img src="<?php echo $pp; ?>" style="width: 150px; border-radius: 100%; border: 1px solid #393939;" class="img-fluid" alt="">
        </div>
        <div class="pt-5"></div>
        <h5 class="text-center">
            <?php echo $firstname; ?> <?php echo $lastname; ?>
        </h5>
        <p class="text-center text-muted">
            <?php echo $username; ?>
        </p>
        <p class="text-muted text-center" style="font-size: 14px;">
            <?php 
            ?>
            Joined: <?php echo date('F d, Y', strtotime($joined)); ?>&nbsp;&nbsp;/&nbsp;&nbsp;Posts: 
            <?php
            $sql="SELECT count('1') FROM posts WHERE author_idno = '$idno' AND status = 'published'";
            $result=mysqli_query($conn,$sql);
            $rowtotal=mysqli_fetch_array($result); 
            echo "$rowtotal[0]";
            ?>
        </p>
    </div>



</div>

<!-- end middle -->


<br><br><br>

<!-- start blog posts -->


  <br>
  <div class="mx-auto pop-post row row-cols-1 row-cols-md-3 g-4">
  <?php
    $idno = $_GET['id'];
    $query ="SELECT * FROM posts WHERE author_idno = '$idno'";
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

    


    <script src="assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>