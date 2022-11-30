<?php

require_once "app/database/connection.php";
// require_once "app/database/functions.php";
require_once "path.php";
// session_start();

// if(isLoggedIn()){
//   header('location: '. BASE_URL . '/pages/dashboard.php');
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="assets/blog.css?v=2.38">

    <title>CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="main-container">
        
<div class="main">


  <div class="page-header">
    <!-- <p class="page_title" style="float: left; padding-top: 2px;">&nbsp;&nbsp;<i class="bi bi-house-door-fill"></i> Home &nbsp;&nbsp; | &nbsp;&nbsp; VIEW POST &nbsp;&nbsp; | &nbsp;&nbsp; NEW</p> -->
    <div class="left float-left">
      <img src="/assets/images/white-logo.png" width="230px" class="text-center" style="margin-top: 2.5%; margin-left: 2%;" alt="">
    </div>
    <div class="right float-right">
      <a href="">
        <i class="bi bi-search"></i>
      </a>
      <button>
        <a href="">
          Let's Talk
        </a>
      </button>
    </div>
    
  </div>
</div>
</div>

    
<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

    <script src="assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>