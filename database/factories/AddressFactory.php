<?php

use Faker\Generator as Faker;
use Faker\Provider\nl_BE\Address;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'city'=>Address::cityName(),
        'street'=>$faker->streetName,
        'number'=>$faker->randomDigitNotNull,
        'bus_number'=>$faker->randomDigitNotNull,
        'postal_code'=>Address::postcode(),
        'country'=> 'Belgium'
    ];
});
