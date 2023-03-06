<?php
require_once "app/database/connection.php";
require_once "path.php";
session_start();
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


    <link rel="stylesheet" href="assets/blog.css?v=5.08">

    <title>Recipe Pro</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
      .log-link:hover {
        color: #47a0c9 !important;
      }
      .head-link:hover {
        color: #47a0c9 !important;
      }

      /* DROPDOWN */
.menu-btn {
  padding: 5px;
  background-color: transparent;
  border: none;
}
.dropdown-menu {
  margin-top: -5px;
  border: none;
  background-color: transparent;
  position: relative;
  display: block;
}
.menu-content {
  /* margin-left: -25% !important; */
  padding-top: 10px;
  /* margin-top: 6px; */
  background-color: #1e2327 !important;
  /* background-color: #2d3337; */
  display: none;
  position: absolute;
  /* min-width: 200px; */
  /* z-index: 9999; */
}
.a-link {
  width: 100%;
}
.a-link:hover {
  width: 100%;
}
.links {
  padding: 8px;
  font-size: 12px;
  text-decoration: none;
  display: block;
  font-weight: bold;
}
.links:hover {
  color: #7fade1 !important;
}
.dropdown-menu:hover .menu-content {
  display: block;
}
.dropdown-menu:hover .menu-btn {
  /* background-color: #2d3337; */
  background-color: #1e2327 !important;
  padding: 5px;
}
      .bc-link:hover {
        color: #03c6fc !important;
      }
      .recent-link:hover {
        color: #03c6fc !important;
      }
      .cat-link:hover {
        color: #03c6fc !important;
      }
      form-control:focus {
        border-color: #58c5f7 !important;
      }
      .btn:hover {
        border-color: #47a0c9 !important;
        background-color: #47a0c9 !important;
      }
      .reply:hover {
        background-color: #58c5f7 !important;
        color: white !important;
        cursor: pointer;
        border-radius: 5px;
        height: 20px;
        padding: 0px 5px;
        font-size: 12px;
      }
      .reply {
        cursor: pointer;
        height: 20px;
        padding: 0px 5px;
        font-size: 12px;
        text-decoration: none;
      }
      .website-btn:hover {
        border-color: #47a0c9 !important;
        background-color: #47a0c9 !important;
      }
      .post-link:hover {
        color: #47a0c9 !important;
      }
      pre {
        color: white;
        padding: 10px;
        border-radius: 15px;
        background-color: #4f4f4f;
      }
      #myBtn {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 20px; /* Place the button at the bottom of the page */
        right: 30px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        border: none; /* Remove borders */
        outline: none; /* Remove outline */
        background-color: #58c5f7 !important; /* Set a background color */
        color: white; /* Text color */
        cursor: pointer; /* Add a mouse pointer on hover */
        padding: 7px 10px; /* Some padding */
        border-radius: 25px; /* Rounded corners */
        font-size: 14px; /* Increase font size */
      }

      #myBtn:hover {
        background-color: #47a0c9 !important; /* Add a dark-grey background on hover */
      }

      p img {
        width: 100%;
      }
    </style>
</head>
<body>

<div class="blocked-page">
  <?php include(ROOT_PATH . '/app/includes/blocked-page.php'); ?>
</div>

<?php
$loggedin = $_SESSION['loggedin'];
if($loggedin == 1) { ?>
  
  <div class="position-fixed row" style="z-index: 1; width: 100.75% !important; background-color: #1e2327; height: 30px;">
    <div class="col">
      <p class="text-start" style="margin-top: 5px; font-size: 12px;"><img class="ms-3" src="../assets/images/new-logo.png" style="height: 20px !important; width: 20px !important;" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="log-link text-white" style="text-decoration: none;" href="<?php echo BASE_URL . '/rp-admin/' ?>"><i class="bi bi-speedometer2"></i>&nbsp;Dashboard</a></p>
    </div>
    <div class="col">


      <!-- start dropdown -->
        <div class="dropdown-menu text-end float-end" style="">
          <a style="font-size: 12px; text-decoration: none; color: white;" href="/" class="log-link menu-btn text-white">
            Welcome, <?php echo $_SESSION['username']; ?> <i class="text-white bi bi-person-square"></i> 
          </a>
          <div class="menu-content" style="">
              <div class="float-start">
                  <i class="bi bi-person-square text-muted" style="font-size: 45px;margin-left: 15px;"></i>
              </div>
              <div class="float-end" style="margin-right: 15px;">
                  <a class="links text-white" href="<?php echo BASE_URL . '/rp-admin/profile.php' ?>">Edit Profile</a>
                  <a class="links text-white" href="<?php echo BASE_URL . '/logout.php' ?>">Log Out</a>
                  <div class="pb-3"></div>
              </div>
          </div>
        </div>
      <!-- end dropdown -->
    
    </div> 
  </div>

<?php } else {}

?>


<?php
$user_id = $_SESSION['user_id'];
$select = " SELECT * FROM users WHERE user_id = '$user_id' ";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    $firstname    = $row['firstname'];
    $loggedin     = $row['loggedin'];
    $acct_type    = $row['isadmin'];
}}
?>
    
<div class="main-container">
        
<div class="main">

<!-- start header -->
  <div class="page-header">
    <div class="left">
      <a href="/">
        <img src="/assets/images/new-white.png" width="230px" class="text-center" style="margin-top: 3.5%; margin-left: 2%;" alt="">
      </a>
    </div>
    <div class="right">
      <a href="<?php echo BASE_URL . '/search.php' ?>" class="text-decoration-none text-white">
        <i class="bi bi-search">&nbsp;&nbsp;&nbsp;&nbsp;</i>
      </a>
      <button class="btn talk-btn">
        <a href="mailto:garrett.morgan.pro@gmail.com" class="text-decoration-none">
          LET'S TALK
        </a>
      </button>
    </div>
  </div>
<!-- end header -->


<!-- start blog recipes -->
  <!-- start BLOG -->
    <?php
    $id = $_GET['id'];
    $select = "SELECT * FROM recipes WHERE post_id = '$id' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
        $post_idno = $row['idno'];
        $title     = $row['title'];
        $cat       = $row['category'];
        $post_id   = $row['post_id'];


        $grab = " SELECT * FROM categories WHERE idno = '$cat' ";
        $result2 = mysqli_query($conn, $grab);
        if (mysqli_num_rows($result2) > 0) {
          while($new = mysqli_fetch_assoc($result2)) {
            $name    = $new['category'];
        }}




    ?>

    <div class="blog_post mb-5 mt-5 ms-5 p-5" id="blog_style" style="float: left; width: 65%; background-color: #1f1f1f;">

      <nav class="mb-5" aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>'; breadcrumb-divider-color: white;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" style="font-size: 12px;"><a href="/" class="text-decoration-none text-uppercase" style="color: #03c6fc !important;">Home</a></li>
          <li class="breadcrumb-item" style="font-size: 12px;"><a href="category.php?id=<?php echo $cat; ?>" class="text-decoration-none text-uppercase" style="color: #03c6fc !important;"><?php echo $name; ?></a></li>
          <li class="breadcrumb-item active text-white text-uppercase" aria-current="page" style="font-size: 12px;"><?php echo $row['title']; ?></li>
        </ol>
      </nav>


      <h1 class="fw-bold">
          <?php echo $row['title']; ?>
      </h1>


      <?php
    $idno = $row['author_idno'];
    $profile = "SELECT * FROM users WHERE idno = '$idno'";
    $another = mysqli_query($conn, $profile);
    if (mysqli_num_rows($another) > 0) {
       while($col = mysqli_fetch_assoc($another)) {
        $profile_picture  = $col['profile_picture'];
        $author           = $col['username'];
        $idno             = $col['idno'];
        $author_idno      = $col['author_idno'];
      }}

    ?>

      <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li style="margin-top: -4.5px;"><img style="border: 1px solid #969696; border-radius: 100%;" src="<?php echo $profile_picture; ?>" width="20px" height="20px" alt=""></li>&nbsp;&nbsp;
          <li class="breadcrumb-item" style="font-size: 12px;"><a href="author.php?id=<?php echo $idno; ?>" class="bc-link text-decoration-none text-uppercase text-white"><?php echo $row['author']; ?></a></li>
          <li class="breadcrumb-item text-uppercase" style="font-size: 12px;"><?php echo $row['published_date']; ?></li>
          <li class="breadcrumb-item text-white text-uppercase" style="font-size: 12px;"><a href="category.php?id=<?php echo $cat; ?>" class="bc-link text-decoration-none text-uppercase text-white"><?php echo $name; ?></a></li>
          <?php
                $sql="SELECT count('1') FROM comments WHERE post_id = '$post_id' AND status = 1";
                $result=mysqli_query($conn,$sql);
                $rowtotal=mysqli_fetch_array($result); 
                if($rowtotal[0] > 1){ ?>
                <li class="breadcrumb-item text-white text-uppercase" style="font-size: 12px;"><a href="#comments" class="bc-link text-decoration-none text-uppercase text-white">
                  <?php echo "$rowtotal[0] Comments"; ?>
                </a></li>
                <?php } elseif($rowtotal[0] == 1) { ?>
                <li class="breadcrumb-item text-white text-uppercase" style="font-size: 12px;"><a href="#comments" class="bc-link text-decoration-none text-uppercase text-white">
                  <?php echo "$rowtotal[0] Comment"; ?>
                </a></li>
                <?php } else {} ?>
          
        </ol>
      </nav>


      <p class="preview-text">
          <?php echo html_entity_decode($row['content']); ?>
      </p>
  <!-- END BLOG -->

  <!-- TAGS -->
      <div class="tags">
      <?php
      $id = $_GET['id'];
      $grab = "SELECT * FROM recipes WHERE post_id = '$id' ";
      $comma = mysqli_query($conn, $grab);

      while($rows = mysqli_fetch_assoc($comma)) {
         $mark = explode(',', $rows['tags']);//what will do here
         foreach($mark as $out) {
            echo "<div class='btn btn-outline-secondary'>"; 
            echo "# " . $out;
            echo "</div> &nbsp;";
         }
      }

      ?>
      </div>
  <!-- END TAGS -->

  <!-- social links -->
    <br>
    <!-- Linkedin -->
    <div class="social-links">
      <a class="btn btn-primary" style="background-color: #0082ca; border:none !important;" href="#!" role="button"
        ><i class="bi bi-linkedin"></i>
      </a>
      &nbsp; &nbsp; &nbsp;
      <!-- Email -->
      <a class="btn btn-primary" style="background-color: #333333; border:none !important;" href="#!" role="button">
        <i class="bi bi-envelope-fill"></i>
      </a>
      &nbsp; &nbsp; &nbsp;
      <!-- Facebook -->
      <a class="btn btn-primary" style="background-color: #3b5998; border:none !important;" href="#!" role="button">
        <i class="bi bi-facebook"></i>
      </a>
    </div>

  <!-- end social links -->

  <!-- Author Box -->
    <br><br>
    <div class="top-hr d-flex">
    &nbsp;&nbsp;<hr style="width:45%;"> &nbsp;&nbsp; <img style="border: 1px solid #969696; border-radius: 100%; margin-top: -10px;" src="<?php echo $profile_picture; ?>" width="60px" height="60px" alt=""> &nbsp;&nbsp; <hr style="width:45%;">&nbsp;&nbsp;
    </div>

    <br>

    <h4 class="text-center"><?php echo $author; ?></h4>
    <div class="pt-3"></div>

    <div class="text-center">
    <a
    class="website-btn"
    style="background-color: #03c6fc; color: white; padding: 7px 10px; border-radius: 75px; margin-top: 10px;"
    href="https://resume.morganserver.com/"
    target="_blank"
    ><i class="bi bi-globe"></i
    ></a>
    </div>
    <p class="text-center text-uppercase" style="font-size: 12px; margin-top: 20px;">
    <a class="post-link" style="text-decoration: none; color: #58c5f7;" href="author.php?id=<?php echo $idno; ?>">
    <?php
    $sql="SELECT count('1') FROM recipes WHERE author_idno = '$idno' AND status = 'published'";
    $result=mysqli_query($conn,$sql);
    $rowtotal=mysqli_fetch_array($result); 
    echo "recipes: $rowtotal[0]";
    ?>
    </a>
    </p>
    

    <br>
    <div class="top-hr d-flex">
    &nbsp;&nbsp;<hr style="width:98%;">&nbsp;&nbsp;
    </div>


  <!-- END Author Box -->

  <!-- Comments -->

    <?php
    // if(isset($_POST['post'])){
    //   $idno  = rand(10000, 99999); // figure how to not allow duplicates
    //   $post_idno = mysqli_real_escape_string($conn, $_POST['post_idno']);
    //   $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
    //   $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    //   $parent_idno = mysqli_real_escape_string($conn, $_POST['parent_idno']);
    //   $name = mysqli_real_escape_string($conn, $_POST['name']);
    //   $email = mysqli_real_escape_string($conn, $_POST['email']);
    //   $content = mysqli_real_escape_string($conn, $_POST['content']);

    //   $insert = "INSERT INTO `comments`(`idno`, `post_idno`, `post_id`, `post_title`, `name`, `email`, `content`) VALUES ('$idno','$post_idno','$post_id', '$post_title', '$name','$email','$content');";
    //   mysqli_query($conn, $insert);
    //   header('Location: ' . $_SERVER['HTTP_REFERER']);
    // };

    ?>

    <!-- <form action="" method="POST">
    <h4>Leave a Comment</h4>
    <input type="hidden" name="post_idno" value="<?php //echo $post_idno; ?>" class="text-muted form-control">
    <input type="hidden" name="post_title" value="<?php //echo $title; ?>">
    <input type="hidden" name="post_id" value="<?php //echo $id; ?>" class="text-muted form-control">
    <p class="text-muted" style="font-size: 12px;">Your email address will not be published. Required fields are marked <span style="color: red;">*</span></p>
    <div class="d-flex">
      <div class="form-group w-50">
        <label for="name">Full Name <span style="color: red;">*</span></label>
        <input style="background-color: #1f1f1f !important; border-color: #6e757c !important;" name="name" type="text" id="name" class="text-muted form-control">
      </div> &nbsp;&nbsp;
      <div class="form-group w-50">
        <label for="email">Email <span style="color: red;">*</span></label>
        <input style="background-color: #1f1f1f !important; border-color: #6e757c !important;" type="text" name="email" id="email" class="text-muted form-control">
      </div>
    </div>
    <br>
    <div class="form-group">
      <label for="comment">Comment <span style="color: red;">*</span></label>
      <textarea style="background-color: #1f1f1f !important; border-color: #6e757c !important;" class="text-muted form-control" name="content" id="comment" cols="30" rows="10"></textarea>
    </div>
    <br> -->
    <!-- <button style="background-color: #58c5f7; color: white; border-color: #58c5f7;" name="post" type="submit" class="com-btn btn btn-outline-secondary">Post Comment</button> -->
    <!-- <input type="submit" name="post" value="Post Comment" style="background-color: #58c5f7; color: white; border-color: #58c5f7;" class="com-btn btn btn-outline-secondary">

    </form> -->
  <!-- End Comments -->

  <!-- Display Comments -->
    <!-- <br>
    <hr>
    <br>
    <h4> -->
      <?php
      // $sql="SELECT count('1') FROM comments WHERE post_idno = '$post_idno' AND status = '1'";
      // $result=mysqli_query($conn,$sql);
      // $rowtotal=mysqli_fetch_array($result);
      // if($rowtotal[0] == 1) {
      //   echo "$rowtotal[0] Comment";
      // } else {
      //   echo "$rowtotal[0] Comments";
      // }
      ?>
    <!-- </h4>
    <br>
    <hr> -->
    <?php
      // $query ="SELECT * FROM comments WHERE post_idno = '$post_idno' AND status = '1'";
      // $result = $conn->query($query);
      // if($result->num_rows> 0){
      //   $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
      // }

      // $date = date('d-m-Y', strtotime($submit_date));

    ?>
    
    <?php //foreach ($options as $option) { 
      ?>
      
      <!-- <br>

      <div class="container ms-3" id="comments">
        <div class="row">
          <div class="col-9">
            <h5><?php //echo $option['name']; ?></h5>
          </div>
          <div class="col" style="">
            <p class="text-muted" style="font-size: 12px;"><?php //echo date('F j, Y / g:i a', strtotime($option['submit_date'])); ?></p>
            &nbsp;&nbsp;
          </div> -->
          <!-- <div class="col" style="margin-top: -3px;">
            <a class="reply text-muted" href="#">Reply</a>
          </div> -->
        <!-- </div>
        <div class="row">
          <div class="col">
            <p class="text-muted row-2"><?php //echo $option['content']; ?></p>
          </div>
        </div>
      </div>

      <br>
      <hr style=""> -->


    <?php //} ?>


  <!-- END Display Comments -->
  
  </div>
  <!-- sidebar -->
    
    <div class="side" id="side" style="float: right; top: 0; right: 0; margin-top: 0; margin-right: 0 !important; padding-right: 0 !important; background-color: #1f1f1f; width: 30%;">  
      <div class="side-content" id="side_content" style="position: -webkit-sticky; position: sticky; top: 35px; margin-top: 45px; padding-left: 4%; padding-top: 2%;">
      <!-- recent recipes -->
        <h4>
          Recent recipes
        </h4>
        <div class="pb-3"></div>
        <!-- end function -->
          <?php
            $query ="SELECT * FROM recipes WHERE status = 'published' LIMIT 4";
            $result = $conn->query($query);
            if($result->num_rows> 0){
              $recipes= mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
          ?>
          <?php foreach ($recipes as $post) {?>
        <!-- end function -->
        <p style="line-height: 1 !important;">
          <a class="recent-link text-muted" style="font-size: 14px; text-decoration: none;" href="<?php echo BASE_URL . '/single_post.php?id= '. $post['post_id']; ?>">
            <?php echo $post['title']; ?>
          </a>
        </p>

        <?php } ?>
      <!-- end recent recipes -->
      <!-- categories -->
      <div class="pb-4"></div>
        <h4>
          Categories
        </h4>
        <div class="pb-3"></div>
        <!-- end function -->
        <?php
            $query ="SELECT * FROM categories";
            $result = $conn->query($query);
            if($result->num_rows> 0){
              $cats= mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
          ?>
          <?php foreach ($cats as $cat) {?>
        <!-- end function -->
        <p style="line-height: 1 !important;">
          <a class="cat-link text-muted" style="font-size: 14px; text-decoration: none;" href="category.php?id=<?php echo $cat['idno']; ?>">
            <?php echo $cat['category']; ?>
          </a>
        </p>

        <?php } ?>
      </div>
    </div>
  <!-- end sidebar -->

  <?php }} ?>



    </div>
<!-- end blog recipes -->



</div>

<!-- end main -->
</div>
<!-- end main-container -->




<!-- TOP button and Script -->
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-caret-up-fill"></i></button>
  <script>
    // Get the button:
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
  </script>
<!-- END TOP button and Script -->

<!-- Other Scripts and Footer -->
  <script src="assets/js/dropdown.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- END Other Scripts and Footer -->

<!-- scroll script -->
  <script>
  // $(document).ready(function () {
  //    var el = $('#side_content');
  //       var originalelpos = el.offset().top; // take it where it originally is on the page

  //       //run on scroll
  //       $(window).scroll(function () {
  //           var elpos = el.offset().top; // take current situation
  //           var windowpos = $(window).scrollTop();
  //           var finaldestination = elpos + originalelpos;
  //           el.stop().animate({ 'top': finaldestination }, 1000);
  //       });
  //   });
  </script>
<!-- end scroll script -->
<!-- adds height -->
  <script>
  divElem = document.querySelector("#blog_style");
  elemHgt = divElem.offsetHeight + 48;
  const side = document.querySelector('#side');
  side.style.height = elemHgt + "px";
  </script>
<!-- end adds height -->
</body>
</html>