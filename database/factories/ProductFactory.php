<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(5),
        'description' => $faker->sentence(10),
        'description_details' => $faker->text,
        'price' => $faker->randomFloat(2,5,150),
        'category_id'=> $faker->numberBetween(1,5)
    ];

});
