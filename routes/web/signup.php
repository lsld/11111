<?php

Route::group(['prefix' => 'sign-up'], function () {

    Route::get('/hirer', 'Auth\RegistrationController@showHirerSingUpForm')
        ->name('show_hirer_singup');

    Route::post('/hirer', 'Auth\RegistrationController@hirerSingUp')
        ->name('hirer_singup');


    Route::group(['prefix' => 'supplier'], function () {

        Route::get('/account', 'Auth\RegistrationController@showSupplierAccount')
            ->name('show_supplier_singup')
            ->middleware('wizard');

        Route::post('/account', 'Auth\RegistrationController@supplierAccount')
            ->name('supplier_singup_account');


        Route::get('/subscriptions', 'Auth\RegistrationController@showSubscription')
            ->name('show_supplier_singup_subscription')
            ->middleware('wizard');

        Route::post('/subscriptions', 'Auth\RegistrationController@subscription')
            ->name('supplier_singup_subscription');


        Route::get('/company_profile', 'Auth\RegistrationController@showSupplierCompanyProfile')
            ->name('show_supplier_singup_company_profile')
            ->middleware('wizard');

        Route::post('/company_profile/next', 'Auth\RegistrationController@supplierCompanyProfileSkip')
            ->name('skip_supplier_singup_company_profile');

        Route::post('/company_profile', 'Auth\RegistrationController@supplierCompanyProfile')
            ->name('supplier_singup_company_profile');

        Route::get('/locations', 'Auth\RegistrationController@showSupplierLocations')
            ->name('show_supplier_singup_location')
            ->middleware('wizard');

        Route::post('/locations', 'Auth\RegistrationController@supplierLocations')
            ->name('supplier_singup_location');

        Route::post('/locations/next', 'Auth\RegistrationController@supplierLocationsComplete')
            ->name('supplier_singup_location_complete');




        Route::get('/services', 'Auth\RegistrationController@showService')
            ->name('show_supplier_services')
            ->middleware('wizard');

        Route::post('/services/plant', 'Auth\RegistrationController@plantService')
            ->name('supplier_plant_services');


        Route::post('/services/contracting', 'Auth\RegistrationController@contractingService')
            ->name('supplier_contracting_services');

        Route::post('/services/material', 'Auth\RegistrationController@materialService')
            ->name('supplier_material_services');

        Route::post('/services/fill', 'Auth\RegistrationController@fillService')
            ->name('supplier_fill_services');


        Route::post('/services/next', 'Auth\RegistrationController@supplierServiceComplete')
            ->name('supplier_service_complete');




        Route::get('/notifications', 'Auth\RegistrationController@showNotifications')
            ->name('show_supplier_notifications');

        Route::post('/notifications', 'Auth\RegistrationController@supplierNotifications')
            ->name('supplier_notifications');


        Route::post('/notifications/skip', 'Auth\RegistrationController@notificationsSkip')
            ->name('supplier_singup_notifications_skip');

        Route::post('/notifications/next', 'Auth\RegistrationController@notificationsComplete')
            ->name('supplier_notifications_complete');



        //Route::post('/notifications', 'Auth\RegistrationController@notificationsComplete');


        Route::get('/submit', 'Auth\RegistrationController@showReviewAndSubmit')
            ->name('show_supplier_singup_submit')
            ->middleware('wizard');

        Route::post('/submit', 'Auth\RegistrationController@reviewAndSubmit')
            ->name('supplier_singup_submit');

        Route::get('/payment-verify', 'Auth\RegistrationController@paymentVerify')
            ->name('payment_verify');

        Route::get('/payment-confirm', 'Auth\RegistrationController@paymentConfirm')
            ->name('payment_confirm');

        Route::get('/services/plant/{id}', 'Auth\RegistrationController@deletePlant')
            ->name('supplier_plant_delete');

        Route::get('/services/contracting/{id}', 'Auth\RegistrationController@deleteContracting')
            ->name('supplier_contracting_delete');

        Route::get('/services/material/{id}', 'Auth\RegistrationController@deleteMaterial')
            ->name('supplier_material_delete');

        Route::get('/services/fill/{id}', 'Auth\RegistrationController@deleteFill')
            ->name('supplier_fill_delete');



        Route::post('/locations/skip', 'Auth\RegistrationController@locationsSkip')
            ->name('supplier_singup_location_skip');

        Route::post('/subscriptions/skip', 'Auth\RegistrationController@subscriptionsSkip')
            ->name('supplier_singup_subscriptions_skip');

        Route::post('/services/skip', 'Auth\RegistrationController@servicesSkip')
            ->name('supplier_singup_services_skip');


        Route::get('/getRegionsByStateId/{id?}', 'Auth\RegistrationController@getRegionsByStateId')
        ->name('getRegionsByStateId');
        
    });


});

