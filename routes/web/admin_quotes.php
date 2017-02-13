<?php

Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
            Route::group(['prefix' => 'quotes' ], function(){

            Route::get("/", "QuoteController@lists")->name('admin.quotes.list');

            Route::get("/{id}", "QuoteController@view")->name('admin.quotes.view');
        });
    });
});
