<?php
include('db.php');
session_start();

if (!isset($_SESSION['business_id'])) {
    echo "Unauthorized access.";
    exit();
}

$business_id = $_SESSION['business_id'];
$range = $_POST['range'];
$date_condition = "";

switch ($range) {
    case 'today':
        $date_condition = "DATE(created_at) = CURDATE()";
        break;
    case '7days':
        $date_condition = "created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
        break;
    case '13days':
        $date_condition = "created_at >= DATE_SUB(CURDATE(), INTERVAL 13 DAY)";
        break;
    case '6months':
        $date_condition = "created_at >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)";
        break;
    case '1year':
        $date_condition = "created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)";
        break;
    default:
        echo "Invalid range.";
        exit();
}

$query = "SELECT * FROM feedback WHERE business_id = ? AND $date_condition ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $business_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo '<div class="feedback-card">
            <div class="feedback-details">
                <div class="feedback-title" title="' . htmlspecialchars($row['feedback']) . '">' . htmlspecialchars($row['feedback']) . '</div>
                <div class="feedback-meta">
                    <span>' . htmlspecialchars($row['name']) . '</span>
                    <span>' . date("j F, Y", strtotime($row['created_at'])) . '</span>
                    <span>' . date("g:i a", strtotime($row['created_at'])) . '</span>
                </div>
                <div class="rating-stars">';
    $rating = (int)$row['rating'];
    for ($i = 0; $i < 5; $i++) {
        echo $i < $rating ? '★' : '☆';
    }
    echo '    <span>(' . $rating . ')</span>
                </div>
            </div>
        </div>';
}
$stmt->close();
?>
