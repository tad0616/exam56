<?php

use Faker\Generator as Faker;

$factory->define(App\Topic::class, function (Faker $faker) {
    $items = [1, 2, 3, 4];
    shuffle($items);

    $random_date = $faker->dateTimeBetween('-3 days', '+3 days');
    $num1        = rand(1, 99);
    $num2        = rand(1, 99);
    return [
        'topic'           => $num1 . " + " . $num2,
        'opt' . $items[0] => $num1 + $num2,
        'opt' . $items[1] => $num1 . $num2,
        'opt' . $items[2] => rand(1, 99),
        'opt' . $items[3] => rand(1, 999),
        'ans'             => $items[0],
        'created_at'      => $random_date,
        'updated_at'      => $random_date,
    ];
});
