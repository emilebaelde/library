<?php

use Faker\Generator as Faker;

$factory->define(App\Rental::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->randomElement(App\User::pluck('id')),
        'stock_id'=>$faker->randomElement(App\Stock::pluck('id')),
        'rental_start'=>$faker->date(),
        'rental_end'=>$faker->date(),
    ];
});
