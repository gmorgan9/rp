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

    <title>Category - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$idno = $_GET['id'];
$select = " SELECT * FROM posts WHERE category_idno = '$idno' ";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    $category    = $row['category'];
    $title     = $row['title'];
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
<!-- <nav class="mt-5" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
      <ol class="breadcrumb justify-content-center">
        <li class="text-center breadcrumb-item" style="font-size: 12px;"><a href="/" class="text-decoration-none text-uppercase" style="color: #03c6fc;">Home</a></li>
        <li class="breadcrumb-item active text-white text-uppercase" aria-current="page" style="font-size: 12px;">Posts</li>
      </ol>
    </nav> -->



  <div class="middle">
    <h1 class="behind text-center mt-2">
      Category
    </h1>
    <h1 class="front text-center">
      <strong>Category</strong>
    </h1>
    <div class="mt-5"></div>
    <h3 class="text-center">
        Category:&nbsp;&nbsp;&nbsp;
    <span class="text-muted"><?php echo $category ?></span>
    </h3>
  </div>
<!-- end middle -->


<br><br><br>

<!-- start blog lists -->

<br>
  <div class="mx-auto pop-post row row-cols-1 row-cols-md-3 g-4">
  <?php
    $idno = $_GET['id'];
    $query ="SELECT * FROM posts WHERE category_idno = '$idno' AND status = 'published'";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
      echo "There are currently no posts tagged with <span>$category</span>.";
    }
  ?>
  <?php foreach ($options as $option) { ?>
    <div class="col">
      <div class="card h-100" style="background-color: #1f1f1f;">
        <div class="card-body">
          <p class="card-subtitle mb-3 mt-4 text-uppercase fw-bold" style="font-size: 12px;color: #03c6fc;"><?php echo $option['category']; ?></p>
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