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

date_default_timezone_set('America/Denver');
$date = date('F d, Y', time());


if (isset($_POST['published'])) {
  $appUpdateQuery = "UPDATE posts SET status = 'published', published_at = '$date' WHERE post_id = '".$_POST['post_id']."'";
  $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
  header('location: all_posts.php');
}
?>

<?php
if (isset($_POST['draft'])) {
  $appUpdateQuery = "UPDATE posts SET status = 'draft', published_at = null WHERE post_id = '".$_POST['post_id']."'";
  $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
  header('location: all_posts.php');
}
?>

<?php 
// START DELETE
  if (isset($_POST['delete'])) {
    $delete = "DELETE FROM posts WHERE post_id = '".$_POST['post_id']."'";
    $terUpdateResult = mysqli_query($conn, $delete);
    header('location: all_posts.php');
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


    <link rel="stylesheet" href="../assets/styles.css?v=2.50">

    <title>All Posts - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>


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




<table class="table table-dark" style="width: 99%;">
  <thead>
    <tr>
      <th style="background-color: #1a1a1a;" cope="col">ID #</th>
      <th style="background-color: #1a1a1a;" scope="col">Title</th>
      <th style="background-color: #1a1a1a;" scope="col">Status</th>
      <th style="background-color: #1a1a1a;" scope="col">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php
      $sql = "SELECT * FROM posts";
      $all = mysqli_query($conn, $sql);
      if($all) {
          while ($row = mysqli_fetch_assoc($all)) {
            $post_id     = $row['post_id'];
            $idno      = $row['idno'];
            $title     = $row['title'];
            $status = $row['status'];
            ?>
    <tr>
        <?php //if($_SESSION['empID'] != $row['employeeID']){ ?>
        <th style="background-color: #1a1a1a;" scope="row"><?php echo $idno; ?></th>
        <td style="background-color: #1a1a1a;"><?php echo $title; ?></td>
        <?php if($status == 'draft') { ?>
          <td style="background-color: #1a1a1a;">
        <form method="post" action="">
          <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="published"><span class="badge text-bg-success">Publish</span></button>
        </form>
        </td>
        <?php } else { ?>
          <td style="background-color: #1a1a1a;">
        <form method="post" action="">
          <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="draft"><span class="badge text-bg-primary">Draft</span></button>
        </form>
        <?php } ?>
        </td>
        <td style="background-color: #1a1a1a;">
          <div class="d-flex">
            <a style="text-decoration: none; background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" href="actions/edit_post.php?id=<?php echo $post_id; ?>"><span class="badge text-bg-success">View</span></a>
            &nbsp;
            <form method="post" action="">
              <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
              <button onclick="return confirm('Be Careful, Can\'t be undone! \r\nOK to delete?')" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="delete"><span class="badge text-bg-danger">Delete</span></button>
            </form>
          </div>
        </td>
        <?php }}?>
  </tbody>
</table>











<div class="row">
  <div class="col-2"></div>
  <div class="col position-absolute bottom-0 ms-5">
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
  </div>
</div>

</div>
<!-- END main-container -->



    
<div class="main-container">
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">
    <div class="page-header mx-auto">
        <p class="page_title">All Posts</p>
    </div>

    <div class="main-content">

    


        </div>




    
</div>

    




  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/bar.js"></script>
  <script src="../assets/js/dropdown.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>