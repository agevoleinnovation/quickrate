<?php
include("smsalert/vendor/autoload.php");
use SMSAlert\Lib\Smsalert\Smsalert;

$data = json_decode(file_get_contents('php://input'), true);
$mobile_number = $data['mobile_number'];

$apikey    = '';    // Your API Key
$senderid  = 'FOPIVE'; // Your Sender ID
$route     = '';    // Your route
$username  = 'jaimindobariya'; // Your username
$pass      = 'phe6XKG@';    // Your password
$prefix    = '91';    // Your country code

$smsalert = (new Smsalert())         
            ->authWithUserIdPwd($username, $pass)
            ->setForcePrefix($prefix)
            ->setSender($senderid);

$message = "Thank you for choosing TM Perfume House! Your OTP for logging in is [otp].";

try {
    $result = $smsalert->generateOtp($mobile_number, $message);
    if ($result['status'] == "success") {
        echo json_encode(['type' => 'success', 'message' => 'OTP sent successfully.']);
    } else {
        $err_mesg = is_array($result['description']) ? $result['description']['desc'] : $result['description'];
        echo json_encode(['type' => 'error', 'message' => $err_mesg]);
    }
} catch (Exception $e) {
    echo json_encode(['type' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
}
?>
