<?php
include 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

// Query to get business details
$sql = "SELECT * FROM businesses WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['success' => true, 'contact_no' => $row['contact_no']]);
} else {
    echo json_encode(['success' => false, 'message' => 'Business not found']);
}
?>
