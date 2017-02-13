<?php


//Route::group(['middleware' => 'auth'], function () {
//    Route::get("company-profile/{id}", "CompanyProfileController@show");
//
//});
Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'JobRequest'], function () {

        Route::get("job-request", "JobRequestController@lists")
            ->name('job-request');
        
        Route::get("job-request/{id}", "JobRequestController@view")
            ->name('view-job-request');

        Route::get("my-job-request/{id}", "MyJobRequestController@view")
            ->name('view-my-job-request');

        Route::get("my-job-request", "MyJobRequestController@lists")
            ->name('my-job-request');

        Route::get("view-quotes/{id}", "MyJobRequestController@viewQuote")
            ->name('view-quote');

        Route::post("change-quote-status", "MyJobRequestController@changeQuoteStatus")
            ->name('change-quote-status');
    });
});



