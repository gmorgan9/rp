<?php

require_once "../app/database/connection.php";
// require_once "app/database/functions.php";
require_once "../path.php";
session_start();

// if(isLoggedIn()){
//   header('location: '. BASE_URL . '/pages/dashboard.php');
// }

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
// SET TERMINATED
  if (isset($_POST['delete'])) {
    $delete = "DELETE FROM job WHERE cat_id = '".$_POST['cat_id']."'";
    // $terUpdateQuery = "DELETE categoires SET approval_status = 'terminated' WHERE jobID = '".$_POST['jobID']."'";
    $terUpdateResult = mysqli_query($conn, $delete);
    header('location: categories.php');
  }
// END SET TERMINATED

?>



<?php
if (isset($_POST['published'])) {
  $appUpdateQuery = "UPDATE posts SET published = 1 WHERE post_id = '".$_POST['post_id']."'";
  $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
  header('location: posts.php');
}
?>

<?php
if (isset($_POST['draft'])) {
  $appUpdateQuery = "UPDATE posts SET published = 0 WHERE post_id = '".$_POST['post_id']."'";
  $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
  header('location: posts.php');
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


    <link rel="stylesheet" href="../assets/styles.css?v=2.12">

    <title>Categories - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="main-container">
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">
    <div class="page-header mx-auto">
        <p class="page_title">All Posts</p>
    </div>
    <!-- START MAIN_CONTENT -->
        <div class="main-content d-flex">
            <!-- START ADD COMPANY (LEFT SIDE) -->
    <div class="page-content" style=" width: 32%; height: 255px !important;">
    <form action="" method="post">
    <div class="section-header pt-2">
      <span class="text-muted pt-4" style="width: 95%;">New Category</span>
    </div>
    <hr style="margin-bottom: -5px; margin-top: 5px;">
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
      <label for="category" style="font-size: 14px;">Category <span class="text-muted" style="font-size: 10px;">e.g. "Cybersecurity"</span></label>
      <input class="form-control" id="category" type="text" name="category" value="" required>
    </div>
    <div class="form-group pt-3 mx-auto d-grid d-md-flex justify-content-md-end" style="width: 95%; margin-bottom: 10px;">
      <button type="submit" style="border-color: rgba(0,0,0,0);" name="add-category" class="badge text-bg-secondary">Add Category</button>
    </div>
    </form>
    </div>
  <!-- END ADD JOB (LEFT SIDE) -->

  <!-- START JOB-REQUEST (RIGHT SIDE) -->
    <div class="page-content float-end" style="width: 65%; margin-left: 25px;">
    <table class="table">
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
    <!-- END MAIN-CONTENT -->




    
</div>

    




<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
  $(document).on('click', 'a', function() {
    $(this).addClass('active').siblings().removeClass('active')
  })
  $(document).on('click', 'ul li a', function() {
    $(this).removeClass('active')
  })
  $(document).on('click', 'td a', function() {
    $(this).removeClass('active')
  })
</script>


    <script src="../assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>