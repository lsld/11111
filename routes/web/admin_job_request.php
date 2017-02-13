<?php

Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
            Route::group(['prefix' => 'job-request' ], function(){ 

            Route::get("/", "JobRequestsController@lists")->name('admin.jobRequest.list');

            Route::get("/{id}", "JobRequestsController@view")->name('admin.jobRequest.view');
        });
    });
});
