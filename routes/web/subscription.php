<?php

Route::group(['prefix' => 'subscription'], function () {

    Route::group(['namespace' => 'Web\Subscription\Controllers'], function () {

        Route::get('plans', 'PlanController@all');

        Route::get('plan-create', 'PlanController@create');

        Route::get('plan-update', 'PlanController@update');

        Route::post('plan-store', 'PlanController@store');

    });

    Route::group(['namespace' => 'Web\Subscription\Controllers'], function () {

        Route::get('categories', 'SubscriptionCategoryController@all');

        Route::get('category-create', 'SubscriptionCategoryController@create');

        Route::get('category-update', 'SubscriptionCategoryController@update');

        Route::post('category-store', 'SubscriptionCategoryController@store');

    });

});