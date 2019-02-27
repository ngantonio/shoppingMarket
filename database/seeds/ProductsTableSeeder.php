<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // metodo make() Crea objetos sin almacenar,
        // metodo create() Crea objetos y los almacena
       
        $categories =  factory(Category::class, 5)->create();
        $categories->each( function($cat){

            # creamos los productos para cada categoria sin almacenarlos
            $products = factory(Product::class, 20)->make();
            # guardamos dentro de la categoria
            $cat->products()->saveMany($products);

            # cada producto debe tener 5 imagenes
            $products->each(function($prod){
                $prod->getImages()->saveMany(factory(ProductImage::class, 5)->make());
            });
        });

    }
}
