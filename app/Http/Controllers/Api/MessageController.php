<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request)
    {     
        $apartment_id = $request->input("apartment_id");
        $apartment = Apartment::find($apartment_id);
        $data = $request->validate([
            'name' => 'nullable',
            'email' => 'required|email',
            'message_text' => 'required',
            'apartment_id' => 'nullable',
        ]);
        
        // Se non è stato inserito nessun nome viene inserito di default "anonimo"
        if (empty($data['name'])) {
            $data['name'] = "Anonimo";
        }
        $newMessage = new Message();
        $newMessage->name = $data["name"];
        $newMessage->email = $data["email"];
        $newMessage->message_text = $data["message_text"];
        $newMessage->apartment()->associate($apartment->id);
        // $newMessage->fill($data);
        $newMessage->save();
        //Inviare l'email al cliente
        Mail::to($data['email'])->send(new NewContact($data));
    }
}
