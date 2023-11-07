<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable',
            'email' => 'required|email',
            'message_text' => 'required',
        ]);

        // Se non è stato inserito nessun nome viene inserito di default "anonimo"
        if (empty($data['name'])) {
            $data['name'] = "Anonimo";
        }

        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();
    }
}
