<div id="sidebarMenu" class="d-lg-block bg-white sidebar">
    
<div class="position-sticky">
    <!-- <div class="logo-block logo" style="height: 150px; background-color: #0B4F6C"> -->
        <a  class="navbar-brand"  href="/">
            <img src="/assets/images/white-logo.png" width="230px" class="text-center logo" alt="">
        </a>
        <!-- </div> -->
        <div class="list-group list-group-flush mx-3 mt-4">

			<div class="accordion mb-2" id="accordionExample">

            <!-- DASHBOARD -->
            <span>
            <a href="<?php echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #073C53" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <i class="bi bi-sliders2"></i>
                <span>  Dashboard</span>
            </a>
            </span>

            <!-- END DASHBOARD -->

            <!-- POSTS -->
            <a href="#" style="background-color: #073C53 ;" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <span>  Posts &nbsp; <i class="bi bi-chevron-down"></i></span>
            </a>
					<div  id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #3b6475 ; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="<?php echo BASE_URL . '/pages/posts.php' ?>"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Categories</a></li>
							</ul>
						
					</div>

                <!-- END POSTS -->


                <!-- PAGES -->

				<a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #073C53 ;" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <span>  Pages</span>
                </a>
					<div  id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #3b6475 ; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Add new</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Categories</a></li>
							</ul>
						
					</div>

                <!-- END PAGES -->

                <!-- MEDIA -->

				<a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #073C53 ;" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <span>  Media</span>
                </a>
					<div  id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #3b6475 ; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Add new</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Categories</a></li>
							</ul>
						
					</div>

                <!-- END MEDIA -->

                <!-- COMMENTS -->

				<a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #073C53 ;" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <span>  Comments</span>
                </a>
					<div  id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #3b6475 ; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Add new</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Categories</a></li>
							</ul>
						
					</div>

                <!-- END COMMENTS -->

                <!-- USERS -->

				<a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #073C53 ;" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <span>  Users</span>
                </a>
					<div  id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #3b6475 ; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Add new</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Categories</a></li>
							</ul>
						
					</div>

                <!-- END USERS -->

                <!-- TOOLS -->

				<a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #073C53 ;" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                <span>  Tools</span>
                </a>
					<div  id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #3b6475 ; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Add new</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Categories</a></li>
							</ul>
						
					</div>

                <!-- END TOOLS -->

                <!-- SETTINGS -->

				<a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #073C53;" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                <span>  Settings</span>
                </a>
					<div  id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
							<ul class="list-group-item" style="background-color: #3b6475; border-bottom:none;border-top:none; margin-bottom: -1px;">
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> Add new</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="#"> All Posts</a></li>
								<li class="list-unstyled"><a class="text-decoration-none text-white" href="<?php echo BASE_URL . '/' ?>"> Categories</a></li>
							</ul>
						
					</div>


                <!-- END SETTINGS -->

                <!-- LOGOUT -->

                <button href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" style="background-color: #073C53" class="text-white list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="bi bi-sliders2"></i>
                    <span>  Logout</span>
</button>

                <!-- END LOGOUT -->
                
                
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