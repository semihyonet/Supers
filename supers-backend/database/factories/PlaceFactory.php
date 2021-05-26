<?php

use App\Models\User;
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

$factory->define(App\Models\Place::class, function (Faker $faker) {
    return [
        'is_active' => $faker->boolean(),
        'latitude' => $faker->latitude(),
        'longitude' => $faker->longitude(),
        'description' => $faker->paragraph(3),
        'type' => array_random(['clean','plant','build']),
        'area' => $faker->numberBetween(100, 1000),
        'area_type' => array_random(['beach', 'forrest','city', 'lake', 'field','street']),
        'goal_money' => $faker->numberBetween(10, 100)*100,
        'currency' => $faker->currencyCode(),
        'user_id' => User::inRandomOrder()->first()->id
    ];
});
