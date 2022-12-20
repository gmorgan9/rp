<?php
date_default_timezone_set('America/Denver');
require_once "../app/database/connection.php";
require_once "../app/database/functions.php";
require_once "../path.php";
session_start();

if(isLoggedIn() == false){
  header('location: '. BASE_URL . '/cu-login.php');
}


if (isset($_POST['reset'])) {
  $appUpdateQuery = "UPDATE users SET reset = 1 WHERE user_id = '".$_POST['user_id']."'";
  $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
  header('location: profile.php');
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

    <link rel="stylesheet" href="../assets/styles.css?v=4.11">
    <link rel="stylesheet" href="../assets/sidebar.css?v=1.10">

    <script src="https://cdn.tiny.cloud/1/7kainuaawjddfzf3pj7t2fm3qdjgq5smjfjtsw3l4kqfd1h4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Profile - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="margin:0;padding:0;">

<?php
$user_id = $_SESSION['user_id'];
$select = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    $user_id          = $row['user_id'];
    $firstname        = $row['firstname'];
    $lastname         = $row['lastname'];
    $email            = $row['email'];
    $idno             = $row['idno'];
    $username         = $row['username'];
    $gender           = $row['gender'];
    $about_me         = $row['about_me'];
    $profile_picture  = $row['profile_picture'];
    $joined           = $row['joined'];
}}
?>

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
      <div class="col-10" style="margin-left: -30px;">
        <h3 class="text-black">
          Profile
        </h3>
        <div class="mt-3"></div>



        <section>
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4" style="z-index: -2;">
                <div class="card-body text-center">
                  <img src="<?php echo $profile_picture; ?>" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 200px; height: 250px;">
                  <h5 class="my-3"><?php echo $firstname; ?> <?php echo $lastname; ?></h5>
                  <p class="text-muted mb-3"><?php echo $username; ?></p>
                  <!-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
                  <div class="justify-content-center mb-2">
                    <h6>Blog Post Stats</h6>
                    <div class="d-flex justify-content-center">
                        <div class="badge text-bg-success me-2">
                        <?php
                        $sql="SELECT count('1') FROM posts WHERE author_idno = '".$_SESSION['user_idno']."' AND status = 'published'";
                        $result=mysqli_query($conn,$sql);
                        $rowtotal=mysqli_fetch_array($result); 
                        echo "$rowtotal[0] Published";
                        ?>
                        </div>
                        <div class="badge text-bg-primary">
                        <?php
                        $sql="SELECT count('1') FROM posts WHERE author_idno = '".$_SESSION['user_idno']."' AND status = 'draft'";
                        $result=mysqli_query($conn,$sql);
                        $rowtotal=mysqli_fetch_array($result); 
                        echo "$rowtotal[0] Drafts";
                        ?>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4" style="z-index: -2;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $firstname; ?> <?php echo $lastname; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">User ID</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $idno; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $email; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Gender</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $gender; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Joined</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $joined; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">About Me</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $about_me; ?></p>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="d-flex">
                <a href="edit_account.php?id=<?php echo $user_id; ?>" class="btn btn-outline-success">
                  Edit Account
                </a>
                &nbsp;&nbsp;
                <form method="post" action="">
                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                  <button onclick="return confirm('Password Reset? \r\nAn email is on its way!')" type="submit" name="reset" class="btn btn-outline-secondary">Reset Password</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>





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
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/bar.js"></script>
  <script src="../assets/js/dropdown.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>