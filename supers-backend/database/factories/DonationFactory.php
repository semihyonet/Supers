<?php

use App\Models\User;
use App\Models\Place;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Donation::class, function (Faker $faker) {
    return [
        'money' => $faker->numberBetween(10, 100)*10,
        'currency' => 'USD',
        'user_id' => User::inRandomOrder()->first(),
        // User::all()->random()->id,
        'place_id' => Place::inRandomOrder()->first(),
        // Place::all()->random()->id
    ];
});
