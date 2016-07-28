<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\PortfolioPhoto::class, function (Faker\Generator $faker) {
    return [
        'photo' => $faker->imageUrl,
        'category' => $faker->word
    ];
});
