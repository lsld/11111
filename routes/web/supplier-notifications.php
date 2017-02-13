<?php
Route::group(['middleware' => 'auth'], function () {
    Route::get('/supplier/notifications', 'SupplierNotificationController@showNotifications')
        ->name('view_supplier_notifications');
    Route::post('/supplier/notifications', 'SupplierNotificationController@notificationUpdate')
        ->name('add_supplier_notifications');
});
