<?php
session_start();

// Check if OTP is set in the session
if (isset($_SESSION['otp'])) {
    echo json_encode([
        'success' => true,
        'otp' => $_SESSION['otp'],  // Output the OTP stored in the session for debugging purposes
        'message' => 'OTP is set in the session.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Session OTP not set'
    ]);
}
?>
