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


    <link rel="stylesheet" href="../assets/styles.css?v=2.50">

    <title>Comments - CacheUp Blog</title>

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
        <p class="page_title">Comments</p>
    </div>

    <div class="main-content">

    <table class="table table-dark" style="width: 99%;">
  <thead>
    <tr>
      <th style="background-color: #1a1a1a;" cope="col">ID #</th>
      <th style="background-color: #1a1a1a;" scope="col">Author</th>
      <th style="background-color: #1a1a1a;" scope="col">In response to</th>
      <th style="background-color: #1a1a1a;" scope="col">Submitted</th>
      <th style="background-color: #1a1a1a;" scope="col">Actions</th>
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
            ?>
    <tr>
        <?php //if($_SESSION['empID'] != $row['employeeID']){ ?>
        <th style="background-color: #1a1a1a;" scope="row"><?php echo $idno; ?></th>
        <td style="background-color: #1a1a1a;"><?php echo $name; ?></td>
        
        <td style="background-color: #1a1a1a;"><?php echo $post_idno; ?></td>
        <td style="background-color: #1a1a1a;"><?php echo date('F j, Y / g:i a', strtotime($submit_date));; ?></td>
       
        <?php if($status == 0) { ?>
          <td style="background-color: #1a1a1a;">
        <form method="post" action="">
          <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="approve"><span class="badge text-bg-success">Approved</span></button>
        </form>
        </td>
        <?php } else { ?>
          <td style="background-color: #1a1a1a;">
        <form method="post" action="">
          <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>" />
          <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="unapprove"><span class="badge text-bg-warning">Unapproved</span></button>
        </form>
        <?php } ?>
        </td>
        
          <!-- <div class="d-flex">
            <a style="text-decoration: none; background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" href="actions/edit_post.php?id=<?php echo $post_id; ?>"><span class="badge text-bg-success">View</span></a>
            &nbsp;
            <form method="post" action="">
              <input type="hidden" name="post_id" value="<?php //echo $post_id; ?>" />
              <button onclick="return confirm('Be Careful, Can\'t be undone! \r\nOK to delete?')" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="delete"><span class="badge text-bg-danger">Delete</span></button>
            </form>
          </div> -->
     
        <?php }}?>
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