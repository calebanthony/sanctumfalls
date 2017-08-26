<?php

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');

    Route::resource('heroes', 'HeroController');

    Route::resource('skills', 'SkillController');
});

Route::get('guides/{hero}/{name}/edit', 'GuidesController@edit');
Route::get('guides/create/{hero}', 'GuidesController@create');
Route::get('guides/{hero}', 'GuidesController@list');
Route::get('guides/{hero}/{name}', 'GuidesController@show');
Route::resource('guides', 'GuidesController');

Route::get('my/guides', 'GuidesController@getMine');

Route::post('votes/{guide}', 'VotesController@store');

Auth::routes();
