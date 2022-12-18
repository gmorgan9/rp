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

date_default_timezone_set('America/Denver');
$date = date('F d, Y', time());


if (isset($_POST['approve'])) {
  $appUpdateQuery = "UPDATE comments SET status = '1' WHERE comment_id = '".$_POST['comment_id']."'";
  $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
  header('location: all_comments.php');
}
?>

<?php
if (isset($_POST['unapprove'])) {
  $appUpdateQuery = "UPDATE comments SET status = '0' WHERE comment_id = '".$_POST['comment_id']."'";
  $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
  header('location: all_comments.php');
}
?>

<?php 
// START DELETE
  if (isset($_POST['delete'])) {
    $delete = "DELETE FROM comments WHERE comment_id = '".$_POST['comment_id']."'";
    $terUpdateResult = mysqli_query($conn, $delete);
    header('location: all_comments.php');
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


    <link rel="stylesheet" href="../assets/styles.css?v=4.00">

    <title>Comments - CacheUp Blog</title>

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

  <div class="mt-5"></div>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10">
      <table class="table table-bordered" style="width: 99%;">
        <thead>
          <tr>
            <th scope="col">ID #</th>
            <th scope="col">Author</th>
            <th scope="col">In response to</th>
            <th scope="col">Submitted</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">

        <?php
            $sql = "SELECT * FROM comments";
            $all = mysqli_query($conn, $sql);
            if($all) {
                while ($row = mysqli_fetch_assoc($all)) {
                  $comment_id     = $row['comment_id'];
                  $idno      = $row['idno'];
                  $post_idno     = $row['post_idno'];
                  $name = $row['name'];
                  $submit_date = $row['submit_date'];
                  $status = $row['status'];
                  $post_id = $row['post_id'];
                  ?>
          <tr>
              <th scope="row"><?php echo $idno; ?></th>
              <td><?php echo $name; ?></td>
              
              <td><a href="../single_post.php?id=<?php echo $post_id; ?>"><?php echo $post_idno; ?></a></td>
              <td><?php echo date('F j, Y / g:i a', strtotime($submit_date));; ?></td>
              
              <?php if($status == 0) { ?>
                <td>
              <form method="post" action="">
                <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>" />
                <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="approve"><span class="badge text-bg-success">Approve</span></button>
              </form>
              </td>
              <?php } else { ?>
                <td>
              <form method="post" action="">
                <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>" />
                <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="unapprove"><span class="badge text-bg-warning">Unapprove</span></button>
              </form>
              <?php } ?>
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
  <script src="../assets/js/dropdown.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>