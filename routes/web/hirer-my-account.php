<?php
Route::group(['namespace' => 'HirerPortal', 'middleware' => 'auth'], function () {
    Route::get('/hirer/my-account', 'HirerMyAccountController@showMyAccount')
        ->name('view_hirer_my_account');

    Route::get('/hirer/my-account-view/', 'HirerMyAccountController@showEditMyAccount')
        ->name('view_edit_hirer_my_account');

    Route::post('/hirer/my-account/', 'HirerMyAccountController@editMyAccount')
        ->name('edit_hirer_my_account');

    Route::get('/getRegionsByStateIdSelected/{id?}', 'HirerMyAccountController@getRegionsByStateIdSelected')
        ->name('getRegionsByStateIdSelected');

    Route::get('/getRegionsByStateIdLoad/{id?}', 'HirerMyAccountController@getRegionsByStateIdLoad')
        ->name('getRegionsByStateIdLoad');

});
