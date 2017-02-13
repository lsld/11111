<?php
Route::group(['prefix' => 'matching'], function () {

    Route::get("/", "MatchingController@index")->name('matching-per-hours');
    Route::get("sent-to-job/{job_id}", "MatchingController@notifyFormJob")->name('matching-sent-to-job');

});