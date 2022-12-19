<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";
session_start();

if(isLoggedIn() == false){
  header('location: '. BASE_URL . '/cu-login.php');
}

?>

<?php
if(isset($_POST['add-category'])){
  $idno  = rand(10000, 99999); // figure how to not allow duplicates
  $category = mysqli_real_escape_string($conn, $_POST['category']);

  $select = " SELECT * FROM categories WHERE category = '$category'";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){

     $error[] = 'category already exist!';

  }else {
        $insert = "INSERT INTO categories (idno, category) VALUES('$idno', '$category')";
        mysqli_query($conn, $insert);
        // header('location:/');
     }

};

?>

<?php 
// START DELETE
  if (isset($_POST['delete'])) {
    $delete = "DELETE FROM categories WHERE cat_id = '".$_POST['cat_id']."'";
    $terUpdateResult = mysqli_query($conn, $delete);
    header('location: categories.php');
  }
// END DELETE

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="../assets/styles.css?v=4.01">
    <link rel="stylesheet" href="../assets/sidebar.css?v=1.10">

    <title>Categories - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="margin:0;padding:0;">

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
      <div class="col-10" style="margin-left: -25px;">
        <h3 class="text-black" style="margin-left: -5px;">
          New Post
        </h3>
        <div class="mt-3"></div>


<!-- START ADD COMPANY (LEFT SIDE) -->
<div class="d-flex">
<div class="page-content" style="background-color: white; width: 32%; height: 175px !important;">
    <form action="" method="post">
    <div class="section-header pt-2">
      <span class="text-muted ps-2 pt-4" style="width: 95%;">New Category</span>
    </div>
    <hr class="text-muted text-center" style="width: 95%;margin-bottom: -5px; margin-top: 5px;">
    <?php 

    $sql = "SELECT * FROM categories";
    $all = mysqli_query($conn, $sql);
      if($all) {
        while ($row = mysqli_fetch_assoc($all)) {
    
    $fname = $row['fname'];
    $lname = $row['lname']; 
    $employeeID = $row['idno']?>
    <?php }} ?>
    <div class="form-group pt-3 mx-auto" style="width: 95%;">
      <label class="text-muted" for="category" style="font-size: 14px;">Category <span class="text-muted" style="font-size: 10px;">e.g. "Cybersecurity"</span></label>
      <input class="form-control" id="category" type="text" name="category" value="" required>
    </div>
    <div class="form-group pt-3 mx-auto d-grid d-md-flex justify-content-md-end" style="width: 95%; margin-bottom: 10px;">
      <button type="submit" style="border-color: rgba(0,0,0,0);" name="add-category" class="badge text-bg-secondary">Add Category</button>
    </div>
    </form>
    </div>
  <!-- END ADD JOB (LEFT SIDE) -->

  <!-- START JOB-REQUEST (RIGHT SIDE) -->
    <div class="page-content float-end" style="width: 65%; margin-left: 25px; border-radius: 15px;">
    <table class="table table-light">
    <thead>
      <tr>
        <th scope="col" style="font-size: 14px;">ID #</th>
        <th scope="col" style="font-size: 14px;">Category</th>
        <th scope="col" style="font-size: 14px;">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">

    <?php
        $sql = "SELECT * FROM categories";
        $all = mysqli_query($conn, $sql);
        if($all) {
            while ($row = mysqli_fetch_assoc($all)) {
              $cat_id      = $row['cat_id'];
              $idno        = $row['idno'];
              $category    = $row['category'];
    ?>
      <tr>
          <th scope="row"><?php echo $idno; ?></th>
          <td><?php echo $category; ?></td>
          <td>
            <form method="post" action="">
              <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>" />
              <button onclick="return confirm('Be Careful, Can\'t be undone! \r\nOK to delete?')" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="delete"><span class="badge text-bg-danger">Delete</span></button>
            </form>
          </td>
          <?php } ?>
          
          
        </tbody>
        </table> 
        <?php 
        } else {
          echo "0 results";
        }
          ?>
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
  
  <script src="../assets/js/dropdown.js"></script>
  <!-- <script src="../assets/js/main.js"></script> -->
  <script src="../assets/js/bar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>