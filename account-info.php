<?php
session_start(); // Start the session
include 'db.php'; // Database connection

// Check if the user is logged in
if (!isset($_SESSION['business_id'])) {
    header("Location: auth-login.php"); // Redirect to login if not logged in
    exit;
}

// Get the logged-in user's business_id from session
$business_id = $_SESSION['business_id'];

// Initialize variables
$businessName = $contact_no = $gstNo = $email = $billingAddress = $pincode = $state = $city = $country = $businessInfo = $logo = $redirectLink = '';
$socialIcons = [];

// Fetch business information
$stmt = $conn->prepare("SELECT * FROM businesses WHERE id = ?");
$stmt->bind_param("i", $business_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $businessName = $row['business_name'] ?? '';
    $email = $row['email'] ?? '';
    $contact_no = $row['contact_no'] ?? '';
    $gstNo = $row['gst_no'] ?? '';
    $billingAddress = $row['billing_address'] ?? '';
    $pincode = $row['pincode'] ?? '';
    $state = $row['state'] ?? '';
    $country = $row['country'] ?? '';
    $city = $row['city'] ?? '';
    $businessInfo = $row['business_info'] ?? '';
    $logo = $row['logo'] ?? '';
    $socialIcon = $row['social_icon'] ?? '';
    $socialIcons = json_decode($socialIcon, true) ?: [];
    $redirectLink = $row['redirect_link'] ?? '';
} else {
    echo "No data found.";
    exit;
}

// Handle form submission for redirect link update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitRedirect'])) {
    // Get the redirect link from the form input
    $redirectLink = $_POST['redirectLink'] ?? '';

    // Update the business info in the database, including the redirect link
    $stmt = $conn->prepare("UPDATE businesses SET redirect_link = ? WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("si", $redirectLink, $business_id);

    if ($stmt->execute()) {
        header("Location: account-info.php");
        exit;
    } else {
        echo "Error updating redirect link: " . $stmt->error;
    }
}

// Handle social links update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['socialLinks'])) {
    $socialLinks = $_POST['socialLinks'] ?? [];
    $socialLinksJson = json_encode($socialLinks);

    $stmt = $conn->prepare("UPDATE businesses SET social_icon = ? WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("si", $socialLinksJson, $business_id);

    if ($stmt->execute()) {
        header("Location: account-info.php");
        exit;
    } else {
        echo "Error updating social links: " . $stmt->error;
    }
}

// Handle form submission for business info update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['businessName'])) {
    $businessName = $_POST['businessName'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact_no = $_POST['contact_no'] ?? '';
    $gstNo = $_POST['gstNo'] ?? '';
    $billingAddress = $_POST['billingAddress'] ?? '';
    $pincode = $_POST['pincode'] ?? '';
    $state = $_POST['state'] ?? '';
    $country = $_POST['country'] ?? '';
    $city = $_POST['city'] ?? '';
    $businessInfo = $_POST['businessInfo'] ?? '';
    $redirectLink = $_POST['redirectLink'] ?? '';

    // Handle logo upload
    if (isset($_FILES['logoFile']['name']) && $_FILES['logoFile']['name'] != '') {
        $targetDir = 'uploads/';
        $fileName = basename($_FILES['logoFile']['name']);
        $targetFile = $targetDir . $fileName;
        $fileTmpName = $_FILES['logoFile']['tmp_name'];

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileType = mime_content_type($fileTmpName);

        if (!in_array($fileType, $allowedTypes)) {
            echo "Only JPG, JPEG, or PNG files are allowed.";
        } else {
            if (move_uploaded_file($fileTmpName, $targetFile)) {
                $logo = $fileName; // Update the logo path in the database
            } else {
                echo "Failed to upload the file.";
            }
        }
    }

    // Update the business info in the database
    $stmt = $conn->prepare("UPDATE businesses 
        SET business_name = ?, email = ?, contact_no = ?, gst_no = ?, billing_address = ?, 
            pincode = ?, state = ?, country = ?, city = ?, business_info = ?, logo = ?, redirect_link = ? 
        WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param(
        "ssssssssssssi",
        $businessName,
        $email,
        $contact_no,
        $gstNo,
        $billingAddress,
        $pincode,
        $state,
        $country,
        $city,
        $businessInfo,
        $logo,
        $redirectLink,
        $business_id
    );

    if ($stmt->execute()) {
        header("Location: account-info.php");
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatePassword'])) {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate new password
    if ($newPassword !== $confirmPassword) {
        echo "<div class='alert alert-danger'>Passwords do not match!</div>";
        exit;
    }

    // Fetch current password hash from the database
    $stmt = $conn->prepare("SELECT password FROM businesses WHERE id = ?");
    $stmt->bind_param("i", $business_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentPasswordHash = $row['password'];

        // Verify the old password
        if (password_verify($oldPassword, $currentPasswordHash)) {
            // Hash the new password
            $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);

            // Update the password in the database
            $updateStmt = $conn->prepare("UPDATE businesses SET password = ? WHERE id = ?");
            $updateStmt->bind_param("si", $newPasswordHash, $business_id);

            if ($updateStmt->execute()) {
                echo "<div class='alert alert-success'>Password updated successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error updating password: " . $updateStmt->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Incorrect old password!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>User not found!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php $title = "Account Information";
    include 'partials/title-meta.php'; ?>
    <?php include 'partials/head-css.php'; ?>
    <style>
        /* Basic styling for the toggle switch */
        .switch {
            margin-left: 5px;
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
        }

        /* Add this to the existing CSS */
        .card-body a i {
            background-color: white;
            color: black;
            border-radius: 5px;
            display: inline-block;
            margin-right: 10px;
            font-size: 24px;
            transition: background-color 0.3s;
        }

        .switch-container {
            display: flex;
            justify-content: space-between;
            /* Space out the switches */
            align-items: center;
        }

        .field {
            display: flex;
            align-items: center;
            margin-right: 20px;
            /* Adjust spacing between switches */
        }


        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 50px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 12px;
            width: 12px;
            border-radius: 50px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
        }

        input:checked+.slider {
            background-color: dimgray;
        }

        input:checked+.slider:before {
            transform: translateX(14px);
        }

        .field-text {
            margin-left: 10px;
            font-size: 14px;
            color: #555;
        }

        .link-input-container {
            width: 100%;
            /* max-width: 500px;
            margin: 20px auto; */
            font-family: Arial, sans-serif;
        }

        .link-input-container label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        .link-wrapper,
        .link {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .feedback-link,
        .feedback {
            /* background: #f0f0f0; */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            flex-grow: 1;
            margin-right: 10px;
            word-wrap: break-word;
            white-space: nowrap;
            overflow: hidden;
        }

        .copy-button,
        .copy {
            background-color: white;
            color: black;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }

        .copy-text,
        .text {
            margin-right: 8px;
        }

        .copy-icon {
            font-size: 18px;
        }
    </style>

</head>

<?php include 'partials/body.php'; ?>

<div id="app-layout">

    <?php $pagetitle = "Account Information";
    include 'partials/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-xxl">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Account Information</h4>
                    </div>
                </div>

                <!-- Table for Businesses Data -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Businesses Info</h5>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- Logo -->
                                    <div class="col-md-3 mb-3">
                                        <label for="logoFile">Logo</label><br>
                                        <img src="uploads/<?php echo $logo; ?>" alt="Current Logo" class="img-fluid mt-2" id="logoImage" style="cursor: pointer;" onclick="openFileInput()">
                                        <input type="file" id="logoFile" accept="image/*" name="logoFile" style="display: none;">
                                    </div>
                                    <!-- Business Name and Phone -->
                                    <div class="col-md-3 mb-3">
                                        <label for="businessName">Business Name</label>
                                        <input type="text" class="form-control" id="businessName" name="businessName" value="<?php echo $businessName; ?>">
                                        <br><label for="contact_no">Phone</label>
                                        <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $contact_no; ?>">
                                    </div>

                                    <!-- GST Number and Business Info -->
                                    <div class="col-md-3 mb-3">
                                        <label for="gstNo">GST Number</label>
                                        <input type="text" class="form-control" id="gstNo" name="gstNo" value="<?php echo $gstNo; ?>">
                                        <br><label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                    </div>

                                    <!-- Business Info -->
                                    <div class="col-md-3 mb-3">
                                        <label for="businessInfo">Business Info</label>
                                        <textarea class="form-control" id="businessInfo" name="businessInfo" style="height: 117px; resize: none; vertical-align: bottom;" rows="4"><?php echo $businessInfo; ?></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <!-- Billing Address -->
                                <div class="col-md-6 mb-3">
                                    <label for="billingAddress">Billing Address</label>
                                    <textarea class="form-control" id="billingAddress" name="billingAddress" style="height: 117px; resize: none;" rows="4"><?php echo $billingAddress; ?></textarea>
                                </div>

                                <!-- Pincode -->
                                <div class="col-md-3 mb-3">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $pincode; ?>">
                                    <br><label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state" value="<?php echo $state; ?>">
                                </div>

                                <!-- State -->
                                <div class="col-md-3 mb-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>">
                                    <br><label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="<?php echo $country; ?>">

                                    <br><button type="submit" name="update" class="form-control btn btn-primary">Update</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Feedback Form -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Feedback</h5>
                        <form id="feedback-form" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="switch-container">
                                            <!-- Name Field with Toggle -->
                                            <div class="field" id="name-field">
                                                <label for="name">Name:</label>
                                                <label class="switch">
                                                    <input type="checkbox" id="show_name_field" <?php echo $row['show_name_field'] ? 'checked' : ''; ?> />
                                                    <span class="slider"></span>
                                                </label>
                                                <span class="field-text"></span>
                                            </div>

                                            <!-- Contact Field with Toggle -->
                                            <div class="field" id="contact-field">
                                                <label for="contact">Contact Number:</label>
                                                <label class="switch">
                                                    <input type="checkbox" id="show_contact_field" <?php echo $row['show_contact_field'] ? 'checked' : ''; ?> />
                                                    <span class="slider"></span>
                                                </label>
                                                <span class="field-text"></span>
                                            </div>

                                            <!-- Email Field with Toggle -->
                                            <div class="field" id="email-field">
                                                <label for="email">Email:</label>
                                                <label class="switch">
                                                    <input type="checkbox" id="show_email_field" <?php echo $row['show_email_field'] ? 'checked' : ''; ?> />
                                                    <span class="slider"></span>
                                                </label>
                                                <span class="field-text"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="link-input-container">
                                    <label for="redirectLink">Redirect Link</label>
                                    <div class="link">
                                        <input type="url" id="redirectLink" class="feedback" name="redirectLink" value="<?php echo htmlspecialchars($redirectLink); ?>" placeholder="Enter redirect link" />
                                        <button type="submit" class="copy" name="submitRedirect">
                                            <i data-feather="arrow-down-circle"></i>
                                        </button>
                                    </div>
                                </div>


                                <br>
                                <!-- Link Upload Box Section -->
                                <div class="link-input-container">
                                    <label for="linkUpload">Feedback Link:</label>
                                    <div class="link-wrapper">
                                        <span id="staticLink" class="feedback-link">
                                            https://quickrate.in/user-feedback/<?php echo urlencode($business_name); ?>
                                        </span>
                                        <button type="button" class="copy-button" onclick="copyFeedbackLink()" id="copyButton">
                                            <i data-feather="copy"></i>
                                        </button>

                                    </div>
                                </div>

                            </div> <!-- container-fluid -->

                    </div>
                </div>

                <!-- Social Icons Form -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Social Icons</h5>
                        <form method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="row">
                                    <?php
                                    // Check if social icon data exists and is not empty
                                    if (is_array($socialIcons) && !empty($socialIcons)) {
                                        // Loop through the decoded JSON array
                                        foreach ($socialIcons as $platform => $link) {
                                            echo '<div class="col-md-6 mb-2 d-flex align-items-center">';

                                            // Display the social icons dynamically
                                            switch (strtolower($platform)) {
                                                case 'facebook':
                                                    echo '<a href="' . htmlspecialchars($link) . '" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>';
                                                    break;
                                                case 'instagram':
                                                    echo '<a href="' . htmlspecialchars($link) . '" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>';
                                                    break;
                                                case 'linkedin':
                                                    echo '<a href="' . htmlspecialchars($link) . '" target="_blank"><i class="fa-brands fa-linkedin"></i></a>';
                                                    break;
                                                case 'youtube':
                                                    echo '<a href="' . htmlspecialchars($link) . '" target="_blank"><i class="fa-brands fa-square-youtube"></i></a>';
                                                    break;
                                                case 'twitter':
                                                    echo '<a href="' . htmlspecialchars($link) . '" target="_blank"><i class="fa-brands fa-square-twitter"></i></a>';
                                                    break;
                                                case 'pinterest':
                                                    echo '<a href="' . htmlspecialchars($link) . '" target="_blank"><i class="fa-brands fa-square-pinterest"></i></a>';
                                                    break;
                                                default:
                                                    echo '<span>Icon not found for: ' . htmlspecialchars($platform) . '</span>';
                                                    break;
                                            }

                                            // Add a textbox next to the icon
                                            echo '<input type="text" class="form-control ml-2" name="socialLinks[' . htmlspecialchars($platform) . ']" value="' . htmlspecialchars($link) . '" placeholder="Enter URL" />';
                                            echo '</div>';
                                        }
                                    } else {
                                        echo "No social icons available.";
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- <div class="col-mx-5 mx-4"> -->
                            <button style="margin-right:2rem; margin-left:2.5rem;" class="btn btn-primary" type="submit">Save Social Links</button>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Update Password</h5>
                        <div class="container">
                            <div class="row">
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label for="oldPassword" class="form-label">Old Password</label>
                                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="updatePassword">Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Content-->

            <?php include 'partials/footer.php'; ?>


            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div><!-- content -->
        <!-- END wrapper -->

        <?php include 'partials/vendor.php'; ?>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        <script>
            function openFileInput() {
                // Simulate a click on the hidden file input
                document.getElementById("logoFile").click();
            }
            // File input change event to check the file size, type, and dimensions
            document.getElementById('logoFile').addEventListener('change', function(event) {
                const file = event.target.files[0]; // Get the uploaded file
                if (file) {
                    const fileSize = file.size / 1024; // Convert size to KB
                    const fileType = file.type;

                    // Create a new image object to check dimensions
                    const img = new Image();
                    const reader = new FileReader();

                    // Use a closure to capture the image data URL
                    reader.onload = function(e) {
                        const imageDataUrl = e.target.result; // Capture the image data URL

                        img.src = imageDataUrl; // Load the image data into the Image object

                        img.onload = function() {
                            const width = img.width;
                            const height = img.height;

                            // Validate file size, type, and dimensions
                            if (fileSize > 750) { // Check if file size is greater than 750KB
                                alert("File size must be less than 750KB.");
                                event.target.value = ""; // Clear the input so user can choose a new file
                            } else if (fileType !== "image/jpeg" && fileType !== "image/png" && fileType !== "image/jpg") {
                                alert("Only JPG, JPEG, and PNG files are allowed.");
                                event.target.value = ""; // Clear the input so user can choose a new file
                            } else if (width !== 512 || height !== 512) { // Check if image dimensions are 512px x 512px
                                alert("Image dimensions must be 512px by 512px.");
                                event.target.value = ""; // Clear the input so user can choose a new file
                            } else {
                                // File is valid, update the logo preview
                                document.getElementById('logoImage').src = imageDataUrl; // Update image preview
                            }
                        };
                    };

                    reader.readAsDataURL(file); // Read the file and trigger the onload event
                }
            });
            document.addEventListener('DOMContentLoaded', function() {
                // Switch state handlers
                const showNameFieldSwitch = document.getElementById('show_name_field');
                const showEmailFieldSwitch = document.getElementById('show_email_field');
                const showContactFieldSwitch = document.getElementById('show_contact_field');

                // Function to send updated value to the server via AJAX
                function updateFieldStatus(field, value) {
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "update_field_status.php", true); // PHP file that handles the update
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    // Sending the field name and its updated value
                    xhr.send("field=" + field + "&value=" + value);

                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            console.log(xhr.responseText); // Handle the server response if necessary
                        }
                    };
                }

                // Event listeners for switches
                showNameFieldSwitch.addEventListener('change', function() {
                    updateFieldStatus('show_name_field', showNameFieldSwitch.checked ? 1 : 0);
                });

                showEmailFieldSwitch.addEventListener('change', function() {
                    updateFieldStatus('show_email_field', showEmailFieldSwitch.checked ? 1 : 0);
                });

                showContactFieldSwitch.addEventListener('change', function() {
                    updateFieldStatus('show_contact_field', showContactFieldSwitch.checked ? 1 : 0);
                });
            });

            document.getElementById('pincode').addEventListener('input', function() {
                const pincode = this.value.trim();
                if (pincode.length === 6) { // Validate Indian pincode length
                    fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data[0].Status === 'Success') {
                                const postOffice = data[0].PostOffice[0];
                                document.getElementById('city').value = postOffice.District;
                                document.getElementById('state').value = postOffice.State;
                                document.getElementById('country').value = postOffice.Country;
                            } else {
                                alert('Invalid Pincode!');
                                document.getElementById('city').value = '';
                                document.getElementById('state').value = '';
                                document.getElementById('country').value = '';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                            alert('Error fetching Pincode details.');
                        });
                } else {
                    // Clear the fields if the pincode is not valid
                    document.getElementById('city').value = '';
                    document.getElementById('state').value = '';
                    document.getElementById('country').value = '';
                }
            });

            function copyFeedbackLink() {
                // Get the feedback link text
                const linkText = document.getElementById("staticLink").innerText;

                // Copy the text to clipboard
                navigator.clipboard.writeText(linkText).then(() => {
                    // Find the copy button
                    const copyButton = document.getElementById("copyButton");

                    // Change the button content to "Copied"
                    copyButton.innerHTML = "Copied";

                    // Reset back to the icon after 2 seconds
                    setTimeout(() => {
                        copyButton.innerHTML = '<i data-feather="copy"></i>';
                        feather.replace(); // Reinitialize Feather icons
                    }, 2000);
                }).catch((err) => {
                    console.error('Failed to copy text: ', err);
                });
            }
        </script>

        </body>

</html>