<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Definimos la relacion entre un usuario y un cart
   /* public function getUser(){
        #Un usuario tendrá varios carts asociados
        return $this->hasMany(Cart::class);

    }*/

    // Definimos la relacion entre un cart y sus detalles
    public function details(){
        #Un carrito tendrá muchos detalles  asociados
        return $this->hasMany(CartDetail::class);
    }
    
    
}
