<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Cart;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Definimos la relacion entre un usuario y un cart
    public function carts(){
        #Un usuario tendrá varios carts asociados
        #creamos lo analogo en el modelo Cart
        return $this->hasMany(Cart::class);

    }

    // Accessor para cart, devuelve el carrito activo
    public function getCartAttribute(){
        $cart = $this->carts()->where('status','Active')->first();

        if($cart)
            return $cart;
    
        # Creamos un nuevo carrito de compras activo para el usuario
        # debido a que para este caso, no tiene uno.
        $cart = new Cart();
        $cart->status = 'Active';
        $cart->user_id = $this->id;
        $cart->save();

        return $cart;

    }
}
