<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
use App\Product;


class CartDetailController extends Controller
{
    public function store(Request $request){
        
        $current_cart_id = auth()->user()->cart->id;

        if($this->exists($request,$current_cart_id)){ 
            $error = "Lo sentimos, el producto ya se encuentra en el carrito";
            return back()->with(compact('error'));
        }
        
        $cartDetail             = new CartDetail();
        # ¿A que carrito pertenece ?
        # definimos un campo cart en user que devuelva la informacion del carrito de compras
        # activo para ese usuario que esta en la sesion.
        # Definimos un accessor en el modelo User para poder obtener su id
        $cartDetail->cart_id    = $current_cart_id;
        $cartDetail->product_id = $request->product_id;
        # Buscamos el producto seleccionado para aumentar su nivel de popularidadad:
        # Se asume que cuando un usuario agrega un producto al carrito es porque le gustó
        # y tiene la intencion de comprarlo...
        $product                = Product::find($request->product_id);
        $product->popularity    = $product->popularity + 1;
        $product->save();
        
        $cartDetail->quantity   = $request->quantity;
        $cartDetail->save();

        $notification = "El producto se agregó exitosamente";
        return back()->with(compact('notification'));
    }
    
    public function destroy(Request $request){

        $cartDetail             = CartDetail::find($request->cart_detail_id);
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

    private function exists($request, $current_cart_id){
        /*
            Para comprobar si un producto ya existe en el carrito, se debe tener en cuenta que
            un usuario puede agregar un producto al carrito aun cuando el mismo producto este
            dentro de un pedido pendiente por procesar. Es decir, se puede agregar a un carrito
            con status Activo.

            Se debe preguntar si el producto existe en la tabla, si existe, se debe preguntar
            si el cart_id de ese producto dentro del carrito corresponde al cart_id del
            carrito actual del usuario logueado, auth()->user()->cart->id, devuelve el id
            del carrito que el usuario tiene activo en ese momento.     
        */

        $result = CartDetail::where(function ($query) use ($request){
            $query->where('product_id', '=', $request->product_id);
        })->where(function ($query) use ($current_cart_id){
            $query->where('cart_id', '=', $current_cart_id);
        })->exists();

        if($result)
            return true;
        else
            return false;
    }

}
