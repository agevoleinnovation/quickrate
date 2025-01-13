<?php
session_start();
include 'db.php';

// Secure session handling
session_regenerate_id(true);
if (!isset($_SESSION['admin_id'])) {
    header("Location: auth-login.php");
    exit;
}

// Query functions with error handling
function fetchCount($conn, $query)
{
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['count'] ?? 0;
}

// Get data
$today_business_count = fetchCount($conn, "SELECT COUNT(*) as count FROM businesses WHERE DATE(created_at) = CURDATE()");
$active_subscription_count = fetchCount($conn, "SELECT COUNT(*) as count FROM businesses WHERE subscription_status = '1'");
$renewal_count = fetchCount($conn, "SELECT COUNT(*) as count FROM businesses WHERE DATE(renewal_date) = CURDATE()");
$total_business_count = fetchCount($conn, "SELECT COUNT(*) as count FROM businesses");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <?php $title = "Dashboard";
    include 'partials/title-meta.php'; ?>
    <?php include 'partials/head-css.php'; ?>
    <style>
        .card {
            border-radius: 10px;
            border: 2px solid cornflowerblue;
            cursor: pointer;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 10px 15px;
            text-align: left;
            height: 60px;
            /* Adjust height for better appearance */
        }

        .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            font-size: 1.8rem;
            margin-right: -20px;
            margin-left: -20px;
            color: blue;
        }
        .card-icon {
            font-size: 1.8rem;
            margin-right: 10px;
            color: royalblue;
            font-size: 1.8rem;
            margin-right: 10px;
        }

        h5.card-title {
            font-size: 1rem;
            /* font-weight: bold; */
            color: royalblue;
            margin: 0;
            flex: 1;
            /* Ensures the title takes appropriate space */
        }

        p.card-text {
            font-size: 1.2rem;
            font-weight: bold;
            color: royalblue;
            margin: 0;
            text-align: right;
        }
    </style>
</head>

<?php include 'partials/body.php'; ?>

<div id="app-layout">

    <?php $pagetitle = "Dashboard";
    include 'partials/menu.php'; ?>

    <div class="content-page">
        <div class="content">
            <div class="container-xxl">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                    </div>
                </div>

                <!-- Display Data -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="card-icon fas fa-building"></i> <!-- Example business icon -->
                                <!-- <div> -->
                                <h5 class="card-title">Today's</h5>
                                <p class="card-text"><?php echo $today_business_count; ?></p>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="card-icon fas fa-check-circle"></i> <!-- Example subscription icon -->
                                <!-- <div> -->
                                <h5 class="card-title">Active</h5>
                                <p class="card-text"><?php echo $active_subscription_count; ?></p>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="card-icon fas fa-refresh"></i> <!-- Example renewal icon -->
                                <!-- <div> -->
                                <h5 class="card-title">Renewals</h5>
                                <p class="card-text"><?php echo $renewal_count; ?></p>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="card-icon fas fa-globe"></i> <!-- Example total business icon -->
                                <!-- <div> -->
                                <h5 class="card-title">Total</h5>
                                <p class="card-text"><?php echo $total_business_count; ?></p>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-xxl -->
        </div> <!-- content -->

        <?php include 'partials/footer.php'; ?>
    </div>

</div>

<?php include 'partials/vendor.php'; ?>
<script src="assets/js/app.js"></script>

</body>

</html>