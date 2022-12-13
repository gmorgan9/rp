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
if(isset($_POST['update'])){
  //$idno  = rand(10000, 99999);
  $profile_picture = mysqli_real_escape_string($conn, $_POST['profile_picture']);


  date_default_timezone_set('America/Denver');
  $date = date('F d, Y, g:i a', time());

  $insert = "UPDATE users SET profile_picture = '$profile_picture' WHERE idno = '".$_POST['idno']."'";
  mysqli_query($conn, $insert);
  header("location: profile.php");

};

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

    <script src="https://cdn.tiny.cloud/1/7kainuaawjddfzf3pj7t2fm3qdjgq5smjfjtsw3l4kqfd1h4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Profile - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
// $user_id = $_SESSION['user_id'];
// $select = "SELECT * FROM users WHERE user_id = $user_id";
// $result = mysqli_query($conn, $select);
// if (mysqli_num_rows($result) > 0) {
//    while($row = mysqli_fetch_assoc($result)) {
//     $firstname    = $row['firstname'];
//     $lastname     = $row['lastname'];
// }}
// $select = "SELECT * FROM categories";
// $result = mysqli_query($conn, $select);
// if (mysqli_num_rows($result) > 0) {
//    while($row = mysqli_fetch_assoc($result)) {
//     $cat_id    = $row['cat_id'];
//     $category  = $row['category'];
// }}
?>
    
<div class="main-container">
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">
    <div class="page-header mx-auto">
        <p class="page_title">Add New Post</p>
    </div>

    <div class="main-content">
    
    <?php
$id = $_SESSION['user_idno'];
$select = "SELECT * FROM users WHERE idno = '$id' ";
$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {

?>


    <form action="" method="POST">
        <h3>
            New Post
        </h3>
        <div class="modal_help float-end" style="margin-right: 25px; margin-top: -55px !important;">

          <!-- Button trigger modal -->
            <button type="button" style="background: none; color: inherit; border: none; cursor: pointer; outline: inherit;" class="badge text-bg-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Instructions
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Instructions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-black">
                    Things you will want to pay attention to while creating a new post for our blog. If you have any questions, please reach out via email, I will try and get back to you all as soon as possible.
                    <ul>
                      <li>For all images wanting to be insertted, please have a link for your image ready. a useful site to help you get a link for images would be: <a href="https://postimages.org" target="_blank">https://postimages.org</a>.</li>
                        <li>The width for all images need to be <strong>835</strong>.</li>
                    </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary text-black">Save changes</button> -->
                  </div>
                </div>
              </div>
            </div>




        </div>
        <div class="d-flex">
            <div>
                <label>First Name</label>
                <input class="form-control" type="hidden" name="idno" value="<?php echo $row['idno']; ?>">
                <input class="form-control" style="width: 45%;" type="text" name="title" value="<?php echo $row['firstname']; ?>">
            </div>
            <div>
                <label>Last Name</label>
                <input class="form-control" style="width: 45%;" type="text" name="title" value="<?php echo $row['lastname']; ?>">
            </div>
        </div>
        <div class="pt-3"></div>
        <div>
            <label>Gender</label>
            <select style="width: 99%;" name="gender" class="form-control">
                <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <textarea name="profile_picture" id="content" style="width: 99%;"><?php echo $row['profile_picture']; ?></textarea>
        <br>
        <input type="submit" name="update" value="Update" class="btn btn-light btn-block"> &nbsp;
        <button class="btn btn-dark btn-block" onclick="window.history.go(-1); return false;">Go Back</button>
    </form>
   
    </div>


    <?php }} ?>



    
    
</div>








<script>
    tinymce.init({
      selector: 'textarea#content',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>
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