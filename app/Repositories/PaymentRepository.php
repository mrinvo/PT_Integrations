<?php

namespace App\Repositories;


use App\Traits\SendRequestTrait;
use App\Http\Resources\DataWrapper;
use Illuminate\Foundation\Http\FormRequest;
/**
 * Class PaymentRepository
 *
 * This class provides methods for generating payment-related data.
 */
class PaymentRepository
{

    use SendRequestTrait;
    /**
     * Process a payment request by preparing the passed request and transform it into payload to send it to client
     *
     * @param FormRequest $request The payment validated accepted request data.
     * @return mixed The result of the payment request.
     */
    public function processRequest($request)
    {
        // Create a DataWrapper instance to prepare the request data.
        $response = new DataWrapper($request);

        // Convert the wrapped data to an array.
        $payload = $response->toArray();

    

        // Send the payment request using the SendRequestTrait.
        return $payment = $this->sendPaymentRequest($request->payment_type, $payload);
    }


    public function verifyReturn($response)
    {
        if (empty($response) || !array_key_exists('signature', $response)) {
            return false;
        }

        $serverKey = env('PT_API_KEY');

        // Request body include a signature post Form URL encoded field
        // 'signature' (hexadecimal encoding for hmac of sorted post form fields)
        $requestSignature = $response["signature"];
        unset($response["signature"]);
        $fields = array_filter($response);

        // Sort form fields
        ksort($fields);

        // Generate URL-encoded query string of Post fields except signature field.
        $query = http_build_query($fields);


        return $this->is_genuine($query, $requestSignature, $serverKey);
    }

    private function is_genuine($data, $requestSignature, $serverKey)
    {
        $signature = hash_hmac('sha256', $data, $serverKey);

        if (hash_equals($signature, $requestSignature) === TRUE) {
            // VALID Redirect
            return true;
        } else {
            // INVALID Redirect
            return false;
        }
    }

}
