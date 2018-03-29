<?php

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

$factory->define(DurianSoftware\User::class, function (Faker $faker) {

    return [
        'member_number' => $faker->unique()->buildingNumber,
        'password' => $faker->password,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'nick_name' => $faker->firstName,
        'image' => $faker->md5 .'.jpg',
        'day_id' => $faker->numberBetween($min = 1, $max = 7),
        'month_id' => $faker->numberBetween($min = 1, $max = 12),
        'year_id' => $faker->numberBetween($min = 1, $max = 50),
        'gender' => $faker->numberBetween($min = 1, $max = 2),
        'email' => $faker->unique()->email,
        'telephone' => $faker->phoneNumber,
        'is_block' => $faker->randomElement(['block', 'unblock']),
        'google_id' => $faker->md5,
        'facebook_id' => $faker->md5,
        'twitter_id' => $faker->md5
    ];
});
