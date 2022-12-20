<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";
session_start();

if(isLoggedIn() == false){
  header('location: '. BASE_URL . '/cu-login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/styles.css?v=4.11">
    <link rel="stylesheet" href="../assets/sidebar.css?v=1.10">

    <title>Dashboard - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
      
    </style>
    
</head>
<body style="margin:0;padding:0;box-sizing:border-box;">

<!-- main-container -->
  <div class="container-fluid">

    <div class="row">
      <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    </div>

    <div class="row">
      <div class="col" style="margin:0;padding:0;">
        <?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
      </div>
    </div>

    <div class="mt-5"></div>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-10" style="margin-left: -30px;">
        <h3 class="text-black">
          Dashboard
        </h3>
        <div class="mt-3"></div>

        <div class="row">
          <div class="col" style="width: 50%;">

            <!-- begin health -->
              <div class="card" style="z-index: -2;">
                <div class="card-header">
                  Site Health Status
                </div>
                <div class="card-body">
                  <div class="pt-2"></div>
                  <div class="d-flex">
                    <p class="card-text float-start w-25 justify-content-center" style="margin-left: auto; margin-right: auto;">
                      <div style="width: 65px; height: 35px; background-color: green; border-radius: 100px; margin-left: -50px; margin-right: 50px;"></div>
                    </p>
                    <p class="card-text float-end" style="font-size: 14px;">
                    Your site's health is looking <strong>good</strong>, but there are still some things you can do to improve its performance and security.
                    </p>
                  </div>
                </div>
              </div>
            <!-- end health -->

            <div class="pt-4"></div>

            <!-- begin quicklook -->
              <div class="card">
                <div class="card-header">
                  Quick Look
                </div>
                <div class="card-body">
                  <div class="pt-2"></div>
                  <div class="row">
                    <div class="col">
                      <!-- posts -->
                        <a style="color: #7fade1;" href="<?php echo BASE_URL . '/cu-admin/all_posts.php' ?>">
                          <i class="bi bi-pin-angle-fill text-muted"></i>&nbsp;
                          <?php
                          $sql="SELECT count('1') FROM posts WHERE status = 'published'";
                          $result=mysqli_query($conn,$sql);
                          $rowtotal=mysqli_fetch_array($result); 
                          echo "$rowtotal[0] Posts";
                          ?>
                        </a>
                      <!-- end posts -->
                      <div class="pt-2"></div>
                      <!-- categories -->
                      <a style="color: #7fade1;" href="<?php echo BASE_URL . '/cu-admin/categories.php' ?>">
                        <i class="bi bi-tags-fill text-muted"></i>&nbsp;
                          <?php
                          $sql="SELECT count('1') FROM categories";
                          $result=mysqli_query($conn,$sql);
                          $rowtotal=mysqli_fetch_array($result); 
                          echo "$rowtotal[0] Categories";
                          ?>
                        </a>
                      <!-- end categories -->
                    </div>
                    <div class="col">
                      <!-- comments -->
                      <a style="color: #7fade1;" href="<?php echo BASE_URL . '/cu-admin/comments.php' ?>">
                        <i class="bi bi-chat-right-fill text-muted"></i>&nbsp;
                          <?php
                          $sql="SELECT count('1') FROM comments WHERE status = 1";
                          $result=mysqli_query($conn,$sql);
                          $rowtotal=mysqli_fetch_array($result); 
                          echo "$rowtotal[0] Comments";
                          ?>
                        </a>
                      <!-- end comments -->
                    </div>
                    <div class="pt-3"></div>
                    <p style="margin-bottom: -2px;">Ubuntu 22.0.4 running <a style="color: #7fade1; text-decoration: underline;" href="/">CacheUp</a> blog</p>
                  </div>
                </div>
              </div>
            <!-- end quicklook -->

            <div class="pt-4"></div>

            <!-- begin recent -->
              <!-- PHP -->
                <?php
                  $query ="SELECT * FROM posts WHERE status = 'published' LIMIT 2";
                  $result = $conn->query($query);
                  if($result->num_rows> 0){
                    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                  }
                ?>
              <!-- end PHP -->
              <div class="card">
                <div class="card-header">
                  Activity
                </div>
                <div class="card-body">
                  <p style="font-size: 16px;">
                    Recently Published
                  </p>
                  <?php foreach ($options as $option) { ?>
                    <div class="row">
                      <div class="col-4">
                        <p class="text-muted"><?php echo $option['published_at']; ?></p>
                      </div>
                      <div class="col">
                        <p class="text-muted"><a style="color: #7fade1;" href="<?php echo BASE_URL . '/single_post.php?id=' . $option['post_id']; ?>"><?php echo $option['title']; ?></a></p>
                      </div>
                    </div>
                  <?php } ?>
                  <hr>
                  <!-- PHP -->
                    <?php
                      $query ="SELECT * FROM comments WHERE status = 1 LIMIT 1";
                      $result = $conn->query($query);
                      if($result->num_rows> 0){
                        $comms = mysqli_fetch_all($result, MYSQLI_ASSOC);
                      }
                    ?>
                  <!-- end PHP -->
                  <p style="font-size: 16px;">
                    Recent Comments
                  </p>
                  <?php foreach ($comms as $comm) { ?>
                    <div class="row">
                      <div class="col">
                        <p class="text-muted">
                          From <?php echo $comm['name']; ?> on <a style="color: #7fade1;" href="<?php echo BASE_URL . '/single_post.php?id=' . $comm['post_id']; ?>"><?php echo $comm['post_title']; ?></a>
                        </p>
                        <p style="margin-top: -10px;">
                          <?php echo substr($comm['content'], 0, 50) . '...'; ?>
                        </p>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            <!-- end recent -->

          </div>
          <div class="col" style="width: 50%;">

          <!-- begin quick draft -->
            <div class="card" style="z-index: -2;">
              <div class="card-header">
                Quick Draft
              </div>
              <div class="card-body">
                body
              </div>
            </div>
          <!-- end quick draft -->

          <div class="pt-4"></div>

          <!-- begin news&updates -->
            <div class="card">
              <div class="card-header">
                New and Updates
              </div>
              <div class="card-body">
                body
              </div>
            </div>
          <!-- end news&updates -->
          </div>
        </div>




      </div>
    </div>

    <div class="row">
      <div class="col-2"></div>
      <div class="col position-absolute bottom-0 ms-5">
        <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
      </div>
    </div>

  </div>
<!-- END main-container -->


  
  

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

  <script>
    $('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});
  </script>
  
  <script src="../assets/js/dropdown.js"></script>
  <!-- <script src="../assets/js/main.js"></script> -->
  <script src="../assets/js/bar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>