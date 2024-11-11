<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostedRequest;
use App\Http\Requests\InvoiceRequest;
use App\Repositories\PaymentRepository;
use App\Http\Requests\ValidateInitialRequest;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

/**
 * Class PaymentController
 *
 * This class handles payment-related actions in the application.
 *
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    /**
     * The PaymentRepository instance used for database operations.
     *
     * @var PaymentRepository
     */
    protected $PaymentRepository;

    /**
     * PaymentController constructor.
     *
     * @param PaymentRepository $requestRepository The PaymentRepository instance.
     */
    public function __construct(PaymentRepository $requestRepository)
    {
        $this->PaymentRepository = $requestRepository;
    }

    /**
     * Initiate a hosted payment request.
     *
     * @param HostedRequest $request The hosted payment request object.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response The response, which may include a redirection or a direct response.
     */
    public function initiateHostedPaymentPage(HostedRequest $request)
    {


        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        $displayPayload = false;




        // Check if a redirect URL is provided in the response and redirect the user if available.
        return (isset($response->redirect_url)) ? redirect($response->redirect_url) : view('error',compact('response','displayPayload'));
    }


    public function initiateIframePaymentPage(HostedRequest $request)
    {


        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        $displayPayload = false;

        // Check if a redirect URL is provided in the response and redirect the user if available.
        return $response;
    }

    /**
     * Initiate an invoice payment request.
     *
     * @param InvoiceRequest $request The invoice payment request object.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response The response, which may include a redirection or a direct response.
     */
    public function initiateInvoice(InvoiceRequest $request)
    {
        // Process the invoice payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);


        $displayPayload = true;

        // Check if an invoice link is provided in the response and redirect the user if available.
        return (isset($response->invoice_link)) ? redirect($response->invoice_link) : view('error',compact('response','displayPayload'));
    }


    public function initiateManaged(Request $request)
    {

        // dd($request);

        // Process the invoice payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);


        $displayPayload = true;

             dd($response);





        return (property_exists($response, 'payment_result') && $response->payment_result->response_status == 'A')
        ? view('success', compact('response', 'displayPayload'))
        : (property_exists($response, 'payment_result')
            ? view('error', compact('response', 'displayPayload'))
            : redirect($response->redirect_url));


    }

    public function initiateOwn(Request $request)
    {



        // Process the invoice payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);


        $displayPayload = true;

           // dd($request);



        return (property_exists($response, 'payment_result') && $response->payment_result->response_status == 'A')
        ? view('success', compact('response', 'displayPayload'))
        : (property_exists($response, 'payment_result')
            ? view('error', compact('response', 'displayPayload'))
            : redirect($response->redirect_url));


    }



    public function return(Request $request){



        parse_str($request->getContent(),$response);

        $verified = $this->PaymentRepository->verifyReturn($response);



        $displayPayload = true;


            return ($response['respStatus']=="A") ? view('success2',compact('response','displayPayload')) : view('error',compact('response','displayPayload'));




    }


    public function recurring(Request $request){


        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        $displayPayload = true;


        // Check if a redirect URL is provided in the response and redirect the user if available.
        return ($response->payment_result->response_status=="A") ? view('success',compact('response','displayPayload')) : view('error',compact('response','displayPayload'));
    }



    public function query(Request $request){


        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        $displayPayload = true;

        dd($response);


        // Check if a redirect URL is provided in the response and redirect the user if available.
        return ($response->payment_result->response_status=="A") ? view('success',compact('response','displayPayload')) : view('error',compact('response','displayPayload'));


    }



    public function capture(Request $request){


        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        $displayPayload = true;

        // dd($response);


        // Check if a redirect URL is provided in the response and redirect the user if available.
        return ($response->payment_result->response_status=="A") ? view('success',compact('response','displayPayload')) : view('error',compact('response','displayPayload'));


    }


    public function void(Request $request){


        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        $displayPayload = true;

        // dd($response);


        // Check if a redirect URL is provided in the response and redirect the user if available.
        return ($response->payment_result->response_status=="A") ? view('success',compact('response','displayPayload')) : view('error',compact('response','displayPayload'));


    }

    public function refund(Request $request){


        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        $displayPayload = true;



        // Check if a redirect URL is provided in the response and redirect the user if available.
        return ($response->payment_result->response_status=="A") ? view('success',compact('response','displayPayload')) : view('error',compact('response','displayPayload'));


    }


    public function invoiceStatus(Request $request){

        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        $displayPayload = true;

        dd($response);

        // Check if a redirect URL is provided in the response and redirect the user if available.
        return ($response->payment_result->response_status=="A") ? view('success',compact('response','displayPayload')) : view('error',compact('response','displayPayload'));



    }

    public function cancelInvoice(Request $request){

        // Process the hosted payment request using the PaymentRepository.
        $response = $this->PaymentRepository->processRequest($request);

        $displayPayload = true;

        dd($response);

        // Check if a redirect URL is provided in the response and redirect the user if available.
        return ($response->payment_result->response_status=="A") ? view('success',compact('response','displayPayload')) : view('error',compact('response','displayPayload'));



    }


}
