<?php
Route::group(['middleware' => 'auth'], function () {

    Route::get('/supplier/location', 'SupplierLocationController@showLocation')
        ->name('show_supplier_location');

    Route::post('/supplier-locations', 'SupplierLocationController@supplierLocations')
        ->name('supplier_location');

    Route::get('/supplier-locations/{id}', 'SupplierLocationController@showSupplierLocationsById')
        ->name('supplier_location_view');

    Route::get("/supplier-locations/{id}/edit", "SupplierLocationController@showEditLocations")
        ->name('view_edit_supplier_locations');
    Route::post("/supplier-locations/edit", "SupplierLocationController@editLocations")
        ->name('edit_supplier_locations');

    Route::get('/supplier-locations-delete/{id}', 'SupplierLocationController@deleteLocations')
        ->name('supplier_locations_delete');

});






