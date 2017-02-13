<?php
Route::group([  'namespace' => 'HirerPortal', 'middleware' => 'auth'], function () {

    /**
     * generate four type of request generation routes ( plant hire, constructing, material, fill )
     */

    Route::group(['prefix' => 'plant-hire'], function(){ /* Plant Hire request generate */

        Route::get("create", "PlantHireController@create")->name('hirer-portal-plant-hire-create');
        
        Route::post('create', 'PlantHireController@store')->name('hirer-portal-plant-hire-store');

        Route::get("/request-item-table", "PlantHireController@requestItemTable")->name("request-item-table");

        Route::get("load-dynamic-properties/{id?}",
            "PlantHireController@loadDynamicPropertiesWithOptions")
            ->name('plant-hire-load-dynamic-properties');

        Route::post('store-item-data', 'PlantHireController@storeItemData')->name('hire-potal-store-add-item');

        Route::get("remove-item-data/{id?}", "PlantHireController@removeItemData")->name('hirer-portal-remove-item');

        Route::get("edit/{id}", "PlantHireController@edit")->name('hirer-portal-plant-hire-edit');

        Route::put('edit/{id}', 'PlantHireController@update')->name('hirer-portal-plant-hire-update');

        Route::get("delete/{id}", "PlantHireController@destroy")->name('hirer-portal-plant-hire-destroy');

        Route::any('form-validation', 'PlantHireController@checkValidation')->name('hirer-portal-plant-hire-ajax-validation');

    });


    Route::group(['prefix' => 'constructing'], function(){ /* Constructing (services) request generate */

        Route::get("create", "ServicesController@create")->name('hirer-portal-services-create');

        Route::post('create', 'ServicesController@store')->name('hirer-portal-services-store');

        Route::get("load-dynamic-properties/{id?}", "ServicesController@loadDynamicPropertiesWithOptions")->name('services-load-dynamic-properties');

        Route::get("edit/{id}", "ServicesController@edit")->name('hirer-portal-services-edit');

        Route::put('edit/{id}', 'ServicesController@update')->name('hirer-portal-services-update');

        Route::get("delete/{id}", "ServicesController@destroy")->name('hirer-portal-services-destroy');



        Route::any('form-validation', 'ServicesController@checkValidation')->name('hirer-portal-services-ajax-validation');


    });
    
    
    Route::group(['prefix' => 'material-request'], function(){ /*   material request generate */

        Route::get("create", "MaterialController@create")->name('hirer-portal-material-create');

        Route::post('create', 'MaterialController@store')->name('hirer-portal-material-store');

        Route::get("load-dynamic-properties/{id?}", "MaterialController@loadDynamicPropertiesWithOptions")->name('material-load-dynamic-properties');

        Route::get("edit/{id}", "MaterialController@edit")->name('hirer-portal-material-edit');

        Route::put('edit/{id}', 'MaterialController@update')->name('hirer-portal-material-update');

        Route::get("delete/{id}", "MaterialController@destroy")->name('hirer-portal-material-destroy');


        Route::any('form-validation', 'MaterialController@checkValidation')->name('hirer-portal-material-ajax-validation');


    });


    Route::group(['prefix' => 'fill-request'], function(){ /* fill request generate */
        
        Route::get("create", "FillController@create")->name('hirer-portal-fill-create');

        Route::post('create', 'FillController@store')->name('hirer-portal-fill-store');

        Route::get("load-dynamic-properties/{id?}", "FillController@loadDynamicPropertiesWithOptions")->name('fill-load-dynamic-properties');

        Route::get("edit/{id}", "FillController@edit")->name('hirer-portal-fill-edit');

        Route::put('edit/{id}', 'FillController@update')->name('hirer-portal-fill-update');

        Route::get("delete/{id}", "FillController@destroy")->name('hirer-portal-fill-destroy');

        Route::any('form-validation', 'FillController@checkValidation')->name('hirer-portal-fill-ajax-validation');


    });
    
});