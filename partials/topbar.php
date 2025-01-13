<?php
// Include the database configuration file
include('db.php');

// Check if the user is logged in (business_id or admin_id)
if (!isset($_SESSION['business_id']) && !isset($_SESSION['admin_id'])) {
    // Redirect to login if not logged in
    header("Location: auth-login.php");
    exit;
}

$logoPath = "assets/images/users/user-12.jpg"; // Default logo path

// If logged in as a business user
if (isset($_SESSION['business_id'])) {
    $business_id = $_SESSION['business_id'];

    // Fetch business details (name, logo, and number)
    $sql = "SELECT business_name, logo, number FROM businesses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $business_id);
    $stmt->execute();
    $stmt->bind_result($business_name, $logo, $number);
    $stmt->fetch();
    $stmt->close();

    // Set the logo path dynamically if the logo is available
    $logoPath = !empty($logo) ? "uploads/" . htmlspecialchars($logo) : $logoPath;

    // Set session variables
    $_SESSION['business_name'] = $business_name;
    $number = $number ?? 'N/A';
} elseif (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    // Fetch admin details (name)
    $sql = "SELECT username FROM company_data WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
    $stmt->close();

    // Set session variables
    $_SESSION['username'] = $username;
}

?>
<!-- Topbar Start -->
<div class="topbar-custom">
    <div class="container-xxl">
        <div class="d-flex justify-content-between">
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li>
                    <button class="button-toggle-menu nav-link ps-0">
                        <i data-feather="menu" class="noti-icon"></i>
                    </button>
                </li>
                <li class="d-none d-lg-block">
                    <div class="position-relative topbar-search">
                        <input type="text" class="form-control bg-light bg-opacity-75 border-light ps-4" placeholder="Search...">
                        <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                    </div>
                </li>
            </ul>

            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li class="d-none d-sm-flex">
                    <button type="button" class="btn nav-link" data-toggle="fullscreen">
                        <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                    </button>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="bell" class="noti-icon"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                        <!-- Notification Item -->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>
                        <div class="noti-scroll" data-simplebar>
                            <!-- Notification Content -->
                            <a href="javascript:void(0);" class="dropdown-item notify-item text-muted link-primary active">
                                <div class="notify-icon">
                                    <img src="<?php echo htmlspecialchars($logoPath); ?>" class="img-fluid rounded-circle" alt="Current Logo" id="logoImage" />
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="notify-details">Carl Steadham</p>
                                    <small class="text-muted">5 min ago</small>
                                </div>
                                <p class="mb-0 user-msg">
                                    <small class="fs-14">Completed <span class="text-reset">Improve workflow in Figma</span></small>
                                </p>
                            </a>
                        </div>
                        <!-- All Notifications -->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fe-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo htmlspecialchars($logoPath); ?>" class="img-fluid rounded-circle" alt="Current Logo" id="logoImage" />
                        <span class="pro-user-name ms-1">
                            <?php
                            if (isset($_SESSION['admin_id'])) {
                                echo htmlspecialchars($_SESSION['username']);
                            } elseif (isset($_SESSION['business_id'], $_SESSION['business_name'], $number)) {
                                echo htmlspecialchars($_SESSION['business_name']);
                                echo " BIN[" . htmlspecialchars($number) . "] ";
                            }
                            ?>
                            <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="auth-logout.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end Topbar -->