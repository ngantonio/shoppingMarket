<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function getProduct(){
        # Esta clase pertenece a un producto determinado
        return $this->belongsTo(Product::class);
    }
}
