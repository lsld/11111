<?php

Route::group(['namespace' => 'Statistics'], function () {
    Route::resource('statistics/totals', 'StatisticsController@totals');
    Route::resource('statistics/geocodes', 'StatisticsController@geocodes');
    
});