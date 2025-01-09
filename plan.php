<?php
session_start();
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['business_id'])) {
    // Redirect to login page if not logged in
    header("Location: auth-login.php"); 
    exit();
}

// Get the logged-in business ID from the session
$business_id = $_SESSION['business_id'];

// Fetch subscription status from the database
$stmt = $conn->prepare("SELECT subscription_status FROM businesses WHERE id = ?");
$stmt->bind_param("i", $business_id);
$stmt->execute();
$stmt->bind_result($subscription_status);
$stmt->fetch();
$stmt->close();

// Check if the form is submitted to update the subscription
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the subscription form sends a field named 'subscription_status'
    $new_subscription_status = $_POST['subscription_status'];

    // Update the subscription status in the database
    $stmt = $conn->prepare("UPDATE businesses SET subscription_status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_subscription_status, $business_id);

    if ($stmt->execute()) {
        // Redirect to the same page to refresh the display
        header("Location: plan.php");
        exit();
    } else {
        $message = "Failed to update subscription status. Please try again.";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $title = "Feedback";
    include 'partials/title-meta.php'; ?>
    <?php include 'partials/head-css.php'; ?>
</head>

<?php include 'partials/body.php'; ?>

<div id="app-layout">

    <?php $pagetitle = "Feedback";
    include 'partials/menu.php'; ?>

    <div class="content-page">
        <div class="content">

            <div class="container-xxl">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Feedbacks</h4>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-traffic mb-0">

                            <thead>
                                <tr>
                                    <th>Packages</th>
                                    <th></th>
                                    <th>Plan A</th>
                                    <th>Plan B</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Contains ads on Feedback Page</th>
                                    <th></th>
                                    <th><i data-feather="check" style="color: blue;"></i></th>
                                    <th><i data-feather="x" style="color: red;"></i></th>
                                </tr>
                                <tr>
                                    <th>Manage Businesses</th>
                                    <th></th>
                                    <th><i data-feather="check" style="color: blue;"></i></th>
                                    <th><i data-feather="check" style="color: blue;"></i></th>
                                </tr>
                                <tr>
                                    <th>Manage Redirection Link</th>
                                    <th></th>
                                    <th><i data-feather="x" style="color: red;"></i></th>
                                    <th><i data-feather="check" style="color: blue;"></i></th>
                                </tr>
                                <tr>
                                    <th>High Priority Support</th>
                                    <th></th>
                                    <th><i data-feather="x" style="color: red;"></i></th>
                                    <th><i data-feather="check" style="color: blue;"></i></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>₹ 500 <br> Including GST</th>
                                    <th>₹ 700 <br> Including GST</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <form method="POST" action="plan.php">
                    <label for="subscription_status">Choose Plan</label>
                    <button type="submit">Choose Plan</button>
                </form>

                <?php if (isset($message)) { ?>
                    <p><?php echo $message; ?></p>
                <?php } ?>

                <?php include 'partials/footer.php'; ?>
            </div>
        </div>
    </div>

    <?php include 'partials/vendor.php'; ?>

    <script src="assets/js/app.js"></script>
</div>
</body>

</html>