<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'description'  => $faker->text(200),
        'price'  => $faker->randomDigit(200)
    ];
});
