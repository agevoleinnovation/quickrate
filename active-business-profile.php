<?php
session_start();
include 'db.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: auth-login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Business Profile</title>
    <?php include 'partials/title-meta.php'; ?>
    <?php include 'partials/head-css.php'; ?>
</head>

<body>
    <?php include 'partials/body.php'; ?>
    <div id="app-layout">
        <?php include 'partials/menu.php'; ?>
        <div class="content-page">
            <div class="content">
                <div class="container-xxl">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Active Business Profile</h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <?php include 'partials/vendor.php'; ?>
    <script src="assets/js/app.js"></script>
   
</body>

</html>