<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;


class CartDetailController extends Controller
{
    public function store(Request $request){

        
        #dd($request);
        $cartDetail = new CartDetail();
        # ¿A que carrito pertenece ?
        # definimos un campo cart en user que devuelva la informacion del carrito de compras
        # activo para ese usuario que esta en la sesion.
        # Definimos un accessor en el modelo User para poder obtener su id
        $cartDetail->cart_id = auth()->user()->cart->id;

        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        $notification = "El producto se agregó exitosamente";
        return back()->with(compact('notification'));
    }
    
    public function destroy(Request $request){

        $cartDetail = CartDetail::find($request->cart_detail_id);
        # Se debe comprobar si el id del carrito de compras que se quiere eliminar
        # es de el usuario autenticado.. de lo contrario es una vulnerabilidad
        if($cartDetail->cart_id == auth()->user()->cart->id)
            $cartDetail->delete();

        $notification = "¡El producto se ha eliminado del carrito correctamente!.";
        return back()->with(compact('notification'));
    }

    public function getProduct(){
        #Un producto puede aparecer en muchos carritos de compras
        return $this->belongsTo(Product::class);
    }

}
