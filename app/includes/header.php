<!-- WORKING -->

<?php
// $sID = $_SESSION['sID'];
// $select = " SELECT * FROM student WHERE studentID = '$sID' ";
// $result = mysqli_query($conn, $select);
// if (mysqli_num_rows($result) > 0) {
//    while($row = mysqli_fetch_assoc($result)) {
//     $fname = $row['fname'];
// }}
?>



<!--Main Navigation-->
<header class="fixed-bottom">
    <ul class="navbar-nav ms-auto d-flex flex-row">
        <?php //if(isset($_SESSION['fname'])){ ?>
        <?php //if($row['acc_type'] == 1){ ?>
            <!-- <li class="nav-item"><a class="nav-link me-3 me-lg-0">Welcome, <span style="text-transform: capitalize;"><?php //echo $fname; ?></span>!</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link me-3 me-lg-0" href="<?php //echo BASE_URL . '/admin/profile.php' ?>"><i class="bi bi-person"></i>  Profile</a></li> -->
        <?php //} else { ?>
            <!-- <li class="nav-item"><a class="nav-link me-3 me-lg-0">Welcome, <span style="text-transform: capitalize;"><?php //echo $fname; ?></span>!</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link me-3 me-lg-0" href="<?php //echo BASE_URL . '/pages/profile.php' ?>"><i class="bi bi-person"></i>  Profile</a></li> -->
        <?php //}?>
            <!-- <li class="nav-item"><a class="nav-link me-3 me-lg-0" href="<?php //echo BASE_URL . '/logout.php' ?>">Logout</a></li> -->
        <?php //} else { ?>
            <li class="nav-item"><a class="nav-link me-3 me-lg-0" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link me-3 me-lg-0" href="pages/entry/login.php">Login/Signup</a></li>
        <?php //} ?>
    </ul>

</header>

<?php  ?>