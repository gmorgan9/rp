<?php

require_once "../app/database/connection.php";
// require_once "app/database/functions.php";
require_once "../path.php";
session_start();

// if(isLoggedIn()){
//   header('location: '. BASE_URL . '/pages/dashboard.php');
// }


if (isset($_POST['submit'])) { 
    $img_name = $_FILES['filename']['name'];
    $tmp_name = $_FILES['filename']['tmp_name'];
    $error = $_FILES['filename']['error'];
    
    if($error === 0){
       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
       $img_ex_to_lc = strtolower($img_ex);

       $allowed_exs = array('jpg', 'jpeg', 'png');
       if(in_array($img_ex_to_lc, $allowed_exs)){
          $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
          $img_upload_path = '/upload/'.$new_img_name;
          // Delete old profile pic
          $old_pp_des = "/upload/$old_pp";
          if(unlink($old_pp_des)){
                // just deleted
                move_uploaded_file($tmp_name, $img_upload_path);
          }else {
             // error or already deleted
                move_uploaded_file($tmp_name, $img_upload_path);
          }
          

          // update the Database
          $idno = $_SESSION['user_idno'];
          $sql = "UPDATE users 
                  SET filename=?
                  WHERE idno='$idno'";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$filename]);
          //$_SESSION['fname'] = $fname;
          //header("Location: ../edit.php?success=Your account has been updated successfully");
           exit;
       }else {
          $em = "You can't upload files of this type";
          //header("Location: ../edit.php?error=$em&$data");
          exit;
       }
    }
   
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

    <title>Profile - CacheUp Blog</title>

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
    <p class="page_title" style="float: left; padding-top: 2px;">Profile</p>
  </div>


  
</div>
<!-- <?php
        // $id = $_SESSION['user_idno'];
        // $sql = "SELECT * FROM users WHERE idno = '$id'";
        // $all = mysqli_query($conn, $sql);
        // if($all) {
        //     while ($row = mysqli_fetch_assoc($all)) {
        //       $firstname      = $row['firstname'];
        //       $user_id        = $row['user_id'];
    ?>
    <br><br><br><br><br>
    <div class="ms-5 ps-5">
    <form method="post" action="">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
        <input class="form-control" type="file" name="filename" />
        <input class="form-control" type="submit" value="Save" name="upload">
    </form>
    </div>
    <?php //}} ?> -->

    <br><br><br><br><br><br>

    <form action="" method="post">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
   
    
        <!-- <?php
        // $query = " SELECT * from users ";
        // $result = mysqli_query($db, $query);
 
        // while ($data = mysqli_fetch_assoc($result)) {
        // ?>
        //     <img src="../upload/<?php //echo $data['filename']; ?>">
 
        // <?php
        // }
        ?> -->


</div>

    
<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

<!-- <script src="../assets/js/new.js"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
  $(document).on('click', 'a', function() {
    $(this).addClass('active').siblings().removeClass('active')
  })
  $(document).on('click', 'ul li a', function() {
    $(this).removeClass('active')
  })
</script>


    <script src="../assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>