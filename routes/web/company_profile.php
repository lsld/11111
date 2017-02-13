<?php


Route::group(['middleware' => 'auth'], function () {
    Route::get("company-profile/{id}", "CompanyProfileController@show")
    ->name('company.profile');

    Route::put("company-profile/service-category", "CompanyProfileController@updateServiceCategory")
        ->name('company.profile.service_category');


    Route::put("company-profile/about", "CompanyProfileController@updateAbout")
    ->name('company.profile.update_about');

    Route::put("company-profile/services", "CompanyProfileController@updateServices")
    ->name('company.profile.update_services');

    Route::put("company-profile/projects", "CompanyProfileController@updateProjects")
    ->name('company.profile.update_projects');

    Route::put("company-profile/contact-details", "CompanyProfileController@updateContactDetails")
    ->name('company.profile.update_contact_details');

    Route::post("company-profile/gallery", "CompanyProfileController@addImage")
    ->name('company.profile.add_image');

    Route::get("company-profile/gallery/delete/{id}", "CompanyProfileController@deleteImage")
    ->name('company.profile.delete_image');

    Route::post("company-profile/document", "CompanyProfileController@addDocument")
    ->name('company.profile.add_document');

    Route::get("company-profile/document/delete/{id}", "CompanyProfileController@deleteDocument")
        ->name('company.profile.delete_document');

    Route::post("company-profile/logo", "CompanyProfileController@changeLogo")
    ->name('company.profile.logo_upload');

    Route::post("company-profile/certificates", "CompanyProfileController@manageIndustryCertification")
        ->name('company.profile.certificate_upload');

    Route::get("company-profile/certificates/delete/{id}", "CompanyProfileController@deleteIndustryCertification")
        ->name('company.profile.delete_certificates');
});
