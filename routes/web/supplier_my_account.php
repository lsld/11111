<?php
Route::group(['middleware' => 'auth'], function () {

    Route::get('/supplier/my-account', 'SupplierMyAccountController@showMyAccount')
        ->name('show_supplier_my_account');

    Route::get('/supplier/my-account-view/', 'SupplierMyAccountController@showEditMyAccount')
        ->name('view_edit_supplier_my_account');

    Route::post('/supplier/my-account/', 'SupplierMyAccountController@editMyAccount')
        ->name('edit_supplier_my_account');
});






