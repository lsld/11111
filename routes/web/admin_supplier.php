<?php

Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {


        Route::group(['prefix' => 'supplier' ], function(){ /*  Manage Admin suppliers */

            Route::get("/", "SupplierController@supplierList")->name('admin.supplier.list');
            Route::get("create", "SupplierController@create")->name('admin.supplier.create');

            Route::any("validate", "SupplierController@validate")->name('admin.supplier.validate');
            Route::any("validate-edit", "SupplierController@validateEdit")->name('admin.supplier.validate_edit');
            Route::post("create", "SupplierController@store")->name('admin.supplier.store');

            Route::get("view/{id}", "SupplierController@view")->name('admin.supplier.view');
            Route::get("edit/{id}", "SupplierController@edit")->name('admin.supplier.edit');

            Route::post("edit/{id}", "SupplierController@update")->name('admin.supplier.update');

            Route::get("change_status/{id}/{status}", "SupplierController@changeStatus")->name('admin.supplier.change_status');

        });

        Route::group(['prefix' => 'supplier-location/{supplier_id}' ], function() {
            Route::post("create", "SupplierController@storeLocation")->name('admin.supplier.store.location');
            Route::get("list", "SupplierController@storeLocationList")->name('admin.supplier.store.location.list');

            Route::get("edit/{id}", "SupplierController@editLocation")->name('admin.supplier.edit.location');
            Route::post("edit/{id?}", "SupplierController@updateLocation")->name('admin.supplier.update.location');

            Route::get("delete/{id}", "SupplierController@deleteLocation")->name('admin.supplier.delete.location');
        });

        Route::group(['prefix' => 'supplier-service/{supplier_id}' ], function() {

        });

        Route::group(['prefix' => 'supplier-notification/{supplier_id}' ], function() {
            Route::get("load", "SupplierController@notificationLoad")->name('admin.supplier.notification.list');
            Route::post("update", "SupplierController@notificationUpdate")->name('admin.supplier.notification.update');
        });
    });
});