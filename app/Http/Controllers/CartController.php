<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#Convierte el carrito de compras activo en un pedido
# pendiente para que el administrador decida si aprobarlo
# o cancelarlo
class CartController extends Controller
{
    public function update(Request $req){
        #dd($req);

        $currentCart = auth()->user()->cart;
        # Recorremos cada producto del carrito para obtener la cantidad total
        $total = 0;
        foreach (auth()->user()->cart->details as $detail) {
          $total= $total + $detail->product->price * $detail->quantity;
        }
        #dd($total);
        
        $currentCart->code = $this->generateCode(8);
        $currentCart->total = $total;
        $currentCart->order_date = date('d-m-Y');
        $currentCart->status = "Pendiente";
        $currentCart->save();

        $notification= "Tu pedido se ha registrado correctamente. Te contactaremos via email a la brevedad...";
        return back()->with(compact('notification'));
    }

    private function generateCode($len){

        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
        $cadena = ""; //variable para almacenar la cadena generada
        for($i=0;$i<$len;$i++)
            $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
        entre el rango 0 a Numero de letras que tiene la cadena */
        return $cadena;
      
    }
}
