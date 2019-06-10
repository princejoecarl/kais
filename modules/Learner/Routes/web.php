<?php


Route::group(['middleware' => "guest"], function () {
    Route::view('login', 'learner::session.login')->name('learner.login');
    Route::post('login', "Session\LoginController")->name('learner.login.attempt');
});

Route::group(['middleware' => "auth:learner"], function () {
    Route::get('/', function () {
        return redirect()->route('learner.skills.listing');
    });

    Route::post('logout', "Session\LogoutController")->name('learner.logout');

    Route::group(['namespace' => "Skill"], function() {
        Route::get('skills', "SkillListingController")->name('learner.skills.listing');
        Route::get('skills/{skill}', "SkillDetailController")->name('learner.skill.detail');
        Route::get('skills/{skill}/{procedure}', "SkillProcedureController")->name('learner.skill.procedure.detail');
    });

    Route::get('forum', "Forum\TopicListingController")->name('learner.forum.topics');

    Route::get('forum/{topic}', "Forum\TopicDetailController")->name('learner.forum.topic.discussion');
});