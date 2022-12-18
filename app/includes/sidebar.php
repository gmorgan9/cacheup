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

<div id="sidebarMenu" class="position-fixed sidebar">
    
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
                    <a style="text-decoration: none; color: white" href="/" class="ps-2 side menu-btn text-white">
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
</div>
