<?php

$factory->define(App\Setup::class, function (Faker\Generator $faker) {
    return [
        "cvd" => $faker->randomFloat(2, 1, 100),
        "price_per_liter" => $faker->randomFloat(2, 1, 100),
    ];
});
