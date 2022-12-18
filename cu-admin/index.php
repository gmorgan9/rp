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


    <!-- <link rel="stylesheet" href="../assets/styles.css?v=3.31"> -->

    <title>Dashboard - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
      body {
        background-color: #f0f0f0 !important;
        color: white;
      }
      /* Sidebar */
      .sidebar {
        margin-top: 40px;
        position: absolute;
        top: 0;
        margin-left: 0 !important;
        padding-left: 0 !important;
        background-color: #1e2327;
        width: 12%;
        height: 100% !important;
        /* height: -40% !important; */
      }
      .page-header {
        display: inline !important;
        width: 100% !important;
        padding: 5px 8px;
        height: 40px;
        color: white;
        background-color: #1e2327 !important;
      }
      /* DROPDOWN */
      .menu-btn {

        padding-left: 5px;
        padding-right: 5px;
        background-color: transparent;
        border: none;
      }
      .dropdown-menu {
        margin-top: -5px;
        border: none;
        background-color: transparent;
        position: relative;
        display: inline-block;
      }
      .menu-content {
        right: 150 !important;
        padding-top: 10px;
        margin-top: 1px;
        background-color: #2d3337;
        display: none;
        position: absolute;
        min-width: 200px;
        z-index: 1;
      }
      .links {
        padding: 8px;
        font-size: 12px;
        text-decoration: none;
        display: block;
        font-weight: bold;
      }
      .dropdown-menu:hover .menu-content {
        display: block;
      }
      .dropdown-menu:hover .menu-btn {
        background-color: #2d3337;
        padding: 5px;
      }
      .side {
        border-left: 4px solid transparent;
      }
      .side:hover {
        border-left: 4px solid #7fade1;
        color: #7fade1 !important;
      }
      .right {
        margin-right: 25px !important;
      }
    </style>
    
</head>
<body style="margin:0;padding:0;box-sizing: border-box;">

<!-- main-container -->
  <div class="container-fluid" style="margin:0;padding:0;">

  <div class="row">
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  </div>
  <div class="row">
    <div class="col">
      <?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
    </div>
  </div>




    <div class="main">

    </div>


  </div>
<!-- END main-container -->


<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

<!-- <script src="../assets/js/new.js"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
  // $(document).on('click', 'a', function() {
  //   $(this).addClass('active').siblings().removeClass('active')
  // })
  // $(document).on('click', 'ul li a', function() {
  //   $(this).removeClass('active')
  // })
</script>

<script>
// $(document).ready(function () {
//     $('.dropdown-toggle').mouseover(function() {
//         $('.dropdown-menu').show();
//     })

//     $('.dropdown-toggle').mouseout(function() {
//         t = setTimeout(function() {
//             $('.dropdown-menu').hide();
//         }, 100);

//         $('.dropdown-menu').on('mouseenter', function() {
//             $('.dropdown-menu').show();
//             clearTimeout(t);
//         }).on('mouseleave', function() {
//             $('.dropdown-menu').hide();
//         })
//     })
// })
</script>


    <script src="../assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>