<?php
session_start();
include('db.php');

if (!isset($_SESSION['business_id'])) {
    header("Location: auth-login.php");
    exit();
}

$business_id = $_SESSION['business_id'];

// Mark subscription as active
$stmt = $conn->prepare("UPDATE businesses SET subscription_status = 'Active' WHERE id = ?");
$stmt->bind_param("i", $business_id);
if ($stmt->execute()) {
    echo "Payment successful! Subscription activated.";
} else {
    echo "Payment successful, but failed to update subscription status.";
}
$stmt->close();
?>
