<?php

$factory->define(App\Sale::class, function (Faker\Generator $faker) {
    return [
        "system_date_time" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "volume_sold" => $faker->randomFloat(2, 1, 100),
        "volume_before_sales" => $faker->randomFloat(2, 1, 100),
        "volume_after_sales" => $faker->randomFloat(2, 1, 100),
        "amount" => $faker->randomFloat(2, 1, 100),
        "price_per_liter" => $faker->randomFloat(2, 1, 100),
    ];
});
