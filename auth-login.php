<?php
session_start(); // Start the session to store the user data

// Include the database connection
include 'db.php';

// Check if the user is already logged in
if (isset($_SESSION['business_id'])) {
    header("Location: business-dashboard.php"); // If already logged in, redirect to business-dashboard.php
    exit;
} elseif (isset($_SESSION['admin_id'])) {
    header("Location: admin-dashboard.php"); // If admin is logged in, redirect to the admin dashboard
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check for business login first
    $stmt = $conn->prepare("SELECT id, password, subscription_status FROM businesses WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the business exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password for business login
        if (password_verify($password, $row['password'])) {
            $_SESSION['business_id'] = $row['id']; // Store the business ID in the session

            // Check subscription status and redirect accordingly
            if ($row['subscription_status'] == '0') {
                header("Location: plan.php"); // Redirect to the plan selection page
            } else if ($row['subscription_status'] == '1') {
                header("Location: business-dashboard.php"); // Redirect to the business dashboard
            }
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        // Check for admin login if business doesn't exist
        $stmt = $conn->prepare("SELECT id, password FROM company_data WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // If the admin exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify the password for admin login
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin_id'] = $row['id']; // Store the admin ID in the session
                header("Location: admin-dashboard.php"); // Redirect to the admin dashboard
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            // If both business and admin login fail, show an error
            $error = "Invalid username or password.";
        }
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php $title = "Log In";
    include 'partials/title-meta.php'; ?>
    <?php include 'partials/head-css.php'; ?>
</head>

<body class="bg-white">
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-0">
                <div class="col-xl-5">
                    <div class="row">
                        <div class="col-md-7 mx-auto">
                            <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                <div class="mb-4 p-0">
                                    <a href="business-dashboard.php" class="auth-logo">
                                        <img src="assets/images/logo-dark.png" alt="logo-dark" class="mx-auto" height="28" />
                                    </a>
                                </div>

                                <div class="pt-0">
                                    <?php if (isset($error)) {
                                        echo "<div class='alert alert-danger'>$error</div>";
                                    } ?>
                                    <form method="POST" class="my-4">
                                        <div class="form-group mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter your business name or admin username">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required>
                                        </div>

                                        <div class="form-group d-flex mb-3">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <a class='text-muted fs-14' href='auth-recoverpw.php'>Forgot password?</a>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="saprator my-4"><span>or sign in with</span></div>

                                    <div class="text-center text-muted mb-4">
                                        <p class="mb-0">Don't have an account ?<a class='text-primary ms-2 fw-medium' href='auth-register.php'>Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="account-page-bg p-md-5 p-4">
                        <div class="text-center">
                            <h3 class="text-dark mb-3 pera-title">Quick, Effective, and Productive With Tapeli Admin Dashboard</h3>
                            <div class="auth-image">
                                <img src="assets/images/authentication.svg" class="mx-auto img-fluid" alt="images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END wrapper -->

    <?php include 'partials/vendor.php'; ?>
    <!-- App js-->
    <script src="assets/js/app.js"></script>

</body>

</html>