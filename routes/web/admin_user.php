<?php

Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

        Route::get("/", "DashboardController@index")
            ->name('admin.dashboard');

        Route::group(['prefix' => 'user' ], function(){ /*  Manage Admin Users */
            
            Route::get("/", "UserController@userList")->name('admin.user.list');
            Route::get("create", "UserController@create")->name('admin.user.create');

            Route::any("validate", "UserController@validate")->name('admin.user.validate');
            Route::any("validate-edit", "UserController@validateEdit")->name('admin.user.validate_edit');
            Route::post("create", "UserController@store")->name('admin.user.store');

            Route::get("view/{id}", "UserController@view")->name('admin.user.view');
            Route::get("edit/{id}", "UserController@edit")->name('admin.user.edit');

            Route::post("edit/{id}", "UserController@update")->name('admin.user.update');

            Route::get("change_status/{id}/{status}", "UserController@changeStatus")->name('admin.user.change_status');

        });
    });
});