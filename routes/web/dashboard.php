<?php

Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {

    Route::get('supplier', 'DashboardController@viewDashboard');

});



