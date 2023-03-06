<?php

require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";
session_start();

if(isLoggedIn() == false){
  header('location: '. BASE_URL . '/rp-login.php');
}

?>

<?php

date_default_timezone_set('America/Denver');
$date = date('F d, Y', time());


if (isset($_POST['reset'])) {
  $appUpdateQuery = "UPDATE users SET reset = 1 WHERE user_id = '".$_POST['user_id']."'";
  $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
  header('location: all_users.php');
}
?>

<?php 
// START DELETE
  if (isset($_POST['delete'])) {
    $delete = "DELETE FROM users WHERE user_id = '".$_POST['user_id']."'";
    $terUpdateResult = mysqli_query($conn, $delete);
    header('location: all_users.php');
  }
// END DELETE

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="../assets/styles.css?v=4.01">
    <link rel="stylesheet" href="../assets/sidebar.css?v=1.10">

    <title>All Users - CacheUp Blog</title>

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
    <div class="mt-5"></div>
      <h3 class="text-black" style="margin-left: -30px;">
        All Users
      </h3>
      <div class="mt-3"></div>
      <table class="table table-bordered" style="margin-left: -30px;">
        <thead style="background-color: white;">
          <tr>
            <th scope="col">ID #</th>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Posts</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody class="table-group-divider" style="background-color: #f0f0f0;">

        <?php
            $sql = "SELECT * FROM users";
            $all = mysqli_query($conn, $sql);
            if($all) {
                while ($row = mysqli_fetch_assoc($all)) {
                  $user_id     = $row['user_id'];
                  $idno      = $row['idno'];
                  $firstname     = $row['firstname'];
                  $lastname = $row['lastname'];
                  $email = $row['email'];
                  $username = $row['username'];
                  $isadmin = $row['isadmin'];
                  $loggedin = $row['loggedin'];
                  $gender = $row['gender'];
                  $aboutme = $row['aboutme'];
                  $profile_picture = $row['profile_picture'];
                  $joined = $row['joined'];
                  ?>
            <tr>
              <th scope="row"><?php echo $idno; ?></th>
              <td><?php echo $username; ?></td>
              <td><?php echo $firstname; ?> <?php echo $lastname; ?></td>
              <td><?php echo $email; ?></td>
              <?php if($isadmin == 1) { ?>
                <td>Administrator</td>
              <?php } else { ?>
                <td>Standard</td>
              <?php } ?>
              <td>
                <?php
                $sql="SELECT count('1') FROM posts WHERE author_idno = '". $idno ."'";
                $result=mysqli_query($conn,$sql);
                $rowtotal=mysqli_fetch_array($result); 
                echo "$rowtotal[0]";
                ?>
              </td>
              <td>
                <div class="d-flex">
                  <form method="post" action="">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                    <button onclick="return confirm('Password Reset? \r\nAn email is on its way!')" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="reset"><span class="badge text-bg-secondary">Reset Password</span></button>
                  </form>
                  &nbsp;
                  <form method="post" action="">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                    <button onclick="return confirm('Be Careful, Can\'t be undone! \r\nOK to delete?')" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="delete"><span class="badge text-bg-danger">Delete</span></button>
                  </form>
                </div>
              </td>
            <?php }}?>
              
            </tr>
        </tbody>
        <thead class="table-group-divider" style="background-color: white;">
          <tr>
            <th scope="col">ID #</th>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Posts</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
      </table>
    </div>

  </div>


<div class="row">
  <div class="col-2"></div>
  <div class="col position-absolute bottom-0">
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