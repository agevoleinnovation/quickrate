<?php
// Database connection
include_once 'db.php'; // Make sure db.php is included

$logoBaseUrl = "http://localhost/quickrate/uploads/";

// Check if 'username' is passed in the URL
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Now, fetch the corresponding business_name using the username
    $query = "SELECT * FROM businesses WHERE username = ?";
    $stmt = $conn->prepare($query); // Use the $conn object for MySQLi
    $stmt->bind_param("s", $username); // Bind the username parameter
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc(); // Get the result as an associative array

    if ($result === false) {
        echo "Error: No business found for the given username.";
        exit;
    }

    // Now you have the business_name from the result
    $business_name = $result['business_name'];

    // Get the business_id from the result for feedback submission
    $business_id = $result['id']; // Assuming 'id' is the primary key in your 'businesses' table

    // Fetch redirect link
    $redirect_link = htmlspecialchars($result['redirect_link'] ?? '');
    echo '<input type="hidden" id="redirect-link" value="' . $redirect_link . '">';

    // Get the show_name_field value
    $show_name_field = isset($result['show_name_field']) ? $result['show_name_field'] : 0;
    $show_email_field = isset($result['show_email_field']) ? $result['show_email_field'] : 0;
    $show_contact_field = isset($result['show_contact_field']) ? $result['show_contact_field'] : 0;

    // Set the logo path
    $logoPath = !empty($result['logo']) ? "uploads/" . htmlspecialchars($result['logo']) : 'default-logo.png';

    // Fetch and decode social icons from the database if it's stored as JSON
    $social_icons = json_decode($result['social_icon'], true);
    if ($social_icons === null) {
        $social_icons = []; // If there's no valid JSON, initialize as empty array
    }
} else {
    echo "Error: Username is missing in the request.";
    exit;
}

// Handle POST requests for feedback submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get feedback details
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;

    // Use $conn for MySQLi to insert the feedback along with the business_id
    $stmt = $conn->prepare("INSERT INTO feedback (name, contact, email, feedback, rating, business_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $name, $contact, $email, $feedback, $rating, $business_id);  // Bind parameters including business_id

    if ($stmt->execute()) {
        echo '<script>alert("Thank you for your feedback!");</script>';
    } else {
        echo "Error: Could not submit feedback.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($result['username']); ?></title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    /* Container */
    .container {
        max-width: 1200px;
        margin-top: -4px;
        padding: 20px;
        display: grid;
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }

    /* Header */
    .header {
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
    }

    .logo {
        display: block;
        /* Ensure visibility */
        width: auto;
        /* Adjust width for proper scaling */
        max-width: 100%;
        width: 30px;
        height: 30px;
        margin-right: 5px;
    }

    h1 {
        font-size: 1.5rem;
        color: #333;
        margin: 0;
    }

    /* Feedback Form */
    .feedback-form {
        background-color: #7FFFD4;
        border-radius: 10px;
        padding: 20px;
        width: 30%;
        max-width: 600px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        position: relative;
    }

    .rating {
        margin-top: -20px;
        margin-left: 80px;
        display: flex;
        justify-content: center;
    }

    .rating span {
        font-size: 2rem;
        color: #FFDEAD;
        cursor: pointer;
        margin: 5px;
    }

    .rating span.selected {
        color: orange;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    form label {
        margin-top: 10px;
        margin-left: 7px;
        font-size: 15px;
    }

    form input,
    form textarea {
        margin-left: 8px;
        width: 95%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        box-sizing: border-box;
    }

    form textarea {
        height: 100px;
        resize: none;
    }

    .submit-btn {
        background-color: #2E8B57;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-size: 1rem;
        width: 50%;
        position: absolute;
        bottom: -20px;
        left: 90px;
    }

    .submit-btn:hover {
        background-color: #20c357;
    }

    /* Contact Info */
    .contact-info {
        margin-left: 50%;
        margin-top: -470px;
        margin-bottom: 50px;
        width: 30%;
    }

    .contact-info h2 {
        font-size: 1.2rem;
        color: #2E8B57;
    }

    .contact-info a {
        color: black;
        text-decoration: none;
    }

    .contact-info p {
        margin-top: -10px;
        color: black;
    }

    /* Social Media Icons */
    .social-icons {
        margin-top: 20px;
    }

    .social-icons a {
        margin: 0 2px;
        display: inline-block;
    }

    .social-icons a img {
        height: 30px;
        width: 30px;
        transition: transform 0.3s ease;
    }

    .social-icons a:hover img {
        transform: scale(1.2);
    }

    /* Contact Icons */
    .contact-icon {
        width: 20px;
        height: 20px;
        vertical-align: middle;
        margin-right: 10px;
    }

    /* Feedback Table */
    .feedback-table {
        width: 100%;
        margin-top: 20px;
    }

    .feedback-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .feedback-table th,
    .feedback-table td {
        padding: 12px;
        border: 1px solid #ddd;
    }

    .feedback-table th {
        background-color: #f2f2f2;
        text-align: left;
    }

    /* Footer */
    footer {
        padding-top: 1px;
        padding-bottom: 1px;
        margin-top: 291px;
        color: white;
        font-size: 0.8rem;
        text-align: left;
        position: relative;
        width: 100%;
        background-color: #2E8B57;
    }

    .quick {
        position: fixed;
        top: 10px;
        right: 10px;
        font-size: 24px;
        font-weight: 900;
        color: #2E8B57;
        padding: 10px;
        border-radius: 5px;
        display: flex;
        /* Use flexbox to arrange items horizontally */
        align-items: center;
        /* Vertically align items */
    }

    .rate {
        color: black;
        font-weight: 100;
        margin-left: 3px;
        margin-top: 4px;
    }

    /* Responsive */
    @media screen and (max-width: 768px) {

        /* On small screens, both feedback form and contact info stack vertically and center */
        .container {
            flex-direction: column;
            align-items: center;
        }

        .feedback-form {
            width: 90%;
            /* Full width on mobile */
            margin-top: 20px;
        }

        .contact-info {
            margin-left: 35px;
            margin-top: 20px;
            width: 90%;
            /* Full width on mobile */
            text-align: left;
            /* Center text */
        }

        .feedback-table {
            width: 90%;
            margin-top: 50px;
            text-align: center;
        }

        .quick {
            margin-top: -5%;
            margin-bottom: 0;
            position: static;
            margin-left: 53%;
            transform: translateX(-50%);
            align-items: center;
            /* Center the text */
            font-size: xx-large;
            /* Adjust font size */
        }

        /* Adjust space between "Quick" and "Rate" */
        .rate {
            font-size: xx-large;
            margin-left: 5px;
            margin-top: 3px;
        }
    }
</style>

<body>

    <div class="container">
        <header class="header">
            <img src="<?php echo $logoBaseUrl . (empty($result['logo']) ? 'default-logo.png' : htmlspecialchars($result['logo'])); ?>" alt="Logo" class="logo">
            <h1><?php echo htmlspecialchars($result['business_name']); ?></h1>
        </header>
        <!-- Feedback Form -->
        <div class="feedback-form">
            <form id="feedbackForm" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="rating" name="rating" value="0">
                <!-- Hidden Input for Redirect Link -->
                <?php
                // Output the redirect link for JavaScript to use
                if (!empty($redirect_link)) {
                    echo '<input type="hidden" id="redirect-link" value="' . $redirect_link . '">';
                }
                ?>
                <div class="rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
                <div class="field">
                    <div id="name-field" <?php echo ($show_name_field == 0) ? 'style="display: none;"' : ''; ?>>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div id="contact-field" <?php echo ($show_contact_field == 0) ? 'style="display: none;"' : ''; ?>>
                        <label for="contact">Contact Number</label>
                        <input type="text" id="contact" name="contact" required>
                    </div>

                    <div id="email-field" <?php echo ($show_email_field == 0) ? 'style="display: none;"' : ''; ?>>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <label for="feedback">Feedback</label>
                    <textarea id="feedback" name="feedback" required></textarea>
                    <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
    </div>
    <!-- Contact Information -->
    <div class="contact-info">
        <h2>Business Name</h2>
        <p><strong></strong> <?= htmlspecialchars($result['business_name']) ?></p>

        <h2>Contact Information</h2>
        <p>
            <a href="mailto:<?php echo htmlspecialchars($result['email']); ?>">
                <i class="fa-regular fa-envelope" style="margin-right: 10px; color: #63E6BE;"></i>
                <?php echo htmlspecialchars($result['email']); ?>
            </a>
        </p>
        <p>
            <a href="tel:<?php echo htmlspecialchars($result['contact_no']); ?>">
                <i class="fa fa-phone" style="margin-right: 10px; color: #63E6BE;"></i>
                <?php echo htmlspecialchars($result['contact_no']); ?>
            </a>
        </p>

        <?php
        if (!empty($social_icons)) {
            echo '<div class="social-icons">';
            foreach ($social_icons as $platform => $link) {
                // Display icon based on the platform
                switch ($platform) {
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
                        // Add more platforms as needed
                    default:
                        echo '<a href="' . htmlspecialchars($link) . '" target="_blank"></a>';
                        break;
                }
            }
            echo '</div>';
        }
        ?>
    </div>

    <div class="quick">
        Quick <span class="rate">Rate</span>
    </div>

    <footer>
        <p style="margin-left: 15px;">Copyright © 2024 Agevole Innovation Pvt. Ltd.</p>
    </footer>

    <script>
        const stars = document.querySelectorAll('.rating .star');
        const ratingInput = document.getElementById('rating'); // Ensure this is the correct input ID

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                // Update the hidden rating input value to reflect the selected star
                const rating = index + 1; // Set rating to 1-5
                ratingInput.value = rating;

                // Update the selected stars visually
                stars.forEach((s, i) => {
                    s.classList.toggle('selected', i <= index);
                });

                // Check if the rating is 4 or 5
                if (rating === 4 || rating === 5) {
                    // Fetch the redirect URL from a hidden input or AJAX request
                    const redirectUrl = document.getElementById('redirect-link').value; // Replace with dynamic value
                    if (redirectUrl) {
                        window.location.href = redirectUrl;
                    } else {
                        console.error("Redirect URL is missing.");
                    }
                }
            });
        });

        // Ensure the correct rating value is sent when the form is submitted
        const form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            if (ratingInput.value === '0') { // Check if rating is still 0
                alert('Please select a rating!');
                e.preventDefault(); // Prevent form submission
            } else {
                // You can log the value for debugging purposes
                console.log('Rating to be sent: ', ratingInput.value);
            }
        });
        if (<?php echo $show_name_field; ?> == 0) {
            document.getElementById("name-field").style.display = "none";
        }
        if (<?php echo $show_contact_field; ?> == 0) {
            document.getElementById("contact-field").style.display = "none";
        }
        if (<?php echo $show_email_field; ?> == 0) {
            document.getElementById("email-field").style.display = "none";
        }
    </script>
</body>

</html>