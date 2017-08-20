<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Guide::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->name,
        'author_id' => factory('App\User')->create()->id,
        'author'    => $faker->name,
        'summary'   => $faker->catchPhrase,
        'hero'      => $faker->firstNameFemale,
        'pros'      => $faker->city,
        'cons'      => $faker->city,
        'build'     => 'lmb_left,lmb_left_left,rmb_left,rmb_left_left,f_left,f_left_left,q_left,q_left_left,e_left,e_left_left,Outgunned',
        'contents'  => $faker->paragraph,
    ];
});
