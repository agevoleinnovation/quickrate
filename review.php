<?php
// Check if business is set, otherwise use 'default'
$business = isset($_GET['business']) ? $_GET['business'] : 'default';

// Define business-specific data
$businesses = [
    'agevole' => [
        'name' => 'Agevole',
        'slogan' => 'Where Innovation Meets Excellence',
        'email' => 'info@Agevole.com',
        'phone' => '+91 12345 67890',
    ],
    'myalbumry' => [
        'name' => 'MyAlbumry',
        'slogan' => 'Innovating Your Future',
        'email' => 'contact@MyAlbumry.com',
        'phone' => '+91 98765 43210',
    ],
    // Add more businesses as needed
];

// Fallback to default business if the parameter is invalid
if (!array_key_exists($business, $businesses)) {
    $business = 'default';
}

// Current business details
$currentBusiness = $businesses[$business] ?? [
    'name' => 'Default Business',
    'slogan' => 'Default Slogan',
    'email' => 'info@default.com',
    'phone' => '+91 00000 00000',
];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];

    // Save feedback to the database or a file
    $file = fopen("feedback/feedback_$business.txt", "a");
    fwrite($file, "Name: $name\nContact: $contact\nEmail: $email\nFeedback: $feedback\nRating: $rating\n");
    fclose($file);

    echo "<script>alert('Feedback submitted for {$currentBusiness['name']}!');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback for <?= htmlspecialchars($currentBusiness['name']) ?></title>
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
        margin-top: -15px;
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
        <div class="header">
            <img src="logo.png" alt="Logo" class="logo">
            <h1><?= htmlspecialchars($currentBusiness['name']) ?></h1>
        </div>

        <!-- Feedback Form -->
        <div class="feedback-form">
            <form id="feedbackForm" action="" method="POST">
                <input type="hidden" id="rating" name="rating" value="0">
                <div class="rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <label for="contact">Contact Number</label>
                <input type="text" id="contact" name="contact" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="feedback">Feedback</label>
                <textarea id="feedback" name="feedback" required></textarea>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>

    </div>
    <!-- Contact Information -->
    <div class="contact-info">
        <h2><?= htmlspecialchars($currentBusiness['name']) ?></h2>
        <p><?= htmlspecialchars($currentBusiness['slogan']) ?></p>
        <h2>Contact Information</h2>
        <p>
            <i class="fa-regular fa-envelope"></i>
            <a href="mailto:<?= htmlspecialchars($currentBusiness['email']) ?>">
                <?= htmlspecialchars($currentBusiness['email']) ?>
            </a>
        </p>
        <p>
            <i class="fa fa-phone"></i>
            <a href="tel:<?= htmlspecialchars($currentBusiness['phone']) ?>">
                <?= htmlspecialchars($currentBusiness['phone']) ?>
            </a>
        </p>

        <div class="social-icons">
            <!-- Social Media Links -->
            <?php if ($business === 'agevole' || $business === 'default'): ?>
                <a href="https://www.facebook.com" target="_blank">
                    <i class="fa-brands fa-square-facebook"></i>
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <i class="fa-brands fa-square-instagram"></i>
                </a>
            <?php endif; ?>

            <?php if ($business === 'myalbumry' || $business === 'default'): ?>
                <a href="https://www.facebook.com" target="_blank">
                    <i class="fa-brands fa-square-facebook"></i>
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <i class="fa-brands fa-square-instagram"></i>
                </a>
                <a href="https://www.twitter.com" target="_blank">
                    <i class="fa-brands fa-square-twitter"></i>
                </a>
            <?php endif; ?>
        </div>

    </div>
    <div class="quick">
        Quick <span class="rate">Rate</span>
    </div>

    <footer>
        <p style="margin-left: 15px;">Copyright © 2024 Agevole Innovation Pvt. Ltd.</p>
    </footer>

    <script>
        const stars = document.querySelectorAll('.rating span');
        const ratingInput = document.getElementById('rating'); // Ensure this is the correct input ID

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                // Update the hidden rating input value to reflect the selected star
                ratingInput.value = index + 1; // Set rating to 1-5, not 0-4

                // Update the selected stars visually
                stars.forEach((s, i) => {
                    if (i <= index) {
                        s.classList.add('selected');
                    } else {
                        s.classList.remove('selected');
                    }
                });

                // If rating is 4 or 5, redirect to the Google search URL
                if (ratingInput.value == '4' || ratingInput.value == '5') {
                    window.location.href = 'https://www.google.com/search?gs_ssp=eJzj4tVP1zc0zC5MNjAsyjUzYLRSNagwMjE2T0o1trRISTNLNLY0tDKoMDQ2Tk2ySExNNDIyMTcyS_ZiT0xPLcvPSQUAJXMR0g&q=agevole&oq=ag&gs_lcrp=EgZjaHJvbWUqFQgBEC4YJxivARjHARiABBiKBRiOBTIPCAAQIxgnGOMCGIAEGIoFMhUIARAuGCcYrwEYxwEYgAQYigUYjgUyBggCEEUYQDIGCAMQRRg5Mg0IBBAAGJECGIAEGIoFMgYIBRBFGDwyBggGEEUYPDIGCAcQRRg80gEIMTM1M2owajeoAgiwAgE&sourceid=chrome&ie=UTF-8#lrd=0x2437be398df6a391:0x133eb8aea224726c,3,,,,';
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


        // On page load, check the localStorage and hide fields if necessary
        window.onload = function() {
            ['name', 'contact', 'email', 'feedback'].forEach(field => {
                let state = localStorage.getItem(field);
                if (state === 'off') {
                    document.getElementById(field + '-field').style.display = 'none';
                }
            });
        };
    </script>
</body>

</html>