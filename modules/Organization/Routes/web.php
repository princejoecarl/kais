<?php

Route::group(['middleware' => 'guest'], function () {
    Route::view('login', 'organization::session.login')->name('organization.login');
    Route::post('login', "Session\LoginController")->name('organization.login.attempt');
});

Route::group(['middleware' => 'auth:organization'], function () {
    Route::get('/', function () {
        return redirect()->route('skills.listing');
    });

    Route::post('logout', "Session\LogoutController")->name('organizatiTon.logout');

    Route::get('skills', "Skill\SkillListing")->name('skills.listing');
    Route::get('skills/create', "Skill\SkillCreate")->name('skills.create');
    Route::post('skills/create', "Skill\SkillCreate@submit")->name('skills.create.submit');
    Route::get('skills/{skill}', "SkillProcedures")->name('skill.detail');
    Route::get('skills/{skill}/edit', "Skill\EditSkillController@edit")->name('skill.edit');
    Route::post('skills/{skill}/edit', "Skill\EditSkillController@update")->name('skill.update');


    Route::get('skills/{skill}/procedure/create', "Skill\SkillCreateProcedure")->name('skill.procedure.create');
    Route::post('skills/{skill}/procedure/create', "Skill\SkillCreateProcedure@submit")->name('skill.procedure.submit');
    Route::get('skills/{skill}/{procedure}', "DetailedProcedure")->name('skill.procedure.detail');
    Route::get('skills/{skill}/{procedure}/edit', "Procedure\EditProcedureController@edit")->name('skill.procedure.edit');
    Route::post('skills/{skill}/{procedure}/update', "Procedure\EditProcedureController@update")->name('skill.procedure.update');



    Route::get('trainers', 'Employee\\TrainerListingController')->name('organization.trainers');
    Route::get('trainers/create', function() {return "create trainer";})->name('organization.trainer.create');
    Route::get('trainers/{trainer}', function() {return "detail";})->name('organization.trainer.detail');


    Route::get('learners', "Learner\LearnerListingController")->name('organization.learners');
    Route::get('learners/{learner}', function() { return "learner detail";})->name('organization.learner.detail');
});
