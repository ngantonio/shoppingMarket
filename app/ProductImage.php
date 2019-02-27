<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function getProduct(){
        # Esta clase pertenece a un producto determinado
        return $this->belongsTo(Product::class);
    }

    # Accessor: diferenciar las imagenes que contienen una URL completa
    #(internet) de las imagenes locales
    
    /*public function getUrlAttribute(){
        
        if(substr($this->url, 0, 3) === "http")
            return $this.url;
        return '/images/products/'.$this.url;
    }*/

    
}
