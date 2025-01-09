<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in (i.e., session contains admin_id or business_id)
$show_admin_link = isset($_SESSION['admin_id']);
$show_business_links = isset($_SESSION['business_id']);

// Get the current page
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="24">
                    </span>
                </a>
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">
                    <?php
                    // if (isset($_SESSION['admin_id'])) {
                    // echo "Admin Dashboard";
                    // } elseif (isset($_SESSION['business_id'])) {
                    // echo "Business Dashboard";
                    // } else {
                    echo "Menu";
                    // }
                    ?>
                </li>

                <!-- Admin-specific links (only show these when not on details.php) -->
                <?php if (isset($_SESSION['admin_id'])): ?>
                    <li>
                        <a href="admin-dashboard.php">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="all-feedback.php">
                            <i data-feather="message-circle"></i>
                            <span>Feedbacks</span>
                        </a>
                    </li>
                    <li>
                        <a href="edit-business-profile.php">
                            <i data-feather="edit"></i>
                            <span>Edit Business Profile</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="active-business-profile.php">
                            <i data-feather="check-circle"></i>
                            <span>Active Business Profile</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a href="renew-al.php">
                            <i data-feather="calendar"></i>
                            <span>Renewal</span>
                        </a>
                    </li> -->
                <?php endif; ?>


                <!-- Business-specific links (only show these when not on details.php) -->
                <?php if (isset($_SESSION['business_id']) && $current_page !== "details.php" && $current_page !== "all-feedback.php" && $current_page !== "admin-dashboard.php" && $current_page !== "edit-business-profile.php"): ?>
                    <li>
                        <a href="business-dashboard.php">
                            <i data-feather="home"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <!-- Hide Feedback and Account Information links on plan.php -->
                    <?php if ($current_page !== "plan.php"): ?>
                        <li>
                            <a href="feedback.php">
                                <i data-feather="message-circle"></i>
                                <span> Feedback </span>
                            </a>
                        </li>
                        <li>
                            <a href="account-info.php">
                                <i data-feather="user"></i>
                                <span> Account Information </span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->