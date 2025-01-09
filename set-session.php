<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['businessId'])) {
        $_SESSION['business_id'] = $data['businessId']; // Store the businessId in session
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No business ID provided']);
    }
}
 


//