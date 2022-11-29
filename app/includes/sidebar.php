
 <!-- <img src="https://lh3.googleusercontent.com/a-/AOh14Gj99VObFyE8W_h8RrcwZO_aYiIHu5AAa_XpnOym=s600-k-no-rp-mo" alt=""> -->
          <h1>Mystery Code</h1>
        </header>
     <div class="menu">
       <div class="item"><a href="#"><i class="fas fa-desktop"></i>Dashboard</a></div>
       <div class="item">
         <a class="sub-btn"><i class="fas fa-table"></i>Tables<i class="fas fa-angle-right dropdown"></i></a>
         <div class="sub-menu">
           <a href="#" class="sub-item">Sub Item 01</a>
           <a href="#" class="sub-item">Sub Item 02</a>
           <a href="#" class="sub-item">Sub Item 03</a>
         </div>
       </div>
       <div class="item"><a href="#"><i class="fas fa-th"></i>Forms</a></div>
       <div class="item">
         <a class="sub-btn"><i class="fas fa-cogs"></i>Settings<i class="fas fa-angle-right dropdown"></i></a>
         <div class="sub-menu">
           <a href="#" class="sub-item">Sub Item 01</a>
           <a href="#" class="sub-item">Sub Item 02</a>
         </div>
       </div>
       <div class="item"><a href="#"><i class="fas fa-info-circle"></i>About</a></div>
     </div>
   </div>
   <section class="main">
     <h1>Sidebar Menu With<br>Sub-Menus</h1>
   </section>








<!-- <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
        <a href="<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                <i class="bi bi-sliders2"></i>
                <span>  Dashboard</span>
            </a>
        
            <div class="accordion accordion-flush" id="accordionFlushExample">

                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      POSTS
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="list-group list-group-flush">
                            <a href="<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <i class="bi bi-sliders2"></i>
                                <span>  Add New </span>
                            </a>
                            <a href="<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <i class="bi bi-sliders2"></i>
                                <span>  ALL Posts</span>
                            </a>
                            <a href="<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <i class="bi bi-sliders2"></i>
                                <span>  Categories</span>
                            </a>
                        </div>
                    </div>
                  </div>
                </div>

            
                <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a class="accordion-toggle" data-toggle="collapse" href="#basicshapes" aria-expanded="false">
                Basic Shapes
            </a>
        </h4>
      </div>
      <div id="basicshapes" class="panel-collapse collapse" data-parent="#accordion">
        <div class="panel-body">
                    <div class="accordion-body">
                        <div class="list-group list-group-flush">
                            <a href="<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <i class="bi bi-sliders2"></i>
                                <span>  Add New </span>
                            </a>
                            <a href="<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <i class="bi bi-sliders2"></i>
                                <span>  ALL Posts</span>
                            </a>
                            <a href="<?php //echo BASE_URL . '/pages/dashboard.php' ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <i class="bi bi-sliders2"></i>
                                <span>  Categories</span>
                            </a>
                        </div>
                    </div>
                  </div>
</div>
                </div>


            </div>  -->


            
            <!-- <?php //if($_SESSION['acc_type'] == 0) { ?>
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