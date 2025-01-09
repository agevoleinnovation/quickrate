<?php
include("smsalert/vendor/autoload.php");
use SMSAlert\Lib\Smsalert\Smsalert;

class Controller
{
    private $apikey    = '';    // write your apikey in between ''
    private $senderid  = 'FOPIVE'; // write your senderid in between ''
    private $route     = '';    // write your route in between ''
    private $username  = 'jaimindobariya'; // write your username in between ''
    private $pass      = 'phe6XKG@';    // write your pass in between ''
    private $prefix    = '91';    // write your country code here eg. 91
    
    function __construct() {
        $this->processMobileVerification();
    }
    
    function processMobileVerification() {
        $smsalert = (new Smsalert())         
                    ->authWithUserIdPwd($this->username, $this->pass)
                    ->setForcePrefix($this->prefix)
                    ->setSender($this->senderid);

        switch ($_POST["action"]) {
            case "send_otp":
                $mobile_number = $_POST['mobile_number'];
                // Use [otp] for OTP placeholder
                $message = "Thank you for choosing TM Perfume House! Your OTP for logging in is [otp].";
                
                try {
                    $result = $smsalert->generateOtp($mobile_number, $message);
                    if ($result['status'] == "success") {
                        require_once ("verification-form.php");
                        exit();
                    } else {
                        $err_mesg = is_array($result['description']) ? $result['description']['desc'] : $result['description'];
                        echo json_encode(array("type"=>"error", "message"=>$err_mesg));
                    }
                } catch(Exception $e) {
                    die('Error: '.$e->getMessage());
                }
                break;

            case "verify_otp":
                $otp = $_POST['otp'];
                $mobile_number = $_POST['mobile_number'];
                $result = $smsalert->validateOtp($mobile_number, $otp);
                if ($result['status'] == "success") {
                    if($result['description']['desc']=='Code Matched successfully.') {
                        echo json_encode(array("type"=>"success", "message"=>"Thank you for choosing TM Perfume House! Your OTP for logging in is [otp]."));
                    }
                } else {
                    echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
                }
                break;
        }
    }
}

$controller = new Controller();
?>
