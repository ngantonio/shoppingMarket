<?php

use Faker\Generator as Faker;
use App\ProductImage;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [

        'url' => $faker->imageUrl(250,250),
        'product_id' => $faker->numberBetween(1,100)
        /*
                    $table->string('url');
            # Imagen destacada
            $table->boolean('featured')->default(false);

            # Clave foranea para que se pueda identificar a que producto
            #pertenece esa imagen
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')
            $table->timestamps(); 
        */
    ];
});
