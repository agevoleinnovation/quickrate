<?php
session_start();
include 'db.php';  // Database connection

// Check if the user is logged in
if (!isset($_SESSION['business_id']) && !isset($_POST['business_id'])) {
    echo "User not logged in or business_id not passed.";
    exit;
}

// Use the business_id passed in the AJAX request if available, otherwise use the session
$business_id = isset($_POST['business_id']) ? $_POST['business_id'] : $_SESSION['business_id'];

// Get the field name and its new value from the AJAX request
if (isset($_POST['field']) && isset($_POST['value'])) {
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Validate the field name (ensure it's a valid column)
    $allowedFields = ['show_name_field', 'show_contact_field', 'show_email_field'];  // Add allowed fields here
    if (!in_array($field, $allowedFields)) {
        echo "Invalid field.";
        exit;
    }

    // Update the field in the database
    $sql = "UPDATE businesses SET $field = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Use "s" for the value (assuming it's a string) and "i" for business_id (integer)
    $stmt->bind_param("si", $value, $business_id);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "Field updated successfully.";
    } else {
        echo "Error updating field: " . $stmt->error;  // Detailed error message
    }
} else {
    echo "Invalid request.";
}
?>
