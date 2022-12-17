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

<div id="sidebarMenu" class=" sidebar">
    
<div class="position-sticky">
    <!-- <div class="logo-block logo" style="height: 150px; background-color: #0B4F6C"> -->
        
        <!-- </div> -->
        <div class="list-group list-group-flush mt-4">

			<div class="accordion mb-2" id="accordionExample">

            <!-- DASHBOARD -->
                <a href="<?php echo BASE_URL . '/cu-admin/' ?>" style="text-decoration: none;" class="text-muted ps-2 side">
                    <i class="bi bi-speedometer2"></i>&nbsp;
                    <span>  Dashboard</span>
                </a>

            <!-- END DASHBOARD -->

            <!-- POSTS -->
            <br>
            <a href="#" s style="text-decoration: none;" class="text-muted ps-2 side" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <i class="bi bi-pin-angle"></i>&nbsp;
                <span>  Posts</span>
            </a>
					<div  id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #6e6e6e83 ; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="<?php echo BASE_URL . '/pages/all_posts.php' ?>"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="<?php echo BASE_URL . '/pages/add_posts.php' ?>"> Add New</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="<?php echo BASE_URL . '/pages/categories.php' ?>"> Categories</a></li>
							</ul>
						
					</div>

                <!-- END POSTS -->

                <!-- COMMENTS -->

				<!-- <a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #1f1f1f ;" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <span>  Comments<i class="bi bi-chevron-down" style="float: right;"></i></span>
                </a>
					<div  id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #6e6e6e83 ; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Add new</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Categories</a></li>
							</ul>
						
					</div> -->

                    <span>
                        <a href="<?php echo BASE_URL . '/cu-admin/comments.php' ?>" style="background-color: #1f1f1f" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true">
                        <span>  Comments</span>
                        </a>
                    </span>


                <!-- END COMMENTS -->

            <!-- PROFILE -->
                <span>
                <a href="<?php echo BASE_URL . '/cu-admin/profile.php' ?>" style="background-color: #1f1f1f" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <span>  Profile</span>
                </a>
                </span>

            <!-- END PROFILE -->

                <!-- LOGOUT -->

                <a href="<?php echo BASE_URL . '/logout.php' ?>" style="background-color: #1f1f1f" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="bi bi-sliders2"></i>
                    <span>  Logout</span>
                </a>

                <!-- END LOGOUT -->

            
                    <br><br>

                    <span class="fw-bold text-white">&nbsp;&nbsp; Admin Links</span>


                <!-- USERS -->

				<a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #1f1f1f ;" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <span>  Users<i class="bi bi-chevron-down" style="float: right;"></i></span>
                </a>
					<div  id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #6e6e6e83 ; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> All Users</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Permissions</a></li>
							</ul>
						
					</div>

                <!-- END USERS -->
                
			</div>
		</div>
	</div>
</div>



<!-- <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            
            <a href="<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <i class="bi bi-sliders2"></i>
                <span>  Dashboard</span>
            </a>
            <?php //if($_SESSION['acc_type'] == 0) { ?>
            <a href="<?php //echo BASE_URL . '/pages/class-schedule.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                <i class="bi bi-calendar-range"></i>
                <span>  Schedule</span>
            </a>
            <a href="<?php //echo BASE_URL . '/pages/assignments.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                <i class="bi bi-journal-bookmark"></i>
                <span>  Assignments</span>
            </a>
            <?php //} ?>

            <?php //if($_SESSION['acc_type'] == 1){ ?>
                <br>
                <span style="margin-left: 38px; margin-bottom: -10px;">Admin Links</span>
                <hr>
                <a style="margin-top: -15px;" href="<?php //echo BASE_URL . '/admin/students.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-person-badge"></i>
                    <span>  Students</span>
                </a>
                <?php 
                ////WHERE approval_status = 'pending' OR approval_status = 'terminated' 
                //$sql = " SELECT * FROM course WHERE approval_status = 'pending' OR approval_status = 'terminated'";
               // if ($result = mysqli_query($conn, $sql)) {
               //     $rowcount = mysqli_num_rows( $result );
                ?>
                <a href="<?php //echo BASE_URL . '/admin/courses.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-briefcase"></i>
                    <?php //if($rowcount == 0){ ?>
                        <span>  Courses</span>
                    <?php //} else { ?>
                        <span>  Courses</span> &nbsp;  <span class="badge rounded-pill text-bg-danger" style="margin-top: -10px ;"><?php echo $rowcount; ?></span>
                    <?php //} ?>
                </a>
                <?php 
                //// WHERE approval_status = 'pending' OR approval_status = 'terminated' 
                //$sql = " SELECT * FROM assignment";
                //if ($result = mysqli_query($conn, $sql)) {
                //    $rowcount = mysqli_num_rows( $result );
                ?>
                <a href="<?php //echo BASE_URL . '/pages/assignments.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-calendar-range"></i>
                    <?php //if($rowcount == 0){ ?>
                        <span>  Assignments</span>
                    <?php //} else { ?>
                        <span>  Assignments</span> &nbsp;  <span class="badge rounded-pill text-bg-danger" style="margin-top: -10px ;"><?php echo $rowcount; ?></span>
                    <?php //}} ?>
                </a>
                <a href="<?php //echo BASE_URL . '/admin/semester.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-calendar3"></i>
                    <span>  Semester</span>
                </a>
                <a href="<?php //echo BASE_URL . '/admin/reports.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-bar-chart"></i>
                    <span>  Reports</span>
                </a>
                <?php //} ?>
            <?php //} else {?>
                <br>
                <span style="margin-left: 38px; margin-bottom: -10px;">Student Links</span>
                <hr>
                <a style="margin-top: -15px;" href="<?php //echo BASE_URL . '/pages/course-request.php' ?>" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="bi bi-briefcase"></i>
                    <span>  Request a Course</span>
                </a>

           <?php //} ?>
        </div>
    </div>
</nav> -->