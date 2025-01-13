<?php
session_start();
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['business_id'])) {
    header("Location: auth-login.php");
    exit();
}

$business_id = $_SESSION['business_id'];

// Fetch subscription status
$stmt = $conn->prepare("SELECT subscription_status FROM businesses WHERE id = ?");
$stmt->bind_param("i", $business_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['subscription_status'] === '0') {
        header("Location: plan.php");
        exit();
    }
} else {
    session_destroy();
    header("Location: auth-login.php");
    exit();
}
$stmt->close();

// Default range is 'today'
$date_range = isset($_GET['range']) ? $_GET['range'] : 'today';

// SQL queries for feedback based on date range
$feedback_query = "SELECT * FROM feedback WHERE business_id = ?";

// Adjust the query based on the date range
switch ($date_range) {
    case '7days':
        $feedback_query .= " AND created_at >= CURDATE() - INTERVAL 7 DAY";
        break;
    case '13days':
        $feedback_query .= " AND created_at >= CURDATE() - INTERVAL 13 DAY";
        break;
    case '6months':
        $feedback_query .= " AND created_at >= CURDATE() - INTERVAL 6 MONTH";
        break;
    case '1year':
        $feedback_query .= " AND created_at >= CURDATE() - INTERVAL 1 YEAR";
        break;
    default:
        // 'today' by default
        $feedback_query .= " AND DATE(created_at) = CURDATE()";
        break;
}

$feedback_query .= " ORDER BY created_at DESC";

// Execute feedback query
$feedback_stmt = $conn->prepare($feedback_query);
$feedback_stmt->bind_param("i", $business_id);
$feedback_stmt->execute();
$feedback_result = $feedback_stmt->get_result();
$feedback_data = [];

while ($row = $feedback_result->fetch_assoc()) {
    $feedback_data[] = $row;
}

$feedback_stmt->close();

// Fetch today's date for statistics
$today = date('Y-m-d');

// SQL Queries for counting today's feedback and ratings
$total_feedback_query = "SELECT COUNT(*) AS total_feedback FROM feedback WHERE business_id = ? AND DATE(created_at) = ?";
$rating_3_star_query = "SELECT COUNT(*) AS total_3_star FROM feedback WHERE business_id = ? AND rating = 3 AND DATE(created_at) = ?";
$rating_2_star_query = "SELECT COUNT(*) AS total_2_star FROM feedback WHERE business_id = ? AND rating = 2 AND DATE(created_at) = ?";
$rating_1_star_query = "SELECT COUNT(*) AS total_1_star FROM feedback WHERE business_id = ? AND rating = 1 AND DATE(created_at) = ?";

// Execute the queries
$total_feedback_stmt = $conn->prepare($total_feedback_query);
$total_feedback_stmt->bind_param("is", $business_id, $today);
$total_feedback_stmt->execute();
$total_feedback_result = $total_feedback_stmt->get_result();
$total_feedback = $total_feedback_result->fetch_assoc()['total_feedback'];

$rating_3_star_stmt = $conn->prepare($rating_3_star_query);
$rating_3_star_stmt->bind_param("is", $business_id, $today);
$rating_3_star_stmt->execute();
$rating_3_star_result = $rating_3_star_stmt->get_result();
$rating_3_star = $rating_3_star_result->fetch_assoc()['total_3_star'];

$rating_2_star_stmt = $conn->prepare($rating_2_star_query);
$rating_2_star_stmt->bind_param("is", $business_id, $today);
$rating_2_star_stmt->execute();
$rating_2_star_result = $rating_2_star_stmt->get_result();
$rating_2_star = $rating_2_star_result->fetch_assoc()['total_2_star'];

$rating_1_star_stmt = $conn->prepare($rating_1_star_query);
$rating_1_star_stmt->bind_param("is", $business_id, $today);
$rating_1_star_stmt->execute();
$rating_1_star_result = $rating_1_star_stmt->get_result();
$rating_1_star = $rating_1_star_result->fetch_assoc()['total_1_star'];

$total_feedback_stmt->close();
$rating_3_star_stmt->close();
$rating_2_star_stmt->close();
$rating_1_star_stmt->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php $title = "Dashboard"; ?>
    <?php include 'partials/title-meta.php'; ?>
    <?php include 'partials/head-css.php'; ?>
</head>
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

    .feedback-card {
        display: block;
        align-items: center;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .feedback-card img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .feedback-details {
        flex-grow: 1;
    }

    .feedback-title {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .feedback-meta {
        font-size: 12px;
        color: #999;
    }

    .feedback-meta span {
        margin-right: 10px;
    }

    .rating-stars {
        color: #ff9800;
        font-size: 12px;
    }

    .action-icons {
        margin-left: 98%;
        margin-top: -30px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .action-icons a {
        color: #333;
        font-size: 16px;
    }

    .action-icons a:hover {
        color: #000;
    }
</style>

<?php include 'partials/body.php'; ?>

<div id="app-layout">
    <?php $pagetitle = "Dashboard"; ?>
    <?php include 'partials/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-xxl">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                    </div>
                    <div>
                        <select class="form-select form-select-sm" id="feedback-range" onchange="updateFeedbackRange(this.value)" style="max-width: 200px;">
                            <option value="today" <?php echo $date_range == 'today' ? 'selected' : ''; ?>>Today's Feedback</option>
                            <option value="7days" <?php echo $date_range == '7days' ? 'selected' : ''; ?>>Last 7 Days</option>
                            <option value="13days" <?php echo $date_range == '13days' ? 'selected' : ''; ?>>Last 13 Days</option>
                            <option value="6months" <?php echo $date_range == '6months' ? 'selected' : ''; ?>>Last 6 Months</option>
                            <option value="1year" <?php echo $date_range == '1year' ? 'selected' : ''; ?>>Last 1 Year</option>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="card-icon fas fa-building"></i>
                                <h5 class="card-title">Today's Feedback</h5>
                                <p class="card-text"><?php echo $total_feedback; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="card-icon fas fa-check-circle"></i>
                                <h5 class="card-title">3 Star</h5>
                                <p class="card-text"><?php echo $rating_3_star; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="card-icon fas fa-refresh"></i>
                                <h5 class="card-title">2 Star</h5>
                                <p class="card-text"><?php echo $rating_2_star; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="card-icon fas fa-globe"></i>
                                <h5 class="card-title">1 Star</h5>
                                <p class="card-text"><?php echo $rating_1_star; ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Display Recent Feedbacks -->
                <div class="row">
                    <?php foreach ($feedback_data as $feedback) : ?>
                        <div class="col-md-12">
                            <div class="feedback-card">
                                <div class="feedback-details">
                                    <div class="feedback-title" title="<?php echo htmlspecialchars($feedback['feedback']); ?>">
                                        <?php echo htmlspecialchars($feedback['feedback']); ?>
                                    </div>
                                    <div class="feedback-meta">
                                        <span><?php echo htmlspecialchars($feedback['name']); ?></span>
                                        <span><?php echo date("j F, Y", strtotime($feedback['created_at'])); ?></span>
                                        <span><?php echo date("g:i a", strtotime($feedback['created_at'])); ?></span>
                                    </div>
                                    <div class="rating-stars">
                                        <?php
                                        $rating = (int)$feedback['rating'];
                                        for ($i = 0; $i < 5; $i++) {
                                            echo $i < $rating ? '★' : '☆';
                                        }
                                        ?>
                                        <span>(<?php echo $rating; ?>)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- View More Button -->
                <a href="feedback.php" class="btn btn-primary btn-sm">View More</a>

                <?php include 'partials/footer.php'; ?>

            </div>
            <!-- END wrapper -->

            <?php include 'partials/vendor.php'; ?>

            <!-- App js-->
            <script src="assets/js/app.js"></script>
            <script>
                function updateFeedbackRange(range) {
                    window.location.href = "?range=" + range;
                }
            </script>
        </div>
    </div>
</div>
</body>

</html>