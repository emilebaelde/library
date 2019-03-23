<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {

    return [
        'title'=>$faker->sentence(5),
        'author_id'=>$faker->randomElement(App\Author::pluck('id')),
        'isbn'=>$faker->isbn13,
        'year'=>$faker->year,
        'edition'=> $faker->randomElement(['1st','2nd','3rd','4th','5th']),
        'description'=> $faker->realText(200,2),
        'photo_id'=> $faker->numberBetween(1,10),
    ];
});
