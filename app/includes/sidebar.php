<div id="sidebarMenu" class="d-lg-block bg-white sidebar mt-3">
<div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">

			<div class="accordion mb-2" id="accordionExample">

            <a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <i class="bi bi-sliders2"></i>
                <span>  Dashboard</span>
            </a>

            <!-- POSTS -->

            <a href="#<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <i class="bi bi-sliders2"></i>
                <span>  Posts</span>
            </a>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							<ul class="list-group-item">
								<li><a class="text-decoration-none" href="#"> Add new</a></li>
								<li class="text-decoration-none"><a href="#"> All Posts</a></li>
								<li class="text-decoration-none"><a href="#"> Categories</a></li>
							</ul>
						
					</div>
				</div>

                <!-- END POSTS -->


				<div class="card">
					<div class="card-header" id="headingTwo">
						<h2 class="mb-0">									
							<a data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<span><i class="fa fa-comments"></i> Messages</span>
								<i class="fa fa-chevron-down toggle rotate"></i>
							</a>
						</h2>
					</div>
					<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="card-body">
							<ul class="list-group">
								<li class="list-group-item"><a href="#"><i class="fa fa-inbox"></i> Inbox <span class="badge badge-pill badge-primary">20</span></a></li>
								<li class="list-group-item"><a href="#"><i class="fa fa-paper-plane"></i> Sent</a></li>
								<li class="list-group-item"><a href="#"><i class="fa fa-file-text"></i> Drafts <span class="badge badge-pill badge-info">15</span></a></li>
								<li class="list-group-item"><a href="#"><i class="fa fa-trash"></i> Trash</a></li>
							</ul>
						</div>
					</div>
				</div>


				<div class="card">
					<div class="card-header" id="headingThree">
						<h2 class="mb-0">									
							<a data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<span><i class="fa fa-bar-chart"></i> Reports</span>
								<i class="fa fa-chevron-down toggle"></i>
							</a>
						</h2>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							<ul class="list-group">										
								<li class="list-group-item"><a href="#"><i class="fa fa-dollar"></i> Sales</a></li>
								<li class="list-group-item"><a href="#"><i class="fa fa-tags"></i> Orders</a></li>
								<li class="list-group-item"><a href="#"><i class="fa fa-plane"></i> Shipment</a></li>
								<li class="list-group-item"><a href="#"><i class="fa fa-users"></i> Customers</a></li>										
							</ul>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingFour">
						<h2 class="mb-0">									
							<a data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								<span><i class="fa fa-cog"></i> Settings</span>
								<i class="fa fa-chevron-down toggle"></i>
							</a>
						</h2>
					</div>
					<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
						<div class="card-body">
							<ul class="list-group">
								<li class="list-group-item"><a href="#"><i class="fa fa-font"></i> Typography</a></li>
								<li class="list-group-item"><a href="#"><i class="fa fa-bell"></i> Notifications</a></li>
								<li class="list-group-item"><a href="#"><i class="fa fa-map"></i> Maps</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingFive">
						<h2 class="mb-0"><a href="#"><i class="fa fa-power-off"></i> Logout</a></h2>
					</div>
				</div>
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
                        <span>  Courses</span> &nbsp;  <span class="badge rounded-pill text-bg-danger" style="margin-top: -10px !important;"><?php echo $rowcount; ?></span>
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
                        <span>  Assignments</span> &nbsp;  <span class="badge rounded-pill text-bg-danger" style="margin-top: -10px !important;"><?php echo $rowcount; ?></span>
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