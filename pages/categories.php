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
if (isset($_POST['published'])) {
  $appUpdateQuery = "UPDATE posts SET published = 1 WHERE post_id = '".$_POST['post_id']."'";
  $appUpdateResult = mysqli_query($conn, $appUpdateQuery);
  header('location: posts.php');
}
?>

<?php
if (isset($_POST['draft'])) {
  $appUpdateQuery = "UPDATE posts SET published = 0 WHERE post_id = '".$_POST['post_id']."'";
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


    <link rel="stylesheet" href="../assets/styles.css?v=2.12">

    <title>Categories - CacheUp Blog</title>

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
    <!-- START MAIN_CONTENT -->
        <div class="main-content">
            <!-- START ADD COMPANY (LEFT SIDE) -->
    <div class="page-content" style="margin-top: 12px; width: 32%;margin-left: -45px; height: unset !important;">
    <form action="" method="post">
    <div class="section-header pt-2">
      <span class="text-muted pt-4" style="width: 95%;">Job Requests</span>
    </div>
    <hr style="margin-bottom: -5px; margin-top: 5px;">
    <?php 

    $sql = "SELECT * FROM employee";
    $all = mysqli_query($conn, $sql);
      if($all) {
        while ($row = mysqli_fetch_assoc($all)) {
    
    $fname = $row['fname'];
    $lname = $row['lname']; 
    $employeeID = $row['idno']?>
    <?php }} ?>
      <input class="form-control" id="employee_fname" type="hidden" name="employee_fname" value="<?php echo $fname; ?>">
      <input class="form-control" id="employee_lname" type="hidden" name="employee_lname" value="<?php echo $lname; ?>">
      <input class="form-control" id="employee_idno" type="hidden" name="employee_idno" value="<?php echo $employeeID; ?>">
    <div class="form-group pt-3 mx-auto" style="width: 95%;">
      <label for="companyname" style="font-size: 14px;">Company <span class="text-muted" style="font-size: 10px;">e.g. "Apple Corporation"</span></label>
      <input class="form-control" id="companyname" type="text" name="companyname" value="" required>
    </div>
    <div class="form-group pt-3 mx-auto" style="width: 95%;">
      <label for="deptname" style="font-size: 14px;">Department <span class="text-muted" style="font-size: 10px;">e.g. "Accounting"</span></label>
      <input class="form-control" id="deptname" type="text" name="deptname" value="" required>
    </div>
    <div class="form-group pt-3 mx-auto" style="width: 95%;">
      <label for="jobtitle" style="font-size: 14px;">Job Title / Position <span class="text-muted" style="font-size: 10px;">e.g. "Chief Executive Officer"</span></label>
      <input class="form-control" id="jobtitle" type="text" name="jobtitle" value="" required>
    </div>
    <div class="form-group pt-3 mx-auto d-grid d-md-flex justify-content-md-end" style="width: 95%; margin-bottom: 10px;">
      <button type="submit" style="border-color: rgba(0,0,0,0);" name="add-job" class="badge text-bg-secondary">Request Job</button>
    </div>
    </form>
    </div>
  <!-- END ADD JOB (LEFT SIDE) -->

  <!-- START JOB-REQUEST (RIGHT SIDE) -->
    <div class="page-content mt-2 float-end" style="width: 65%; margin-right: 10px;">
    <table class="table">
    <thead>
      <tr>
        <th scope="col" style="font-size: 14px;">ID #</th>
        <th scope="col" style="font-size: 14px;">Job Title / Position</th>
        <th scope="col" style="font-size: 14px;">Status</th>
        <th scope="col" style="font-size: 14px;">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">

    <?php
        $sql = "SELECT * FROM job WHERE approval_status != 'terminated'";
        $all = mysqli_query($conn, $sql);
        if($all) {
            while ($row = mysqli_fetch_assoc($all)) {
              $jobID       = $row['jobID'];
              $idno        = $row['idno'];
              $jobtitle    = $row['jobtitle'];
              $companyname = $row['companyname'];
              $deptname    = $row['deptname'];
              $app_status  = $row['approval_status'];
              // $companyname    = $row['companyname'];
    ?>
      <tr>
          <th scope="row"><?php echo $idno; ?></th>
          <td><?php echo $jobtitle; ?></td>
          <?php if($app_status == 'approved'){ ?>
          <td><span class="text-capitalize text-success"><?php echo $app_status; ?><span></td>
          <?php } if($app_status == 'rejected') { ?>
            <td><span class="text-capitalize text-danger"><?php echo $app_status; ?><span></td>
          <?php } if($app_status == 'pending') { ?>
            <td><span class="text-capitalize text-primary"><?php echo $app_status; ?><span></td>
          <?php } if($app_status == 'terminated') { ?>
            <td><span class="text-capitalize text-danger"><?php echo $app_status; ?><span></td>
          <?php }?>
          <!-- <td><?php //echo $companyname; ?></td> -->
          <td>
            <form method="post" action="">
              <input type="hidden" name="jobID" value="<?php echo $jobID; ?>" />
              <button onclick="return confirm('Be Careful, Can\'t be undone! \r\nOK to delete?')" style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" type="submit" name="terminated"><span class="badge text-bg-danger">Delete</span></button>
            </form>
          </td>
          <?php } ?>
          
          
        </tbody>
        </table> 
        <?php 
        } else {
          echo "0 results";
        }
          ?>
      </div>
    

    
        </div>
    <!-- END MAIN-CONTENT -->




    
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