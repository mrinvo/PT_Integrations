<?php

use App\Http\Controllers\PaymentController;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('hosted');
});

Route::get('/error', function () {
    return view('error2');
});
Route::get('/success', function () {
    return view('success2');
});

Route::get('/invoice', function () {
    return view('invoice');
});

Route::get('/managed', function () {
    return view('managed');
});

Route::get('/own', function () {
    return view('own');
});


Route::get('/recurring', function () {
    return view('recurring');
});


Route::get('/query', function () {
    return view('follow');
});


Route::get('/capture', function () {
    return view('capture');
});

Route::get('/refund', function () {
    return view('refund');
});

Route::get('/void', function () {
    return view('void');
});



Route::get('/invoice-status', function () {
    return view('status');
});

Route::get('/cancel-invoice', function () {
    return view('cancel');
});

Route::get('/payment-page', function(){

    return view('paymentpage');
});

Route::get('/framed-return', function(){

    return view('suc');
});

Route::prefix('/payment')->group(function () {

    route::post('/invoice',[PaymentController::class,'initiateInvoice']);

    Route::post('/return', [PaymentController::class, 'return'])->name('return');
    route::post('/initiate',[PaymentController::class,'initiateHostedPaymentPage']);
    route::post('/iframe',[PaymentController::class,'initiateIframePaymentPage']);
    route::post('/managed',[PaymentController::class,'initiateManaged']);
    route::post('/own',[PaymentController::class,'initiateOwn']);
    route::post('/recurring',[PaymentController::class,'recurring']);


    route::post('/query',[PaymentController::class,'query']);

    route::post('/capture',[PaymentController::class,'capture']);
    route::post('/void',[PaymentController::class,'void']);

    route::post('/refund',[PaymentController::class,'refund']);

    route::post('/invoice/status',[PaymentController::class,'invoiceStatus']);
    route::post('/invoice/cancel',[PaymentController::class,'cancelInvoice']);






});
