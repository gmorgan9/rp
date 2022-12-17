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
                <div class="pt-2"></div>
                <a href="#" style="text-decoration: none;" class="text-muted ps-2 side" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
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
                <div class="pt-2"></div>
                <a href="<?php echo BASE_URL . '/cu-admin/comments.php' ?>" style="text-decoration: none;" class="text-muted ps-2 side">
                    <i class="bi bi-chat-right"></i>&nbsp;
                    <span>  Comments</span>
                </a>
            <!-- END COMMENTS -->

            <!-- USERS -->
				<div class="pt-2"></div>
                <a href="#<?php //echo BASE_URL . '/logout.php' ?>" style="text-decoration: none;" class="text-muted ps-2 side">
                    <i class="bi bi-people"></i>&nbsp;
                    <span>  Users</span>
                </a>

                <div class="d-flex">
                    <div class="dropdown me-1">
                        <button style="background-color: none;" type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true" data-bs-offset="125,-35">
                            Offset
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>


            <!-- END USERS -->

            <!-- PROFILE -->
                <div class="pt-2"></div>
                <a href="<?php echo BASE_URL . '/cu-admin/profile.php' ?>" style="text-decoration: none;" class="text-muted ps-2 side">
                    <i class="bi bi-person"></i>&nbsp;
                    <span>  Profile</span>
                </a>
                </span>

            <!-- END PROFILE -->

            <!-- LOGOUT -->
                <div class="pt-2"></div>
                <a href="<?php echo BASE_URL . '/logout.php' ?>" style="text-decoration: none;" class="text-muted ps-2 side">
                    <i class="bi bi-box-arrow-right"></i>&nbsp;
                    <span>  Logout</span>
                </a>
            <!-- END LOGOUT -->
			</div>
		</div>
	</div>
</div>
