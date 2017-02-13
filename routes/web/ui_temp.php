<?php

/* payment */

use System\Payment\Facades\Payment;

Route::get('stripe-payment', function () {

//    $payment = app(\Services\Payment\Contracts\PaymentInterface::class)->ipg('stripe');
//
//    try {
//        $payment->plan()->create(array(
//                "amount" => 2000,
//                "interval" => "month",
//                "name" => "Amazing Test Gold Plan",
//                "currency" => "usd",
//                "id" => "gold"
//            )
//        );
//    } catch (\Exception $e) {
//
//    }
//
//    try {
//        $payment->plan()->create(array(
//                "source" => $token,
//                "plan" => "gold",
//                "email" => "some-user@example.com"
//            )
//        );
//    } catch (\Exception $e) {
//
//    }
//
//    dd($payment);


});


Route::get('cweb-payment', function () {
    $payment = Payment::ipg('common_web');
    $link = $payment->subscriptionButton([
        'amount' => '208890',
        'ref_id' => 'CCF-20161202-100019',
        'description' => 'This is a test description',
    ], 'Test subscription');

    echo '<a href="' . $link . '">Pay</a>';

});

Route::get('payment-return', function (Request $request) {

    \Log::info('--------------st---------------------');
    \Log::info($request->all());
    \Log::info('--------------ed---------------------');


});

/*end of payment */


Route::get('/hirer/sign-up', 'Hirers\RegistrationController@getSingUp');

Route::get('/test', function () {
    return View::make('signup.hirer-register');

});

Route::get('/ui/login', function () {
    return View::make('signup.login');
});

Route::get('/ui/supplier-registration-register', function () {
    return View::make('signup.supplier-register');
});

Route::get('/ui/supplier-registration-location', function () {
    return View::make('signup.supplier-location');
});

Route::get('/ui/supplier-registration-company-profile', function () {
    return View::make('signup.supplier-company-profile');
});

Route::get('/ui/supplier-registration-pay', function () {
    return View::make('signup.supplier-pay');
});

Route::get('/ui/plans', function () {
    return View::make('signup.supplier-subscription');
});

Route::get('/ui/cjrplantHire', function () {
    return View::make('dashboards.create-job-request-plant-hire');
});

Route::get('/ui/cjrplantHire-1', function () {
    return View::make('dashboards.create-job-request-plant-hire-1');
});
Route::get('/ui/resetp', function () {
    return View::make('auth.passwords.reset');
});

/*SIGN UP SERVICES*/
Route::get('/ui/supplier-registration-service', function () {
    return View::make('signup.supplier-services');
});

Route::get('/ui/view-my-job-request', function () {
    return View::make('signup.view-my-job-request');
});

Route::get('/ui/view-job-request', function () {
    return View::make('signup.view-job-request');
});


/* SUPPLIER PORTAL COMAPNY PROFILE */
Route::get('/ui/supplier-portal-company-profile', function () {
    return View::make('dashboards.supplier-portal-company-profile');
});

Route::get('/ui/supplier-portal-job-request', function () {
    return View::make('dashboards.supplier-portal-job-request');
});
Route::get('/ui/hirer-company-profile', function () {
    return View::make('dashboards.hirer-company-profile');
});
Route::get('/ui/payment-successfull', function () {
    return View::make('signup.payment-successfull');
});
Route::get('/ui/supplier-portal-quotes', function () {
    return View::make('pages.supplier-portal-quates');
});
Route::get('/ui/supplier-portal-cjr-plant-hire', function () {
    return View::make('pages.supplier-portal-cjr-plant-hire');
});
Route::get('/ui/supplier-portal-my-account', function () {
    return View::make('pages.supplier-portal-my-account');
});
Route::get('/ui/supplier-portal-add-location', function () {
    return View::make('pages.supplier-portal-add-location');
});

Route::get('/ui/supplier-notification', function () {
    return View::make('signup.supplier-notification');
});

Route::get('/ui/manage-suppliers', function () {
    return View::make('admin.manage-suppliers');
});

