<?php

Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
            Route::group(['prefix' => 'hirer' ], function(){ /*  Manage Admin hires */

            Route::get("/", "HirerController@hirerList")->name('admin.hirer.list');

            Route::get("change_status/{id}/{status}", "HirerController@changeStatus")->name('admin.hirer.change_status');

            Route::get("view/{id}", "HirerController@view")->name('admin.hirer.view');
        });
    });
});
