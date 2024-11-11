<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Repositories\PaymentRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

/**
 * Class DataWrapper
 *
 * This class represents a data wrapper used for preparing the payment request payload.
 */
class DataWrapper
{
    /**
     * The customer details associated with the payment data.
     *
     * @var mixed
     */
    public $customerDetails;

    /**
     * The shipping details associated with the payment data.
     *
     * @var mixed
     */
    public $shippingDetails;

    /**
     * User-defined data associated with the payment.
     *
     * @var FormRequest
     */
    public $userDefined;

    /**
     * Invoice data, if applicable.
     *
     * @var FormRequest
     */
    public $invoice;

    /**
     * The type of payment (e.g., hosted or invoice).
     *
     * @var string
     */
    public $paymentType;

    /**
     * The payload data for the payment request.
     *
     * @var FormRequest
     */
    public $payload;

        /**
     * The instance of the payment Repository.
     *
     * @var FormRequest
     */
    protected $PaymentRepository;

    /**
     * DataWrapper constructor.
     *
     * @param FormRequest $request The payment request data.
     */
    public function __construct($request)
    {


        $this->PaymentRepository = new PaymentRepository;

        // Prepare customer details, shipping details, and user-defined objects based on the request.
        $this->customerDetails = $this->GenerateCustomerDetails($request);
        $this->shippingDetails = $this->GenerateShippingDetails($request);
        $this->userDefined = $this->GenerateUserDefined($request);

        // Set the payment type from the request.
        $this->paymentType = $request->payment_type;


        // Prepare the payload based on the payment type.

        switch($this->paymentType){

            case 'hosted':

                $this->payload = $this->GenerateHostedPayload($request, $this->customerDetails);

                break;

            case 'invoice':

                $this->payload = $this->GenerateInvoicePayload($request, $this->customerDetails);

                break;

            case 'managed':

                    $this->payload = $this->GenerateManagedPayload($request, $this->customerDetails, $this->shippingDetails);

                    break;

            case 'own':

                    $this->payload = $this->GenerateOwnPayload($request, $this->customerDetails, $this->shippingDetails);

                    break;

            case 'recurring':

                    $this->payload = $this->GenerateRecurringPayload($request, $this->customerDetails);

                    break;

            case 'query':

                        $this->payload = $this->GenerateQueryPayload($request, $this->customerDetails);

                        break;

            case 'capture':

                        $this->payload = $this->GenerateCapturePayload($request, $this->customerDetails);

                        break;

            case 'void':

                        $this->payload = $this->GenerateVoidPayload($request, $this->customerDetails);

                        break;
            case 'refund':

                $this->payload = $this->GenerateRefundPayload($request, $this->customerDetails);

                break;

            case 'status':

                $this->payload = $this->GenerateStatusPayload($request);

                break;

            case 'cancel':

                $this->payload = $this->cancelInvoice($request);

                break;





        }


        }


        /**
     * Generate customer details based on a given request.
     *
     * @param mixed $request The payment request data.
     * @return array<string, mixed> Customer details.
     */
    public function GenerateCustomerDetails($request)
    {
        // Generate and return customer details array.
        $customerDetails = [
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            "phone" => $request->customer_phone,
            "street1" => $request->customer_street,
            "city" => $request->customer_city,
            "state" => $request->customer_state,
            "country" => $request->customer_country,
            "zip" => $request->customer_zip,
            "ip" => "197.43.63.156"

        ];

        return $customerDetails;
    }

        /**
     * Generate shipping details based on a given request.
     *
     * @param mixed $request The payment request data.
     * @return array<string, mixed> Shipping details.
     */
    public function GenerateShippingDetails($request)
    {


        if($request->shippingAsBilling == "same"){
            $shippingDetails = $this->customerDetails;
        }else{
        // Generate shipping details from request.
        $shippingDetails = [
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            "phone" => $request->shipping_phone,
            "street1" => $request->shipping_street,
            "city" => $request->shipping_city,
            "state" => $request->shipping_state,
            "country" => $request->shipping_country,
            "zip" => $request->shipping_zip,
            "ip" => "197.43.63.156"
        ];
        }

        //return shipping details after generating

        return $shippingDetails;
    }

        /**
     * Generate user-defined data based on a given request.
     *
     * @param mixed $request The payment request data.
     * @return array<string, mixed> User-defined data.
     */
    public function GenerateUserDefined($request)
    {
        // Generate and return user-defined data array.
        $userDefined = [
            'UDF1' => "this is my customer type",
            // 'UDF2' => $request->udf2,
            // 'UDF3' => $request->udf3,
            // 'UDF4' => $request->udf4,
            // 'UDF5' => $request->udf5,
            // 'UDF6' => $request->udf6,
            // 'UDF7' => $request->udf7,
            // 'UDF8' => $request->udf8,
            // 'UDF9' => $request->udf9,
        ];

        return $userDefined;
    }


    /**
     * Generate a payload for hosted payment based on the request and associated data.
     *
     * @param mixed $request The payment request data.
     * @param array<string, mixed>|null $customerDetails Customer details.
     * @param array<string, mixed>|null $shippingDetails Shipping details.
     * @param array<string, mixed>|null $userDefined User-defined data.
     * @return array<string, mixed> The generated payload.
     */
    public function GenerateHostedPayload($request = null, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {
        $payload = [];

        // Generate the payload for hosted payment and return it.
        $payload = [

            "profile_id" => env('PT_PROFILE_ID'),
            "tran_type" => config('paytabs.tran_type'),
            "tran_class" => config('paytabs.tran_class'),
            "cart_id" => $request->cart_id,
            "cart_currency" => $request->cart_currency,
            "cart_amount" => (double)$request->cart_amount,
            "cart_description" => $request->cart_description,
            "customer_details" => $this->customerDetails,
            "shipping_details" => $this->customerDetails,
            // "config_id" =>2678,
            // 'tokenise' => 2,

            // 'paypage_lang' => "ar",


        //     "token" => "2C4654BE67A3ED33C6BE90FB66827EBE",
        //    "tran_ref" => "TST2406101960337",

            //"token" => "2C4653BC67A3E43CC6B090F56C877BB0",
           // "tran_ref" => "TST2405101831158",

                // "return" => "https://paytabs-tutorials.test/payment/return", //response callback

            "callback" => "https://webhook.site/0cb72065-8a90-4016-97b8-6311d8554cf3" // pro callback

        ];




        return $payload;
    }

    /**
     * Generate a payload for invoice payment based on the request and associated data.
     *
     * @param mixed $request The payment request data.
     * @param array<string, mixed>|null $customerDetails Customer details.
     * @param array<string, mixed>|null $shippingDetails Shipping details.
     * @param array<string, mixed>|null $userDefined User-defined data.
     * @return array<string, mixed> The generated payload.
     */
/**
 * Generate a payload for invoice payment based on the request and associated data.
 *
 * @param mixed $request The payment request data.
 * @param array<string, mixed>|null $customerDetails Customer details.
 * @param array<string, mixed>|null $shippingDetails Shipping details.
 * @param array<string, mixed>|null $userDefined User-defined data.
 * @return array<string, mixed> The generated payload.
 */
public function GenerateInvoicePayload($request, $customerDetails = null, $shippingDetails = null, $userDefined = null)
{
    $line_items = [];

    // Extract line items from the request and convert unit cost to a double.
    $lineItems = $request['line_items'];

    foreach ($lineItems as $lineItem) {
        $lineItem["uni_cost"] = (double)$lineItem["unit_cost"];
        $lineItem["quantity"] = 1;

        $lineItem["sku"] = "kjs";
        // $lineItem["discount_rate"] = (double)$lineItem["discount_rate"];
        // $lineItem["tax_total"] = (double)$lineItem["tax_total"];
        // $lineItem["quantity"] = (double)$lineItem["quantity"];
        $line_items[] = $lineItem;



    }

    // Generate the payload for invoice payment and return it.
    $payload = [
        "profile_id" => env('PT_PROFILE_ID'),
        "tran_type" => config('paytabs.tran_type'),
        "tran_class" => config('paytabs.tran_class'),
        "cart_id" => $request->cart_id,
        "cart_currency" => $request->cart_currency,
        "cart_amount" => (double)$request->cart_amount,
        "cart_description" => $request->cart_description,

        "show_save_card" => true,

        "customer_details" => $this->customerDetails,
        "shipping_details" => $this->customerDetails,
        "hide_shipping" => true,
        "user_defined" => $this->userDefined,
        // "tokenise" => 2,


        "invoice" => [

            "lang" => "en",

            // "shipping_charges" => 10,
            // "extra_charges" => 10,
            // "extra_discount" => 10,
            // "expiry_date" => '2024-01-11T12:36:00+04:00',
            // "activation_date" => "",

            // "notifications"=> [


            //     "emails"=>["test@test.com","test2@test.com"]

            // ],


            "line_items" => $line_items
        ],


        "return" => "https://paytabs-tutorials.test/payment/return",

       "callback" => "https://webhook.site/56bb078a-af4f-48ca-8375-27bfe5acb01c"
    ];


    return $payload;
}

/**
 * Generate a payload for invoice payment based on the request and associated data.
 *
 * @param mixed $request The payment request data.
 * @param array<string, mixed>|null $customerDetails Customer details.
 * @param array<string, mixed>|null $shippingDetails Shipping details.
 * @param array<string, mixed>|null $userDefined User-defined data.
 * @return array<string, mixed> The generated payload.
 */
public function GenerateRecurringPayload($request, $customerDetails = null, $shippingDetails = null, $userDefined = null)
{


    // Generate the payload for invoice payment and return it.
    $payload = [
        "profile_id" => env('PT_PROFILE_ID'),
        "tran_type" => config('paytabs.tran_type'),
        "tran_class" => "recurring",
        "cart_id" => $request->cart_id,
        "cart_currency" => $request->cart_currency,
        "cart_amount" => (double)$request->cart_amount,
        "cart_description" => $request->cart_description,

        "token" => "2C4653BC67A3E43CC6B090F56C877BB0",
        "tran_ref" => "TST2405101831158",

        "callback" => "https://webhook.site/08054005-c8b0-473b-befd-7b6be32fb3e8"



    ];

    return $payload;
}

    /**
     * Generate a payload for hosted payment based on the request and associated data.
     *
     * @param mixed $request The payment request data.
     * @param array<string, mixed>|null $customerDetails Customer details.
     * @param array<string, mixed>|null $shippingDetails Shipping details.
     * @param array<string, mixed>|null $userDefined User-defined data.
     * @return array<string, mixed> The generated payload.
     */
    public function GenerateManagedPayload($request = null, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {
        $payload = [];

        // Generate the payload for hosted payment and return it.
        $payload = [

            "profile_id" => env('PT_PROFILE_ID'),
            "tran_type" => config('paytabs.tran_type'),
            "tran_class" => config('paytabs.tran_class'),
            "cart_id" => $request->cart_id,
            "cart_currency" => $request->cart_currency,
            "cart_amount" => (double)$request->cart_amount,
            "cart_description" => $request->cart_description,
            "customer_details" => $customerDetails,
            "shipping_details" => $this->customerDetails,
            "user_defined" => $this->userDefined,

            "tokenise" => 2,

            "payment_token" => $request->token,

            "callback" => "https://webhook.site/ec3280e9-2136-4226-8536-b7dc464b631c",

            "return" => "https://paytabs-tutorials.test/payment/return",
        ];

        return $payload;
    }


    public function GenerateOwnPayload($request = null, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {


        $payload = [];
        $randomString = Str::random(10);

        // Generate the payload for hosted payment and return it.
        $payload = [

            "profile_id" => env('PT_PROFILE_ID'),
            "tran_type" => config('paytabs.tran_type'),
            "tran_class" => config('paytabs.tran_class'),
            "cart_id" => 'cart1XXfqIreYIP',
            "cart_currency" => $request->cart_currency,
            "cart_amount" => (double)$request->cart_amount,
            "cart_description" => $request->cart_description,
            "customer_details" => $customerDetails,
            "shipping_details" => $this->shippingDetails,

            "tokenise" => 2,

            "user_defined" => $this->userDefined,
            "card_details" => [
                "pan"=> $request->pan,
                "cvv"=> $request->cvv,
                "expiry_month"=> (int)$request->expmonth,
                "expiry_year"=> (int)$request->expyear
            ],



            "callback" => "https://webhook.site/08054005-c8b0-473b-befd-7b6be32fb3e8",

            "return" => "https://paytabs-tutorials.test/payment/return",
        ];

        return $payload;
    }



        /**
     * Generate a payload for hosted payment based on the request and associated data.
     *
     * @param mixed $request The payment request data.
     * @param array<string, mixed>|null $customerDetails Customer details.
     * @param array<string, mixed>|null $shippingDetails Shipping details.
     * @param array<string, mixed>|null $userDefined User-defined data.
     * @return array<string, mixed> The generated payload.
     */
    public function GenerateQueryPayload($request = null, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {
        $payload = [];

        // Generate the payload for hosted payment and return it.
        $payload = [

            "profile_id" => env('PT_PROFILE_ID'),
            "cart_id" => $request->tran_ref,

        ];

        return $payload;
    }


    public function GenerateRefundPayload($request = null, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {
        $payload = [];

        // Generate the payload for hosted payment and return it.
        $payload = [

            "profile_id" => env('PT_PROFILE_ID'),
            "tran_type" => "refund",
            "tran_class" => config('paytabs.tran_class'),
            "cart_id" => $request->cart_id,
            "cart_currency" => $request->cart_currency,
            "cart_amount" => (double)$request->cart_amount,
            "cart_description" => $request->cart_description,

            "tran_ref" => $request->tran_ref,

            "callback" => "https://webhook.site/08054005-c8b0-473b-befd-7b6be32fb3e8"
        ];

        return $payload;
    }



    public function GenerateCapturePayload($request = null, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {
        $payload = [];

        // Generate the payload for hosted payment and return it.
        $payload = [

            "profile_id" => env('PT_PROFILE_ID'),
            "tran_type" => "capture",
            "tran_class" => config('paytabs.tran_class'),
            "cart_id" => $request->cart_id,
            "cart_currency" => $request->cart_currency,
            "cart_amount" => (double)$request->cart_amount,
            "cart_description" => $request->cart_description,

            "tran_ref" => $request->tran_ref,

            "callback" => "https://webhook.site/ec3280e9-2136-4226-8536-b7dc464b631c"


        ];




        return $payload;
    }


    public function GenerateVoidPayload($request = null, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {
        $payload = [];

        // Generate the payload for hosted payment and return it.
        $payload = [

            "profile_id" => env('PT_PROFILE_ID'),
            "tran_type" => "void",
            "tran_class" => config('paytabs.tran_class'),
            "cart_id" => $request->cart_id,
            "cart_currency" => $request->cart_currency,
            "cart_amount" => (double)$request->cart_amount,
            "cart_description" => $request->cart_description,

            "tran_ref" => $request->tran_ref,

            "callback" => "https://webhook.site/08054005-c8b0-473b-befd-7b6be32fb3e8"

        ];




        return $payload;
    }

    public function GenerateStatusPayload($request = null, $customerDetails = null, $shippingDetails = null, $userDefined = null)
    {
        $payload = [];

        // Generate the payload for hosted payment and return it.
        $payload = [

            "profile_id" => env('PT_PROFILE_ID'),
            "invoice_id" => (double)$request->invoice_id,

        ];

        return $payload;
    }

    public function cancelInvoice($request = null)
    {
        $payload = [];

        // Generate the payload for hosted payment and return it.
        $payload = [

            "profile_id" => env('PT_PROFILE_ID'),
            "invoice_id" => (double)$request->invoice_id,

        ];

        return $payload;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed> The payload data.
     */
    public function toArray()
    {
        return $this->payload;
    }
}
