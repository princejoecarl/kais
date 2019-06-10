<?php

Route::group(['middleware' => 'guest'], function() {
    Route::view('login', 'admin::session.login')->name('admin.login');
    Route::post('login', "Session\LoginController")->name('admin.login.attempt');
});

Route::group(['middleware' => 'auth:admin'], function() {
    Route::get('/', function() {
        return redirect()->route('admin.organization');
    });
    Route::post('logout', "Session\LogoutController")->name('admin.logout');

    Route::get('organizations', "Organization\OrganizationListingController")->name('admin.organization');

    Route::get('organizations/{organization}', "Organization\OrganizationDetailController")->name('admin.organization.detail');

    Route::get('organizations/{organization}/skills/{skill}', "Organization\SkillDetailController")->name('admin.organization.skill.detail');
});
