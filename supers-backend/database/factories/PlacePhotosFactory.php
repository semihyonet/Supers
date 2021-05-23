<?php
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

$factory->define(App\Models\PlacePhotos::class, function (Faker $faker) {
    return [
        'place_id' => Place::inRandomOrder()->first()->id,
        'directory' => $faker->imageUrl(),
        'order' => $faker->randomDigitNotNull()
    ];
});
