<?php


$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Region::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city,
        'short_code' => $faker->randomLetter,
    ];
});
