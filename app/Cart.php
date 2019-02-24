<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    // Definimos la relacion entre un cart y sus detalles
    public function details(){
        #Un carrito tendrá muchos detalles  asociados
        return $this->hasMany(CartDetail::class);
    }
 
}
