<div class="page-header position-sticky" style="width: 115%;">
    <div class="d-flex" style="float:left !important;">
        <div class="pe-2"></div>
        <img src="../assets/images/new-logo.png" height="20px" width="20px" alt="">
        <div class="pe-4"></div>
        <a style="text-decoration: none; color: white" href="/"><i class="bi bi-house-door-fill text-muted"></i>&nbsp;CacheUp</a>
        <div class="pe-4"></div>
        <a style="text-decoration: none; color: white" href="/"><i class="bi bi-chat-right"></i>&nbsp;0</a>
        <div class="pe-2"></div>
        <a style="text-decoration: none; color: white" href="/"><i class="bi bi-plus"></i>New</a>
    </div>
    <div style="float: right !important;">
        <div class="dropdown-menu">
            <a style="font-size: 14px; text-decoration: none; color: white" href="/" class="menu-btn text-white">
                Welcome, <?php echo $_SESSION['username']; ?> <i class="bi bi-person-square"></i> 
            </a>
            <div class="menu-content">
                <div class="float-start">
                    <i class="bi bi-person-square text-muted" style="font-size: 45px;margin-left: 20px;"></i>
                </div>
                <div class="float-end" style="margin-right: 15px;">
                    <a class="links text-white" href="<?php echo BASE_URL . '/cu-admin/profile.php' ?>">Edit Profile</a>
                    <!-- <a class="links text-white" href="#">Visit Us</a> -->
                    <a class="links text-white" href="<?php echo BASE_URL . '/logout.php' ?>">Log Out</a>
                    <div class="pb-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
