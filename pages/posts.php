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
  header('location: posts.php');
}
?>

<?php
if (isset($_POST['draft'])) {
  $appUpdateQuery = "UPDATE posts SET status = 'draft', published_at = null WHERE post_id = '".$_POST['post_id']."'";
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


    <link rel="stylesheet" href="../assets/styles.css?v=2.50">

    <title>All Posts - CacheUp Blog</title>

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

    <div class="main-content">

    <table class="table" style="width: 99%;">
  <thead>
    <tr>
      <th scope="col">ID #</th>
      <th scope="col">Title</th>
      <!-- <th scope="col">Company</th> -->
      <!-- <th scope="col">Department</th> -->
      <!-- <th scope="col">Postion</th> -->
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
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
        <th scope="row"><?php echo $idno; ?></th>
        <td><?php echo $title; ?></td>
        <?php if($status == 'published'){ ?>
          <td>Published</td>
        <?php } else { ?>
          <td>Draft</td>
        <?php } ?>
        <td>
          <?php if($status == 'draft') { ?>
        <form method="post" action="">
          <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="published"><span class="badge text-bg-success">Publish</span></button>
        </form>
        <?php } else { ?>
        <form method="post" action="">
          <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="draft"><span class="badge text-bg-primary">Draft</span></button>
        </form>
        <?php } ?>
          <a style="text-decoration: none;" class="badge text-bg-success" href="actions/view-employee.php?employeeID=<?php echo $empID; ?>">View</a>
          <a style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#confirmDelete" class="badge text-bg-danger" href="employees.php?employeeID=<?php echo $empID; ?>">Delete</a>
        </td>
        <?php } }?>
  </tbody>
</table>


        </div>




    
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