<?php

Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
            Route::group(['prefix' => 'promo-codes' ], function(){ 

            Route::get("/", "PromoCodesController@codeList")->name('admin.code.list');
            Route::get("change_status/{id}/{status}", "PromoCodesController@changeStatus")->name('admin.code.change_status');
            Route::get("create", "PromoCodesController@codeCreate")->name('admin.code.create');
            Route::any("validate", "PromoCodesController@validate")->name('admin.code.validate');
            Route::post("store", "PromoCodesController@store")->name('admin.code.store');
            Route::get("edit/{id}", "PromoCodesController@edit")->name("admin.code.edit");
            Route::post("edit/{id}", "PromoCodesController@update")->name('admin.code.update');
        });
    });
});