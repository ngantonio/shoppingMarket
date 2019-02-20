<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(3),
        'description' => $faker->sentence(10),
        'description-details' => $faker->text,
        'price' => $faker->randomFloat(2,5,150),
        'category_id'=> $faker->numberBetween(1,5)
    ];

});
