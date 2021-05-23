<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        factory(App\Models\User::class, 50)->create();
        factory(App\Models\Place::class, 50)->create();
        factory(App\Models\PlacePhotos::class, 50)->create();

        factory(App\Models\Donation::class, 100)->create();
    }
}
