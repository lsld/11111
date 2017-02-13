<?php


Route::get('/', function () {
        return redirect('login');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')
       ->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')
    ->name('user_activate');