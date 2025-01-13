<?php
session_start();
include 'db.php';
include("smsalert/vendor/autoload.php");

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: auth-login.php");
    exit;
}

// Fetch all businesses
$sql = "SELECT * FROM businesses";
$result = $conn->query($sql);

// Handle form submission for updating business details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the POST data for updating business details
    $id = $_POST['id'] ?? null;
    $business_name = $_POST['businessName'] ?? null;
    $number = $_POST['number'] ?? null;
    $contact_no = $_POST['contact_no'] ?? null;
    $city = $_POST['city'] ?? null;
    $existingLogo = $_POST['existingLogo'] ?? null;

    // Fetch current business details from the database
    $stmt = $conn->prepare("SELECT * FROM businesses WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Retain existing values if no new values are provided
    $business_name = $business_name ?? $row['business_name'];
    $number = $number ?? $row['number'];
    $contact_no = $contact_no ?? $row['contact_no'];
    $city = $city ?? $row['city'];
    // Ensure you are fetching the correct logo from the database.
    $existingLogo = $row['logo'] ?? null;

    // Handle logo upload
    if (isset($_FILES['businessLogo']) && $_FILES['businessLogo']['error'] === UPLOAD_ERR_OK) {
        $logoTmpPath = $_FILES['businessLogo']['tmp_name'];
        $logoName = uniqid() . '-' . $_FILES['businessLogo']['name'];
        $uploadPath = 'uploads/' . $logoName;

        if (move_uploaded_file($logoTmpPath, $uploadPath)) {
            $logo = $logoName;
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload logo.']);
            exit;
        }
    } else {
        // If no new logo is uploaded, retain the existing logo
        $logo = $existingLogo;
    }

    // Handle logo upload
    if (isset($_FILES['businessLogo']) && $_FILES['businessLogo']['error'] === UPLOAD_ERR_OK) {
        $logoTmpPath = $_FILES['businessLogo']['tmp_name'];
        $logoName = uniqid() . '-' . $_FILES['businessLogo']['name'];
        $uploadPath = 'uploads/' . $logoName;

        if (move_uploaded_file($logoTmpPath, $uploadPath)) {
            $logo = $logoName;
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload logo.']);
            exit;
        }
    } else {
        $logo = $existingLogo; // Retain the existing logo if no new file is uploaded
    }

    // Update the database
    $sql = "UPDATE businesses SET business_name = ?, number = ?, contact_no = ?, city = ?, logo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $business_name, $number, $contact_no, $city, $logo, $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Business updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update business.']);
    }
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['otp'])) {
    $enteredOtp = $_POST['otp'];

    // Check if the entered OTP matches the session OTP
    if ($enteredOtp === $_SESSION['otp']) {
        $businessId = $_SESSION['business_id'] ?? null; // This will always fetch the latest businessId stored in the session
        // OTP verified successfully, redirect to details.php
        header("Location: details.php");
        exit; // Ensure no further code is executed after the redirect
    } else {
        // OTP verification failed
        echo json_encode(['success' => false, 'message' => 'Invalid OTP']);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $title = "Edit Business Profile";
    include 'partials/title-meta.php'; ?>
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
                            <h4 class="fs-18 fw-semibold m-0">Edit Business Profile</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Business Information</h5>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-traffic mb-0">
                                            <thead>
                                                <tr>
                                                    <th>SR</th>
                                                    <th>Logo</th>
                                                    <th>Business Name</th>
                                                    <th>Number</th>
                                                    <th>Contact No</th>
                                                    <th>City</th>
                                                    <th></th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($result->num_rows > 0): ?>
                                                    <?php $sl_no = 1; ?>
                                                    <?php while ($row = $result->fetch_assoc()): ?>
                                                        <tr>
                                                            <td><?php echo $sl_no++; ?></td>
                                                            <td><img src="uploads/<?php echo htmlspecialchars($row['logo']); ?>" alt="Logo" width="100"></td>
                                                            <td><?php echo htmlspecialchars($row['business_name']); ?></td>
                                                            <td><?php echo htmlspecialchars($row['number']); ?></td>
                                                            <td><?php echo htmlspecialchars($row['contact_no']); ?></td>
                                                            <td><?php echo htmlspecialchars($row['city']); ?></td>
                                                            <td>
                                                                <a href="#" class="edit-btn" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#otpModal">
                                                                    <i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center">No businesses found.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- OTP Modal -->
            <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="otpModalLabel">OTP Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="otpForm">
                                <input type="hidden" id="businessId" name="id">
                                <div class="mb-3">
                                    <label for="otp" class="form-label">Enter OTP</label>
                                    <input type="text" id="otp" name="otp" class="form-control" required>
                                </div>
                                <div id="otpError" class="text-danger"></div>
                                <button type="submit" class="btn btn-primary">Verify OTP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <?php include 'partials/vendor.php'; ?>
    <script src="assets/js/app.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let selectedId;

            // Capture ID when Edit button is clicked
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    selectedId = this.getAttribute('data-id');
                    document.getElementById('businessId').value = selectedId;

                    // Set businessId in session before fetching business details
                    fetch('set-session.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            businessId: selectedId
                        })
                    });

                    // Fetch business details after setting session
                    fetch('get-business-details.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: selectedId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const contactNo = data.contact_no;
                                sendOtp(contactNo);
                            } else {
                                alert("Business details not found.");
                            }
                        });
                });
            });


            // Function to send OTP to the contact number
            function sendOtp(contactNo) {
                fetch('send-otp.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            mobile_number: contactNo
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.type === "success") {
                            alert("OTP sent successfully.");
                        } else {
                            alert("Failed to send OTP: " + data.message);
                        }
                    });
            }

            // Handle OTP form submission via AJAX
            document.getElementById('otpForm').addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                const otp = document.getElementById('otp').value;
                const businessId = document.getElementById('businessId').value;

                // Send the OTP to the server via AJAX
                fetch('edit-business-profile.php', {
                        method: 'POST',
                        body: new URLSearchParams({
                            otp: otp,
                            id: businessId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Redirect to details.php on successful OTP verification
                            window.location.href = "details.php";
                        } else {
                            // Show error if OTP verification fails
                            document.getElementById('otpError').textContent = data.message;
                        }
                    });
            });
        });
    </script>
</body>

</html>