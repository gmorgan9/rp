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


    <link rel="stylesheet" href="../assets/styles.css?v=4.01">
    <link rel="stylesheet" href="../assets/sidebar.css?v=1.00">

    <title>All Posts - CacheUp Blog</title>

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
    <div class="col-10">
    <h3 class="text-black" style="margin-left: -30px;">
        Posts
      </h3>
      <div class="mt-5"></div>
    <table class="table table-bordered" style="margin-left: -30px;">
  <thead>
    <tr>
      <th scope="col">ID #</th>
      <th scope="col">Title</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider" style="background-color: #f0f0f0;">

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
        <th scope="row"><?php echo $idno; ?></th>
        <td><?php echo $title; ?></td>
        <?php if($status == 'draft') { ?>
          <td>
        <form method="post" action="">
          <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="published"><span class="badge text-bg-success">Publish</span></button>
        </form>
        </td>
        <?php } else { ?>
          <td>
        <form method="post" action="">
          <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="draft"><span class="badge text-bg-primary">Draft</span></button>
        </form>
        <?php } ?>
        </td>
        <td>
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
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/bar.js"></script>
  <script src="../assets/js/dropdown.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>