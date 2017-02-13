<?php
Route::group(['middleware' => 'auth'], function () {


    Route::post("/supplier-quotes/", "QuotesController@supplierQuotes")
        ->name('supplier_quotes');

    Route::post("/supplier-quotes/edit", "QuotesController@editSupplierQuote")
        ->name('edit_supplier_quotes');

    Route::post("/Search-Quotes/", "QuotesController@searchSupplierQuotes")
        ->name('search_supplier_quotes');

    Route::get("/supplier-quotes/", "QuotesController@showSupplierQuotes")
        ->name('supplier_quotes');


    Route::get("/supplier-quotes/{id}", "QuotesController@showSupplierQuote")
        ->name('show_supplier_quote');

    Route::get("/supplier-quotes/{id}/edit", "QuotesController@showEditSupplierQuote")
        ->name('view_edit_supplier_quotes');


    Route::get("/quotes/", "QuotesController@searchBySupplierQuotes")
        ->name('search_quotes');
});