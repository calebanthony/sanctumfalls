<?php

Route::get('/', 'HomeController@index');

// Only wrap auth around the necessary controllers.
// The other auth routes are specificed in the controllers
// themselves (see GuidesController)
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');

    Route::resource('heroes', 'HeroController');
    Route::resource('skills', 'SkillController');
});
Route::get('build/{hero}/{build?}', 'BuildsController@create');
Route::resource('builds', 'BuildsController');

// Create some custom-named routes, then let the controller
// handle the rest with default pathing
Route::get('guides/{hero}/{name}/edit', 'GuidesController@edit');
Route::get('guides/create/{hero}', 'GuidesController@create');
Route::get('guides/{hero}', 'GuidesController@list');
Route::get('guides/{hero}/{name}', 'GuidesController@show');
Route::resource('guides', 'GuidesController');

// Be specific with the tier list routes
Route::get('tierlist', 'TierListController@index');
Route::post('tierlist', 'TierListController@store');

// Video routes
// Route::get('videos', 'VideosController@index');

// Allows for voting on guides
Route::post('votes/{guide}', 'VotesController@store');

// All personal routes, like your guides, profile, etc
Route::get('profile/{username}', 'UserController@getMine');
Route::get('my/guides', 'GuidesController@getMine');

// Authentication routes
Auth::routes();
