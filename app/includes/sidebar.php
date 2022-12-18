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

<!-- <div id="sidebarMenu" class="position-fixed sidebar"> -->
<!-- close -->
    <div>
        
        <!-- </div> -->
        <div class="list-group list-group-flush mt-4">

			<div class="accordion mb-2" id="accordionExample">

            <!-- DASHBOARD -->
                <a href="<?php echo BASE_URL . '/cu-admin/' ?>" style="text-decoration: none;" class="text-white ps-2 side">
                    <i class="bi bi-speedometer2"></i>&nbsp;
                    <span>  Dashboard</span>
                </a>
            <!-- END DASHBOARD -->

            <!-- POSTS -->
                <div class="pt-2"></div>
                <div class="dropdown-menu">
                    <a style="text-decoration: none;" href="#" class="a-link ps-2 side menu-btn text-white">
                        <i class="bi bi-pin-angle"></i>&nbsp;
                        <span>  Posts</span>
                    </a>
                    <div class="menu-content" style="margin-left: 170px !important; margin-top: -30px;">
                        <a class="links text-white" href="<?php echo BASE_URL . '/pages/all_posts.php' ?>">All Posts</a>
                        <a class="links text-white" href="<?php echo BASE_URL . '/pages/add_posts.php' ?>">Add New</a>
                        <a class="links text-white" href="<?php echo BASE_URL . '/pages/categories.php' ?>">Add New</a>
                        <!-- <div class="pb-3"></div> -->
                    </div>
                </div>




            <!-- END POSTS -->

            <!-- COMMENTS -->
                <!-- <div class="pt-2"></div> -->
                <a href="<?php echo BASE_URL . '/cu-admin/comments.php' ?>" style="text-decoration: none;" class="text-white ps-2 side">
                    <i class="bi bi-chat-right"></i>&nbsp;
                    <span>  Comments</span>
                </a>
            <!-- END COMMENTS -->

            <!-- USERS -->
				<div class="pt-2"></div>
                <a href="#<?php //echo BASE_URL . '/logout.php' ?>" style="text-decoration: none;" class="text-white ps-2 side">
                    <i class="bi bi-people"></i>&nbsp;
                    <span>  Users</span>
                </a>


            <!-- END USERS -->

            <!-- PROFILE -->
                <div class="pt-2"></div>
                <a href="<?php echo BASE_URL . '/cu-admin/profile.php' ?>" style="text-decoration: none;" class="text-white ps-2 side">
                    <i class="bi bi-person"></i>&nbsp;
                    <span>  Profile</span>
                </a>
                </span>

            <!-- END PROFILE -->

            <!-- LOGOUT -->
                <div class="pt-2"></div>
                <a href="<?php echo BASE_URL . '/logout.php' ?>" style="text-decoration: none;" class="text-white ps-2 side">
                    <i class="bi bi-box-arrow-right"></i>&nbsp;
                    <span>  Logout</span>
                </a>
            <!-- END LOGOUT -->
			</div>
		</div>
	</div>

<!-- close -->

    <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="#" class="nav__link nav__logo">
                        <i class='bx bxs-disc nav__icon' ></i>
                        <span class="nav__logo-name">Bedimcode</span>
                    </a>
    
                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Profile</h3>
    
                            <a href="#" class="nav__link active">
                                <i class='bi bi-home nav__icon' ></i>
                                <span class="nav__name">Home</span>
                            </a>
                            
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-user nav__icon' ></i>
                                    <span class="nav__name">Profile</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="#" class="nav__dropdown-item">Passwords</a>
                                        <a href="#" class="nav__dropdown-item">Mail</a>
                                        <a href="#" class="nav__dropdown-item">Accounts</a>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="nav__link">
                                <i class='bx bx-message-rounded nav__icon' ></i>
                                <span class="nav__name">Messages</span>
                            </a>
                        </div>
    
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Menu</h3>
    
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-bell nav__icon' ></i>
                                    <span class="nav__name">Notifications</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="#" class="nav__dropdown-item">Blocked</a>
                                        <a href="#" class="nav__dropdown-item">Silenced</a>
                                        <a href="#" class="nav__dropdown-item">Publish</a>
                                        <a href="#" class="nav__dropdown-item">Program</a>
                                    </div>
                                </div>

                            </div>

                            <a href="#" class="nav__link">
                                <i class='bx bx-compass nav__icon' ></i>
                                <span class="nav__name">Explore</span>
                            </a>
                            <a href="#" class="nav__link">
                                <i class='bx bx-bookmark nav__icon' ></i>
                                <span class="nav__name">Saved</span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="#" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>


<!-- </div> -->