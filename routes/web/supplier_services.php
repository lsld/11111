<?php
Route::group(['middleware' => 'auth'], function () {

    Route::get('/services', 'SupplierServicesController@showService')
        ->name('show_services');

    Route::post('/services/plant', 'SupplierServicesController@plantService')
        ->name('plant_services');

    Route::post('/services/contracting', 'SupplierServicesController@contractingService')
        ->name('contracting_services');

    Route::post('/services/material', 'SupplierServicesController@materialService')
        ->name('material_services');

    Route::post('/services/fill', 'SupplierServicesController@fillService')
        ->name('fill_services');


    /* Delete specific services */
    Route::get('/services/plant/{id}', 'SupplierServicesController@deletePlant')
        ->name('plant_Service_delete');

    Route::get('/services/contracting/{id}', 'SupplierServicesController@deleteContracting')
        ->name('contracting_Service_delete');

    Route::get('/services/material/{id}', 'SupplierServicesController@deleteMaterial')
        ->name('material_Service_delete');

    Route::get('/services/fill/{id}', 'SupplierServicesController@deleteFill')
        ->name('fill_Service_delete');

    /* Edit specific services */
    Route::get("/services/plant/{id}/edit", "SupplierServicesController@showEditPlantService")
        ->name('view_edit_plant_services');
    Route::put("/services/plant/edit", "SupplierServicesController@editPlantService")
        ->name('edit_plant_services');

    Route::get("/services/contracting/{id}/edit", "SupplierServicesController@showEditContractingService")
        ->name('view_edit_contracting_services');
    Route::put("/services/contracting/edit", "SupplierServicesController@editContractingService")
        ->name('edit_contracting_services');

    Route::get("/services/material/{id}/edit", "SupplierServicesController@showEditMaterialService")
        ->name('view_edit_material_services');
    Route::put("/services/material/edit", "SupplierServicesController@editMaterialService")
        ->name('edit_material_services');

    Route::get("/services/fill/{id}/edit", "SupplierServicesController@showEditFillService")
        ->name('view_edit_fill_services');
    Route::put("/services/fill/edit", "SupplierServicesController@editFillService")
        ->name('edit_fill_services');
});