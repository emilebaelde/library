<?php

use Faker\Generator as Faker;
use Faker\Provider\Barcode;

$factory->define(App\Stock::class, function (Faker $faker) {
    return [
        'book_id'=>$faker->randomElement(App\Book::pluck('id')),
        'barcode'=>$faker->ean13,

    ];
});
