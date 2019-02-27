<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function store(Request $request){

        $message = new Message();
        $message->userName      = $request->input('name_user');
        $message->email         = $request->input('email');
        $message->message_field = $request->input('message');
        $message->save();

        $notification = "Tu consulta se ha enviado! pronto te contactaremos via email.";
        return back()->with(compact('notification'));
    }
}
