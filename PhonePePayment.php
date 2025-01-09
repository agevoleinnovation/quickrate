<?php 
require 'vendor/autoload.php';

use PhonePe\PaymentGateway;

class PhonePePayment
{
    private $paymentGateway;

    public function __construct($merchantId, $keyIndex, $apiKey)
    {
        $this->paymentGateway = new PaymentGateway([
            'merchantId' => $merchantId,
            'keyIndex'   => $keyIndex,
            'apiKey'     => $apiKey,
            'environment' => 'production', // Use 'sandbox' for testing
        ]);
    }

    public function createPayment($amount, $transactionId, $redirectUrl)
    {
        try {
            $response = $this->paymentGateway->initiatePayment([
                'amount'         => $amount * 100,
                'transactionId'  => $transactionId,
                'redirectUrl'    => $redirectUrl,
                'validFor'       => 1800,
                'merchantOrderId' => uniqid(),
            ]);

            return $response;
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
