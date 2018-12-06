<?php

use Faker\Generator as Faker;

$factory->define(App\Cart::class, function (Faker $faker) {
    return [
        'name' => $faker->text(50),
        'email'  => $faker->text(50),
        'address'  => $faker->text(50),
        'quantity'  => $faker->randomDigit(200)
    ];
});
